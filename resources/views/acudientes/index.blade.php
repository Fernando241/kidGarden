@extends('adminlte::page')

@section('title', 'Acudientes')
    
@section('content_header')
    <div class="alert alert-info">
        <h1>Lista de Acudientes</h1>
        <div class="text-right">
            <a href="{{ route('dashboard') }}" class="btn btn-primary" style="text-decoration: none">Volver</a>
        </div>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <br>
            <a href="{{ route('acudientes.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Agregar Nuevo</a>
        </div>
    {{-- barra de busqueda por parametros --}}
        <div class="card-body">
            <form method="GET" action="{{ route('acudientes.index') }}">
                <div class="input-group mb-3">
                    <input type="text" name="search" class="form-control" placeholder="Buscar por documento, nombre, etc." value="{{ request()->query('search') }}">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">Buscar</button>
                    </div>
                </div>
            </form>
        </div>
    

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Documento</th>
                        <th>Nombre Completo</th>
                        <th>Teléfono</th>
                        <th>Correo</th>
                        <th colspan="2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($acudientes as $acudiente)
                        <tr>
                            <td>{{ $acudiente->id }}</td>
                            <td>{{ $acudiente->documento_acudiente }}</td>
                            <td>{{ $acudiente->nombre_acudiente }}</td>
                            <td>{{ $acudiente->telefono }}</td>
                            <td>{{ $acudiente->correo }}</td>
                            <td>
                                <a href="{{ route('acudientes.show', $acudiente) }}"><i class="fas fa-eye"></i></a>
                            </td>
                            <td>
                                <a href="{{ route('acudientes.edit', $acudiente) }}"><i class="fas fa-edit"></i></a>
                            </td>
                            <td>
                                <form id="delete-form-{{ $acudiente->id }}" action="{{ route('acudientes.destroy', $acudiente->id) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <a href="#" onclick="confirmDelete({{ $acudiente->id }})">
                                    <i class="fas fa-trash-alt" style="color: red;"></i>
                                </a>
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