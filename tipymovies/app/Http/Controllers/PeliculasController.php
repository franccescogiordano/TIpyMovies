<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pelicula;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class PeliculasController extends Controller
{
    public function getLista($texto_busqueda="pulp",$page=1){
        $texto_busqueda=urlencode($texto_busqueda);

        $client = new \GuzzleHttp\Client();
        $anio_busqueda="";
        $tipo_busqueda="";
        $response = $client->get('http://www.omdbapi.com/',['query'=>['s'=>$texto_busqueda,'y'=>$anio_busqueda,'type'=>$tipo_busqueda,'page'=>$page,'apikey'=>'169e719d']]);

        $json_response=json_decode($response->getBody(), true);
        $films=$json_response["Search"];
        $peliculas=array();
        foreach ($films as $key => $value) {
            //$params=array('anio'=>$value["Year"],'titulo'=>$value["Title"],'poster'=>$value["Poster"],'id'=>$value["imdbID"]);
            $pelicula = new Pelicula();
            $pelicula->setId($value["imdbID"]);
            $pelicula->setTitulo($value["Title"]);
            $pelicula->setPoster($value["Poster"]);
            $peliculas[]=$pelicula;
            //$posters[]=$value['Poster'];
        }
        //return $peliculas;
        return view('ListarPeliculas', [
            'peliculas' => $peliculas,
            'page' => $page,
            'texto_busqueda' => $texto_busqueda
        ]);
    }

    public function getLista2(Request $request){
        $texto_busqueda = $request->input('texto_busqueda');
        $page=1;
        $texto_busqueda=urlencode($texto_busqueda);

        $client = new \GuzzleHttp\Client();
        $anio_busqueda="";
        $tipo_busqueda="";
        $response = $client->get('http://www.omdbapi.com/',['query'=>['s'=>$texto_busqueda,'y'=>$anio_busqueda,'type'=>$tipo_busqueda,'page'=>$page,'apikey'=>'169e719d']]);

        $json_response=json_decode($response->getBody(), true);
        $films=$json_response["Search"];
        $peliculas=array();
        foreach ($films as $key => $value) {
            //$params=array('anio'=>$value["Year"],'titulo'=>$value["Title"],'poster'=>$value["Poster"],'id'=>$value["imdbID"]);
            $pelicula = new Pelicula();
            $pelicula->setId($value["imdbID"]);
            $pelicula->setTitulo($value["Title"]);
            $pelicula->setPoster($value["Poster"]);
            $peliculas[]=$pelicula;
            //$posters[]=$value['Poster'];
        }
        //return $peliculas;
        return view('ListarPeliculas', [
            'peliculas' => $peliculas,
            'page' => $page,
            'texto_busqueda' => $texto_busqueda
        ]);
    }
}
