<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Zeus\Models\User;

class ZeusUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User([
            'name' => 'yoonus',
            'email' => 'yoonus@zeuscms.com',
            'active' => true,
            'password' => \Hash::make('uss828487')
        ]);

        $user->save();
    }
}
