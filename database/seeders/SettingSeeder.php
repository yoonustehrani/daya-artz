<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = [
            'header' => [
                [
                    'تصویر لوگو داخل منو',
                    'menu.logo',
                    'images/daya-white-logo.png'
                ],
                [
                    'شماره تلفن سمت چپ منو',
                    'menu.phone_number',
                    '+989015045025'
                ],
                [
                    'متن دکمه سمت چپ منو',
                    'menu.button.text',
                    '+‌ سفارش',
                ],
                [
                    'لینک دکمه سمت چپ منو',
                    'menu.button.href',
                    '#'
                ],
            ],
            'mainpage' => [
                [
                    'عنوان هدر صفحه اصلی',
                    'header.h1',
                    '<span>دایا آرتز</span> گامی تا مدرنیته'
                ],
                [
                    'زیر عنوان هدر صفحه اصلی',
                    'header.h1.subtitle',
                    '<p><b>دایا آرتز</b> ؛ نخستین مرکز طراحی گرافیک با رویکرد استارت آپی<br>تیم طراحی دایا آرتز ارائه دهنده خدمات گرافیکی با رویکردی متفاوت است؛ در دایا آرتز رنگ ها و ترسیمات از زیر ذره بین ایده و مفهوم می گذرند تا جلایی تازه به هویت برند شما بخشیده شود و همچنین پوسته ظاهر و برند فعالیت شما، به رنگ هسته ایده و هویت حقیقی اش برسد . دایا آرتز تزریق رنگ ایده هایتان به شخصیت شماست. امروز دایا آرتز را کشف کنید.</p>'
                ],
                [
                    'عکس svg هدر صفحه اصلی',
                    'header.svg-header',
                    'images/header-vector.svg'
                ],
                [
                    'دکمه های هدر صفحه اصلی',
                    'header.buttons',
                    "<a href='/services' class='btn badge-pill bg-purple ml-4'>مشاهده خدمات</a> <a class='btn btn-gradient bg-aqua'>شروع سفارش</a>"
                ],
            ],
            // 'group' => [
            //     [
            //         // title
            //         // key
            //         // value
            //     ],
        ];
        foreach ($settings as $group => $items) {
            foreach ($items as $item) {
                $set = new Setting([
                    'title' => $item[0],
                    'key' => "{$group}.{$item[1]}",
                    'value' => $item[2],
                    'group' => $group,
                ]);
                $set->save();
            }
        }
    }
}
