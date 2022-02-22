<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BillFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'amount' => random_int(50, 999) * 1000,
            'title' => $this->faker->sentence(),
            'status' => 'active',
            'invoice_id' => 1
        ];
    }
}
