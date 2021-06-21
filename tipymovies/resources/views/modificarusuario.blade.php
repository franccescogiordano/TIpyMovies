<!DOCTYPE html>
@extends('layout')

@section('content')
<html lang="">
<head>
<title>Perfil Usuario</title>
</head>
<body id="top">
  <div class="wrapper">
    <div id="pageintro" class="hoc clear">
      <article>
        <div>
          <p class="heading">Datos Usuario</p>

            <div class="container">
                <div class="row">
                  <form method="POST" action="">
                    <input type="text" name="nombre" value="{{ Auth::user()->name }}">
                    <input type="text" name="email" value="{{ Auth::user()->email }}">
                    <input type="password" name="password" value="{{ Auth::user()->password}}">
                    <input type="text" name="usarname" value="{{ Auth::user()->username }}">
                    <button type="submit">Modificar Datos</button>
                  </form>
                </div>
      </article>
    </div>
  </div>
</div>
<!-- JAVASCRIPTS -->
<script src="../resources/js/scripts/jquery.min.js"></script>
<script src="../resources/js/scripts/jquery.backtotop.js"></script>
<script src="../resources/js/scripts/jquery.mobilemenu.js"></script>
</body>
</html>

@endsection('content')
