<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Step;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $name = $request->input('name');

        $project = Project::when($name, function($query, $name) {
            return $query->name($name);
        })->get();

        return view('project.index', ['project' => $project]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('project.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate and create new project
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'steps' => 'nullable|array',
        ]);

        $project = Project::create($validated);

        return redirect()->route('project.show', ['project' => $project->id])
            ->with('success', 'Project created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('project.show', ['project' => $project]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('project.edit', ['project' => $project]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        // Validate project fields and steps
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'steps' => 'nullable|array',
        ]);
    
        // Update the project (without steps)
        $project->update([
            'name' => $validated['name'],
            'description' => $validated['description'],
        ]);
    
        // Now handle the steps separately
        if ($request->has('steps')) {
            foreach ($validated['steps'] as $stepData) {
                // Decode the JSON string to PHP array
                $stepData = json_decode($stepData, true);
    
                // Assuming steps are stored with an 'id' field to identify them
                $step = Step::find($stepData['id']);
                if ($step) {
                    $step->update($stepData); // Update step fields
                } else {
                    // Optionally create a new step if one doesn't exist
                    $project->steps()->create($stepData);
                }
            }
        }
    
        return redirect()->route('project.show', ['project' => $project->id])
            ->with('success', 'Project updated successfully!');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        // Delete the project
        $project->delete();

        return redirect()->route('project.index')
            ->with('success', 'Project has been deleted.');
    }
}
