<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::factory()->count(30)->hasTags(rand(3, 7))->hasCategory()->create();
    }
}
