<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Iniciar Sesion - TIPY Movies</title>

    <!-- Scripts 
   <script src="{{ asset('js/app.js') }}" defer></script> -->

    <!-- Styles -->
   <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all">
    <link href="{{ asset('css/layout.css') }}" rel="stylesheet" type="text/css" media="all">
  
    <div class="bgded overlay" > 
</head>
<body>
    <div id="app">
        <div class="wrapper row0">
        <div id="topbar" class="hoc clear">
        <div class="fl_left">
            <ul class="nospace">
            <li><a href="{{ route('ContactUs') }}">Acerca de</a></li>
            </ul>

        </div>
        <div class="fl_right">
            @if (Route::has('login'))
             <div>
						<ul class="nospace">
							@auth
							<li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar Sesion</a></li>
							<li> <a href="{{ route('UpdateUser') }}" > {{ Auth::user()->username }}</a></li>
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
        		@if ((url()->current() != route('register')) || (url()->current() != route('login')))
		<div id="main-navbar" class="wrapper row1">
			<header id="header" class="hoc clear">
				<div id="logo" class="fl_left">

				</div>



				<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
					<a class="nav-link" href="{{ route('home')}}"><img class="logotipymovies" src="{{asset('images/alras.png')}}"></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarNavDropdown">
						<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
							<li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Inicio</a></li>
							<li class="nav-item"><a class="nav-link" href="{{ route('listarPeliculas.busqueda',['texto_busqueda' => 'pulp']) }}">Peliculas</a>
							</li>
							<li class="nav-item"><a class="nav-link" href="{{ route('listarSeries.busqueda',['texto_busqueda' => 'lost']) }}">Series</a></li>
							    @auth
							<li class="nav-item"><a  class="nav-link" href="{{ route('MiniJuego2') }}">Trivia</a></li>
							@endauth
                            <li class="nav-item"><a  class="nav-link" href="{{ route('topten') }}">Ranking</a></li>
						</ul>


						<form class="form-inline my-2 my-lg-0" >
							@csrf
							<input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search" id="texto_busqueda" name="texto_busqueda">
							<button class="btn btn-default my-2 my-sm-0" type="button" onClick="cambiarurl()" name="btnBuscar">Buscar</button>

						</form>


								<!-- <li class="nav-item">
								@csrf
								<input class="form-control" id="texto_busqueda" type="search" name="texto_busqueda">
							</li>
							<li class="nav-item">
								<button class="btn btn-default" type="button" onClick="cambiarurl()" name="btnBuscar">Buscar</button>
							</li> -->

						</div>
					</nav>

				</div>

				@endif
      <div>
				@yield('content')
			</div>
    </div>
</body>
</html>
