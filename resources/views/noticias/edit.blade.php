@extends('adminlte::page')

@section('title', 'Editar Publicación')

@section('content_header')
    <div class="alert alert-info">
        <h1>Editar Publicación</h1>
        <div class="card-tools" style="text-align: right">
            <a href="{{ route('noticias.index') }}" class="btn btn-primary" style="text-decoration: none">Volver</a>
        </div>
    </div>
@endsection

@section('content')
    <div class="container">
        <h1>Editar Publicación</h1>
        <form action="{{ route('noticias.update', $noticia->id) }}" method="POST" enctype="multipart/form-data" id="solicitudForm">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="tema">Tema</label>
                <input type="text" class="form-control" id="tema" name="tema" value="{{ $noticia->tema }}" maxlength="50">
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="5">{{ $noticia->descripcion }}</textarea>
            </div>
            <div class="form-group">
                <label for="imagen">Imagen (opcional)</label>
                <input type="file" class="form-control-file" id="imagen" name="imagen" value="{{ asset('images/' . $noticia->imagen) }}">
            </div>
            <button type="submit" class="btn btn-primary">Editar Noticia</button>
        </form>
    </div>
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('solicitudForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevenir el envío del formulario

                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Publicación actualizada con exito!',
                    showConfirmButton: false,
                    timer: 1500
                }).then((result) => {
                    if (result.dismiss === Swal.DismissReason.timer) {
                        // Enviar el formulario después de mostrar la alerta
                        event.target.submit();
                    }
                });
            });
    </script>
@stop