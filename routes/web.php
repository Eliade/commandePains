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

//Accueil
Route::get('/','CommandesController@index');



//Depot
Route::get('/depot','DepotsController@index');
Route::get('/depot/creer','DepotsController@create');
Route::post('/depot/creer','DepotsController@store');
Route::delete('/depot/delete/{depot}','DepotsController@destroy')->name('depotsDestroy');



//Commandes
Route::get('/commande/show/{id}','CommandesController@show')->name('showCommande');
Route::get('/commande','CommandesController@create');
Route::post('/commande','CommandesController@store');
Route::post('/commande/archive/{id}','CommandesController@archive')->name('commandeArchive');
Route::post('/commande/unArchive/{id}','CommandesController@uNarchive')->name('commandeUnArchive');
Route::delete('/commande/deletes/','CommandesController@ajaxDestroy');


//FIN
Route::get('/{depot}','CommandesController@indexDepot');