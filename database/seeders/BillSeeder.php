<?php

namespace Database\Seeders;

use App\Models\Bill;
use App\Models\Transaction;
use Illuminate\Database\Seeder;

class BillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bills = Bill::factory()->count(1)->create();
        Transaction::factory()->count(8)->state(['bill_id' => $bills[0]->id, 'user_id' => 1])->create();
    }
}
