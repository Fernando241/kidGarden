<?php

namespace App\Http\Controllers;

use App\Models\Acudiente;
use Illuminate\Http\Request;

class AcudienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        /* para hacer funcional la barra de busqueda */
        $search = $request->query('search');
        $acudientes = Acudiente::when($search, function ($query, $search) {
            return $query->where('documento_acudiente', 'like', "%{$search}%")
                        ->orWhere('nombres_acudiente', 'like', "%{$search}%")
                        ->orWhere('apellidos_acudiente', 'like', "%{$search}%")
                        ->orWhere('correo', 'like', "%{$search}%");
        })->paginate(15);
        
        return view('acudientes.index', compact('acudientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('acudientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $acudiente = Acudiente::find($id);
        return view('acudientes.show', compact('acudiente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $acudiente = Acudiente::find($id);
        return view('acudientes.edit', compact('acudiente'));
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
        //
    }
}
