<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Controller;
use Auth;
use Session;

class SellerLoginController extends Controller
{
    use AuthenticatesUsers;

    public function getLogout(Request $request){
        echo "entrou";
        Auth::guard('seller')->logout();
        Session::flush();
        return redirect()->route('seller.login');
    }

    /**
     * View do Formulário de login
     **/
    public function showLoginForm(){
        return view('auth.login-seller');
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
                ->route('seller.login.show')
                ->withErrors($validator)
                ->withInput();
        }

        $remember = $request->get('remember') != null ? $request->get('remember') : false;

        //Caso as credenciais estejam corretas
        if(Auth::guard('seller')->attempt($credentials, $remember))
        {
            return redirect()->route('seller.dashboard');
        }

        //Caso estejam incorretaas
        else
        {

            return redirect()->route('seller.login')
                ->withErrors('E-mail ou senha estão incorretos')
                ->withInput();
        }

    }
}