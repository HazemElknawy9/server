@extends('layouts.dashboard.app')
@section('title','تعديل مورد')
@push('css')
<link href="{{asset('dashboard_files/theme_rtl')}}/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
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
                            <a href="{{asset('dashboard/vendors')}}">الموردين</a>
                            <i class="fa fa-angle-double-left"></i>
                          </li>
                          <li>
                              <span>تعديل</span>
                          </li>
                        </ul>
                    </div>
                    <!-- END PAGE BAR -->
                      <h3 class="page-title"> 
                          
                      </h3>

                    <!-- END PAGE HEADER-->
                    <div class="row">
                        <form action="{{ url(App::getLocale().'/dashboard/vendors/'.$user->id)  }}" method="post" enctype="multipart/form-data" id="product_form" class="form-horizontal"  data-toggle="validator">
                         {{ csrf_field() }}
                         {{ method_field('put') }}
                        <div class="col-md-12">
                            <div class="loading hidden">Loading&#8230;</div>
                            <div class="portlet light bordered">
                                
                                <div class="portlet-body">
                                    <ul class="nav nav-pills">
                                        <li class="active">
                                            <a href="#tab_2_1" data-toggle="tab"> بيانات المورد </a>
                                        </li>
                                        <li>
                                            <a href="#tab_2_2" data-toggle="tab"> الصلاحيات </a>
                                        </li>
                                        <li>
                                            <a href="#tab_2_3" data-toggle="tab">Role</a>
                                        </li>
                                    </ul>
                                    <hr>
                                    <div class="tab-content">
                                        <div class="tab-pane fade active in" id="tab_2_1">
                                          <div class="row">
                                            <div class="col-md-12">
                                              <div class="portlet light portlet-fit portlet-form">
                                                  <div class="portlet-body">
                                                      <!-- BEGIN FORM-->
                                                        @include('dashboard.includes.alerts.success')
                                                        @include('dashboard.includes.alerts.errors')  
                                                          <div class="form-body">
                                                              
                                                              <div class="form-group">
                                                                  <label class="control-label col-md-3">اسم المستخدم
                                                                      <span class="required"> * </span>
                                                                  </label>
                                                                  <div class="col-md-4">
                                                                      <div class="input-group">
                                                                          <span class="input-group-addon">
                                                                              <i class="fa fa-user"></i>
                                                                          </span>
                                                                          <input type="text" id="first_name" value="{{ $user->first_name }}" name="first_name" class="form-control" /> 
                                                                      </div>
                                                                      @error('first_name')
                                                                      <span class="text-danger">{{$message}}</span>
                                                                      @enderror
                                                                  </div>
                                                              </div>
                                                              <div class="form-group">
                                                                  <label class="col-md-3 control-label">الايميل
                                                                      <span class="required"> * </span>
                                                                  </label>
                                                                  <div class="col-md-4">
                                                                      <div class="input-group">
                                                                          <span class="input-group-addon">
                                                                              <i class="fa fa-envelope"></i>
                                                                          </span>
                                                                          <input type="email" class="form-control"   value="{{ $user->email}}" id="email" name="email" class="form-control"> 
                                                                      </div>
                                                                      @error('email')
                                                                      <span class="text-danger">{{$message}}</span>
                                                                      @enderror
                                                                  </div>
                                                              </div>
                                                              <div class="form-group">
                                                                  <label class="control-label col-md-3">التليفون
                                                                      <span class="required"> * </span>
                                                                  </label>
                                                                  <div class="col-md-4">
                                                                      <div class="input-group">
                                                                          <span class="input-group-addon">
                                                                              <i class="fa fa-user"></i>
                                                                          </span>
                                                                          <input type="text" id="phone" value="{{ $user->phone}}" name="phone"  placeholder="رقم التليفون" class="form-control" /> 
                                                                      </div>
                                                                      @error('phone')
                                                                      <span class="text-danger">{{$message}}</span>
                                                                      @enderror
                                                                  </div>
                                                              </div>
                                                              <div class="form-group">
                                                                  <label class="control-label col-md-3">صورة المستخدم
                                                                      <span class="required"> * </span>
                                                                  </label>
                                                                  <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                      <div class="fileinput-new thumbnail" style="max-width: 100%; height: 150px;">
                                                                          <img src="{{ Storage::disk('public')->url('vendor_profile/'.$user->image) }}" alt="" /> </div>
                                                                      <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                                      <div>
                                                                          <span class="btn default btn-file">
                                                                              <span class="fileinput-new"> اختر الصورة </span>
                                                                              <span class="fileinput-exists"> تغير </span>
                                                                              <input type="file" name="image"> </span>
                                                                          <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> حذف </a>
                                                                      </div>
                                                                  </div>
                                                              </div>
                                                              
                                                              
                                                              
                                                             
                                                          </div>
                                                          <div class="form-actions">
                                                              <div class="row">
                                                                  <div class="col-md-offset-3 col-md-9">
                                                                      <button type="submit" class="btn btn-primary save_and_continue"><i class="fa fa-edit"></i> <i class="fa fa-spin fa-spinner loading_save_c hidden"></i> @lang('site.edit')</button>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                      </form>
                                                      <!-- END FORM-->
                                                  </div>
                                                  <!-- END VALIDATION STATES-->
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab_2_2">
                                  
                                        </div>
                                        <div class="tab-pane fade" id="tab_2_3">
                                         
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
 
<script src="{{asset('dashboard_files/theme_rtl')}}/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
@endpush
@push('js_en')

@endpush