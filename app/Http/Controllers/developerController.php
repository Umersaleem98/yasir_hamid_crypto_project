<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use Illuminate\Http\Request;

class developerController extends Controller
{

    public function store(Request $request)
    {
        $developers = new Developer;
        $developers->name=$request->name;
        $developers->website_url=$request->website_url;
        $developers->github_url=$request->github_url;
        $developers->social_media=$request->social_media;
        $developers->comments=$request->comments;
        $developers->save();


        return redirect()->back()->with('success', 'Company added successfully');
}
}
