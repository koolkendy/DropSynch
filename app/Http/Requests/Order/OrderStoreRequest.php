<?php

namespace App\Http\Requests\Order;

use App\Enums\OrderStatus;
use Illuminate\Support\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Foundation\Http\FormRequest;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Validation\Rules\Enum;

class OrderStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'customer_id' => 'required',
            'payment_type' => 'required',
            'pay' => 'required|numeric'
        ];
    }

    public function prepareForValidation(): void
    {
        $subtotal = str_replace(',', '', Cart::subtotal());
        $total = str_replace(',', '', Cart::total());
        $vat = str_replace(',', '', Cart::tax());
        $pay = str_replace(',', '', $this->pay);

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
                'prefix' => 'INV-'
            ]),
            //'due' => ((int)Cart::total()) - ((int)$this->pay)
            'due' => (int)($total - $pay )
        ]);
    }
}
