<?php

/**
 * Rotas responsáaveis pela autenticação
*/
Auth::routes();
Route::get('logout', 'Auth\LoginController@logout')->name('logout');


/**
 * Rotas responsáveis pelo Painel de Controle (Dashboard)
 * Todas as rotas a seguir possuiram o prefixo dashboard. Para modificar informações diriga-se ao diretório     | Http/Controllers/Dashboard
 **/

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
    Route::get('providers/{id}/delete', 'Dashboard\ProviderController@delete')->name('providers.delete');
    Route::post('providers/delete', 'Dashboard\ProviderController@destroy')->name('providers.destroy');

        /**
     * Área reservada para Produtos
     */

    /* Página Inicial */
    Route::get('categories', 'Dashboard\CategoryController@index')->name('categories');

    /* Criar */
    Route::get('categories/create', 'Dashboard\CategoryController@create')->name('categories.create');
    Route::post('categories', 'Dashboard\CategoryController@store')->name('categories.store');

    /* Editar */
    Route::get('categories/{id}/edit', 'Dashboard\CategoryController@edit')->name('categories.edit');
    Route::post('categories/edit', 'Dashboard\CategoryController@update')->name('categories.update');

    /* Exibir */
    Route::get('categories/{id}', 'Dashboard\CategoryController@show')->name('categories.show');

    /* Deletar */
    Route::get('categories/{id}/delete', 'Dashboard\CategoryController@delete')->name('categories.delete');
    Route::post('categories/delete', 'Dashboard\CategoryController@destroy')->name('categories.destroy');


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
    Route::get('products/{id}/delete', 'Dashboard\ProductController@delete')->name('products.delete');
    Route::post('products/delete', 'Dashboard\ProductController@destroy')->name('products.destroy');

    /* Adicionar ao estoque*/
    Route::post('products/add', 'Dashboard\ProductController@addQuantity')->name('products.add');
    


    /**
     * Área reservada para Cheques
     */

    /* Página Inicial */
    Route::get('checks', 'Dashboard\ChequeController@index')->name('checks');

    /* Criar */
    Route::get('checks/create', 'Dashboard\ChequeController@create')->name('checks.create');
    Route::post('checks', 'Dashboard\ChequeController@store')->name('checks.store');

    /* Editar */
    Route::get('checks/{id}/edit', 'Dashboard\ChequeController@edit')->name('checks.edit');
    Route::post('checks/edit', 'Dashboard\ChequeController@update')->name('checks.update');

    /* Exibir */
    Route::get('checks/{id}', 'Dashboard\ChequeController@show')->name('checks.show');

    /* Deletar */
    Route::get('checks/{id}/delete', 'Dashboard\ChequeController@delete')->name('checks.delete');
    Route::post('checks/delete', 'Dashboard\ChequeController@destroy')->name('checks.destroy');

    



    /**
     * Área reservada para Pedidos
     */


    /* Finalizar*/
    Route::get('order/finish', 'Dashboard\OrderController@finish')->name('orders.finish');
    
    /* Desconto */
    Route::get('order/discount', 'Dashboard\OrderController@discount')->name('orders.discount');
    Route::post('order/discout', 'Dashboard\OrderController@addDiscount')->name('order.discount');

    /* Parcelamento */
    Route::get('orders/parcels', 'Dashboard\OrderController@parcels')->name('orders.parcels');

    /* Clientes */
    Route::get('orders/clients', 'Dashboard\OrderController@clients')->name('orders.clients');

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
    Route::get('orders/{id}/delete', 'Dashboard\OrderController@delete')->name('orders.delete');

    /* Delete*/
    Route::post('orders/delete', 'Dashboard\OrderController@destroy')->name('orders.destroy');

    /* Imprimir */
    Route::get('orders/{id}/print', 'Dashboard\OrderController@print')->name('orders.print');

    /* Confirmar Pagamento */
    Route::get('orders/payment_confirm/{id}', 'Dashboard\OrderController@payment_confirm')->name('orders.confirm');

    /* Download */
    Route::get('orders/{id}/download', 'Dashboard\OrderController@download')->name('orders.download');

    /**
     * Área reservada para Vendedores
     */
    Route::get('seller', 'Dashboard\SellerController@index')->name('sellers');

    /* Criar */
    Route::get('seller/create', 'Dashboard\SellerController@create')->name('sellers.create');
    Route::post('seller', 'Dashboard\SellerController@store')->name('sellers.store');

    /* Editar */
    Route::get('seller/{id}/edit', 'Dashboard\SellerController@edit')->name('sellers.edit');
    Route::post('seller/edit', 'Dashboard\SellerController@update')->name('sellers.update');

    /* Exibir */
    Route::get('seller/{id}', 'Dashboard\SellerController@show')->name('sellers.show');

    /* Deletar */
    Route::get('seller/{id}/delete', 'Dashboard\SellerController@delete')->name('sellers.delete');

    /* Deletar */
    Route::post('seller/delete', 'Dashboard\SellerController@destroy')->name('sellers.destroy');



    /**
     * Área reservada para o Perfil do ususário
     */

    Route::get('profile', 'Dashboard\ProfileController@index')->name('profile');
    Route::post('profile', 'Dashboard\ProfileController@update')->name('profile.update');

});

/**
 * Área reservada para o Carrinho de Compras
 */

Route::get('cart', 'Dashboard\CartController@index')->name('cart');

Route::get('cart/items', 'Dashboard\CartController@getItems')->name('cart.items');

Route::post('cart/add', 'Dashboard\CartController@add')->name('cart.add');

Route::post('cart/add/client', 'Dashboard\CartController@addClient')->name('cart.add.client');

Route::get('cart/remove/client', 'Dashboard\CartController@removeClient')->name('cart.remove.client');

Route::get('cart/remove/{id}', 'Dashboard\CartController@remove')->name('cart.remove');

Route::post('cart/add/parcels', 'Dashboard\ParcelController@add')->name('cart.add.parcels');

Route::get('cart/parcels/confirm/{id}', 'Dashboard\ParcelController@confirm')->name('parcel.confirm');

Route::get('clean/parcels', 'Dashboard\ParcelController@remove')->name('cart.remove.parcels');

Route::get('cart/clear', 'Dashboard\CartController@clear')->name('cart.clear');

Route::get('cart/print', 'Dashboard\CartCotroller@print')->name('cart.print');

Route::get('cart/discount/clear', 'Dashboard\CartController@removeDiscount')->name('cart.clear.discount');



Route::get('products-datatable', 'Dashboard\ProductController@dataTables')->name('products.datatables');


/*Adicionar cheque*/
Route::get('check/create/{id}', 'Dashboard\CheckController@create')->name('checks.create');

Route::post('check', 'Dashboard\CheckController@store')->name('checks.store');

Route::get('check/remove', 'Dashboard\CheckController@remove')->name('checks.remove');

Route::get('check/confirm', 'Dashboard\CheckController@confirm')->name('checks.confirm');


