@extends('adminlte::page')

@section('title', 'Detalles de Curso')

@section('content_header')
    <div class="text-right">
        <a href="{{ route('cursos.index') }}" class="btn btn-primary">Volver</a>
    </div>
@stop

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Detalles del Grado:</h3>
                <h2><b style="color: blue">{{ $curso->grado }} - {{ $curso->seccion }}</b></h2>
            </div>
            <div class="card-body">
                <p class="card-text">Docente:
                    <select class="form-control" id="docente" name="docente_id" required>
                        <option value="">Seleccione un docente</option>
                        @foreach ($docentes as $docente)
                            <option value="{{ $docente->idDocente }}" @if ($curso->docente_id === $docente->idDocente) selected @endif>
                                {{ $docente->nombre }}
                            </option>
                        @endforeach
                    </select>
                </p>
                
                
                <h5>Estudiantes Asignados: </h5>
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($curso->estudiantes as $estudiante)
                            <tr>
                                <td>{{$loop->index + 1}}</td>
                                <td>{{ $estudiante->nombres }}</td>
                                <td>{{ $estudiante->apellidos }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop