<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
  
Route::get('/home', 'CursoController@index')->name('home');
Route::get("/listadocursos", "CursoController@listadocursos")->name('listadocursos');
Route::get("/listadocursos/{curso}/suscribir", "CursoController@suscribir")->name('suscribir');
Route::post('/listadocursos/suscribir', 'CursoController@guardar')->name('guardar');

Route::group(['middleware' => 'auth'], function () {  
    Route::resource('cursos', CursoController::class);
});   


