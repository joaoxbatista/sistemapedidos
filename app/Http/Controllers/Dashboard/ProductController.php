<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Provider;
use File;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('dashboard.product.index', compact('products'));
    }
    
    public function create()
    {
        $providers = Provider::all();
        $providers = array_pluck($providers, 'name', 'id');

        return view('dashboard.product.create', compact('providers'));
    }

    public function store(Request $request)
    {
        /*
        | Realiazr validação dos produtos
        */


        $this->validate($request, [
            'name' => 'required|min:3|max:255',
            'unit_price' => 'required|numeric',
            'weight' => 'required|numeric',
            'provider_id' => 'required|numeric',
            'desc' => 'required|min:50',
            'file' => 'image'
        ]);

        /*Verifica se existe alguma com a url da imagem*/
        if($request->file('file')) {

            $extension = $request->file('file')->getClientOriginalExtension();
            $filename =  'uploads' . DIRECTORY_SEPARATOR . 'imgs' . DIRECTORY_SEPARATOR
                . 'products' . DIRECTORY_SEPARATOR . str_replace(' ', '', $request->get('name')) .$request->get('provider_id').'.'.$extension;

            File::move($request->file('file'), $filename);

            $request['image'] = $filename;
        }

        Product::create($request->except('_token'));
        return redirect()->back()->with('success-message', 'Fornecedor cadastrado com sucesso!');
    }

    public function show($id)
    {
        $product = Product::find($id);
        return view('dashboard.product.view', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $providers = Provider::all();
        $providers = array_pluck($providers, 'name', 'id');

        return view('dashboard.product.edit', compact(['product', 'providers']));
    }

    
    public function update(Request $request)
    {
        $product = Product::find($request->get('id'));

        $this->validate($request, [
            'name' => 'required|min:3|max:255',
            'unit_price' => 'required|numeric',
            'weight' => 'required|numeric',
            'provider_id' => 'required|numeric',
            'desc' => 'required|min:50',
            'file' => 'image'
        ]);

        /*Verifica se existe alguma com a url da imagem*/
        if($request->file('file')) {

            $extension = $request->file('file')->getClientOriginalExtension();
            $filename =  'uploads' . DIRECTORY_SEPARATOR . 'imgs' . DIRECTORY_SEPARATOR
                . 'products' . DIRECTORY_SEPARATOR . str_replace(' ', '', $request->get('name')) .$request->get('provider_id').'.'.$extension;

            File::move($request->file('file'), $filename);

            $request['image'] = $filename;
        }

        $product->update($request->except('_token'));
        
        return redirect()->back()->with('success-message', 'Fornecedor atualizado com sucesso!');
    }

    
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->back()->with('success-message', 'Fornecedor removido com sucesso!');
    }
}
