@extends('adminlte::page')

@section('title', 'Crear Curso')



@section('content')

    <div class="container">
        <div class="card">
            <div class="card-header">
                Crear Nuevo Curso
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('cursos.store') }}">
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
                        <label for="docente">Docente Asignado</label>
                        <select class="form-control" id="docente" name="docente_id" required>
                            <option value="">Seleccione un docente</option>
                            {{-- @foreach ($docentes as $docente)
                                <option value="{{ $docente->id }}">{{ $docente->nombre }}</option>
                            @endforeach --}}
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Estudiantes Asignados</label>
                        <div>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEstudiantes">
                                Agregar Estudiantes
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="modalEstudiantes" tabindex="-1" role="dialog" aria-labelledby="modalEstudiantesLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalEstudiantesLabel">Agregar Estudiantes al Curso</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Aquí debo incluir una tabla con la lista de estudiantes disponibles -->
                                            <!-- Necesito implementar lógica adicional para seleccionar y agregar estudiantes -->
                                            <!-- Por ejemplo, checkboxes o botones de añadir -->
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                            <button type="button" class="btn btn-primary">Guardar Estudiantes</button>
                                        </div>
                                    </div>
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