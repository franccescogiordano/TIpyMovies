<!DOCTYPE html>
@extends('layout')

@section('content')

<link href="{{asset('css/sobrenos.css')}}" rel="stylesheet" type="text/css" media="all">
<title>About Us</title>

<div class="container">
    <h2>Acerca de TIPYMOVIES:</h2>
    <p>Buscamos ser referentes de la pirateria de peliculas, ofreciendo una basta cantidad de paginas web de dudosa procedencia con pelicula taquilleras del ayer y hoy.</p>
</div>
<div>

    <div class="container">
        <h2>Contacta con nosotros:</h2>

        <form action="action_page.php">

            <label for="fname">Nombre</label>
            <input type="text" id="fname" name="firstname" placeholder="Nombre">

            <label for="lname">Apellido</label>
            <input type="text" id="lname" name="lastname" placeholder="Apellido">

            <label for="country">País</label>
            <input type="text" id="Cname" name="Country" placeholder="País">

            <label for="subject">Mensaje</label>
            <textarea id="subject" name="subject" placeholder="Escriba su mensaje" style="height:200px"></textarea>

            <input class="btn btn-default my-2 my-sm-0" type="submit" value="Enviar">

        </form>
    </div>
</div>


<!-- JAVASCRIPTS -->


@endsection('content')