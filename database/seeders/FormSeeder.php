<?php

namespace Database\Seeders;

use App\Models\Form;
use App\Models\FormInput;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;

class FormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $form = new Form();
        $form->title = "لندینگ پیج افتتاحیه - MVP";
        $form->key = 'opening-mvp';
        $form->enabled = true;
        $form->save();
        $inputs = [
            [
                "name" => "in_company_position",
                "order" => 1,
                "label" => "مسئولیت شما در کسب و کارتان کدام یک از موارد زیر است؟",
                "type" => "radio",
                "default" => null,
                "placeholder" => null,
                "details" => json_decode('{
                    "choices": {
                        "ideator": "صاحب ایده کسب و کار",
                        "business-owner": "صاحب کسب و کار",
                        "company-manager": "مدیر / مسئول شرکت"
                    },
                    "positions": [
                        {
                        "icon": "fas fa-user-tie",
                        "name": "business-owner",
                        "title": "صاحب کسب و کار"
                        },
                        {
                        "icon": "fas fa-briefcase",
                        "name": "company-manager",
                        "title": "مدیر / مسئول شرکت"
                        },
                        {
                        "icon": "fas fa-lightbulb",
                        "name": "ideator",
                        "title": "صاحب ایده کسب و کار"
                        }
                    ]
                }'),
                "required" => 1
            ],
            [
                "name" => "fullname",
                "order" => 2,
                "label" => "نام و  نام خانوادگی",
                "type" => "text",
                "default" => null,
                "placeholder" => null,
                "details" => null,
                "required" => 1
            ],
            [
                "name" => "phone_number",
                "order" => 3,
                "label" => "شماره تماس",
                "type" => "text",
                "default" => null,
                "placeholder" => null,
                "details" => null,
                "required" => 1
            ],
            [
                "name" => "ad_goal",
                "order" => 4,
                "label" => "هدف تبلیغاتی یا برند سازی شما",
                "type" => "textarea",
                "default" => null,
                "placeholder" => "هدف فعلی تبلیغاتی/برندینگ که دغدغه شما یا سازمان تان است را شرح دهید.\n- برای مثال:‌ من قصد افزایش فروش رستوران خود را با ارتقا سطح برند خود دارم",
                "details" => null,
                "required" => 1
            ]
        ];
        $inputs = array_map(function($input) {
            $i = new FormInput();
            foreach (array_keys($input) as $key) {
                $i->{$key} = $input[$key];
            }
            return $i;
        }, $inputs);

        $form->inputs()->saveMany($inputs);
    }        
}