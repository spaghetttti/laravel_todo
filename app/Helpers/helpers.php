<?php
function getPriorityEmoji($priority)
{
    switch ($priority) {
        case 1:
            return '🔴';
        case 2:
            return '🟡';
        case 3:
            return '🟢';
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
        echo "Project found: " . $project->name;
    } else {
        echo "Project not found.";
    }
}
