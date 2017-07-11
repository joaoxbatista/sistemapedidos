<?php

use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;


/**
 * Área reservada para os testes
 */
include_once('tests.php');

/**
 * Área reservada para os vendedores
 */

include_once('saller.php');
/**
 * Rotas responsáaveis pela autenticação
*/
Auth::routes();
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
/**
 * Rotas responsáveis pelas páginas estáticas
 * Para modificar as informações diriga-se ao controller StaticPAgesController em Http/Controllers
*/

Route::get('', 'Site\StaticController@home')->name('home');

Route::get('about', 'Site\StaticController@about')->name('about');

Route::get('products-datatable', function () {
    return Datatables::of(Product::all())->make(true);
});

/**
 * Rotas responsáveis pelo Painel de Controle (Dashboard)
 * Todas as rotas a seguir possuiram o prefixo dashboard. Para modificar informações diriga-se ao diretório     | Http/Controllers/Dashboard
 */

Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function () {

    Route::get('', 'Dashboard\StaticController@home')->name('dashboard.home');

    /**
     * Área reservada para Clientes
     */

    /* Página Inicial */
    Route::get('clients', 'Dashboard\ClientController@index')->name('clients');

    /* Criar */
    Route::get('clients/create', 'Dashboard\ClientController@create')->name('clients.create');
    Route::post('clients', 'Dashboard\ClientController@store')->name('clients.store');

    /* Editar */
    Route::get('clients/{id}/edit', 'Dashboard\ClientController@edit')->name('clients.edit');
    Route::post('clients/edit', 'Dashboard\ClientController@update')->name('clients.update');

    /* Exibir */
    Route::get('clients/{id}', 'Dashboard\ClientController@show')->name('clients.show');

    /* Deletar */
    Route::get('clients/{id}/delete', 'Dashboard\ClientController@destroy')->name('clients.destroy');

    /**
     * Área reservada para Fornecedores
     */

    /* Página Inicial */
    Route::get('providers', 'Dashboard\ProviderController@index')->name('providers');

    /* Criar */
    Route::get('providers/create', 'Dashboard\ProviderController@create')->name('providers.create');
    Route::post('providers', 'Dashboard\ProviderController@store')->name('providers.store');

    /* Editar */
    Route::get('providers/{id}/edit', 'Dashboard\ProviderController@edit')->name('providers.edit');
    Route::post('providers/edit', 'Dashboard\ProviderController@update')->name('providers.update');

    /* Exibir */
    Route::get('providers/{id}', 'Dashboard\ProviderController@show')->name('providers.show');

    /* Deletar */
    Route::get('providers/{id}/delete', 'Dashboard\ProviderController@destroy')->name('providers.destroy');

    /**
     * Área reservada para Produtos
     */

    /* Página Inicial */
    Route::get('products', 'Dashboard\ProductController@index')->name('products');

    /* Criar */
    Route::get('products/create', 'Dashboard\ProductController@create')->name('products.create');
    Route::post('products', 'Dashboard\ProductController@store')->name('products.store');

    /* Editar */
    Route::get('products/{id}/edit', 'Dashboard\ProductController@edit')->name('products.edit');
    Route::post('products/edit', 'Dashboard\ProductController@update')->name('products.update');

    /* Exibir */
    Route::get('products/{id}', 'Dashboard\ProductController@show')->name('products.show');

    /* Deletar */
    Route::get('products/{id}/delete', 'Dashboard\ProductController@destroy')->name('products.destroy');

    /**
     * Área reservada para Pedidos
     */

    /* Página Inicial */
    Route::get('orders', 'Dashboard\OrderController@index')->name('orders')->middleware('hasitems');

    /* Criar */
    Route::get('orders/create', 'Dashboard\OrderController@create')->name('orders.create');
    Route::post('orders', 'Dashboard\OrderController@store')->name('orders.store');

    /* Editar */
    Route::get('orders/{id}/edit', 'Dashboard\OrderController@edit')->name('orders.edit');
    Route::post('orders/edit', 'Dashboard\OrderController@update')->name('orders.update');

    /* Exibir */
    Route::get('orders/{id}', 'Dashboard\OrderController@show')->name('orders.show');

    /* Deletar */
    Route::get('orders/{id}/delete', 'Dashboard\OrderController@destroy')->name('orders.destroy');

    /* Imprimir */
    Route::get('orders/{id}/print', 'Dashboard\OrderController@print')->name('orders.print');

    /* Download */
    Route::get('orders/{id}/download', 'Dashboard\OrderController@download')->name('orders.download');

    /**
     * Área reservada para Vendedores
     */
    Route::get('saller', 'Dashboard\SallerController@index')->name('sallers');

    /* Criar */
    Route::get('saller/create', 'Dashboard\SallerController@create')->name('sallers.create');
    Route::post('saller', 'Dashboard\SallerController@store')->name('sallers.store');

    /* Editar */
    Route::get('saller/{id}/edit', 'Dashboard\SallerController@edit')->name('sallers.edit');
    Route::post('saller/edit', 'Dashboard\SallerController@update')->name('sallers.update');

    /* Exibir */
    Route::get('saller/{id}', 'Dashboard\SallerController@show')->name('sallers.show');

    /* Deletar */
    Route::get('saller/{id}/delete', 'Dashboard\SallerController@destroy')->name('sallers.destroy');



    /**
     * Área reservada para o Perfil do ususário
     */

    Route::get('profile', 'Dashboard\ProfileController@index')->name('profile');

});


/**
 * Área reservada para o Carrinho de Compras
 */

Route::get('cart', 'Dashboard\CartController@index')->name('cart');
Route::post('cart/add', 'Dashboard\CartController@add')->name('cart.add');
Route::get('cart/remove/{id}', 'Dashboard\CartController@remove')->name('cart.remove');
Route::get('cart/clear', 'Dashboard\CartController@clear')->name('cart.clear');
Route::get('cart/print', 'Dashboard\CartCOntroller@print')->name('cart.print');


/**
 * Área reservada para o Painel de vendas
 */
Route::group(['prefix' => 'sales'], function(){
    Route::get('', 'Sale\SaleController@index')->name('sales');
    Route::get('login', 'Sale\SaleController@getLogin')->name('sales.login');
    Route::post('add/product', 'Dashboard\CartController@add')->name('sales.add.product');
    Route::post('order', 'Dashboard\OrderController@store')->name('sales.order.store');
    Route::post('add/saller', 'Dashboard\CartController@addSaller')->name('sales.add.saller');
    Route::post('add/client', 'Dashboard\CartController@addClient')->name('sales.add.client');
});

