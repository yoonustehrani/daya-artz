<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PortfolioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->unique()->words(2, true);
        return [
            'title' => $title,
            'slug' => \Str::kebab($title),
            'company' => $this->faker->company(),
            'about_company' => $this->faker->sentences(2, true),
            'company_opinion' => $this->faker->sentence(12),
            'details' => json_encode([
                
            ]),
            'timeline' => json_encode([]),
        ];
    }

    // public function 
}
