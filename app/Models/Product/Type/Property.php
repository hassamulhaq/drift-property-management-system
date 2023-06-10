<?php

namespace App\Models\Product\Type;


use App\Models\Product\Category\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;

class Property extends Model
{
    use HasFactory, InteractsWithMedia;

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
        'price_prefix',
        'price_postfix',
        'size',
        'size_prefix',
        'land',
        'land_postfix',
        'bedrooms',
        'garage',
        'garage_size',
        'year',
        'map',
        'map_address',
        'address',
        'zip',
        'logged_in_to_view',
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
        'rop_plan_duration',
        'new',
        'sold_individual'
    ];

    public function categories(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'product_category', 'product_id');
    }
}
