@extends('adminlte::page')

@section('title', 'Datos de la Solicitud')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3>Editar Solicitud</h3>
                <a href="{{ route('solicituds.index') }}" class="btn btn-primary">Volver</a>
            </div>
            <div class="card-body">
                <form action="{{ route('solicituds.update', $solicitud->id) }}" method="POST" id="solicitudForm">
                    @csrf
                    @method('PUT')

                    <div class="form-group mb-3">
                        <label for="tipo_documento">Tipo de Documento</label>
                        <select name="tipo_documento" id="tipo_documento" class="form-control">
                            <option value="nacido vivo" {{ $solicitud->tipo_documento == 'nacido vivo' ? 'selected' : '' }}>Nacido Vivo</option>
                            <option value="registro civil" {{ $solicitud->tipo_documento == 'registro civil' ? 'selected' : '' }}>Registro Civil</option>
                            <option value="tarjeta de identidad" {{ $solicitud->tipo_documento == 'tarjeta de identidad' ? 'selected' : '' }}>Tarjeta de Identidad</option>
                            <option value="tarjeta de extranjería" {{ $solicitud->tipo_documento == 'tarjeta de extranjería' ? 'selected' : '' }}>Tarjeta de Extranjería</option>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="documento">Documento</label>
                        <input type="text" name="documento" id="documento" class="form-control" value="{{ $solicitud->documento }}">
                    </div>

                    <div class="form-group mb-3">
                        <label for="nombres">Nombres</label>
                        <input type="text" name="nombres" id="nombres" class="form-control" value="{{ $solicitud->nombres }}">
                    </div>

                    <div class="form-group mb-3">
                        <label for="apellidos">Apellidos</label>
                        <input type="text" name="apellidos" id="apellidos" class="form-control" value="{{ $solicitud->apellidos }}">
                    </div>

                    <div class="form-group mb-3">
                        <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                        <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" value="{{ $solicitud->fecha_nacimiento }}">
                    </div>

                    <div class="form-group mb-3">
                        <label for="grado">Grado</label>
                        <select name="grado" id="grado" class="form-control">
                            <option value="Parvulos" {{ $solicitud->grado == 'Parvulos' ? 'selected' : '' }}>Parvulos</option>
                            <option value="Pre Jardin" {{ $solicitud->grado == 'Pre Jardin' ? 'selected' : '' }}>Pre Jardin</option>
                            <option value="Jardin" {{ $solicitud->grado == 'Jardin' ? 'selected' : '' }}>Jardin</option>
                            <option value="Transicion" {{ $solicitud->grado == 'Transicion' ? 'selected' : '' }}>Transicion</option>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="tipo_documento_padre">Tipo de Documento del Padre</label>
                        <select name="tipo_documento_padre" id="tipo_documento_padre" class="form-control">
                            <option value="cédula de ciudadanía" {{ $solicitud->tipo_documento_padre == 'cédula de ciudadanía' ? 'selected' : '' }}>Cédula de Ciudadanía</option>
                            <option value="cédula de extranjería" {{ $solicitud->tipo_documento_padre == 'cédula de extranjería' ? 'selected' : '' }}>Cédula de Extranjería</option>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="documento_padre">Documento del Padre</label>
                        <input type="text" name="documento_padre" id="documento_padre" class="form-control" value="{{ $solicitud->documento_padre }}">
                    </div>

                    <div class="form-group mb-3">
                        <label for="nombres_padre">Nombres del Padre</label>
                        <input type="text" name="nombres_padre" id="nombres_padre" class="form-control" value="{{ $solicitud->nombres_padre }}">
                    </div>

                    <div class="form-group mb-3">
                        <label for="apellidos_padre">Apellidos del Padre</label>
                        <input type="text" name="apellidos_padre" id="apellidos_padre" class="form-control" value="{{ $solicitud->apellidos_padre }}">
                    </div>

                    <div class="form-group mb-3">
                        <label for="telefono">Teléfono</label>
                        <input type="text" name="telefono" id="telefono" class="form-control" value="{{ $solicitud->telefono }}">
                    </div>

                    <div class="form-group mb-3">
                        <label for="direccion">Dirección</label>
                        <input type="text" name="direccion" id="direccion" class="form-control" value="{{ $solicitud->direccion }}">
                    </div>

                    <div class="form-group mb-3">
                        <label for="correo">Correo</label>
                        <input type="email" name="correo" id="correo" class="form-control" value="{{ $solicitud->correo }}">
                    </div>

                    <div class="form-group mb-3">
                        <label for="parentesco">Parentesco</label>
                        <input type="text" name="parentesco" id="parentesco" class="form-control" value="{{ $solicitud->parentesco }}">
                    </div>

                    {{-- para actualizar mi solicitud --}}
                    <div class="form-group mb-3">
                        <label for="estado">Estado actual de esta solicitud</label>
                        <select name="estado" id="estado" class="form-control">
                            <option value="en_proceso" {{ $solicitud->estado == 'en_proceso' ? 'selected' : '' }}>En espera</option>
                            <option value="aprobada" {{ $solicitud->estado == 'aprobada' ? 'selected' : '' }}>Admitir este estudiante</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success">Actualizar</button>
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