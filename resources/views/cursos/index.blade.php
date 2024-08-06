@extends('adminlte::page')

@section('title', 'Estudiantes')

@section('content_header')
    <div class="alert alert-info">
        <h1>Lista de Cursos</h1>
        <div class="text-right">
            <a href="{{ route('dashboard') }}" class="btn btn-primary" style="text-decoration: none">Volver</a>
        </div>
    </div>
@stop

@section('content')
<div class="card">
    {{-- agregar nuevo curso --}}
    <div class="card-header">
        <div>
            <a href="{{ route('cursos.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Crear Nuevo Curso</a>
        </div>
    </div>

        {{-- barra de busqueda por parametros --}}
        <div class="card-body">
            <form method="GET" action="{{ route('cursos.index') }}">
                <div class="input-group mb-3">
                    <input type="text" name="search" class="form-control" placeholder="Buscar por grado, sección, etc." value="{{ request()->query('search') }}">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">Buscar</button>
                    </div>
                </div>
            </form>
        </div>

{{-- tabla para mostrar datos --}}
    <div class="card-body">
        <table class="table table-striped" style="width: 50%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Grado</th>
                    <th>Sección</th>
                    <th colspan="2">Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($cursos as $curso)
                    <tr>
                        <td>{{ $curso->idCurso }}</td>
                        <td>{{ $curso->grado }}</td>
                        <td>{{ $curso->seccion }}</td>
                        <td>
                            <a href="{{ route('cursos.show', $curso->idCurso) }}"><i class="fas fa-eye"></i></a>
                        </td>
                        <td>
                            <a href="{{ route('cursos.edit', $curso->idCurso) }}"><i class="fas fa-edit"></i></a>
                        </td>
                        <td>
                            <form action="{{ route('cursos.destroy', $curso->idCurso) }}" method="POST">
                                @csrf
                                @method('DELETE')  
                                <a href="#" onclick="confirmDelete({{ $curso->idCurso }})">
                                    <i class="fas fa-trash-alt" style="color: red;"></i>
                                </a>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
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