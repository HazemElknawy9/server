@extends('layouts.dashboard.app')
@section('title','تعديل موظف جديد')
@push('css')
<link rel="stylesheet" href="{{ asset('dashboard_files/theme_rtl/select2/select2.min.css') }}">
<link href="{{asset('dashboard_files/theme_rtl')}}/style.css" rel="stylesheet" type="text/css" />

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
                    <a href="{{asset('dashboard')}}">الرئيسية</a>
                    <i class="fa fa-angle-double-left"></i>
                </li>
                <li>
                    <a href="{{asset('dashboard/roles')}}">الموظف</a>
                    <i class="fa fa-angle-double-left"></i>
                </li>
                <li>
                    <span>تعديل</span>
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
                            <span class="caption-subject bold uppercase"> الموظفين</span>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        @include('partials._errors')
                        <form action="{{ route('dashboard.roles.update', $role->id) }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('put') }}
                            <div class="form-body">
                                <div class="form-group">
                                    <label>اسم </label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-check-square-o"></i>
                                        </span>
                                        <input type="text"  type="text" name="name" class="form-control" value="{{ old('name', $role->name) }}" class="form-control"> 
                                    </div>
                                </div>

                                <div class="form-group">
                            <h3>صلاحيات الموظف</h3>
                            <table class="table table-hover">

                                <thead>
                                <tr>
                                    <th style="width: 5%">م</th>
                                    <th style="width: 15%">الاقسم</th>
                                    <th>الصلاحيات</th>
                                </tr>
                                </thead>
                                
                                <tbody>
                                    @foreach($roleSite as $index=>$model)
                                        <tr>
                                            <td>{{ $index+1 }}</td>
                                            <td>{{ $model->ar_name }}</td>

                                            <td>
                                                <select name="permissions[]" class="form-control select2" multiple="">
                                                    @foreach($cruds as $permission_map)
                                                        <option {{ $role->hasPermission($permission_map->en_name . '_' . $model->name) ? 'selected' : '' }} value="{{ $permission_map->en_name . '_' . $model->name }}">{{ $permission_map->ar_name}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                    @endforeach    
                                </tbody>

                            </table><!-- end of table -->
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
<script src="{{ asset('dashboard_files/theme_rtl/select2/select2.min.js') }}"></script>
<script>
    // select2
    $('.select2').select2({
        width:'100%'
    });
</script>
@endpush

