<!DOCTYPE html>
@extends('layout')

@section('content')

   
        <title>Show</title>
        


    
        <div class="wrapper">
            <div id="pageintro" class="hoc clear">
                <article>
                    <div class="CPreguntas" >
                        <h2 class="heading">Agregar Pregunta</h2>

                        <div class="container">
                        <form method="POST" action="{{ route('Agregar')}}" class=" my-2 my-lg-0" >
							@csrf
							<input class="form-control mr-sm-2 pregunta" type="textarea" placeholder="Pregunta" aria-label="Search" id="pregunta" name="pregunta"><br>
                            <input class="rc form-control mr-sm-2 " type="textarea" placeholder="Respuesta correcta" aria-label="Search" id="respuesta_corracta" name="respuestaC"><br>
                            <input class="ri form-control mr-sm-2 " type="textarea" placeholder="Respuesta incorrecta" aria-label="Search" id="respuesta_incorrecta1" name="respuestaI1"><br>
                            <input class="ri form-control mr-sm-2 " type="textarea" placeholder="Respuesta incorrecta" aria-label="Search" id="respuesta_incorrecta2" name="respuestaI2"><br>
                            <input class="ri form-control mr-sm-2 " type="textarea" placeholder="Respuesta incorrecta" aria-label="Search" id="respuesta_incorrecta3" name="respuestaI3"><br>
                            <input class="form-control mr-sm-2" type="text" name="imdbID" value="{{$imdbID}}" style="display: none;">
                            <input class="form-control mr-sm-2" type="text" name="titulo" value="{{$titulo}}" style="display: none;">
							<button class="btn btn-default my-2 my-sm-0 agregar" type="submit" name="btnBuscar">Agregar</button>

						</form>
                        </div>

                    </div>
                </article>
            </div>
        </div>
        <!-- JAVASCRIPTS -->


@endsection('content')
