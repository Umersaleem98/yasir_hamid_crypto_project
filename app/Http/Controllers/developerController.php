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
        return redirect()->back()->with('success', 'Blockchain platform added successfully.');
}

public function list()
{
    $developers = Developer::all();
    return view('layouts.developers.list', compact('developers'));
}
public function edit($id)
{
    $developers = Developer::find($id);
    return view('layouts.developers.edit', compact('developers'));
}

public function update(Request $request, $id)
{
    $developers = Developer::find($id);
    $developers->name=$request->name;
    $developers->website_url=$request->website_url;
    $developers->github_url=$request->github_url;
    $developers->social_media=$request->social_media;
    $developers->comments=$request->comments;
    $developers->save();
    return redirect()->back()->with('success', 'developers Update successfully.');
}

public function delete($id)
{
    // Find the TakenStandard record by ID
    $developers = Developer::find($id);

    // Check if the record exists
    if ($developers) {
        // Delete the record
        $developers->delete();

        // Flash a success message to the session
        return redirect()->back()->with('success', 'developers deleted successfully!');
    } else {
        // Flash an error message to the session
        return redirect()->back()->with('error', 'developers not found!');
    }
}
}
