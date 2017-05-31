<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Client;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$clients = Client::all();
        return view('dashboard.client.index', compact('clients'));
    }
    
    public function create()
    {
        return view('dashboard.client.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
        	'name' => 'required|max:255',
        	'cpf' => 'required|max:12',
        	'phone' => 'required|max:12',
        	'email' => 'required|max:255'
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
        	'cpf' => 'required|max:12',
        	'phone' => 'required|max:12',
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
