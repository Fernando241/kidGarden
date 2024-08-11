@extends('adminlte::page')

@section('title', 'Matriculas')

@section('content_header')
    <div class="alert alert-info">
        <h1>Matrículas</h1>
        <div class="text-right">
            <a href="{{ route('dashboard') }}" class="btn btn-primary" style="text-decoration: none">Volver</a>
        </div>
    </div>
@stop

@section('content')
    {{-- agregar nueva matricula --}}
    <div class="card">
        <div class="card-header">
            <a href="{{ route('matriculas.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Crear Nueva Matrícula</a>
        </div>
    
    
    {{-- barra de busqueda por parametros --}}
        <div class="card-body">
            <form method="GET" action="{{ route('matriculas.index') }}">
                <div class="input-group mb-3">
                    <input type="text" name="search" class="form-control" placeholder="Buscar por estudiante, curso, etc." value="{{ request()->query('search') }}">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">Buscar</button>
                    </div>
                </div>
            </form>
        </div>
        
        {{-- tabla para mostrar datos --}}
        <div class="card">
            <div class="card-body">
                <table id="matriculas" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Estudiante</th>
                            <th>Curso</th>
                            <th>Fecha Matrícula</th>
                            <th colspan="2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($matriculas as $matricula)
                            <tr>
                                <td>{{ $matricula->codigo_matricula }}</td>
                                <td>{{ $matricula->estudiante->nombres.'  '. $matricula->estudiante->apellidos }}</td>
                                <td>{{ $matricula->curso->grado.'  '. $matricula->curso->seccion }}</td>
                                <td>{{ $matricula->created_at ? $matricula->created_at->format('d/m/Y') : 'No disponible' }}</td>
                                <td>
                                    <a href="{{ route('matriculas.show', $matricula->id) }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                                </td>
                                {{-- <td>    
                                    <a href="{{ route('matriculas.edit', $matricula->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                </td> --}}
                                <td>
                                    <form id="delete-form-{{ $matricula->id }}" action="{{ route('matriculas.destroy', $matricula->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="#" onclick="confirmDelete({{ $matricula->id }})" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash-alt" style="color: white;"></i>
                                        </a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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