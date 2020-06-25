@extends('layouts.dashboard.app')
@section('title','الرئيسية')
@push('css')

@endpush
@section('content')

    
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="{{asset('dashboard')}}">الرئيسية</a>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <h3 class="page-title">
        </h3>
        <!-- BEGIN DASHBOARD STATS 1-->
        

        <br>
        <br>
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat blue">
                    <div class="visual">
                        <i style="margin-right: -4px;" class="icon-users"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup" data-value="1349"></span>
                        </div>
                        <div class="desc"> الموردين</div>
                    </div>
                    <a style="font-size: 20px;" class="more" href="{{asset('dashboard/users')}}"> عرض
                        <i class="m-icon-swapright m-icon-white"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat red">
                    <div class="visual">
                        <i style="margin-right: -4px;" class="fa fa-sitemap"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup" data-value="12,5"></span></div>
                        <div class="desc"> الأقسام </div>
                    </div>
                    <a style="font-size: 20px;" class="more" href="{{asset('dashboard/categories')}}"> عرض
                        <i class="m-icon-swapright m-icon-white"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat yellow">
                    <div class="visual">
                        <i style="margin-right: -4px;" class="icon-briefcase"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup" data-value="12,5"></span></div>
                        <div class="desc"> المنتجات </div>
                    </div>
                    <a style="font-size: 20px;" class="more" href="{{asset('dashboard/products?category_id=')}}"> عرض
                        <i class="m-icon-swapright m-icon-white"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat green">
                    <div class="visual">
                        <i style="margin-right: -4px;" class="fa fa-shopping-cart"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup" data-value="549"></span>
                        </div>
                        <div class="desc"> الطلبات </div>
                    </div>
                    <a style="font-size: 20px;" class="more" href="{{asset('dashboard/orders')}}"> عرض
                        <i class="m-icon-swapright m-icon-white"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat purple">
                    <div class="visual">
                        <i style="margin-right: -4px;" class="icon-user-following"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup" data-value="89"></span></div>
                        <div class="desc"> العملاء </div>
                    </div>
                    <a style="font-size: 20px;" class="more" href="{{asset('dashboard/clients')}}"> عرض
                        <i class="m-icon-swapright m-icon-white"></i>
                    </a>
                </div>
            </div>
        </div>       
    </div>
    <!-- END CONTENT BODY -->
</div>

@endsection
@push('js')


@endpush