@extends('layouts.app')

@section('content')


    <h1>Tasks</h1>
    <ul class="task-list">
        here will be tasks
    </ul>
    <h1>Tasks</h1>
    <p>No tasks found.</p>
    @foreach ($tasks as $task)
        <div>
            <p>{{$task->priority}} {{$task->name}}</p>
        </div>
    @endforeach
@endsection
