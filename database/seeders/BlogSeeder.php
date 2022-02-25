<?php

namespace Database\Seeders;

use App\Models\File;
use App\Models\Image;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $images = File::all();
        $posts = Post::factory()
                ->count($images->count())
                ->hasTags(2)
                ->hasCategory()
                ->create();
        $posts_count = $posts->count();
        for ($i=0; $i < $posts_count; $i++) { 
            $posts[$i]->image()->create([
                'file_id' => $images[$i]->getKey(),
                'alt' => \Str::random(50),
            ]);
        }
    }
}
