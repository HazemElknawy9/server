@extends('layouts.dashboard.app')
@section('title','عرض افيليت')
@push('css')
<link href="{{asset('dashboard_files/theme_rtl')}}/style.css" rel="stylesheet" type="text/css" />
@endpush
@section('content')

    <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE BAR -->
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                          <li>
                            <a href="{{asset('dashboard/welcome')}}">الرئيسية</a>
                            <i class="fa fa-angle-double-left"></i>
                          </li>
                          <li>
                            <a href="{{asset('dashboard/affiliates')}}">افيليت</a>
                            <i class="fa fa-angle-double-left"></i>
                          </li>
                          <li>
                              <span>عرض</span>
                          </li>
                        </ul>
                    </div>
                    <!-- END PAGE BAR -->
                      <h3 class="page-title"> 
                          
                      </h3>

                    <!-- END PAGE HEADER-->
                    <div class="row">
                      <div class="col-md-12 ">
                          <!-- BEGIN SAMPLE FORM PORTLET-->
                          <div class="portlet light bordered">
                              <div class="portlet-title">
                                  <div class="caption font-red-sunglo">
                                      <i class="icon-settings font-red-sunglo"></i>
                                      <span class="caption-subject bold uppercase"> بيانات الافيليت</span>
                                  </div>
                              </div>
                              <div class="row">
                              <div class="col-md-6 ">
                                  <div class="portlet-body form">
                                        <div class="form-body">
                                          <div class="form-group">
                                            <label>First Name</label>
                                            <div class="input-group">
                                              <span class="input-group-addon">
                                                <i class="fa fa-check-square-o"></i>
                                              </span>
                                              <input type="text" value="{{$data->first_name}}" class="form-control"> 
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label>Title</label>
                                            <div class="input-group">
                                              <span class="input-group-addon">
                                                <i class="fa fa-check-square-o"></i>
                                              </span>
                                              <input type="text" value="{{$data->title}}" class="form-control"> 
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label>Phone</label>
                                            <div class="input-group">
                                              <span class="input-group-addon">
                                                <i class="fa fa-check-square-o"></i>
                                              </span>
                                              <input type="text" value="{{$data->phone}}" class="form-control"> 
                                            </div>
                                          </div> 
                                          <div class="form-group">
                                            <label>Governrate</label>
                                            <div class="input-group">
                                              <span class="input-group-addon">
                                                <i class="fa fa-check-square-o"></i>
                                              </span>
                                              <input type="text" value="{{$data->governrate}}" class="form-control"> 
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label>Postal Code</label>
                                            <div class="input-group">
                                              <span class="input-group-addon">
                                                <i class="fa fa-check-square-o"></i>
                                              </span>
                                              <input type="text" value="{{$data->postal_code}}" class="form-control"> 
                                            </div>
                                          </div>      
                                      </div>
                                  </div>
                               </div>

                               <div class="col-md-6 ">
                                  <div class="portlet-body form">
                                        <div class="form-body">
                                          <div class="form-group">
                                            <label>Last Name</label>
                                            <div class="input-group">
                                              <span class="input-group-addon">
                                                <i class="fa fa-check-square-o"></i>
                                              </span>
                                              <input type="text" value="{{$data->last_name}}" class="form-control"> 
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label>Email</label>
                                            <div class="input-group">
                                              <span class="input-group-addon">
                                                <i class="fa fa-check-square-o"></i>
                                              </span>
                                              <input type="text" value="{{$data->email}}" class="form-control"> 
                                            </div>
                                          </div> 
                                          <div class="form-group">
                                            <label>Date Of Birth</label>
                                            <div class="input-group">
                                              <span class="input-group-addon">
                                                <i class="fa fa-check-square-o"></i>
                                              </span>
                                              <input type="text" value="{{$data->date_birth}}" class="form-control"> 
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label>City</label>
                                            <div class="input-group">
                                              <span class="input-group-addon">
                                                <i class="fa fa-check-square-o"></i>
                                              </span>
                                              <input type="text" value="{{$data->city}}" class="form-control"> 
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label>Affilite Number</label>
                                            <div class="input-group">
                                              <span class="input-group-addon">
                                                <i class="fa fa-check-square-o"></i>
                                              </span>
                                              <input type="text" value="{{$data->number_id}}" class="form-control"> 
                                            </div>
                                          </div>      
                                      </div>
                                  </div>
                               </div>
                               <div class="col-md-12 ">
                                        <div class="form-body">
                                          <div class="form-group">
                                            <label>Address</label>
                                            <div class="input-group">
                                              <span class="input-group-addon">
                                                <i class="fa fa-check-square-o"></i>
                                              </span>
                                              <input type="text" value="{{$data->address}}" class="form-control"> 
                                            </div>
                                          </div>     
                                      </div>
                               </div>
                            </div>

                      </div>
                  </div>
                </div>
                <!-- END CONTENT BODY -->
            </div>
@endsection
@push('js')
 
@endpush
@push('js_en')

@endpush