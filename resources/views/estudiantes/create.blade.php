@extends('adminlte::page')

@section('title', 'nuevo estudiante')

@section('content_header')
<div class="alert alert-info">
    <h2>Crear Nuevo Estudiante</h2>
    <div class="text-right">
        <a href="{{ route('estudiantes.index') }}" class="btn btn-primary" style="text-decoration: none">Volver</a>
    </div>
    <p>Nota: Para crear un nuevo estudiante registre primero el acudiente en la tabla correspondiente</p>
</div>
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
                <label for="tipo_documento">Tipo de documento *</label>
                    <select name="tipo_documento" id="tipo_documento" class="form-control" required>
                        <option value="">Seleccionar</option>
                        <option value="nacido vivo">Nacido Vivo</option>
                        <option value="registro civil">Registro Civil</option>
                        <option value="tarjeta de identidad">Tarjeta de Identidad</option>
                        <option value="tarjeta de extranjería">Tarjeta de Extranjería</option>
                    </select>
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
                <div class="campos">
                    <label for="fecha_nacimiento">fecha de nacimiento *</label>
                    <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" required>
                </div>
                <div class="campos">
                    <label for="grado">Grado *</label>
                    <select name="grado" id="grado" class="form-control" required>
                        <option value="">selecione el grado</option>
                        <option value="Parvulos">Pärvulos (2 a 3 años)</option>
                        <option value="Pre Jardin">Pre-jardín (3 a 4 años)</option>
                        <option value="Jardin">Jardín (4 a 5 años)</option>
                        <option value="Transicion">Transición (5 a 6 años)</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="acudiente_id">Acudiente</label>
                    <select class="form-control" id="acudiente" name="acudiente_id" required>
                        <option value="">Seleccione un acudiente</option>
                        @foreach ($acudientes as $acudiente)
                            <option value="{{ $acudiente->id }}">{{ $acudiente->nombres_acudiente }} {{ $acudiente->apellidos_acudiente }}</option>
                        @endforeach
                    </select>
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