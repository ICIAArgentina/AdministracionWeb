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
Auth::routes();
Route::auth();

Route::get('/', 'Controller@welcome');
Route::get('/home', 'Controller@home');
Route::get('/home', 'HomeController@index');

//deben estar protegidas
Route::resource('mensajes', 'MensajesController');
Route::resource('sections', 'SectionsController');
Route::resource('paragraphs', 'ParagraphController');
Route::resource('posts', 'PostsController');

Route::get('section/{id}', 'SectionsController@section');
Route::get('posts_all', 'SectionsController@posts');

//ajax
Route::get('getSections', 'SectionsController@getSections');
Route::get('getSection', 'SectionsController@getSection');
Route::get('getEmpresa', 'Controller@getEmpresa');

Route::get('imagenes_portada', 'Controller@imagenes_portada');
Route::post('delete_img_portada', 'FilesController@delete');
Route::post('apply/upload', 'FilesController@upload');