<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TicketFactory extends Factory
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
            'status' => $this->faker->randomElement([
                'open',
                'on-hold',
                'in-progress',
                'awaiting-reply',
                'reviewd',
                'closed'
            ]),
        ];
    }
}
