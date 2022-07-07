<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskGroupRequest;
use App\Http\Requests\UpdateTaskGroupRequest;
use App\Models\TaskGroup;

class TaskGroupController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(TaskGroup::class , 'taskGroup');
    }

    public function index(TaskGroup $taskGroup)
    {

        return auth()->user()->taskGroups()->with('tasks')->get();
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
        $response = $taskGroup->update($request->validated());
        return $taskGroup;
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
