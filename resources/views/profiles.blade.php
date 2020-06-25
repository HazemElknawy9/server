@extends('layouts.app')

@section('content')
<div class="container">
    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
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
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div style="text-align: center; font-weight: bold;font-size: 20px;" class="card-header">{{ __('Profile') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ url(App::getLocale().'/profile') }}">
                        @csrf

                        <div class="form-group row">

                            <div class="col-md-2">
                               <label for="name" class="col-form-label text-md-right">{{ __('Title') }}</label>
                                <select id="title" name="title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" value="{{ old('title') }}" autofocus>
                                    <option value="Mr" {{ auth()->user()->title == 'Mr' ? 'selected' : '' }} >Mr</option>
                                    <option value="Mrs" {{ auth()->user()->title == 'Mrs' ? 'selected' : '' }}>Mrs</option>
                                    <option value="Miss" {{ auth()->user()->title == 'Miss' ? 'selected' : '' }}>Miss</option>
                                </select>

                                @if ($errors->has('title'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-5">
                                <label for="first_name" class="col-form-label text-md-right">{{ __('First Name (Required)') }}</label>
                                <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ auth()->user()->first_name }}" placeholder="First Name" required autofocus>

                                @if ($errors->has('first_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-5">
                            <label for="last_name" class="col-form-label text-md-right">{{ __('Last Name (Required)') }}</label>
                                <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ auth()->user()->last_name }}" placeholder="Last Name" required autofocus>

                                @if ($errors->has('last_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="email" class="col-form-label text-md-right">{{ __('E-Mail (Required)') }}</label>
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ auth()->user()->email }}" placeholder="Email" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-6">
                            <label for="phone" class="col-form-label text-md-right">{{ __('Phone (Required)') }}</label>
                                <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ auth()->user()->phone }}" placeholder="Phone" required autofocus>

                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                               <label for="date_birth" class="col-form-label text-md-right">{{ __('Date Of Birth (Required)') }}</label>
                               <input autocomplete="off" id="date_birth" type="date" class="form-control placeholder-no-fix{{ $errors->has('date_birth') ? ' is-invalid' : '' }}" name="date_birth" value="{{ auth()->user()->date_birth }}" required autofocus/>

                                @if ($errors->has('date_birth'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('date_birth') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-6">
                               <label for="postal_code" class="col-form-label text-md-right">{{ __('Postal Code (Required)') }}</label>
                               <input id="postal_code" type="text" class="form-control placeholder-no-fix{{ $errors->has('postal_code') ? ' is-invalid' : '' }}" name="postal_code" value="{{ auth()->user()->postal_code }}" autofocus/>

                                @if ($errors->has('postal_code'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('postal_code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="governrate" class="col-form-label text-md-right">{{ __('Governrate (Required)') }}</label>
                                <select name="governrate" class="form-control" required autofocus>
                                    <option value="Gharbia" {{ auth()->user()->governrate == 'Gharbia' ? 'selected' : '' }}>Gharbia</option>
                                    <option value="Dakahlia" {{ auth()->user()->governrate == 'Dakahlia' ? 'selected' : '' }}>Dakahlia</option>
                                    <option value="Sharqiya" {{ auth()->user()->governrate == 'Sharqiya' ? 'selected' : '' }}>Sharqiya</option>
                                    <option value="Cairo" {{ auth()->user()->governrate == 'Cairo' ? 'selected' : '' }}>Cairo</option>
                                    <option value="Alexandria" {{ auth()->user()->governrate == 'Alexandria' ? 'selected' : '' }}>Alexandria</option>
                                </select>

                                @if ($errors->has('governrate'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('governrate') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-6">
                            <label for="city" class="col-form-label text-md-right">{{ __('City (Required)') }}</label>
                                <input id="city" type="text" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" value="{{ auth()->user()->city }}" placeholder="city" required autofocus>

                                @if ($errors->has('city'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                               <label for="address" class="col-form-label text-md-right">{{ __('Address (Required)') }}</label>
                               <input autocomplete="off" id="address" type="text" class="form-control placeholder-no-fix{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ auth()->user()->address }}" required autofocus/>

                                @if ($errors->has('address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="channel_promote" class="col-form-label text-md-right">{{ __('How Will You Promote Ibuy Product ?') }}</label>
                                <select name="channel_promote" class="form-control" required autofocus>
                                    <option value="Website" {{ auth()->user()->channel_promote == 'Website' ? 'selected' : '' }}>Website</option>
                                    <option value="facebook" {{ auth()->user()->channel_promote == 'facebook' ? 'selected' : '' }}>facebook</option>
                                    <option value="Twitter" {{ auth()->user()->channel_promote == 'Twitter' ? 'selected' : '' }}>Twitter</option>
                                    <option value="instgram" {{ auth()->user()->channel_promote == 'instgram' ? 'selected' : '' }}>instgram</option>
                                </select>

                                @if ($errors->has('channel_promote'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('channel_promote') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-6">
                               <label for="website" class="col-form-label text-md-right">{{ __('Website Url (Required)') }}</label>
                               <input autocomplete="off" id="website" type="text" class="form-control placeholder-no-fix{{ $errors->has('website') ? ' is-invalid' : '' }}" name="website" value="{{ auth()->user()->website }}" required autofocus/>

                                @if ($errors->has('website'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('website') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="card">
                            <div style="text-align: center; font-weight: bold;font-size: 20px;" class="card-header">{{ __('Setting') }}</div>
                            <div class="card-body">
                            <h2>Notification</h2>
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                           <label class="switch">
                                              <input type="checkbox" name="mail_order_changed" value="1" {{ auth()->user()->mail_order_changed == '1' ? 'checked' : '' }} >
                                              <span class="slider round"></span>
                                            </label>  
                                            Send Mail When Order Status Changed .                       
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                           <label class="switch">
                                              <input type="checkbox" name="sms_order_changed" value="1" {{ auth()->user()->sms_order_changed == '1' ? 'checked' : '' }} >
                                              <span class="slider round"></span>
                                            </label>  
                                            Send SMS When Order Status Changed .                       
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                           <label class="switch">
                                              <input type="checkbox" name="mail_data_changed" value="1" {{ auth()->user()->mail_data_changed == '1' ? 'checked' : '' }}>
                                              <span class="slider round"></span>
                                            </label>  
                                            Send Mail When My Data Changed .                       
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                           <label class="switch">
                                              <input type="checkbox" name="mail_weekly" value="1" {{ auth()->user()->mail_weekly == '1' ? 'checked' : '' }}>
                                              <span class="slider round"></span>
                                            </label>  
                                            Send Mail To Me Weekly .                       
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div style="text-align: center; font-weight: bold;font-size: 20px;" class="card-header">{{ __('Change Password') }}</div>
                <div class="card-body">
                    <form action="{{ url(App::getLocale().'/admin/update-pwd')}}" method="post">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-12">
                               <label for="address" class="col-form-label text-md-right">{{ __('Current Password (Required)') }}</label>
                               <input type="password" name="current_pwd" id="current_pwd" class="form-control placeholder-no-fix{{ $errors->has('address') ? ' is-invalid' : '' }}" required autofocus/>
                               <span id="chkPwd"></span>
                                @if ($errors->has('address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                               <label for="address" class="col-form-label text-md-right">{{ __('New Password (Required)') }}</label>
                               <input  type="password" name="new_pwd" id="new_pwd" class="form-control placeholder-no-fix{{ $errors->has('address') ? ' is-invalid' : '' }}" required/>

                                @if ($errors->has('address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                               <label for="address" class="col-form-label text-md-right">{{ __('Confirm New Password (Required)') }}</label>
                               <input  type="password" name="password_confirmation" id="password_confirmation" class="form-control placeholder-no-fix{{ $errors->has('address') ? ' is-invalid' : '' }}" required/>

                                @if ($errors->has('address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
