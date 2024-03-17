<?php

namespace App\Enums;

enum OrderStatus: int
{
    case PENDING = 0;
    case WAITING_FOR_PAYMENT = 1;
    case ON_DELIVERY = 2;
    case COMPLETE = 3;
    case CANCELED = 4;

    public function label(): string
    {
        return match ($this) {
            self::PENDING => __('Pending'),
            self::WAITING_FOR_PAYMENT => __('Waiting For Payment'),
            self::ON_DELIVERY => __('On Delivery'),
            self::COMPLETE => __('Complete'),
        };
    }
}
