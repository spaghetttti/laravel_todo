<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Project;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $projects = [
            [
                'name' => '📂 Project 1',
            ],
            [
                'name' => '📂 Project 2',
            ],
            [
                'name' => '📂 Project 3',
            ],
        ];

        // Insert the projects into the database
        foreach ($projects as $project) {
            Project::create($project);
        }
    }
}
