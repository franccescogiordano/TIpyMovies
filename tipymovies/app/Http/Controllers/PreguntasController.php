<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pregunta;
use App\Models\Pelicula;
use App\Models\Score;
use App\Models\Trivia;
use Illuminate\Http\Request;

class PreguntasController extends Controller
{
    protected $titulo;
    protected $preguntas;

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
        $a = $request->input('a');
        if(!isset($a))
            return redirect()->Route('Agregar.pregunta', ['titulo' => $titulo, 'imdbID' => $pre->imdbID]);
    }

    public function getCuestionario($imdbID,$titulo){
        $imdbID = urldecode($imdbID);
        $titulo = urldecode($titulo);
        $pre = Pregunta::where('imdbID',$imdbID)->get()->random(10);
        $this->preguntas = array();
        $pre->each(function($item){
            //echo "en el each";
            $desordenar = array($item->respuestaC, $item->respuestaI1, $item->respuestaI2, $item->respuestaI3);
            shuffle($desordenar);
            $tri = new Trivia;
            $tri->imdbID = $item->imdbID;
            $tri->id = $item->id;
            $tri->pregunta = $item->pregunta;
            $tri->res1 = $desordenar[0];
            $tri->res2 = $desordenar[1];
            $tri->res3 = $desordenar[2];
            $tri->res4 = $desordenar[3];
            $this->preguntas[] = ['id' => $item->id,'pregunta' => $item->pregunta, 'res1' => $desordenar[0],'res2' => $desordenar[1], 'res3' => $desordenar[2], 'res4' => $desordenar[3]];
            //var_dump($tri);
        });
        //var_dump($this->preguntas);
        $pre2 = collect($this->preguntas);

        return view('MiniJuego1', [
            'preguntas' => $pre,
            'preguntas2' => $this->preguntas,
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
        $iduser = $request->input('iduser');
        $r = $request->input('respuestas');
        $p = $request->input('preguntas');
        $combo = 0;
        $puntos = 0;
        $correctas = 0;
        $record = 0;
        for($f=0;$f<10;$f++){
            $pre = Pregunta::where('id',$p[$f])->get()->first();
            if($pre->respuestaC == $r[$f]){
                $puntos += 10 * ($combo +1);
                $correctas++;
                $combo++;
            }
            else{
                $combo = 0;
            }
        }
        $imdbID = urlencode($imdbID);
        $score = new Score;
        $score = Score::where('user_id',$iduser)->where('imdbID',$imdbID)->get()->first();
        if($score == null){
            $score = new Score;
            $score->puntos = $puntos;
            $score->user_id = $iduser;
            $score->imdbID = $imdbID;
            $score->save();
            $record = 1;
        }
        else{
            if($score->puntos < $puntos){
                $score->puntos = $puntos;
                $score->save();
            }
        }
        return view('ResultadoMiniJuego',[
            'combo' => $combo,
            'puntos' => $puntos,
            'correctas' => $correctas,
            'record' => $record
        ]);
    }

    public function getTopScore(){
        return view('Ranking');
    }

    public function topten(){
	    $posts = Score::orderBy('puntos', 'DESC')->get();
    	$lo10masalto= $posts->take(10);
    	return view('Ranking', [
            'topten' => $lo10masalto
        ]);
    }
}
