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
          <p class="heading">Resultados de {{ $titulo }}</p>

            <div class="container">
            	<img src="{{ $poster }}">
                <p>Mejor combo: {{ $combo }}</p>
                <p>Respuesta correctas: {{ $correctas }}</p>
              
                @foreach($answers as $top)
                  @foreach($top as $top1)
                    <tr bgcolor="black">

                        <td>{{ $top1->respuestacorrecta }}</td>

                    </tr>
                @endforeach
                @endforeach
                <p>Total de puntos: {{ $puntos }}</p>
                @if($record == 1)
                <p>Nuevo Record!!</p><!--con un if de laravel-->
                @endif

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
