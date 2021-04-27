<!DOCTYPE html>
@extends('layout')

@section('content')
<html lang="">
<head>
<title>Registrar Usuario</title>
</head>
<body id="top">  
  <form action="">
  <div class="container">
    <h1>Registro de usuario</h1>
    <p>Complete los campos para completar el registro</p>
    <hr>

    <label for="email"><b>Nombre de Usuario</b></label>
    <input type="text" placeholder="Enter Email" name="email" id="email" required>
    
    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" id="email" required>

    <label for="psw"><b>Contraseña</b></label>
    <input type="password" placeholder="Enter Password" name="psw" id="psw" required>

    <label for="psw-repeat"><b>Reingresar Contraseña</b></label>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" id="psw-repeat" required>
    <hr>

    <p>Al crearte una cuenta aquí aceptas nuestras condiciones y le vendes tu páncreas a Mephisto y Ghost Rider<a href=""> Terms & Privacy</a>.</p>
    <button type="submit" class="registerbtn">Registrarse</button>
  </div>

  <div class="container signin">
    <p>¿Ya tienes una cuenta? <a href="">Iniciar sesión</a>.</p>
  </div>
</form>
</div>
<!-- JAVASCRIPTS -->
<script src="../resources/js/scripts/jquery.min.js"></script>
<script src="../resources/js/scripts/jquery.backtotop.js"></script>
<script src="../resources/js/scripts/jquery.mobilemenu.js"></script>
</body>
</html>

<!-- SCRIPTS -->


@endsection