<?php

namespace App\Http\Controllers;

use App\Models\PromoterType;
use Illuminate\Http\Request;

class ProjectTypeController extends Controller
{
    public function store(Request $request)
    {

        $InvestorCompanies = new PromoterType;
        $InvestorCompanies->name=$request->name;
        $InvestorCompanies->save();


        return redirect()->back()->with('success', 'Investor Companies added successfully');

        return redirect()->route('promoter_types.index')->with('success', 'Promoter Type added successfully');
    }
}
