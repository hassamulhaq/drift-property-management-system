<?php

namespace Database\Seeders;


use App\Models\Global\Type\Type;
use App\Models\Product\Product;

use App\Models\Product\Type\Property;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    public function run(): void
    {
        $types = [
            [
                'id' => Product::PRODUCT_TYPE_UNCATEGORIZED, // 1
                'model_type' => (new Product())->getMorphClass(),
                'title' => 'Uncategorized',
                'slug' => 'uncategorized',
                'parent_id' => null
            ],
            [
                'id' => Product::PRODUCT_TYPE_SIMPLE, // 2
                'model_type' => (new Product())->getMorphClass(),
                'title' => 'Simple',
                'slug' => 'simple',
                'parent_id' => null
            ],
            [
                'id' => Product::PRODUCT_TYPE_VARIABLE, // 3
                'model_type' => (new Product())->getMorphClass(),
                'title' => 'Variable',
                'slug' => 'variable',
                'parent_id' => null
            ],
            [
                'id' => Product::PRODUCT_TYPE_EXTERNAL, // 4
                'model_type' => (new Product())->getMorphClass(),
                'title' => 'External',
                'slug' => 'external',
                'parent_id' => null
            ],
            [
                'id' => Product::PRODUCT_TYPE_GROUPED, // 5
                'model_type' => (new Product())->getMorphClass(),
                'title' => 'Grouped',
                'slug' => 'grouped',
                'parent_id' => null
            ],
            [
                'id' => Product::PRODUCT_TYPE_PROPERTY, // 6,
                'model_type' => (new Property())->getMorphClass(),
                'title' => 'Property',
                'slug' => 'property',
                'parent_id' => null
            ],
            [
                'id' => Product::PRODUCT_TYPE_PROPERTY, // 6,
                'model_type' => (new Property())->getMorphClass(),
                'title' => 'Commercial',
                'slug' => 'commercial',
                'parent_id' => 6
            ],
            [
                'id' => 7,
                'model_type' => (new Property())->getMorphClass(),
                'title' => 'Office',
                'slug' => 'office',
                'parent_id' => 6
            ],
            [
                'id' => 8,
                'model_type' => (new Property())->getMorphClass(),
                'title' => 'Shop',
                'slug' => 'shop',
                'parent_id' => 7
            ],
            [
                'id' => 9,
                'model_type' => (new Property())->getMorphClass(),
                'title' => 'Residential',
                'slug' => 'residential',
                'parent_id' => 6
            ],
            [
                'id' => 10,
                'model_type' => (new Property())->getMorphClass(),
                'title' => 'Apartment',
                'slug' => 'apartment',
                'parent_id' => 7
            ],
            [
                'id' => 11,
                'model_type' => (new Property())->getMorphClass(),
                'title' => 'Condo',
                'slug' => 'condo',
                'parent_id' => 7
            ],
            [
                'id' => 12,
                'model_type' => (new Property())->getMorphClass(),
                'title' => 'Multi Family Home',
                'slug' => 'multi-family-home',
                'parent_id' => 7
            ],
            [
                'id' => 13,
                'model_type' => (new Property())->getMorphClass(),
                'title' => 'Single Family Home',
                'slug' => 'single-family-home',
                'parent_id' => 9
            ],
            [
                'id' => 14,
                'model_type' => (new Property())->getMorphClass(),
                'title' => 'Villa',
                'slug' => 'villa',
                'parent_id' => 9
            ]
        ];


        foreach ($types as $type) {
            Type::query()->updateOrCreate([
                'id' => $type['id']
            ], $type);
        }
    }
}
