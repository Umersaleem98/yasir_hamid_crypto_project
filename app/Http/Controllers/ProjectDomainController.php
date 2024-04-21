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
}
