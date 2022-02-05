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
        $value = $type == 'amount' ? rand(20, 999) * 1000 : rand(1,7) * 10;
        return [
            'title' => $this->faker->words(2, true),
            'description' => $this->faker->randomElement([
                '',
                $this->faker->paragraph()
            ]),
            'code' => \Illuminate\Support\Str::random(6),
            'value' => $value,
            'value_type' => $type,
            'max_attempts' => 1,
            'expires_at' => now()->addDays(rand(1,8)),
            'details' => ''
            // 'details' => []
        ];
    }
}
