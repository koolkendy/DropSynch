<?php

namespace App\Http\Controllers\Order;

use App\Enums\OrderStatus;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderCanceledController extends Controller
{
    public function __invoke(Request $request)
    {
        $orders = Order::where('order_status', OrderStatus::CANCELED)
            ->latest()
            ->get();

        return view('orders.canceled-orders', [
            'orders' => $orders
        ]);
    }
    
    /** DONT PUT ACTION HERE, ITS NOT WORKING **/
}
