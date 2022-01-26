<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->unique()->words(3, true);
        return [
            'title' => $title,
            'slug' => \Str::kebab($title),
            'image_url' => 'images/gallery/sampi-logo.jpg',
            'image_alt' => $this->faker->sentence(),
            'description' => $this->faker->words(20, true),
            'body' => '<p>' . implode('</p><p>', $this->faker->paragraphs(rand(30, 50))) . '</p>',
            'reading_time' => rand(4,10) . " دقیقه",
        ];
    }
}
