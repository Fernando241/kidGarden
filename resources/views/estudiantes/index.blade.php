@extends('adminlte::page')

@section('title', 'Estudiantes')

@section('content_header')
    <h1>Lista de Estudiantes</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Documento</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Teléfono</th>
                        <th>Dirección</th>
                        <th>Correo</th>
                        <th colspan="2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($estudiantes as $estudiante)
                        <tr>
                            <td>{{ $estudiante->idEstudiante }}</td>
                            <td>{{ $estudiante->documento }}</td>
                            <td>{{ $estudiante->nombres }}</td>
                            <td>{{ $estudiante->apellidos }}</td>
                            <td>{{ $estudiante->telefono }}</td>
                            <td>{{ $estudiante->direccion }}</td>
                            <td>{{ $estudiante->correo }}</td>
                            <td>
                                <a href="{{ route('estudiante.edit', $estudiante)}}"><i class="fas fa-edit"></i></a>
                            </td>
                            <td>
                                <i class="fas fa-trash"></i>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop