<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Saller;
use Image;
class SallerController extends Controller
{

    /**
     * Método para retornar a view com a lista de pedidos cadastrados no banco
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $sallers = Saller::all();
        return view('dashboard.saller.index', compact('sallers'));
    }

    /**
     * Método para retornar a view de criação dos pedidos
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('dashboard.saller.create');
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
            'email' => 'max:100|email|required|unique:sallers',
            'password' => 'max:255|min:6|required',
            'cpf' => 'min:12|numeric|required',
            'file' => 'image'
        ]);

        if($request->file('file') != null)
        {
            $dir = DIRECTORY_SEPARATOR;
            $extension = $request->file('file')->getClientOriginalExtension();
            $name = time().$request->get('name').'.'.$extension;
            $file = $request->file('file');

            Image::make($file)->resize(240, 240)->save(public_path('uploads'.$dir.'images'.$dir.'sellers'.$dir.$name));
            $request['image'] = $name;
        }

        $password = bcrypt($request->get('password'));
        $request->merge(['password' => $password]);

        Saller::create($request->except('_token'));

        return redirect()->back()->with('success-message', 'Vendedor cadastrado com sucesso!');
    }

    /**
     * Método para retornar a view de visualização do pedido passando uma id.
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $saller = Saller::find($id);
        return view('dashboard.saller.view', compact('saller'));
    }

    /**
     * Método para retornar a view de edição do pedido.
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $saller = Saller::find($id);
        return view('dashboard.saller.edit', compact('saller'));
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
            'payment' => 'required|numeric',
            'cpf' => 'min:12|numeric|required'
        ]);



        if($request->file('file') != null)
        {

            $dir = DIRECTORY_SEPARATOR;
            $extension = $request->file('file')->getClientOriginalExtension();
            $name = time().'.'.$extension;
            $file = $request->file('file');

            Image::make($file)->resize(240, 240)->save(public_path('uploads'.$dir.'images'.$dir.'sellers'.$dir.$name));
            $request['image'] = $name;
        }
        $saller = Saller::find($request->get('id'));
        $saller->update($request->except('_token'));

        return redirect()->back()->with('success-message', 'Vendedor atualizado com sucesso!');
    }

    /**
     * Método para remoção do pedido.
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $saller = Saller::find($id);
        $saller->delete();
        return redirect()->back()->with('success-message', 'Vendedor removido com sucesso!');
    }

}
