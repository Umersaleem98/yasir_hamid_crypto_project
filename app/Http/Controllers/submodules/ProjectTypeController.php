<?php

namespace App\Http\Controllers\submodules;

use App\Models\ProjectType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectTypeController extends Controller
{
    //

    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'categoryName' => 'required|string|max:255',
        ]);

        // Store data
        ProjectType::create([
            'categoryName' => $request->categoryName,
        ]);

        return redirect()->back()->with('success', 'Project type added successfully.');
    }
}
