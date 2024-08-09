@extends('adminlte::page')

@section('title', 'Detalles Acudiente')

@section('content_header')
    <div class="alert alert-info">
        <h2>Detalles Acudiente</h2>
        <div class="text-right">
            <a href="{{ route('acudientes.index') }}" class="btn btn-primary" style="text-decoration: none">Volver</a>
        </div>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('acudientes.update', $acudiente->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="tipo_documento">Tipo de documento:</label>
                    <input type="text" class="form-control" id="tipo_documento" name="tipo_documento_acudiente" value="{{ $acudiente->tipo_documento_acudiente }}">
                </div>
                <div class="form-group">
                    <label for="documento">Documento:</label>
                    <input type="text" class="form-control" id="documento" name="documento" value="{{ $acudiente->documento_acudiente }}">
                </div>
                <div class="form-group">
                    <label for="nombre">Nombre Completo:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre_acudiente" value="{{ $acudiente->nombre_acudiente }}">
                </div>
                <div class="form-group">
                    <label for="telefono">Teléfono:</label>
                    <input type="text" class="form-control" id="telefono" name="telefono" value="{{ $acudiente->telefono }}">
                </div>
                <div class="form-group">
                    <label for="direccion">Dirección:</label>
                    <input type="text" class="form-control" id="direccion" name="direccion" value="{{ $acudiente->direccion }}">
                </div>
                <div class="form-group">
                    <label for="correo">Correo:</label>
                    <input type="email" class="form-control" id="correo" name="correo" value="{{ $acudiente->correo }}">
                </div>
                <div class="form-group">
                    <label for="parentesco">Parentesco:</label>
                    <input type="text" class="form-control" id="parentesco" name="parentesco" value="{{ $acudiente->parentesco }}">
                </div>
            </form>
        </div>
    </div>
@stop