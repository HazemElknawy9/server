@extends('layouts.front.app')
@section('title','Contact Us')


@section('content')

  <div class="compount-about compount-contact-us">
          <div class="row">
            <div class="component-what col-md-6">
              <div class="text-one-left">
                <h6 class="text-product">LEAVE YOUR MESSAGE</h6>
                
              
              </div>
              <form id="contact-form" class="form-register" method="POST" action="{{ route('contacts.store') }}">
              @csrf
                <div class="form-group ">
                  <label for="inputname">Name <span class="content-sl-span"> ( Required )</span></label>
                  <input type="text" class="form-control" name="name" id="name" required placeholder="Name">
                </div>
                <div class="form-group">
                  <label for="inputEmail4">Email<span class="content-sl-span"> ( Required )</span></label>
                  <input type="email" class="form-control" name="email" id="email" required placeholder="Type Your Email">
                </div>
                <div class="form-group">
                  <label for="inputSubject">Subject</label>
                  <input type="text" class="form-control" name="subject" id="subject" required placeholder="Subject">
                </div>
                <div class="form-group">
                  <label for="inputMessage">Your Message</label>
                  <textarea class="form-control" name="message" id="message" required placeholder="Message" rows="8"></textarea>
                  
        
        
                </div>
                <div class="form-group">
                  <button type="button" class="btn btn-hader save_and_continue">SEND MESSAGE</button>
        
                </div>
               
                
                
              </form>
             </div>
             <div class="col-md-6">
              <div class="text-one-left">
                <h6 class="text-product">CONTACT INFO</h6>
                <p>Choose one of the alternative methods of communication. We’re available from Monday to Friday, 07:30-19:00 to take your call.
                </p>
                <div class="component-u">
                  <h6>Office:</h6><span> 868 Fake Street, Cairo</span>
                </div>
                <div class="component-u">
                  <h6>Phone:</h6><span>(+2) 01000000000</span>
                </div>
                <div class="component-u">
                  <h6>Email:</h6><span> info@domain.com</span>
        
                </div>
                <div class="contact-us__map">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3452.874701257638!2d31.314595084884203!3d30.069125881873358!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14583e4cfbd1592d%3A0xc90510d48ee6cca4!2z2LPYqtin2K8g2KfZhNmC2KfZh9ix2Kkg2KfZhNiv2YjZhNmK!5e0!3m2!1sar!2seg!4v1587059354627!5m2!1sar!2seg" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>  
                  </div>
                
                
        
              </div>
             </div>
          </div>

        </div>
@endsection
