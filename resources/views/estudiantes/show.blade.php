@extends('adminlte::page')

@section('title', 'Datos Estudiante')

@section('content_header')
    <div class="row mb-4">
        <div class="col-md-10">
            <h1>Detalles del Estudiante</h1>
        </div>
        <div class="col-md-2 text-right">
            <a href="{{ route('estudiantes.index') }}" class="btn btn-primary">Volver</a>
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
                        <label for="tipo_documento">Tipo de Documento</label>
                        <input type="text" class="form-control text-center" id="tipo_documento" placeholder="Tipo de Documento" value="{{ $estudiante->tipo_documento }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="documento">Documento</label>
                        <input type="text" class="form-control text-center" id="documento" placeholder="Documento" value="{{ $estudiante->documento }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nombres">Nombres</label>
                        <input type="text" class="form-control text-center" id="nombres" placeholder="Nombres" value="{{ $estudiante->nombres }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="apellidos">Apellidos</label>
                        <input type="text" class="form-control text-center" id="apellidos" placeholder="Apellidos" value="{{ $estudiante->apellidos }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                        <input type="text" class="form-control text-center" id="fecha_nacimiento" placeholder="Fecha de Nacimiento" value="{{ $estudiante->fecha_nacimiento }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="grado">Grado</label>
                        <input type="text" class="form-control text-center" id="grado" placeholder="Grado" value="{{ $estudiante->grado }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="acudiente_id">Acudiente</label>
                        <input type="text" class="form-control text-center" id="acudiente_id" placeholder="Correo electrónico" value="{{ $estudiante->acudiente_id }}" readonly>
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