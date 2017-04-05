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


Route::get('/','CommandesController@index');


Route::get('/commande/show/{id}','CommandesController@show')->name('showCommande');


Route::get('/commande','CommandesController@create');
Route::post('/commande','CommandesController@store');

Route::delete('/commande/deletes/','CommandesController@ajaxDestroy');
