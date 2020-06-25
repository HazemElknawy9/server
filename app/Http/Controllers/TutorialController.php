<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class TutorialController extends Controller
{
    public function tutorial()
    {
        return view('tutorial');
    }// end of index

}//end of controller
