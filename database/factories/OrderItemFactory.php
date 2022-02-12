<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OrderItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->company(),
            'status' => $this->faker->randomElement(['just-recieved', 'finished']),
            'status_info' => $this->faker->paragraph(),
            'price' => intval($this->faker->randomFloat(2, 1, 8.1) * 1_000_000),
        ];
    }
}