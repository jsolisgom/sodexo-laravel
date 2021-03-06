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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/curriculum', 'UsuarioController@index');

Route::post('/usuarios/edit', 'UsuarioController@update');

Route::post('/comunas/get', 'ComunaController@getComunasByRegionId');


Route::get('/documentos', 'ArchivoController@index');
Route::post('/documentos', 'ArchivoController@store');
Route::post('/documentos/{id}/edit', 'ArchivoController@update');
Route::post('/documentos/{id}/delete', 'ArchivoController@destroy');
Route::post('/documentos/{id}/download', 'ArchivoController@downloadFile');
