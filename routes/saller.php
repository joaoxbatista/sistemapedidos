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
    });
});
