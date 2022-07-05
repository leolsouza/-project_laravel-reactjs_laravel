<?php

namespace App\Models;

use App\Models\TaskGroup;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'completed', 'task_group_id'];

    public function taskGroup()
    {
        return $this->belongsTo(TaskGroup::class, 'task_group_id', 'id');
    }
}
