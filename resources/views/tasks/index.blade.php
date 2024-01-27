@extends('layouts.app')

@section('content')
    <div class="card d-flex justify-content-between">
        <h1>Tasks</h1>
        <form action="/tasks" method="GET">
            {{-- @csrf --}}
            <label for="project_id">Filter by project</label>
            <select class="form-control" id="project_id" name="project_id">
                <option disabled selected value>  -- </option>
                @foreach ($projects as $project)
                    <option value="{{ $project->id }}">{{ $project->name }}</option>
                @endforeach
            </select>
            <button class="btn btn-primary" type="submit">Filter</button>
        </form>
    </div>

    @include('partials._task_list', ['tasks' => $highPriorityTasks, 'priority' => 'high'])
    @include('partials._task_list', ['tasks' => $mediumPriorityTasks, 'priority' => 'medium'])
    @include('partials._task_list', ['tasks' => $lowPriorityTasks, 'priority' => 'low'])
@endsection
