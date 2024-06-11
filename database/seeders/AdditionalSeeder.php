<?php

namespace Database\Seeders;

use App\Models\Assignment;
use App\Models\Attendance;
use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Schedule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdditionalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Classroom::factory()->count(10)->create();
        Schedule::factory()->count(50)->create();
        Assignment::factory()->count(100)->create();
        Attendance::factory()->count(100)->create();
        Grade::factory()->count(500)->create();
    }
}
