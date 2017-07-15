<?php
Route::group(['prefix' => 'sallers'], function(){
    Route::get('login', 'Auth\SallerLoginController@showLoginForm')->name('saller.login')->middleware('guest:saller');

    Route::post('login', 'Auth\SallerLoginController@login')->name('saller.login.submit');

    Route::get('logout', 'Auth\SallerLoginController@getLogout')->name('saller.logout');


    Route::group(['middleware' => 'auth:saller'], function(){

        Route::get('', 'Saller\SallerController@index')->name('saller.dashboard');
        Route::get('profile', 'Saller\SallerController@profile')->name('saller.profile');
        Route::get('products', 'Saller\ProductController@index')->name('saller.product');
        Route::get('products/{id}', 'Saller\ProductController@view')->name('saller.product.view');
	    Route::get('clients', 'Saller\ClientController@index')->name('saller.clients');
	    Route::get('clients/{id}', 'Saller\ClientController@show')->name('saller.clients.show');
        
        Route::get('orders', 'Saller\OrderController@index')->name('saller.orders');
        Route::get('orders/create', 'Saller\OrderController@create')->name('saller.orders.create');
        Route::post('orders/store', 'Saller\OrderController@store')->name('saller.orders.store');
        Route::get('orders/{id}', 'Saller\OrderController@show')->name('saller.orders.show');
        Route::get('orders/delete/{id}', 'Saller\OrderController@destroy')->name('saller.orders.delete');


    });
});
