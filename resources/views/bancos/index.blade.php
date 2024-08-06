@extends('adminlte::page')

@section('title', 'Bancos')
    
@section('content_header')
    <div class="alert alert-info">
        <h1>Lista de Bancos</h1>
        <div class="text-right">
            <a href="{{ route('dashboard') }}" class="btn btn-primary" style="text-decoration: none">Volver</a>
        </div>
    </div>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <div>
            <a href="{{ route('bancos.create') }}" class="btn btn-primary">Agregar Nuevo</a>
        </div>
    </div>

    <div class="card-body">
        <div class="card">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Banco</th>
                        <th>Código</th>
                        <th>Teléfono</th>
                        <th colspan="2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bancos as $banco)
                        <tr>
                            <td>{{ $banco->id }}</td>
                            <td>{{ $banco->banco }}</td>
                            <td>{{ $banco->codigo }}</td>
                            <td>{{ $banco->telefono }}</td>
                            <td> 
                                <a href="{{ route('bancos.edit', $banco->id) }}"><i class="fas fa-edit"></i></a>
                            </td>
                            <td>
                                <form id="delete-form-{{ $banco->id }}" action="{{ route('bancos.destroy', $banco->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="#" onclick="confirmDelete({{ $banco->id }})">
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