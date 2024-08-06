@extends('adminlte::page')

@section('title', 'Costos Educativos')

@section('content_header')
<div class="alert alert-info" style="text-align: center">
    <h1><strong>Valores Educativos</strong></h1>
    <h4>Para el año vigente</h4>
    <div class="text-right">
        <a href="{{ route('dashboard') }}" class="btn btn-primary" style="text-decoration: none">Volver</a>
    </div>
</div>
@stop

@section('content')
<div class="card-body">
    {{-- agregar nuevo valor educativo --}}
    @can('valores.create')
        <a href="{{ route('valores.create') }}" class="btn btn-primary">Agregar Nuevo Valor</a>
    @endcan
    

    <div class="card-body">
        <div class="card">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Valor Educativo</th>
                        <th>Frecuencia de pago</th>
                        @can('valores.edit')
                            <th>Editar Valor</th>
                        @endcan
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($valor as $valor)
                        <tr>
                            <td>{{ $valor->id }}</td>
                            <td>{{ $valor->nombre }}</td>
                            <td>$ {{ number_format($valor->valor, 0, ',', '.') }}</td>
                            <td>{{ $valor->frecuencia_pago }}</td>
                            @can('valores.edit')
                            <td>
                                <a href="{{ route('valores.edit', $valor->id) }}"><i class="fas fa-edit"></i></a>
                            </td>
                            @endcan
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
    
@stop