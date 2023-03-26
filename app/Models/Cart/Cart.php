<?php

namespace App\Models\Cart;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{

    const DEFAULT_IS_ACTIVE = 1; // default value of cart

    const DEFAULT_CART_CURRENCY_CODE = 'PKR';

    const DEFAULT_FLAT_SHIPPING_RATE = 6;

    const DEFAULT_FREE_SHIPPING_RATE = 0;
}
