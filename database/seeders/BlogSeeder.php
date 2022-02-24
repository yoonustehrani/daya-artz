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
        $dir = scandir(__DIR__ . '/../../public/seed/images');
        $images = collect([]);
        foreach ($dir as $f) {
            if (! in_array($f, ['.', '..'])) {
                $fname = 'blogpost-' . Uuid::uuid4();
                $path = "seed/images/{$f}";
                $file = new File([
                    'path' => $path,
                    'thumbnail_path' => $path,
                    'name' => $fname,
                    'type' => 'image',
                    'ext' => '.jpeg'
                ]);
                if ($file->save()) {
                    $images->push($file->getKey());
                }
            }
        }
        $posts = Post::factory()
                ->count($images->count())
                ->hasTags(2)
                ->hasCategory()
                ->create();
        $posts_count = $posts->count();
        for ($i=0; $i < $posts_count; $i++) { 
            $posts[$i]->image()->create([
                'file_id' => $images[$i],
                'alt' => \Str::random(50),
            ]);
        }
    }
}
