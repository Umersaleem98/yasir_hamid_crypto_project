<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustompageController extends Controller
{
    public function acadmey_home()
    {

        return view('template.category_page');
    }

    public function SQA_type()
    {
        return view('template.sqa_screen_home');
    }


}
