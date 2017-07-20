<?php

namespace App\Http\Controllers\Seller;

use Illuminate\Http\Request;
use  App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('seller-dashboard.product.index', compact('products'));
    }

    public function view($id)
    {
        $product = Product::find($id);

        if($product != null)
        {
            return view('seller-dashboard.product.view', compact('product'));
        }
        else
        {
            return redirect()-back()->withErrors('O produto não existe');
        }


    }



}
