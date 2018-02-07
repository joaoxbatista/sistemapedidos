<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Parcel;
use Session;
use Carbon\Carbon;
use App\Models\Cart;

class ParcelController extends Controller
{
	
	

	//Confirmar parcelas
	public function confirm(Request $request, $id)
	{
		if(!is_null($id))
		{
			$parcel = Parcel::find($id);
			$parcel->status = true;
			$parcel->update();
			return redirect()->back()->with('success-message', 'Pagamento efetuado com sucesso!');
		}
	}


	//Adicionar parcelas
	public function add(Request $request)
	{

		$cart = $request->session()->has('cart') ? new Cart($request->session()->get('cart')) : null;
		$total_price = $cart->getTotalPriceWithDiscount();

		if($total_price > 0)
		{

			$this->validate($request, [
				'parcels_quantity' => 'required|numeric',
				'parcels_interval' => 'required|numeric'
				]);

			$quantity = $request->get('parcels_quantity');
			$interval = $request->get('parcels_interval');
			$value = round(($total_price / $quantity),2);
			$date = new Carbon();
			$parcels = [];


			for ( $i = 1; $i <= $quantity; $i++)
			{
				$parcel = [
				'value' => $value,
				'pay_date' => $date->copy()->addDay($interval*$i)
				];

				array_push($parcels, $parcel);

			}

			$cart->setParcels($parcels);
			$cart->setParcelsQuantity($quantity);
			$request->session()->put('cart', $cart);

			return redirect()->back()->with('success-message');
		}
		else
		{
			return redirect()->back()->withErrors('Nenhum valor a ser parcelado. Por favor adicone items ao pedido antes de realizar essa operação.')->withInput();
		}

	}

	//Remove as parcelas do carrinho
	public function remove(Request $request)
	{
		$cart = $request->session()->has('cart') ? new Cart($request->session()->get('cart')) : null;

		if(!is_null($cart->getParcels()))
		{
			$cart->setParcels(null);
			$request->session()->put('cart', $cart);
		}

		return redirect()->back();
	}
}