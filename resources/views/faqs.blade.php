@extends('layouts.front.app')
@section('title','FAQs')


@section('content')

<div class="compount-about compount-faqs">
          <h6 class="text-product"> FAQs </h6>
          <div class="Frequently-Asked-defintion">
            <div class="bs-example">
              <div class="accordion" id="accordionExample">
              @foreach($faqs as $faq)
                  <div class="card card-asked ">
                      <div class="card-header" id="headingOne">
                          <h2 class="mb-0">
                              <div class="btn card-Frequently collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false">
                                <div class="aceon-i">
                                  <i class="fa fa-plus" aria-hidden="true"></i>
      
                                </div>
                                <div class="text-faq">
                                  <h6>{{$faq->question}}</h6>

                                </div>
                               </div>                 
                          </h2>
                      </div>
                      <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample" style="">
                          <div class="card-body">
                              <p>
                                {{$faq->answer}}
                              </p>
                          </div>
                      </div>
                  </div>
                  @endforeach
                  
                
              </div>
          </div>
              
          </div>
         

        </div>
           
@endsection
