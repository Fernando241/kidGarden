@extends('adminlte::page')

@section('title', 'Editar Docente')

@section('content_header')
    <div class="alert alert-info">
        <h2>Editar Curso</h2>
        <div class="text-right">
            <a href="{{ route('cursos.index') }}" class="btn btn-primary">Volver</a>
        </div>
    </div>
@stop

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            Formulario de Registro
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('cursos.update', $curso->idCurso) }}" id="solicitudForm">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="grado">Grado</label>
                    <select class="form-control" name="grado" id="grado">
                        <option value="">Seleccione un grado</option>
                        <option value="Párvulos" @if ($curso->grado === 'Párvulos') selected @endif>Párvulos</option>
                        <option value="Pre-jardín" @if ($curso->grado === 'Pre-jardín') selected @endif>Pre-jardín</option>
                        <option value="Jardín" @if ($curso->grado === 'Jardín') selected @endif>Jardín</option>
                        <option value="Transición" @if ($curso->grado === 'Transición') selected @endif>Transición</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="seccion">Sección</label>
                    <select class="form-control" name="seccion" id="seccion" required>
                        <option value="">Seleccione una sección</option>
                        <option value="A" @if ($curso->seccion === 'A') selected @endif>A</option>
                        <option value="B" @if ($curso->seccion === 'B') selected @endif>B</option>
                        <option value="C" @if ($curso->seccion === 'C') selected @endif>C</option>
                        <option value="D" @if ($curso->seccion === 'D') selected @endif>D</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="docente">Docente</label>
                    <select class="form-control" id="docente" name="docente_id" required>
                        <option value="">Seleccione un docente</option>
                        @foreach ($docentes as $docente)
                            <option value="{{ $docente->idDocente }}" @if ($curso->docente_id === $docente->idDocente) selected @endif>
                                {{ $docente->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                {{-- <div class="form-group">
                    <label for="direccion">Docente:</label>
                    <input type="text" class="form-control" id="direccion" name="direccion" value=" {{ $curso->docente_id }}">
                </div> --}}
                {{-- <div class="form-group">
                    <label for="correo">Estudiantes:</label>
                    <input type="email" class="form-control" id="correo" name="correo" value=" {{ $curso->estudiante_id }}">
                </div>  --}}   
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </div>
</div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('solicitudForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevenir el envío del formulario

                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Registro actualizado con exito!',
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