<div>
    <div class="card">
        {{-- barra de busqueda por parametros --}}
    <div class="card-body">
        <form method="GET" action="{{ route('admin.users.index') }}">
            <div class="input-group mb-3">
                <input type="text" name="search" class="form-control" placeholder="Buscar por Nombre, Apellido o correo" value="{{ request()->query('search') }}">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">Buscar</button>
                </div>
            </div>
        </form>

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
            {{ $users->links() }}
        @else
            <div class="card-body">
                <strong>No hay registros</strong>
            </div>
        @endif
        
    </div>
</div>
