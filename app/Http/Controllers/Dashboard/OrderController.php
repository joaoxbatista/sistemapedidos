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
use App\User;
use Auth;
use Carbon\Carbon;
use Valerian\GoogleDistanceMatrix\GoogleDistanceMatrix;

class OrderController extends Controller {


    public function index()
    {
        
        return view('admin-dashboard.order.index');
    }

    public function create()
    {
        $products = Product::all();
        $clients = Client::pluck('name', 'id');

        $cart = Session::has('cart') ? new Cart(Session::get('cart')) : new Cart();

        return view('dashboard.order.create', compact(['products', 'clients', 'cart']));
    }

    /*
    * Descrição: Método para calcular o valor do frete
    * Entradas: Cliente e Usuário corrente
    * Saída: Obejto contendo a duração, distancia, preço e status
    */
    public function deliveryCalculation(Request $request)
    {
        $userId = Auth::user()->id;
        $user = User::find($userId);

        $origin = [
            'state' => $user->business_setting->state,
            'city' => $user->business_setting->city,
            'street' => $user->business_setting->street,
            'district' => $user->business_setting->district,
            'number' => $user->business_setting->number,
            'complement' => $user->business_setting->complement,
            'cep' => $user->business_setting->cep
        ];


        $kilometer_value = $user->business_setting != null ? $user->business_setting->kilometer_value : 0;

        $destiny = $request->get('destiny');
        

        $address_origin = "{$origin['city']} - {$origin['state']}, {$origin['district']}, {$origin['street']}, {$origin['number']}, {$origin['complement']}";

        $address_destiny = "{$destiny['city']} - {$destiny['state']}, {$destiny['district']}, {$destiny['street']}}";
        

        $distanceMatrix = new GoogleDistanceMatrix(getenv('GOOGLE_MATRIX_KEY'));
        $distance = $distanceMatrix->setLanguage('pt-br')
        ->setOrigin($address_origin)
        ->setDestination($address_destiny)
        ->setMode(GoogleDistanceMatrix::MODE_DRIVING)
        ->setLanguage('pt-BR')
        ->setUnits(GoogleDistanceMatrix::UNITS_METRIC)
        ->setAvoid(GoogleDistanceMatrix::AVOID_HIGHWAYS)
        ->sendRequest();

        $result = null;
        
        if($distance->rows[0]->elements[0]->status == 'OK')
        {
            
            $price = $kilometer_value * ($distance->rows[0]->elements[0]->distance->value / 1000);
            $price = number_format($price, 2);
            $result = [
                'distance' => $distance->rows[0]->elements[0]->distance->value,
                'duration' => $distance->rows[0]->elements[0]->duration->value,
                'price' => $price,
                'status' => 200
            ];
        }
        
        return response()->json($result);        
    }

    /*
    * Descrição: Método para terminar pedido e salvar no banco de dados
    * Entradas: Objeto contedo o carrinho de compras
    * Saída: Objeto contendo o pedido e o status
    */
    public function finish(Request $request)
    {
        return response()->json($request->all());
    }
    // public function store(Request $request)
    // {

    //     $status = false;

    //     $request['buy_date'] = is_null($request->get('buy_date')) ? new Carbon() : $request->get('buy_date');

    //     //Obtem o carrinho antigo
    //     $cart = Session::has('cart') ? new Cart(Session::get('cart')) : new Cart();

    //     //Obtem o cliente
    //     $client_id = $cart->getClient() != null ? $cart->getClient()->id : null;

    //     //Obtem o vendedor
    //     $seller_id = Auth::guard('seller')->user() != null ? Auth::guard('seller')->user()->id : null;

    //     //Obtem as parcelas
    //     $parcels = $cart->getParcels() != null ? $cart->getParcels() : null;

    //     //Caso exista um prazo para pagar o status se torna false, se não se torna verdadeiro
    //     $due_date = $request->get('due_date') != null ? $request->get('due_date') : null;

    //     $type = 'cash';

    //     if(count($parcels) > 1){
    //         $type = 'parcels';
    //     }


    //     //Desconta o valor da compra caso haja uma data de pagamento exista e limite de crédito
    //     if($client_id != null)
    //     {
            

    //         //Se existir data de pagamento
    //         if(!is_null($due_date) or !is_null($parcels)){


    //             //Se o crédito do cliente for insuficiente
    //             if($cart->getClient()->limit_credit < $cart->getTotalPrice()) 
    //             {
    //                 return redirect()->back()->withErrors('O limite do cliente é insuficiente.');
    //             }

    //             //Se o crédito for suficiente
    //             else
    //             {
                    
