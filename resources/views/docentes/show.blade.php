@extends('adminlte::page')

@section('title', 'Datos Docente')

@section('content_header')
    <div class="row mb-4">
        <div class="col-md-10">
            <h1>Detalles del Docente</h1>
        </div>
        <div class="col-md-2 text-right">
            <a href="{{ route('docentes.index') }}" class="btn btn-primary">Volver</a>
        </div>
    </div>
@stop

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Información Completa</div>
            <div class="card-body">
                <form>
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control text-center" id="nombre" value="{{ $docente->nombre }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="telefono">telefono</label>
                        <input type="text" class="form-control text-center" id="telefono" value="{{ $docente->telefono }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="direccion">Dirección</label>
                        <input type="text" class="form-control text-center" id="direccion" value="{{ $docente->direccion }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="correo">Correo</label>
                        <input type="text" class="form-control text-center" id="correo" value="{{ $docente->correo }}" readonly>
                    </div>
                    
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

@stop