<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();

        return view('admin.todo.index', compact('todos'));
    }

    public function new()
    {
        return view('admin.todo.create');
    }

    public function create(Request $request)
    {
        $request->validate([
            'text' => 'required|max:255',
            'status' => 'in:pending,ongoing,done',
        ]);

        Todo::create($request->all());

        Log::create([
            'action' => 'ToDo_Created',
            'description' => 'added a to do',
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('todo')->with('success', 'ToDo created successfully.');
    }

    public function edit(Todo $todo)
    {
        return view('admin.todo.edit', compact('todo'));
    }

    public function update(Request $request, Todo $todo)
    {
        $request->validate([
            'text' => 'required|max:255',
            'status' => 'in:pending,ongoing,done',
        ]);

        $todo->update($request->all());

        Log::create([
            'action' => 'ToDo_Updated',
            'description' => 'Updated a to do',
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('todo')->with('success', 'ToDo updated successfully.');
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();

        return redirect()->route('todo')->with('success', 'ToDo deleted successfully.');
    }
}
