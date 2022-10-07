<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\MenuItem;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::transaction(function () {
            $menu = new Menu([
                'name' => 'main',
                'title' => 'منوی اصلی'
            ]);
            $menu->save();
            $items = [
                [
                    'title' => 'خانه',
                    'route' => 'home',
                    'icon' => 'fas fa-home'
                ],
                [
                    'title' => 'خدمات طراحی گرافیکی',
                    'route' => 'services.index',
                    'icon' => 'fas fa-paint-brush'
                ],
                [
                    'title' => 'مقالات',
                    'route' => 'blog.index',
                    'icon' => 'fas fa-blog'
                ],
                [
                    'title' => 'درباره ما',
                    'route' => 'about',
                    'icon' => 'fas fa-building'
                ],
                [
                    'title' => 'تماس با ما',
                    'route' => 'contact',
                    'icon' => 'fas fa-user-headset'
                ],
                [
                    'title' => 'شرایط و ضوابط',
                    'route' => 'policy',
                    'icon' => 'fas fa-user-lock'
                ]
            ];
            foreach ($items as $order => $item) {
                $mi = new MenuItem();
                $mi->title = $item['title'];
                $mi->route = $item['route'];
                $mi->order = $order;
                $mi->details = ['icon_class' => 'd-md-none ' . $item['icon']];
                $menu->items()->save($mi);
            }
        });
    }
}
