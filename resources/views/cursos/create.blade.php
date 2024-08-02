@extends('adminlte::page')

@section('title', 'Crear Curso')

@section('content_header')
    <div class="text-right">
        <a href="{{ route('cursos.index') }}" class="btn btn-primary">Volver</a>
    </div>
@stop

@section('content')

    <div class="container">
        <div class="card">
            <div class="card-header">
                Crear Nuevo Curso
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('cursos.store') }}" id="solicitudForm">
                    @csrf

                    <div class="form-group">
                        <label for="grado">Grado</label>
                        <select class="form-control" name="grado" id="grado" required>
                            <option value="">Seleccione un grado</option>
                            <option value="Párvulos">Párvulos</option>
                            <option value="Pre-jardín">Pre-jardín</option>
                            <option value="Jardín">Jardín</option>
                            <option value="Transición">Transición</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="seccion">Sección</label>
                        <select class="form-control" name="seccion" id="seccion" required>
                            <option value="">Seleccione una sección</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="docente">Docente</label>
                        <select class="form-control" id="docente" name="docente_id" required>
                            <option value="">Seleccione un docente</option>
                            @foreach ($docentes as $docente)
                                <option value="{{ $docente->idDocente }}">{{ $docente->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Estudiantes Asignados</label>
                        <div>
                            
                            
                            <div class="form-group">
                                <label>Estudiantes Asignados</label>
                                <div>
                                    @foreach ($estudiantesDisponibles as $estudiante)
                                        <div>
                                            <input type="checkbox" name="estudiantes[]" value="{{ $estudiante->idEstudiante }}">
                                            {{ $estudiante->nombres }} {{ $estudiante->apellidos }}
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary text-right">Guardar Curso</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('solicitudForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevenir el envío del formulario

                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Su solicitud a sido enviada con exito!',
                    showConfirmButton: false,
                    timer: 1500
                }).then((result) => {
                    if (result.dismiss === Swal.DismissReason.timer) {
                        // Enviar el formulario después de mostrar la alerta
                        event.target.submit();
                    }
                });
            });
    </script>
@stop