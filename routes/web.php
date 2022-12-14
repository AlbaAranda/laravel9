<?php

use App\Http\Controllers\PruebaController;
use Illuminate\Support\Facades\Route;

//esto es el nombre del controlador
use App\Http\Controllers\StudyController;
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

Route::get('/hola', function(){
     //lo que hay detras del return si no es una vista se convierte a json
    return $_SERVER;
    dd($_SERVER);
    echo "Hola mundo";
});

// lo que se pasa entre llaves se pone como variable dentro de la fución 
Route::get('/hola/{nombre}', function($nombre)
{
    
    //aquí se imprime el nombre que se introduzca en la ruta
    echo "Hola $nombre";
});


//si no se escribe ningun nombre en la ruta saldrá por defecto lo que se ha puesto  en la funcion, en este caso es Mundo
//con la ? se le dice que es opcional
Route::get('/saludo/{nombre?}', function($nombre = "MUNDO")
{
    
    //aquí se imprime el nombre que se introduzca en la ruta
    echo "Hola $nombre";
});

//Por las rutas definidas arriba no saldrá este echo
Route::get('/saludo', function()
{
    echo 'Bonjour';
});


//Route::get('/studies', [StudyController::class, 'index']);
//Route::get('/studies/create', [StudyController::class, 'create']);
//Route::get('/studies/{id}', [StudyController::class, 'show']);

Route::get('/studies/{id}', function($id)
{
    echo "El modulo con id: $id";
    //con + decimos que hay uno o varios de cada numero
})->where('id','[0-9]+[A-Za-z]+');
//Route::get('/studies/{id}/edit', [StudyController::class, 'edit']);

//Route::delete('/studies/{id}', [StudyController::class, 'destroy']);
//Route::put('/studies/{id}', [StudyController::class, 'update']);
//Route::post('studies', [StudyController::class, 'store']);


//con esto se llama a las 7 rutas anteriores
//Route::resource('/studies', StudyController::class);

Route::get('prueba2/{name}', [PruebaController::class,'saludoCompleto']);