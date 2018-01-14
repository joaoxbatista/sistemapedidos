<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Client;

class ClientController extends Controller
{
   
    public function index()
    {
    	$clients = Client::all();
        return view('dashboard.client.index', compact('clients'));
    }
    
    public function find(Request $request)
    {
        $cpf = $request->get('cpf') ? $request->get('cpf') : null;
        $id = $request->get('id') ? $request->get('id') : null;

        $client = null;

        if($cpf)
        {
            $client = Client::where('cpf', $cpf)->first();
        } 
        
        if($id and $client == null)
        {
            $client = Client::find($id);
        }

        return response()->json($client);
    }

    public function json()
    {   
        $clients = Client::all();
        return response()->json($clients);
    }    
    
    public function create(Request $request)
    {
        $type = $request->get('type');
        return view('dashboard.client.create', compact('type'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
        	'name' => 'required|max:255',
        	'phone' => 'required|max:16',
        	'email' => 'required|email|max:255|unique:clients',
        ]);

        Client::create($request->except('_token'));

        return redirect()->back()->with('success-message', 'Cliente cadastrado com sucesso!');
    }

    public function show($id)
    {
        $client = Client::find($id);
        return view('dashboard.client.view', compact('client'));
    }

    public function edit($id)
    {
    	$client = Client::find($id);
        return view('dashboard.client.edit', compact('client'));
    }

    
    public function update(Request $request)
    {

        $client = Client::find($request->get('id'));

        $this->validate($request, [
        	'name' => 'required|max:255',
        	'email' => 'required|max:255'
        ]);
        $client->update($request->except('_token'));
        return redirect()->back()->with('success-message', 'Cliente atualizado com sucesso!');
    }

    
    public function destroy($id)
    {
        $client = Client::find($id);
        $client->delete();
        return redirect()->back()->with('success-message', 'Cliente removido com sucesso!');
    }
}
