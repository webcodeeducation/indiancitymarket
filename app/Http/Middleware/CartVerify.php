<?php
namespace App\Http\Middleware;

use Auth;
use Closure;
use Session;

class CartVerify
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
        $count = count($cart);
        if($count == 0){
            Session::forget('cart_type');
        }
    }

}
