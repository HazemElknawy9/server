<!--stert-nav-->
         <nav class="navbar navbar-expand-sm navbar-light">
          
               <a class="navbar-brand" href="{{asset(url('/'))}}">
                   <img src="{{asset('front_files')}}/file/logo.png" alt="logo">
               </a>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                       <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="navbarNav">
                  <div class="img-nav-item ml-auto">
                    <img src="{{asset('front_files')}}/file/ibuy.png"><span>Home</span>
                  </div>
                    
                    <ul class="navbar-nav ml-auto">
                      
                     <li class="nav-item @if(Request::url() == asset(url(App::getLocale())) ) active @endif">
                       <a class="nav-link" href="{{asset(url('/'))}}">Home </a>
                     </li>
                     @auth
                     <li class="nav-item  @if(Request::url() == asset(url(App::getLocale().'/brands')) ) active @endif">
                        <a class="nav-link" href="{{asset('/brands')}}"> Brands</a>
                     </li>       
                     <li class="nav-item @if(Request::url() == asset(url(App::getLocale().'/products')) ) active @endif"">
                        <a class="nav-link" href="{{asset('/products')}}"> Products</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="">Reports</a>
                     </li>
                     @else
                      <li class="nav-item @if(Request::url() == asset(url(App::getLocale().'/About-us')) ) active @endif">
                        <a class="nav-link" href="{{asset(url('/About-us'))}}"> About</a>
                     </li>       
                     <li class="nav-item @if(Request::url() == asset(url(App::getLocale().'/faqs')) ) active @endif">
                        <a class="nav-link" href="{{asset(url('/faqs'))}}"> FAQs</a>
                     </li>
                      @endauth
                     <li class="nav-item @if(Request::url() == asset(url(App::getLocale().'/tutorial')) ) active @endif">
                        <a class="nav-link" href="{{asset(url('/tutorial'))}}">Tutorial</a>
                     </li>
                     @auth
                     <li class="nav-item dropdown nav-car-bell">
                          <a class="nav-link link-2" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            <i class="far fa-bell"></i>
                            <span class="badge badge-pill badge-danger ml-0 mr-2">4</span>
                          </a>
                          <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                             <h6 class="newderb">New</h6>
                             <div class="drop-new drop-new-top">
                               <p>The application was accepted by 
                                the certified technician
                                <span>04/05/2020 ,04:05 PM </span>
                              </p>
                             </div>
                             <h6>Earlier</h6>
                             <div class="drop-new drop-new-down">
                              <p>The application was accepted by 
                               the certified technician
                               <span>04/05/2020 ,04:05 PM </span>
                             </p>
                            </div>
      
                          
                        </div></li>
                         <li class="nav-item dropdown nav-p">
                          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                          </a>
                          <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                              <a class="dropdown-item" href="#">Dashboard </a>
                              <a class="dropdown-item" href="#">Payment</a>
                              <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                              </form>
                          </div>
                       </li>
                     @else
                     <li class="nav-item @if(Request::url() == asset(url(App::getLocale().'/register')) ) active @endif">
                       <a class="nav-link" href="{{url(App::getLocale().'/register')}}">Join Now</a>

                     </li> 
                     <li class="nav-item @if(Request::url() == asset(url(App::getLocale().'/login')) ) active @endif">
                       
                       <a class="nav-link" href="{{url(App::getLocale().'/login')}}">Login</a>

                     </li> 
                     @endauth
                    </ul>    
               </div>
            
         </nav>    
        <!--end-nav-->