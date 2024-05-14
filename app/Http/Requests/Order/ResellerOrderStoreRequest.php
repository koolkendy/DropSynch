<?php

namespace App\Http\Requests\Order;

use App\Enums\OrderStatus;
use Illuminate\Support\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Foundation\Http\FormRequest;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Validation\Rules\Enum;
use App\Models\Order;

class ResellerOrderStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'payment_type' => 'required'
        ];
    }

    public function prepareForValidation(): void
    {
        $order = new Order;
        
        $subtotal = str_replace(',', '', Cart::subtotal());
        $total = str_replace(',', '', Cart::total());
        $vat = str_replace(',', '', Cart::tax());
        
        $fixdeliveryfee = $order::computeDeliveryFeeByCartQty(Cart::count());
        $totalWithDelivery = $total+$fixdeliveryfee;
        $pay = (int)$totalWithDelivery;
        
        $this->merge([
            'order_date' => Carbon::now()->format('Y-m-d'),
            'order_status' => OrderStatus::PENDING->value,
            'total_products' => Cart::count(),
            'sub_total' => (int)$subtotal,
            'vat' => (int)$vat,
            'total' => (int)$total,
            'invoice_no' => IdGenerator::generate([
                'table' => 'orders',
                'field' => 'invoice_no',
                'length' => 10,
                'prefix' => 'RSL-'
            ]),
            //'due' => ((int)Cart::total()) - ((int)$this->pay)
            'due' => (int)($totalWithDelivery - $pay ),
            'pay' => $totalWithDelivery,
            'shipping_fee' => $fixdeliveryfee
        ]);
    }
}
