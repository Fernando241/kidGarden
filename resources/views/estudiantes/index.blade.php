@extends('adminlte::page')

@section('title', 'Estudiantes')

@section('content_header')
    <h1>Lista de Estudiantes</h1>
@stop

@section('content')
{{-- agregar nuevo estudiante --}}
<div class="card-header">
    <a href="{{ route('estudiantes.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Añadir Estudiante</a>
</div>

{{-- barra de busqueda por parametros --}}
<div class="card">
    <div class="card-body">
        <form method="GET" action="{{ route('estudiantes.index') }}">
            <div class="input-group mb-3">
                <input type="text" name="search" class="form-control" placeholder="Buscar por documento, nombre, etc." value="{{ request()->query('search') }}">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">Buscar</button>
                </div>
            </div>
        </form>

{{-- tabla para mostrar datos --}}
    <div class="card">
        <div class="card-body">
            <table id="estudiantes" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Documento</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Teléfono</th>
                        <th colspan="2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($estudiantes as $estudiante)
                        <tr>
                            <td>{{ $estudiante->idEstudiante }}</td>
                            <td>{{ $estudiante->documento }}</td>
                            <td>{{ $estudiante->nombres }}</td>
                            <td>{{ $estudiante->apellidos }}</td>
                            <td>{{ $estudiante->telefono }}</td>
                            <td>
                                <a href="{{ route('estudiantes.show', $estudiante) }}"><i class="fas fa-eye"></i></a>
                            </td>
                            <td>
                                <a href="{{ route('estudiantes.edit', $estudiante) }}"><i class="fas fa-edit"></i></a>
                            </td>
                            <td>
                                <form id="delete-form-{{ $estudiante->idEstudiante }}" action="{{ route('estudiantes.destroy', $estudiante->idEstudiante) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <a href="#" onclick="confirmDelete({{ $estudiante->idEstudiante }})">
                                    <i class="fas fa-trash-alt" style="color: red;"></i>
                                </a>
                            </td>
                            
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- paginador --}}
            {{ $estudiantes->links() }}
        </div>
    </div>
@stop

@section('js')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDelete(id) {
        Swal.fire({
            title: '¿Estás seguro?',
            text: "¡No podrás revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, eliminarlo',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
            }
        });
    }
</script>

@stop
