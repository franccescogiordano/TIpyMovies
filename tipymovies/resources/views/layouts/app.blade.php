<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Iniciar Sesion - TIPY Movies</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/layout.css') }}" rel="stylesheet" type="text/css" media="all">
    <div class="bgded overlay" style="background-image:url('images/demo/backgrounds/06.jpg');"> 
</head>
<body>
    <div id="app">
        <div class="wrapper row0">
        <div id="topbar" class="hoc clear">
        <div class="fl_left">
            <ul class="nospace">
            <li><a href="#"><i class="fa fa-lg fa-home"></i></a></li>
            <li><a href="#">Acerca de</a></li>
            <li><a href="#">Contacto</a></li>
            </ul>

        </div>
        <div class="fl_right">
            @if (Route::has('login'))
                <div>
                    <ul class="nospace">
                    @auth
                        <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar Sesion</a></li>
                        <li><p> {{ Auth::user()->username }}</p></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none">
                            @csrf
                        </form>
                    @else
                        <li><a href="{{ route('login') }}">Iniciar Sesion</a></li>
                        @if (Route::has('register'))
                            <li><a href="{{ route('register') }}">Registrarse</a></li>
                        @endif
                    @endif
                    </ul>
                </div>
            @endif
        </div>
        </div>
        </div>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
