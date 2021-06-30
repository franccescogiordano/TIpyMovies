<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pregunta;
use App\Models\Pelicula;
use App\Models\Score;
use App\Models\User;
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

    public function AgregarMovil(Request $request){
        $pre = new Pregunta;
        $pre->pregunta = $request->input('pregunta');
        $pre->respuestaC = $request->input('respuestaC');
        $pre->respuestaI1 = $request->input('respuestaI1');
        $pre->respuestaI2 = $request->input('respuestaI2');
        $pre->respuestaI3 = $request->input('respuestaI3');
        $pre->imdbID = $request->input('imdbID');
        $pre->validada=1;

        $pre->save();
        //return redirect()->Route('Agregar.pregunta', ['titulo' => $titulo, 'imdbID' => $pre->imdbID]);
        return response()->json([
            'resultado' => 'ok'
            ]);
    }


    public function getCuestionario($imdbID,$titulo){
        $imdbID = urldecode($imdbID);
        $titulo = urldecode($titulo);

        $client = new \GuzzleHttp\Client();
        $response = $client->get('http://www.omdbapi.com/',['query' => ['i' => $imdbID,'apikey'=>'169e719d']]);
        $json_response=json_decode($response->getBody(), true);
        $poster  = $json_response["Poster"];
        $pre = Pregunta::where('imdbID',$imdbID)->get()->random(10)->shuffle();
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
            'poster' => $poster,
            'preguntas2' => $this->preguntas,
            'imdbID' => $imdbID,
            'titulo' => $titulo
        ]);
    }

    public function getCuestionarioMovil1(Request $request){
        $imdbID  = $request->input('imdbID');
        $pre = Pregunta::where('imdbID',$imdbID)->get()->random(10)->shuffle();
        $trivia  = json_encode(array('preguntas'=>$pre));
        return  $trivia;
    }

    public function getCuestionario2(){
        $pre = Pregunta::get()->random(10);
        $client = new \GuzzleHttp\Client();
        $poster =[];
        foreach($pre as $pregunta){
            $response = $client->get('http://www.omdbapi.com/',['query' => ['i' => $pregunta->imdbID,'apikey'=>'169e719d']]);
            $json_response=json_decode($response->getBody(), true);
            $poster[] = $json_response["Poster"];
        }

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
        return view('MiniJuego2', [
            'preguntas2' => $this->preguntas,
            'poster' => $poster
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
      			$score->puntos += $puntos;
                $score->save();
        }
        return view('ResultadoMiniJuego',[
            'combo' => $combo,
            'puntos' => $puntos,
            'correctas' => $correctas,
            'record' => $record
        ]);
    }

    public function puntuar2(Request $request){

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
	$posts = Score::leftJoin('users', 'scores.user_id', '=', 'users.id')->groupBy('username')->selectRaw('users.username, sum(puntos) as puntos')->orderBy('puntos', 'DESC')->get();
    $lo10masalto= $posts->take(10);
    return view('Ranking', [
        'topten' => $lo10masalto
        ]);
    }

    public function toptenMovil(){
        $posts = Score::leftJoin('users', 'scores.user_id', '=', 'users.id')->groupBy('username')->selectRaw('users.username, sum(puntos) as puntos')->orderBy('puntos', 'DESC')->get();
        $lo10masalto= $posts->take(10);
        $lo10masalto->each(function($item){
            $iduser = $item->user_id;
            $users = User::where('id',$iduser)->get()->first();
        });
        return response()->json([
            'topten' => $lo10masalto
            ]);
        }
}
