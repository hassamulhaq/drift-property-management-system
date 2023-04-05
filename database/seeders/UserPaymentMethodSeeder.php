<?php

namespace Database\Seeders;


use App\Models\Payment\PaymentMethod\PaymentMethod;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class UserPaymentMethodSeeder extends Seeder
{
    public function run(): void
    {
        $user_ids = User::pluck('id')->toArray();
        $payment_method_ids = PaymentMethod::pluck('id')->toArray();

        DB::table('user_payment_methods')->insert([
            [
                'user_id' => Arr::random($user_ids),
                'payment_method_id' => Arr::random($payment_method_ids),
                'is_default' => Arr::random([0, 1]),
                'status' => Arr::random([0, 1]),
                'created_at' => now(),
            ],
            [
                'user_id' => Arr::random($user_ids),
                'payment_method_id' => Arr::random($payment_method_ids),
                'is_default' => Arr::random([0, 1]),
                'status' => Arr::random([0, 1]),
                'created_at' => now(),
            ],
            [
                'user_id' => Arr::random($user_ids),
                'payment_method_id' => Arr::random($payment_method_ids),
                'is_default' => Arr::random([0, 1]),
                'status' => Arr::random([0, 1]),
                'created_at' => now(),
            ],
//            [
//                'user_id' => Arr::random($user_ids),
//                'payment_method_id' => Arr::random($payment_method_ids),
//                'is_default' => Arr::random([0, 1]),
//                'status' => Arr::random([0, 1]),
//                'created_at' => now(),
//            ]
        ]);
    }
}
