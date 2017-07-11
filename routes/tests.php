<?php
use App\Models\Product;
Route::get('list-products', function(){
    $products = Product::paginate(5);
    return view('static.products', compact('products'));
});