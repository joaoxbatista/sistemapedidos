<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Client;
use App\Models\Cart;
use App\Models\Item;
use App\Models\Seller;
use Session;
use Carbon\Carbon;
class CartController extends Controller 
{

    public function index(Request $request)
    {
      $cart = $request->session()->has('cart') ? new Cart($request->session()->get('cart')) : new Cart();
      return view('dashboard.order.cart', compact('cart'));
    }

    public function getItems(Request $request)
    {
        $cart = $request->session()->has('cart') ? new Cart($request->session()->get('cart')) : new Cart();
        return response()->json(['data' => $cart->getJson()]);
    }

    public function add(Request $request) 
    {
        
        $product_id = $request->get('product_id');
        $quantity = $request->get('quantity');
        $product = !is_null(Product::find($product_id)) ? Product::find($product_id) : null;
        if(is_null($product))
        {
            return 'Produto inexistente';
        }



        $cart = $request->session()->has('cart') ? new Cart($request->session()->get('cart')) : new Cart();

        $item_quantity = isset($cart->getItems()[$product_id]) ? $cart->getItems()[$product_id]->quantity : 0;

        //Verificar se exitesm produtos
        if($product->quantity > 0)
        {
            //Verificar se a quantidade da requisição é positiva
            if($quantity > 0)
            {
                //Soma a quantidade do item armazenado na sessão(carrinho) com a da requisição
                $total_quantity = $quantity + $item_quantity;

                if($total_quantity <= $product->quantity)
                {
                    $item = new Item($product, $request->get('quantity'));
                    $cart->addItem($item);
                    $request->session()->put('cart', $cart);
                    // return redirect()->back();
                    return 'Adicionado com sucesso';
                }
                else
                {
                    //return redirect()->back()->withErrors('A quantidade informada é superior a do estoque. Quantidade do estoque: '.$product->quantity.'.');
                    return 'A quantidade informada é superior a do estoque. Quantidade do estoque: '.$product->quantity.'.';
                }
            }
            else
            {
                // return redirect()->back()->withErrors('O valor informado não pode ser negativo.');
                return 'Quantidade inválida';
            }
        }
        else
        {
            // return redirect()->back()->withErrors('Não existem produtos no estoque');
            return 'Não existem produtos no estoque';
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
    
    public function addSeller(Request $request)
    {

        $cart = $request->session()->has('cart') ? new Cart($request->session()->get('cart')) : new Cart();
        $seller_id = $request->get('seller_id');
        $seller = Seller::find($seller_id);

        if($seller != null){
            $cart->setSeller($seller);
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

    public function clear(Request $request)
    {
        $request->session()->put('cart', null);
        return redirect()->back();
    }

    public function removeClient(Request $request)
    {
        $cart = $request->session()->has('cart') ? new Cart($request->session()->get('cart')) : new Cart();
        $cart->setClient(null);
        $request->session()->put('cart', $cart);
        return redirect()->back();
    }

    public function removeDiscount(Request $request)
    {
        $cart = $request->session()->has('cart') ? new Cart($request->session()->get('cart')) : new Cart();
        $cart->setDiscount(null);
        $request->session()->put('cart', $cart);
        return redirect()->back();
    }

    
}
