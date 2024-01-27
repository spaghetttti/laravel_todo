<?php
function getPriorityEmoji($priority)
{
    switch ($priority) {
        case '1':
            return ' 🔴 Hight';
        case '2':
            return ' 🟡 Medium';
        case '3':
            return ' 🟢 Low';
        default:
            return '';
    }
}

function findProjectById($projects, $targetId)
{
    $filteredProjects = $projects->filter(function ($project) use ($targetId) {
        return $project->id === $targetId;
    });

    if ($filteredProjects->isNotEmpty()) {
        $project = $filteredProjects->first();
        echo $project->name;
    } else {
        echo "Project not found.";
    }
}


function filterTasksByProject($tasks, $targetProjectId)
{
    return $tasks->filter(function ($task) use ($targetProjectId) {
        return $task->project_id === $targetProjectId;
    });
}
