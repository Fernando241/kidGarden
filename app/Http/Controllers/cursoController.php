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
        /* $docentes = Docente::all();
        $estudiantesDisponibles = Estudiante::whereDoesntHave('cursos')->get(); // Estudiantes sin curso asignado
        
        /* $estudiantes = Estudiante::all(); */
        /*return view('cursos.create', compact('docentes', 'estudiantes')); */

        $docentes = Docente::all();
        $estudiantesDisponibles = Estudiante::whereDoesntHave('cursos')->get();

        return view('cursos.create', compact('docentes', 'estudiantesDisponibles'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'grado' => 'required',
            'seccion' => 'required',
            'docente_id' => 'required',
        ]);

        $curso = Curso::create([
            'grado' => $request->grado,
            'seccion' => $request->seccion,
            'docente_id' => $request->docente_id,
        ]);

        $curso->estudiantes()->attach($request->estudiantes);

        return redirect()->route('cursos.index');
    }
    


    public function show($idCurso)
    {
        $docentes = Docente::all();
        $curso = Curso::with('docente')->find($idCurso);
        return view('cursos.show', compact('docentes','curso'));
    }


    public function edit($idCurso)
    {
        $docentes = Docente::all();
        $curso = Curso::with('docente')->find($idCurso);
        return view('cursos.edit', compact('docentes', 'curso'));
    }


    public function update(Request $request, Curso $curso)
    {
        //
    }


    public function destroy(Curso $curso)
    {
        //
    }
}
