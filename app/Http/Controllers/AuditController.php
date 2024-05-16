<?php

namespace App\Http\Controllers;

use App\Models\Audit;
use Illuminate\Http\Request;

class AuditController extends Controller
{
    public function store(Request $request)
    {

        $audits = new Audit;
        $audits->audits_name = $request->audits_name;
        $audits->save();

        return redirect()->back()->with('success', 'Audit added successfully.');
    }

    public function list()
    {
        $audits = Audit::all();
        return view('layouts.audit.list', compact('audits'));
    }

    public function edit($id)
    {
        $audits = Audit::find($id);

        return view('layouts.audit.edit', compact('audits'));
    }

    public function update(Request $request, $id)
{
    $audits = Audit::find($id);

    if ($audits) {
        $audits->audits_name = $request->audits_name;
        $audits->save();

        // Flash a success message to the session
        return redirect()->back()->with('success', 'audit updated successfully!');
    } else {
        // Flash an error message to the session
        return redirect()->back()->with('error', 'audit not found!');
    }
}

public function delete($id)
{
    // Find the TakenStandard record by ID
    $audits = Audit::find($id);

    // Check if the record exists
    if ($audits) {
        // Delete the record
        $audits->delete();

        // Flash a success message to the session
        return redirect()->back()->with('success', 'TakenStandard deleted successfully!');
    } else {
        // Flash an error message to the session
        return redirect()->back()->with('error', 'TakenStandard not found!');
    }
}

}
