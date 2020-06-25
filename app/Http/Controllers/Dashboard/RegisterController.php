<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\User;
use Auth;
use Illuminate\Http\Request;


class RegisterController extends Controller
{
    public function showRegistrationForm(Request $request)
    {
        
        return view('dashboard.profiles.register');
    }
    
   
   

}//end of controller
