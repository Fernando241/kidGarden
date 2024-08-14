<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\Galeria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriaController extends Controller
{

    public function index()
    {
        $galerias = Galeria::orderBy('created_at', 'desc')->paginate(15);
        return view('galeria.index', compact('galerias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('galeria.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $galeria = Galeria::create($request->only('titulo', 'descripcion'));

        /* if ($request->hasFile('fotos')) {
            foreach ($request->file('fotos') as $fotos) {
                $path = $fotos->store('fotos');
                Foto::create(['galeria_id' => $galeria->id, 'ruta_fotos' => $path]);
            }
        } */
        if ($request->hasFile('fotos')) {
            foreach ($request->file('fotos') as $foto) {
                $path = $foto->store('fotos', 'public');
                Foto::create(['galeria_id' => $galeria->id, 'ruta_fotos' => $path]);
            }
        }

        return redirect()->route('galerias.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Galeria $galeria)
    {
        //
    }

        public function edit($id)
    {
        $galeria = Galeria::findOrFail($id);
        return view('galeria.edit', compact('galeria'));
    }

    public function update(Request $request, $id)
    {
        $galeria = Galeria::findOrFail($id);
        $galeria->update($request->only('titulo', 'descripcion'));

        if ($request->hasFile('fotos')) {
            foreach ($request->file('fotos') as $foto) {
                $path = $foto->store('fotos', 'public');
                Foto::create(['galeria_id' => $galeria->id, 'ruta_fotos' => $path]);
            }
        }

        return redirect()->route('galerias.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $galeria = Galeria::findOrFail($id);

        // Eliminar las fotos asociadas
        foreach ($galeria->fotos as $foto) {
            // Eliminar el archivo de la foto del almacenamiento
            Storage::disk('public')->delete($foto->ruta_fotos);
            // Eliminar el registro de la foto
            $foto->delete();
        }

        // Eliminar la galería
        $galeria->delete();

        return redirect()->route('galerias.index');
    }
}
