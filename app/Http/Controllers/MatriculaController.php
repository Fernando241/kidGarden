<?php

namespace App\Http\Controllers;

use App\Models\Acudiente;
use App\Models\Curso;
use App\Models\Estudiante;
use App\Models\Matricula;
use App\Models\Valor;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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

        // Asocia el estudiante al curso
        $estudiante = Estudiante::findOrFail($validatedData['estudiante_id']);
        $curso = Curso::findOrFail($validatedData['curso_id']);
        $estudiante->cursos()->attach($curso);
        
        // Crea la nueva matrícula
        $matricula = Matricula::create([
            'codigo_matricula' => Str::uuid(),
            'estudiante_id' => $validatedData['estudiante_id'],
            'acudiente_id' => $validatedData['acudiente_id'],
            'curso_id' => $validatedData['curso_id'],
            'situacion' => $validatedData['situacion'],
            'procedencia' => $validatedData['procedencia'],
        ]);

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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $matricula = Matricula::find($id);
        if ($matricula) {
            $matricula->delete();
        }
        return redirect()->route('matriculas.index');
    }
}
