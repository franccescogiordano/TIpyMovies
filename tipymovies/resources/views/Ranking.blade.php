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
          <p class="heading">Listado de Peliculas</p>

            <div class="container">
            <table class="table table-dark">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">UserName</th>
                <th scope="col">Puntos</th>
                <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $cont = 1;
                @endphp
                @foreach($topten as $top)
                    <tr>
                        <th scope="row">{{$cont}}</th>
                        <td>{{ $top->user_id }}</td>
                        <td>{{ $top->puntos }}</td>
                        <td>@mdo</td>
                    </tr>
                    @php
                        $cont++;
                    @endphp
                @endforeach
            </tbody>
            </table>
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
