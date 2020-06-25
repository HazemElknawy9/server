@extends('layouts.dashboard.app')
@section('title','الملف الشخصي')
@push('css')
<link href="{{asset('dashboard_files/theme_rtl')}}/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
<link href="{{asset('dashboard_files/theme_rtl')}}/assets/pages/css/profile-rtl.min.css" rel="stylesheet" type="text/css" />
@endpush
@section('content')

<style>
    /*.portlet {
    margin-top: 0;
        margin-bottom: 0px;
        padding: 0;
        border-radius: 4px;
    }*/
</style>    
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
       
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="{{asset('/dashboard/welcome')}}">الرئيسية</a>
                    <i class="fa fa-angle-double-left"></i>
                </li>
                <li>
                    <span>الملف الشخصي</span>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> الملف الشخصي
        </h3>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
            @include('partials._errors')
                <!-- BEGIN PROFILE SIDEBAR -->
                <div class="profile-sidebar">
                    <!-- PORTLET MAIN -->
                    <div style="border-radius: 31px!important; height: 300px;" class="portlet light profile-sidebar-portlet ">
                        <!-- SIDEBAR USERPIC -->
                        <div class="profile-userpic">
                            <img src="{{ URL::to('/') }}/storage/vendor_profile/{{auth()->user()->image}}" class="img-responsive" alt=""> </div>
                        <!-- END SIDEBAR USERPIC -->
                        <!-- SIDEBAR USER TITLE -->
                        <div class="profile-usertitle">
                            <div class="profile-usertitle-name">{{ auth()->user()->first_name }}</div>
                        </div>
                        <!-- END SIDEBAR USER TITLE -->
                        <!-- SIDEBAR BUTTONS -->
                        <div class="profile-userbuttons">
                            <button type="button" class="btn btn-circle red btn-sm">{{implode(', ', auth()->user()->roles->pluck('name')->toArray()) }}</button>
                        </div>
                        <!-- END SIDEBAR BUTTONS -->
                    </div>
                    <!-- END PORTLET MAIN -->
                </div>
                <!-- END BEGIN PROFILE SIDEBAR -->
                <!-- BEGIN PROFILE CONTENT -->
                <div class="profile-content" style="border-radius: 10px!important;">
                    <div class="row">
                        <div class="col-md-12">
                            <div  class="portlet light ">
                                <div class="portlet-title tabbable-line">
                                    <div class="caption caption-md">
                                        <i class="icon-globe theme-font hide"></i>
                                        <span class="caption-subject font-blue-madison bold uppercase">الملف الشخصي</span>
                                    </div>
                                    <ul class="nav nav-tabs">
                                        <li class="active">
                                            <a href="#tab_1_1" data-toggle="tab">المعلومات الشخصية</a>
                                        </li>
                                        <li>
                                            <a href="#tab_1_2" data-toggle="tab">الصورة الشخصية</a>
                                        </li>
                                        <li>
                                            <a href="#tab_1_3" data-toggle="tab">تغير كلمة المرور</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="portlet-body">
                                    <div class="tab-content">
                                        <!-- PERSONAL INFO TAB -->
                                        <div class="tab-pane active" id="tab_1_1">
                                            <form role="form" action="{{ url(App::getLocale().'/dashboard/profile') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                
                                                <div class="form-group">
                                                    <label class="control-label">الاسم</label>
                                                    <input type="text" name="first_name" value="{{ auth()->user()->first_name }}" class="form-control" /> 
                                                </div>
                                               
                                                <div class="form-group">
                                                    <label class="control-label">التليفون</label>
                                                    <input type="text" name="phone" value="{{ auth()->user()->phone }}" class="form-control" />
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">الإيميل</label>
                                                    <input type="email" name="email" value="{{ auth()->user()->email }}" class="form-control" />
                                                </div>
                        
                                                <div class="margiv-top-10">
                                                    <button type="submit" class="btn green"><i class="fa fa-edit"></i> حفظ</button>
                                                </div>
                                           
                                        </div>
                                        <!-- END PERSONAL INFO TAB -->
                                        <!-- CHANGE AVATAR TAB -->
                                        <div class="tab-pane" id="tab_1_2">
                                            <p>الصورة الشخصية</p>
                                            
                                                <div class="form-group">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                            <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
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
                                                <div class="margiv-top-10">
                                                    <button type="submit" class="btn green"><i class="fa fa-edit"></i> حفظ</button>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- END CHANGE AVATAR TAB -->
                                        <!-- CHANGE PASSWORD TAB -->
                                        <div class="tab-pane" id="tab_1_3">
                                            <form action="{{ url(App::getLocale().'/dashboard/admin/update-pwd')}}" method="post">
                                                {{ csrf_field() }}
                                                <div class="form-group">
                                                    <label class="control-label">كلمة المرور الحالية</label>
                                                    <input type="password" name="current_pwd" id="current_pwd" class="form-control" /> </div>
                                                    <span id="chkPwd"></span>
                                                <div class="form-group">
                                                    <label class="control-label">كلمة المرور الجديدة</label>
                                                    <input type="password" name="new_pwd" id="new_pwd" class="form-control" /> </div>
                                                <div class="form-group">
                                                    <label class="control-label">تأكيد كلمة المرور</label>
                                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" /> </div>
                                                <div class="margin-top-10">
                                                    <button type="submit" class="btn green"><i class="fa fa-edit"></i> حفظ</button>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- END CHANGE PASSWORD TAB -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END PROFILE CONTENT -->
            </div>
        </div>
    </div>
    <!-- END CONTENT BODY -->
</div>

@endsection
@push('js')
<script src="{{asset('dashboard_files/theme_rtl')}}/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
<script src="{{asset('dashboard_files/theme_rtl')}}/assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{asset('dashboard_files/theme_rtl')}}/assets/pages/scripts/profile.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
    $(document).ready(function () {
    
    var Domain = $("meta[name='Domain']").attr('content');
    
    $("#new_pwd").click(function(){
        var current_pwd = $("#current_pwd").val();
        $.ajax({
            type:'get',
            url:base_url+'/dashboard/admin/check-pwd',
            data:{current_pwd:current_pwd},
            success:function(resp){
                //alert(resp);
                if(resp=="false"){
                    $("#chkPwd").html("<font color='red'>كلمة المرور الحالية غير صحيحة</font>");
                }else if(resp=="true"){
                    $("#chkPwd").html("<font color='green'>كلمة المرور الحالية صحيحة</font>");
                }
            },error:function(){
                alert("Error");
            }
        });
    });

    
    
});//end of document ready
</script>
@endpush

