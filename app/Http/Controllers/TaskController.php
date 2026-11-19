<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    public function store(Request $request)
    {
        $request->validate(['title' => 'required']);

        Task::create([
            'user_id' => 1,
            'title' => $request->title,
        ]);

        return back();
    }

   public function update(Request $request, Task $task)
{
    if ($request->has('title')) {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $task->update([
            'title' => $request->title,
        ]);
    } else {
        $task->update([
            'is_completed' => ! $task->is_completed,
        ]);
    }

    return back();
}
    public function destroy(Task $task)
    {
        $task->delete();

        return back();
    }
}