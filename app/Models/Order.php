<?php

namespace App\Models;

use App\Enums\OrderStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Gloudemans\Shoppingcart\Facades\Cart;

class Order extends Model
{
    protected $guarded = [
        'id',
    ];

    protected $fillable = [
        'user_id',
        'order_date',
        'order_status',
        'total_products',
        'sub_total',
        'vat',
        'total',
        'invoice_no',
        'payment_type',
        'reference_number',
        'account_number',
        'account_name',
        'tracking_no',
        'pay',
        'due',
        'shipping_fee'
    ];

    protected $casts = [
        'order_date'    => 'date',
        'created_at'    => 'datetime',
        'updated_at'    => 'datetime',
        'order_status'  => OrderStatus::class
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function details(): HasMany
    {
        return $this->hasMany(OrderDetails::class);
    }

    public function scopeSearch($query, $value): void
    {
        $query->where('invoice_no', 'like', "%{$value}%")
            ->orWhere('order_status', 'like', "%{$value}%")
            ->orWhere('payment_type', 'like', "%{$value}%");
    }
    
    
    
    public static function computeDeliveryFeeByCartQty(int $qty): float{
        $delFee  = 250;
        $addDelFee = ((Cart::count() / 10) * 100);
        
        if ($qty > 10) {
            $delFee = $delFee + $addDelFee;
        }
        
        return $delFee;
    }
}
