<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PrivateInvestor;

class PrivateInvestorController extends Controller
{
    public function store(Request $request)
    {

        $promoters = new PrivateInvestor;
        $promoters->name=$request->name;
        $promoters->company_name=$request->company_name;
        $promoters->social_media=$request->social_media;
        $promoters->comments=$request->comments;
        $promoters->save();


        return redirect()->back()->with('success', 'Private Investor added successfully');

    }
}
