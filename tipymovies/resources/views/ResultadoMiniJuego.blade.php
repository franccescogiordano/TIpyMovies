<!DOCTYPE html>
@extends('layout')

@section('content')
<html lang="">
<head>
	<title>Show</title>
</head>
<body id="top">
	<div class="wrapper">
		<div id="pageintro" class="hoc clear">
			<article>
				<div>
                    @if($mj2 != 1)
                        <p class="heading">Resultados de {{ $titulo }}</p>
					@endif


					<div class="container">
                        @if($mj2 != 1)
                            <img src="{{ $poster }}">
						@endif

						<p>Mejor combo: {{ $combo }}</p>
						<p>Respuesta correctas: {{ $correctas }}</p>
						<p>Puntos totales: {{ $puntos }}</p>
						@if($record == 1)
						<p>Nuevo Record!!</p><!--con un if de laravel-->
						@endif
					</div>
					<br>
					<div class="container">
						<table class="table table-dark">
							<thead>
								<tr>
									<th scope="col">Pregunta</th>
									<th scope="col">Respuesta Correcta</th>
									<th scope="col">Respuesta Usuario</th>
								</tr>
							</thead>
							<tbody>
								@foreach($respuestauser as $top)

								<tr bgcolor="black">

									<td>{{ $top['pregunta']}}</td>
									<td>{{ $top['respuestacorrecta']}}</td>
									<td>{{ $top['answeruser']}}</td>

								</tr>
								@endforeach

							</tbody>
						</table>

					</div>
				</article>


				<div class="col-md-8 offset-md-4">
                    @if($mj2 != 1)
                        <a class="botoncito"  href="{{ route('DetallePeliculas',[ 'idchossen' => $imdbIDxd , 'titlepeli' => $titulo ]) }}">VOLVER AL DETALLE</a>
					@else
                        <a class="botoncito"  href="{{ route('home') }}">VOLVER AL INICIO</a>
                    @endif


				</div>
				<!-- JAVASCRIPTS -->
				<script src="../resources/js/scripts/jquery.min.js"></script>
				<script src="../resources/js/scripts/jquery.backtotop.js"></script>
				<script src="../resources/js/scripts/jquery.mobilemenu.js"></script>
			</body>
			</html>

			@endsection('content')
