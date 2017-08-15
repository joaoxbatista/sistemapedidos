<?php

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Client;
use App\Models\Cart;
use App\Models\Item;



Route::get('clients',
	function()
	{
		$clients = Client::all();
		return $clients->toJson();
	}
);

Route::get('product/{id}', 
	function($id)
	{
		$product = Product::find($id);
		if(!is_null($product))
		{
			return response()->json($product);
		}
		else
		{
			return null;
		}
	}
);