@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
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
            <div class="card">
                <div class="card-header center">{{ __('Verification Account') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif
                    @if(Session::has('flash_message_error'))
                          <div style="color: white;background: red;" class="alert alert-error alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{!! session('flash_message_error') !!}</strong>
                         </div>
                      @endif

                      @if(Session::has('flash_message_success'))
                          <div style="color: white;background: green;" class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{!! session('flash_message_success') !!}</strong>
                         </div>
                    @endif

                    <p>Thank you For Registration We Send Verify Code To <strong>{{ auth()->user()->phone }}</strong></p>
                    <form class="lock-form pull-left" action="{{url('/active/account')}}" method="post">{{csrf_field()}}
                        <h4>أدخل الكود</h4>
                        <div class="form-group">
                            <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="code" name="code" /> 
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Verify</button>
                        </div>
                    </form>
                    <p>Please Go To Your SMS And Enter Code To Verify Phone Number </p>
                    <p>Not Your Phone <a href="{{ url('/register') }}">{{ __('click here Changed') }}</a>. </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
