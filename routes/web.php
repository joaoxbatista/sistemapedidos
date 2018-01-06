<?php

use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;

/**
 * Área reservada para os funcionários
 */
include_once('web-employee.php');

/**
 * Área reservada para os administradores
 */
include_once('web-admin.php');

Route::get('', 'Site\StaticController@home')->name('home');
