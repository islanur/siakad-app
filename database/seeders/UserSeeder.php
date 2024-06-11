<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Lecturer;
use App\Models\Student;
use App\Models\User;
use Database\Factories\DepartmentFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::factory()->create([
            'name' => 'Nur Islamuddin',
            'username' => 'islanur'
        ]);
        $admin->assignRole('admin');

        $ketua = User::factory()->create();
        $ketua->assignRole('ketua', 'dosen');

        $kaprodi = User::factory(4)->create();
        foreach ($kaprodi as $user) {
            $user->assignRole('kaprodi', 'dosen');
        }

        $baak = User::factory()->create();
        $baak->assignRole('baak', 'dosen');

        $staf = User::factory(5)->create();
        foreach ($staf as $user) {
            $user->assignRole('staf');
        }

        $dosen = User::factory(10)->create();
        foreach ($dosen as $user) {
            $user->assignRole('dosen');
        }

        $mahasiswa = User::factory(100)->create();
        foreach ($mahasiswa as $user) {
            $user->assignRole('mahasiswa');
        }

        Department::factory(4)->create();

        $lecturers = User::whereHas('roles', function ($q) {
            $q->where('name', ['dosen', 'ketua', 'kaprodi', 'baak']);
        })->get();

        foreach ($lecturers as $lecturer) {
            Lecturer::factory()->create([
                'user_id' => $lecturer->id,
                'department_id' => Department::inRandomOrder()->first()->id,
            ]);
        }

        $students = User::whereHas('roles', function ($q) {
            $q->where('name', 'mahasiswa');
        })->get();

        foreach ($students as $student) {
            Student::factory()->create([
                'user_id' => $lecturer->id,
                'department_id' => Department::inRandomOrder()->first()->id,
            ]);
        }
    }
}
