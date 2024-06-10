<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            // DepartmentSeeder::class,
            RolesAndPermissionsSeeder::class,
            UserSeeder::class,
            CourseSeeder::class,
            // LecturerSeeder::class,
            // StudentSeeder::class,
            // EnrollmentSeeder::class,
        ]);

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
