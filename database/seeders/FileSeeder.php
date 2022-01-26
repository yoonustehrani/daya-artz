<?php

namespace Database\Seeders;

use App\Models\File;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class FileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $files = Storage::allFiles('public');
        foreach ($files as $f) {
            if (! str_contains($f, '.gitignore')) {
                $file_name = str_replace('public/', '', $f);
                $file = new File([
                    'path' => 'images/storage/' . $file_name,
                    'thumbnail_path' => 'images/storage/' . $file_name,
                    'name' => str_replace('.jpg', '',$file_name),
                    'type' => 'image',
                    'ext' => '.jpg'
                ]);
                $file->save();
            }
        }
    }
}
