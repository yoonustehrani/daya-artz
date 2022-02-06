<?php

namespace Database\Seeders;

use App\Models\Offer;
use App\Models\User;
use Illuminate\Database\Seeder;

class OfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::first();

        if ($user) {
            // \Log::alert();
            $user->offers()->saveMany(Offer::factory()->count(20)->make());
        }
    }
}
