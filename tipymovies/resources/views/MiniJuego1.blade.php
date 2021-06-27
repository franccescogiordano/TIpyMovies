<!DOCTYPE html>
@extends('layout')

@section('content')
<html lang="">
    <head>
        <title>Show</title>
        <link rel="stylesheet" href="\css\preguntas.css">
    </head>
    <body id="top" onload="next(0);">
        <div class="wrapper">
            <div id="pageintro" class="hoc clear">
                <article>
                    <div>
                        <div style="align-items: center;">
                        	<h2 class="heading">RESPONDE ESTAS 10 PREGUNTAS DE: {{ $titulo }}</h2>
                        <img src="{{ $poster }}">
                        
                        <h2 id="pregunta" class="heading">pregunta</h2>

                        <div class="container">
                            <form id="formPreguntas" action="{{ route('Puntuar',['imdbID' => $imdbID,'titulo' => $titulo ]) }}" method="POST">
                                @csrf
                                <input style="display: none;" type="text" name="preguntas[]" id="p0" value="{{$preguntas2[0]['id']}}">
                                <input style="display: none;" type="text" name="preguntas[]" id="p5" value="{{$preguntas2[1]['id']}}">
                                <input style="display: none;" type="text" name="preguntas[]" id="p2" value="{{$preguntas2[2]['id']}}">
                                <input style="display: none;" type="text" name="preguntas[]" id="p3" value="{{$preguntas2[3]['id']}}">
                                <input style="display: none;" type="text" name="preguntas[]" id="p4" value="{{$preguntas2[4]['id']}}">
                                <input style="display: none;" type="text" name="preguntas[]" id="p1" value="{{$preguntas2[5]['id']}}">
                                <input style="display: none;" type="text" name="preguntas[]" id="p6" value="{{$preguntas2[6]['id']}}">
                                <input style="display: none;" type="text" name="preguntas[]" id="p7" value="{{$preguntas2[7]['id']}}">
                                <input style="display: none;" type="text" name="preguntas[]" id="p8" value="{{$preguntas2[8]['id']}}">
                                <input style="display: none;" type="text" name="preguntas[]" id="p9" value="{{$preguntas2[9]['id']}}">

                                <input style="display: none;" type="text" name="respuestas[]" id="r0" value="">
                                <input style="display: none;" type="text" name="respuestas[]" id="r1" value="">
                                <input style="display: none;" type="text" name="respuestas[]" id="r2" value="">
                                <input style="display: none;" type="text" name="respuestas[]" id="r3" value="">
                                <input style="display: none;" type="text" name="respuestas[]" id="r4" value="">
                                <input style="display: none;" type="text" name="respuestas[]" id="r5" value="">
                                <input style="display: none;" type="text" name="respuestas[]" id="r6" value="">
                                <input style="display: none;" type="text" name="respuestas[]" id="r7" value="">
                                <input style="display: none;" type="text" name="respuestas[]" id="r8" value="">
                                <input style="display: none;" type="text" name="respuestas[]" id="r9" value="">
                                @auth
                                <input style="display: none;" type="text" name="iduser" value="{{ Auth::user()->id }}">
                                @endauth
                                <button class="btn btn-default respuestas" type="button" onClick="javascript:next(1);" value="" id="res1" name="res1">.</button><br><br>
                                <button class="btn btn-default respuestas" type="button" onClick="javascript:next(2);" value="" id="res2" name="res2">.</button><br><br>
                                <button class="btn btn-default respuestas" type="button" onClick="javascript:next(3);" value="" id="res3" name="res3">.</button><br><br>
                                <button class="btn btn-default respuestas" type="button" onClick="javascript:next(4);" value="" id="res4" name="res4">.</button><br><br>
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
            numPre = -1;

            var pre = {!! json_encode($preguntas2) !!};
            console.log(pre);


            function next(respuesta){
                console.log(pre[0]);

                if(respuesta!=0){
                    res = document.getElementById("res"+respuesta).value;
                    inp = document.getElementById("r"+numPre);
                    inp.value = res;
                }
                if(numPre<9){
                    numPre++;
                    var p = document.getElementById("pregunta");
                    p.innerHTML = pre[numPre]['pregunta'];
                    var r1 = document.getElementById("res1");
                    r1.firstChild.data = pre[numPre]['res1'];
                    r1.value = pre[numPre]['res1'];
                    var r2 = document.getElementById("res2");
                    r2.firstChild.data = pre[numPre]['res2'];
                    r2.value = pre[numPre]['res2'];
                    var r3 = document.getElementById("res3");
                    r3.firstChild.data = pre[numPre]['res3'];
                    r3.value = pre[numPre]['res3'];
                    var r4 = document.getElementById("res4");
                    r4.firstChild.data = pre[numPre]['res4'];
                    r4.value = pre[numPre]['res4'];
                }
                else{
                    res = document.getElementById("res"+respuesta).value;
                    inp = document.getElementById("r"+numPre);
                    inp.value = res;
                    document.getElementById("formPreguntas").submit();
                }
            }
        </script>
        <script src="../resources/js/scripts/jquery.min.js"></script>
        <script src="../resources/js/scripts/jquery.backtotop.js"></script>
        <script src="../resources/js/scripts/jquery.mobilemenu.js"></script>
    </body>
</html>

@endsection('content')
