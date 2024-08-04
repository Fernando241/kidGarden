<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/estilo.css')}}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
            <img src="{{ asset('img/logoGeniosDelSaber.png') }}" id="logo" width="400px">
        </div>
        <div id="login-registro">
            @auth
                <a href="{{ route('login') }}">
                    <p class="sesion">{{ auth()->user()->adminlte_desc() }} <br> {{ Auth::user()->name }}!</p>
                    <a href="{{ route('logout') }}" class="sesion" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar Sesión</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </a>
                
            @else
                @if (Route::has('login'))
                    <a href="{{ route('login') }}" class="sesion">Iniciar Sesión</a>
                @endif

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="sesion">Registrarse</a>
                @endif
            @endauth
        </div>
    
    </header>
    <div id="content"> <!-- Contenedor para crear un caja dentro del body -->
        <section>
            <div class="menu"> <!--clase padre del menu-->

                <!-- @if (auth()->check())
                    <a href="{{ route('solicituds.create') }}" id="cupo">Solicitar Cupo</a>
                @else
                    <a href="{{ route('register') }}" id="cupo">Solicitar Cupo</a>
                @endif -->
                

                @if (auth()->check())
                    @php
                        $solicitudExistente = auth()->user()->solicitudes()->where('estado', 'en_proceso')->first();
                    @endphp

                    @if ($solicitudExistente)
                        <a href="{{ route('solicituds.existing') }}" id="cupo">Solicitar Cupo</a>
                    @else
                        <a href="{{ route('solicituds.create') }}" id="cupo">Solicitar Cupo</a>
                    @endif
                @else
                    <a href="{{ route('register') }}" id="cupo">Solicitar Cupo</a>
                @endif


                <button class="nav-boton" onclick="accion()">Menu</button> <!--boton que aparece en pantallas pequeñas y se configura en JavaScrip-->
                <a href=" {{ url('/')}} " class="nav_menu ocultar">Inicio</a>
                <a href=" {{ url('/nosotros') }} " class="nav_menu ocultar">Nosotros</a>
                <a href=" {{ url('/galeria')}} " class="nav_menu ocultar">Galeria</a>
                <a href=" {{ url('/noticias')}} " class="nav_menu ocultar">Noticias</a>
                <a href=" {{ url('/niveles')}} " class="nav_menu ocultar">Niveles</a>
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