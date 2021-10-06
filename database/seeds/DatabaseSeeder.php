<?php

use App\Definition;
use App\Offer;
use App\User;
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
        // $this->call(UserSeeder::class);
        factory(User::class, 3)->create();
        factory(Offer::class, 10)->create();
        // factory(Definition::class, 20)->create();
    }
}
