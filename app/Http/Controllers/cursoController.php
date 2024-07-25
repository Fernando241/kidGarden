<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Docente;
use App\Models\Estudiante;
use Illuminate\Http\Request;

class CursoController extends Controller
{

    public function index(Request $request)
    {
        /* para hacer funcional la barra de busqueda */
        $search = $request->query('search');
        $cursos = curso::when($search, function ($query, $search) {
        return $query->where('grado', 'like', "%{$search}%");
    })->paginate(15);
        
        return view('cursos.index', compact('cursos'));
    }


    public function create()
    {
        $docentes = Docente::all();
        $estudiantes = Estudiante::all();
        return view('cursos.create', compact('docentes', 'estudiantes'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'grado' => 'required',
            'seccion' => 'required',
            'docente_id' => 'required',
            // Otros campos que puedas tener
        ]);

        $curso = new Curso();
        $curso->grado = $request->input('grado');
        $curso->seccion = $request->input('seccion');
        $curso->docente_id = $request->input('docente_id');
        $curso->save();

        $estudiantesSeleccionados = $request->input('estudiantes_seleccionados');
        $curso->estudiantes()->attach($estudiantesSeleccionados);

        return redirect()->view('cursos.index');
    }


    public function show($idCurso)
    {
        $curso = Curso::with('docente')->find($idCurso);
        return view('cursos.show', compact('curso'));
    }


    public function edit($idCurso)
    {
        $curso = Curso::find($idCurso);
        return view('cursos.edit', compact('curso'));
    }


    public function update(Request $request, Curso $curso)
    {
        //
    }


    public function destroy(Curso $curso)
    {
        //
    }

    //función para asignar los estudiantes al curso
    public function asignarEstudiantes(Request $request, Curso $curso)
    {
        $curso->estudiantes()->sync($request->estudiante_ids);
        return redirect()->back()->with('success', 'Estudiantes asignados al curso con éxito.');
    }

    public function procesarEstudiantes(Request $request)
{
    // Obtén los IDs de los estudiantes seleccionados desde el formulario
    $estudiantesSeleccionados = $request->input('estudiantes_seleccionados');

    // Almacena estos IDs en la sesión
    session(['estudiantes_seleccionados' => $estudiantesSeleccionados]);

    // Redirige al formulario principal para completar otros datos del curso
    return redirect()->route('cursos.create');
}

}
