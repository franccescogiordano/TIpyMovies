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

Route::view('/', 'home')->name('home');
/*Route::view('registro', 'auth.register')->name('register');*/



//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); NO SABEMOS QUE HACE


//agregado
use App\Http\Controllers\UserController;
use App\Http\Controllers\PeliculasController;

Route::get('/user/{id}', [UserController::class, 'show']);

Route::get('/Peliculas', [PeliculasController::class, 'getLista'])->name('listarPeliculas');

