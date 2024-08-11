<?php

namespace App\Http\Controllers;

use App\Models\Acudiente;
use Illuminate\Http\Request;
use App\Models\Estudiante;

class estudianteController extends Controller
{
    public function index(Request $request)
{
    /* para hacer funcional la barra de busqueda */
    $search = $request->query('search');
    $estudiantes = Estudiante::when($search, function ($query, $search) {
        return $query->where('documento', 'like', "%{$search}%")
                    ->orWhere('nombres', 'like', "%{$search}%")
                    ->orWhere('apellidos', 'like', "%{$search}%")
                    ->orWhere('grado', 'like', "%{$search}%");
    })->paginate(15);

    /* retornar todos los datos de la tabla estudiantes */
    return view('estudiantes.index', compact('estudiantes'));
}


    public function create() //abrir formulario para un nuevo registro
    {
        $acudientes = Acudiente::all();
        return view('estudiantes.create', compact('acudientes'));
    }


    public function store(Request $request) //guardar en la base de datos los nuevos registros
    {
        $estudiante = new Estudiante();
        $estudiante->tipo_documento = $request->input('tipo_documento');
        $estudiante->documento = $request->input('documento');
        $estudiante->nombres = $request->input('nombres');
        $estudiante->apellidos = $request->input('apellidos');
        $estudiante->fecha_nacimiento = $request->input('fecha_nacimiento');
        $estudiante->grado = $request->input('grado');
        $estudiante->acudiente_id = $request->input('acudiente_id');
        $estudiante->save();
        
        return redirect()->route('estudiantes.index');
    }


    public function show($idEstudiante) //visualizar un solo registro
    {
        $estudiante = Estudiante::find($idEstudiante);
        return view('estudiantes.show', compact('estudiante'));
    }


    public function edit($id) //para editar un registro
    {
        $estudiante = Estudiante::find($id);
        return view('estudiantes.edit', compact('estudiante'));
    }

    //funcion para buscar datos del estudiante en mi vista matriculas.create
    public function buscarEstudiante($documento)
    {
        $estudiante = Estudiante::with('acudiente')->where('documento', $documento)->first(); 

        if ($estudiante) {
            return response()->json($estudiante);
        }

        return response()->json(['error' => 'No se encontro un estudiante asociado a este número de documento!'], 404);
    }

    public function update(Request $request, $id) //para actualiza un registro
    {
        // Validar los datos del formulario
        $request->validate([
            'tipo_documento' => 'required',
            'documento' => 'required',
            'nombres' => 'required',
            'apellidos' => 'required',
            'fecha_nacimiento' => 'required',
            'grado' => 'required',
            'acudiente_id' => 'required',
        ]);

        $estudiante = Estudiante::find($id);
        $estudiante->tipo_documento = $request->input('tipo_documento');
        $estudiante->documento = $request->input('documento');
        $estudiante->nombres = $request->input('nombres');
        $estudiante->apellidos = $request->input('apellidos');
        $estudiante->fecha_nacimiento = $request->input('fecha_nacimiento');
        $estudiante->grado = $request->input('grado');
        $estudiante->acudiente_id = $request->input('acudiente_id');
        $estudiante->save();

        return redirect()->route('estudiantes.index');
    }


    public function destroy($id) //para eliminar un registro
    {
        $estudiante = Estudiante::find($id);
        if ($estudiante) {
            $estudiante->delete();
        }
        return redirect()->route('estudiantes.index');
    }

    
}
