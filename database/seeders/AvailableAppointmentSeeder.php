<?php

namespace Database\Seeders;

use App\Models\AvailableAppointment;
use Illuminate\Database\Seeder;

class AvailableAppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AvailableAppointment::create([
            "start_date" => "2024-12-08 11:00:00",
            "end_date" => "2024-12-08 12:00:00",
            "admin_id" => 1,
        ]);
        AvailableAppointment::create([
            "start_date" => "2024-12-08 13:00:00",
            "end_date" => "2024-12-08 14:00:00",
            "admin_id" => 1,
        ]);
        AvailableAppointment::create([
            "start_date" => "2024-12-08 15:00:00",
            "end_date" => "2024-12-08 16:00:00",
            "admin_id" => 1,
        ]);
        AvailableAppointment::create([
            "start_date" => "2024-12-08 17:00:00",
            "end_date" => "2024-12-08 18:00:00",
            "admin_id" => 1,
        ]);
    }
}
