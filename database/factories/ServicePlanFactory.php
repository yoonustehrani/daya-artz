<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ServicePlanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => ucfirst($this->faker->word()),
            'caption' => "<ul class=\"card-options\">\n<li>ارائه ۲ اتود <span>تایپوگرافی</span></li>\n<li>ارائه ۱ اتود <span>تصویری</span></li>\n<li>تعداد دفعات ویرایش تا ۲ بار</li>\n<li>طراحی بر اساس علم برندینگ</li>\n<li>رنگ متناسب کسب و کار بر اساس علم روانشناسی</li>\n<li>طراحی و اجرا توسط طراحان ارشد</li>\n<li>معرفی رنگ صحیح سازمانی</li>\n</ul>",
            'price' => intval($this->faker->randomFloat(2, 1, 8.1) * 1_000_000)
        ];
    }
}