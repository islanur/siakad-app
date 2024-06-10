<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = Course::$courses;
        Department::factory(4)->create()->each(function ($department) use ($courses) {
            foreach ($courses as $course) {
                Course::factory()->create([
                    'name' => $course['name'],
                    'credits' => $course['credits'],
                    'type' => $course['type'],
                    'department_id' => $department->id,
                ]);
            }
            // Course::factory()->count(45)->create(['department_id' => $department->id]);
        });
        // Course::factory(45)->dept_si()->create();
        // Course::factory(45)->dept_sk()->create();
        // Course::factory(45)->dept_mi()->create();
        // Course::factory(45)->dept_ti()->create();
    }
}
