@extends('adminlte::page')

@section('title', 'Matriculas')

@section('content_header')
    <h1>Matriculas</h1>
    <div class="card-header">
        <div class="card-tools">
            <a href="{{ route('matriculas.index') }}" class="btn btn-primary">Volver</a>
        </div>
    </div>
@stop

@section('content')
    <div class="container">
        <div class="card-body">
            <h3 style="text-align: center">Detalles de la matrícula</h3><br>
            <div class="form-group mb-3">
                <p><strong>Código de Matrícula:</strong> {{ $matricula->codigo_matricula }}</p>
                <p><strong>Nombres del Estudiante:</strong> {{ $matricula->estudiante->nombres }} {{ $matricula->estudiante->apellidos }}</p>
                
            </div>
            <p><strong>Fecha de Nacimiento:</strong> {{ $matricula->estudiante->fecha_nacimiento }}</p>
            <p><strong>Curso:</strong> {{ $matricula->curso->grado }}  {{ $matricula->curso->seccion }}</p>
            <p><strong>Fecha de Matrícula:</strong> {{ $matricula->created_at }}</p><hr>
            <h3 style="text-align: center">Datos del Acudiente</h3><br>
            <p><strong>Nombres del Acudiente:</strong> {{ $matricula->estudiante->acudiente->nombres_acudiente }} {{ $matricula->estudiante->acudiente->apellidos_acudiente }}</p>
            <p><strong>Parentesco:</strong> {{ $matricula->estudiante->acudiente->parentesco }}</p>
            <p><strong>Teléfono:</strong> {{ $matricula->acudiente->telefono }}</p>
            <p><strong>Correo:</strong> {{ $matricula->acudiente->correo }}</p>
            <hr>
            <table class="table table-striped">
                <h3 style="text-align: center">Valores Educativos</h3><br>
                <thead>
                    <tr>
                        <th>Concepto</th>
                        <th>Valor</th>
                        <th>Frecuencia de Pago</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($valor as $valor)
                        <tr>
                            <td>{{ $valor->nombre }}</td>
                            <td>$ {{ number_format($valor->valor, 0, ',', '.') }}</td>
                            <td>{{ $valor->frecuencia_pago }}</td>
                        </tr>
                    @endforeach
                </tbody>
        </table>
            
    </div>

@stop


