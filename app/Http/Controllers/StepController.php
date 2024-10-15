<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Step;
use Illuminate\Http\Request;

class StepController extends Controller
{
    public function index(Request $request)
    {
        // Get all steps
        //$defaultSteps = Step::where('is_default', true)->get(); // Get default steps
        //$customSteps = Step::where('is_default', false)->get(); // Get custom steps

        return view('step.index', compact('defaultSteps', 'customSteps'));
    }


    /**
     * Show form to create a custom step for a project.
     */
    public function createCustomStep(Project $project)
    {
        return view('step.create', ['project' => $project]);
    }

    /**
     * Store a custom step for a project.
     */
    public function storeCustomStep(Request $request, Project $project)
    {
        $validated = $request->validate([
            'step_number' => 'required|integer',
            'title' => 'required|string|max:255',
            'data' => 'nullable|json',
            'options' => 'nullable|json',
        ]);

        // Create the custom step
        $step = Step::create(array_merge($validated, ['is_default' => false]));

        // Associate the step with the project
        $project->customSteps()->attach($step->id);

        return redirect()->route('project.show', $project->id)
            ->with('success', 'Custom step added successfully!');
    }

    /**
     * Create a default step for all projects.
     */
    public function storeDefaultStep(Request $request)
    {
        $validated = $request->validate([
            'step_number' => 'required|integer',
            'title' => 'required|string|max:255',
            'data' => 'nullable|json',
            'options' => 'nullable|json',
        ]);

        // Create the default step
        Step::create(array_merge($validated, ['is_default' => true]));

        return redirect()->route('step.index')->with('success', 'Default step created!');
    }
}

