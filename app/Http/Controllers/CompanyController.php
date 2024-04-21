<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    //
    public function store(Request $request)
    {
        $companies = new Company;
        $companies->name=$request->name;
        $companies->website_url=$request->website_url;
        $companies->github_url=$request->github_url;
        $companies->social_media=$request->social_media;
        $companies->comments=$request->comments;
        $companies->save();


        return redirect()->back()->with('success', 'Company added successfully');
    }
}
