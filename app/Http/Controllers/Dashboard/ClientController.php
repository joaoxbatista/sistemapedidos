<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Client;

class ClientController extends Controller
{
   
    public function index()
    {
        return view('admin-dashboard.client.index');
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
    
    public function store(Request $request)
    {
        $this->validate($request, [
        	'name' => 'required|max:255',
        	'phone' => 'required|max:16',
        	'email' => 'required|email|max:255|unique:clients',
        ]);

        $user_id = Auth::user()->id;
        $data  = $request->except('_token');
        $data['user_id'] = $user_id;

        Client::create($data);
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

    
    public function destroy(Request $request)
    {
        $client = Client::find($request->get('id'));
        $client->delete();
    }
}
