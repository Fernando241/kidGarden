@extends('templates.template')

@section('title','niveles')

@section('Titulo','Niveles')

@section('contenido')
    <p><strong>¡Bienvenidos a Jardín Infantil Genios!</strong></p>
    <p class="columna">En el Jardín Infantil Genios, creemos que cada niño es un genio en potencia, listo para explorar, aprender y crecer en un entorno seguro y estimulante. Nuestra misión es proporcionar una educación de calidad que fomente el desarrollo integral de los más pequeños, preparándolos para un futuro brillante.</p>
    <br>
    <strong>Nuestros Niveles Educativos:</strong>
    <div style="text-align: center">
        <p class="columna"><b>Párvulos (2 a 3 años):</b>
            <br>
            <img src="{{ asset('img/parvulos.jpg') }}" alt="" style="width: 300px">
            <br>
            En esta etapa, los niños comienzan su viaje educativo con actividades lúdicas que estimulan su curiosidad natural y desarrollan habilidades motoras y sociales.</p>
        <p class="columna"><b>Pre-Jardín (3 a 4 años):</b>
            <br>
            <img src="{{ asset('img/pre jardin.jpg') }}" alt="" style="width: 300px">
            <br>
            Aquí, los pequeños exploradores continúan su aventura con juegos y actividades diseñadas para fomentar el amor por el aprendizaje y la creatividad.</p>
        <p class="columna"><b>Jardín (4 a 5 años):</b>
            <br>
            <img src="{{ asset('img/jardin.jpg') }}" alt="" style="width: 300px">
            <br>
            En el nivel de Jardín, los niños empiezan a desarrollar habilidades académicas básicas a través de métodos interactivos y divertidos, preparándolos para los desafíos futuros.</p>
        <p class="columna"><b>Transición (5 a 6 años):</b>
            <br>
            <img src="{{ asset('img/transicion.jpg') }}" alt="" style="width: 300px">
            <br>
            Este nivel prepara a los niños para la educación primaria, enfocándose en el desarrollo de habilidades cognitivas, emocionales y sociales, asegurando una transición suave y exitosa.</p>
        <strong>¿Por qué elegir Jardín Infantil Genios?</strong>
        <p class="columna"><b>Educación Personalizada:</b>
            <br>
            Adaptamos nuestras metodologías a las necesidades individuales de cada niño, asegurando que todos reciban la atención y el apoyo que necesitan.</p>
        <p class="columna"><b>Ambiente Seguro y Acogedor:</b>
            <br>
            Nuestras instalaciones están diseñadas para ser seguras y estimulantes, proporcionando un entorno donde los niños se sientan cómodos y felices.</p>
        <p class="columna"><b>Equipo Profesional y Dedicado:</b>
            <br>
            Contamos con un equipo de educadores altamente capacitados y apasionados por la enseñanza, comprometidos con el desarrollo integral de cada niño.</p>
        <p class="columna"><b>Actividades Enriquecedoras:</b>
            <br>
            Ofrecemos una variedad de actividades extracurriculares que complementan el aprendizaje en el aula, desde arte y música hasta deportes y tecnología.</p>
        <p class="columna">En el <b>Jardín Infantil Genios</b>, no solo educamos, sino que también inspiramos a los niños a ser curiosos, creativos y seguros de sí mismos. ¡Ven y descubre por qué somos la mejor opción para la educación temprana de tu hijo!</p>
    </div>
    
@endsection