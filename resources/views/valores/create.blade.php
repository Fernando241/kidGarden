@extends('adminlte::page')

@section('title', 'nuevo docente')

@section('content_header')
<div class="alert alert-info">
    <h1>Registrar nuevo valor educativo</h1>
    <div class="text-right">
        <a href="{{ route('valores.index') }}" class="btn btn-primary" style="text-decoration: none">Volver</a>
    </div>
</div>
@stop

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Formulario de Registro
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('valores.store') }}" id="solicitudForm">
                    @csrf
                    <div class="form-group">
                        <label for="nombre">Nombre de valor a registrar:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="valor">Valor:</label>
                        <input type="text" class="form-control" id="valor" name="valor" required>
                    </div>
                    <div class="form-group">
                        <label for="frecuencia_pago">Frecuencia de Pago:</label>
                        <select name="frecuencia_pago" id="frecuencia_pago" class="form-control">
                            <option value="">Seleccione una opción</option>
                            <option value="único pago">único pago</option>
                            <option value="mensual">Mensual</option>
                            <option value="semestral">Semestral</option>
                            <option value="anual">Anual</option>
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