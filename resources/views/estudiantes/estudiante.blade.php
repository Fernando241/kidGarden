@extends('adminlte::page')

@section('title', 'Información del Estudiante')

@section('content_header')
    <h1>Información del Estudiante</h1>
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Información del Estudiante') }}</div>

                    <div class="card-body">
                        <ul>
                            <li><strong>Tipo de Documento:</strong> {{-- {{ $estudiante->tipo_documento }} --}}</li>
                            <li><strong>Número de Documento:</strong>{{--  {{ $estudiante->documento }} --}}</li>
                            <li><strong>Nombres:</strong>{{--  {{ $estudiante->nombres }} --}}</li>
                            </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop