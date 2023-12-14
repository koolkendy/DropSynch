<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Requests\Invoice\StoreInvoiceRequest;
use App\Http\Requests\Invoice\ResellerInvoiceRequest;

class InvoiceController extends Controller
{
    public function create(StoreInvoiceRequest $request, Customer $customer)
    {
        $customer = Customer::where('id', $request->get('customer_id'))
            ->first();

        $carts = Cart::content();

        return view('pos.create', [
            'customer' => $customer,
            'carts' => $carts
        ]);
    }

    public function resellerCreate(ResellerInvoiceRequest $request, Customer $customer)
    {
        $customer = Customer::where('id', 1)
            ->first();
        //for now we use ID:1, we need to change customer_id to be related to the user_id

        $carts = Cart::content();

        return view('reseller.create-invoice', [
            'customer' => $customer,
            'carts' => $carts,
            'request' => $request,
        ]);
    }
}
