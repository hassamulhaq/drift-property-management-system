<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    const ORDER_STATUS_PENDING = 1;
    const ORDER_STATUS_PROCESSING = 2;
    const ORDER_STATUS_ON_HOLD = 3;
    const ORDER_STATUS_COMPLETED = 4;
    const ORDER_STATUS_CANCELLED = 5;
    const ORDER_STATUS_REFUNDED = 6;
    const ORDER_STATUS_FAILED = 7;
    const ORDER_STATUS_TRASH = 8;

    const ORDER_STATUS = [
        self::ORDER_STATUS_PENDING,
        self::ORDER_STATUS_PROCESSING,
        self::ORDER_STATUS_ON_HOLD,
        self::ORDER_STATUS_COMPLETED,
        self::ORDER_STATUS_CANCELLED,
        self::ORDER_STATUS_REFUNDED,
        self::ORDER_STATUS_FAILED,
        self::ORDER_STATUS_TRASH
    ];
}
