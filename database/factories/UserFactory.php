<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'email' => $this->faker->unique()->email(),
            'email_verified_at' => null,
            'phone_number' => null,
            'phone_verified' => false,
            'password' => bcrypt('password123')
        ];
    }
}
