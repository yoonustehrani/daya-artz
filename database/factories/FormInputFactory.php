<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FormInputFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return array_merge($this->inputWithDetails(), [
            'order' => $this->faker->randomDigitNotZero(),
            'label' => $this->faker->words(3, true),
            'name' => \Str::random(15),
            'required' => $this->faker->randomElement([true, false])
        ]);
    }

    public function inputWithDetails()
    {
        $type = $this->faker->randomElement([
            'text',
            'textarea',
            'number',
            'select',
            'checkbox',
            'radio'
        ]);
        $details = [];
        if (in_array($type, ['select', 'radio'])) {
            $details['options'] = ['one' => '1', 'two' => '2', 'three' => '3'];
        }
        return compact('type', 'details');
    }
}
