<?php
namespace App\Http\Controllers;

    use App\Http\Controllers\Controller;
    use App\Models\Pelicula;
    use App\Models\Pregunta;
    use App\Models\Score;
    use GuzzleHttp\Client;
    use Illuminate\Http\Request;

    class PeliculasController extends Controller {
    	public function getLista($texto_busqueda="pulp",$page=1){
    		$texto_busqueda=urlencode($texto_busqueda);

    		$client = new \GuzzleHttp\Client();
    		$anio_busqueda="";
    		$tipo_busqueda="movie";
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
    		$android = $request->input("a");
    		$page=1;
    		$texto_busqueda=urlencode($texto_busqueda);

    		$client = new \GuzzleHttp\Client();
    		$anio_busqueda="";
    		$tipo_busqueda="movie";
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

    		if(isset($android)){
    			return $json_response;
    		}
    		else{
                //return $peliculas;
    			return view('ListarPeliculas', [
    				'peliculas' => $peliculas,
    				'page' => $page,
    				'texto_busqueda' => $texto_busqueda
    			]);
    		}
    	}

    	public function getListaSeries($texto_busqueda="lost",$page=1){
    		$texto_busqueda=urlencode($texto_busqueda);

    		$client = new \GuzzleHttp\Client();
    		$anio_busqueda="";
    		$tipo_busqueda="series";
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
<<<<<<< HEAD
            return view('ListarSeries', [
                'peliculas' => $peliculas,
                'page' => $page,
                'texto_busqueda' => $texto_busqueda
            ]);
        }
    }

    function mostraruna($idchossen=""){

        $client = new \GuzzleHttp\Client();
        $full="full";
        //$idchossen = $request->input('idchossen');
        // $idchossen=urlencode($idchossen);

        //chequeo si tengo información en las variables del POST

        $response = $client->get('http://www.omdbapi.com/',[
        'query' => ['plot'=>'full','apikey'=>'169e719d','i'=>$idchossen]]);

        //Los datos que envía el servidor, cómo texto
        //var_dump(json_decode($response->getBody(), true)); // Los datos que envía el servidor convertidos


        $json_response=json_decode($response->getBody(), true);
        $films=$json_response;
        $pelicula = new Pelicula();

        //$params=array('anio'=>$value["Year"],'titulo'=>$value["Title"],'poster'=>$value["Poster"],'id'=>$value["imdbID"]);
        $pelicula->setId($films["imdbID"]);
        $pelicula->setTitulo($films["Title"]);
        $pelicula->setPoster($films["Poster"]);
        $pelicula->setGenero($films["Genre"]);
        $pelicula->setRated($films["Rated"]);
        $pelicula->setActores($films["Actors"]);
        $pelicula->setRuntime($films["Runtime"]);
        $pelicula->setPlot($films["Plot"]);

        //$posters[]=$value['Poster'];


        return view('DetallePeliculas', [
                    'titlepeli' => $pelicula->getTitulo(),
                    'peliculas' => $pelicula
                ]);
    }

    function mostrarunaSerie($idchossen=""){

        $client = new \GuzzleHttp\Client();
        $full="full";
        //$idchossen = $request->input('idchossen');
        // $idchossen=urlencode($idchossen);

        //chequeo si tengo información en las variables del POST

        $response = $client->get('http://www.omdbapi.com/',[
        'query' => ['plot'=>'full','apikey'=>'169e719d','i'=>$idchossen]]);

        //Los datos que envía el servidor, cómo texto
        //var_dump(json_decode($response->getBody(), true)); // Los datos que envía el servidor convertidos


        $json_response=json_decode($response->getBody(), true);
        $films=$json_response;
        $pelicula = new Pelicula();

        //$params=array('anio'=>$value["Year"],'titulo'=>$value["Title"],'poster'=>$value["Poster"],'id'=>$value["imdbID"]);
        $pelicula->setId($films["imdbID"]);
        $pelicula->setTitulo($films["Title"]);
        $pelicula->setPoster($films["Poster"]);
        $pelicula->setGenero($films["Genre"]);
        $pelicula->setRated($films["Rated"]);
        $pelicula->setActores($films["Actors"]);
        $pelicula->setRuntime($films["Runtime"]);
        $pelicula->setPlot($films["Plot"]);

        //$posters[]=$value['Poster'];
=======
    		return view('ListarSeries', [
    			'peliculas' => $peliculas,
    			'page' => $page,
    			'texto_busqueda' => $texto_busqueda
    		]);
    	}

    	public function getListaSeries2(Request $request){
    		$texto_busqueda = $request->input('texto_busqueda');
    		$android = $request->input("a");
    		$page=1;
    		$texto_busqueda=urlencode($texto_busqueda);

    		$client = new \GuzzleHttp\Client();
    		$anio_busqueda="";
    		$tipo_busqueda="series";
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

    		if(isset($android)){
    			return $json_response;
    		}
    		else{
                //return $peliculas;
    			return view('ListarSeries', [
    				'peliculas' => $peliculas,
    				'page' => $page,
    				'texto_busqueda' => $texto_busqueda
    			]);
    		}
    	}


    	function mostraruna($idchossen=""){

    		$client = new \GuzzleHttp\Client();
    		$full="full";
            //$idchossen = $request->input('idchossen');
            // $idchossen=urlencode($idchossen);

            //chequeo si tengo información en las variables del POST

    		$response = $client->get('http://www.omdbapi.com/',[
    			'query' => ['plot'=>'full','apikey'=>'169e719d','i'=>$idchossen]]);

            //Los datos que envía el servidor, cómo texto
            //var_dump(json_decode($response->getBody(), true)); // Los datos que envía el servidor convertidos


    		$json_response=json_decode($response->getBody(), true);
    		$films=$json_response;
    		$pelicula = new Pelicula();

            //$params=array('anio'=>$value["Year"],'titulo'=>$value["Title"],'poster'=>$value["Poster"],'id'=>$value["imdbID"]);
    		$pelicula->setId($films["imdbID"]);
    		$pelicula->setTitulo($films["Title"]);
    		$pelicula->setPoster($films["Poster"]);
    		$pelicula->setGenero($films["Genre"]);
    		$pelicula->setRated($films["Rated"]);
    		$pelicula->setActores($films["Actors"]);
    		$pelicula->setRuntime($films["Runtime"]);
    		$pelicula->setPlot($films["Plot"]);
            //$idpeli = $request->input('imdbID');

    		$posts = Score::leftJoin('users', 'scores.user_id', '=', 'users.id')->orderBy('puntos', 'DESC')->where('imdbID', $films["imdbID"])->get();
    		$lo10masalto= $posts->take(10);
    		$cantidad = $lo10masalto->count();
    		$posts2 = Score::leftJoin('users', 'scores.user_id', '=', 'users.id')->orderBy('puntos', 'DESC')->get();
    		$uno = $posts2->take(1);
    		$collection = collect(['id' => 10,'user_id' => 10,'puntos'=> 0,'imdbID' => 'tt0848228','name'=>'Valor por defecto','email'=>'defecto@gmail.com','email_verified_at'=>'null','password'=>'CERIUGYF37YRBUSDG7346','two_factor_secret'=>'null','two_factor_recovery_codes'=>'null','remember_token'=>'null','created_at'=>'null','updated_at'=>'null','username'=>'lokita']);
    		if($cantidad > 0){
    			return view('DetallePeliculas', [
    				'titlepeli' => $pelicula->getTitulo(),
    				'peliculas' => $pelicula,
    				'toppeli' => $lo10masalto,
    				'cant' => $cantidad
                    //'cant' => $cantidad
    			]);
    		} else {
    			return view('DetallePeliculas', [
    				'titlepeli' =>  $pelicula->getTitulo(),
    				'peliculas' => $pelicula,
    				'toppeli' => $uno,
    				'cant' => $cantidad
                     //'cant' => $cantidad
    			]);
    		}


    	}

    	function mostrarunaSerie($idchossen=""){
    		$client = new \GuzzleHttp\Client();
    		$full="full";
    		$response = $client->get('http://www.omdbapi.com/',[
    		'query' => ['plot'=>'full','apikey'=>'169e719d','i'=>$idchossen]]);
    		$json_response=json_decode($response->getBody(), true);
    		$films=$json_response;
    		$pelicula = new Pelicula();
    		$pelicula->setId($films["imdbID"]);
    		$pelicula->setTitulo($films["Title"]);
    		$pelicula->setPoster($films["Poster"]);
    		$pelicula->setGenero($films["Genre"]);
    		$pelicula->setRated($films["Rated"]);
    		$pelicula->setActores($films["Actors"]);
    		$pelicula->setRuntime($films["Runtime"]);
    		$pelicula->setPlot($films["Plot"]);
    		$posts = Score::leftJoin('users', 'scores.user_id', '=', 'users.id')->orderBy('puntos', 'DESC')->where('imdbID', $films["imdbID"])->get();
    		$lo10masalto= $posts->take(10);
    		$cantidad = $posts->count();
    		$posts2 = Score::leftJoin('users', 'scores.user_id', '=', 'users.id')->orderBy('puntos', 'DESC')->get();
    		$uno = $posts2->take(1);
    		if($cantidad > 0){
    			return view('DetalleSeries', [
    				'titlepeli' => $pelicula->getTitulo(),
    				'peliculas' => $pelicula,
    				'toppeli' => $lo10masalto,
    				'cant' => $cantidad
                        //'cant' => $cantidad
    			]);
    		} else {
    			return view('DetalleSeries', [
    				'titlepeli' =>  $pelicula->getTitulo(),
    				'peliculas' => $pelicula,
    				'toppeli' => $uno,
    				'cant' => $cantidad
                        //'cant' => $cantidad
    			]);
    		}
    	}
    }
    	
>>>>>>> Develop

    

<<<<<<< HEAD
        return view('DetallePeliculas', [
            'titlepeli' => $pelicula->getTitulo(),
            'peliculas' => $pelicula
        ]);
    }
}
=======

>>>>>>> Develop
