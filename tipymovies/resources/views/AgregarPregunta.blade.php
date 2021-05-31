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
                        <p class="heading">Agregar Pregunta</p>

                        <div class="container">
                        <form method="POST" action="{{ route('Agregar')}}" class=" my-2 my-lg-0" >
							@csrf
							<input class="form-control mr-sm-2" type="text" placeholder="Pregunta" aria-label="Search" id="pregunta" name="pregunta">
                            <input class="form-control mr-sm-2" type="text" placeholder="Respuesta correcta" aria-label="Search" id="respuesta_corracta" name="respuestaC">
                            <input class="form-control mr-sm-2" type="text" placeholder="Respuesta incorrecta" aria-label="Search" id="respuesta_incorrecta1" name="respuestaI1">
                            <input class="form-control mr-sm-2" type="text" placeholder="Respuesta incorrecta" aria-label="Search" id="respuesta_incorrecta2" name="respuestaI2">
                            <input class="form-control mr-sm-2" type="text" placeholder="Respuesta incorrecta" aria-label="Search" id="respuesta_incorrecta3" name="respuestaI3">
                            <input class="form-control mr-sm-2" type="text" name="imdbID" value="{{$imdbID}}" style="display: none;">

							<button class="btn btn-default my-2 my-sm-0" type="submit" name="btnBuscar">Agregar</button>

						</form>
                        </div>

                    </div>
                    <footer>
                    <!--<ul class="nospace inline pushright">
                        <li><a class="btn inverse" href="#">Boton</a></li>
                        <li><a class="btn" href="#">Botoncito</a></li>
                    </ul>-->
                    </footer>
                </article>
            </div>
        </div>
        <!-- JAVASCRIPTS -->
        <script src="../resources/js/scripts/jquery.min.js"></script>
        <script src="../resources/js/scripts/jquery.backtotop.js"></script>
        <script src="../resources/js/scripts/jquery.mobilemenu.js"></script>
    </body>
</html>

@endsection('content')
