<!-- _task_list.blade.php -->

<h6 data-priority="{{ $priority }}">{{ getPriorityEmoji(ucfirst($priority)) }} Priority</h6>

@if ($tasks->count() > 0)
    <div class="task-list" data-priority="{{ $priority }}">
        @foreach ($tasks as $task)
            <div class="card draggable border @if ($task->isCompleted()) border-success @endif"
                data-task-id="{{ $task->id }}">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div class="card p-2">
                        @if ($task->isCompleted())
                            <div class="text-success">
                                This task is completed
                            </div>
                        @endif
                        <span>Name: {{ $task->name }} </span>
                        <span>Project: {{ findProjectById($projects, $task->project_id) }}</span>
                    </div>

                    @if (!$task->isCompleted())
                        <div class="d-flex align-items-center gap-2">
                            <a href="/tasks/{{ $task->id }}" class="btn btn-primary">✍️ Edit</a>
                            <form class="p-0 m-0"  action="/tasks/complete/{{ $task->id }}" method="POST">
                                @method('PATCH')
                                @csrf
                                <button type="submit" class="btn btn-primary">✅ Complete</button>
                            </form>
                        </div>
                    @else
                        <form action="/tasks/{{ $task->id }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button id="liveToastBtn" type="submit" class="btn btn-danger">🗑️ Delete</button>
                        </form>
                    @endif
                </div>
            </div>
            <br> <!-- Add spacing between each task -->
        @endforeach
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js" type="text/javascript"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function() {
            $(".draggable").draggable({
                revert: "invalid",
                cursor: "grab",
                start: function(event, ui) {
                    $(this).css("cursor", "grabbing");
                },
                stop: function(event, ui) {
                    $(this).css("cursor", "grab");
                }
            });

            $(".task-list").droppable({
                drop: function(event, ui) {
                    var taskId = ui.draggable.data("task-id");
                    var priority = $(this).data("priority");
                    console.log(taskId, priority);
                    // Make an AJAX request to update task priority
                    $.ajax({
                        url: `/tasks/update/${taskId}`,
                        type: 'PATCH',
                        data: {
                            taskId: taskId,
                            priority: priority
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            // Handle success response
                            console.log(response)
                        },
                        error: function(xhr, status, error) {
                            // Handle error response
                            console.log(xhr, status, error)
                        },
                        complete: function() {
                            location.reload();
                        }
                    });
                }
            });
        });
    </script>
@else
    <div class="card d-flex flex-row align-items-center justify-content-between p-2">
        <p>No tasks found here.</p>
        <a class="btn btn-light" href="/tasks/create">Create a new task</a>
    </div>
@endif
