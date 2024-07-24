@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<div class="card">
    <h3>Bienvenido {{ auth()->user()->name }}!</h3>
</div>

@stop

@section('content')
    <div class="container">
        <div class="row">
            <!-- Cuadro 1: Valores Educativos -->
            <div class="col-md-3">
                <div class="card">
                    <br><h4 class="card-title">valores Educativos</h4>
                    <img src="{{ asset('img/valoresEducativos.jpg') }}" class="card-img-top" alt="valores Educativos">
                    <div class="card-body">
                        
                        <a href="{{ route('valores.index') }}" class="btn btn-primary">Ver más</a>
                    </div>
                </div>
            </div>

            <!-- Cuadro 2: Pagos -->
            <div class="col-md-3">
                <div class="card">
                    <br><h4 class="card-title">Pagos</h4>
                    <img src="{{ asset('img/pagos.jpg') }}" class="card-img-top" alt="Pagos">
                    <div class="card-body">
                        <a href="{{ route('pagos') }}" class="btn btn-primary">Ver más</a>
                    </div>
                </div>
            </div>

            <!-- Cuadro 3: Bancos -->
            <div class="col-md-3">
                <div class="card">
                    <br><h4 class="card-title">Bancos</h4>
                    <img src="{{ asset('img/bancos.jpg') }}" class="card-img-top" alt="Bancos">
                    <div class="card-body">
                        <a href="{{ route('bancos') }}" class="btn btn-primary">Ver más</a>
                    </div>
                </div>
            </div>

            <!-- Cuadro 4: Agregar Administradores -->
            <div class="col-md-3">
                <div class="card">
                    <br><h4 class="card-title">Agregar Administradores</h4>
                    <img src="{{ asset('img/administradores.jpg') }}" class="card-img-top" alt="Agregar Administradores">
                    <div class="card-body">
                        <a href="{{ route('agregar.admin') }}" class="btn btn-primary">Ver más</a>
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
