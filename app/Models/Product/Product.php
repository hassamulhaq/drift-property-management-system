<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $casts = [
        'type' => 'string',
        'sku' => 'string'
    ];
    protected $fillable = [
        'type_id',
        'sku',
        'meta_data',
        'parent_id'
    ];

    const PRODUCT_STATUS_DRAFT = 0;
    const PRODUCT_STATUS_PUBLISHED = 1;
    const PRODUCT_STATUS_TRASHED = 3;

    const PRODUCT_STATUS = [
        'draft' => self::PRODUCT_STATUS_DRAFT,
        'published' => self::PRODUCT_STATUS_PUBLISHED,
        'trashed' => self::PRODUCT_STATUS_TRASHED
    ];

    const UNCATEGORIZED_CATEGORY_ID = 1;
    const UNCATEGORIZED_CATEGORY_TITLE = 'Uncategorized';


    const PRODUCT_TYPE_UNCATEGORIZED = 1;
    const PRODUCT_TYPE_SIMPLE = 2;
    const PRODUCT_TYPE_VARIABLE = 3;
    const PRODUCT_TYPE_EXTERNAL = 4;
    const PRODUCT_TYPE_GROUPED = 5;

    const PLACEHOLDER_IMAGE = [
        'path' => 'images/system/placeholder_image.jpg',
        'alt' => 'placeholder'
    ];

    /*
     * Don't change order.
     * just add new entry at very bottom
     * */
    const IS_FEATURED = [
        'false' => 0,
        'true' => 1
    ];
    const IS_NEW = [
        'false' => 0,
        'true' => 1
    ];
    const IS_SOLD_INDIVIDUAL = [
        'default' => 0,
        'true' => 1
    ];

    const SKU_PREFIX = 'sku_';

}
