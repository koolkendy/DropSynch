<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        $user = auth()->user();

        $carts = Cart::content();
        $total = Cart::total();
        return view('reseller.create-invoice', [
            'user' => $user,
            'carts' => $carts,
            'request' => $request,
            'total' => $total,
        ]);
    }
}
