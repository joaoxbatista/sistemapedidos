<?php

namespace App\Http\Middleware;

use Closure;

class HasItemsInCart
{
    /**
     * Verifica se existem items no carrinho, caso exista ele redireciona para a página de criação dos pedidos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($request->session()->has('cart')){
            $cart = $request->session()->get('cart');
            
            if(count($cart->getItems()) > 0){
                return redirect()->route('orders.create');
            }
        }
        return $next($request);
    }
}
