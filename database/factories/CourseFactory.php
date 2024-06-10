<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    protected $model = Course::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $course = fake()->randomElement(Course::$courses);

        return [
            'code' => fake()->unique()->regexify('[A-Z]{3}[0-9]{2}[A-Z]{2}[0-9]{3}'),
            'name' => $course['name'],
            'credits' => $course['credits'],
            'type' => $course['type'],
            'description' => fake()->text(fake()->numberBetween(30, 100)),
            'department_id' => Department::factory()
        ];
    }

    // Indicate kewajiban matakuliah to false (Pilihan)
    public function pilihan(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_must' => false
        ]);
    }

    // Indicate department to Sistem Informasi
    public function dept_si(): static
    {
        return $this->state(fn (array $attributes) => [
            'department_id' => fake()->randomElement(Department::where('name', 'Sistem Informasi')->get())['id']
        ]);
    }

    // Indicate department to Sistem Komputer
    public function dept_sk(): static
    {
        return $this->state(fn (array $attributes) => [
            'department_id' => fake()->randomElement(Department::where('name', 'Sistem Komputer')->get())['id']
        ]);
    }

    // Indicate department to Manajemen Informatika
    public function dept_mi(): static
    {
        return $this->state(fn (array $attributes) => [
            'department_id' => fake()->randomElement(Department::where('name', 'Manajemen Informatika')->get())['id']
        ]);
    }

    // Indicate department to Teknik Informatika
    public function dept_ti(): static
    {
        return $this->state(fn (array $attributes) => [
            'department_id' => fake()->randomElement(Department::where('name', 'Teknik Informatika')->get())['id']
        ]);
    }
}
