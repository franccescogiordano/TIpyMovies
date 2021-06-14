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
                    @php
                        $counter = 0;
                    @endphp
                    @foreach($peliculas as $peli)

                        <a href="{{ route('DetallePeliculas',[ 'idchossen' => $peli->getid() , 'titlepeli' => $peli->getTitulo() ]) }}" >
                          <div class="col PosterContainer"><img id="Poster" src='{{ $peli->getPoster() }}' alt='{{ $peli->getTitulo() }}' ></div>
                        </a>

                        @php

                            $counter += 1;
                        @endphp

                        @if($counter === 3)
                            <div class="w-100"></div>
                            @php
                                $counter = 0;
                            @endphp
                        @endif

                    @endforeach

                </div>
            </div>
            <ul class="nospace inline pushright">
                <li><a class="btn inverse" href="{{ route('listarPeliculas.busqueda.page',['texto_busqueda' => $texto_busqueda, 'page' => $page-1]) }}">Anterior</a></li>
                <li><a class="btn" href="{{ route('listarPeliculas.busqueda.page',['texto_busqueda' => $texto_busqueda, 'page' => $page+1]) }}">Siguiente</a></li>
          </ul>
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
