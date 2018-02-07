<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Provider;
use App\Models\Category;
use App\Models\Product;

class StockController extends Controller {

	public function index () 
	{
		$categories = Category::all();
		$products = Product::all();
		$providers = Provider::all();

		return view('admin-dashboard.stock.index', compact(['categories', 'products', 'providers']));
	}
}