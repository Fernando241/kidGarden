@extends('adminlte::page')

@section('title', 'Datos de la Solicitud')

@section('content_header')
    <div class="alert alert-info">
        <h3>Detalles de la Solicitud</h3>
        <div class="text-right">
            <a href="{{ route('solicituds.index') }}" class="btn btn-primary" style="text-decoration: none">Volver</a>
        </div>
    </div>
@stop

@section('content')
    <div class="container">
        <div class="card">
            
            <div class="card-body">
                <h3 style="text-align: center">Datos del Estudiante</h3><br>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <strong>Tipo de Documento:</strong>
                        <p>{{ $solicitud->tipo_documento }}</p>
                    </div>
                    <div class="col-md-6">
                        <strong>Documento:</strong>
                        <p>{{ $solicitud->documento }}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <strong>Nombres:</strong>
                        <p>{{ $solicitud->nombres }}</p>
                    </div>
                    <div class="col-md-6">
                        <strong>Apellidos:</strong>
                        <p>{{ $solicitud->apellidos }}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <strong>Fecha de Nacimiento:</strong>
                        <p>{{ $solicitud->fecha_nacimiento }}</p>
                    </div>
                    <div class="col-md-6">
                        <strong>Grado:</strong>
                        <p>{{ $solicitud->grado }}</p>
                    </div>
                </div><hr>
                <h3 style="text-align: center">Datos del Acudiente</h3><br>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <strong>Tipo de Documento del Acudiente:</strong>
                        <p>{{ $solicitud->tipo_documento_acudiente }}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <strong>Documento del Acudiente:</strong>
                        <p>{{ $solicitud->documento_acudiente }}</p>
                    </div>
                    <div class="col-md-6">
                        <strong>Nombre del Acudiente:</strong>
                        <p>{{ $solicitud->nombre_acudiente }}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <strong>Teléfono:</strong>
                        <p>{{ $solicitud->telefono }}</p>
                    </div>
                    <div class="col-md-6">
                        <strong>Dirección:</strong>
                        <p>{{ $solicitud->direccion }}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <strong>Correo:</strong>
                        <p>{{ $solicitud->correo }}</p>
                    </div>
                    <div class="col-md-6">
                        <strong>Parentesco:</strong>
                        <p>{{ $solicitud->parentesco }}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <strong>Fecha de Creación:</strong>
                        <p>
                            @if ($solicitud->created_at)
                                {{ $solicitud->created_at->format('d-m-Y H:i:s') }}
                            @else
                                -
                            @endif
                        </p>
                    </div>
                    <div class="col-md-6">
                        <strong>Última Actualización:</strong>
                        <p>
                            @if ($solicitud->updated_at)
                                {{ $solicitud->updated_at->format('d-m-Y H:i:s') }}
                            @else
                                -
                            @endif
                        </p>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
@stop
