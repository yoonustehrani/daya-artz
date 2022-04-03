<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;


class ZeusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ZeusUserSeeder::class);
    }
}
