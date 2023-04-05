<?php

namespace App\Models\Module;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Module extends Model
{
    use SoftDeletes, HasFactory;

    const USER = 1;
    const TEAM = 2;
    const SUBSCRIPTION = 3;
    const ADDRESS = 4;
    const TAG = 5;
    const TYPE = 6;
    const CATEGORY = 7;
    const COLLECTION = 8;
    const MENU = 9;
    const POST = 10;
    const PAGE = 11;
    const PRODUCT = 12;
    const PRODUCT_ATTRIBUTE = 13;
    const LABEL = 14;
    const PRODUCT_PROPERTY = 15;
    const FEATURE = 16;
    const AGENCY = 17;
    const AGENT = 18;
    const PARTNER = 19;
    const PRODUCT_TYPE = 20;
    const SHOP = 21;
    const INVOICE = 22;
    const CURRENCY = 23;
    const ORDER = 24;
    const ORDER_ITEM = 25;
    const CART = 26;
    const WISHLIST = 27;
    const CHECKOUT = 28;
    const PAYMENT = 29;
    const PAYMENT_TYPE = 30;
    const PAYMENT_METHOD = 31;
    const MEDIA = 32;
    const USER_PAYMENT = 33;
}
