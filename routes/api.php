<?php

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Client;

Route::get('products',
	function()
	{
		$products = Product::with('provider')->get();
		return response()->json(['data' => $products]);
	}

);

Route::get('clients',
	function()
	{
		$clients = Client::all();
		return $clients->toJson();
	}
);
