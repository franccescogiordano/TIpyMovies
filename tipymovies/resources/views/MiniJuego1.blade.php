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
                        <p id="correctas">correctas</p>
                        <p id="combo">combo</p>
                        <p id="puntos">puntos</p>
                        </div>

                        <h2 id="pregunta" class="heading">pregunta</h2>

                        <div class="container">
                            <form id="formPreguntas" action="{{ route('Puntuar2',['imdbID' => $imdbID,'titulo' => $titulo ]) }}" method="POST">
                                <input  type="text" name="preg[]" id="pr0" value="pedro">
                                <input style="" type="text" name="preguntas[]" id="p5" value="{{$preguntas2[1]['id']}}">
                                <input style="" type="text" name="preguntas[]" id="p2" value="{{$preguntas2[2]['id']}}">
                                <input style="" type="text" name="preguntas[]" id="p3" value="{{$preguntas2[3]['id']}}">
                                <input style="" type="text" name="preguntas[]" id="p4" value="{{$preguntas2[4]['id']}}">
                                <input style="" type="text" name="preguntas[]" id="p1" value="{{$preguntas2[5]['id']}}">
                                <input style="" type="text" name="preguntas[]" id="p6" value="{{$preguntas2[6]['id']}}">
                                <input style="" type="text" name="preguntas[]" id="p7" value="{{$preguntas2[7]['id']}}">
                                <input style="" type="text" name="preguntas[]" id="p8" value="{{$preguntas2[8]['id']}}">
                                <input style="" type="text" name="preguntas[]" id="p9" value="{{$preguntas2[9]['id']}}">

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

                                <button class="btn btn-default respuestas" type="button" onClick="javascript:next(1);" value="" id="res1" name="res1">.</button><br><br>
                                <button class="btn btn-default respuestas" type="button" onClick="javascript:next(2);" value="" id="res2" name="res2">.</button><br><br>
                                <button class="btn btn-default respuestas" type="button" onClick="javascript:next(3);" value="" id="res3" name="res3">.</button><br><br>
                                <button class="btn btn-default respuestas" type="button" onClick="javascript:next(4);" value="" id="res4" name="res4">.</button><br><br>
                            </form>
                            <form id="formAceptar" method="POST" action="" style="display:none;"> <!---->
                                @csrf
                                @auth
                                <p><label id="correctasLabel" >Correctas:</label>
                                <label id="puntosLabel" >Puntos:</label></p>
                                <input style="display:none;" type="text" value="co" id="correctasInput" name="correctas">
                                <input style="display:none;" type="text" value="pu" id="puntosInput" name="puntos">
                                <input style="display:none;" type="text" value="{{ Auth::user()->id }}" id="userInput" name="iduser">
                                <button class="btn btn-default" type="submit" id="res4" name="aceptar">Aceptar</button>
                                @endauth
                            </form>


                            @php
                            //var_dump($preguntas);
                            //echo " <br> <br> <br> ";
                            //var_dump($preguntas2);

                            @endphp


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
                    //pr = document.getElementById("p"+numPre);
                    //pr.value = pre[numPre]['id'];
                    /*res = document.getElementById("res"+respuesta).value;
                    iguales =  res.localeCompare(pre[numPre]["respuestaC"]);
                    if(!iguales){
                        //alert("respuesta correcta " + pre[numPre]['respuestaC']);
                        correctas++;
                        combo++;
                        puntos += 10 * combo;
                        var pCor = document.getElementById("correctas");
                        pCor.innerHTML = "Correctas: "+correctas;
                        var pCom = document.getElementById("combo");
                        pCom.innerHTML = "Combo: "+combo;
                        var pPun = document.getElementById("puntos");
                        pPun.innerHTML = "Puntos: "+puntos;
                    }
                    else{
                        combo=1;
                        var pCom = document.getElementById("combo");
                        pCom.innerHTML = "Combo: "+combo;
                    }*/
                }
                if(numPre<9){
                    numPre++;
                    var p = document.getElementById("pregunta");
                    p.innerHTML = pre[numPre]['pregunta'];

                    /*shuffle(arr);
                    //alert("numero "+arr[0]);
                    var r1 = document.getElementById("res"+arr[0]);
                    r1.firstChild.data = pre[numPre]['respuestaC'];
                    r1.value = pre[numPre]['respuestaC'];
                    var r2 = document.getElementById("res"+arr[1]);
                    r2.firstChild.data = pre[numPre]['respuestaI1'];
                    r2.value = pre[numPre]['respuestaI1'];
                    var r3 = document.getElementById("res"+arr[2]);
                    r3.firstChild.data = pre[numPre]['respuestaI2'];
                    r3.value = pre[numPre]['respuestaI2'];
                    var r4 = document.getElementById("res"+arr[3]);
                    r4.firstChild.data = pre[numPre]['respuestaI3'];
                    r4.value = pre[numPre]['respuestaI3'];*/
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
                    //pr = document.getElementById("p"+numPre);
                    //pr.value = pre[numPre]['id'];
                    document.getElementById("formPreguntas").submit();
                    //document.getElementById("formPreguntas").style.display = "none";
                    //document.getElementById("formAceptar").style.display = "initial";
                    //var p = document.getElementById("pregunta");
                    //p.innerHTML = "Trivia terminada! Resultados:";
                    //var corInput = document.getElementById("correctasInput").value = correctas;
                    //corInput.value = correctas;
                    //var punInput = document.getElementById("puntosInput");
                    //punInput.value = puntos;
                    //var lp = document.getElementById("puntosLabel");
                    //lp.innerHTML = "Correctas: "+correctas;
                    //var lc = document.getElementById("correctasLabel");
                    //lc.innerHTML = "Puntos: "+puntos;
                }
            }
        </script>
        <script src="../resources/js/scripts/jquery.min.js"></script>
        <script src="../resources/js/scripts/jquery.backtotop.js"></script>
        <script src="../resources/js/scripts/jquery.mobilemenu.js"></script>
    </body>
</html>

@endsection('content')
