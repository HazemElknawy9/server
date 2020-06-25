<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use App\User;
use Auth;
use Illuminate\Http\Request;


class ProfileController extends Controller
{
    public function profile(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            $user = Auth::user();   
            $request->validate([
                //'first_name' => ['required', 'string', 'max:255'],
                //'email' => 'required|email|unique:users,email,' . $user->id,
                //'phone' => ['required', Rule::unique('users')->ignore($user->id),],
            ]);
            if ($request->image) {
            $user = User::findOrFail($user->id);
            if ($user->image != 'default.png') {

                Storage::disk('local')->delete('public/vendor_profile/' . $user->image);
            }//end of inner if
            $image = Image::make($request->image)
                ->encode('jpg', 50);
            Storage::disk('local')->put('public/vendor_profile/' . $request->image->hashName(), (string)$image, 'public');
            $data['image'] = $request->image->hashName();
        } 
            //return $data;
            $user->update($data);
            session()->flash('success', __('site.updated_successfully'));
            return redirect()->back();
        }
        return view('dashboard.profiles.edit');
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
                session()->flash('success', __('site.updated_successfully'));
                return redirect()->back();  
            }else{
                session()->flash('error', __('site.updated_failed'));
                return redirect()->back();
            }
        }
    }

}//end of controller
