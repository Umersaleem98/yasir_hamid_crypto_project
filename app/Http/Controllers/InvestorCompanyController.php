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

}
