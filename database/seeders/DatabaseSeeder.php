<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            PermissionSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            ModuleSeeder::class,
            CollectionSeeder::class,
            LabelSeeder::class,
            FeatureSeeder::class,
            TypeSeeder::class,
            TagSeeder::class,
            CategorySeeder::class,
            StatusSeeder::class,
            MenuSeeder::class,
            ProductTypeSeeder::class,
            ProductSeeder::class,
            CurrencySeeder::class,
            CountrySeeder::class,
            StateSeeder::class,
            PaymentTypeSeeder::class,
            PaymentMethodSeeder::class,
            UserPaymentMethodSeeder::class,
            PropertyTypeSeeder::class,
            PropertyLabelSeeder::class
        ]);
    }
}
