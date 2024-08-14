@extends('templates.template')

@section('title','galeria')

@section('Titulo','Galeria')

@section('contenido')
    <div class="contDos">
        <div class="contTres">
            <strong>Crear Galería</strong>
            <form action="{{ route('galerias.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="titulo"><b>Título</b></label><br>
                    <input type="text" name="titulo" id="titulo" class="areaText">
                </div><br>
                <div>
                    <label for="descripcion"><b>Descripción</b></label><br>
                    <textarea name="descripcion" id="descripcion" class="areaText"></textarea>
                </div><br>
                <div>
                    <label for="fotos"><b>Fotos</b></label><br>
                    <input type="file" name="fotos[]" id="fotos" multiple>
                </div><br>
                <button type="submit" class="nav_menu">Guardar</button>
            </form>
        </div>
    </div>
@endsection