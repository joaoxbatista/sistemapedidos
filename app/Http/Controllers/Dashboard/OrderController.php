<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Client;
use App\Models\Cart;
use Session;

class OrderController extends Controller {

    public function index() {
        $orders = Order::all();
        return view('dashboard.order.index', compact('orders'));
    }

    public function create() {
        $products = Product::all();
        $clients = Client::all();
        $clients = array_pluck($clients, 'name', 'id');

        $cart = Session::has('cart') ? new Cart(Session::get('cart')) : new Cart();

        return view('dashboard.order.create', compact(['products', 'clients', 'cart']));
    }

    public function store(Request $request) {
        $cart = Session::has('cart') ? new Cart(Session::get('cart')) : new Cart();
        $client_id = $request->get('client_id') != 0 ?  $request->get('client_id') : 1;
        
        $order = Order::create([
        'buy_date' => $request->get('buy_date'),
        'client_id' => $client_id,
        'total' => $cart->getTotalPrice()
        ]);

        foreach ($cart->getItems() as $item) {
            $order->items()->save($item->product, ['total' => $item->price,
                'qtd_itens' => $item->quantity]);
            $order->save();
        }

        $cart = null;

        /* Adiciona o carrinho na sessão, caso já exista o mesmo é atualizado */
        $request->session()->put('cart', $cart);
        return redirect()->route('orders')->with('success-message', 'Pedido registrado com sucesso!');
    }

    public function show($id) {
        $order = Order::find($id);
        return view('dashboard.order.view', compact('order'));
    }

    public function edit($id) {
        $order = Order::find($id);
        return view('dashboard.order.edit', compact('order'));
    }

    public function update(Request $request) {
        $order = Order::find($request->get('id'));


        $order->update($request->except('_token'));
        return redirect()->back()->with('success-message', 'Pedido atualizado com sucesso!');
    }

    public function destroy($id) {
        $order = Order::find($id);
        $order->delete();
        return redirect()->back()->with('success-message', 'Pedido removido com sucesso!');
    }

}
