<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
         if (Auth::check() && auth()->user()->hasRole('super_admin') || Auth::check() && auth()->user()->hasRole('admin'))
        {
            $this->redirectTo = route('dashboard.welcome');
        } else {
            $this->redirectTo = route('welcome');
        }
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email'      => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone'      => 'required|unique:users|digits:11',
            'date_birth' => 'required',
            'governrate' => 'required',
            'city' => 'required',
            'address' => 'required',
            'password'   => ['required', 'string', 'min:8', 'confirmed'],
            'channel_promote' => 'required',
            'website' => 'required',
            'terms' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        //dd($data);
        $user = User::create([
            'title' => $data['title'],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'date_birth' => $data['date_birth'],
            'governrate' => $data['governrate'],
            'city' => $data['city'],
            'address' => $data['address'],
            'password' => Hash::make($data['password']),
            'channel_promote' => $data['channel_promote'],
            'website' => $data['website'],
            'terms' => $data['terms'],
            'code' => rand(11111,99999),
            'number_id'=> rand(111111,999999),
            'history_email' => $data['email'],
            'history_phone' => $data['phone'],
        ]);
        $user->attachRole($data['role']);

        $phone = $user->phone;
        $message = $user->code;
        $sendSms = file_get_contents('https://dashboard.mobile-sms.com/api/sms/send?api_key=N1kxRFJiaUhQQWtnekxwUGt6RGxwWFh0dVlXTjNZUWVPeEtYREhLdE5SbDVhRkhJUVJGRVdnSVBTWTVx5eb3d8805bcc8&name=HomeFix&message='.$message.'&numbers='.$phone.'&sender=HomeFix+App&language=en');

        return $user;
    }
}
