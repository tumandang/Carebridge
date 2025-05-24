<?php

namespace Database\Factories;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Program>
 */
class ProgramFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->unique()->sentence(4),
            'description'=> fake()->paragraph(),
            'location'=> fake()->address(),
            'startdate'=>fake()->date(),
            'enddate'=>fake()->date(),
            'deadline'=>fake()->date(),
            'type'=>fake()->word(),
            'status'=>fake()->word(),
            'max_vol'=>fake()->randomNumber(2,true),
            'poster'=>fake()->url(),
            'linkgroup'=>fake()->url(),
            'admin_id'=> Admin::factory()

        ];
    }
}
