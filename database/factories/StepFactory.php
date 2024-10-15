<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Step>
 */
class StepFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected static $stepNumber = 1; // Static variable to track step number


    public function definition(): array
    {
        return [
            'project_id' => null,
            'title' => fake()->sentence(5),
            'info' => fake()->sentences(2),
            'options' => fake()->sentences(2),
            'step_number' => self::$stepNumber++, // Increment step number for each new factory instance
            'created_at' => fake()->dateTimeBetween('-2 years'),
            'updated_at' => fake()->dateTimeBetween('-2 years', 'now'), 
        ];
    }
}
