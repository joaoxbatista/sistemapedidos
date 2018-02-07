<?php

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Provider;
use App\Models\Client;
use App\Models\Category;
use App\Models\Cart;
use App\Models\Item;




Route::get('providers', function($request){
	
	return response()->json($request);
});