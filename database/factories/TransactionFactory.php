<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $date = now()->subDays(
            random_int(1, 6)
        )->subHours(
            random_int(1, 23)
        );
        return [
            'amount' => $this->faker->numberBetween(50, 1000) * 1000,
            'status' => $this->faker->randomElement([
                'verified',
                'approved',
                'canceled',
                'pending'
            ]),
            'transaction_id' => \Str::random($this->faker->numberBetween(10, 36)),
            'provider' => $this->faker->randomElement(['zarinpal', 'direct']),
            'updated_at' => $date,
            'created_at' => $date
        ];
    }
}
