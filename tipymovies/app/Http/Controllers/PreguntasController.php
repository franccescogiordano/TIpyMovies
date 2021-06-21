<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pregunta;
use App\Models\Pelicula;
use App\Models\Score;
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

        //get puntos para saber si es nuevo record

        return view('MiniJuego1', [
            'preguntas' => $random,
            'imdbID' => $imdbID,
            'titulo' => $titulo
        ]);
    }
    public function getCuestionario2(){
        $pre = Pregunta::get()->random(10);
        $pelicula = new Pelicula;
        $peliculas=array();
        $client = new \GuzzleHttp\Client();

        for($p =0; $p < 10; $p++){
            $response = $client->get('http://www.omdbapi.com/',['i' => $pre->imdbID,'apikey'=>'169e719d']);
            $json_response=json_decode($response->getBody(), true);
            $films=$json_response["Search"];
            $pelicula->setId($films['imdbID']);
            $pelicula->setTitulo($films['title']);
            $pelicula->setPoster($films['poster']);
            $peliculas[]=$pelicula;
        }
        //get puntos para saber si es nuevo record

        return view('MiniJuego2', [
            'preguntas' => $random,
            'peliculas' => $peliculas
        ]);
    }

    public function puntuar(Request $request,$imdbID){
        $correctas = $request->input('correctas');
        $puntos = $request->input('puntos');
        $iduser = $request->input('iduser');
        //$imdbID = $request->input('imdbID');
        $imdbID = urlencode($imdbID);
        $score = new Score;
        $score = Score::where('user_id',$iduser)->where('imdbID',$imdbID)->get()->first();
        if($score == null){
            $score = new Score;
            $score->puntos = $puntos;
            $score->user_id = $iduser;
            $score->imdbID = $imdbID;
            $score->save();
            return "Nueva entrada";
        }
        else{
            if($score->puntos < $puntos){
                $score->puntos = $puntos;
                $score->save();
            }
        }
        return "ok";
    }

    public function topten(){
	$posts = Score::orderBy('puntos', 'DESC')->get();
    	 //$scores = Score::get();
    	// $grouped = $scores->groupBy('user_id');
    	$lo10masalto= $posts->take(10);
    	return $lo10masalto;
    }
}
