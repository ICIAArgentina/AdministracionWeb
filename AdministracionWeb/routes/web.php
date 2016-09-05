<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::auth();
Route::get('/', 'Controller@welcome');
Route::get('/home', 'Controller@home');
Route::get('section/{id}', 'SectionsController@section');

//ajax
Route::get('getSections', 'SectionsController@getSections');
Route::get('getSection', 'SectionsController@getSection');
Route::get('getEmpresa', 'Controller@getEmpresa');

//deben estar protegidas
Route::resource('mensajes', 'MensajesController');
Route::resource('sections', 'SectionsController');
Route::resource('paragraphs', 'ParagraphController');
Route::get('imagenes_portada', 'Controller@imagenes_portada');
Route::post('apply/upload', 'FilesController@upload');
Auth::routes();

Route::get('/home', 'HomeController@index');
