<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TicketMessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'side' => 'customer',
            'body' => $this->faker->paragraph(rand(2,6)),
            // ''
        ];
    }
}
