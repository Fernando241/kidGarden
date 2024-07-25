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
                <h3>Detalles del Grado {{ $curso->grado }} {{ $curso->seccion }}</h3>
            </div>
            <div class="card-body">
                <h5 class="card-title">Grado: {{ $curso->grado }}</h5>
                <p class="card-text">Sección: {{ $curso->seccion }}</p>
                <p class="card-text">Docente: {{ $curso->docente_id }}</p>


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
                        {{-- @foreach ($curso->estudiantes as $estudiante)
                            <tr>
                                <td>{{$loop->index + 1}}</td>
                                <td>{{ $estudiante->nombres }}</td>
                                <td>{{ $estudiante->apellidos }}</td>
                            </tr>
                        @endforeach --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop