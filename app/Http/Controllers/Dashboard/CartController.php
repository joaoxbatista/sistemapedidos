<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Item;
use Session;

class CartController extends Controller {

    public function index(Request $request) {
        
    }

    public function add(Request $request) {

        $cart = $cart = $request->session()->has('cart') ? new Cart($request->session()->get('cart')) : new Cart();
        $product = Product::find($request->get('product_id'));
        if ($product) {
            $item = new Item($product, $request->get('quantity'));
            $cart->addItem($item);
            $request->session()->put('cart', $cart);
            return redirect()->back()->with('success-message');
        } else {
            return redirect()->back()->withErrors('Houve um erro, o produto selecionado não existe no banco de dados.');
        }

        
    }

    public function remove(Request $request, $id) {

        $cart = $cart = $request->session()->has('cart') ? new Cart($request->session()->get('cart')) : new Cart();
        $cart->removeItem($id);
        $request->session()->put('cart', $cart);

        return redirect()->back()->with('success-message', 'Produto removido com sucesso!');
    }

}
