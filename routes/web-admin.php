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

Route::group(
    
    [
        'prefix' => 'admin-dashboard', 
        'middleware' => 'auth', 
        'as' => 'admin-dashboard.'
    ],

    function () {

    Route::get('', 'Dashboard\StaticController@home')->name('index');

    //Clientes

    Route::group(
        [
            'prefix' => 'clients',
            'as' => 'clients.'
        ], 

        function () {

             /* Página Inicial */
            Route::get('', 'Dashboard\ClientController@index')->name('index');

            /* Busca de cliente */
            Route::post('find', 'Dashboard\ClientController@find')->name('find');

            /* Json*/
            Route::get('json', 'Dashboard\ClientController@json')->name('json');

            /* Criar */
            Route::get('create', 'Dashboard\ClientController@create')->name('create');
            Route::post('', 'Dashboard\ClientController@store')->name('store');

            /* Editar */
            Route::get('{id}/edit', 'Dashboard\ClientController@edit')->name('edit');

            Route::post('edit', 'Dashboard\ClientController@update')->name('update');

            /* Exibir */
            Route::get('{id}', 'Dashboard\ClientController@show')->name('show');

            /* Deletar */
            Route::get('{id}/delete', 'Dashboard\ClientController@destroy')->name('destroy');


        }
    );

    //Fornecedores

    Route::group(
        [
            'prefix' => 'providers',
            'as' => 'providers.'
        ], 

        function () {
        
            Route::get('', 'Dashboard\ProviderController@index')->name('index');
            
            Route::put('', 'Dashboard\ProviderController@update')->name('update');
            
            /* Json*/
            Route::get('json', 'Dashboard\ProviderController@json')->name('json');

            /* Criar */
            Route::get('create', 'Dashboard\ProviderController@create')->name('create');
            Route::post('', 'Dashboard\ProviderController@store')->name('store');

            /* Editar */
            Route::get('{id}/edit', 'Dashboard\ProviderController@edit')->name('edit');
            Route::post('edit', 'Dashboard\ProviderController@update')->name('update');

            /* Exibir */
            Route::get('{id}', 'Dashboard\ProviderController@show')->name('show');

            /* Deletar */
            Route::get('{id}/delete', 'Dashboard\ProviderController@delete')->name('delete');
            Route::post('delete', 'Dashboard\ProviderController@destroy')->name('destroy');
        }
    );

    //Categorias

    Route::group(
        [
            'prefix' => 'categories',
            'as' => 'categories.'
        ], 

        function () {
    
            /* Página Inicial */
            Route::get('', 'Dashboard\CategoryController@index')->name('index');

            Route::put('', 'Dashboard\CategoryController@update')->name('update');

             /* Json*/
            Route::get('json', 'Dashboard\CategoryController@json')->name('json');

            /* Criar */
            Route::get('create', 'Dashboard\CategoryController@create')->name('create');

            Route::post('', 'Dashboard\CategoryController@store')->name('store');

            /* Editar */
            Route::get('{id}/edit', 'Dashboard\CategoryController@edit')->name('edit');

            Route::post('edit', 'Dashboard\CategoryController@update')->name('update');

            /* Exibir */
            Route::get('{id}', 'Dashboard\CategoryController@show')->name('show');


            Route::post('delete', 'Dashboard\CategoryController@destroy')->name('destroy');

        }
    );
        
    //Produtos

    Route::group(
        [
            'prefix' => 'products',
            'as' => 'products.'
        ], 

        function () {
    
            /* Página Inicial */
            Route::get('', 'Dashboard\ProductController@index')->name('index');

            /* Buscar */
            Route::post('find', 'Dashboard\ProductController@find')->name('find');

            /*JSON*/
            Route::get('json', 'Dashboard\ProductController@json')->name('json');

            /* Criar */
            Route::get('create', 'Dashboard\ProductController@create')->name('create');

            Route::post('', 'Dashboard\ProductController@store')->name('store');

            /* Editar */
            Route::get('{id}/edit', 'Dashboard\ProductController@edit')->name('edit');

            Route::post('edit', 'Dashboard\ProductController@update')->name('update');

            /* Exibir */
            Route::get('{id}', 'Dashboard\ProductController@show')->name('show');

            /* Deletar */
            Route::get('{id}/delete', 'Dashboard\ProductController@delete')->name('delete');

            Route::post('delete', 'Dashboard\ProductController@destroy')->name('destroy');

            /* Adicionar ao estoque*/
            Route::post('add', 'Dashboard\ProductController@addQuantity')->name('add');
    
        }
    );
    
    //Cheques

    Route::group(
        [
            'prefix' => 'checks',
            'as' => 'checks.'
        ], 

        function () {
    
            /* Página Inicial */
            Route::get('', 'Dashboard\ChequeController@index')->name('index');

            /* Criar */
            Route::get('create', 'Dashboard\ChequeController@create')->name('create');
            Route::post('', 'Dashboard\ChequeController@store')->name('store');

            /* Editar */
            Route::get('{id}/edit', 'Dashboard\ChequeController@edit')->name('edit');

            Route::post('edit', 'Dashboard\ChequeController@update')->name('update');

            /* Exibir */
            Route::get('{id}', 'Dashboard\ChequeController@show')->name('show');

            /* Deletar */
            Route::get('{id}/delete', 'Dashboard\ChequeController@delete')->name('delete');

            Route::post('delete', 'Dashboard\ChequeController@destroy')->name('destroy');
    
        }
    );
    
    //Pedidos

    Route::group(
        [
            'prefix' => 'orders',
            'as' => 'orders.'
        ],

        function () {

            Route::get('', 'Dashboard\OrderController@index')->name('index');


            Route::post('delivery/calculation', 'Dashboard\OrderController@deliveryCalculation')->name('delivery.calculation');

            Route::post('finish', 'Dashboard\OrderController@finish');

            // /* Página Inicial */
            // Route::get('orders', 'Dashboard\OrderController@index')->name('index')->middleware('hasitems');

            // /* Finalizar*/
            // Route::get('order/finish', 'Dashboard\OrderController@finish')->name('finish');

            // /* Desconto */
            // Route::get('order/discount', 'Dashboard\OrderController@discount')->name('discount');

            // Route::post('order/discout', 'Dashboard\OrderController@addDiscount')->name('discount');

            // /* Parcelamento */
            // Route::get('orders/parcels', 'Dashboard\OrderController@parcels')->name('parcels');

            // /* Clientes */
            // Route::get('orders/clients', 'Dashboard\OrderController@clients')->name('clients');

            // /* Criar */
            // Route::get('orders/create', 'Dashboard\OrderController@create')->name('create');
            // Route::post('orders', 'Dashboard\OrderController@store')->name('store');

            // /* Editar */
            // Route::get('orders/{id}/edit', 'Dashboard\OrderController@edit')->name('edit');
            // Route::post('orders/edit', 'Dashboard\OrderController@update')->name('update');

            // /* Exibir */
            // Route::get('orders/{id}', 'Dashboard\OrderController@show')->name('show');

            // /* Deletar */
            // Route::get('orders/{id}/delete', 'Dashboard\OrderController@delete')->name('delete');

            // /* Delete*/
            // Route::post('orders/delete', 'Dashboard\OrderController@destroy')->name('destroy');

            // /* Imprimir */
            // Route::get('orders/{id}/print', 'Dashboard\OrderController@print')->name('print');

            // /* Confirmar Pagamento */
            // Route::get('orders/payment_confirm/{id}', 'Dashboard\OrderController@payment_confirm')->name('confirm');

            // /* Download */
            // Route::get('orders/{id}/download', 'Dashboard\OrderController@download')->name('download');

        }
    );

    //Perfil
    Route::group(
        [
            'prefix' => 'profile',
            'as' => 'profile.'
        ],
        function () {
            Route::get('', 'Dashboard\ProfileController@index')->name('index');
            Route::post('', 'Dashboard\ProfileController@update')->name('update');        
        }
    );

    //Configurações do Negócio
    Route::group(
        [
            'prefix' => 'business/setting',
            'as' => 'business.setting.'
        ],
        function () {
            Route::get('', 'Dashboard\BusinessSettingController@index')->name('index');
            Route::post('json', 'Dashboard\BusinessSettingController@json')->name('json');        
        }
    );

    //Bancos
    Route::group(
        [
            'prefix' => 'banks',
            'as' => 'banks.'
        ],
        function () {
            Route::get('json', 'Dashboard\BankController@json')->name('json');
                   
        }
    );
    

    /**
     * Área reservada para a gerência de estoque
     */

    Route::get('stock', 'Dashboard\StockController@index')->name('stock');

    /**
     * Área reservada para a gerência de relatórios
     */

    Route::get('reports', 'Dashboard\ReportController@index')->name('reports');

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


// Rota para o carregamento dos dados do dataTable
Route::get('products-datatable', 'Dashboard\ProductController@dataTables')->name('products.datatables');


/*Adicionar cheque*/
Route::get('checks/create/{id}', 'Dashboard\CheckController@create')->name('checks.create');

Route::post('checks', 'Dashboard\CheckController@store')->name('checks.store');

Route::get('checks/remove', 'Dashboard\CheckController@remove')->name('checks.remove');

Route::get('checks/confirm', 'Dashboard\CheckController@confirm')->name('checks.confirm');

