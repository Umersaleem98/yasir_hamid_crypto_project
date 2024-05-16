<?php

namespace App\Http\Controllers;

use Log;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    //
    public function store(Request $request)
    {
        // Create and save the company
        $company = new Company();
        $company->name = $request->name;
        $company->website_url = $request->website_url;
        $company->github_url = $request->github_url;
        $company->social_media = $request->social_media;
        $company->comments = $request->comments;
        $company->save();

        return redirect()->back()->with('success', 'Company created successfully!');
    }

    public function list()
    {
        $companies = Company::all();
        return view('layouts.company.list', compact('companies'));
    }
    public function edit($id)
{
    $companies = Company::find($id);
    return view('layouts.company.edit', compact('companies'));
}

public function update(Request $request, $id)
{
    $companies = Company::find($id);
    $companies->name=$request->name;
    $companies->website_url=$request->website_url;
    $companies->github_url=$request->github_url;
    $companies->social_media=$request->social_media;
    $companies->comments=$request->comments;
    $companies->save();
    return redirect()->back()->with('success', 'companies Update successfully.');
}

public function delete($id)
{
    // Find the TakenStandard record by ID
    $companies = Company::find($id);

    // Check if the record exists
    if ($companies) {
        // Delete the record
        $companies->delete();

        // Flash a success message to the session
        return redirect()->back()->with('success', 'companies deleted successfully!');
    } else {
        // Flash an error message to the session
        return redirect()->back()->with('error', 'companies not found!');
    }
}
}
