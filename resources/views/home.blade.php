@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<div class="card">
    <br>
    <h3 class="text-primary"><strong class="text-blue">Jardín Infantil Genios Del Saber</strong></h3>
    <h5>Bienvenid@:  {{ auth()->user()->name }}!</h5><br>
</div>

@stop

@section('content')
    <div class="container">
        <div class="row">
            <!-- Cuadro 1: Valores Educativos -->
            <div class="col-md-4">
                <div class="card">
                    <br><h4 class="card-title">Página Principal</h4>
                    <img src="{{ asset('img/niños3.jpg') }}" class="card-img-top" alt="valores Educativos">
                    <div class="card-body">
                        
                        <a href="{{ route('inicio') }}" class="btn btn-primary">Volver</a>
                    </div>
                </div>
            </div>

            <!-- Cuadro 2: Pagos -->
            <div class="col-md-4">
                <div class="card">
                    <br><h4 class="card-title">Solicitar Cupo</h4>
                    <img src="{{ asset('img/solicitud.jpg') }}" class="card-img-top" alt="Pagos">
                    <div class="card-body">
                        <a href="{{ route('solicituds.create') }}" class="btn btn-primary">Ver más</a>
                    </div>
                </div>
            </div>

            <!-- Cuadro 3: Bancos -->
            <div class="col-md-4">
                <div class="card">
                    <br><h4 class="card-title">Valores Educativos</h4>
                    <img src="{{ asset('img/pagos.jpg') }}" class="card-img-top" alt="Bancos">
                    <div class="card-body">
                        <a href="{{ route('valores.index') }}" class="btn btn-primary">Ver más</a>
                    </div>
                </div>
            </div>

            
        </div>
    </div>
@stop

@section('css')
<style>
    .card {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
    }
</style>
@stop
