<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <title>Tipy Movies</title>
        <link href="../resources/css/layout.css" rel="stylesheet" type="text/css" media="all">
        <div class="bgded overlay" style="background-image:url('images/demo/backgrounds/03.png');"> 
    </head>
    <body>
        <div class="wrapper row0">
        <div id="topbar" class="hoc clear">
        <div class="fl_left">
            <ul class="nospace">
            <li><a href="#"><i class="fa fa-lg fa-home"></i></a></li>
            <li><a href="#">Acerca de</a></li>
            <li><a href="#">Contacto</a></li>
            <li><a href="#">Iniciar Sesion</a></li>
            <li><a href="{{ route('register') }}">Registrarse</a></li>
            </ul>
        </div>
        <div class="fl_right">
            <ul class="nospace">
            <li><i class="fa fa-envelope-o"></i> por_si_ponemos@correo_de_contacto.com</li>
            </ul>
        </div>
        </div>
        </div>
        @if (url()->current() != route('register'))
        <div id="main-navbar" class="wrapper row1">
            <header id="header" class="hoc clear">
            <div id="logo" class="fl_left">
                <h1><a href="index.html">{{ url()->current() }}</a></h1>
            </div>
            <nav id="mainav" class="fl_right">
                <ul class="clear">
                <li class="active"><a href="index.html">Inicio</a></li>
                <li><a href="index.html">Peliculas</a></li>
                <li><a href="index.html">Series</a></li>
                <li><a href="index.html">Trivia</a></li>
                <li><input type="search" name="buscar"></a></li>
                </ul>
            </nav>
            </header>
        </div>
        @endif
        <div>
            @yield('content')
        </div>
    </body>
</html>

<script>

</script>
