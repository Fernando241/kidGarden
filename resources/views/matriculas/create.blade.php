@extends('adminlte::page')

@section('title', 'Matriculas')

@section('content_header')
    <div class="alert alert-info">
        <h1>Crear Nueva Matricula</h1>
        <div class="text-right">
            <a href="{{ route('matriculas.index') }}" class="btn btn-primary" style="text-decoration: none">Volver</a>
        </div>
    </div>
@stop

@section('content')
    <div class="container">
        
            <div class="mb-3">
                <label for="documento" class="form-label">Documento del Estudiante</label>
                <input type="text" class="form-control" id="documento" name="documento" placeholder="Digite aquí el número de documento del estudiante a matricular">
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

                <!-- los siguientes son los datos que se guardarán en mi tabla de matrículas -->

                <form id="matriculaForm" action="{{ route('matriculas.store') }}" method="POST">
                    @csrf  {{-- token de seguridad --}}

                    <input type="hidden" id="estudiante_id" name="estudiante_id">
                    <input type="hidden" id="acudiente_id" name="acudiente_id">

                    <div class="mb-3">
                        <label for="curso_id" class="form-label">Curso</label>
                        <select class="form-control" id="curso_id" name="curso_id">
                            <option value="">Seleccione un curso</option>
                            @foreach($cursos as $curso)
                                <option value="{{ $curso->idCurso }}">{{ $curso->grado }} : {{ $curso->seccion }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="situacion" class="form-label">Situación</label>
                        <select class="form-control" name="situacion" id="situacion" required>
                            <option value="">Seleccione una opción</option>
                            <option value="nuevo estudiante">Nuevo Estudiante</option>
                            <option value="promovido">Promovido</option>
                            <option value="repitente">Repitente</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="procedencia" class="form-label">Procedencia</label>
                        <select class="form-control" name="procedencia" id="procedencia" required>
                            <option value="">Seleccione una opción</option>
                            <option value="Misma Institución">Misma Institución</option>
                            <option value="Otra Institución">Otra Institución</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success mt-2">Realizar Matrícula</button>
                </form>
            </div>
        
    </div>
@stop

@section('js')
{{--     este script es el que me ayuda a buscar los datos del estudiante --}}
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
                        document.getElementById('estudiante_id').value = data.idEstudiante;
                        document.getElementById('nombres').value = data.nombres;
                        document.getElementById('apellidos').value = data.apellidos;
                        document.getElementById('fecha_nacimiento').value = data.fecha_nacimiento;
                        document.getElementById('grado').value = data.grado;
                        document.getElementById('acudiente_id').value = data.acudiente.id;
    
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