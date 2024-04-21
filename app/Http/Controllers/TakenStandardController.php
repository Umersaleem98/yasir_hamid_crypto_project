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
        $takenStandard->name = $request->neme;
        return redirect()->back()->with('success', 'Taken Standard created successfully.');
    }
}
