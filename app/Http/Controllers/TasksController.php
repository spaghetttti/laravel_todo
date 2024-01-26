<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function index()
    {
        $tasks = Task::orderBy('completed_at')->orderBy('priority', 'ASC')->get();
        $projects = Project::all();

        return  view('tasks.index', [
            'tasks' => $tasks,
            'projects' => $projects
        ]);
    }

    public function create()
    {
        $projects = Project::all();
        return  view('tasks.create', [
            'projects' => $projects
        ]);
    }

    public function store()
    {
        $task = Task::create([
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
    }

    public function delete($id)
    {
        $task = Task::where('id', $id)->first();
        $task->delete();
        return redirect('/');
    }
}