    //                 $cart->getClient()->limit_credit -= $cart->getTotalPrice();
    //                 $cart->getClient()->update();
    //             } 
                
    //         }

    //     }
        
        

    //     //Cria um novo pedido
    //     $order = Order::create([
    //     'buy_date' => $request->get('buy_date'),
    //     'client_id' => $client_id,
    //     'seller_id' => $seller_id ,
    //     'due_date' => $due_date,
    //     'status' => $status,
    //     'total' => $cart->getTotalPrice(),
    //     'discount' => $cart->getDiscount(),
    //     'type' => $type
    //     ]);

    //     //Adicionar os items ao pedido
    //     foreach ($cart->getItems() as $item) {
        
    //         $order->items()->save($item->product, ['total' => $item->price,
    //             'qtd_itens' => $item->quantity]);
    //         $order->save();

    //         //Remove a quantidade dos items do estoque
    //         $item->product->quantity -= $item->quantity;
    //         $item->product->update();
    //     }

    //     //Adicionar as parcelas ao pedido
    //     if(!is_null($parcels))
    //     {
    //         foreach ($parcels as $parcel) {
                
    //             $parcel = Parcel::create([
    //                     'pay_date' => $parcel['pay_date'],
    //                     'value' => $parcel['value']
    //             ]);

    //             $order->parcels()->save($parcel);
    //         }
    //     }

    //     $cart = null;

    //     $request->session()->put('cart', $cart);
    //     return redirect()->back()->with('success-message', 'Pedido registrado com sucesso!');
    // }

    // public function show($id)
    // {
    //     $order = Order::find($id);
    //     return view('dashboard.order.view', compact('order'));
    // }

    // public function edit($id)
    // {
    //     $order = Order::find($id);
    //     return view('dashboard.order.edit', compact('order'));
    // }

    // public function update(Request $request)
    // {
    //     $order = Order::find($request->get('id'));
    //     $order->update($request->except('_token'));
    //     return redirect()->back()->with('success-message', 'Pedido atualizado com sucesso!');
    // }

    // public function delete(Request $request, $id)
    // {
    //     $order = Order::find($id);
    //     return view('dashboard.order.delete', compact('order'));
    // }

    // public function destroy(Request $request)
    // {
    //     $order = Order::find($request->get('id'));
    //     $order->delete();
    //     return redirect()->route('orders')->with('success-message', 'Pedido removido com sucesso!');
    // }

    // public function payment_confirm($id)
    // {
    //     if(!is_null($id))
    //     {
    //         $order = Order::find($id);
    //         $order->status = true;
    //         $order->client->limit_credit += $order->total;
    //         $order->client->update();
    //         $order->update();
    //         return redirect()->back()->withd('success-message', 'Pagamento confirmado');
    //     }
    // }

    // public function download($id)
    // {
    //     $order  = Order::find($id);
    //     $pdf = \PDF::loadView('dashboard.order.pdf', compact('order'));
    //     return $pdf->download(time().' id('.$order->id.').pdf');
    // }

    // public function parcels(Request $request)
    // {
    //     $cart = Session::has('cart') ? new Cart(Session::get('cart')) : new Cart();
    //     return view('dashboard.order.parcels', compact('cart'));
    // }

    // public function clients(Request $request)
    // {
    //     $cart = Session::has('cart') ? new Cart(Session::get('cart')) : new Cart();
    //     return view('dashboard.order.clients', compact('cart'));
    // }

    // public function discount(Request $request)
    // {
    //     $cart = Session::has('cart') ? new Cart(Session::get('cart')) : new Cart();
    //     return view('dashboard.order.discount', compact('cart'));
    // }

    // public function finish(Request $request){
    //     $cart = Session::has('cart') ? new Cart(Session::get('cart')) : new Cart();
    //     return view('dashboard.order.finish', compact('cart'));
    // }

    // public function addDiscount(Request $request)
    // {
    //     $cart = Session::has('cart') ? new Cart(Session::get('cart')) : new Cart();
    //     $discount = !is_null($request->get('discount')) ? $request->get('discount') : 0;
    //     $type = !is_null($request->get('discount_type')) ? $request->get('discount_type') : null;
    //     if($type == 'percent')
    //     {
    //         if($cart->setDiscountPercent($discount)){
    //             $cart->setDiscountPercent($discount);
    //         }
    //     }
        
    //     elseif ($type == 'value') 
    //     {
    //         $cart->setDiscount($discount);
    //     }

    //     if(!$cart->getTotalPriceWithDiscount()){
    //         return redirect()->back()->withErrors('O valor informado é inválido.');
    //     }
    //     $cart->updateParcels();
    //     $request->session()->put('cart', $cart);
    //     return redirect()->back();
    // }


}