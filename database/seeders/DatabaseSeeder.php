<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::create([
            'first_name' => 'Test',
            'last_name' => 'User',
            'email' => 'test@test.com',
            'password' => 123123,
        ]);

        Admin::create([
            'email' => 'admin@admin.com',
            'password' => 123123,
        ]);
        Admin::create([
            'email' => 'mertmustehlik@hotmail.com',
            'password' => 123123,
        ]);

        $this->call(AdminRoleSeeder::class);
        $this->call(AvailableAppointmentSeeder::class);
    }
}
