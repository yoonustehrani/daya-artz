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
            'total' => null,
            'multipay' => false,
            'expires_at' => now()->addDays($this->faker->numberBetween(3, 7)),
            'active' => false
        ];
    }
}
