<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProjectCategory;

class ProjectCategoryController extends Controller
{
    public function index() {
        $projectCategories = ProjectCategory::all();

        return view('project_category.index', compact('projectCategories'));
    }

    public function create() {
        return view('project_category.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required'
        ]);

        $projectCategory = new ProjectCategory();
        $projectCategory->name = $request->name;
        $projectCategory->save();

        return redirect()->route('project_category.index')->with('success', 'Project category has been created successfully');
    }

    public function edit($id) {
        $projectCategory = ProjectCategory::find($id);

        return view('project_category.edit', compact('projectCategory'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required'
        ]);

        $projectCategory = ProjectCategory::find($id);
        $projectCategory->name = $request->name;
        $projectCategory->save();

        return redirect()->route('project_category.index')->with('success', 'Project category has been updated successfully');
    }

    public function delete($id) {
        $projectCategory = ProjectCategory::find($id);
        $projectCategory->delete();

        return redirect()->route('project_category.index')->with('success', 'Project category has been deleted successfully');

    }
}
