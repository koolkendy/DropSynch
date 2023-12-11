<?php

namespace App\Http\Requests\Invoice;

use Illuminate\Foundation\Http\FormRequest;
use Gloudemans\Shoppingcart\Facades\Cart;

class StoreInvoiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'customer_id' => 'required'
        ];
    }
    
    protected function prepareForValidation()
    {
        $carts = Cart::content();
        
        $i = 0;
        foreach($carts as $key => $cart){
            $rowId = $cart->rowId;

            if (isset($this->qty[$i])){
                Cart::update($rowId, $this->qty[$i]);
            }
            
            $i++;
        }

    } 
}
