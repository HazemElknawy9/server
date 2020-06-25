@extends('layouts.front.app')
@section('title','Registration')


@section('content')

  <div class="component-rigster-join">
      <div class="h-100 row">
        <div class="h-100 d-flex bg-white col-md-8 col-lg-8  creat-titke">
          <div class=" app-login-box container">
            <h6 class="had-what">Registration With ibuy Affiliate </h6>
            @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
            <div class="registra-now">
              <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                  <form id="affiliateRegister" class="form-register" method="POST" action="{{ route('register') }}">
                  @csrf
                    <input type="hidden" name="role" value="affiliate">
                    <div class="form-row">
                      <div class="form-group col-md-2">
                        <label for="title">Title</label>
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
                      <div class="form-group col-md-5">
                        <label for="first_name">First Name <span class="content-sl-span"> ( Required )</span></label>
                        <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ old('first_name') }}" required="" placeholder="First Name">
                        @if ($errors->has('first_name'))
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('first_name') }}</strong>
                          </span>
                        @endif
                      </div>
                      <div class="form-group col-md-5">
                        <label for="last_name">Last Name <span class="content-sl-span"> ( Required )</span></label>
                        <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}" required="" placeholder="Last Name">
                        @if ($errors->has('last_name'))
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('last_name') }}</strong>
                          </span>
                        @endif
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="email">Email<span class="content-sl-span"> ( Required )</span></label>
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required="" placeholder="Type Your Email">
                        @if ($errors->has('email'))
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                          </span>
                        @endif
                      </div>
                      <div class="form-group col-md-6">
                        <label for="phone">Phone <span class="content-sl-span"> ( Required )</span></label>
                        <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required="" placeholder="01000000000">
                        @if ($errors->has('phone'))
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('phone') }}</strong>
                          </span>
                        @endif
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="date_birth">Date of birth<span class="content-sl-span"> ( Required )</span></label>
                      <input id="date_birth" type="date" class="form-control placeholder-no-fix{{ $errors->has('date_birth') ? ' is-invalid' : '' }}" name="date_birth" value="{{ old('date_birth') }}" required placeholder="3-5-2020">
                      @if ($errors->has('date_birth'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('date_birth') }}</strong>
                        </span>
                      @endif
                    </div>
                    <div class="form-row">
                      
                      <div class="form-group col-md-6">
                        <label for="inputState">Governorate<span class="content-sl-span"> ( Required )</span></label>
                        <select name="governrate" class="form-control" required>
                          <option value="اسكندريه">Alexandria</option>
                        
                          <option value="القاهره الجديده وضواحى الجيزه">
                            القاهره الجديده وضواحى الجيزه
                          </option>
                        
                          <option value="قنا">
                            قنا
                          </option>
                        
                          <option value="اسوان">
                            اسوان
                          </option>
                        
                          <option value="حلوان">
                            حلوان
                          </option>
                        
                          <option value="قليوبية">
                            قليوبية
                          </option>
                        
                          <option value="دمياط">
                            دمياط
                          </option>
                        
                          <option value="البحيره">
                            البحيره
                          </option>
                        
                          <option value="بورسعيد">
                            بورسعيد
                          </option>
                        
                          <option value="بحر احمر">
                            بحر احمر 
                          </option>
                        
                          <option value="المنيا">
                            المنيا
                          </option>
                        
                          <option value="بنى سويف">
                            بنى سويف
                          </option>
                        
                          <option value="مرسي مطروح">
                            مرسي مطروح
                          </option>
                        
                          <option value="اسيوط">
                            اسيوط
                          </option>
                        
                          <option value="الفيوم">
                            الفيوم
                          </option>
                        
                          <option value="الشرقية">
                            الشرقية
                          </option>
                        
                          <option value="اسماعيليه">
                            اسماعيليه
                          </option>
                        
                          <option value="الاقصر">
                            الاقصر
                          </option>
                        
                          <option value="سوهاج">
                            سوهاج
                          </option>
                        
                          <option value="الجيزه">
                            الجيزه
                          </option>
                        
                          <option value="القليوبيه">
                            القليوبيه
                          </option>
                        
                          <option value="كفر الشيخ">
                            كفر الشيخ
                          </option>
                        
                          <option value="القاهره">
                            القاهره
                          </option>
                        
                          <option value="الغربيه">
                            الغربيه
                          </option>
                        
                          <option value="دقهليه">
                            دقهليه
                          </option>
                        
                          <option value="السويس">
                            السويس
                          </option>
                        
                          <option value="المنوفية">
                            المنوفية
                          </option>
                        </select>
                        @if ($errors->has('governrate'))
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('governrate') }}</strong>
                          </span>
                        @endif
                      </div>
                      <div class="form-group col-md-6">
                        <label for="city">City<span class="content-sl-span"> ( Required )</span></label>
                        <input id="city" type="text" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" value="{{ old('city') }}" required="">
                        @if ($errors->has('city'))
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('city') }}</strong>
                          </span>
                        @endif
                      </div>
                      
                    </div>
                    <div class="form-group">
                      <label for="address">Address<span class="content-sl-span"> ( Required )</span> </label>
                      <input id="address" type="text" class="form-control placeholder-no-fix{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" required placeholder="">
                      @if ($errors->has('address'))
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('address') }}</strong>
                        </span>
                      @endif
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="password">Password<span class="content-sl-span"> ( Required )</span></label>
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Password">
                        @if ($errors->has('password'))
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                          </span>
                        @endif
                      </div>
                      <div class="form-group col-md-6">
                        <label for="password-confirm">Confirm Password<span class="content-sl-span"> ( Required )</span></label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Confirm Password">
                      </div>
                    </div>
                    <div class="form-link">
                      <a class="nav-link btn-hader" id="v-pills-profile-tab" data-toggle="pill" 
                    href="#v-pills-profile" role="tab" 
                    aria-controls="v-pills-profile" aria-selected="false">Proceed</a>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                    <div class="form-group">
                      <label for="inputState">How will you promote ibuy product ?</label>
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
                    <div class="form-group">
                      <label for="website">Website URL<span class="content-sl-span"> ( Required )</span></label>
                      <input id="website" type="text" class="form-control placeholder-no-fix{{ $errors->has('website') ? ' is-invalid' : '' }}" name="website" value="{{ old('website') }}" required placeholder="EX : www.domane.com ">
                      @if ($errors->has('website'))
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('website') }}</strong>
                        </span>
                      @endif
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="terms" value="1" id="autoSizingCheck">
                      <label class="form-check-label" for="autoSizingCheck">
                        I agree to the ibuy affiliates Program 
                               
                        <span class="ladel-span-2">  Terms & Conditions </span>
                      </label>
                    </div>
                    <div class="form-group-l form-link">
                      <a class="nav-link btn-hader" id="v-pills-messages-tab"
                       data-toggle="pill" href="#v-pills-messages" 
                       role="tab" aria-controls="v-pills-messages"
                        aria-selected="false" onclick="event.preventDefault(); document.getElementById('affiliateRegister').submit();">Proceed</a>
                    </div>
                </form>    
                </div>
                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                   <div class="top-masseg fom-stop-2">
                    <h6 class="had-what text-center">Verification Account</h6>
                     <div class="top-masseg-conent">
                        <div class="compont-img">
                          <img src="{{asset('front_files')}}/file/masseg.png">
                        </div>
                        <div class="component-difintion-text-m">
                          <p>Thank you for Registration , We send Verify link to AhmadShami@domain.com 
                            Please go to your email inbox and verify your email.</p>
                            <p>Not your Email <a>click here </a>to changed </p>
                        </div>
                     </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div>
              </div>

            </div>
          </div>
       </div>
        <div class=" d-lg-block col-md-4 img-right">
          <div class="slick-slider">
            <div class="slick-slider slide-img-bg">
              <div class="img-2-fo">
               
              </div>
            </div>
          </div>
         
         </div>
      </div>
       
    </div>
@endsection
