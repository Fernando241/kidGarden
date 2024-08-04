@extends('adminlte::page')

@section('title', 'Editar Estudiante')

@section('content_header')
    <h2>Editar estudiante</h2>
@stop

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            Formulario de Registro
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('estudiantes.update', $estudiante->idEstudiante) }}" id="solicitudForm">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="tipo_documento">Tipo de Documento</label>
                    <input type="text" class="form-control text-center" id="tipo_documento"value="{{ $estudiante->tipo_documento }}">
                </div>
                <div class="form-group">
                    <label for="documento">Documento:</label>
                    <input type="text" class="form-control" id="documento" name="documento" value=" {{ $estudiante->documento }}">
                </div>
                <div class="form-group">
                    <label for="nombres">Nombres:</label>
                    <input type="text" class="form-control" id="nombres" name="nombres" value=" {{ $estudiante->nombres }}">
                </div>
                <div class="form-group">
                    <label for="apellidos">Apellidos:</label>
                    <input type="text" class="form-control" id="apellidos" name="apellidos" value=" {{ $estudiante->apellidos }}">
                </div>
                <div class="form-group">
                    <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                    <input type="text" class="form-control text-center" id="fecha_nacimiento"value="{{ $estudiante->fecha_nacimiento }}">
                </div>
                <div class="form-group">
                    <label for="grado">Grado</label>
                    <input type="text" class="form-control text-center" id="grado" value="{{ $estudiante->grado }}">
                </div>
                <div class="form-group">
                    <label for="acudiente_id">Acudiente</label>
                    <input type="text" class="form-control text-center" id="acudiente_id" value="{{ $estudiante->acudiente_id }}">
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
@stopp