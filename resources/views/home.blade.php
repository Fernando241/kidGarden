@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Tablero</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-title">Bienvenido</div>
        </div>
        <div class="card-body">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam sunt id exercitationem facere qui repellendus vel incidunt expedita assumenda, sapiente et nesciunt ut delectus a consectetur. Harum debitis explicabo qui.</p>
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