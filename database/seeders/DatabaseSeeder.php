<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Project;
use App\Models\Step;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create 5 users
        User::factory()->count(5)->create();

        // Create 10 projects and associate 5 steps with each project
        Project::factory(10)->create()->each(function ($project) {
            Step::factory()
                ->count(5)
                ->for($project) // This associates each step with the project
                ->create();
        });
    }
}

