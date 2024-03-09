<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\ToDo;
use Illuminate\Http\Request;

class ToDoController extends Controller
{
    public function index()
    {
        $toDos = ToDo::all();

        return view('admin.todo.index', compact('toDos'));
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

        ToDo::create($request->all());

        Log::create([
            'action' => 'ToDo_Created',
            'description' => 'added a to do',
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('todo.index')->with('success', 'To-Do created successfully.');
    }

    public function edit(ToDo $todo)
    {
        return view('admin.todo.edit', compact('todo'));
    }

    public function update(Request $request, ToDo $todo)
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

        return redirect()->route('todo.index')->with('success', 'To-Do updated successfully.');
    }

    public function destroy(ToDo $todo)
    {
        $todo->delete();

        return redirect()->route('todo.index')->with('success', 'To-Do deleted successfully.');
    }
}
