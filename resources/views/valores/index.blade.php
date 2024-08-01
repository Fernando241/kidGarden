@extends('adminlte::page')

@section('title', 'Costos Educativos')

@section('content_header')
    <div class="card" style="text-align: center">
        <h1  class="text-primary"> <b>Valores Educativos</b> </h1><br>
        <h4 class="text-primary">Para el año vigente</h4>
    </div>
@stop

@section('content')
    
    <div class="card-header">
        <h3 class="card-title">Valores Educativos</h3>
        <div class="card-tools">
            <a href="{{ route('dashboard') }}" class="btn btn-primary">Volver</a>
        </div>
    </div>
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
@stop