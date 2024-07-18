<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;

class estudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() //leer los registros
    {
        $estudiantes = Estudiante::all();
        return view('estudiantes.index', compact('estudiantes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() //abrir formulario para un nuevo registro
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) //guardar en la base de datos los nuevos registros
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) //visualizar un solo registro
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) //para editar un registro
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) //para actualiza un registro
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) //para eliminar un registro
    {
        //
    }
}
