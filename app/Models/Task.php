<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use SoftDeletes;
    public $table = 'tasks';
    protected $fillable = ['name', 'priority', 'project_id'];
    // use HasFactory;ff

    public function isCompleted() {
        return $this->completed_at !== null;
    }
}
