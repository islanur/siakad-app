<?php

namespace Database\Factories;

use App\Models\Department;
use App\Models\Lecturer;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lecturer>
 */
class LecturerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'lecturer_number' => fake()->unique()->numerify('LCT-###'),
            'reg_date' => fake()->dateTimeBetween('-1 week', '+1 week'),
            'position' => fake()->randomElement(Lecturer::$position),
            'user_id' => User::factory(),
            'department_id' => fake()->randomElement(Department::all())['id']
        ];
    }
}
