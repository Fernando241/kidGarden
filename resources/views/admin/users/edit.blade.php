@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <div class="alert alert-info">
        <h1>Asignar un rol</h1>
            <div class="card-header text-right">
                <a href="{{ route('admin.users.index') }}" class="btn btn-primary">Volver</a>
            </div>
    </div>
@stop

@section('content')

<div class="card">
    <div class="card-body">
        <p class="h5">Nombre:</p>
        <p class="form-control">{{ $user->name }}</p>

        <h2 class="h5">Listado de roles</h2>
        <form action="{{ route('admin.users.update', $user) }}" method="POST" id="solicitudForm">
            @csrf
            @method('PUT')
            @foreach ($roles as $role)
                <div>
                    <label>
                        <input type="checkbox" name="roles[]" value="{{ $role->id }}" class="mr-1" {{ $user->roles->contains($role->id) ? 'checked' : '' }}>
                        {{ $role->name }}
                    </label>
                </div>
            @endforeach
            <button type="submit" class="btn btn-primary mt-2">Asignar rol</button>
        </form>
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
                    title: 'roles para {{ $user->name }} asignados con exito!',
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