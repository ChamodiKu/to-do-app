<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/tasks', [TaskController::class, 'index']);
Route::post('/tasks', [TaskController::class, 'create']);
Route::patch('/tasks/{task}/complete', [TaskController::class, 'markAsDone']);

