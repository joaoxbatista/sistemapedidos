<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Client;
use App\Models\Cart;
use App\Models\Item;
use App\Models\Saller;
use Session;

class CartController extends Controller {

    public function index(Request $request) {
        
    }

    public function add(Request $request) {

        //Obtem o carrinho
        $cart = $request->session()->has('cart') ? new Cart($request->session()->get('cart')) : new Cart();

        //Obtem o produto
        $product = Product::find($request->get('product_id'));

        if ($product and $request->get('quantity') > 0)
        {
            $item = new Item($product, $request->get('quantity'));
            $cart->addItem($item);
            $request->session()->put('cart', $cart);
            return redirect()->back()->with('success-message');
        }
        else
        {
            return redirect()->back()->withErrors('Houve um erro, o produto selecionado não existe no banco de dados ou a quantidade informada é inválida.');
        }

        
    }

    public function addClient(Request $request)
    {


        $client = Client::find($request->get('client_id'));

        if($client != null)
        {
            $cart = $request->session()->has('cart') ? new Cart($request->session()->get('cart')) : new Cart();
            $cart->setClient($client);
            $request->session()->put('cart', $cart);
            return redirect()->back();
        }
        else{
            return redirect()->back()->withErrors('O cliente referente ao código não existe.');
        }
    }
    public function addSaller(Request $request)
    {

        $cart = $request->session()->has('cart') ? new Cart($request->session()->get('cart')) : new Cart();
        $saller_id = $request->get('saller_id');
        $saller = Saller::find($saller_id);

        if($saller != null){
            $cart->setSaller($saller);
            $request->session()->put('cart', $cart);
            return redirect()->back()->with('success-message', 'Vendedor adicionado com sucesso!');
        }
        else{
            return redirect()->back()->withErrors('O código do vendedor informado não existe.');
        }
    }

    public function remove(Request $request, $id) {

        $cart = $cart = $request->session()->has('cart') ? new Cart($request->session()->get('cart')) : new Cart();
        $cart->removeItem($id);
        $request->session()->put('cart', $cart);

        return redirect()->back()->with('success-message', 'Produto removido com sucesso!');
    }

    public function clear(Request $request){
        $request->session()->put('cart', null);
        return redirect()->back();
    }

}
