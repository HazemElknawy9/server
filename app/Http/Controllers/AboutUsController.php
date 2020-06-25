<?php

namespace App\Http\Controllers;
use App\About;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function aboutUs()
    {
    	$about = About::first();
        return view('about_us',compact('about'));
    }// end of index

}//end of controller
