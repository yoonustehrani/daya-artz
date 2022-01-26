<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\ServicePlan;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = [
            [
                "title" => "لوگو",
                "subtitle" => "طراحی لوگو با بالاترین کیفیت",
                "description" => "لوگو نخستین بازتاب شخصیت و هویت برندآرمانی و تجاری شماست. لوگو طنابی تنیده شده از هدف ، باور و هسته فعالیت شماست",
                "icon_class" => "fab fa-d-and-d"
            ],
            [
                "title" => "سربرگ",
                "subtitle" => "طراحی سربرگ رسمی و حرفه ای",
                "description" => "سربرگ نشان دهنده ی هویت سازمانی و قانونی بودن یک کسب و کار است. سربرگ ها جدی ترین و جزئی ترین بخش های هویت یک فعالیت رسمی هستند",
                "icon_class" => "fas fa-scroll"
            ],
            [
                "title" => "کاتالوگ",
                "subtitle" => "بهترین باز خورد ها با کاتالوگ های خاص",
                "description" => "کاتالوگ مهم ترین ابزار برای تبلیغ و انتشار تبلیغات فروش یک محصول است. انتقال صحیح به مشتریان از مهم ترین ارمغان های کاتالوگ است",
                "icon_class" => "fas fa-book-open"
            ],
            [
                "title" => "کارت ویزیت",
                "subtitle" => "انواع کارت ویزیت های ساده و خاص",
                "description" => "سربرگ نشان دهنده ی هویت سازمانی و قانونی بودن یک کسب و کار است. سربرگ ها جدی ترین و جزئی ترین بخش های هویت یک فعالیت رسمی هستند",
                "icon_class" => "fas fa-address-card"
            ],
            [
                "title" => "ست اداری",
                "subtitle" => "ویزیت ، سربرگ ، تقویم و سررسید ، خودکار و ...",
                "description" => "لوازم ست اداری همگی متحدالرنگ و همسو و هم جهت ارمان ها و برند شرکت طراحی می شوند ، و وابسته به هدف و نوع متقاضیان انتخاب می شود",
                "icon_class" => "fas fa-mail-bulk"
            ],
            // [
            //     "title" => "ترکیبی",
            //     "subtitle" => "ترکیب خود را بسازید",
            //     "description" => "اگه نیاز به طراحی های متنوع در بخش عا و خدمات مختلف هستید ، این بسته بهترین انتخاب برای شما و برندتان خواهد بود",
            //     "icon_class" => "fas fa-plus-circle"
            // ]
        ];
        foreach ($services as $service) {
            $service = new Service($service);
            $service->group = 'main';
            $service->slug = str_replace(' ', '-',$service->title);
            $service->save();
        }
        $other_service = [
            [
                "title" => "بنر تبلیغاتی",
                "subtitle" => "طراحی بنر دیجیتالی و چاپی",
                "description" => "",
                "group" => "خدمات طراحی چاپی",
                "icon_class" => "fas fa-ad"
            ],
            [
                "title" => "بروشور",
                "subtitle" => "طراحی انواع بروشور ها",
                "description" => "",
                "group" => "خدمات طراحی چاپی",
                "icon_class" => "fas fa-map"
            ],
            [
                "title" => "تراکت",
                "subtitle" => "طراحی تراکت در انواع سایز و مدل",
                "description" => "",
                "group" => "خدمات طراحی چاپی",
                "icon_class" => "fas fa-sticky-note"
            ],
            [
                "title" => "اسلایدر وب سایت",
                "subtitle" => "طراحی اسلایدر های حرفه ای",
                "description" => "",
                "group" => "خدمات طراحی دیجیتالی",
                "icon_class" => "fas fa-image"
            ],
            [
                "title" => "منو رستوران و کافی شاپ",
                "subtitle" => "منو های خاص و شکیل",
                "description" => "",
                "group" => "خدمات طراحی چاپی",
                "icon_class" => "fab fa-elementor"
            ],
            [
                "title" => "صفحات مجازی",
                "subtitle" => "طراحی قالب ، کاور ،‌پروفایل و ...",
                "description" => "",
                "group" => "خدمات طراحی فضای مجازی",
                "icon_class" => "fab fa-instagram"
            ],
            [
                "title" => "پاکت نامه",
                "subtitle" => "پاکت های نامه رسمی و فانتزی",
                "description" => "",
                "group" => "خدمات طراحی چاپی",
                "icon_class" => "fas fa-envelope"
            ],
            [
                "title" => "بیلبورد",
                "subtitle" => "طراحی انواع بیلبورد و استند و استرابورد",
                "description" => "",
                "group" => "خدمات طراحی چاپی",
                "icon_class" => "fas fa-images"
            ],
            [
                "title" => "موزیک",
                "subtitle" => "کاور ، تم آلبوم و ...",
                "description" => "",
                "group" => "خدمات طراحی دیجیتالی",
                "icon_class" => "fas fa-guitar"
            ],
            [
                "title" => "تقویم",
                "subtitle" => "طراحی انواع تقویم و سررسید",
                "description" => "",
                "group" => "خدمات طراحی چاپی",
                "icon_class" => "fas fa-calendar-check"
            ],
            [
                "title" => "فاکتور",
                "subtitle" => "طراحی انواع فاکتور های خاص و اداری",
                "description" => "",
                "group" => "خدمات طراحی چاپی",
                "icon_class" => "fas fa-receipt"
            ],
            [
                "title" => "جلد کتاب",
                "subtitle" => "جلد انواع کتاب ، مجلات و ...",
                "description" => "",
                "group" => "خدمات طراحی چاپی",
                "icon_class" => "fas fa-book"
            ],
            [
                "title" => "بسته بندی",
                "subtitle" => "بسته بندی های ساده و خاص",
                "description" => "",
                "group" => "خدمات طراحی چاپی",
                "icon_class" => "fas fa-box"
            ]
        ];
        foreach ($other_service as $service) {
            $service = new Service($service);
            $service->slug = str_replace(' ', '-',$service->title);
            if ($service->save()) {
                $service->plans()->saveMany(ServicePlan::factory()->count(3)->make());
            }
        }
    }
}
