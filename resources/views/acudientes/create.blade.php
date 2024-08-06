@extends('adminlte::page')

@section('title', 'Nuevo Acudiente')

@section('content_header')
    <div class="alert alert-info">
        <h3>Registrar Nuevo Acudiente</h3>
        <div class="text-right">
            <a href="{{ route('acudientes.index') }}" class="btn btn-primary" style="text-decoration: none">Volver</a>
        </div>
    </div>
@endsection

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('acudientes.store') }}">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <section>
                            <label for="tipo_documento">Tipo de Documento:</label>
                            <select class="form-control" id="tipo_documento" name="tipo_documento_acudiente" required>
                                <option value="">Seleccione...</option>
                                <option value="cédula de ciudadanía">Cédula de ciudadanía</option>
                                <option value="cédula de extranjería">Cédula de extrangería</option>
                            </select>
                        </section>
                    </div>
                    <div class="form-group">
                        <label for="documento">Documento:</label>
                        <input type="text" class="form-control" id="documento" name="documento_acudiente" required>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombres:</label>
                        <input type="text" class="form-control" id="nombre" name="nombres_acudiente" required>
                    </div>
                    <div class="form-group">
                        <label for="apellido">Apellidos:</label>
                        <input type="text" class="form-control" id="apellido" name="apellidos_acudiente" required>
                    </div>
                    <div class="form-group">
                        <label for="telefono">Teléfono:</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" required>
                    </div>
                    <div class="form-group">
                        <label for="direccion">Dirección:</label>
                        <input type="text" class="form-control" id="direccion" name="direccion" required>
                    </div>
                    <div class="form-group">
                        <label for="correo">Correo:</label>
                        <input type="email" class="form-control" id="correo" name="correo" required>
                    </div>
                    <div class="form-group">
                        <label for="parentesco">Parentesco:</label>
                        <input type="text" class="form-control" id="parentesco" name="parentesco" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </form>
    </div>
@stop