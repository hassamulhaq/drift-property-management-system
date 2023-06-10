<?php

namespace App\Models\Product;

use App\Interfaces\ProductInterface;
use App\Models\Global\Category\Category;
use App\Models\Global\Collection\Collection;
use App\Models\Product\ProductAttribute\ProductAttribute;
use Illuminate\Database\Eloquent\Model;

class Product extends Model implements ProductInterface
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
    const PRODUCT_STATUS_PUBLISH = 1;
    const PRODUCT_STATUS_TRASH = 3;
    const PRODUCT_STATUS_INHERIT = 4;

    const PRODUCT_COMMENT_STATUS_OPEN = 'open';
    const PRODUCT_COMMENT_STATUS_CLOSE = 'close';

    const PRODUCT_PING_STATUS_OPEN = 'open';
    const PRODUCT_PING_STATUS_CLOSE = 'close';

    const PRODUCT_STATUS = [
        'draft' => self::PRODUCT_STATUS_DRAFT,
        'published' => self::PRODUCT_STATUS_PUBLISH,
        'trashed' => self::PRODUCT_STATUS_TRASH,
        'inherit' => self::PRODUCT_STATUS_INHERIT,
    ];

    const PRODUCT_COMMENT_STATUS = [
        'open' => self::PRODUCT_COMMENT_STATUS_OPEN,
        'close' => self::PRODUCT_COMMENT_STATUS_CLOSE,
    ];

    const PRODUCT_PING_STATUS = [
        'open' => self::PRODUCT_PING_STATUS_OPEN,
        'close' => self::PRODUCT_PING_STATUS_CLOSE,
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


    public function categories(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function collections(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Collection::class, 'product_collection');
    }

    public function attributes(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ProductAttribute::class);
    }

    public function thumbnail(): \Illuminate\Database\Eloquent\Relations\MorphOne
    {
        return $this->morphOne(ProductProperty::class);
    }

    // used in factory

    public function publishedProductProperty(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->productProperty()->where('status', Product::PRODUCT_STATUS['published']);
    }

    public function productProperty(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(ProductProperty::class, 'product_id');
    }
}
