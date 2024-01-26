@extends('layouts.app')

@section('content')
    <form class="container" action="/tasks" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Task Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="form-group">
            <label for="priority">Priority</label>
            <select class="form-control" id="priority" name="priority" required>
                <option value="1">High</option>
                <option value="2">Medium</option>
                <option value="3">Low</option>
            </select>
        </div>

        <div class="form-group">
            <label for="project">Project</label>
            <select class="form-control" id="project" name="project_id">
                <option value="1">3</option>
                <option value="2">4</option>
                <option value="3">2</option>
                {{-- @foreach ($projects as $project)
                <option value="{{ $project->id }}">{{ $project->name }}</option>
            @endforeach --}}
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Create Task</button>
    </form>
@endsection
