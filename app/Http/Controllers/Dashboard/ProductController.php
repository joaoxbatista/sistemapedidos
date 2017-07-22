<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Provider;
use Image;
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
            'provider_id' => 'required|numeric',
            'file' => 'image'
        ]);

        if($request->file('file') != null)
        {
            $dir = DIRECTORY_SEPARATOR;
            $extension = $request->file('file')->getClientOriginalExtension();
            $name = time().$request->get('name').'.'.$extension;
            $file = $request->file('file');

            Image::make($file)->resize(240, 240)->save('imgs'.$dir.'products'.$dir.$name));
            $request['image'] = $name;
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


        if($request->file('file') != null)
        {
            $dir = DIRECTORY_SEPARATOR;
            $extension = $request->file('file')->getClientOriginalExtension();
            $name = time().$request->get('name').'.'.$extension;
            $file = $request->file('file');
            //Salva a imagem
            Image::make($file)->resize(240, 240)->save(public_path('images'.$dir.'products'.$dir.$name));
            $request['image'] = $name;
        }

        $product->update($request->except('_token'));
        
        return redirect()->back()->with('success-message', 'Fornecedor atualizado com sucesso!');
    }

    public function delete(int $id)
    {
        $product = Product::find($id);
        return view('dashboard.product.delete', compact('product'));
    }

    public function destroy(Request $request)
    {
        $product = Product::find($request->get('id'));
        $product->delete();
        return redirect()->route('products')->with('success-message', 'Fornecedor removido com sucesso!');
    }

    public function addQuantity(Request $request)
    {
        $product_id = !is_null($request->get('id')) ? $request->get('id') : null;
        $quantity = !is_null($request->get('quantity')) ? $request->get('quantity') : null;
        echo $product_id;
        echo $quantity;
        if(!is_null($product_id) and $quantity > 0)
        {
            $product = Product::find($product_id);
            $product->quantity += $quantity;
            $product->update();
            return redirect()->back()->with('success-message', $quantity.' do produto '.$product->name.'adicionada ao estoque.');
        }
    }
}
