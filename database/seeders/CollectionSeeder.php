<?php

namespace Database\Seeders;

use App\Models\Product\Collection\Collection;
use App\Models\Product\Product;
use Illuminate\Database\Seeder;

class CollectionSeeder extends Seeder
{
    public function run(): void
    {
        $collections = [
            [
                'id' => 1,
                'model_type' => (new Product())->getMorphClass(),
                'title' => 'Uncategorized',
                'slug' => \Str::slug('Uncategorized')
            ],
            [
                'id' => 2,
                'model_type' => (new Product())->getMorphClass(),
                'title' => 'Featured Products',
                'slug' => \Str::slug('Featured Products')
            ],
            [
                'id' => 3,
                'model_type' => (new Product())->getMorphClass(),
                'title' => 'On Sale',
                'slug' => \Str::slug('On Sale')
            ],
            [
                'id' => 4,
                'model_type' => (new Product())->getMorphClass(),
                'title' => 'New Arrivals',
                'slug' => \Str::slug('New Arrivals')
            ],
            [
                'id' => 5,
                'model_type' => (new Product())->getMorphClass(),
                'title' => 'Summer Sale',
                'slug' => \Str::slug('Summer Sale')
            ],
            [
                'id' => 5,
                'model_type' => (new Product())->getMorphClass(),
                'title' => 'Winter Sale',
                'slug' => \Str::slug('Winter Sale')
            ],
            [
                'id' => 6,
                'model_type' => (new Product())->getMorphClass(),
                'title' => 'Only For Men',
                'slug' => \Str::slug('Only For Men')
            ]
        ];

        foreach ($collections as $collection) {
            Collection::query()->updateOrCreate(['id' => $collection['id']], $collection);
        }
    }
}
