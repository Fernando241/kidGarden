@extends('templates.template')

@section('title','Publicaciones')

@section('Titulo','Publicaciones')

@section('contenido')
    <div>
        <div class="columna">
            @can('noticias.create')
                <div>
                    {{-- crear nueva noticia --}}
                    <a href="{{ route('noticias.create') }}" class="nav_menu"><i class="fas fa-plus-circle"></i> Agregar Nueva Publicación</a>
                </div>
            @endcan
            
            @foreach ($noticias as $noticia)
                <div>
                    <div style="text-align: center">
                        <div>
                            <strong>{{ $noticia->tema }}</strong>
                            <p class="columna">Publicado el: {{ $noticia->created_at->format('d-m-Y') }}</p>
                                                        
                            @if($noticia->imagen)
                                <div>
                                    <img src="{{ asset('images/' . $noticia->imagen) }}" alt="Imagen de la noticia" class="img-thumbnail" style="width: 80%;">
                                </div>
                            @else
                                <p class="columna">No hay imagen para mostrar</p>
                            @endif
                            <p>{{ $noticia->descripcion }}</p>
                            <div style="text-align: right">
                                @can('noticias.edit')
                                    <a href="{{ route('noticias.edit', $noticia) }}" class="nav_menu">Editar esta Publicación</a><br><br><br>
                                @endcan
                                @can('noticias.delete', $noticia)
                                    <div>
                                        <form id="delete-form-{{ $noticia->id }}" action="{{ route('noticias.destroy', $noticia->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')  
                                            <a href="#" onclick="confirmDelete({{ $noticia->id }})" class="nav_menu">
                                                <i class="fas fa-trash-alt"></i> Eliminar
                                            </a>
                                        </form>
                                    </div>
                                @endcan <br>   
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
            @endforeach
        </div>
        
    </div>
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