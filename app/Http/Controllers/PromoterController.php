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
    public function list()
    {
        $promoters = Promoter::all();
        return view('layouts.promoters.list', compact('promoters'));
    }
    public function edit($id)
    {
        $promoters = Promoter::find($id);
        return view('layouts.promoters.edit', compact('promoters'));
    }

    public function update(Request $request, $id)
    {
        $promoters = Promoter::find($id);
        $promoters->name=$request->name;
        $promoters->type=$request->type;
        $promoters->wallets=$request->wallets;
        $promoters->comments=$request->comments;
        $promoters->save();
        return redirect()->back()->with('success', 'promoters Update successfully.');
    }

    public function delete($id)
    {
        // Find the TakenStandard record by ID
        $promoters = Promoter::find($id);

        // Check if the record exists
        if ($promoters) {
            // Delete the record
            $promoters->delete();

            // Flash a success message to the session
            return redirect()->back()->with('success', 'promoters deleted successfully!');
        } else {
            // Flash an error message to the session
            return redirect()->back()->with('error', 'promoters not found!');
        }
    }

}
