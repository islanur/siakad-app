<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(100)
            ->student()
            ->has(Student::factory())
            ->create();
        // Student::factory()
        //     ->count(100)
        //     ->has(User::factory()->
        //     // ->state(new Sequence(
        //     //     fn (Sequence $sequence) => ['role' => 'Mahasiswa', 'is_registered' => true]
        //     // ))
        //     ->create();
        // Student::factory(90)->create();
    }
}
