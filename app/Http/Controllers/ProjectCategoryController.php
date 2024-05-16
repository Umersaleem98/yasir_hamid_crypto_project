<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProjectCategory;

class ProjectCategoryController extends Controller
{
    public function store(Request $request)
    {
        $project_category = new ProjectCategory();
        $project_category->project_category = $request->project_category;
        $project_category->save();

        return redirect()->back()->with('success', 'Category created successfully.');
    }

    public function project_category_list()
    {
        $project_category= ProjectCategory::all();

        return view('layouts.project_category.list', compact('project_category'));

    }

    public function edit($id)
    {
        $project_category = ProjectCategory::find($id);
        return view('layouts.project_category.edit', compact('project_category'));
    }

            public function update(Request $request, $id)
        {
            $project_category = ProjectCategory::paginate(5);
            $project_category = ProjectCategory::find($id);
            $project_category->project_category = $request->project_category; // Assuming 'categoryName' is the field to update
            $project_category->save();
            return redirect()->back();
        }

        public function delete($id)
        {
            $project_category = ProjectCategory::find($id);
            $project_category->delete();

            return redirect()->back()->with('success', 'Category deleted successfully!');
        }

}
