<?php

namespace Database\Factories;

use App\Models\Department;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'student_number' => fake()->unique()->numerify('STD-###'),
            'reg_date' => fake()->dateTimeBetween('-1 week', '+1 week'),
            // 'user_id' => User::whereHas('roles', function ($q) {
            //     $q->where('name', 'mahasiswa');
            // })->inRandomOrder()->first()->id,
            'user_id' => fake()->unique()->randomElement(User::whereHas('roles', function ($q) {
                $q->where('name', 'mahasiswa');
            })->get())['id'],
            'department_id' => fake()->randomElement(Department::all())['id'],
        ];
    }
}
