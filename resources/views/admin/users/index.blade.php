@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
<div class="alert alert-info">
    <h1>Lista de Usuarios registrados</h1>
    <div class="text-right">
        <a href="{{ route('dashboard') }}" class="btn btn-primary" style="text-decoration: none">Volver</a>
    </div>
</div>
@stop

@section('content')
    @livewire('admin.users-index')
@stop