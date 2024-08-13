@extends('adminlte::page')

@section('title', 'Pagos')

@section('content_header')
    <h1>Pagos</h1>
@stop

@section('content')

    @if(\Session::has('error'))
        <div class="alert alert-warning">{{ \Session::get('error') }}</div>
        {{ \Session::forget('error') }}
    @endif

    @if(\Session::has('success'))
        <div class="alert alert-success">{{ \Session::get('success') }}</div>
        {{ \Session::forget('success') }}
    @endif    
    <div class="card">
        <div class="card-body">
            <h3>Valores a Pagar</h3>
            @foreach($valores as $valor)
                <div class="mb-3">
                    <h4>{{ $valor->nombre }}</h4>
                    <p><strong>Valor:</strong> ${{ number_format($valor->valor, 2) }}</p>
                    <p><strong>Frecuencia de Pago:</strong> {{ $valor->frecuencia_pago }}</p>
                    {{-- <a href="{{ route('processPaypal') }}" class="btn btn-primary">Pagar ${{ number_format($valor->valor, 2) }}</a> --}}
                    <form action="{{ route('processPaypal') }}" method="POST">
                        @csrf
                        <input type="hidden" name="valor_id" value="{{ $valor->id }}">
                        <button type="submit" class="btn btn-primary">Pagar ${{ number_format($valor->valor, 2) }}</button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>

@stop