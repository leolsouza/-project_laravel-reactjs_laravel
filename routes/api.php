<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskGroupController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::get('me', [AuthController::class, 'me']);

});
Route::middleware('auth')->group(function () {
    Route::get('taskgroups', [TaskGroupController::class, 'index']);
    Route::get('taskgroups/{taskGroup}', [TaskGroupController::class, 'show']);
    Route::post('taskgroups', [TaskGroupController::class, 'store']);
    Route::put('taskgroups/{taskGroup}', [TaskGroupController::class, 'update']);
    Route::delete('taskgroups/{taskGroup}', [TaskGroupController::class, 'destroy']);


    Route::apiResource('tasks', TaskController::class);

    Route::get('taskgroups/{taskGroup}/tasks', [TaskGroupController::class, 'tasksByList']);
    Route::put('tasks/close/{task}',[TaskController::class , 'markAsCompleted']);
});

Route::get('users', [UserController::class, 'index']);
Route::post('register', [UserController::class, 'store']);
Route::delete('users/{user}', [UserController::class, 'destroy']);
