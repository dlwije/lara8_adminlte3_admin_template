<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        DB::table('permission_heads')::truncate();
        $permissionHead = [
            'Role',
            'User'
        ];
        Permission::truncate();
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'user-management',
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'batch-front-view',
            'wish-list-front-view',
            'wish-list-front-add',
            'wish-list-front-delete',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['header_id' => 0,'name' => $permission]);
        }
    }
}
