<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view("index");
    }

    public function manage_project_home()
    {
        $projects = Project::all();
        return view('template.manage_project_home', compact('projects'));
    }

    public function preview_project_home($id)
    {
        $projects = Project::find($id);

    // Check if the project exists
    if (!$projects) {
        abort(404); // Project not found, return 404 error
    }
        return view('template.preview_project_home', ['projects' => $projects]);
    }
}
