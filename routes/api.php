<?php

use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//usar la función response() y el método json para cambiar el status
//el $data que enviamos podría ser cualqueir cosa: objeto, array,...

Route::get('/', function(){
    $data = ['message' => 'Bienvenido a la API'];

    //return $data
    return response()->json($data, 200);
});

//Route::resource('/products', ProductController::class);

Route::resource('/products', ProductController::class)->except('create', 'edit');

//Mensaje cuando se pide algo que no existe
Route::fallback(function () {
    return response()->json(['error' => 'No encontrado'], 404);
  });