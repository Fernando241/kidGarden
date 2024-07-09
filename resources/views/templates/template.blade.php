<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/estilo.css')}}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> --}}
</head>

<body>
    <!-- redes sociales flotantes -->
    <a href="https://api.whatsapp.com/send?phone=573204195115" class="btn-wsp" target="_blank"><i class='bx bxl-whatsapp'></i></a>
    <nav class="redes"> <!--iconos de redes sociales-->
        <a href="https://es-la.facebook.com/" class="icono" target="_black"><i class='bx bxl-facebook-circle'></i></a>
        <a href="https://www.youtube.com/" class="icono" target="_black"><i class='bx bxl-youtube'></i></a>
        <a href="https://www.instagram.com/?hl=en" class="icono" target="_black"><i class='bx bxl-instagram'></i></a>
        <a href="https://twitter.com/" class="icono" target="_black"><i class='bx bxl-twitter'></i></a>
    </nav>

    <header>    <!--Encabezado con fondo de imagen-->
        <div>
            <img src="{{ asset('img/logoGeniosDelSaber.png') }}"  id="logo" width="400px">
        </div>
        <div id="login-registro">
            @if (Route::has('login'))
            <a href="{{ route('login') }}" class="sesion">Iniciar Sesión</a>
            @endif

            @if (Route::has('register'))
            <a href=" {{ url('register')}} " class="sesion">Registrarse</a> 
            @endif
            
        </div>
    
    </header>
    <div id="content"> <!--Contenedor para crear un caja dentro del body-->
        <section>
            <div class="menu"> <!--clase padre del menu-->
                <a href=" {{ url('/solicitud')}} " id="cupo">Solicitar Cupo</a> <!--Se le agrego un id diferente para darle propiedades distintas a las demán anclas-->
                <button class="nav-boton" onclick="accion()">Menu</button> <!--boton que aparece en pantallas pequeñas y se configura en JavaScrip-->
                <a href=" {{ url('/')}} " class="nav_menu ocultar">Inicio</a>
                <a href=" {{ url('/nosotros') }} " class="nav_menu ocultar">Nosotros</a>
                <a href=" {{ url('/galeria')}} " class="nav_menu ocultar">Galeria</a>
                <a href=" {{ url('/noticias')}} " class="nav_menu ocultar">Noticias</a>
                <a href=" {{ url('/niveles')}} " class="nav_menu ocultar">Niveles</a>
                <a href=" {{ url('/estudiantes')}} " class="nav_menu ocultar">Estudiantes</a>
            </div>
            <hr>
        </section> <!--Sección para destinar al contenido informativo de la página-->
        <h2>@yield('Titulo')</h2> <!--Nombre indicador de esta sesión o página-->

        @yield('contenido')
        
    </div>
    <aside>
        <p class="pie">Todos los derechos reservados para sige-web<br>Desarrollo y Diseño: Fernando Rolón <br> Jardín Infantil Genios del Saber<br>imagenes:www.freepik.es<br>2023</p>
    </aside>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> --}}
    <script src="{{ asset('js/accion.js') }}"></script>
</body>
</html>