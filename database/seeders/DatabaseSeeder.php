<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(SettingSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(MenuSeeder::class);
        // $this->call(TicketSeeder::class);
        // $this->call(FileSeeder::class);
        // $this->call(BlogSeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(OrderSeeder::class);
    }
}
