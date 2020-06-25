@extends('layouts.front.app')
@section('title','Login')


@section('content')

 <div class="compount-about component-login">
 @if(Session::has('flash_message_error'))
      <div class="alert alert-error alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button> 
              <strong>{!! session('flash_message_error') !!}</strong>
      </div>
  @endif   
  @if(Session::has('flash_message_success'))
      <div class="alert alert-success alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button> 
              <strong>{!! session('flash_message_success') !!}</strong>
      </div>
  @endif 
          <div class="component-form">
            <h6 class="text-login">Login </h6>
            <form class="form-register" method="POST" action="{{ url('/affiliates-login')}}">
            @csrf
              <div class="form-group ">
                <label for="email">Email or Phone Number<span class="content-sl-span"> ( Required )</span></label>
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder="Email or Phone">
                @if ($errors->has('email'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                  </span>
                @endif
              </div>
              <div class="form-group ">
                <label for="password">Password <span class="content-sl-span"> ( Required )</span></label>
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Password">
                @if ($errors->has('password'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                  </span>
                @endif
              </div>
              <div class="form-group ">
                <a class="from-forgot" href="{{ route('password.request') }}">Forgot password</a>
              </div>
              
              <!-- <div class="form-group link-register2">
                <a class="" href="Landing Page login  .html"> login </a>
                
              </div> -->
              <button type="submit" class="form-group link-register2">
                  login
              </button>
              <div class="form-group text-center">
                <span class="quection">You don't have account?</span>
                <a class="perg-span span-link-register" href="{{asset(url('/register'))}}">Register</a>
              </div>
              <div  class="form-group text-center">
                <p>
                  By login, you agree to the <span class="perg-span-2">Terms of Use</span> and <span class="perg-span-2">   Privacy Policy</span>

                </p>
             </div>
            </form>
           </div>

        </div>
@endsection
