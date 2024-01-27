<!-- _task_list.blade.php -->

<h6>{{ getPriorityEmoji(ucfirst($priority))}}{{ ucfirst($priority) }} Priority</h6>
@if ($tasks->count() > 0)
    @foreach ($tasks as $task)
        <div class="card border @if ($task->isCompleted()) border-success @endif">
            <div class="card-body d-flex justify-content-between">
                <div class="card p-2">
                    @if ($task->isCompleted())
                        <div class="text-success">
                            This task is completed
                        </div>
                    @endif
                    Name: {{ $task->name }} Project:
                    {{ findProjectById($projects, $task->project_id) }}
                </div>

                @if (!$task->isCompleted())
                    <form action="/tasks/{{ $task->id }}" method="POST">
                        @method('PATCH')
                        @csrf
                        <button type="submit" class="btn btn-primary">Complete</button>
                    </form>
                @else
                    <form action="/tasks/{{ $task->id }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button id="liveToastBtn" type="submit" class="btn btn-danger">Delete</button>
                    </form>
                @endif
            </div>
        </div>
        <br> <!-- Add spacing between each task -->
    @endforeach
@else
    <p>No tasks found here.</p>
    <a href="/tasks/create">Create a new task</a>
@endif
