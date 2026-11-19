<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::where('user_id', auth()->id())->latest()->get();

        return view('tasks.index', compact('tasks'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
        ]);

        Task::create([
            'user_id' => auth()->id(),
            'title' => $validated['title'],
            'is_completed' => false,
        ]);

        return redirect()->route('tasks.index')->with('success', 'Tâche ajoutée.');
    }

    public function update(Request $request, Task $task)
    {
        abort_if($task->user_id !== auth()->id(), 403);

        if ($request->has('toggle_completed')) {
            $task->update([
                'is_completed' => ! $task->is_completed,
            ]);

            return redirect()->back();
        }

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
        ]);

        $task->update([
            'title' => $validated['title'],
        ]);

        return redirect()->route('tasks.index')->with('success', 'Tâche mise à jour.');
    }

    public function destroy(Task $task)
    {
        abort_if($task->user_id !== auth()->id(), 403);

        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Tâche supprimée.');
    }
}