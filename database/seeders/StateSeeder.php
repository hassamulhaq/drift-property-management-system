<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StateSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('states')->delete();

        $states = json_decode(file_get_contents(__DIR__ . '/../../resources/data/states.json'), true);

        DB::table('states')->insert($states);
    }
}
