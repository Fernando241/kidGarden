<?php

namespace App\Http\Controllers;

use App\Models\Banco;
use Illuminate\Http\Request;

class BancoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bancos = Banco::all();
        return view('bancos.index', compact('bancos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bancos = Banco::all();
        return view('bancos.create', compact('bancos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $banco = new Banco();
        $banco->banco = $request->input('banco');
        $banco->codigo = $request->input('codigo');
        $banco->telefono = $request->input('telefono');
        $banco->save();

        return redirect()->route('bancos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Banco $banco)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $banco = Banco::find($id);
        return view('bancos.edit', compact('banco'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $banco = Banco::find($id);
        $banco->banco = $request->input('banco');
        $banco->codigo = $request->input('codigo');
        $banco->telefono = $request->input('telefono');
        $banco->save();

        return redirect()->route('bancos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $banco = Banco::find($id);
        if ($banco) {
            $banco->delete();
        }
        return redirect()->route('bancos.index');
    }
}
