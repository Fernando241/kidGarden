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
    <h3>Crear Matrícula</h3>

    <form method="POST" action="{{ route('matriculas.store') }}">
        @csrf
        <div class="mb-3">
            <label for="documento" class="form-label">Documento del Estudiante</label>
            <input type="text" class="form-control" id="documento" name="documento">
            <button type="button" class="btn btn-primary mt-2" id="buscarEstudiante">Buscar</button>
        </div>

        <div id="estudianteInfo" style="display: none;">
            <div class="mb-3">
                <label for="nombres" class="form-label">Nombres del Estudiante</label>
                <input type="text" class="form-control" id="nombres" name="nombres" readonly>
            </div>

            <div class="mb-3">
                <label for="apellidos" class="form-label">Apellidos del Estudiante</label>
                <input type="text" class="form-control" id="apellidos" name="apellidos" readonly>
            </div>

            <div class="mb-3">
                <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
                <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" readonly>
            </div>

            <div class="mb-3">
                <label for="grado" class="form-label">Grado Solicitado</label>
                <input type="text" class="form-control" id="grado" name="grado" readonly>
            </div>

            <input type="hidden" id="estudiante_id" name="estudiante_id">

            {{-- <h3>Datos del Acudiente</h3>

            <div class="mb-3">
                <label for="nombres_acudiente" class="form-label">Nombres del Acudiente</label>
                <input type="text" class="form-control" id="nombres_acudiente" name="nombres_acudiente" readonly>
            </div>

            <div class="mb-3">
                <label for="apellidos_acudiente" class="form-label">Apellidos del Acudiente</label>
                <input type="text" class="form-control" id="apellidos_acudiente" name="apellidos_acudiente" readonly>
            </div>

            <div class="mb-3">
                <label for="parentesco" class="form-label">Parentesco</label>
                <input type="text" class="form-control" id="parentesco" name="parentesco" readonly>
            </div>

            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="text" class="form-control" id="telefono" name="telefono" readonly>
            </div>

            <input type="hidden" id="acudiente_id" name="acudiente_id"> --}}

            <h3>Seleccionar Curso</h3>

            <div class="mb-3">
                <label for="curso_id" class="form-label">Curso</label>
                <select class="form-control" id="curso_id" name="curso_id">
                    @foreach($cursos as $curso)
                        <option value="{{ $curso->idCurso }}">{{ $curso->grado }} {{ $curso->seccion }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-success">Matricular</button>
        </div>

        <div id="error" style="display: none;" class="alert alert-danger mt-3">
            No existe un estudiante con este número de documento en nuestra base de datos.
        </div>
    </form>
</div>
@stop

@section('js')
    <script>
        document.getElementById('buscarEstudiante').addEventListener('click', function() {
            var documento = document.getElementById('documento').value;
            
            if (!documento) {
                alert('Por favor ingrese un documento');
                return;
            }
            
            fetch(`/buscar-estudiante/${documento}`)
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        alert(data.error);
                    } else {
                        document.getElementById('nombres').value = data.nombres;
                        document.getElementById('apellidos').value = data.apellidos;
                        document.getElementById('fecha_nacimiento').value = data.fecha_nacimiento;
                        document.getElementById('grado').value = data.grado;

                        //falta revisar como estos datos pueden ser enviados a esta vista
                        /* document.getElementById('nombres_acudiente').value = data.nombres_acudiente;
                        document.getElementById('apellidos_acudiente').value = data.apellidos_acudiente;
                        document.getElementById('parentesco').value = data.parentesco;
                        document.getElementById('telefono').value = data.telefono; */
                        document.getElementById('estudianteInfo').style.display = 'block';
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Ocurrió un error al buscar el estudiante');
                });
        });
    </script>

@stop