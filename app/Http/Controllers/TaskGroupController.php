<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskGroupRequest;
use App\Http\Requests\UpdateTaskGroupRequest;
use App\Models\TaskGroup;

class TaskGroupController extends Controller
{
    public function index()
    {
        return TaskGroup::all();
    }

    public function store(StoreTaskGroupRequest $request, TaskGroup $taskGroup)
    {
       return TaskGroup::create($request->validated());
    }

    public function show(TaskGroup $taskGroup)
    {
        return $taskGroup;
    }

    public function update(UpdateTaskGroupRequest $request, TaskGroup $taskGroup)
    {
        return $taskGroup->update($request->validated);
    }

    public function destroy(TaskGroup $taskGroup)
    {
        $taskGroup->delete();

        return $taskGroup;
    }

    public function tasksByList(TaskGroup $taskGroup)
    {
        return $taskGroup->tasks;
    }
}
