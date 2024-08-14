<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use Illuminate\Http\Request;

class NoticiaController extends Controller
{
    public function index()
    {
        $noticias = Noticia::orderBy('created_at', 'desc')->paginate(15);
        return view('noticias.index', compact('noticias'));
    }

    public function create()
    {
        return view('noticias.create');
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
    $request->validate([
        'tema' => 'required|max:50',
        'descripcion' => 'required',
        'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Crear una nueva instancia de Noticia
    $noticia = new Noticia();
    $noticia->tema = $request->tema;
    $noticia->descripcion = $request->descripcion;

    // Manejar la carga de la imagen si se proporciona
    if ($request->hasFile('imagen')) {
        $fileName = time() . '.' . $request->imagen->extension();
        $request->imagen->move(public_path('images'), $fileName);
        $noticia->imagen = $fileName;
    }

    // Guardar la noticia en la base de datos
    $noticia->save();

    // Redirigir a la vista de índice con un mensaje de éxito
    return redirect()->route('noticias.index')->with('success', 'Noticia creada exitosamente.');
    }

    
    public function edit($id)
    {
        $noticia = Noticia::find($id);
        return view('noticias.edit', compact('noticia'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'tema' =>'required|max:50',
            'descripcion' =>'required',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $noticias = Noticia::find($id);
        $noticias->tema = $request->input('tema');
        $noticias->descripcion = $request->input('descripcion');

        // Manejar la carga de la imagen si se proporciona
        if ($request->hasFile('imagen')) {
            if ($noticias->imagen) {
                unlink(public_path('images/'. $noticias->imagen));
            }
            $fileName = time(). '.'. $request->imagen->extension();
            $request->imagen->move(public_path('images'), $fileName);
            $noticias->imagen = $fileName;
        }

        $noticias->save();

        // Redirigir a la vista de índice con un mensaje de éxito
        return redirect()->route('noticias.index');

    }

    public function destroy($id)
    {
        $noticia = Noticia::find($id);
        if ($noticia) {
            $noticia->delete();
        }

        return redirect()->route('noticias.index');
    }
}
