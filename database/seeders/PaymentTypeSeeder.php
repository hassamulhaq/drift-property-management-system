<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PaymentTypeSeeder extends Seeder
{
    public function run(): void
    {
        \DB::table('payment_types')->insert([
            ['title' => 'Cash on delivery', 'created_at' => now()],
            ['title' => 'Checks', 'created_at' => now()],
            ['title' => 'Debit cards', 'created_at' => now()],
            ['title' => 'Credit cards', 'created_at' => now()],
            ['title' => 'Bank transfers', 'created_at' => now()],
            ['title' => 'PayPal', 'created_at' => now()],
            ['title' => 'Amazon Pay', 'created_at' => now()],
            ['title' => 'Google Pay', 'created_at' => now()],
            ['title' => 'Apple Pay', 'created_at' => now()],
            ['title' => 'Mobile payments', 'created_at' => now()],
        ]);
    }
}
