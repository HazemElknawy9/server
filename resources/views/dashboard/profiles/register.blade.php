@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div style="text-align: center;font-size: 37px;font-weight: bold;" class="card-header">Dashboard {{ __('Basic Information') }}</div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <input type="hidden" name="role" value="admin">
                        <div class="form-group row">

                            <div class="col-md-2">
                               <label for="name" class="col-form-label text-md-right">{{ __('Title') }}</label>
                                <select id="title" name="title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" value="{{ old('title') }}" autofocus>
                                    <option value="Mr">Mr</option>
                                    <option value="Mrs">Mrs</option>
                                    <option value="Miss">Miss</option>
                                </select>

                                @if ($errors->has('title'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-5">
                                <label for="first_name" class="col-form-label text-md-right">{{ __('First Name (Required)') }}</label>
                                <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ old('first_name') }}" placeholder="First Name" required autofocus>

                                @if ($errors->has('first_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-5">
                            <label for="last_name" class="col-form-label text-md-right">{{ __('Last Name (Required)') }}</label>
                                <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}" placeholder="Last Name" required autofocus>

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
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-6">
                            <label for="phone" class="col-form-label text-md-right">{{ __('Phone (Required)') }}</label>
                                <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" placeholder="Phone" required autofocus>

                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                               <label for="date_birth" class="col-form-label text-md-right">{{ __('Date Of Birth (Required)') }}</label>
                               <input autocomplete="off" id="date_birth" type="date" class="form-control placeholder-no-fix{{ $errors->has('date_birth') ? ' is-invalid' : '' }}" name="date_birth" value="{{ old('date_birth') }}" required autofocus/>

                                @if ($errors->has('date_birth'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('date_birth') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="governrate" class="col-form-label text-md-right">{{ __('Governrate (Required)') }}</label>
                                <select name="governrate" class="form-control" required autofocus>
                                    <option value="Gharbia">Gharbia</option>
                                    <option value="Dakahlia">Dakahlia</option>
                                    <option value="Sharqiya">Sharqiya</option>
                                    <option value="Cairo">Cairo</option>
                                    <option value="Alexandria">Alexandria</option>
                                </select>

                                @if ($errors->has('governrate'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('governrate') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-6">
                            <label for="city" class="col-form-label text-md-right">{{ __('City (Required)') }}</label>
                                <input id="city" type="text" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" value="{{ old('city') }}" placeholder="city" required autofocus>

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
                               <input autocomplete="off" id="address" type="text" class="form-control placeholder-no-fix{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" required autofocus/>

                                @if ($errors->has('address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="password" class="col-form-label text-md-right">{{ __('Password (Required)') }}</label>
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <label for="password-confirm" class="col-form-label text-md-right">{{ __('Confirm Password (Required)') }}</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="card">
                            <div style="text-align: center; font-weight: bold;font-size: 20px;" class="card-header">{{ __('Business Setup') }}</div>

                            <div class="card-body">
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="channel_promote" class="col-form-label text-md-right">{{ __('How Will You Promote Ibuy Product ?') }}</label>
                                        <select name="channel_promote" class="form-control" required autofocus>
                                            <option value="Website">Website</option>
                                            <option value="facebook">facebook</option>
                                            <option value="Twitter">Twitter</option>
                                            <option value="instgram">instgram</option>
                                        </select>

                                        @if ($errors->has('channel_promote'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('channel_promote') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                       <label for="website" class="col-form-label text-md-right">{{ __('Website Url (Required)') }}</label>
                                       <input autocomplete="off" id="website" type="text" class="form-control placeholder-no-fix{{ $errors->has('website') ? ' is-invalid' : '' }}" name="website" value="{{ old('website') }}" required autofocus/>

                                        @if ($errors->has('website'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('website') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                       <div class="form-check">
                                        <input type="checkbox" name="terms" value="1" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">I agree to the affiliates Program <strong>Terms & Conditions</strong></label>
                                      </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
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
