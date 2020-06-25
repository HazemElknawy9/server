<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\User;
use Auth;
use Illuminate\Http\Request;
use App\Notifications\OrderStatusChanged;
use Illuminate\Support\Facades\Notification;

class ProfileController extends Controller
{
    public function profile(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            $user = Auth::user();   
            $request->validate([
                'first_name' => ['required', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
                'email' => 'required|email|unique:users,email,' . $user->id,
                //'phone' => ['required', Rule::unique('users')->ignore($user->id),],
                'date_birth' => 'required',
                'governrate' => 'required',
                'city' => 'required',
                'address' => 'required',
                'channel_promote' => 'required',
                'website' => 'required',
            ]);
            if(empty($data['mail_order_changed'])){
                $data['mail_order_changed']='0';
            }
            if(empty($data['sms_order_changed'])){
                $data['sms_order_changed']='0';
            }
            if(empty($data['mail_data_changed'])){
                $data['mail_data_changed']='0';
            }
            if(empty($data['mail_weekly'])){
                $data['mail_weekly']='0';
            }
            $user->update($data);
            if ($user->email !== $user->history_email) {
                $user->update([
                    'email_verified_at' => null
                ]);
            }

            if ($user->phone !== $user->history_phone) {
                $user->update([
                    'active' => null,
                    'code' => rand(11111,99999)
                ]);
                return redirect('active/account');
            }

            $userssend = User::all();
            foreach ($userssend as $userssen)
            {
                Notification::route('mail',$userssen->email)
                    ->notify(new OrderStatusChanged($user));
            }
            return redirect()->back()->with('flash_message_success','Updated Successfully');
        }
        return view('profiles');
    }
    
   
    public function chkPassword(Request $request){
        $data = $request->all();
        $current_password = $data['current_pwd'];

        $check_password =User::where(['email'=> Auth::user()->email])->first();
        if(Hash::check($current_password,$check_password->password)){
            echo "true"; die;
        }else {
            echo "false"; die;
        }
    }

    public function updatePassword(Request $request){
        if ($request->isMethod('post')) {
            $data = $request->all();
           // echo "<pre>"; print_r($data); die;
            $request->validate([
            'new_pwd' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6'
          ]);

            $check_password =User::where(['email'=> Auth::user()->email])->first();
            $current_password= $data['current_pwd'];
            if (Hash::check($current_password, $check_password->password)) {
                $password=bcrypt($data['new_pwd']);
                User::where('id',$check_password->id)->update(['password'=>$password]);
                return redirect()->back()->with('flash_message_success','Password Updated Successfully'); 
            }else{
                return redirect()->back()->with('flash_message_error','Password Updated Failed'); 
            }
        }
    }

}//end of controller
