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
                        <label for="telefono">Telefono</label>
                        <input type="text" class="form-control text-center" id="telefono" placeholder="Telefono" value="{{ $estudiante->telefono }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="direccion">Dirección</label>
                        <input type="text" class="form-control text-center" id="direccion" placeholder="Dirección" value="{{ $estudiante->direccion }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="email">Correo electrónico</label>
                        <input type="email" class="form-control text-center" id="email" placeholder="Correo electrónico" value="{{ $estudiante->correo }}" readonly>
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