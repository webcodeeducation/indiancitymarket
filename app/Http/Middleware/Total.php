<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Session;

class Total
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $cart = Session::get('cart');
        $total = 0;
        foreach($cart as $key1 => $item){
            $total = $total + $item['price'];
        }
        session()->put('total', $total);
    }

}
