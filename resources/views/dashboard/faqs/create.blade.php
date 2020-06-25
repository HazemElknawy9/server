@extends('layouts.dashboard.app')
@section('title','إضافة Faqs')
@push('css')
@endpush
@section('content')
  
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="{{asset('dashboard/welcome')}}">الرئيسية</a>
                    <i class="fa fa-angle-double-left"></i>
                </li>
                <li>
                    <a href="{{asset('dashboard/faqs')}}">Faqs</a>
                    <i class="fa fa-angle-double-left"></i>
                </li>
                <li>
                    <span>أضف</span>
                </li>
            </ul>
        </div>
        <h3 class="page-title">
        </h3>
        <div class="row">
            <div class="viewaddPro col-md-12">
                <!-- BEGIN S AMPLE FORM PORTLET-->
                <div style="border-radius: 9px !important;-webkit-box-shadow: 0 0 2rem 0 rgba(136,152,170,.15) !important;" class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-red-sunglo">
                            <i class="icon-plus"></i>
                            <span class="caption-subject bold uppercase"> إضافة Faqs</span>
                        </div>
                    </div>
                    <div class="portlet-body form">
                      @include('dashboard.includes.alerts.success')
                      @include('dashboard.includes.alerts.errors')
                    <form action="{{ route('dashboard.faqs.store') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('post') }}
                            <div class="form-body"> 
                                <div class="row">
                                   <div class="col-md-12">
                                      <div class="form-group">
                                          <i class="fa fa-clock-o"></i>
                                          <label>السؤال <span class="required" aria-required="true"> * </span></label>
                                          <input style="border-radius: 6px !important;height: 46px;" type="text" name="question"  class="form-control input-lg" placeholder=''> 
                                      </div>
                                      @error('name')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div> 
                                </div>
                                <div class="row">
                                   <div class="col-md-12">
                                      <div class="form-group">
                                          <i class="fa fa-clock-o"></i>
                                          <label>الإجابة <span class="required" aria-required="true"> * </span></label>
                                          <div class="col-md-12">
                                           <textarea style="margin: 0px -13px 12px -14px;width: 1028px;height: 50px;" name="answer" id="answer" class="form-control">{{ old('answer') }}</textarea>
                                          </div>
                                      </div>
                                      @error('description')
                                        <span class="text-danger">{{$message}}</span>
                                      @enderror
                                    </div> 
                                </div>  
                                </div>
                            </div>
                            
                            <div class="form-actions">
                                <button type="submit" class="btn blue">حفظ</button>
                            </div>
                        </form>
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

