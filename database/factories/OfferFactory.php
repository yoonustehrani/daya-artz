<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OfferFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $type = $this->faker->randomElement(['percentage', 'amount']);
        $value = $type == 'amount' ? $this->faker->numberBetween(20, 999) * 1000 : intval($this->faker->randomFloat(1, 0.1, 7) * 10);
        return [
            'title' => 'My offer ' . \Str::random(12),
            'value' => $value,
            'value_type' => $type,
            'code' => $this->faker->unique()->word(),
            'max_attempts' => 1,
            'expires_at' => now()->addDays($this->faker->randomDigitNotZero())
        ];
    }
}
