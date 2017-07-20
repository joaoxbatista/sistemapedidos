<?php

use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;

/**
 * Área reservada para os vendedores
 */
include_once('seller.php');

/**
 * Área reservada para os administradores
 */
include_once('admin.php');

/**
 * Rotas responsáveis pelas páginas estáticas
 * Para modificar as informações diriga-se ao controller StaticPAgesController em Http/Controllers
*/
Route::get('', 'Site\StaticController@home')->name('home');

Route::get('about', 'Site\StaticController@about')->name('about');



