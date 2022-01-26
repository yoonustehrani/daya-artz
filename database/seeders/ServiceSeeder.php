<?php

namespace Database\Seeders;

use App\Models\File;
use App\Models\Portfolio;
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
        // foreach ($services as $service) {
        //     $service = new Service($service);
        //     $service->group = 'main';
        //     $service->slug = str_replace(' ', '-',$service->title);
        //     $service->save();
        // }
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
            $service->content = "<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Error consequuntur incidunt nulla pariatur reiciendis placeat officia aliquam cum asperiores. Delectus repudiandae necessitatibus ipsum minima dolor sunt culpa, tenetur consequatur nobis.
            Magni ipsam ab, alias accusamus deserunt fugit id! Similique ipsum, tempore in, ullam error nam dolorum nihil consectetur harum voluptatum deleniti iusto ut. Rerum adipisci nulla saepe necessitatibus ad quidem.
            Sint consequuntur eos cumque eaque dicta perspiciatis cum voluptates quae, deserunt sapiente neque minima. Unde ut amet fugiat! Ad consequuntur adipisci aut veritatis ratione atque officiis ab iure impedit iste?
            Dignissimos, ea! Officiis perspiciatis vitae quo quia placeat repellendus quasi unde exercitationem molestias aliquam numquam ratione, est at similique distinctio vel accusamus. Odio voluptatem dolores accusamus repudiandae blanditiis quam eum.
            Totam odit nulla pariatur velit atque fuga voluptatibus. Assumenda eveniet nisi ipsam error ea repellat id obcaecati est neque eos voluptatem, veniam quos, praesentium doloribus incidunt eum adipisci magni repudiandae?
            Dignissimos voluptates numquam maiores velit, architecto, enim hic consequuntur voluptatem reiciendis recusandae iusto fugit facilis esse illum quis quam quia neque adipisci debitis beatae? Iusto blanditiis ipsa minus consectetur cum.
            Explicabo fugiat dignissimos veritatis possimus rerum? Distinctio, ex et repellendus consequatur vel, eius impedit libero adipisci iste autem placeat officiis quidem necessitatibus amet voluptatum minima eum facilis reiciendis optio quasi!
            Fugit consequatur repellendus aliquid vitae vero modi quisquam, mollitia corrupti, reiciendis dignissimos aperiam accusamus facilis incidunt, magni soluta? Aliquam necessitatibus consequuntur ratione impedit! Temporibus obcaecati explicabo esse, officia exercitationem inventore!
            Molestias dignissimos enim architecto, hic distinctio expedita dolore quae repellat facilis! Modi suscipit est assumenda officiis perspiciatis laudantium aspernatur facilis. Sit distinctio eius voluptatibus error, sed dicta magni aspernatur nisi.
            Tenetur labore, impedit laudantium iste maiores minus quisquam numquam neque quae beatae cupiditate ratione, eveniet eum distinctio explicabo architecto aperiam. Consequatur illo facere possimus alias voluptates modi perspiciatis quia labore!</p>";
            if ($service->save()) {
                $service->plans()->saveMany(ServicePlan::factory()->count(3)->make());
                foreach (File::all() as $file) {
                    $portfolio = Portfolio::factory(1)->make();
                    $portfolio = $service->portfolios()->saveMany($portfolio);
                    $portfolio[0]->images()->attach([
                        $file->getKey() => ['details' => json_encode(['alt' => $portfolio[0]->title])]
                    ]);
                }
            }
        }
    }
}
