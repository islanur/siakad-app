<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

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
            'date_of_birth' => fake()->dateTimeBetween('-30 years', '-18 years'),
            'place_of_birth' => fake()->city(),
            'gender' => fake()->randomElement(User::$gender),
            'phone' => fake()->phoneNumber,
            'remember_token' => Str::random(10),
        ];
    }

    // public function configure()
    // {
    //     return $this->afterCreating(function (User $user) {
    //         $roleNames = ['admin', 'ketua', 'kaprodi', 'baak', 'staf', 'dosen', 'mahasiswa', 'guest'];
    //         $role = Role::where('name', fake()->randomElement($roleNames))->first();
    //         $user->assignRole($role);
    //     });
    // }

    // Indicate that the model's email address should be unverified.
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
            // 'role' => 'mahasiswa',
            'is_registered' => true
        ])->afterCreating(function (User $user) {
            $user->assignRole('mahasiswa');
        });
    }

    // Indicate role to Dosen and is_registered = true
    public function lecturer(): static
    {
        return $this->state(fn (array $attributes) => [
            // 'role' => 'dosen',
            'is_registered' => true
        ])->afterCreating(function (User $user) {
            $user->assignRole('dosen');
        });
    }

    // Indicate role to Admin
    public function admin(): static
    {
        return $this->afterCreating(function (User $user) {
            $user->assignRole('admin');
        });
    }

    // Indicate role to kaprodi dan dosen
    public function kaprodi(): static
    {
        return $this->afterCreating(function (User $user) {
            $user->assignRole('kaprodi', 'dosen');
        });
    }

    // Indicate role to baak dan dosen
    public function baak(): static
    {
        return $this->afterCreating(function (User $user) {
            $user->assignRole('baak', 'dosen');
        });
    }

    // Indicate role to staf
    public function staf(): static
    {
        return $this->afterCreating(function (User $user) {
            $user->assignRole('staf');
        });
    }
}
