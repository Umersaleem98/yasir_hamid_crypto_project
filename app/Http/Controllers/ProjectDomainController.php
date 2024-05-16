<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProjectDomain;

class ProjectDomainController extends Controller
{
    //
    public function store(Request $request)
    {
        // $validatedData = $request->validate([
        //     'domainName' => 'required|string|max:255',
        // ]);

        // ProjectDomain::create($validatedData);

        $projectDomains = new ProjectDomain;
        $projectDomains->domainName = $request->domainName;
        $projectDomains->save();



        return redirect()->back()
            ->with('success', 'Project domain created successfully.');
    }

    public function list()
{
    $project_domain = ProjectDomain::paginate(5);
    return view('layouts.project_domain.list', compact('project_domain'));
}

public function edit($id)
{
    $project_domain = ProjectDomain::find($id);

    return view('layouts.project_domain.edit', compact('project_domain'));

}

public function update(Request $request, $id)
{
    $project_domain = ProjectDomain::paginate(5);
    $project_domain = ProjectDomain::find($id);
    $project_domain->domainName = $request->domainName; // Assuming 'categoryName' is the field to update
    $project_domain->save();
    return redirect()->back();
}

public function delete($id)
{
    $project_domain = ProjectDomain::find($id);
    $project_domain->delete();

    return redirect()->back()->with('success', 'Category deleted successfully!');
}
}
