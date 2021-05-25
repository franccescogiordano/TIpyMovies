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
          <p class="heading">Sin resultados</p>

            <div class="container">
            <img src="{{URL::asset('/images/pika.png')}}" height="200" width="200">
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
</div>
<!-- JAVASCRIPTS -->
<script src="../resources/js/scripts/jquery.min.js"></script>
<script src="../resources/js/scripts/jquery.backtotop.js"></script>
<script src="../resources/js/scripts/jquery.mobilemenu.js"></script>
</body>
</html>

@endsection('content')
