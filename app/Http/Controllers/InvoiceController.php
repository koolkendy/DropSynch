<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Requests\Invoice\StoreInvoiceRequest;
use App\Http\Requests\Invoice\ResellerInvoiceRequest;

class InvoiceController extends Controller
{
    public function create(StoreInvoiceRequest $request, User $user)
    {
        $user = User::where('id', $request->get('user_id'))
            ->first();

        $carts = Cart::content();

        return view('pos.create', [
            'user' => $user,
            'carts' => $carts
        ]);
    }

    public function resellerCreate(ResellerInvoiceRequest $request, User $user)
    {
        $order = new Order;
        $user = auth()->user();

        $carts = Cart::content();
        
        $getFirstProductId = 0;
        foreach ($carts as  $item) {
           $getFirstProductId = $item->id;
           
           break;
        }
        
        $product = Product::where('id', $getFirstProductId)->first();
        
        if($product->user->email === 'supplier1@dropsynch.com')
            $gcash = 'gcash.jpg';
        else
            $gcash  = 'gcash2.jpg';
        
        $total = Cart::total();
        return view('reseller.create-invoice', [
            'user' => $user,
            'carts' => $carts,
            'request' => $request,
            'total' => $total,
            'gcash' => $gcash,
            'order' => $order
        ]);
    }
}
