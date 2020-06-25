@extends('layouts.dashboard.app')
@section('title','إضافة المنتجات')
@push('css')
<!-- BEGIN PAGE LEVEL PLUGINS -->
<link href="{{asset('dashboard_files/theme_rtl')}}/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
<link href="{{asset('dashboard_files/theme_rtl')}}/assets/global/plugins/bootstrap-select/css/bootstrap-select-rtl.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="{{ asset('dashboard_files/theme_rtl/select2/select2.min.css') }}">
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
                    <a href="{{asset('dashboard/products')}}">المنتجات</a>
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
                            <span class="caption-subject bold uppercase"> إضافة منتجات</span>
                        </div>
                    </div>
                    <div class="portlet-body form">
                      @include('dashboard.includes.alerts.success')
                      @include('dashboard.includes.alerts.errors')
                    <form action="{{ route('dashboard.products.store') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('post') }}
                            <div class="form-body">
                               <div style="margin-bottom: 15px;" class="row">
                                    <div class="col-md-6">
                                        <i class="fa fa-folder"></i>
                                        <label> القسم <span style="color: red" class="required" aria-required="true"> * </span></label>
                                        <select  name="category_id" class="bs-select form-control input-lg" data-live-search="true" data-size="8">
                                            <option value="">@lang('site.all_categories')</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <i class="fa fa-folder"></i>
                                        <label> الموردين <span style="color: red" class="required" aria-required="true"> * </span></label>
                                        <select  name="vendor_id" class="bs-select form-control input-lg" data-live-search="true" data-size="8">
                                            <option value="">الموردين</option>
                                            @foreach ($vendors as $vendor)
                                                <option value="{{ $vendor->id }}" {{ old('vendor') == $vendor->id ? 'selected' : '' }}>{{ $vendor->first_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('vendor_id')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div> 
                                <div class="row">
                                   <div class="col-md-12">
                                      <div class="form-group">
                                          <i class="fa fa-clock-o"></i>
                                          <label>اسم المنتج <span class="required" aria-required="true"> * </span></label>
                                          <input style="border-radius: 6px !important;height: 46px;" type="text" name="name" class="form-control input-lg" placeholder=''> 
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
                                          <label>وصف المنتج <span class="required" aria-required="true"> * </span></label>
                                          <div class="col-md-12">
                                           <textarea style="margin: 0px -13px 12px -14px;width: 1028px;height: 50px;" name="description" id="description" class="form-control">{{ old('en_description') }}</textarea>
                                          </div>
                                      </div>
                                      @error('description')
                                        <span class="text-danger">{{$message}}</span>
                                      @enderror
                                    </div> 
                                </div> 
                                <div class="row">
                                   <div class="col-md-4">
                                      <div class="form-group">
                                          <i class="fa fa-clock-o"></i>
                                          <label>سعر المنتج <span class="required" aria-required="true"> * </span></label>
                                          <input style="border-radius: 6px !important;height: 46px;" type="number" name="price" class="form-control input-lg" placeholder=''> 
                                      </div>
                                      @error('price')
                                        <span class="text-danger">{{$message}}</span>
                                      @enderror
                                    </div> 
                                    <div class="col-md-4">
                                      <div class="form-group">
                                          <i class="fa fa-clock-o"></i>
                                          <label>الحد الادنى للسعر <span class="required" aria-required="true"> * </span></label>
                                          <input style="border-radius: 6px !important;height: 46px;" type="number" name="minimum_price" class="form-control input-lg" placeholder=''> 
                                      </div>
                                      @error('minimum_price')
                                        <span class="text-danger">{{$message}}</span>
                                      @enderror
                                    </div> 
                                    <div class="col-md-4">
                                      <div class="form-group">
                                          <i class="fa fa-clock-o"></i>
                                          <label>الحد الأقصى للسعر <span class="required" aria-required="true"> * </span></label>
                                          <input style="border-radius: 6px !important;height: 46px;" type="number" name="maximum_price" class="form-control input-lg" placeholder=''> 
                                      </div>
                                      @error('maximum_price')
                                        <span class="text-danger">{{$message}}</span>
                                      @enderror
                                    </div>
                                </div>
                                <div class="row">
                                   <div class="col-md-6">
                                      <div class="form-group">
                                          <i class="fa fa-clock-o"></i>
                                          <label>المخزن <span class="required" aria-required="true"> * </span></label>
                                          <input style="border-radius: 6px !important;height: 46px;" type="number" name="stock" class="form-control input-lg" placeholder=''> 
                                      </div>
                                      @error('stock')
                                        <span class="text-danger">{{$message}}</span>
                                      @enderror
                                    </div> 
                          
                                    <div class="col-md-6">
                                      <div class="form-group">
                                          <i class="fa fa-clock-o"></i>
                                          <label>العمولة</label>
                                          <input style="border-radius: 6px !important;height: 46px;" type="number" name="commission" class="form-control input-lg" placeholder=''> 
                                      </div>
                                    </div> 
                                </div>


                                <div class="row">
                                   <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label col-md-12">صورة المنتج
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail" style="max-width: 100%; height: 150px;">
                                                <img src="{{ Storage::disk('public')->url('products_image/default.png') }}" alt="" /> </div>
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
                                      @error('image')
                                        <span class="text-danger">{{$message}}</span>
                                      @enderror
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                          <i class="fa fa-clock-o"></i>
                                          <label>كاتلوج</label>
                                          <input type="file" name="catalog" class="form-control input-lg"> 
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
<script src="{{asset('dashboard_files/theme_rtl')}}/assets/global/plugins/bootstrap-select/js/bootstrap-select.min.js" type="text/javascript"></script>
<script src="{{asset('dashboard_files/theme_rtl')}}/assets/pages/scripts/components-bootstrap-select.min.js" type="text/javascript"></script>
<script src="{{asset('dashboard_files/theme_rtl')}}/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
<script src="{{ asset('dashboard_files/theme_rtl/select2/select2.min.js') }}"></script>
<script>
    // select2
    $('.select2').select2({
        width:'100%'
    });
</script>


@endpush

