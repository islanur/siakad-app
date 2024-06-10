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

        // $departments = [
        //     'Sistem Informasi',
        //     'Sistem Komputer',
        //     'Manajemen Informatika',
        //     'Teknik Informatika'
        // ];

        // foreach ($departments as $department) {

        // }

        Department::each(function ($department) use ($courseData) {
            foreach ($courseData as $course) {
                Course::factory()->create([
                    'name' => $course['name'],
                    'semester' => $course['semester'],
                    'credits' => $course['credits'],
                    'type' => $course['type'],
                    'department_id' => $department->id,
                ]);
            }
        });
    }
}
