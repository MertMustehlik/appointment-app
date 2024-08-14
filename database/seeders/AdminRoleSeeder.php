<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            "available appointments" => [
                "view available appointments",
                "add available appointment",
                "delete available appointment"
            ]
        ];

        foreach ($permissions as $key => $permission) {
            foreach ($permission as $item) {
                Permission::create([
                    'name' => $item,
                    'guard_name' => "admin",
                    'group_name' => $key
                ]);
            }
        }

        Role::create([
            "name" => "super admin",
            "guard_name" => "admin"
        ]);

        $staff = Role::create([
            "name" => "staff",
            "guard_name" => "admin"
        ]);
        $staff->syncPermissions([
            "available appointments" => [
                "view available appointments"
            ]
        ]);


        $admin = Admin::find(1);
        $admin->assignRole('super admin');

        $staff = Admin::find(2);
        $staff->assignRole('staff');
    }
}
