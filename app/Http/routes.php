<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

/*
Route::get('/produto', 'ProdutoController@index');
Route::get('/produto/cadastrar/', 'ProdutoController@create');
Route::get('/produto/{id}/remover', 'ProdutoController@delete');
Route::get('/produto/{id}/editar', 'ProdutoController@edit');
Route::get('/produto/{id}', 'ProdutoController@show');
Route::post('produto', 'ProdutoController@store');
*/

Route::resource('produto', 'ProdutoController');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);