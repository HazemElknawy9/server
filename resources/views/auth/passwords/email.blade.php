@extends('layouts.front.app')
@section('title','Rest Password')


@section('content')

 <div class="compount-about component-login">
          <div class="component-form">
            <h6 class="text-login">Rest Password</h6>
            <p>Enter Your Email to rest password</p>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <form class="form-register" method="POST" action="{{ route('password.email') }}">
            @csrf
              <div class="form-group ">
                <label for="inputEmail4">Email or Phone Number<span class="content-sl-span"> ( Required )</span></label>
                <input id="email" type="email" class="form-control placeholder-no-fix {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required  placeholder="Email or Phone">
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
              </div>
             
              
              <div class="form-group link-register2">
                <button type="submit" class="btn green pull-right"> Rest </button>
                
              </div>
              
            </form>
           </div>

        </div>
@endsection
