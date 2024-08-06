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
        return view('matriculas.create', compact('cursos'));
    }

        /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'estudiante_id' => 'required|exists:estudiantes,idEstudiante',
            'acudiente_id' => 'required|exists:acudientes,id',
            'curso_id' => 'required|exists:cursos,idCurso',
            'situacion' => 'required|string|in:nuevo estudiante,promovido,repitente',
            'procedencia' => 'required|string|in:Misma Institución,Otra Institución',
        ]);

        // Carga los modelos relacionados para la generación del código
        $estudiante = Estudiante::where('idEstudiante', $validatedData['estudiante_id'])->firstOrFail();
        $acudiente = Acudiente::findOrFail($validatedData['acudiente_id']);
        $curso = Curso::where('idCurso', $validatedData['curso_id'])->firstOrFail();

        // Genera el código de matrícula
        $codigo_matricula = $estudiante->documento . $acudiente->id . $curso->idCurso;

        // Crea la nueva matrícula
        $matricula = new Matricula();
        $matricula->codigo_matricula = $codigo_matricula;
        $matricula->estudiante_id = $validatedData['estudiante_id'];
        $matricula->acudiente_id = $validatedData['acudiente_id'];
        $matricula->curso_id = $validatedData['curso_id'];
        $matricula->situacion = $validatedData['situacion'];
        $matricula->procedencia = $validatedData['procedencia'];
        $matricula->save();

        return redirect()->route('matriculas.index');
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
