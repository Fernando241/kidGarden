<?php

namespace App\Http\Controllers;

use App\Models\Curso;
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
        return view('cursos.create');
    }


    public function store(Request $request)
    {
        //
    }


    public function show($idCurso)
    {
        $curso = Curso::find($idCurso);
        return view('cursos.show', compact('curso'));
    }


    public function edit(Curso $curso)
    {
        //
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
