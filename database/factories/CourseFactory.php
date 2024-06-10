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
        $courseData = [
            [
                'name' => 'Algoritma dan Struktur Data',
                'credits' => 3,
                'semester' => 1,
                'type' => 'Teori'
            ],
            [
                'name' => 'Matematika Diskrit',
                'credits' => 3,
                'semester' => 1,
                'type' => 'Teori'
            ],
            [
                'name' => 'Pemrograman Dasar',
                'credits' => 4,
                'semester' => 1,
                'type' => 'Teori'
            ],
            [
                'name' => 'Logika Informatika',
                'credits' => 2,
                'semester' => 1,
                'type' => 'Teori'
            ],
            [
                'name' => 'Sistem Operasi',
                'credits' => 3,
                'semester' => 2,
                'type' => 'Teori'
            ],
            [
                'name' => 'Struktur Data Lanjut',
                'credits' => 3,
                'semester' => 2,
                'type' => 'Teori'
            ],
            [
                'name' => 'Pemrograman Berorientasi Objek',
                'credits' => 4,
                'semester' => 2,
                'type' => 'Teori'
            ],
            [
                'name' => 'Jaringan Komputer',
                'credits' => 3,
                'semester' => 3,
                'type' => 'Teori'
            ],
            [
                'name' => 'Basis Data',
                'credits' => 3,
                'semester' => 3,
                'type' => 'Teori'
            ],
            [
                'name' => 'Analisis dan Desain Algoritma',
                'credits' => 3,
                'semester' => 3,
                'type' => 'Teori'
            ],
            [
                'name' => 'Pemrograman Web',
                'credits' => 3,
                'semester' => 4,
                'type' => 'Teori'
            ],
            [
                'name' => 'Rekayasa Perangkat Lunak',
                'credits' => 3,
                'semester' => 4,
                'type' => 'Teori'
            ],
            [
                'name' => 'Pemrograman Mobile',
                'credits' => 3,
                'semester' => 4,
                'type' => 'Teori'
            ],
            [
                'name' => 'Pengantar Kecerdasan Buatan',
                'credits' => 3,
                'semester' => 5,
                'type' => 'Teori'
            ],
            [
                'name' => 'Keamanan Jaringan',
                'credits' => 3,
                'semester' => 5,
                'type' => 'Teori'
            ],
            [
                'name' => 'Manajemen Proyek TI',
                'credits' => 3,
                'semester' => 5,
                'type' => 'Teori'
            ],
            [
                'name' => 'Praktikum Jaringan Komputer',
                'credits' => 1,
                'semester' => 3,
                'type' => 'Praktikum'
            ],
            [
                'name' => 'Praktikum Basis Data',
                'credits' => 1,
                'semester' => 3,
                'type' => 'Praktikum'
            ],
            [
                'name' => 'Praktikum Pemrograman Web',
                'credits' => 1,
                'semester' => 4,
                'type' => 'Praktikum'
            ],
            [
                'name' => 'Praktikum Pemrograman Mobile',
                'credits' => 1,
                'semester' => 4,
                'type' => 'Praktikum'
            ],
            [
                'name' => 'Praktikum Rekayasa Perangkat Lunak',
                'credits' => 1,
                'semester' => 4,
                'type' => 'Praktikum'
            ],
            [
                'name' => 'Praktek Lapangan Industri',
                'credits' => 3,
                'semester' => 6,
                'type' => 'Praktek Lapangan'
            ],
            [
                'name' => 'Praktek Lapangan KKN',
                'credits' => 3,
                'semester' => 6,
                'type' => 'Praktek Lapangan'
            ],
        ];

        $course = fake()->randomElement($courseData);

        return [
            'code' => fake()->unique()->numerify('CRS-###'),
            'name' => $course['name'],
            'semester' => $course['semester'],
            'credits' => $course['credits'],
            'type' => $course['type'],
            'description' => fake()->sentence,
            'department_id' => Department::inRandomOrder()->first()->id
        ];
    }

    // Indicate kewajiban matakuliah to false (Pilihan)
    public function pilihan(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_must' => false
        ]);
    }

    // // Indicate department to Sistem Informasi
    // public function dept_si(): static
    // {
    //     return $this->state(fn (array $attributes) => [
    //         'department_id' => fake()->randomElement(Department::where('name', 'Sistem Informasi')->get())['id']
    //     ]);
    // }

    // // Indicate department to Sistem Komputer
    // public function dept_sk(): static
    // {
    //     return $this->state(fn (array $attributes) => [
    //         'department_id' => fake()->randomElement(Department::where('name', 'Sistem Komputer')->get())['id']
    //     ]);
    // }

    // // Indicate department to Manajemen Informatika
    // public function dept_mi(): static
    // {
    //     return $this->state(fn (array $attributes) => [
    //         'department_id' => fake()->randomElement(Department::where('name', 'Manajemen Informatika')->get())['id']
    //     ]);
    // }

    // // Indicate department to Teknik Informatika
    // public function dept_ti(): static
    // {
    //     return $this->state(fn (array $attributes) => [
    //         'department_id' => fake()->randomElement(Department::where('name', 'Teknik Informatika')->get())['id']
    //     ]);
    // }
}
