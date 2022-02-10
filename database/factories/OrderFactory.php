<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'type' => $this->faker->randomElement([
                'manual',
                'automate'
            ]),
            'method' => $this->faker->randomElement([
                'quick-order',
                'professional',
                'tele-order',
                'telegram-bot',
                'messanger'
            ]),
            'status' => $this->faker->randomElement(['just-recieved', 'finished']),
            'status_info' => $this->faker->paragraph(),
            'details' => '',
        ];
    }
}
