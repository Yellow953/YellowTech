<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Log;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $projects = Project::select('id', 'name', 'description', 'client_id', 'status', 'delivery_date')->get();
        return view('admin.projects.index', compact('projects'));
    }

    public function new()
    {
        $clients = Client::select('id', 'name')->get();
        return view('admin.projects.new', compact('clients'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|unique:projects',
            'client_id' => 'required|numeric',
            'status' => 'required',
        ]);

        Project::create([
            'name' => $request->name,
            'client_id' => $request->client_id,
            'status' => $request->status,
            'description' => $request->description,
            'delivery_date' => $request->delivery_date,
        ]);

        $text = auth()->user()->name . " created Project: " . $request->name . ", datetime: " . now();
        Log::create(['text' => $text]);

        return redirect()->route('projects')->with('success', 'Project was successfully created.');
    }

    public function edit(Project $project)
    {
        $clients = Client::select('id', 'name')->get();
        $data = compact('project', 'clients');

        return view('admin.projects.edit', $data);
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'name' => 'required|max:255',
            'client_id' => 'required|numeric',
            'status' => 'required',
        ]);

        $project->update([
            'name' => $request->name,
            'client_id' => $request->client_id,
            'status' => $request->status,
            'description' => $request->description,
            'delivery_date' => $request->delivery_date,
        ]);

        $text = auth()->user()->name . " updated Project: " . $request->name . ", datetime: " . now();
        Log::create(['text' => $text]);

        return redirect()->route('projects')->with('success', 'Project was successfully updated.');
    }

    public function destroy(Project $project)
    {
        $text = auth()->user()->name . " deleted Project: " . $project->name . " deleted, datetime: " . now();

        $project->delete();
        Log::create(['text' => $text]);

        return redirect()->back()->with('danger', 'Project was successfully deleted');
    }

    public function images(Project $project)
    {
        return view('admin.projects.images', compact('project'));
    }
}
