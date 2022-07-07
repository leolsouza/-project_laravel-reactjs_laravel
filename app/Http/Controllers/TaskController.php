<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Task::class , 'task');
    }

    public function index(Task $task)
    {
        return Task::orderBy('id', 'asc')->get();
    }

    public function store(StoreTaskRequest $request, Task $task)
    {
        return Task::create($request->validated());
    }

    public function show(Task $task)
    {
        return $task;
    }

    public function update(UpdateTaskRequest $request, Task $task)
    {
        return $task->update($request->validated());
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return $task;
    }

    public function markAsCompleted(Task $task)
    {
        $task->update([
            'completed' => true
        ]);
    }
}
