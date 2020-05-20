<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $orders = Order::where('status', 1)->get();
        return view('admin.orders.orders', compact('orders'));
    }

    public function show(Order $order) {

        return view('admin.orders.order', compact('order'));
    }

}
