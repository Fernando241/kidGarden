@extends('templates.template')

@section('title', 'Ver noticia')

@section('contenido')
    <div class="columna">
        <h2><strong>{{$noticia->tema }}</strong></h2>
        <a href="{{ route('noticias.index') }}" class="nav_menu">Volver</a>
        <p>Publicado el: {{ $noticia->created_at->format('d/m/Y') }}</p>
        
        @if($noticia->imagen)
            <div>
                <img src="{{ asset('images/' . $noticia->imagen) }}" alt="Imagen de la noticia" class="img-thumbnail" style="max-width: 400px;">
            </div>
        @else
            <div>
                <span>No hay imagen</span>
            </div>
        @endif    
        <p>{{ $noticia->descripcion }}</p>            
        
    </div>
@endsection