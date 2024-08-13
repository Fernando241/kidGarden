@extends('templates.template')

@section('title','noticias')

@section('Titulo','Noticias')

@section('contenido')
    <div>
        <div class="columna">
            @foreach ($noticias as $noticia)
                <div class="col-md-4">
                    <div class="card">
                        {{-- <img class="card-img-top" src="{{ asset('img/noticias/'.$noticia->imagen) }}" alt="Card image cap"> --}}
                        <div class="card-body">
                            <h3 id="parrafos"><strong>{{ $noticia->tema }}</strong></h3>
                            <p class="card-text">Publicado el: {{ $noticia->created_at->format('d-m-Y') }}</p>
                            <p class="card-text">{{ $noticia->descripcion }}</p>
                            <a href="{{ route('noticias.show', $noticia->id)}}" class="btn btn-primary">Leer más</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    </div>
@endsection