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
        Form::factory()->count(3)->has(
            FormInput::factory()->count(4),
            'inputs'
        )->create();
    }
}