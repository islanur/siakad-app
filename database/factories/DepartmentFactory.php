<?php

namespace Database\Factories;

use App\Models\Department;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Department>
 */
class DepartmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $departments = [
            'Sistem Informasi',
            'Sistem Komputer',
            'Manajemen Informatika',
            'Teknik Informatika'
        ];

        return [
            'code' => fake()->unique()->numerify('DPT-###'),
            'name' => fake()->unique()->randomElement($departments),
            'head' => User::whereHas('roles', function ($q) {
                $q->where('name', 'kaprodi');
            })->inRandomOrder()->first()->id ?? null,
            'description' => fake()->sentence
        ];
    }
}
