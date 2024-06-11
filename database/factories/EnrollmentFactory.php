<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Enrollment>
 */
class EnrollmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'student_id' => fake()->randomElement(Student::all())['id'],  // Student::factory(),
            'course_id' => fake()->randomElement(Course::all())['id'], // Course::factory(),
            'semester' => fake()->numberBetween(1, 8),
            'year' => fake()->year
        ];
    }
}
