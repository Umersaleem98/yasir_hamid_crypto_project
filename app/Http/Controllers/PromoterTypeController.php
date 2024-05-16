<?php

namespace App\Http\Controllers;

use App\Models\PromoterType;
use Illuminate\Http\Request;

class PromoterTypeController extends Controller
{
    //
    public function store(Request $request)
    {
        $PromoterType = new PromoterType;
        $PromoterType->name=$request->name;
        $PromoterType->save();

        return redirect()->back()->with('success', 'Promoter Type added successfully');
    }

    public function list()
    {
        $PromoterType = PromoterType::all();
        return view('layouts.PromoterType.list', compact('PromoterType'));
    }

    public function edit($id)
    {
        $PromoterType = PromoterType::find($id);
        return view('layouts.PromoterType.edit', compact('PromoterType'));
    }


    public function update(Request $request, $id)
{
    $PromoterType = PromoterType::find($id);

    if ($PromoterType) {
        $PromoterType->name = $request->name;
        $PromoterType->save();

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
    $PromoterType = PromoterType::find($id);

    // Check if the record exists
    if ($PromoterType) {
        // Delete the record
        $PromoterType->delete();

        // Flash a success message to the session
        return redirect()->back()->with('success', 'TakenStandard deleted successfully!');
    } else {
        // Flash an error message to the session
        return redirect()->back()->with('error', 'TakenStandard not found!');
    }
}

}
