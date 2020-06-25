@extends('layouts.dashboard.app')
@section('title','إضافة المنتجات')
@push('css')
<!-- BEGIN PAGE LEVEL PLUGINS -->
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
                    <a href="{{asset('dashboard/orders')}}">المنتجات</a>
                    <i class="fa fa-angle-double-left"></i>
                </li>
                <li>
                    <span>المدفوعات</span>
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
                            <span class="caption-subject bold uppercase"> تحويل العمولة</span>
                        </div>
                    </div>
                    <div class="portlet-body form">
                      @include('dashboard.includes.alerts.success')
                      @include('dashboard.includes.alerts.errors')
                    <form action="{{ route('dashboard.affiliates.orders.payments.store', ['affiliate'=>$affiliate->id,'order'=>$order->id]) }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('post') }}
                            <div class="form-body">
                                <div class="row">
                                   <div class="col-md-6">
                                      <div class="form-group">
                                          <i class="fa fa-clock-o"></i>
                                          <label>اسم الافيليت <span class="required" aria-required="true"> * </span></label>
                                          <input style="border-radius: 6px !important;height: 46px;" type="text" disabled="" value="{{$affiliate->first_name}} {{$affiliate->last_name}}" class="form-control input-lg" placeholder=''> 
                                          <input style="border-radius: 6px !important;height: 46px;" type="hidden"  name="affiliate_id" value="{{$affiliate->id}}" class="form-control input-lg" placeholder=''> 
                                      </div>
                                      @error('name')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                          <i class="fa fa-clock-o"></i>
                                          <label>رقم الاوردر <span class="required" aria-required="true"> * </span></label>
                                          <input style="border-radius: 6px !important;height: 46px;" type="text" disabled="" value="{{$order->id}}" class="form-control input-lg" placeholder=''> 
                                          <input style="border-radius: 6px !important;height: 46px;" type="hidden" name="order_id"  value="{{$order->id}}" class="form-control input-lg" placeholder=''> 
                                      </div>
                                      @error('name')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div> 
                                </div>
                                <div class="row">
                                   <div class="col-md-6">
                                        <i class="fa fa-folder"></i>
                                        <label> طريقة الدفع <span style="color: red" class="required" aria-required="true"> * </span></label>
                                        <select  name="transfer_method" class="bs-select form-control input-lg" data-live-search="true" data-size="8">
                                            <option value="Vodafone Cash">Vodafone Cash</option>
                                            <option value="Bank Transfer">Bank Transfer</option>
                                            <option value="Postal Transfer">Postal Transfer</option>
                                        </select>
                                        @error('transfer_method')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                          <i class="fa fa-clock-o"></i>
                                          <label>تاريخ التحويل <span class="required" aria-required="true"> * </span></label>
                                          <input style="border-radius: 6px !important;height: 46px;" type="text" name="transfer_date" autocomplete="off" id="datepicker" class="form-control datepicker input-lg" placeholder=''> 
                                      </div>
                                      @error('transfer_date')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div> 
                                </div> 
                                <div class="row">
                                   <div class="col-md-12">
                                      <div class="form-group">
                                          <i class="fa fa-clock-o"></i>
                                          <label>مبلغ التحويل <span class="required" aria-required="true"> * </span></label>
                                          <input style="border-radius: 6px !important;height: 46px;" type="number" name="transfer_amount" class="form-control input-lg" placeholder=''> 
                                      </div>
                                      @error('transfer_amount')
                                        <span class="text-danger">{{$message}}</span>
                                      @enderror
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

    $('.datepicker').datepicker({
	    rtl:'{{ app()->getLocale() == 'ar'?true:false }}',
	    language:'{{ app()->getLocale() }}',
	    format:'yyyy-mm-dd',
	    todayBtn:true,
	    clearBtn:true,
	});
</script>


@endpush

