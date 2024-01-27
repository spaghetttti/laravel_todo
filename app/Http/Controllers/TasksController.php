<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;

class TasksController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        $tasks = Task::orderBy('completed_at')->get();
        $targetProjectId = request('project_id');
        if ($targetProjectId !== null) {
            $tasks = $tasks->filter(function ($task) use ($targetProjectId) {
                return $task->project_id == $targetProjectId;
            });
        }

        $highPriorityTasks = collect();
        $mediumPriorityTasks = collect();
        $lowPriorityTasks = collect();

        $tasks->each(function ($task) use (&$highPriorityTasks, &$mediumPriorityTasks, &$lowPriorityTasks) {
            if ($task->priority === 1) {
                $highPriorityTasks->push($task);
            } elseif ($task->priority === 2) {
                $mediumPriorityTasks->push($task);
            } elseif ($task->priority === 3) {
                $lowPriorityTasks->push($task);
            }
        });

        return  view('tasks.index', [
            'tasks' => $tasks,
            'highPriorityTasks' => $highPriorityTasks,
            'mediumPriorityTasks' => $mediumPriorityTasks,
            'lowPriorityTasks' => $lowPriorityTasks,
            'projects' => $projects,
            'targetProjectId' => $targetProjectId
        ]);
    }

    // public 

    public function create()
    {
        $projects = Project::all();
        return  view('tasks.create', [
            'projects' => $projects
        ]);
    }

    public function store()
    {
        request()->validate([
            'name' => 'required|max:255',
            'priority' => 'required',
            'project_id' => 'required'
        ]);


        Task::create([
            'name' => request('name'),
            'priority' => request('priority'),
            'project_id' => request('project_id')
        ]);
        // return dd($task, request());
        return redirect('/');
    }

    public function update($id)
    {
        $task = Task::where('id', $id)->first();


        $task->completed_at = now();
        $task->save();
        return redirect('/');
    }

    public function delete($id)
    {
        $task = Task::where('id', $id)->first();
        $task->delete();
        return redirect('/');
    }
}
