<?php

namespace Database\Seeders;


use App\Models\Payment\PaymentType\PaymentType;
use Faker\Generator;
use Illuminate\Container\Container;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class PaymentMethodSeeder extends Seeder
{

    /**
     * Create a new seeder instance.
     *
     * @return void
     * @throws BindingResolutionException
     */
    public function __construct(protected Generator $faker)
    {
        $this->faker = $this->withFaker();
    }

    /**
     * Get a new Faker instance.
     *
     * @return Generator
     * @throws BindingResolutionException
     */
    protected function withFaker(): Generator
    {
        return Container::getInstance()->make(Generator::class);
    }

    public function run(): void
    {
        //$user_ids = User::pluck('id')->toArray();
        $payment_type_ids = PaymentType::pluck('id')->toArray();

        DB::table('payment_methods')->insert([
            [
                //'user_id' => Arr::random($user_ids),
                'payment_type_id' => Arr::random($payment_type_ids),
                'card_type' => $this->faker->creditCardType,
                'card_holder_name' => $this->faker->firstName . ' ' . $this->faker->lastName,
                'card_number' => $this->faker->creditCardNumber,
                'credit_card_expiration_date' => $this->faker->creditCardExpirationDate,
                'created_at' => now(),
            ],
            [
                //'user_id' => Arr::random($user_ids),
                'payment_type_id' => Arr::random($payment_type_ids),
                'card_type' => $this->faker->creditCardType,
                'card_holder_name' => $this->faker->firstName . ' ' . $this->faker->lastName,
                'card_number' => $this->faker->creditCardNumber,
                'credit_card_expiration_date' => $this->faker->creditCardExpirationDate,
                'created_at' => now(),
            ],
            [
                //'user_id' => Arr::random($user_ids),
                'payment_type_id' => Arr::random($payment_type_ids),
                'card_type' => $this->faker->creditCardType,
                'card_holder_name' => $this->faker->firstName . ' ' . $this->faker->lastName,
                'card_number' => $this->faker->creditCardNumber,
                'credit_card_expiration_date' => $this->faker->creditCardExpirationDate,
                'created_at' => now(),
            ],
            [
                //'user_id' => Arr::random($user_ids),
                'payment_type_id' => Arr::random($payment_type_ids),
                'card_type' => $this->faker->creditCardType,
                'card_holder_name' => $this->faker->firstName . ' ' . $this->faker->lastName,
                'card_number' => $this->faker->creditCardNumber,
                'credit_card_expiration_date' => $this->faker->creditCardExpirationDate,
                'created_at' => now(),
            ]
        ]);
    }
}
