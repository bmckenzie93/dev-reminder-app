<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
      return [
        'name' => fake()->sentence(3),
        'description' => fake()->paragraph(),
        'created_at' => fake()->dateTimeBetween('-2 years'),
        'updated_at' => fake()->dateTimeBetween('-2 years', 'now'), 
      ];
    }
}
