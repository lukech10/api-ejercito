<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\soldadoController;
use App\Http\Controllers\equipoController;
use App\Http\Controllers\misionController;

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
Route::prefix('soldados')->group(function () {

	Route::post('/create',[soldadoController::class, 'createSoldado']);
	Route::post('/update/{NumeroPlaca}',[soldadoController::class, 'updateSoldado']);
	Route::post('/delete/{NumeroPlaca}',[soldadoController::class, 'deleteSoldado']);
	Route::post('/addEquipo',[soldadoController::class, 'addEquipo']);
	Route::get('/',[soldadoController::class, 'listSoldados']);
	Route::get('/details/{NumeroPlaca}',[soldadoController::class, 'viewSoldado']);
	
});
Route::prefix('equipos-tacticos')->group(function () {

	Route::post('/create',[equipoController::class, 'createEquipo']);
	Route::post('/update/{id}',[equipoController::class, 'updateEquipo']);
	Route::post('/delete/{id}',[equipoController::class, 'deleteEquipo']);
	//Route::post('/add/category',[equipoController::class, 'addCategory']);
	Route::get('/',[equipoController::class, 'listEquipos']);
	Route::get('/details/{id}',[equipoController::class, 'viewEquipo']);
	//Route::get('/copies/{id}',[equipoController::class, 'viewCopies']);

});
Route::prefix('misions')->group(function () {

	Route::post('/create',[misionController::class, 'createMision']);
	Route::post('/update/{id}',[misionController::class, 'updateMision']);
	Route::post('/delete/{id}',[misionController::class, 'deleteMision']);
	//Route::post('/add/category',[misionController::class, 'addCategory']);
	Route::get('/',[misionController::class, 'listMisiones']);
	Route::get('/details/{id}',[misionController::class, 'viewMision']);
	//Route::get('/copies/{id}',[misionController::class, 'viewCopies']);

});


