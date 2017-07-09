<?php

namespace App\Http\Controllers\Sale;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Session;
use App\Models\Cart;
class SaleController extends Controller
{
    public function index(){
        $cart = Session::has('cart') ? new Cart(Session::get('cart')) : new Cart();
        return view('sale.home', compact('cart'));
    }

    public function addProduct(Request $request){
        $product = Product::find($request->get('product_id'));

        if($product != null){
            $request->get('product_id');
        }else{
            return redirect()->back()->withErrors('O produto informado não existe');
        }

    }

    public function getLogin(){
        return view('sale.login');
    }
}
