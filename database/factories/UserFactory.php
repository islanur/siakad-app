<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'username' => fake()->unique()->userName(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'date_of_birth' => fake()->dateTime($max = '01-01-2010'),
            'place_of_birth' => fake()->city(),
            'gender' => fake()->randomElement(User::$gender),
            'phone' => fake()->phoneNumber,
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    // Indicate role to Mahasiswa and is_registered = true
    public function student(): static
    {
        return $this->state(fn (array $attributes) => [
            'role' => 'mahasiswa',
            'is_registered' => true
        ]);
    }

    // Indicate role to Dosen and is_registered = true
    public function lecturer(): static
    {
        return $this->state(fn (array $attributes) => [
            'role' => 'dosen',
            'is_registered' => true
        ]);
    }

    // Indicate role to Admin
    public function admin(): static
    {
        return $this->state(fn (array $attributes) => [
            'role' => 'admin'
        ]);
    }
}
