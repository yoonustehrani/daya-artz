<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Zeus\Models\Permission;

class ZeusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission_tables = ['users', 'model_types'];
        $premission_types = ['view', 'view_any', 'create', 'edit', 'delete'];
        $extra_types = ['force_delete', 'restore'];
        $permissions = collect([]);
        foreach ($permission_tables as $table) {
            foreach ($premission_types as $type) {
                $permissions->push([
                    'key' => "{$type}_{$table}",
                    'title' => ucfirst(str_replace('_', ' ', $type)) . " " . ucfirst($table)
                ]);
            }
        }
        Permission::insert($permissions->toArray());
        // $default_modeltypes = [
        //     'namespace' => 'zeus_roles',
        //     'slug' => 'admin-roles',
        //     'name_singular' => 'Admin Role',
        //     'name_plural' => 'Admin Roles',
        // ];

        $this->call(ZeusUserSeeder::class);
    }
}
