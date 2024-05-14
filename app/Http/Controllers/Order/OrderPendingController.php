<?php

namespace App\Http\Controllers\Order;

use App\Enums\OrderStatus;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderPendingController extends Controller
{
    
    public function __invoke(Request $request)
    {
        $orders = Order::where('order_status', OrderStatus::PENDING)
            ->latest()
            ->get();

        return view('orders.pending-orders', [
            'orders' => $orders
        ]);
    }
    
    public function deliveryList(Request $request)
    {
        $orders = Order::where('order_status', OrderStatus::ON_DELIVERY)
            ->with('user')
            ->latest()
            ->get();

        return view('orders.delivery-orders', [
            'orders' => $orders
        ]);
    }
    
    /** DONT PUT ACTION HERE, ITS NOT WORKING **/
}
