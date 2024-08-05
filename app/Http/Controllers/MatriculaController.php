<?php

namespace App\Http\Controllers;

use App\Models\Acudiente;
use App\Models\Curso;
use App\Models\Estudiante;
use App\Models\Matricula;
use App\Models\Valor;
use Illuminate\Http\Request;

class MatriculaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $matriculas = Matricula::all();
        return view('matriculas.index', compact('matriculas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cursos = Curso::all();
        $acudiente = Acudiente::all();
        return view('matriculas.create', compact('cursos', 'acudiente'));
    }

        /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $estudiante_id = $request->input('estudiante_id');
        $acudiente_id = $request->input('acudiente_id');
        $curso_id = $request->input('curso_id');

        $estudiante = Estudiante::find($estudiante_id);
        $acudiente = Acudiente::find($acudiente_id);
        $curso = Curso::find($curso_id);

        $codigo_matricula = $estudiante->documento . $acudiente->id . $curso->id;

        $matricula = new Matricula();
        $matricula->codigo_matricula = $codigo_matricula;
        $matricula->estudiante_id = $estudiante_id;
        $matricula->acudiente_id = $acudiente_id;
        $matricula->curso_id = $curso_id;
        $matricula->save();

        return redirect()->route('matriculas.create')->with('success', 'Matrícula creada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $valor = Valor::all();
        $matricula = Matricula::with(['estudiante', 'acudiente', 'curso'])->findOrFail($id);
        return view('matriculas.show', compact('matricula', 'valor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Matricula $matricula)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Matricula $matricula)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Matricula $matricula)
    {
        //
    }
}
