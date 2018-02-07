<?php
Route::group(['prefix' => 'sellers'], function(){
	Route::get('login', 'Auth\SellerLoginController@showLoginForm')->name('seller.login')->middleware('guest:seller');

	Route::post('login', 'Auth\SellerLoginController@login')->name('seller.login.submit');

	Route::get('logout', 'Auth\SellerLoginController@getLogout')->name('seller.logout');


	Route::group(['middleware' => 'auth:seller'], 
		function()
		{
			Route::get('', 'Seller\SellerController@index')->name('seller.dashboard');
			Route::get('profile', 'Seller\SellerController@profile')->name('seller.profile');
			Route::get('products', 'Seller\ProductController@index')->name('seller.product');
			Route::get('products/{id}', 'Seller\ProductController@view')->name('seller.product.view');
			Route::get('clients', 'Seller\ClientController@index')->name('seller.clients');
			Route::get('clients/{id}', 'Seller\ClientController@show')->name('seller.clients.show');

			Route::get('orders', 'Seller\OrderController@index')->name('seller.orders');
			Route::get('orders/create', 'Seller\OrderController@create')->name('seller.orders.create');
			Route::post('orders/store', 'Seller\OrderController@store')->name('seller.orders.store');
			Route::get('orders/{id}', 'Seller\OrderController@show')->name('seller.orders.show');
			Route::get('orders/delete/{id}', 'Seller\OrderController@destroy')->name('seller.orders.delete');

			/* Imprimir */
			Route::get('orders/{id}/print', 'Dashboard\OrderController@print')->name('seller.orders.print');

			/* Confirmar Pagamento */
			Route::get('orders/payment_confirm/{id}', 'Dashboard\OrderController@payment_confirm')->name('seller.orders.confirm');

			/* Download */
			Route::get('orders/{id}/download', 'Dashboard\OrderController@download')->name('seller.orders.download');

		}
		);
});
