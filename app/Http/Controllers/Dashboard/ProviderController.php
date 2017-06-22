<?php
	
	namespace App\Http\Controllers\Dashboard;

	use Illuminate\Http\Request;
	use App\Http\Controllers\Controller;

	use App\Models\Provider;
	
	class ProviderController extends Controller{

		public function index()
    {
    	$providers = Provider::all();
        return view('dashboard.provider.index', compact('providers'));
    }
    
    public function create()
    {
        return view('dashboard.provider.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
        	'name' => 'required|max:255',
        	'cnpj' => 'required|max:12',
        	'phone' => 'required|max:12',
        	'email' => 'required|max:255'
        ]);

        Provider::create($request->except('_token'));

        return redirect()->back()->with('success-message', 'Fornecedor cadastrado com sucesso!');
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

        $this->validate($request, [
        	'name' => 'required|max:255',
        	'cnpj' => 'required|max:12',
        	'phone' => 'required|max:12',
        	'email' => 'required|max:255'
        ]);

        $provider->update($request->except('_token'));
        return redirect()->back()->with('success-message', 'Fornecedor atualizado com sucesso!');
    }

    
    public function destroy($id)
    {
        $provider = Provider::find($id);
        $provider->delete();
        return redirect()->back()->with('success-message', 'Fornecedor removido com sucesso!');
    }
	}