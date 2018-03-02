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
        return view('admin-dashboard.order.create');
    }
    
    /*
    * Descrição: Método para terminar pedido e salvar no banco de dados
    * Entradas: Objeto contedo o carrinho de compras
    * Saída: Objeto contendo o pedido e o status
    */
    public function finish(Request $request)
    {
    
        $data = $request->get('data');
        // $timenow = Carbon::now();
                
        // $order = new Order();

        // $order->buy_date =  $timenow->toDateTimeString();
        // $order->due_date =  $timenow->toDateTimeString();
        
        // $order->price_products = $data['price_products'];
        // $order->price_discount = $data['discounts']['total'];
        // $order->price_final = $data['price_final'];
        // $order->payment_form = $data['payment_form'];
        // $order->status = true;
        // $order->client_id = $data['client']['id'];
        // $order->save();


        // if($data['payment_form'] == 'installment')
        // {
        //     $parcels = $data['parcels'];

        //     foreach ($parcels as $parcel) {
        //         $parcelSave = new Parcel();
        //         $parcelSave->pay_date = $parcel['date'];
        //         $parcelSave->value = $parcel['value'];
        //         $parcelSave->status = false;
        //         $parcelSave->order_id = $order->id;
        //         $parcelSave->save();
        //     }
        // }

        // if($data['payment_form'] == 'check')
        // {
        //     


        // agency
        // bank_id
        // cnpj
        // count_number
        // cpf
        // expiration_date
        // holder_name
        // value

        // $checks = $data['check'];

        //     foreach ($checks as $check) {
        //         $checkSave = new Check();
        //         $checkSave->pay_date = $parcel['date'];
        //         $checkSave->value = $parcel['value'];
        //         $checkSave->status = false;
        //         $checkSave->order_id = $order->id;
        //         $checkSave->save();
        //     }
        // }

        return response()->json($data);
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

}