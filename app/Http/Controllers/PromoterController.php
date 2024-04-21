<?php

namespace App\Http\Controllers;

use App\Models\Promoter;
use Illuminate\Http\Request;

class PromoterController extends Controller
{
    //

    public function store(Request $request)
    {

        $promoters = new Promoter;
        $promoters->name=$request->name;
        $promoters->type=$request->type;
        $promoters->wallets=$request->wallets;
        $promoters->comments=$request->comments;
        $promoters->save();


        return redirect()->back()->with('success', 'Promoter added successfully');
    }
}
