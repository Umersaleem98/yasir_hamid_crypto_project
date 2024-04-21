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
}
