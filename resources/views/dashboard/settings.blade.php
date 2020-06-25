@extends('layouts.dashboard.app')
@section('title','اعدادات الموقع')
@push('css')
<!-- BEGIN PAGE LEVEL PLUGINS -->
<link href="{{asset('dashboard_files/theme_rtl')}}/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL PLUGINS -->
@endpush
@section('content')
<style>
    
</style>    
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
       
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="index.html">الرئيسية</a>
                    <i class="fa fa-angle-double-left"></i>
                </li>
                <li>
                    <span>الإعدادت</span>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title">
        </h3>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12 ">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-red-sunglo">
                            <i class="icon-settings font-red-sunglo"></i>
                            <span class="caption-subject bold uppercase"> الإعدادت</span>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        @include('partials._errors')
                        <form action="{{ route('dashboard.settings') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('post') }}
                            <div class="form-body">
                                <div class="form-group">
                                    <label>اسم الموقع بالعربية</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-check-square-o"></i>
                                        </span>
                                        <input type="text" name="ar_name" value="{{setting()->ar_name}}" class="form-control"> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>اسم الموقع بالانجليزية</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-check-square-o"></i>
                                        </span>
                                        <input type="text" name="en_name" value="{{setting()->en_name}}" class="form-control"> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>hgYdldg</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-check-square-o"></i>
                                        </span>
                                        <input type="text" name="email" value="{{setting()->email}}" class="form-control"> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>لغة الموقع</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-check-square-o"></i>
                                        </span>
                                        <input type="text" name="main_lang" value="{{setting()->main_lang}}" class="form-control"> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>الوصف</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-check-square-o"></i>
                                        </span>
                                        <input type="text" name="description" value="{{setting()->description}}" class="form-control"> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>الكلمات المفتاحية</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-check-square-o"></i>
                                        </span>
                                        <input type="text" name="keywords" value="{{setting()->keywords}}" class="form-control"> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>حالة الموقع</label>
                                    <select name="status" class="form-control">
                                        <option value="open" {{ setting()->status == 'open' ? 'selected' : '' }}>مفتوح</option>
                                        <option value="close" {{ setting()->status == 'close' ? 'selected' : '' }}>مغلق</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>رسالة الصيانة</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-check-square-o"></i>
                                        </span>
                                        <input type="text" name="message_maintenance" value="{{setting()->message_maintenance}}" class="form-control"> 
                                    </div>
                                </div>
                                <div class="form-group">
                                  <div class="fileinput fileinput-new" data-provides="fileinput">
                                      <div class="fileinput-new thumbnail" style="max-width: 100%; height: 150px;">
                                          <img src="{{ setting()->logo_path }}" alt="" /> </div>
                                      <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                      <div>
                                          <span class="btn default btn-file">
                                              <span class="fileinput-new"> لوجو الموقع </span>
                                              <span class="fileinput-exists"> تغير </span>
                                              <input type="file" name="logo"> </span>
                                          <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> حذف </a>
                                      </div>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class="fileinput fileinput-new" data-provides="fileinput">
                                      <div class="fileinput-new thumbnail" style="max-width: 100%; height: 150px;">
                                          <img src="{{ setting()->icon_path }}" alt="" /> </div>
                                      <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                      <div>
                                          <span class="btn default btn-file">
                                              <span class="fileinput-new">ايقونة الموقع </span>
                                              <span class="fileinput-exists"> تغير </span>
                                              <input type="file" name="icon"> </span>
                                          <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> حذف </a>
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
<script src="{{asset('dashboard_files/theme_rtl')}}/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
<script src="{{asset('dashboard_files/theme_rtl')}}/assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
@endpush

