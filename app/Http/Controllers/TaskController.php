<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // List last 5 incomplete tasks
    public function index()
    {
        $tasks = Task::where('status', 0)
                     ->latest()
                     ->take(5)
                     ->get();

        return response()->json($tasks);
    }

    // Store a new task
    public function create(Request $request)
    {
        $task = new Task();
        $task->title = $request->title;
        $task->description = $request->description;
        $task->status = 0;
        $task->save();

        return response()->json($task, 201);
    }

    // Mark task as completed
    public function markAsDone($taskId)
    {
        $task = Task::find($taskId);
        $task->status = 1;
        $task->save();

        return response()->json(['message' => 'Task marked as completed']);
    }
}
