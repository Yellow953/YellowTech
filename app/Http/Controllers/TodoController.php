<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function __construct()
    {
        $this->middleware('staff');
    }

    public function index()
    {
        $user = auth()->user();

        $completed_todos = Todo::where('status', 'completed')
            ->where(function ($query) use ($user) {
                $query->where('public', true)
                    ->orWhere(function ($query) use ($user) {
                        $query->where('public', false)
                            ->where('user_id', $user->id);
                    });
            })
            ->paginate(10);

        $ongoing_todos = Todo::where('status', 'ongoing')
            ->where(function ($query) use ($user) {
                $query->where('public', true)
                    ->orWhere(function ($query) use ($user) {
                        $query->where('public', false)
                            ->where('user_id', $user->id);
                    });
            })
            ->paginate(10);

        $data = compact('completed_todos', 'ongoing_todos');

        return view('admin.todo.index', $data);
    }

    public function create(Request $request)
    {
        $request->validate([
            'text' => 'required|max:255',
        ]);

        Todo::create([
            'user_id' => auth()->user()->id,
            'text' => $request->text,
            'status' => 'ongoing',
            'public' => $request->boolean('public'),
        ]);

        Log::create([
            'text' => ucwords(auth()->user()->name) .  ' created a new todo: ' . $request->text . ' status: ' . $request->status . ' datetime: ' . now(),
        ]);

        return redirect()->route('todo')->with('success', 'Todo created successfully.');
    }

    public function edit(Todo $todo)
    {
        return view('admin.todo.edit', compact('todo'));
    }

    public function update(Request $request, Todo $todo)
    {
        $request->validate([
            'text' => 'required|max:255',
        ]);

        $todo->update([
            'user_id' => auth()->user()->id,
            'text' => $request->text,
            'status' => $request->status,
            'public' => $request->boolean('public'),
        ]);

        Log::create([
            'text' => ucwords(auth()->user()->name) .  ' updated todo: ' . $request->text . ' status: ' . $request->status . ' datetime: ' . now(),
        ]);

        return redirect()->route('todo')->with('success', 'Todo updated successfully.');
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();

        Log::create([
            'text' => ucwords(auth()->user()->name) .  ' deleted todo: ' . $todo->text . ' status: ' . $todo->status . ' datetime: ' . now(),
        ]);

        return redirect()->route('todo')->with('success', 'Todo deleted successfully.');
    }

    public function complete(Todo $todo)
    {
        $todo->update([
            'status' => 'completed',
        ]);

        Log::create([
            'text' => ucwords(auth()->user()->name) .  ' completed todo: ' . $todo->text . ' status: ' . $todo->status . ' datetime: ' . now(),
        ]);

        return redirect()->route('todo')->with('success', 'Todo completed successfully.');
    }
}
