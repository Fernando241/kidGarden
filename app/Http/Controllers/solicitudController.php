<?php

namespace App\Http\Controllers;

use App\Models\Solicitud;
use Illuminate\Http\Request;

class SolicitudController extends Controller
{
    
    public function index(Request $request)
    {
        /* para hacer funcional la barra de busqueda */
    $search = $request->query('search');
    $solicituds = Solicitud::when($search, function ($query, $search) {
        return $query->where('documento', 'like', "%{$search}%")
                    ->orWhere('nombres', 'like', "%{$search}%")
                    ->orWhere('apellidos', 'like', "%{$search}%")
                    ->orWhere('grado', 'like', "%{$search}%");
    })->paginate(10);

        return view('solicituds.index', compact('solicituds'));
    }

    
    public function create()
    {
        return view('solicituds.create');
    }

    
    public function store(Request $request)
    {
        $solicitud = new Solicitud();
        $solicitud->tipo_documento = $request->input('tipo_documento');
        $solicitud->documento = $request->input('documento');
        $solicitud->nombres = $request->input('nombres');
        $solicitud->apellidos = $request->input('apellidos');
        $solicitud->fecha_nacimiento = $request->input('fecha_nacimiento');
        $solicitud->grado = $request->input('grado');
        $solicitud->tipo_documento_padre = $request->input('tipo_documento_padre');
        $solicitud->documento_padre = $request->input('documento_padre');
        $solicitud->nombres_padre = $request->input('nombres_padre');
        $solicitud->apellidos_padre = $request->input('apellidos_padre');
        $solicitud->telefono = $request->input('telefono');
        $solicitud->direccion = $request->input('direccion');
        $solicitud->correo = $request->input('correo');
        $solicitud->parentesco = $request->input('parentesco');
        $solicitud->save();

        return view('inicio');
    }

    
    public function show($id)
    {
        $solicitud = Solicitud::find($id);
        return view('solicituds.show', compact('solicitud'));
    }

    
    public function edit($id)
    {
        $solicitud = Solicitud::find($id);
        return view('solicituds.edit', compact('solicitud'));
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'tipo_documento' => 'required',
            'documento' => 'required|max:15',
            'nombres' => 'required|max:50',
            'apellidos' => 'required|max:50',
            'fecha_nacimiento' => 'required|date',
            'grado' => 'required',
            'tipo_documento_padre' => 'required',
            'documento_padre' => 'required|max:15',
            'nombres_padre' => 'required|max:50',
            'apellidos_padre' => 'required|max:50',
            'telefono' => 'required|max:15',
            'direccion' => 'required',
            'correo' => 'required|email|max:100',
            'parentesco' => 'required|max:30',
        ]);
    
        $solicitud = Solicitud::find($id);
        $solicitud->tipo_documento = $request->input('tipo_documento');
        $solicitud->documento = $request->input('documento');
        $solicitud->nombres = $request->input('nombres');
        $solicitud->apellidos = $request->input('apellidos');
        $solicitud->fecha_nacimiento = $request->input('fecha_nacimiento');
        $solicitud->grado = $request->input('grado');
        $solicitud->tipo_documento_padre = $request->input('tipo_documento_padre');
        $solicitud->documento_padre = $request->input('documento_padre');
        $solicitud->nombres_padre = $request->input('nombres_padre');
        $solicitud->apellidos_padre = $request->input('apellidos_padre');
        $solicitud->telefono = $request->input('telefono');
        $solicitud->direccion = $request->input('direccion');
        $solicitud->correo = $request->input('correo');
        $solicitud->parentesco = $request->input('parentesco');
        $solicitud->save();
    
        return redirect()->route('solicituds.index');
    }

    
    public function destroy($id)
    {
        $solicitud = Solicitud::find($id);
        if ($solicitud) {
            $solicitud->delete();
        }
        return redirect()->route('solicituds.index');
    }
}
