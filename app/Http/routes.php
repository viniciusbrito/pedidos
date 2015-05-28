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


Route::group(['prefix' => 'campanha', 'namespace' => 'Campanha'], function() {

    /* Rotas para campanha*/

    Route::get('/', ['as' => 'campanha.index', 'uses' => 'CampanhaController@index']);

    Route::post('/', ['as' => 'campanha.store', 'uses' => 'CampanhaController@store' ]);

    Route::get('/{id}/pedidos', ['as' => 'campanha.pedidos', 'uses' => 'CampanhaController@pedidos' ]);

    Route::patch('/{id}', ['as' => 'campanha.update', 'uses' => 'CampanhaController@update' ]);

    /* Rotas para pedido */

    //Route::get('/pedido/{order?}{direc?}', ['as' => 'pedido.index', 'uses' => 'PedidoController@index']);

    Route::get('/{id}/pedido/create', ['as' => 'pedido.create', 'uses' => 'PedidoController@create']);

    Route::post('/pedido/', ['as' => 'pedido.store', 'uses' => 'PedidoController@store']);

    Route::get('/pedido/{pedido}', ['as' => 'pedido.show', 'uses' => 'PedidoController@show']);

    Route::get('/pedido/{pedido}/edit', ['as' => 'pedido.edit', 'uses' => 'PedidoController@edit']);

    Route::patch('/pedido/{pedido}', ['as' => 'pedido.update', 'uses' => 'PedidoController@update']);

    Route::delete('/pedido/{pedido}', ['as' => 'pedido.destroy', 'uses' => 'PedidoController@destroy']);

    Route::post('/pedido/{pedido}', ['as' => 'pedido.remove', 'uses' => 'PedidoController@remove']);

    Route::put('/pedido/', ['as' => 'pedido.close', 'uses' => 'PedidoController@close']);

    Route::get('/pedido/{pedido}/pdf', ['as' => 'pedido.pdf', 'uses' => 'PedidoController@pdf']);
});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);