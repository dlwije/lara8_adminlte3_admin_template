<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('model_has_roles')->truncate();

        $sysAdminRole = Role::where('name','System admin')->first();
        $sysUserRole = Role::where('name','System user')->first();
        $collegeAdminRole = Role::where('name','Cashier')->first();
        $collegeUserRole = Role::where('name','Store keeper')->first();
        $studentRole = Role::where('name','Customer')->first();

        $sysAdmin = User::create([
            'name' => 'SysAdmin',
            'email' => 'sysadmin@test.com',
            'password' => Hash::make('12345678'),
            'first_name' => 'System',
            'last_name' => 'User',
            'user_name' => 'System Admin',
            'registration_no' => 'SYS-000001',
            'mobile' => '+94710153734',
            'ip' => '127.0.0.1',
            'is_active' => 1,
            'approve_status' => 1,
        ]);

        $sysUser = User::create([
            'name' => 'SysUser',
            'email' => 'sysuser@test.com',
            'password' => Hash::make('12345678'),
            'first_name' => 'System',
            'last_name' => 'User',
            'user_name' => 'System User',
            'registration_no' => 'SYS-000002',
            'mobile' => '+94710153734',
            'ip' => '127.0.0.1',
            'is_active' => 1,
            'approve_status' => 1,
        ]);

        $cashierAdmin = User::create([
            'name' => 'Cashier',
            'email' => 'cashier@test.com',
            'password' => Hash::make('12345678'),
            'first_name' => 'Cashier',
            'last_name' => 'User',
            'user_name' => 'Cashier Admin',
            'registration_no' => 'COL-000001',
            'mobile' => '+94710153734',
            'ip' => '127.0.0.1',
            'is_active' => 1,
            'approve_status' => 1,
        ]);

        $storeUser = User::create([
            'name' => 'CollegeUser',
            'email' => 'store@test.com',
            'password' => Hash::make('12345678'),
            'first_name' => 'Store',
            'last_name' => 'User',
            'user_name' => 'Store User',
            'registration_no' => 'COL-000001',
            'mobile' => '+94710153734',
            'ip' => '127.0.0.1',
            'is_active' => 1,
            'approve_status' => 1,
        ]);

        $student = User::create([
            'name' => 'customer',
            'email' => 'customer@test.com',
            'password' => Hash::make('12345678'),
            'first_name' => 'Hithesh',
            'last_name' => 'Perera',
            'user_name' => 'Hithesh Perera',
            'registration_no' => 'STU-000001',
            'mobile' => '+94710153734',
            'ip' => '127.0.0.1',
            'is_active' => 1,
            'approve_status' => 1,
        ]);
        $student1 = User::create([
            'name' => 'customer1',
            'email' => 'customer1@test.com',
            'password' => Hash::make('12345678'),
            'first_name' => 'Manju',
            'last_name' => 'Kumar',
            'user_name' => 'Manju Kumar',
            'registration_no' => 'STU-000002',
            'mobile' => '+94710153735',
            'ip' => '127.0.0.1',
            'is_active' => 1,
            'approve_status' => 1,
        ]);
        $student2 = User::create([
            'name' => 'customer2',
            'email' => 'student2@test.com',
            'password' => Hash::make('12345678'),
            'first_name' => 'Kriti',
            'last_name' => 'Pandey',
            'user_name' => 'Kriti Pandey',
            'registration_no' => 'STU-000003',
            'mobile' => '+94710153736',
            'ip' => '127.0.0.1',
            'is_active' => 1,
            'approve_status' => 1,
        ]);
        $student3 = User::create([
            'name' => 'customer3',
            'email' => 'customer3@test.com',
            'password' => Hash::make('12345678'),
            'first_name' => 'Mitesh',
            'last_name' => 'Mandoo',
            'user_name' => 'Mitesh Mandoo',
            'registration_no' => 'STU-000004',
            'mobile' => '+94710153737',
            'ip' => '127.0.0.1',
            'is_active' => 1,
            'approve_status' => 1,
        ]);
        $student4 = User::create([
            'name' => 'customer4',
            'email' => 'customer4@test.com',
            'password' => Hash::make('12345678'),
            'first_name' => 'Riya',
            'last_name' => 'Kapoor',
            'user_name' => 'Riya Kapoor',
            'registration_no' => 'STU-000005',
            'mobile' => '+94710153738',
            'ip' => '127.0.0.1',
            'is_active' => 1,
            'approve_status' => 1,
        ]);

        $sysAdmin->assignRole($sysAdminRole);
        $sysUser->assignRole($sysUserRole);
        $cashierAdmin->assignRole($collegeAdminRole);
        $storeUser->assignRole($collegeUserRole);
        $student->assignRole($studentRole);
        $student1->assignRole($studentRole);
        $student2->assignRole($studentRole);
        $student3->assignRole($studentRole);
        $student4->assignRole($studentRole);

    }
}
