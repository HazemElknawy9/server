@extends('layouts.front.app')
@section('title','Home')


@section('content')

<section class="component-section-header row">
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
  <div class="text-sectin-header col-md-6">
      <p>ibuy Affiliate Program</p>
      <h6>Earn Sky High Bonuses from Sales</h6>
      <a href="{{asset('/register')}}" type="button" class="btn btn-hader">Join Now</a>

      
  </div>
  <div class="img-sectin-header col-md-6">
      <img src="{{asset('front_files')}}/file/hader.png"alt="hader-img">
  </div>
</section>
<section class="component-What">
   <h6 class="had-what">What is ibuy Affiliate program ? </h6>
   <p class="pagerf-what">
      Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
       sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat,
        sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. 
        Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
         Lorem ipsum dolor sit amet, consetetur sadipscing elitr, 
         sed diam nonumy eirmod tempor invidunt ut
      labore et dolore magna aliquyam erat, sed diam voluptua. 
   </p>
</section>

</header>
<article>
   <div class="card-group card-article">
      <div class="card card-one">
        <img src="{{asset('front_files')}}/file/join.png" class="cardee-img"
         alt="Join">
        <div class="card-body">
          <h5 class="card-title">Join</h5>
          <p class="card-text">Lorem ipsum dolor sit amet, <br>consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut

          </p>
        </div>
      </div>
      <div class="card card-tow">
        <img src="{{asset('front_files')}}/file/Advertise.png" class="cardee-img" 
        alt="Advertise">
        <div class="card-body">
          <h5 class="card-title"> Advertise</h5>
          <p class="card-text">
              Lorem ipsum dolor sit amet,<br> consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut

          </p>
        </div>
      </div>
      <div class="card">
        <img src="{{asset('front_files')}}/file/Earn.png" class="cardee-img" 
        alt=" Earn">
        <div class="card-body">
          <h5 class="card-title"> Earn</h5>
          <p class="card-text">
              Lorem ipsum dolor sit amet, <br>consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut      
          </p>
        </div>
      </div>
    </div>
    <div class="component-Product">
        <h6 class="text-product">Best Product </h6>
        <div id="post_data" class="card-deck card-deck-Product">
        <div class="row" style="display: contents;">
        {{ csrf_field() }}

        </div>
        </div>
        <!-- <div class="component-link-product">
          <button type="button" class="btn btn-link
          "data-toggle="modal" data-target="#exampleModal">Load More</button>

        </div> -->
        
    </div>
</article>

    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
       
        <div class="modal-body modal-body-rgister">
          <h5 class="modal-title">You Most be login or Registration</h5>
          <div class="component-form">
            <form class="form-register" method="POST" action="{{ route('login') }}">
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
                <a class="" href=""> login </a>
                
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
       
      </div>
    </div>
  </div>           
@endsection
