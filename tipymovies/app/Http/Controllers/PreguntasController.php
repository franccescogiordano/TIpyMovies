<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pregunta;
use Illuminate\Http\Request;

class PreguntasController extends Controller
{
    public function Agregar(Request $request){
        $pre = new Pregunta;
        $pre->pregunta = $request->input('pregunta');
        $pre->respuestaC = $request->input('respuestaC');
        $pre->respuestaI1 = $request->input('respuestaI1');
        $pre->respuestaI2 = $request->input('respuestaI2');
        $pre->respuestaI3 = $request->input('respuestaI3');
        $pre->imdbID = $request->input('imdbID');
        $titulo = $request->input('titulo');
        $pre->validada=1;

        $pre->save();
        return redirect()->Route('Agregar.pregunta', ['titulo' => $titulo, 'imdbID' => $pre->imdbID]);
    }

    public function getCuestionario($imdbID,$titulo){
        $imdbID = urldecode($imdbID);
        $titulo = urldecode($titulo);
        $pre = Pregunta::where('imdbID',$imdbID)->get();
        $random = $pre->random(10);
        return view('MiniJuego1', [
            'preguntas' => $random
        ]);
    }

    public function puntuar(Request $request){
        $correctas = $request->input($correctas);
        $puntos = $request->input($puntos);
        return $puntos+" "+$correctas;
    }
}
