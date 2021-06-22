<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title>Tipy Movies</title>


	<link rel="stylesheet" href="\css\preguntas.css">
	<link href="{{asset('css/Peliculas.css')}}" rel="stylesheet" type="text/css" media="all">
	<link href="{{asset('css/layout.css')}}" rel="stylesheet" type="text/css" media="all">
	<link href="{{asset('css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all">


	<!-- -->

	</head>
	<body class="framework bodyLayout">
		<div class="bgded overlay">
		<div class="wrapper row0">
			<div id="topbar" class="hoc clear">
				<div class="fl_left">
					<ul class="nospace">
						<li><a href="{{ route('home') }}"> <img src="{{asset('images/house.png')}}"><i></i></a></li>
						<li><a href="{{ route('AboutAS') }}">Acerca de</a></li>
						<li><a href="#">Contacto</a></li>
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
					<a class="nav-link" href="{{ route('home')}}">TIPY MOVIES</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarNavDropdown">
						<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
							<li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Inicio</a></li>
							<li class="nav-item"><a class="nav-link" href="{{ route('listarPeliculas.busqueda',['texto_busqueda' => 'pulp']) }}">Peliculas</a>
							</li>
							<li class="nav-item"><a class="nav-link" href="{{ route('listarSeries.busqueda',['texto_busqueda' => 'lost']) }}">Series</a></li>
							<li class="nav-item"><a  class="nav-link" href="index.html">Trivia</a></li>
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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>

			<script>
				function cambiarurl(){
					var pathname = window.location.pathname
					if(pathname.includes('Series')){
					console.log(document.getElementById('texto_busqueda').value);

					window.location.href = "/Series/"+document.getElementById('texto_busqueda').value;
				} else {
					console.log(document.getElementById('texto_busqueda').value);

					window.location.href = "/Peliculas/"+document.getElementById('texto_busqueda').value;
					}
				}
				$(document).keyup(function (e) {
					if ($("#texto_busqueda").val()!="" && (e.keyCode === 13)) {
						cambiarurl();
					}
				});

			</script>
