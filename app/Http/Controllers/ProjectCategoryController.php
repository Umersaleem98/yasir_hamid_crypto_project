<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProjectCategory;

class ProjectCategoryController extends Controller
{
    public function store(Request $request)
    {
        $category = new ProjectCategory();
        $category->categoryName = $request->categoryName;
        $category->save();

        return redirect()->back()->with('success', 'Category created successfully.');
    }

}
