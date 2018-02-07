<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Seller;
use Image;
class SellerController extends Controller
{

    /**
     * Método para retornar a view com a lista de pedidos cadastrados no banco
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $sellers = Seller::all();
        return view('dashboard.seller.index', compact('sellers'));
    }

    /**
     * Método para retornar a view de criação dos pedidos
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('dashboard.seller.create');
    }

    /**
     * Método para salvar informações do vendedor.
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'max:100|required',
            'email' => 'max:100|email|required|unique:sellers',
            'password' => 'max:255|min:6|required',
            'file' => 'image'
        ]);

        $dir = DIRECTORY_SEPARATOR;
        $request['image'] = 'imgs/no-image.png';
        if($request->file('file') != null)
        {
           
            $extension = $request->file('file')->getClientOriginalExtension();
            $name = time().$request->get('name').'.'.$extension;
            $file = $request->file('file');

            Image::make($file)->resize(240, 240)->save(public_path('uploads'.$dir.'images'.$dir.'sellers'.$dir.$name));
            $request['image'] = 'uploads/images/sellers/'.$name;
        }

        $password = bcrypt($request->get('password'));
        $request->merge(['password' => $password]);

        Seller::create($request->except('_token'));

        return redirect()->back()->with('success-message', 'Vendedor cadastrado com sucesso!');
    }

    /**
     * Método para retornar a view de visualização do pedido passando uma id.
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $seller = Seller::find($id);
        return view('dashboard.seller.view', compact('seller'));
    }

    /**
     * Método para retornar a view de edição do pedido.
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $seller = Seller::find($id);
        return view('dashboard.seller.edit', compact('seller'));
    }

    /**
     * Método para atualização das informações do pedido.
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'max:100|required',
            'cpf' => 'required'
        ]);



        if($request->file('file') != null)
        {

            $dir = DIRECTORY_SEPARATOR;
            $extension = $request->file('file')->getClientOriginalExtension();
            $name = time().'.'.$extension;
            $file = $request->file('file');

            Image::make($file)->resize(240, 240)->save(public_path('uploads'.$dir.'images'.$dir.'sellers'.$dir.$name));
            $request['image'] = 'uploads/images/sellers/'.$name;
        }
        $seller = Seller::find($request->get('id'));
        $seller->update($request->except('_token'));

        return redirect()->back()->with('success-message', 'Vendedor atualizado com sucesso!');
    }

    /**
     * Retorna a view para remoção de vendedores
     * @param Request $request
     * @param int $id
     */
    public function delete(Request $request, int $id)
    {
        $seller = Seller::findOrFail($id);
        return view('dashboard.seller.delete', compact('seller'));
    }

    /**
     * Método para remoção do pedido.
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        $seller = Seller::find($request->get('id'));
        $seller->delete();
        return redirect()->route('sellers')->with('success-message', 'Vendedor removido com sucesso!');
    }

}
