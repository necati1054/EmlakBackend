<?php

namespace Database\Factories;

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
        $roles = [1, 2, 3]; // Exclude role 0 for admin

        return [
            'name' => fake()->firstName,
            'surname' => fake()->lastName,
            'phone_number' => fake()->phoneNumber,
            'email' => fake()->unique()->freeEmail,
            'password' => Hash::make('password'), // Hashed password
            'role' => fake()->randomElement($roles), // Assign random role: 1, 2, or 3
            'is_active' => fake()->boolean(90), // 90% chance to be active
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
