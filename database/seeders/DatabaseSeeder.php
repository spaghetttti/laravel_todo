<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Project;
use App\Models\Task;
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

        $tasks = [
            [
                'name' => 'Task 1',
                'priority' => 1,
                'project_id' => 1,
                'completed_at' => now(),
            ],
            [
                'name' => 'Task 2',
                'priority' => 1,
                'project_id' => 3,
                'completed_at' => null,
            ],
            [
                'name' => 'Task 3',
                'priority' => 2,
                'project_id' => 2,
                'completed_at' => now(),
            ],
            [
                'name' => 'Task 4',
                'priority' => 2,
                'project_id' => 3,
                'completed_at' => null,
            ],
            [
                'name' => 'Task 5',
                'priority' => 3,
                'project_id' => 3,
                'completed_at' => now(),
            ],
            [
                'name' => 'Task 6',
                'priority' => 3,
                'project_id' => 1,
                'completed_at' => null,
            ],
        ];

        foreach ($tasks as $taskData) {
            $task = new Task();
            $task->name = $taskData['name'];
            $task->priority = $taskData['priority'];
            $task->project_id = $taskData['project_id'];
            $task->completed_at = $taskData['completed_at'];
            $task->save();
        }
    }
}
