<?php

namespace App\Http\Controllers;

use App\Models\Valor;
use Illuminate\Http\Request;

class ValorController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:valores.edit')->only('edit','update');
        $this->middleware('can:valores.create')->only('create', 'store');
    }
    
    public function index()
    {
        $valor = Valor::all();
        return view('valores.index', compact('valor'));
    }

    public function create()
    {
        return view('valores.create');
    }

    public function store(Request $request)
    {
        $valor = new Valor();
        $valor->nombre = $request->input('nombre');
        $valor->valor = $request->input('valor');
        $valor->frecuencia_pago = $request->input('frecuencia_pago');
        $valor->save();

        return redirect()->route('valores.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $valor = Valor::find($id);
        return view('valores.edit', compact('valor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'valor' => 'required',
        ]);

        $valor = Valor::find($id);
        $valor->valor = $request->get('valor');
        $valor->save();

        return redirect()->route('valores.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
