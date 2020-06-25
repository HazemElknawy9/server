<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        if (Auth::check() && auth()->user()->hasRole('super_admin') || Auth::check() && auth()->user()->hasRole('admin')){
            
            $this->redirectTo = route('dashboard.welcome');
        } else {
            $this->redirectTo = route('welcome');
        }
        $this->middleware('guest')->except('logout');
    }

    protected function attemptLogin(Request $request)
    {
        return (auth()->attempt(['email' => $request->email, 'password' => $request->password, 'active' => 1]));
    }
}
