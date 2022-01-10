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
        $title = $this->faker->unique()->words(
            $this->faker->numberBetween(1,5),
            true
        );
        return [
            'title' => $title,
            'slug' => \Str::kebab($title),
            'image_url' => 'images/gallery/blog-post-1.jpg',
            'reading_time' => 'دو دقیقه',
            'body' => '<p>' . implode('<br>', $this->faker->paragraphs(40)) . '</p>',
            'short_description' => $this->faker->words(50, true),
            'published' => true,
            'author_id' => 1
        ];
    }
}
