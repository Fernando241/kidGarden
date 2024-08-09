<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Solicitud;
use App\Models\User;
use App\Models\Acudiente;
use App\Models\Estudiante;
use Illuminate\Http\Request;

class SolicitudController extends Controller
{
    public function index(Request $request)
    {
        /* para hacer funcional la barra de busqueda */
    $search = $request->query('search');
    $solicituds = Solicitud::when($search, function ($query, $search) {
        return $query->where('documento', 'like', "%{$search}%")
                    ->orWhere('nombres', 'like', "%{$search}%")
                    ->orWhere('apellidos', 'like', "%{$search}%")
                    ->orWhere('grado', 'like', "%{$search}%");
    })->paginate(10);

        return view('solicituds.index', compact('solicituds'));
    }

    
    public function create()
    {
        $user = Auth::user();

        // Verificar si el usuario ya tiene una solicitud en proceso
        $solicitudExistente = Solicitud::where('user_id', $user->id)->where('estado', 'en_proceso')->first();

        if ($solicitudExistente) {
            return redirect()->route('solicituds.existing');
        }

        return view('solicituds.create', compact('user'));
        
    }

    //para mostra el estado de la solicitud
        public function existing()
    {
        return view('solicituds.existing');
    }

    //función para aceptar la solicitud directamente desde la vista solicituds.index
    public function accept($id)
    {
        $solicitud = Solicitud::findOrFail($id);

        // Crear el registro del acudiente
        $acudiente = Acudiente::create([
            'tipo_documento_acudiente' => $solicitud->tipo_documento_acudiente,
            'documento_acudiente' => $solicitud->documento_acudiente,
            'nombre_acudiente' => $solicitud->nombre_acudiente,
            'telefono' => $solicitud->telefono,
            'direccion' => $solicitud->direccion,
            'correo' => $solicitud->correo,
            'parentesco' => $solicitud->parentesco,
            'user_id' => $solicitud->user_id,
        ]);

        // Crear el registro del estudiante
        Estudiante::create([
            'tipo_documento' => $solicitud->tipo_documento,
            'documento' => $solicitud->documento,
            'nombres' => $solicitud->nombres,
            'apellidos' => $solicitud->apellidos,
            'fecha_nacimiento' => $solicitud->fecha_nacimiento,
            'grado' => $solicitud->grado,
            'acudiente_id' => $acudiente->id,
        ]);

        // Actualizar el estado de la solicitud
        $solicitud->estado = 'aprobada';
        $solicitud->save();

        return redirect()->route('solicituds.index')->with('success', 'Solicitud aceptada exitosamente.');
    }
    
    public function store(Request $request)
    {
        // Crear una nueva solicitud
        $validatedData = $request->validate([
            'tipo_documento' => 'required|in:nacido vivo,registro civil,tarjeta de identidad,tarjeta de extranjería',
            'documento' => 'required|string|max:15',
            'nombres' => 'required|string|max:50',
            'apellidos' => 'required|string|max:50',
            'fecha_nacimiento' => 'required|date',
            'grado' => 'required|in:Parvulos,Pre Jardin,Jardin,Transicion',
            'tipo_documento_acudiente' => 'required|in:cédula de ciudadanía,cédula de extranjería',
            'documento_acudiente' => 'required|string|max:20',
            'nombre_acudiente' => 'required|string|max:50',
            'telefono' => 'required|string|max:15',
            'direccion' => 'required|string',
            'correo' => 'required|string|email|max:100',
            'parentesco' => 'required|string|max:30',
        ]);

        // Crear una nueva solicitud con los datos validados
        $solicitud = new Solicitud($validatedData);
        $solicitud->user_id = Auth::id(); // Asocia la solicitud con el usuario autenticado
        $solicitud->estado = 'en_proceso'; // Estado por defecto
        $solicitud->save();

        return view('inicio');
    }

    
    public function show($id)
    {
        $solicitud = Solicitud::find($id);
        return view('solicituds.show', compact('solicitud'));
    }

    
    public function edit($id)
    {
        $solicitud = Solicitud::find($id);
        return view('solicituds.edit', compact('solicitud'));
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'tipo_documento' => 'required',
            'documento' => 'required|max:15',
            'nombres' => 'required|max:50',
            'apellidos' => 'required|max:50',
            'fecha_nacimiento' => 'required|date',
            'grado' => 'required',
            'tipo_documento_acudiente' => 'required',
            'documento_acudiente' => 'required|max:15',
            'nombre_acudiente' => 'required|max:50',
            'telefono' => 'required|max:15',
            'direccion' => 'required',
            'correo' => 'required|email|max:100',
            'parentesco' => 'required|max:30',
            'estado' => 'required|string',
        ]);
    
        $solicitud = Solicitud::find($id);
        $solicitud->tipo_documento = $request->input('tipo_documento');
        $solicitud->documento = $request->input('documento');
        $solicitud->nombres = $request->input('nombres');
        $solicitud->apellidos = $request->input('apellidos');
        $solicitud->fecha_nacimiento = $request->input('fecha_nacimiento');
        $solicitud->grado = $request->input('grado');
        $solicitud->tipo_documento_acudiente = $request->input('tipo_documento_acudiente');
        $solicitud->documento_acudiente = $request->input('documento_acudiente');
        $solicitud->nombre_acudiente = $request->input('nombre_acudiente');
        $solicitud->telefono = $request->input('telefono');
        $solicitud->direccion = $request->input('direccion');
        $solicitud->correo = $request->input('correo');
        $solicitud->parentesco = $request->input('parentesco');
        $solicitud->estado = $request->input('estado');
        $solicitud->save();

        // Crear el acudiente
        $acudiente = Acudiente::create([
            'tipo_documento_acudiente' => $solicitud->tipo_documento_acudiente,
            'documento_acudiente' => $solicitud->documento_acudiente,
            'nombre_acudiente' => $solicitud->nombre_acudiente,
            'telefono' => $solicitud->telefono,
            'direccion' => $solicitud->direccion,
            'correo' => $solicitud->correo,
            'parentesco' => $solicitud->parentesco
        ]);

        // Crear el estudiante
        Estudiante::create([
            'tipo_documento' => $solicitud->tipo_documento,
            'documento' => $solicitud->documento,
            'nombres' => $solicitud->nombres,
            'apellidos' => $solicitud->apellidos,
            'fecha_nacimiento' => $solicitud->fecha_nacimiento,
            'grado' => $solicitud->grado,
            'acudiente_id' => $acudiente->id
        ]);
    
        return redirect()->route('solicituds.index');
    }

    
    public function destroy($id)
    {
        $solicitud = Solicitud::find($id);
        if ($solicitud) {
            $solicitud->delete();
        }
        return redirect()->route('solicituds.index');
    }
}
