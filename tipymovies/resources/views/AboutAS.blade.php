<!DOCTYPE html>
@extends('layout')

@section('content')


<title>About Us</title>
<div>
    <h2>Acerca de TIPYMOVIES:</h2>
    <p>Buscamos ser referentes de la pirateria de peliculas, ofreciendo una basta cantidad de paginas web de dudosa procedencia con pelicula taquilleras del ayer y hoy.</p>
</div>
<div class="container">
    <form action="action_page.php">

        <label for="fname">Nombre</label>
        <input type="text" id="fname" name="firstname" placeholder="Nombre">

        <label for="lname">Apellido</label>
        <input type="text" id="lname" name="lastname" placeholder="Apellido">

        <label for="country">País</label>
        <input type="text" id="Cname" name="Country" placeholder="País">

        <label for="subject">Mensaje</label>
        <textarea id="subject" name="subject" placeholder="Escriba su mensaje" style="height:200px"></textarea>

        <input type="submit" value="Submit">

    </form>
</div>


<!-- JAVASCRIPTS -->


@endsection('content')