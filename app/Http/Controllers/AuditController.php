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

        return redirect()->back()->with('success', 'Audit added successfully.');
    }
}
