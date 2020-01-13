<?php

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

Route::get('/redirect', 'Auth\LoginController@redirectToProvider');
Route::get('/callback', 'Auth\LoginController@handleProviderCallback');
Route::middleware(['profesor'])->group(function () {

    //USUARIO PROFESOR
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

    //mostrar listas de incidencias en ver Detalles y ver Lista
    Route::get('/listaIncidencia', 'Controlador@lista');


    //Detalles de una incidencia creada
    Route::get('/consultaIncidencia/{id}', 'Controlador@consultaIncidencia');

    //Crear una incidencia
    Route::get('/crearIncidencia', function () {
        return view('crearIncidencia');
    });

    //Modificar incidencia
    Route::get('/modificarIncidencia/{value}', 'Controlador@pasarDatos');
    Route::post('/updateIncidencia/{id}', 'Controlador@update');

    //Eliminar incidencia
    Route::get('/eliminarIncidencia/{id}', 'Controlador@delete');

    //Ver detalles de una inciencia creada
    Route::post('/detallesIncidencia', 'Controlador@crearIncidencia');

});

//Mostrar pagina de error para usuarios != plaiaundi.net
Route::get('/paginaError', function(){
    return view ('paginaError');
});


//USUARIO ADMIN
Route::middleware(['admin'])->group(function () {
    Route::get('/home/admin', function () {
        return view('Admin.home');
    });

    //lista de todas las incidencias
    Route::get('/verLista', 'ControladorAdmin@lista');

    //modificar los datos mediante la id
    Route::get('/modificarIncAdmin/{value}', 'ControladorAdmin@pasarDatos');
    Route::post('/updateIncAdmin/{id}', 'ControladorAdmin@update');

    //ver detalles de una incidencia
    Route::get('/consultaIncAdmin/{id}', 'ControladorAdmin@consultaIncidencia');

});



