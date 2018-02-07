<?php
	
	namespace App\Http\Controllers\Dashboard;

	use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Provider;
	
class ProviderController extends Controller{

	public function index()
    {
    	$providers = Provider::all();
        return view('admin-dashboard.stock.provider.index', compact('providers'));
    }
    
    public function create()
    {
        return view('admin-dashboard.stock.provider.create');
    }

    public function store(Request $request)
    {
        
        try {
            Provider::create($request->except('_token'));
            
        } catch (Exception $e) {
            return response()-json($e);
        }
    }

    public function show($id)
    {
        $provider = Provider::find($id);
        return view('dashboard.provider.view', compact('provider'));
    }

    public function edit($id)
    {
    	$provider = Provider::find($id);
        return view('dashboard.provider.edit', compact('provider'));
    }

    
    public function update(Request $request)
    {
        $provider = Provider::find($request->get('id'));
        $provider->update($request->except(['_token', 'id']));
        return response()->json($provider, 200);        
    }

    public function delete($id)
    {
        $provider = Provider::find($id);
        return view('dashboard.provider.delete', compact('provider'));
    }
    
    public function destroy(Request $request)
    {
        $provider = Provider::find($request->get('id'));
        $provider->delete();
    }

    public function json()
    {
        $providers = Provider::orderBy('id', 'desc')->get();

        return response()->json($providers, 200);
    }
}