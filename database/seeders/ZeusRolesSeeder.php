<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Zeus\Models\Role;

class ZeusRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role();
        $role->key = config('zconfig.roles.full-access');
        $role->title = 'Super admin';
        $role->rank = 1;
        $role->save();
    }
}
