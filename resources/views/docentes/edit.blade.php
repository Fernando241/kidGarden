@extends('adminlte::page')

@section('title', 'Editar Docente')

@section('content_header')
    <div class="alert alert-info">
        <h3>Editar Docente</h3>
        <div class="text-right">
            <a href="{{ route('docentes.index') }}" class="btn btn-primary" style="text-decoration: none">Volver</a>
        </div>
    </div>
@stop

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            Formulario de Edición
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('docentes.update', $docente->idDocente) }}" id="solicitudForm">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nombre">Nombre Completo:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value=" {{ $docente->nombre }}">
                </div>
                <div class="form-group">
                    <label for="telefono">Teléfono:</label>
                    <input type="text" class="form-control" id="telefono" name="telefono" value=" {{ $docente->telefono }}">
                </div>
                <div class="form-group">
                    <label for="direccion">Dirección:</label>
                    <input type="text" class="form-control" id="direccion" name="direccion" value=" {{ $docente->direccion }}">
                </div>
                <div class="form-group">
                    <label for="correo">Correo:</label>
                    <input type="email" class="form-control" id="correo" name="correo" value=" {{ $docente->correo }}">
                </div>    
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </div>
</div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('solicitudForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevenir el envío del formulario

                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Registro actualizado con exito!',
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