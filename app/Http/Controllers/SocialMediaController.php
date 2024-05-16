<?php

namespace App\Http\Controllers;

use App\Models\SocialMedia;
use Illuminate\Http\Request;

class SocialMediaController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'social_media_name' => 'required|string|max:255',
            // Add validation rules for other fields as needed
        ]);

        SocialMedia::create($validatedData);

        return redirect()->back()->with('success', 'Social media added successfully');
    }

    public function list()
    {
        $socialmedia = SocialMedia::all();
        return view('layouts.socialmedia.list', compact('socialmedia'));
    }

    public function edit($id)
    {
        $socialmedia = SocialMedia::find($id);
        return view('layouts.socialmedia.edit',compact('socialmedia'));
    }

    public function update(Request $request, $id)
{
    $socialmedia = SocialMedia::find($id);

    if ($socialmedia) {
        $socialmedia->social_media_name = $request->social_media_name;
        $socialmedia->save();

        // Flash a success message to the session
        return redirect()->back()->with('success', 'social_media updated successfully!');
    } else {
        // Flash an error message to the session
        return redirect()->back()->with('error', 'social_media not found!');
    }
}

public function delete($id)
{
    // Find the TakenStandard record by ID
    $socialmedia = SocialMedia::find($id);

    // Check if the record exists
    if ($socialmedia) {
        // Delete the record
        $socialmedia->delete();

        // Flash a success message to the session
        return redirect()->back()->with('success', 'Socaial media deleted successfully!');
    } else {
        // Flash an error message to the session
        return redirect()->back()->with('error', 'Socaial media not found!');
    }
}
}
