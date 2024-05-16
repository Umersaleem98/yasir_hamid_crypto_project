<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PrivateInvestor;

class PrivateInvestorController extends Controller
{
    public function store(Request $request)
    {

        $PrivateInvestors = new PrivateInvestor;
        $PrivateInvestors->name=$request->name;
        $PrivateInvestors->company_name=$request->company_name;
        $PrivateInvestors->social_media=$request->social_media;
        $PrivateInvestors->comments=$request->comments;
        $PrivateInvestors->save();


        return redirect()->back()->with('success', 'Private Investor added successfully');

    }

    public function list()
    {
        $PrivateInvestors = PrivateInvestor::all();
        return view('layouts.PrivateInvestors.list', compact('PrivateInvestors'));
    }
    public function edit($id)
    {
        $PrivateInvestors = PrivateInvestor::find($id);
        return view('layouts.PrivateInvestors.edit', compact('PrivateInvestors'));
    }

    public function update(Request $request, $id)
    {
        $PrivateInvestors = PrivateInvestor::find($id);
        $PrivateInvestors->name=$request->name;
        $PrivateInvestors->company_name=$request->company_name;
        $PrivateInvestors->social_media=$request->social_media;
        $PrivateInvestors->comments=$request->comments;
        $PrivateInvestors->save();
        return redirect()->back()->with('success', 'PrivateInvestors Update successfully.');
    }

    public function delete($id)
    {
        // Find the TakenStandard record by ID
        $PrivateInvestors = PrivateInvestor::find($id);

        // Check if the record exists
        if ($PrivateInvestors) {
            // Delete the record
            $PrivateInvestors->delete();

            // Flash a success message to the session
            return redirect()->back()->with('success', 'PrivateInvestors deleted successfully!');
        } else {
            // Flash an error message to the session
            return redirect()->back()->with('error', 'PrivateInvestors not found!');
        }
    }
}
