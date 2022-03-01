<?php

namespace Database\Seeders;

use App\Models\Invoice;
use App\Models\User;
use Illuminate\Database\Seeder;

class InvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Invoice::factory()->count(4)->state(['user_id' => User::first()->id])->create();
        Invoice::factory()->count(4)->state(['user_id' => User::first()->id, 'active' => true])->create();
    }
}
