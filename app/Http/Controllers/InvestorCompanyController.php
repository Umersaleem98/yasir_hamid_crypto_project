<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InvestorCompany;

class InvestorCompanyController extends Controller
{

    public function store(Request $request)
    {

        $InvestorCompanies = new InvestorCompany;
        $InvestorCompanies->name=$request->name;
        $InvestorCompanies->url=$request->url;
        $InvestorCompanies->social_media=$request->social_media;
        $InvestorCompanies->comments=$request->comments;
        $InvestorCompanies->save();


        return redirect()->back()->with('success', 'Investor Companies added successfully');
}
public function list()
{
    $InvestorCompanies = InvestorCompany::all();
    return view('layouts.InvestorCompanies.list', compact('InvestorCompanies'));
}
public function edit($id)
{
    $InvestorCompanies = InvestorCompany::find($id);
    return view('layouts.InvestorCompanies.edit', compact('InvestorCompanies'));
}

public function update(Request $request, $id)
{
        $InvestorCompanies = InvestorCompany::find($id);
        $InvestorCompanies->name=$request->name;
        $InvestorCompanies->url=$request->url;
        $InvestorCompanies->social_media=$request->social_media;
        $InvestorCompanies->comments=$request->comments;
        $InvestorCompanies->save();
    return redirect()->back()->with('success', 'InvestorCompanies Update successfully.');
}

public function delete($id)
{
    // Find the TakenStandard record by ID
    $InvestorCompanies = InvestorCompany::find($id);

    // Check if the record exists
    if ($InvestorCompanies) {
        // Delete the record
        $InvestorCompanies->delete();

        // Flash a success message to the session
        return redirect()->back()->with('success', 'InvestorCompanies deleted successfully!');
    } else {
        // Flash an error message to the session
        return redirect()->back()->with('error', 'InvestorCompanies not found!');
    }
}

}
