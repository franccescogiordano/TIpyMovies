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
                        <p id="pregunta" class="heading">{{$preguntas[0]->pregunta}}</p>

                        <div class="container">
                            <form >
                                @csrf
                                <button class="btn btn-default" type="button" onClick="javascript:next(1);" id="res1" name="res1">{{$preguntas[0]->respuestaC}}</button>
                                <button class="btn btn-default" type="button" onClick="javascript:next(2);" id="res2" name="res2">{{$preguntas[0]->respuestaI1}}</button>
                                <button class="btn btn-default" type="button" onClick="javascript:next(3);" id="res3" name="res3">{{$preguntas[0]->respuestaI2}}</button>
                                <button class="btn btn-default" type="button" onClick="javascript:next(4);" id="res4" name="res4">{{$preguntas[0]->respuestaI3}}</button>
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
        <script>
            numPre = 0;
            var pre = {!! json_encode($preguntas) !!};
            function next(respuesta){
                numPre++;
                console.log(pre[0]);
                if(respuesta == 1){
                    alert("respuesta correcta " + pre[0]['respuestaC']);
                }
                var p = document.getElementById("pregunta");
                p.innerHTML = pre[numPre]['pregunta'];
                var r1 = document.getElementById("res1");
                r1.firstChild.data = pre[numPre]['respuestaC'];
                var r2 = document.getElementById("res1");
                r2.firstChild.data = pre[numPre]['respuestaI1'];
                var r3 = document.getElementById("res1");
                r3.firstChild.data = pre[numPre]['respuestaI2'];
                var r4 = document.getElementById("res1");
                r4.firstChild.data = pre[numPre]['respuestaI3'];
            }
        </script>
        <script src="../resources/js/scripts/jquery.min.js"></script>
        <script src="../resources/js/scripts/jquery.backtotop.js"></script>
        <script src="../resources/js/scripts/jquery.mobilemenu.js"></script>
    </body>
</html>

@endsection('content')
