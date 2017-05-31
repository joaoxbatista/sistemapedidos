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
	| Área reservada para cadastro de Cliente
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
	| Área reservada para cadastro de Fornecedores
	*/

		/*Página Inicial*/
		Route::get('providers', 'Dashboard\ProviderController@index');

		/*Criar*/
		Route::get('providers/create', 'Dashboard\ProviderController@create')->name('providers.create');
		Route::post('providers', 'Dashboard\ProviderController@store')->name('providers.store');
		
		/*Editar*/
		Route::get('providers/{id}/edit', 'Dashboard\ProviderController@edit')->name('clients.edit');
		Route::post('providers/edit', 'Dashboard\ProviderController@update')->name('clients.update');
		
		/*Exibir*/
		Route::get('providers/{id}', 'Dashboard\ProviderController@show')->name('clients.show');

		/*Deletar*/
		Route::get('providers/{id}/delete', 'Dashboard\ProviderController@destroy')->name('clients.destroy');
});