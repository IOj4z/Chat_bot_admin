<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
//         \App\Models\User::factory(1)->create();
         \App\Models\Members::factory(110)->create();

//         \App\Models\User::factory(30)->create([
//             'tg_user_id' => fake()->numerify('########'),
//             'first_name' => fake()->name(),
//             'last_name' => fake()->lastName(),
//             'corporation' => fake()->text(200),
//             'about' => fake()->text(200),
//             'tg_first_name' => fake()->name(),
//             'tg_username' => fake()->name(),
//             'status' => 'active',
//         ]);
    }
}
