<?php

namespace App\Http\Middleware;

use App\Order;
use Closure;

class CartEmpty
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
        $order_id = session('order_id');
        if(!is_null($order_id)){
            $order = Order::findOrFail($order_id);
            if($order->products->count()==0) {
                session()->flash('warning', 'Корзина пуста');
                return redirect()->route('index');
            }
        }
        return $next($request);
    }
}
