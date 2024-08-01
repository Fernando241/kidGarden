<div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Listado de Usuarios</h3>
            <input wire:model="search" class="form-control" placeholder="Ingrese el nombre o correo de un usuario">
        </div>
        @if ($users->count())
            <div class="card-body">
                <table class="table table-stripe">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td width='10px'>
                                    <a href="{{route('admin.users.edit', $user->id)}}" class="btn btn-primary">Editar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{-- paginador --}}
            {{-- {{ $users->links() }} --}}
        @else
            <div class="card-body">
                <strong>No hay registros</strong>
            </div>
        @endif
        
    </div>
</div>
