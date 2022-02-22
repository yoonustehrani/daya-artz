<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class LandingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $page = new Page();
        $page->title = 'جشنواره فروش ویژه افتتاحیه دایا آرتز';
        $page->slug = 'daya';
        $page->view = 'pages.landing.opening';
        $page->type = 'landing-page';

        $page->save();
    }
}
