<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Order;
use App\Models\Product;
use App\Models\Client;
use App\Models\Cart;
use Session;
class OrderController extends Controller{

	public function index()
	{
		$orders = Order::all();
		return view('dashboard.order.index', compact('orders'));
	}

	public function create()
	{
		$products = Product::all();
		$clients = Client::all();
		$clients = array_pluck($clients, 'name', 'id');

		$oldCart = Session::has('cart') ? Session::get('cart') : null;
		$cart = new Cart($oldCart);

		return view('dashboard.order.create', compact(['products', 'clients', 'cart']));
	}

	public function store(Request $request)
	{

		$order = Order::create($request->only('client_id', 'buy_date', 'total'));

		$oldCart = Session::has('cart') ? Session::get('cart') : null;
		$cart = new Cart($oldCart);

		

		foreach ($cart->items as $item) {
			$order->total += $item['price'];
			$order->save();
			$order->items()->save($item['item'], ['total' => $item['price'],
				'qtd_itens' => $item['qty']]);

			//var_dump($item);
			// echo "<br><br><br><br>";
			// echo "Id do produto: ".$item['item']['id'];
			// echo "<br>";
			// echo "Quantidade: ".$item['qty'];
			// echo "<br>";
			// echo "Preço do item:".$item['item']['unit_price'];
			// echo "<br>";
			// echo "Valor total do item: ".$item['price'];
		}
		
		echo "sucesso!";
		// $cart->clear();
		// $request->session()->put('cart', $cart);

		// return redirect()->back()->with('success-message', 'Pedido finalizado com sucesso!');
	}

	public function show($id)
	{
		$order = Order::find($id);
		return view('dashboard.order.view', compact('order'));
	}

	public function edit($id)
	{
		$order = Order::find($id);
		return view('dashboard.order.edit', compact('order'));
	}


	public function update(Request $request)
	{
		$order = Order::find($request->get('id'));

	
		$order->update($request->except('_token'));
		return redirect()->back()->with('success-message', 'Pedido atualizado com sucesso!');
	}


	public function destroy($id)
	{
		$order = Order::find($id);
		$order->delete();
		return redirect()->back()->with('success-message', 'Pedido removido com sucesso!');
	}
}