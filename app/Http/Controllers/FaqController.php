<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Faq;
class FaqController extends Controller
{
    public function faqs()
    {
    	$faqs = Faq::all();
        return view('faqs',compact('faqs'));
    }// end of index

}//end of controller
