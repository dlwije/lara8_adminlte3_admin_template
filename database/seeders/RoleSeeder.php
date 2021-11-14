<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();

        $permission = Permission::all();

        $roleAdmin = Role::create(['name' => 'System admin']);
        Role::create(['name' => 'System user']);
        Role::create(['name' => 'Cashier']);
        Role::create(['name' => 'Store keeper']);
        Role::create(['name' => 'Customer']);
//        Role::create(['name' => 'Company user']);
//        Role::create(['name' => 'Company admin']);

        $roleAdmin->syncPermissions($permission);
    }
}
