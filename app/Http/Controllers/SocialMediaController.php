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
}
