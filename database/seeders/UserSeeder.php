<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->admin()->create([
            'name' => 'Nur Islamuddin',
            'username' => 'islanur'
        ]);

        // User::factory(90)
        //     ->student()
        //     ->create();

        // User::factory(10)
        //     ->lecturer()
        //     ->create();
    }
}
