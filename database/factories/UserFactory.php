<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
    public function definition()
    {
        return [
            'tg_user_id' => fake()->numerify('#########'),
            'first_name' => fake()->name(),
            'last_name' => fake()->lastName(),
            'corporation' => fake()->text(200),
            'about' => fake()->text(200),
            'tg_first_name' => fake()->name(),
            'tg_username' => fake()->name(),
            'status' => 'active',
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
