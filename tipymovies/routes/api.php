<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PreguntasController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::resource('User','UserController');
Route::POST('/user/login/', [UserController::class, 'login'])->name('loginmovil');

Route::GET('/MiniJuego1',[PreguntasController::class,'getCuestionarioMovil1']);
Route::GET('/MiniJuego2',[PreguntasController::class,'getCuestionarioMovil2']);
Route::GET('/agregarPregunta',[PreguntasController::class, 'AgregarMovil']);
Route::GET('/RankingMovil', [PreguntasController::class,'toptenMovil'])->name('rankingmovil');
Route::GET('/RankingMovilTrivia', [PreguntasController::class,'toptenMovilTrivia'])->name('rankingmoviltrivia');
Route::GET('/PuntuarMiniJuego1', [PreguntasController::class,'puntuarMiniJuego1Api']);
Route::GET('/PuntuarMiniJuego2', [PreguntasController::class,'puntuarMiniJuego2Api']);


