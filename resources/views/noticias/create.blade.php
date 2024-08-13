@extends('adminlte::page')

@section('title', 'Añadir Noticia')

@section('content_header')
    <div class="alert alert-info">
        <h1>Añadir Noticia</h1>
        <div class="card-tools" style="text-align: right">
            <a href="{{ route('noticias.index') }}" class="btn btn-primary" style="text-decoration: none">Volver</a>
        </div>
    </div>
@endsection

@section('content')
    <div class="container">
        <h1>Crear Noticia</h1>
        <form action="{{ route('noticias.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="tema">Tema</label>
                <input type="text" class="form-control" id="tema" name="tema" required maxlength="50">
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="5" required></textarea>
            </div>
            <div class="form-group">
                <label for="imagen">Imagen (opcional)</label>
                <input type="file" class="form-control-file" id="imagen" name="imagen">
            </div>
            <button type="submit" class="btn btn-primary">Crear Noticia</button>
        </form>
    </div>
@stop
