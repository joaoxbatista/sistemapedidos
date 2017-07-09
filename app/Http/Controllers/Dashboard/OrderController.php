<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Client;
use App\Models\Saller;
use App\Models\Cart;
use Session;


class OrderController extends Controller {

    /**
     * Método para retornar a view com a lista de pedidos cadastrados no banco
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $orders = Order::all();
        return view('dashboard.order.index', compact('orders'));
    }

    /**
     * Método para retornar a view de criação dos pedidos
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $products = Product::all();

        $cart = Session::has('cart') ? new Cart(Session::get('cart')) : new Cart();

        return view('dashboard.order.create', compact(['products', 'clients', 'cart']));
    }

    /**
     * Método para salvar informações do pedido.
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        /**
         * Obtem o carrinho antigo
         */
        $cart = Session::has('cart') ? new Cart(Session::get('cart')) : new Cart();



        $order = Order::create([
        'buy_date' => $request->get('buy_date'),
        'client_id' => $cart->getClient()->id,
        'saller_id' => $cart->getSaller()->id,
        'total' => $cart->getTotalPrice()
        ]);

        foreach ($cart->getItems() as $item) {
            $order->items()->save($item->product, ['total' => $item->price,
                'qtd_itens' => $item->quantity]);
            $order->save();
        }

        $cart = null;

        $request->session()->put('cart', $cart);
        return redirect()->back()->with('success-message', 'Pedido registrado com sucesso!');
    }

    /**
     * Método para retornar a view de visualização do pedido passando uma id.
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $order = Order::find($id);
        return view('dashboard.order.view', compact('order'));
    }

    /**
     * Método para retornar a view de edição do pedido.
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $order = Order::find($id);
        return view('dashboard.order.edit', compact('order'));
    }

    /**
     * Método para atualização das informações do pedido.
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $order = Order::find($request->get('id'));


        $order->update($request->except('_token'));
        return redirect()->back()->with('success-message', 'Pedido atualizado com sucesso!');
    }

    /**
     * Método para remoção do pedido.
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $order = Order::find($id);
        $order->delete();
        return redirect()->back()->with('success-message', 'Pedido removido com sucesso!');
    }

    /**
     * Método para gerar pdf de impressão do pedido.
     * @param $id
     * @return mixed
     */
    public function print($id){
        $order = Order::find($id);

        $pdf = \PDF::loadView('dashboard.order.pdf', compact('order'))
                ->setPaper('a4', 'landscape');

        return $pdf->stream($order->client->name.'_'.$order->id.'.pdf');
    }


    public function download($id){
        $order  = Order::find($id);
        $pdf = \PDF::loadView('dashboard.order.pdf', compact('order'));
        return $pdf->download($order->client->name.'_'.$order->id.'.pdf')
            ->setPaper('a4', 'landscape');
    }
}
