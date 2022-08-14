<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\ProjectCategory;

class ProjectController extends Controller
{
    public function index() {
        $project = Project::all();

        return view('project.index', compact('project'));
    }

    public function create() {
        $projectCategories = ProjectCategory::all();

        return view('project.create', compact('projectCategories'));
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'project_category_id' => 'required'
        ]);

        $project = new Project();
        $project->name = $request->name;
        $project->description = $request->description;
        $project->project_category_id = $request->project_category_id;
        $project->save();

        return redirect()->route('project.index')->with('success', 'Project has been created successfully');
    }

    public function edit($id) {
        $project = Project::find($id);
        $projectCategories = ProjectCategory::all();

        return view('project.edit', compact('project', 'projectCategories'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'project_category_id' => 'required'
        ]);

        $project = Project::find($id);
        $project->name = $request->name;
        $project->description = $request->description;
        $project->project_category_id = $request->project_category_id;
        $project->save();

        return redirect()->route('project.index')->with('success', 'Project has been updated successfully');
    }

    public function delete($id) {
        $project = Project::find($id);
        $project->delete();

        return redirect()->route('project.index')->with('success', 'Project has been deleted successfully');

    }
}
