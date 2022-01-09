<?php

use App\Http\Controllers\ObjetosController;
use App\Http\Controllers\ParametrosController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UsuariosController;
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

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');


// agrupar rutas por middleware
Route::middleware(['auth:sanctum', 'verified'])->group(function(){

    Route::get('/dashboard',function(){
        return view('dashboard');
    })->name('dashboard');

    Route::resource('usuarios', UsuariosController::class)->names('usuarios');
    Route::resource('roles',RolesController::class)->names('roles');
    Route::resource('parametros', ParametrosController::class)->names('parametros');
    Route::resource('objetos',ObjetosController::class)->names('objetos');
    //Other ways to specify the controller
    Route::resource('preguntas','App\Http\Controllers\PreguntasController');
    //Especificamos el metodo
    Route::get('/bitacora','App\Http\Controllers\BitacoraController@index');



});
