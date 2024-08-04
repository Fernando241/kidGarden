@extends('adminlte::page')

@section('title', 'nuevo estudiante')

@section('content_header')
    <h2>Crear Nuevo Estudiante</h2>
@stop

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            Formulario de Registro
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('estudiantes.store') }}" id="solicitudForm">
                @csrf
                <div class="form-group">
                    <label for="tipo_documento">Tipo de Documento</label>
                    <input type="text" class="form-control" id="tipo_documento" name="tipo_documento" required>
                </div>
                <div class="form-group">
                    <label for="documento">Documento:</label>
                    <input type="text" class="form-control" id="documento" name="documento" required>
                </div>
                <div class="form-group">
                    <label for="nombres">Nombres:</label>
                    <input type="text" class="form-control" id="nombres" name="nombres" required>
                </div>
                <div class="form-group">
                    <label for="apellidos">Apellidos:</label>
                    <input type="text" class="form-control" id="apellidos" name="apellidos" required>
                </div>
                <div class="form-group">
                    <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                    <input type="text" class="form-control text-center" id="fecha_nacimiento" name="fecha_nacimiento" required>
                </div>
                <div class="form-group">
                    <label for="grado">Grado</label>
                    <input type="text" class="form-control text-center" id="grado" name="grado" required>
                </div>
                <div class="form-group">
                    <label for="acudiente_id">Acudiente</label>
                    <input type="text" class="form-control text-center" id="acudiente_id" name="acudiente_id" required>
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
                    title: 'Su registro a sido exitoso!',
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