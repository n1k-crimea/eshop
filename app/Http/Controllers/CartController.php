<?php

namespace App\Http\Controllers;

use Stripe;
use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function cart() {
        $order_id = session('order_id');
        if (!is_null($order_id)) {
            $order = Order::findOrFail($order_id);
            return view('cart', compact('order'));
        }
        session()->flash('warning', 'Корзина пуста');
        return redirect()->back();
    }

    public function cart_order() {
        $order_id = session('order_id');
        if (is_null($order_id)) {
            return redirect()->route('index');
        }
        $order = Order::find($order_id);
        return view('order', compact('order'));
    }

    public function cart_confirm(Request $request) {
        $order_id = session('order_id');
        if (is_null($order_id)) {
            return redirect()->route('index');
        }
        $order = Order::find($order_id);
        if ($this->cart_payment($request, $order->get_total_price(), $order)) {
            $result = $order->save_order($request->name, $request->phone);
            if ($result){
                session()->flash('success', 'Заказ оплачен и принят в обработку');
                session()->forget('order_id');
            }
            else {
                session()->flash('warning', 'Произошла ошибка');
            }
        }
        return redirect()->route('index');
    }

    public function cart_payment(Request $request, $amount, $order) {

            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            $token = $_POST['stripeToken'];
            $charge = \Stripe\Charge::create([
                'amount' =>  100 * $amount,
                'currency' => 'USD',
                'description' => 'Оплата заказа №'.$order->id,
                "metadata" => ["order_id" => $order->id],
                'source' => $token,
            ]);
            if($charge['status'] == 'succeeded') {
                session()->flash('success', 'Заказ оплачен');
                return true;
                //return redirect('stripe')->with('success', 'Payment Success!');
            } else {
                session()->flash('warning', 'Произошла ошибка оплаты');
                return false;
                //return redirect('cart')->with('warning', 'Произошла ошибка оплаты');
            }
        }

    public function cart_add($product_id) {
        $order_id = session('order_id');
        if (is_null($order_id)) {
            $order = Order::create();
            session(['order_id' => $order->id]);
        }
        else {
            $order = Order::find($order_id);
        }
        if ($order->products->contains($product_id)) {
            $pivot_row = $order->products()->where('product_id', $product_id)->first()->pivot;
            $pivot_row->count++;
            $pivot_row->update();
        }
        else {
            $order->products()->attach($product_id);
        }
        if (Auth::check()){
            $order->user_id = Auth::id();
            $order->save();
        }
        return redirect()->route('cart');

    }

    public function cart_del($product_id) {
        $order_id = session('order_id');
        if (is_null($order_id)) {
            return redirect()->route('cart');
        };
        $order = Order::find($order_id);
        if ($order->products->contains($product_id)) {
            $pivot_row = $order->products()->where('product_id', $product_id)->first()->pivot;
            if ($pivot_row->count < 2) {
                $order->products()->detach($product_id);
            }
            else {
                $pivot_row->count--;
                $pivot_row->update();
            }
        }

        return redirect()->route('cart');
    }
}
