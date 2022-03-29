<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Zeus\Models\Permission;
use Zeus\Models\Role;
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
        $this->call(ZeusRolesSeeder::class);
        $user = new User([
            'name' => 'yoonus',
            'email' => 'yoonus@zeuscms.com',
            'active' => true,
            'password' => \Hash::make('uss828487')
        ]);
        $user->role()->associate(Role::first());
        $user->save();

        $user->permissions()->sync(Permission::select('id')->get()->pluck('id'));
    }
}
