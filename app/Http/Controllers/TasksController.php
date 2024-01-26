<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function index()
    {
        $tasks = Task::all();

        return  view('tasks.index',[
           'tasks' => $tasks
        ]);
    }

    public function create()
    {
        return  view('tasks.create');
    }

    public function store() {
        $task = Task::create([
            'name' => request('name'),
            'priority'=> request('priority'),
        ]);

        return redirect('/');
    }
}
