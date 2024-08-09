@extends('adminlte::page')

@section('title', 'Datos del Estudiante')

@section('content_header')
    <h1>Información del Estudiante</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Lista de Estudiantes</h3>
        </div>
        <div class="card-body">
            @if ($estudiantes->isEmpty())
                <p>No hay estudiantes asociados.</p>
            @else
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Documento</th>
                            <th>Grado</th>
                            <th>Fecha de Nacimiento</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($estudiantes as $estudiante)
                            <tr>
                                <td>{{ $estudiante->nombres }}</td>
                                <td>{{ $estudiante->apellidos }}</td>
                                <td>{{ $estudiante->documento }}</td>
                                <td>{{ $estudiante->grado }}</td>
                                <td>{{ $estudiante->fecha_nacimiento }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@stop
