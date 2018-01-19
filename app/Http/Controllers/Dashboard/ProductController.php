<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Provider;
use App\Models\Category;
use Image;
use Datatables;
use Auth;
class ProductController extends Controller
{
    public function index()
    {
        return view('admin-dashboard.stock.product.index');
    }
    
    public function find(Request $request)
    {
        $product = Product::find($request->get('product_id'));
        echo json_encode($product);
        
        // try
        // {
        //     $product = Product::findOrFail($request->get('product_id'));
        //     if($product->quantity >= $request->get('quantity'))
        //     {
        //         return response()->json($product);
        //     }

        //     else
        //     {
        //         $result = [
        //         'message' => 'Quantidade insuficiente do produto',
        //         'code' => '444'
        //         ];
        //         return response()->json($result);
        //     }
        // }

        // catch(Illuminate\Database\Eloquent\ModelNotFoundException $e)
        // {
        //     return response()->json($e);    
        // }


    }   

    public function create()
    {
        $providers = Provider::all();
        $providers = array_pluck($providers, 'name', 'id');

        $categories = Category::all();
        $categories = array_pluck($categories, 'name', 'id');

        return view('dashboard.product.create', compact(['providers', 'categories']));
    }

    public function store(Request $request)
    {

        try {
            Product::create($request->except('_token'));
            
        } catch (Exception $e) {
            return response()->json($e);
        }

        // //Validar imagem
        // if($request->file('file') != null)
        // {
        //     $dir = DIRECTORY_SEPARATOR;
        //     $extension = $request->file('file')->getClientOriginalExtension();
        //     $name = time().$request->get('name').'.'.$extension;
        //     $file = $request->file('file');

        //     Image::make($file)->resize(240, 240)->save(public_path('uploads'.$dir.'images'.$dir.'products'.$dir.$name));
        //     $request['image'] = $name;
        // }

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

            Image::make($file)->resize(240, 240)->save(public_path('uploads'.$dir.'images'.$dir.'products'.$dir.$name));
            $request['image'] = $name;
        }

        $product->update($request->except('_token'));
        
        return redirect()->back()->with('success-message', 'Produto atualizado com sucesso!');
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

    public function json()
    {
        $products = Product::orderBy('id', 'desc')->get();
        return response()->json($products, 200);
    }
}
