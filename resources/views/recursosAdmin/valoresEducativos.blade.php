@extends('adminlte::page')

@section('title', 'Costos Educativos')

@section('content_header')
    <h1>valores Educativos</h1>
@stop

@section('content')
    <div class="card" style="text-align: center">
        <p>En esta sección podras ver, editar, crear y eliminar los valores Educativos que se van a aplicar al año vigente</p>
    </div>
    <div class="card-header">
        <h3 class="card-title">Valores Educativos</h3>
        <div class="card-tools">
            <a href="#}" class="btn btn-primary">Agregar Nuevo</a>
        </div>
    </div>
    <div class="card-body">
        <div class="card">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Valor Educativo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($valores as $valor)
                        <tr>
                            <td>{{ $valor->id }}</td>
                            <td>{{ $valor->nombre }}</td>
                            <td>{{ $valor->descripcion }}</td>
                            <td>{{ $valor->valor }}</td>
                            <td>
                                <a href="{{ route('valores.edit', $valor->id) }}"><i class="fas fa-edit"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop