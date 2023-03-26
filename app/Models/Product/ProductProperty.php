<?php

namespace App\Models\Product;

use App\Models\Global\Category\Category;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;
use Spatie\MediaLibrary\InteractsWithMedia;

class ProductProperty extends Model
{
    use Sluggable, HasFactory, InteractsWithMedia;

    const LOGGED_IN_TO_VIEW = false;
    protected $table = 'properties';
    protected $casts = [
        'published_at' => 'timestamp',
        'featured' => 'int',
        'new' => 'int',
        'sold_individual' => 'int',
        'status' => 'int'
    ];
    protected $fillable = [
        'product_id',
        'uuid',
        'title',
        'slug',
        'short_description',
        'sku',
        'product_number',
        'stock_quantity',
        'backorders',
        'featured',
        'new',
        'sold_individual',
        'status',
        'price',
        'second_price',
        'price_prefix',
        'price_postfix',
        'size',
        'size_prefix',
        'land',
        'land_postfix',
        'property_bedrooms',
        'property_garage',
        'property_garage_size',
        'property_year',
        //'property_id',
        'property_map',
        'property_map_address',
        'property_address',
        'property_zip',
        'featured',
        'logged_in_to_view',
        'disclaimer',
        'virtual_tour',
        'agent_display_option',
        'attachments',
        'private_note',
        'energy_class',
        'energy_global_index',
        'renewable_energy_global_index',
        'energy_performance',
        'epc_current_rating',
        'epc_potential_rating',
        'published_at'
    ];

    protected static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            if (empty($model->uuid)) {
                $model->uuid = Uuid::uuid4()->toString();
            }
        });
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function categories(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'product_category', 'product_id');
    }
}
