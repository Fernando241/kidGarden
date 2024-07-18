@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>
    {{-- Aquí es donde tengo que colocar todos los datos de la tabla correspondiente a cada pestaña o tabla --}}
    {{-- mostrar un formulario para mi tabla estudiante en un formulario usando los estilos de bootstrap --}}
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script>
        Swal.fire({
            title: "Good job!",
            text: "You clicked the button!",
            icon: "success"
        });
    </script>
    
@stop