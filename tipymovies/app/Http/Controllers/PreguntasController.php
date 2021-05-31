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
        $pre->validada=0;

        $pre->save();
        return "ok";
    }
}
