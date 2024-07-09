@extends('templates.template')

@section('title', 'SIGE-WEB')

@section('Titulo', 'Inicio')

@section('contenido')
<p><strong>Bienvenidos a Genios del Saber:<br>Donde los Pequeños Descubren su Grandeza</strong></p>
<div id="parrafos"> <!--contenedor padre del contenido informativo de la página, creado pensando si necesito trabajar su contenido con "flex"-->
    <p class="columna"> <!--Clase creada para darle un uso especial a este contenido-->
        En Genios del Saber, creemos en el potencial único de cada niño.<br>Nuestro jardín infantil es un refugio de descubrimiento, curiosidad y crecimiento. Estamos ubicados en Soacha - Cundinamarca, y nuestro compromiso es nutrir la mente, corazón y espíritu de cada niño.
    </p>
    <!-- carrusel de imagenes -->
    <div class="slide-box">
        <ul>
            <li><img src="{{ asset('img/niños1.jpg') }}" alt=""></li>
            <li><img src="{{ asset('img/niños2.jpg') }}" alt=""></li>
            <li><img src="{{ asset('img/niños3.jpg') }}" alt=""></li>
            <li><img src="{{ asset('img/niños5.jpg') }}" alt=""></li>
        </ul>
    </div>
    <p class="columna">
        <strong>Nuestra Misión:</strong>  <br> Desarrollar a futuros líderes a través de un enfoque pedagógico excepcional. Aquí, cada niño es un genio en autodescubrimiento. <br>Ofrecemos un ambiente seguro, personalizado y estimulante que fomenta la curiosidad y la creatividad.<br> Los padres que buscan una educación excepcional para sus hijos son bienvenidos a unirse a nuestra comunidad.
        <br><br>
        <strong>Beneficios Destacados:</strong>
        <br>
        - Programas educativos personalizados <br>
        - Profesores apasionado y altamente calificado <br>
        - Un ambiente enriquecedor y seguro <br>
        - Historias de éxito de nuestros pequeños genios <br> <br>

    <p class="columna">Únete a la Familia Genios del Saber y prepárate para un futuro brillante. Cada día es una oportunidad para crecer, aprender y brillar. <br> Contáctanos hoy mismo y descubre cómo hacemos que el aprendizaje sea una aventura emocionante en Genios del Saber." </p>
</div>

<div id="videos">
    <iframe class="ilustracion" width="320" height="210" src="https://www.youtube.com/embed/i4TYRNbQiCA?si=DSEprdxUcSWuz8oi" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3977.0300822822824!2d-74.18233872582623!3d4.588624242620636!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f9f608b799fd7%3A0xed7ba6c5f8159c33!2sJardin%20Infantil%20Caminos%20de%20la%20Vida!5e0!3m2!1ses-419!2sco!4v1695956730423!5m2!1ses-419!2sco" class="ilustracion" width="320" height="210" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

</div>
@endsection