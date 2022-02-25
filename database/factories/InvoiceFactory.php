<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'amount' => $this->faker->numberBetween(50, 1000) * 1000,
            'expires_at' => now()->addDays($this->faker->numberBetween(3, 7)),
        ];
    }
}
