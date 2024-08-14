@extends('templates.template')

@section('title','galeria')

@section('Titulo','Galeria de Fotos')

@section('contenido')
    {{-- añadir nuevo album --}}
    <br>
    <a href="{{ route('galerias.create') }}" class="nav_menu"><i class="fas fa-plus-circle"></i> Agregar nuevo album</a>
    <br><br>

    @foreach($galerias as $galeria)
        <div style="text-align: center">
            <strong>{{ $galeria->titulo }}</strong>
            <p class="columna" style="text-align: center">{{ $galeria->descripcion }}</p>
            @foreach($galeria->fotos as $foto)
                <img src="{{ asset('storage/' . $foto->ruta_fotos) }}" alt="Foto" style="max-height: 300px">
            @endforeach
            <p>Publicado el: {{ $galeria->created_at->format('d-m-Y') }}</p>
        </div><br>
        <div style="text-align: center">
            <a href="{{ route('galerias.edit', $galeria->id) }}" class="nav_menu">Editar</a><br><br>
            {{-- eliminar albun --}}
            <form action="{{ route('galerias.destroy', $galeria->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta galería?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="nav_menu">Eliminar este Album</button>
            </form>
        </div>
        <br><hr><br>
    @endforeach
@endsection
