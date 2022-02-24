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
        // if (File::count() < 1) {
        //     $files = Storage::allFiles('public/images');
        //     foreach ($files as $f) {
        //         if (! str_contains($f, '.gitignore')) {
        //             $file_name = str_replace('public/images/', '', $f);
        //             $file = new File([
        //                 'path' => 'storage/images/' . $file_name,
        //                 'thumbnail_path' => 'storage/images/' . $file_name,
        //                 'name' => str_replace('.jpg', '',$file_name),
        //                 'type' => 'image',
        //                 'ext' => '.jpg'
        //             ]);
        //             $file->save();
        //         }
        //     }
        // }
    }
}
