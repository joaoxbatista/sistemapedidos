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


/*
| Rotas responsáveis pelas páginas estáticas
| Para modificar as informações diriga-se ao controller StaticPAgesController em Http/Controllers
*/

Route::get('', 'Site\StaticController@home')->name('home');
Route::get('about', 'Site\StaticController@about')->name('about');

/*
| Rotas responsáveis pelo Painel de Controle (Dashboard) 
| Todas as rotas a seguir possuiram o prefixo dashboard. Para modificar informações diriga-se ao diretório     | Http/Controllers/Dashboard
*/

Route::group(['prefix' => 'dashboard'], function(){

	Route::get('', 'Dashboard\StaticController@home')->name('dashboard.home');

	/*
	| Área reservada para Clientes
	*/
		/*Página Inicial*/
		Route::get('clients', 'Dashboard\ClientController@index');

		/*Criar*/
		Route::get('clients/create', 'Dashboard\ClientController@create')->name('clients.create');
		Route::post('clients', 'Dashboard\ClientController@store')->name('clients.store');
		
		/*Editar*/
		Route::get('clients/{id}/edit', 'Dashboard\ClientController@edit')->name('clients.edit');
		Route::post('clients/edit', 'Dashboard\ClientController@update')->name('clients.update');
		
		/*Exibir*/
		Route::get('clients/{id}', 'Dashboard\ClientController@show')->name('clients.show');

		/*Deletar*/
		Route::get('clients/{id}/delete', 'Dashboard\ClientController@destroy')->name('clients.destroy');

	/*
	| Área reservada para Fornecedores
	*/
		/*Página Inicial*/
		Route::get('providers', 'Dashboard\ProviderController@index');

		/*Criar*/
		Route::get('providers/create', 'Dashboard\ProviderController@create')->name('providers.create');
		Route::post('providers', 'Dashboard\ProviderController@store')->name('providers.store');
		
		/*Editar*/
		Route::get('providers/{id}/edit', 'Dashboard\ProviderController@edit')->name('providers.edit');
		Route::post('providers/edit', 'Dashboard\ProviderController@update')->name('providers.update');
		
		/*Exibir*/
		Route::get('providers/{id}', 'Dashboard\ProviderController@show')->name('providers.show');

		/*Deletar*/
		Route::get('providers/{id}/delete', 'Dashboard\ProviderController@destroy')->name('providers.destroy');

	/*
	| Área reservada para Produtos
	*/
		/*Página Inicial*/
		Route::get('products', 'Dashboard\ProductController@index')->name('products');

		/*Criar*/
		Route::get('products/create', 'Dashboard\ProductController@create')->name('products.create');
		Route::post('products', 'Dashboard\ProductController@store')->name('products.store');
		
		/*Editar*/
		Route::get('products/{id}/edit', 'Dashboard\ProductController@edit')->name('products.edit');
		Route::post('products/edit', 'Dashboard\ProductController@update')->name('products.update');
		
		/*Exibir*/
		Route::get('products/{id}', 'Dashboard\ProductController@show')->name('products.show');

		/*Deletar*/
		Route::get('products/{id}/delete', 'Dashboard\ProductController@destroy')->name('products.destroy');

	/*
	| Área reservada para Pedidos
	*/
		/*Página Inicial*/
		Route::get('orders', 'Dashboard\OrderController@index')->name('orders');

		/*Criar*/
		Route::get('orders/create', 'Dashboard\OrderController@create')->name('orders.create');
		Route::post('orders', 'Dashboard\OrderController@store')->name('orders.store');
		
		/*Editar*/
		Route::get('orders/{id}/edit', 'Dashboard\OrderController@edit')->name('orders.edit');
		Route::post('orders/edit', 'Dashboard\OrderController@update')->name('orders.update');
		
		/*Exibir*/
		Route::get('orders/{id}', 'Dashboard\OrderController@show')->name('orders.show');

		/*Deletar*/
		Route::get('orders/{id}/delete', 'Dashboard\OrderController@destroy')->name('orders.destroy');

	/*
	| Área reservada para o Carrinho de Compras
	*/
		Route::get('cart', 'Dashboard\CartController@index')->name('cart');
		Route::get('cart/add/{id}', 'Dashboard\CartController@add')->name('cart.add');


});