<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'alt' => $this->faker->sentence(),
            'caption' => $this->faker->paragraph(),
            'title' => $this->faker->words(3, true)
        ];
    }
}
