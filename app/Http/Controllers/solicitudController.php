<?php

namespace App\Http\Controllers;

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
        /* return view('solicituds.create'); */

        $user = auth()->user();

        // Verificar si el usuario ya tiene una solicitud en proceso
        $solicitudExistente = Solicitud::where('user_id', $user->id)->where('estado', 'en_proceso')->first();

        if ($solicitudExistente) {
            return redirect()->route('solicituds.existing');
        }

        return view('solicituds.create');
        
    }

    //para mostra el estado de la solicitud

        public function existing()
    {
        return view('solicituds.existing');
    }


    
    public function store(Request $request)
    {
        // Crear una nueva solicitud
        $solicitud = new Solicitud([
            'tipo_documento' => $request->input('tipo_documento'),
            'documento' => $request->input('documento'),
            'nombres' => $request->input('nombres'),
            'apellidos' => $request->input('apellidos'),
            'fecha_nacimiento' => $request->input('fecha_nacimiento'),
            'grado' => $request->input('grado'),
            'tipo_documento_padre' => $request->input('tipo_documento_padre'),
            'documento_padre' => $request->input('documento_padre'),
            'nombres_padre' => $request->input('nombres_padre'),
            'apellidos_padre' => $request->input('apellidos_padre'),
            'telefono' => $request->input('telefono'),
            'direccion' => $request->input('direccion'),
            'correo' => $request->input('correo'),
            'parentesco' => $request->input('parentesco'),
        ]);

        // Asignar el ID del usuario actual a la solicitud
        $solicitud->user_id = auth()->id(); // Esto relaciona la solicitud con el usuario

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
            'tipo_documento_padre' => 'required',
            'documento_padre' => 'required|max:15',
            'nombres_padre' => 'required|max:50',
            'apellidos_padre' => 'required|max:50',
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
        $solicitud->tipo_documento_padre = $request->input('tipo_documento_padre');
        $solicitud->documento_padre = $request->input('documento_padre');
        $solicitud->nombres_padre = $request->input('nombres_padre');
        $solicitud->apellidos_padre = $request->input('apellidos_padre');
        $solicitud->telefono = $request->input('telefono');
        $solicitud->direccion = $request->input('direccion');
        $solicitud->correo = $request->input('correo');
        $solicitud->parentesco = $request->input('parentesco');
        $solicitud->estado = $request->input('estado');
        $solicitud->save();

        // Crear el acudiente
        $acudiente = Acudiente::create([
            'tipo_documento_acudiente' => $solicitud->tipo_documento_padre,
            'documento_acudiente' => $solicitud->documento_padre,
            'nombres_acudiente' => $solicitud->nombres_padre,
            'apellidos_acudiente' => $solicitud->apellidos_padre,
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
