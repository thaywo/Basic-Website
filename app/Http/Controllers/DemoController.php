<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DemoController extends Controller
{
    //
    public function thaywo(){
        return view('thaywo');
    }

    public function contact(){
        return view('contact');
    }

}
