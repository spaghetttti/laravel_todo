@extends('layouts.app')

@section('content')
    <h1>Tasks</h1>

    @include('partials._task_list', ['tasks' => $highPriorityTasks, 'priority' => 'high'])
    @include('partials._task_list', ['tasks' => $mediumPriorityTasks, 'priority' => 'medium'])
    @include('partials._task_list', ['tasks' => $lowPriorityTasks, 'priority' => 'low'])
@endsection
