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

Route::get('/', 'HomeController@index');

Route::resource('categorias', 'CategoriasController');
Route::resource('posts', 'PostsController');
@Route::get('buscarposts', 'PostsController@buscar');

// a linha acima substitui as linhas abaixo.
// @Route::get('/categorias', 'CategoriasController@index');
// @Route::get('/categorias/create', 'CategoriasController@create');
// @Route::get('/categorias/{categoria}', 'CategoriasController@show');
// @Route::get('/categorias/{categoria}/edit', 'CategoriasController@edit');

// @Route::post('/categorias', 'CategoriasController@store');
// @Route::patch('/categorias/{categoria}', 'CategoriasController@update');
// @Route::delete('/categorias/{categoria}', 'CategoriasController@destroy');





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
