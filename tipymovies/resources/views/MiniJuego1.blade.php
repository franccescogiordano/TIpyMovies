<!DOCTYPE html>
@extends('layout')

@section('content')
<html lang="">
    <head>
        <title>Show</title>
    </head>
    <body id="top" onload="next(0);">
        <div class="wrapper">
            <div id="pageintro" class="hoc clear">
                <article>
                    <div>
                        <p id="correctas">correctas</p>
                        <p id="combo">combo</p>
                        <p id="puntos">puntos</p>

                        <p id="pregunta" class="heading">{{$preguntas[0]->pregunta}}</p>

                        <div class="container">
                            <form id="formPreguntas" >
                                <button class="btn btn-default" type="button" onClick="javascript:next(1);" value="" id="res1" name="res1">.</button>
                                <button class="btn btn-default" type="button" onClick="javascript:next(2);" value="" id="res2" name="res2">.</button>
                                <button class="btn btn-default" type="button" onClick="javascript:next(3);" value="" id="res3" name="res3">.</button>
                                <button class="btn btn-default" type="button" onClick="javascript:next(4);" value="" id="res4" name="res4">.</button>
                            </form>
                            <form id="formAceptar" method="POST" action="{{ route('puntuar') }}" style="display:none;">
                                @csrf
                                <label id="correctasLabel" >Correctas:</label>
                                <label id="puntosLabel" >Puntos:</label>
                                <input style="display:none;" type="text" value="co" id="correctasInput" name="correctas">
                                <input style="display:none;" type="text" value="pu" id="puntosInput" name="puntos">
                                <button class="btn btn-default" type="submit" id="res4" name="aceptar">Aceptar</button>
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
            var pre = {!! json_encode($preguntas) !!};
            let arr = [1, 2, 3, 4];
            combo = 0;
            correctas = 0;
            puntos = 0;
            function shuffle(array) {
                var currentIndex = array.length,  randomIndex;

                // While there remain elements to shuffle...
                while (0 !== currentIndex) {

                    // Pick a remaining element...
                    randomIndex = Math.floor(Math.random() * currentIndex);
                    currentIndex--;

                    // And swap it with the current element.
                    [array[currentIndex], array[randomIndex]] = [
                    array[randomIndex], array[currentIndex]];
                }

                return array;
            }

            function next(respuesta){
                console.log(pre[0]);
                if(respuesta!=0){
                    res = document.getElementById("res"+respuesta).value;
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
                        combo=0;
                        var pCom = document.getElementById("combo");
                        pCom.innerHTML = "Combo: "+combo;
                    }
                }
                if(numPre<9){
                    numPre++;
                    var p = document.getElementById("pregunta");
                    p.innerHTML = pre[numPre]['pregunta'];

                    shuffle(arr);
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
                    r4.value = pre[numPre]['respuestaI3'];
                }
                else{
                    document.getElementById("formPreguntas").style.display = "none";
                    document.getElementById("formAceptar").style.display = "initial";
                    var p = document.getElementById("pregunta");
                    p.innerHTML = "Trivia terminada! Resultados:";
                    var corInput = document.getElementById("correctasInput").value = correctas;
                    corInput.value = correctas;
                    var punInput = document.getElementById("puntosInput");
                    punInput.value = puntos;
                    var lp = document.getElementById("puntosLabel");
                    lp.innerHTML = "Correctas: "+correctas;
                    var lc = document.getElementById("correctasLabel");
                    lc.innerHTML = "Puntos: "+puntos;
                }
            }
        </script>
        <script src="../resources/js/scripts/jquery.min.js"></script>
        <script src="../resources/js/scripts/jquery.backtotop.js"></script>
        <script src="../resources/js/scripts/jquery.mobilemenu.js"></script>
    </body>
</html>

@endsection('content')
