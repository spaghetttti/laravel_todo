@extends('layouts.app')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form class="container" action="/tasks/update/{{$task->id}}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="name">Task Name</label>
            <input value="{{$task->name}}" type="text" class="form-control" id="name" name="name">
        </div>

        <div class="form-group">
            <label for="priority">Priority</label>
            <select value={{$task->priority}} class="form-control" id="priority" name="priority" required>
                <option value="1" @if ($task->priority == 1) selected @endif>🔴 High</option>
                <option value="2" @if ($task->priority == 2) selected @endif>🟡 Medium</option>
                <option value="3" @if ($task->priority == 3) selected @endif>🟢 Low</option>
            </select>
        </div>

        <div class="form-group">
            <label for="project">Project</label>
            <select class="form-control" id="project_id" name="project_id" required>
                @foreach ($projects as $project)
                    <option @if ($task->project_id == $project->id) selected @endif  value="{{ $project->id }}">{{ $project->name }}</option>
                @endforeach
            </select>
        </div>
        <br>
        
        <button type="submit" class="btn btn-primary">✍️ Edit Task</button>
    </form>
@endsection
