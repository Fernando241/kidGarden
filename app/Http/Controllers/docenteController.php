<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use Illuminate\Http\Request;

class DocenteController extends Controller
{
    
    public function index(Request $request)
    {
        /* para hacer funcional la barra de busqueda */
    $search = $request->query('search');
    $docentes = Docente::when($search, function ($query, $search) {
        return $query->where('nombre', 'like', "%{$search}%")
                    ->orWhere('telefono', 'like', "%{$search}%")
                    ->orWhere('direccion', 'like', "%{$search}%")
                    ->orWhere('correo', 'like', "%{$search}%");
    })->paginate(10);
        
        return view('docentes.index', compact('docentes'));
    }

    
    public function create()
    {
        return view('docentes.create');
    }

    
    public function store(Request $request)
    {
        $docente = new Docente();
        $docente->nombre = $request->input('documento');
        $docente->telefono = $request->input('telefono');
        $docente->direccion = $request->input('direccion');
        $docente->correo = $request->input('correo');
        $docente->save();

        return redirect()->route('docentes.index');
    }

    
    public function show($idDocente)
    {
        $docente = Docente::find($idDocente);
        return view('docentes.show', compact('docente'));
    }

    
    public function edit($id)
    {
        $docente = Docente::find($id);
        return view('docentes.edit', compact('docente'));

    }

    
    public function update(Request $request, $idDocente)
    {
        $request->validate([
            'nombre' => 'required',
            'telefono' => 'required',
            'direccion' => 'required',
            'correo' => 'required|email',
        ]);

        $docente = Docente::find($idDocente);
        $docente->nombre = $request->input('nombre');
        $docente->telefono = $request->input('telefono');
        $docente->direccion = $request->input('direccion');
        $docente->correo = $request->input('correo');
        $docente->save();

        return redirect()->route('docentes.index');
    }

    
    public function destroy($idDocente)
    {
        $docente = Docente::find($idDocente);
        if ($docente) {
            $docente->delete();
        }
        return redirect()->route('docentes.index');
    }
}
