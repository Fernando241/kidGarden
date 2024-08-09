@extends('adminlte::page')

@section('title', 'Detalles Acudiente')

@section('content_header')
    <div class="alert alert-info">
        <h2>Editar Acudiente</h2>
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
                    <select name="tipo_documento_acudiente" id="tipo_documento" class="form-control">
                        <option value="cédula de ciudadanía" {{ $acudiente->tipo_documento_acudiente == 'cédula de ciudadanía'?'selected' : '' }}>Cédula de Ciudadania</option>
                        <option value="cédula de extranjería" {{ $acudiente->tipo_documento_acudiente == 'cédula de extranjería'?'selected' : '' }}>Cédula de Extranjería</option>
                    </select>
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
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </div>
@stop