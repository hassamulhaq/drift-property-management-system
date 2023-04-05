<?php

namespace Database\Seeders;


use App\Models\Product\Type\Property;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LabelSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('labels')->insert([
            [
                'id' => 1,
                'model_type' => (new Property())->getMorphClass(),
                'title' => 'Hot Offer',
                'slug' => 'hot-offer',
                'parent_id' => null,
            ],
            [
                'id' => 2,
                'model_type' => (new Property())->getMorphClass(),
                'title' => 'Open House',
                'slug' => 'open-house',
                'parent_id' => null
            ],
            [
                'id' => 3,
                'model_type' => (new Property())->getMorphClass(),
                'title' => 'Sold',
                'slug' => 'sold',
                'parent_id' => null
            ]
        ]);
    }
}
