@extends('adminlte::page')

@section('title', 'Nuevo Banco')

@section('content_header')
<div class="alert alert-info">
    <h1>Registrar nuevo Banco</h1>
    <div class="text-right">
        <a href="{{ route('bancos.index') }}" class="btn btn-primary" style="text-decoration: none">Volver</a>
    </div>
</div>
@stop

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('bancos.store') }}" id="solicitudForm">
                    @csrf
                    <div class="form-group">
                        <label for="banco">Nombre del Banco:</label>
                        <input type="text" class="form-control" id="banco" name="banco" required>
                    </div>
                    <div class="form-group">
                        <label for="codigo">Código:</label>
                        <input type="text" class="form-control" id="codigo" name="codigo" required>
                    </div>
                    <div class="form-group">
                        <label for="telefono">Télefono:</label>
                        <input class="form-control" id="telefono" name="telefono" required></input>
                    </div>
                    <button type="submit" class="btn btn-primary">Registrar</button>
            </div>
        </div>
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