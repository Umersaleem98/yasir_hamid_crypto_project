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

    public function project_type_list()
    {
        $projecttype = ProjectType::paginate(5); // Change 10 to the number of items per page you want

        return view('layouts.projecttype.list', compact('projecttype'));
    }


    public function edit($id)
{
    $projectType = ProjectType::find($id);
    return view('layouts.projecttype.edit', compact('projectType'));
}

public function update(Request $request, $id)
{
    $projecttype = ProjectType::paginate(5);
    $projectType = ProjectType::find($id);
    $projectType->categoryName = $request->categoryName; // Assuming 'categoryName' is the field to update
    $projectType->save();
    // return redirect()->route('project_type_list')->with('success', 'Project type updated successfully');
    return view('layouts.projecttype.list', compact('projecttype'));
}

public function destroy($id)
{

    $projectType = ProjectType::find($id);
    $projectType->delete();
    return redirect()->back()->with('success', 'Project type deleted successfully');
}

}
