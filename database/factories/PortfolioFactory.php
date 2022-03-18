<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PortfolioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->unique()->company();
        return [
            'title' => $title,
            'slug' => str_replace(' ', '-', $title),
            'description' => '',
            'company' => $title,
            'about_company' => $this->faker->sentences(2, true),
            'company_opinion' => $this->faker->sentence(12),
            'details' => json_encode([
                'order' => [
                    'تعداد ادیت درخواستی' => '3',
                    'تعداد ادیت استفاده شده' => '1',
                    'نوع یا شیوه سفارش' => 'سفارش تخصصی از طریق وبسایت',
                    'تعداد کل اتودها' => '3',
                    'تعداد اتود تایید شده' => '1',
                    'نوع پکیج' => 'بسته لاجوردی',
                ],
                'timeline' => [
                    [
                        'title' => 'ثبت سفارش',
                        'icon' => 'far fa-hand-pointer',
                        'date' => '1399/04/23'
                    ],
                    [
                        'title' => 'ثبت قرارداد و پیش پرداخت',
                        'icon' => 'far fa-credit-card',
                        'date' => '1399/04/24'
                    ],
                    [
                        'title' => 'ارسال اتود ها و دریافت تغییر ها',
                        'icon' => 'far fa-handshake',
                        'date' => '1399/04/25'
                    ],
                    [
                        'title' => 'انجام تغییرات',
                        'icon' => 'far fa-edit',
                        'date' => '1399/04/26'
                    ],
                    [
                        'title' => 'تسویه حساب و ارسال فایل',
                        'icon' => 'far fa-check-square',
                        'date' => '1399/04/27'
                    ],
                ],
                'tabular' => [
                    'طرح' => $this->faker->paragraphs(3, true),
                    'رنگ' => $this->faker->paragraphs(3, true),
                    'قالب' => $this->faker->paragraphs(3, true),
                    'جزئیات' => $this->faker->paragraphs(3, true)
                ]
            ]),
        ];
    }
}
