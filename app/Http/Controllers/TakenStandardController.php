<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TakenStandard;

class TakenStandardController extends Controller
{
    //
    public function store(Request $request)
    {
        $takenStandard = new TakenStandard;
        $takenStandard->name = $request->name;
        $takenStandard->save();
        return redirect()->back()->with('success', 'Taken Standard created successfully.');
    }

    public function list()
    {
        $taken_standard = TakenStandard::all();
        return view('layouts.taken_standard.list', compact('taken_standard'));
    }

    public function edit($id)
    {
        $taken_standard = TakenStandard::find($id);
        return view('layouts.taken_standard.edit', compact('taken_standard'));
    }


    public function update(Request $request, $id)
{
    $taken_standard = TakenStandard::find($id);

    if ($taken_standard) {
        $taken_standard->name = $request->name;
        $taken_standard->save();

        // Flash a success message to the session
        return redirect()->back()->with('success', 'TakenStandard updated successfully!');
    } else {
        // Flash an error message to the session
        return redirect()->back()->with('error', 'TakenStandard not found!');
    }
}

public function delete($id)
{
    // Find the TakenStandard record by ID
    $taken_standard = TakenStandard::find($id);

    // Check if the record exists
    if ($taken_standard) {
        // Delete the record
        $taken_standard->delete();

        // Flash a success message to the session
        return redirect()->back()->with('success', 'TakenStandard deleted successfully!');
    } else {
        // Flash an error message to the session
        return redirect()->back()->with('error', 'TakenStandard not found!');
    }
}

}
