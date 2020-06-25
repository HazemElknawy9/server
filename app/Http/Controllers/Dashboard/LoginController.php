<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Session;

class LoginController extends Controller
{
    public function showLoginForm(Request $request)
    {
        
        return view('dashboard.profiles.login');
    }

    public function login(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            /*echo "<pre>"; print_r($data); die;*/
            if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])){
                $userStatus = User::where('email',$data['email'])->first();
                if($userStatus->active == ''){
                    return redirect()->back()->with('flash_message_error','Your account is not activated! Please confirm your email to activate.');    
                }

                return redirect('/dashboard/welcome');
            }else{
                return redirect()->back()->with('flash_message_error','Invalid Username or Password!');
            }
        }
    }

    
	public function logout(){
	    Session::flush();
	    return redirect('dashboard/login'); 
	}   
   

}//end of controller
