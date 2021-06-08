<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!

*/


/*Route::view('registro', 'auth.register')->name('register');*/



//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); NO SABEMOS QUE HACE


//agregado
use App\Http\Resources\UserResource;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PeliculasController;
use App\http\Controllers\PreguntasController;
use App\Models\User;

Route::get('/user/{id}', [UserController::class, 'show']);
Route::view('/', 'home')->name('home');
Route::GET('/Peliculas', [PeliculasController::class, 'getLista2'])->name('listarPeliculas');

//Route::GET('/Peliculas', 'App\Http\Controllers\PeliculasController@getLista');

Route::GET('/Peliculasxd/{idchossen}/{titlepeli}', [PeliculasController::class, 'mostraruna'])->name('DetallePeliculas');

Route::GET('/Peliculas/{texto_busqueda}', [PeliculasController::class, 'getLista'])->name('listarPeliculas.busqueda');

Route::GET('/Peliculas/{texto_busqueda}/{page}', [PeliculasController::class, 'getLista'])->name('listarPeliculas.busqueda.page');

Route::GET('/Series/{idchossen}/{titlepeli}', [PeliculasController::class, 'mostrarunaSerie'])->name('DetalleSeries');

Route::GET('/Series/{texto_busqueda}', [PeliculasController::class, 'getListaSeries'])->name('listarSeries.busqueda');

Route::GET('/Series/{texto_busqueda}/{page}', [PeliculasController::class, 'getListaSeries'])->name('listarSeries.busqueda.page');

/*Route::GET('/user/{id}', function ($id) {
    return new UserResource(User::findOrFail($id));
});
*/
Route::GET('/users', function () {
    return UserResource::collection(User::all());
});

Route::GET('/user/{id}/{pass}', function ($id) {
    return new UserResource(User::where('username',$id)->where('password',$pass)->firstOrFail());
});



  /*  Route::bind('user', function ($value) {
        return User::where('name', $value)->firstOrFail();
    });*/

Route::GET('/lista', [PeliculasController::class,'getLista2'])->name('lista');

Route::GET('/AgregarPregunta/{imdbID}/{titulo}', function($id,$titulo){
    return view('AgregarPregunta', ['titulo' => $titulo, 'imdbID' => $id]);
})->name('Agregar.pregunta');

Route::GET('/MiniJuego1/{imdbID}/{titulo}', function($id,$titulo){
    return view('AgregarPregunta', ['titulo' => $titulo, 'imdbID' => $id]);
})->name('MiniJuego1.Jugar');

Route::GET('/Minijuego1/{imdbID}/{titulo}',[PreguntasController::class,'getCuestionario'])->name('MiniJuego1');

Route::GET('/Minijuego2',[PreguntasController::class,'getCuestionario2'])->name('MiniJuego2');

Route::POST('/AgregarPregunta', [PreguntasController::class,'Agregar'])->name('Agregar');

Route::POST('/MiniJuego1/Puntuacion/{imdbID}/{titulo}',[PreguntasController::class,'puntuar'])->name('Puntuar');

//Route::POST('/',[PreguntasController::class,'puntuar'])->name('puntuar');
