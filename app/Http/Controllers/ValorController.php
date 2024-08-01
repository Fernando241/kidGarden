<?php

namespace App\Http\Controllers;

use App\Models\Valor;
use Illuminate\Http\Request;

class ValorController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:valores.edit')->only('edit','update');
    }
    
    public function index()
    {
        $valor = Valor::all();
        return view('valores.index', compact('valor'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
