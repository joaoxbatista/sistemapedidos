<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Controller;
use Auth;
use Session;

class SallerLoginController extends Controller
{
    use AuthenticatesUsers;

    public function getLogout(Request $request){
        echo "entrou";
        Auth::guard('saller')->logout();
        Session::flush();
        return redirect()->route('saller.login');
    }

    /**
     * View do Formulário de login
     **/
    public function showLoginForm(){
        return view('auth.login-saller');
    }

    /**
     * Ação do Formulário de login
     **/
    public function login(Request $request){

        $credentials = $request->except('_token');

        $validator = validator($credentials, [
            'email' => 'required|min:3|max:100',
            'password' => 'required|min:3|max:100'
        ]);

        if( $validator->fails() ){
            return redirect()
                ->route('saller.login.show')
                ->withErrors($validator)
                ->withInput();
        }

        $remember = $request->get('remember') != null ? $request->get('remember') : false;

        //Caso as credenciais estejam corretas
        if(Auth::guard('saller')->attempt($credentials, $remember))
        {
            return redirect()->route('saller.dashboard');
        }

        //Caso estejam incorretaas
        else
        {

            return redirect()->route('saller.login')
                ->withErrors('E-mail ou senha estão incorretos')
                ->withInput();
        }

    }
}