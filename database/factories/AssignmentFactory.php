<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Lecturer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Assignment>
 */
class AssignmentFactory extends Factory
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
            'lecture_id' => Lecturer::factory(),
            'title' => fake()->sentence,
            'description' => fake()->paragraph,
            'due_date' => fake()->date,
        ];
    }
}
