<?php

	namespace App\Http\Controllers\Dashboard;

	use Illuminate\Http\Request;
	use App\Http\Controllers\Controller;
	use App\Models\Product;
	use App\Models\Client;
	use App\Models\Cart;
	use Session;
	
	class CartController extends Controller{

		public function index(Request $request){
			$cart = Session::has('cart') ? Session::get('cart') : null;
			$clients = Client::all();
			$clients = array_pluck($clients, 'name', 'id');


			return view('dashboard.cart.index', compact(['cart', 'clients'])); 
		}

		public function addPost(Request $request){
			$product = Product::find($request->get('product_id'));
			
			/*Verifica se já existe um carrinho na sessão, se sim, retorna-o, se não retorna null*/
			$oldCart = Session::has('cart') ? Session::get('cart') : null;
			
			/*Instancia um novo carrinho com o resultado do passo anterior*/
			$cart = new Cart($oldCart);

			/*Adiciona o produto no carrinho*/
			$cart->add($product, $product->id);
			$cart->items[$product->id]['qty'] += $request->get('qty')-1;

			/*Adiciona o carrinho na sessão, caso já exista o mesmo é atualizado*/
			$request->session()->put('cart', $cart);

			return redirect()->back()->with('success-message', $product->name.' adicionada com sucesso! Agora você possui '.$cart->items[$product->id]['qty']);
		}

		public function add(Request $request, $id){
			$product = Product::find($id);
			
			/*Verifica se já existe um carrinho na sessão, se sim, retorna-o, se não retorna null*/
			$oldCart = Session::has('cart') ? Session::get('cart') : null;
			
			/*Instancia um novo carrinho com o resultado do passo anterior*/
			$cart = new Cart($oldCart);

			/*Adiciona o produto no carrinho*/
			$cart->add($product, $product->id);

			/*Adiciona o carrinho na sessão, caso já exista o mesmo é atualizado*/
			$request->session()->put('cart', $cart);

			return redirect()->back()->with('success-message', $product->name.' adicionada com sucesso! Agora você possui '.$cart->items[$product->id]['qty']);
		}

		public function remove(Request $request, $id){
			
			/*Verifica se já existe um carrinho na sessão, se sim, retorna-o, se não retorna null*/
			$oldCart = Session::has('cart') ? Session::get('cart') : null;

			/*Instancia um novo carrinho com o resultado do passo anterior*/
			$cart = new Cart($oldCart);

			$cart->remove($id);
			
			/*Adiciona o carrinho na sessão, caso já exista o mesmo é atualizado*/
			$request->session()->put('cart', $cart);

			return redirect()->back()->with('success-message', 'Produto removido com sucesso!');

		}
	}