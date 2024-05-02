<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class CustompageController extends Controller
{
    public function acadmey_home()
    {
        $category = Category::all();


        return view('template.category_page', compact('category'));
    }

    public function SQA_type()
    {
        return view('template.sqa_screen_home');
    }


    public function Guide_screen()
    {
        return view('template.guide_screen');
    }


}
