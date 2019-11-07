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


Route::get('/', 'JeuxController@index'); // le chemin get qui pointe vers l'url '/' , qui pointe vers la function index
Route::get('/jeux/{id}','JeuxController@displayjeu')->where('id', '[0-9]+'); // le chemin get qui pointe vers la fonction displayjeu

Route::prefix('api')->group(function () {
    Route::prefix('jeux')->group(function () {
        Route::post('add', 'JeuxController@add'); // api/jeux/add
        Route::get('all', 'JeuxController@all'); // api/jeux/all
        Route::get('supp', 'JeuxController@supp'); // api/jeux/supp
    });



    //Peut ajouter autre groupe ou route /api/..
});
