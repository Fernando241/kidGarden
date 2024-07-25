@extends('adminlte::page')

@section('title', 'Editar Valores')
    
@section('content_header')
    <div class="card-header">
        <h2>Editar Valor</h2>
    <div class="text-right">
        <a href="{{ route('valores.index') }}" class="btn btn-primary">Volver</a>
    </div>
    </div>
@stop

@section('content')
    <div class="card" style="width: ">
        <div class="card-body">
            <form method="POST" action="{{ route('valores.update', $valor->id) }}" id="solicitudForm">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label><h3>{{ $valor->nombre }}</h3></label>
                </div>
                <div class="form-group">
                    <label>Frecuencia de Pago: <h3>{{ $valor->frecuencia_pago }}</h3></label>
                </div>
                <div class="form-group">
                    <label for="valor">Valor:</label>
                    <input type="text" class="form-control" id="valor" name="valor" required value="{{ $valor->valor }}">
                </div>
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </form>
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
                    title: 'Valor de {{ $valor->nombre }} actualizado con exito!',
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