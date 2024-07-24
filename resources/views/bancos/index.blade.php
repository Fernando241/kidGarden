@extends('Dashboard::page')

@section('title', 'Bancos')
    
@section('content_header')
    <h2>Lista de Bancos</h2>
@endsection

@section('content')
    <div class="card-header">
        <div class="text-right">
            <a href="{{ route('bancos.create') }}" class="btn btn-primary">Agregar Nuevo</a>
        </div>
    </div>
@stop