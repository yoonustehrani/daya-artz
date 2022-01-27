<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Creating the default user
         */
        $user = new User();
        $user->email = "customer@dayaartz.com";
        $user->password = bcrypt("admin123456");
        $user->email_verified_at = now();
        $user->save();
    }
}
