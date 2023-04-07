<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->name();
        $fname = substr($name, 0, strpos(" ", $name));
        $lname = substr($name, strpos(" ", $name));

        return [
            'fname' => $fname,
            'lname' => $lname,
            'email' => fake()->unique()->safeEmail(),
            'password' => Hash::make(Str::random(32)), // password
            'role_id' => rand(1, 8),
            'department_id' => rand(1, 4)
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return $this
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
