@extends('templates.template')

@section('title','noticias')

@section('Titulo','Noticias')

@section('contenido')
    <div>
        <div class="columna">
            @can('noticias.create')
                <div>
                    {{-- crear nueva noticia --}}
                    <a href="{{ route('noticias.create') }}" class="nav_menu"><i class="fas fa-plus-circle"></i> Agregar Nueva Noticia</a>
                </div>
            @endcan
            
            @foreach ($noticias as $noticia)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h3 id="parrafos"><strong>{{ $noticia->tema }}</strong></h3>
                            <p>Publicado el: {{ $noticia->created_at->format('d-m-Y') }}</p>
                            @can('noticias.delete', $noticia)
                                <div class="columna">
                                    <form id="delete-form-{{ $noticia->id }}" action="{{ route('noticias.destroy', $noticia->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')  
                                        <a href="#" onclick="confirmDelete({{ $noticia->id }})">
                                            <i class="fas fa-trash-alt"></i> Eliminar esta Noticia
                                        </a>
                                    </form>
                                </div>
                            @endcan
                            
                            @if($noticia->imagen)
                                <div>
                                    <img src="{{ asset('images/' . $noticia->imagen) }}" alt="Imagen de la noticia" class="img-thumbnail" style="max-width: 100px;">
                                </div>
                            @else
                                <div>
                                    <span>No hay imagen</span>
                                </div>
                            @endif
                            <p>{{ $noticia->descripcion }}</p>
                            <a href="{{ route('noticias.show', $noticia->id)}}" class="btn btn-primary">Leer más</a>
                            @can('noticias.edit')
                                <strong>
                                    <a href="{{ route('noticias.edit', $noticia) }}">Editar esta noticia</a>
                                </strong>    
                            @endcan
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