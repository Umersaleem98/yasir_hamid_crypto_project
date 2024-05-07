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

}
