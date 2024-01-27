<?php
function getPriorityEmoji($priority)
{
    switch ($priority) {
        case 'High':
            return ' 🔴 ';
        case 'Medium':
            return ' 🟡 ';
        case 'Low':
            return ' 🟢 ';
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
