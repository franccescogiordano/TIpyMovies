<?php
namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Score;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Show the profile for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        return view('user.profile', [
            'user' => User::findOrFail($id)
        ]);

      /*   return view('user.profile', [
            'user' => User::findOrFail($username,$password)
        ]);*/
    }

   /* public function index(){
    	$p=User::all();
    	return response()->json($p,200);
    }
      public function store(Request $request){
    	$p=new User ($request->all());
    	$p->save();
    	return response()->json($p,200);
    }*/
    public function login(Request $request)
    {
       // $this->validateLogin($request);
    	//$credentials = $request()->json()->only('email', 'password');
        $credentials = request()->all();
        //var_dump($credentials);exit;
        //if (Auth::attempt($credentials)) {
        if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']])) {
            //$user = $this->guard()->user();
            //$user->generateToken();

            return response()->json([
                'data' => Auth::user()->toArray(),
            ]);
        }else {
        return response()->json([
                'data' => 'Error',
            ]);
        }
}
    
    public function userScores($iduser)
    {
        $iduser=urlencode($iduser);        
        $posts = Score::leftJoin('users', 'scores.user_id', '=', 'users.id')->groupBy('username')->where('users.id', $iduser)->get();
        $client = new \GuzzleHttp\Client();
        $peliculas = collect([]);
        $i = 0;
        foreach($posts as $post2){
            $i = $i + 1;
            $response = $client->get('http://www.omdbapi.com/',['query' => ['i' => $post2->imdbID,'apikey'=>'169e719d']]);
            $json_response=json_decode($response->getBody(), true);
            $titulo=$json_response["Title"];
            $peliculas->put('username' . $i,$post2->username);
            $peliculas->put('puntos' . $i,$post2->puntos);
            $peliculas->put('titulo' . $i,$titulo);
        }
        $peliJson = json_encode($peliculas);
        //var_dump($peliJson);
        return view('userProfile')->with('pelisUser', $peliJson);
    }
}
