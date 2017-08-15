<?php
namespace App\Http\Controllers\Dashboard;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Client;
use App\Models\Seller;
use App\Models\Cart;
use App\Models\Parcel;
use Session;
use Auth;
use Carbon\Carbon;


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
        $clients = Client::pluck('name', 'id');

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

        $status = false;

        $request['buy_date'] = is_null($request->get('buy_date')) ? new Carbon() : $request->get('buy_date');

        //Obtem o carrinho antigo
        $cart = Session::has('cart') ? new Cart(Session::get('cart')) : new Cart();

        //Obtem o cliente
        $client_id = $cart->getClient() != null ? $cart->getClient()->id : null;

        //Obtem o vendedor
        $seller_id = Auth::guard('seller')->user() != null ? Auth::guard('seller')->user()->id : null;

        //Obtem as parcelas
        $parcels = $cart->getParcels() != null ? $cart->getParcels() : null;

        //Caso exista um prazo para pagar o status se torna false, se não se torna verdadeiro
        $due_date = $request->get('due_date') != null ? $request->get('due_date') : null;

        

        //Desconta o valor da compra caso haja uma data de pagamento exista e limite de crédito
        if($client_id != null)
        {
            

            //Se existir data de pagamento
            if(!is_null($due_date) or !is_null($parcels)){

                $status = false;

                //Se o crédito do cliente for insuficiente
                if($cart->getClient()->limit_credit < $cart->getTotalPrice()) 
                {
                    return redirect()->back()->withErrors('O limite do cliente é insuficiente.');
                }

                //Se o crédito for suficiente
                else
                {
                    
                    $cart->getClient()->limit_credit -= $cart->getTotalPrice();
                    $cart->getClient()->update();
                } 
                
            }

        }
        

        //Cria um novo pedido
        $order = Order::create([
        'buy_date' => $request->get('buy_date'),
        'client_id' => $client_id,
        'seller_id' => $seller_id ,
        'due_date' => $due_date,
        'status' => $status,
        'total' => $cart->getTotalPrice(),
        'discount' => $cart->getDiscount(),
        ]);

        //Adicionar os items ao pedido
        foreach ($cart->getItems() as $item) {
        
            $order->items()->save($item->product, ['total' => $item->price,
                'qtd_itens' => $item->quantity]);
            $order->save();

            //Remove a quantidade dos items do estoque
            $item->product->quantity -= $item->quantity;
            $item->product->update();
        }

        //Adicionar as parcelas ao pedido
        if(!is_null($parcels))
        {
            foreach ($parcels as $parcel) {
                
                $parcel = Parcel::create([
                        'pay_date' => $parcel['pay_date'],
                        'value' => $parcel['value']
                ]);

                $order->parcels()->save($parcel);
            }
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

    public function delete(Request $request, int $id)
    {
        $order = Order::find($id);
        return view('dashboard.order.delete', compact('order'));
    }

    /**
     * Método para remoção do pedido.
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        $order = Order::find($request->get('id'));
        $order->delete();
        return redirect()->route('orders')->with('success-message', 'Pedido removido com sucesso!');
    }

    public function payment_confirm(int $id)
    {
        if(!is_null($id))
        {
            $order = Order::find($id);
            $order->status = true;
            $order->client->limit_credit += $order->total;
            $order->client->update();
            $order->update();
            return redirect()->back()->withd('success-message', 'Pagamento confirmado');
        }
    }

    /**
     * Método para gerar pdf de impressão do pedido.
     * @param $id
     * @return mixed
     */
    public function print($id)
    {
        $order = Order::find($id);

        $pdf = \PDF::loadView('dashboard.order.pdf', compact('order'))->setPaper('a4', 'landscape');

        return $pdf->stream(time().' id('.$order->id.').pdf');
    }


    public function download($id)
    {
        $order  = Order::find($id);
        $pdf = \PDF::loadView('dashboard.order.pdf', compact('order'));
        return $pdf->download(time().' id('.$order->id.').pdf');
    }

    public function parcels(Request $request)
    {
        $cart = Session::has('cart') ? new Cart(Session::get('cart')) : new Cart();
        return view('dashboard.order.parcels', compact('cart'));
    }

    public function clients(Request $request)
    {
        $cart = Session::has('cart') ? new Cart(Session::get('cart')) : new Cart();
        return view('dashboard.order.clients', compact('cart'));
    }

    public function discount(Request $request)
    {
        $cart = Session::has('cart') ? new Cart(Session::get('cart')) : new Cart();
        return view('dashboard.order.discount', compact('cart'));
    }

    public function finish(Request $request){
        $cart = Session::has('cart') ? new Cart(Session::get('cart')) : new Cart();
        return view('dashboard.order.finish', compact('cart'));
    }

    public function addDiscount(Request $request)
    {
        $cart = Session::has('cart') ? new Cart(Session::get('cart')) : new Cart();
        $discount = !is_null($request->get('discount')) ? $request->get('discount') : 0;
        $type = !is_null($request->get('discount_type')) ? $request->get('discount_type') : null;
        if($type == 'percent')
        {
            if($cart->setDiscountPercent($discount)){
                $cart->setDiscountPercent($discount);
            }
        }
        
        elseif ($type == 'value') 
        {
            $cart->setDiscount($discount);
        }

        if(!$cart->getTotalPriceWithDiscount()){
            return redirect()->back()->withErrors('O valor informado é inválido.');
        }
        $cart->updateParcels();
        $request->session()->put('cart', $cart);
        return redirect()->back();



    }
}