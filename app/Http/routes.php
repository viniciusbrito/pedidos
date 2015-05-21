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

Route::resource('produto', 'ProdutoController');
Route::post('produto/search', ['as' => 'produto.search', 'uses' => 'ProdutoController@search']);

Route::resource('revendedor', 'RevendedoraController');
Route::post('revendedor/search', ['as' => 'revendedora.search', 'uses' => 'RevendedoraController@search']);

Route::resource('pedido', 'PedidoController');
Route::post('pedido/{pedido}', ['as' => 'pedido.remove', 'uses' => 'PedidoController@remove']);
Route::put('pedido', ['as' => 'pedido.close', 'uses' => 'PedidoController@close']);
Route::get('pedido/{order?}', ['as' => 'pedido.index', 'uses' => 'PedidoController@index']);

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);