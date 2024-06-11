<?php

namespace Database\Factories;

use App\Models\Classroom;
use App\Models\Course;
use App\Models\Lecturer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Schedule>
 */
class ScheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'course_id' => Course::factory(),
            'lecturer_id' => Lecturer::factory(),
            'classroom_id' => Classroom::factory(),
            'day' => fake()->dayOfWeek,
            'start_time' => fake()->time,
            'end_time' => fake()->time,
        ];
    }
}
