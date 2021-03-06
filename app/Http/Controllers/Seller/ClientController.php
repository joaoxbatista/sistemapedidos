<?php

namespace App\Http\Controllers\Seller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Client;

class ClientController extends Controller
{
   
    public function index()
    {
    	$clients = Client::all();
        return view('seller-dashboard.client.index', compact('clients'));
    }
    

    public function show($id)
    {
        $client = Client::find($id);
        return view('seller-dashboard.client.view', compact('client'));
    }

}
