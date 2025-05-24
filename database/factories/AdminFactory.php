<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */
class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model= Admin::class;
    public function definition(): array
    {
        return [
            'user_id'=> User::factory(),
             'branch'=>fake()->unique()->company(),
             'universiti'=>fake()->sentence(3)
        ];
    }
}
