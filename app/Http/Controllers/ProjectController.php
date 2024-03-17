<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }

    public function new()
    {
        return view('projects.new');
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'client_id' => 'required|exists:clients,id',
        ]);

        $project = new Project($request->all());
        $project->save();

        return redirect()->route('projects')->with('success', 'Project created successfully.');
    }

    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'client_id' => 'required|exists:clients,id',
        ]);

        $project->fill($request->all());
        $project->save();

        return redirect()->route('projects')->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('projects')->with('success', 'Project deleted successfully.');
    }
}
