@extends('adminlte::page')

@section('title', 'Cupos Solicitados')

@section('content_header')
    <div class="alert alert-info">
        <h1>Lista de Cupos Solicitado</h1>
        <div class="text-right">
            <a href="{{ route('dashboard') }}" class="btn btn-primary" style="text-decoration: none">Volver</a>
        </div>
    </div>
@stop

@section('content')
<div class="card">
    {{-- barra de busqueda por parametros --}}
    <div class="card-body">
        <form method="GET" action="{{ route('solicituds.index') }}">
            <div class="input-group mb-3">
                <input type="text" name="search" class="form-control" placeholder="Buscar por documento, nombre, apellido o grado" value="{{ request()->query('search') }}">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">Buscar</button>
                </div>
            </div>
        </form>
    </div>

    {{-- tabla para mostrar datos --}}
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Documento</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Grado</th>
                        <th>Fecha Solicitud</th>
                        <th colspan="2">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($solicituds as $solicitud)
                        <tr>
                            <td>{{ $solicitud->id }}</td>
                            <td>{{ $solicitud->documento }}</td>
                            <td>{{ $solicitud->nombres }}</td>
                            <td>{{ $solicitud->apellidos }}</td>
                            <td>{{ $solicitud->grado }}</td>
                            <td>
                                @if($solicitud->created_at)
                                    {{ $solicitud->created_at->format('d-m-Y H:i:s') }}
                                @else
                                    No disponible
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('solicituds.show', $solicitud->id) }}"><i class="fas fa-eye"></i></a>
                            </td>
                            <td>
                                <a href="{{ route('solicituds.edit', $solicitud->id) }}"><i class="fas fa-edit"></i></a>
                            </td>
                            <td>
                                <form id="delete-form-{{ $solicitud->id }}" action="{{ route('solicituds.destroy', $solicitud->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="#" onclick="confirmDelete({{ $solicitud->id }})">
                                        <i class="fas fa-trash-alt" style="color: red;"></i>
                                    </a>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- paginador --}}
            {{ $solicituds->links() }}
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