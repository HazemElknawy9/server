@extends('layouts.front.app')
@section('title','About-us')


@section('content')

  <div class="compount-about">
          <div class="row">
            <div class="col-md-6 abut-img">
              <img src="{{asset('front_files')}}/file/about.png" alt="about-us">
            </div>
            <div class="col-md-6">
              <section class="component-What">
                <h6 class="had-what">{{$about->question}} </h6>
                <p class="pagerf-what">
                  {{$about->answer}} 
                </p>
                <a href="{{url(App::getLocale().'/register')}}" type="button" class="btn btn-hader">Join Now</a>
            </section>
            </div>
          </div>
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

        </div>
           
@endsection
