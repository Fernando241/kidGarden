@extends('templates.template')

@section('title','galeria')

@section('Titulo','Galeria')

@section('contenido')
    <div class="contDos">
        <div class="contTres">
            {{-- boton para volver a la pagina galeria.index --}}
            <br>
            <div style="text-align: right">
                <a href="{{ route('galerias.index') }}"class="nav_menu">Volver</a><br><br>
            </div>
            <h2>Editar Galería</h2>
                        <form action="{{ route('galerias.update', $galeria->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div>
                    <label for="titulo"><b>Título</b></label><br>
                    <input type="text" name="titulo" id="titulo" value="{{ $galeria->titulo }}" class="areaText">
                </div><br><br>
                <div>
                    <label for="descripcion"><b>Descripción</b></label><br>
                    <textarea name="descripcion" id="descripcion" class="areaText">{{ $galeria->descripcion }}</textarea>
                </div><br><br>
                <div>
                    <label for="fotos"><b>Fotos</b></label>
                    <input type="file" name="fotos[]" id="fotos" multiple>
                </div><br><br>
                <div style="text-align: center">
                    <button type="submit" class="nav_menu">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
@endsection