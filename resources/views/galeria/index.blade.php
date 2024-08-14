@extends('templates.template')

@section('title','galeria')

@section('Titulo','Galeria de Fotos')

@section('contenido')
    @can('galeria.create')
        {{-- añadir nuevo album --}}
        <br>
        <a href="{{ route('galerias.create') }}" class="nav_menu"><i class="fas fa-plus-circle"></i> Agregar nuevo album</a>
        <br><br>
    @endcan
    

    @foreach($galerias as $galeria)
        <div style="text-align: center">
            <strong>{{ $galeria->titulo }}</strong>
            <p class="columna" style="text-align: center">{{ $galeria->descripcion }}</p>
            @foreach($galeria->fotos as $foto)
                <img src="{{ asset('storage/' . $foto->ruta_fotos) }}" alt="Foto" style="width: 400px">
            @endforeach
            <p>Publicado el: {{ $galeria->created_at->format('d-m-Y') }}</p>
        </div><br>
        <div style="text-align: center">
            @can('galeria.edit')
                <a href="{{ route('galerias.edit', $galeria->id) }}" class="nav_menu">Editar</a><br><br>
            @endcan
            @can('galeria.delete')
                {{-- eliminar albun --}}
                <form action="{{ route('galerias.destroy', $galeria->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta galería?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="nav_menu">Eliminar este Album</button>
                </form>
            @endcan
            
        </div>
        <br><hr><br>
    @endforeach
@endsection
