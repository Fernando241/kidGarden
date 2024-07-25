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
                        <label for="docente">Docente Asignado</label>
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
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Nombres</th>
                                                        <th>Apellidos</th>
                                                        <th>Seleccionar</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($estudiantes as $estudiante)
                                                        <tr>
                                                            <td>{{ $estudiante->nombres }}</td>
                                                            <td>{{ $estudiante->apellidos }}</td>
                                                            <td>
                                                                <input type="checkbox" name="estudiantes_seleccionados[]" value="{{ $estudiante->idEstudiante }}">
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
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
                    
                    {{-- campo oculto para almacenar los estudiantes selecionandos antes de guardar definitivamente los ajustes del curso --}}
                    <input type="hidden" name="estudiantes_seleccionados" value="{{ json_encode(session('estudiantes_seleccionados')) }}">
                    
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