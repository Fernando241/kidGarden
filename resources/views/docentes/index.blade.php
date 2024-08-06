@extends('adminlte::page')

@section('title', 'Docentes')

@section('content_header')
<div class="alert alert-info">
    <h1>Lista de Docentes</h1>
    <div class="text-right">
        <a href="{{ route('dashboard') }}" class="btn btn-primary" style="text-decoration: none">Volver</a>
    </div>
</div>
@stop

@section('content')
<div class="card">
    {{-- agregar nuevo docente --}}
    <div class="card-header">
        <a href="{{ route('docentes.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Añadir Docente</a>
    </div>

    {{-- barra de busqueda por parametros --}}
    <div class="card-body">
        <form method="GET" action="{{ route('docentes.index') }}">
            <div class="input-group mb-3">
                <input type="text" name="search" class="form-control" placeholder="Buscar por documento, nombre, etc." value="{{ request()->query('search') }}">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">Buscar</button>
                </div>
            </div>
        </form>

        {{-- tabla para mostrar los datos --}}
        <div class="card">
            <div class="card-body">
                <table class="table table-striped" style="width: 100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Telefono</th>
                            <th>Dirección</th>
                            <th>Correo</th>
                            <th colspan="2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($docentes as $docente)
                            <tr>
                                <td>{{ $docente->idDocente }}</td>
                                <td>{{ $docente->nombre }}</td>
                                <td>{{ $docente->telefono }}</td>
                                <td>{{ $docente->direccion }}</td>
                                <td>{{ $docente->correo }}</td>
                                <td>
                                    <a href="{{ route('docentes.show', $docente) }}"><i class="fas fa-eye"></i></a>
                                </td>
                                <td>
                                    <a href="{{ route('docentes.edit', $docente) }}"><i class="fas fa-edit"></i></a>
                                </td>
                                <td>
                                    <form id="delete-form-{{ $docente->idDocente }}" action="{{ route('docentes.destroy', $docente->idDocente) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="#" onclick="confirmDelete({{ $docente->idDocente }})">
                                            <i class="fas fa-trash-alt" style="color: red;"></i>
                                        </a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $docentes->links() }}
            </div>
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