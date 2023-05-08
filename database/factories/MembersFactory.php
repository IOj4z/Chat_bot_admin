<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Members>
 */
class MembersFactory extends Factory
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
            'status' => '1',
            'in_person' => 1,
            'remotely' => 0,

        ];
    }
}
