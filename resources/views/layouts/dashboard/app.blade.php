<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.5
Version: 4.5.2
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title> لوحة التحكم | @yield('title')</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <script>
        var _token = "{{csrf_token()}}";
        var base_url = "{{url('')}}";
        </script>
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="{{asset('dashboard_files/theme_rtl')}}/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="{{asset('dashboard_files/theme_rtl')}}/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        @if (app()->getLocale() == 'ar')
        <link href="{{asset('dashboard_files/theme_rtl')}}/assets/global/plugins/bootstrap/css/bootstrap-rtl.min.css" rel="stylesheet" type="text/css" />
        @else
         <link href="{{asset('dashboard_files/theme')}}/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        @endif
        <link href="{{asset('dashboard_files/theme_rtl')}}/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
        @if (app()->getLocale() == 'ar')
        <link href="{{asset('dashboard_files/theme_rtl')}}/assets/global/plugins/bootstrap-switch/css/bootstrap-switch-rtl.min.css" rel="stylesheet" type="text/css" />
        @else
         <link href="{{asset('dashboard_files/theme')}}/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        @endif
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        @if (app()->getLocale() == 'ar')
        <link href="{{asset('dashboard_files/theme_rtl')}}/assets/global/css/components-rtl.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="{{asset('dashboard_files/theme_rtl')}}/assets/global/css/plugins-rtl.min.css" rel="stylesheet" type="text/css" />
        @else
        <link href="{{asset('dashboard_files/theme')}}/assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="{{asset('dashboard_files/theme')}}/assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        @endif
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        @if (app()->getLocale() == 'ar')
        <link href="{{asset('dashboard_files/theme_rtl')}}/assets/layouts/layout/css/layout-rtl.min.css" rel="stylesheet" type="text/css" />
        <link href="{{asset('dashboard_files/theme_rtl')}}/assets/layouts/layout/css/themes/light-rtl.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="{{asset('dashboard_files/theme_rtl')}}/assets/layouts/layout/css/custom-rtl.min.css" rel="stylesheet" type="text/css" />
        @else
        <link href="{{asset('dashboard_files/theme')}}/assets/layouts/layout/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="{{asset('dashboard_files/theme')}}/assets/layouts/layout/css/themes/light.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="{{asset('dashboard_files/theme')}}/assets/layouts/layout/css/custom.min.css" rel="stylesheet" type="text/css" />
        @endif
        {{--noty--}}
        <link rel="stylesheet" href="{{ asset('dashboard_files/theme_rtl/plugins/noty/noty.css') }}">
        <script src="{{ asset('dashboard_files/theme_rtl/plugins/noty/noty.min.js') }}"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
        @stack('css')
        <style>
            .datepicker{
                direction: rtl;
            }
            .page-content {
                background-color: #F2F3F8;
            }

            .page-container-bg-solid .page-bar, .page-content-white .page-bar{
                background-color: #F2F3F8;
            }

            .page-header.navbar {
                background-color: #FFFFFF;
            }

            .page-content{
                border: 1px solid #32c5d2;
            }
        </style>
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
        <!-- BEGIN HEADER -->
        @include('layouts.dashboard._top')
        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            @include('layouts.dashboard._aside')
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            @yield('content')
            @include('partials._session')
            <!-- END CONTENT -->
            <!-- BEGIN QUICK SIDEBAR -->
            
            <!-- END QUICK SIDEBAR -->
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        @include('layouts.dashboard._footer')
        <!-- END FOOTER -->
        <!--[if lt IE 9]>
<script src="../assets/global/plugins/respond.min.js"></script>
<script src="../assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="{{asset('dashboard_files/theme_rtl')}}/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="{{asset('dashboard_files/theme_rtl')}}/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="{{asset('dashboard_files/theme_rtl')}}/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="{{asset('dashboard_files/theme_rtl')}}/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="{{asset('dashboard_files/theme_rtl')}}/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="{{asset('dashboard_files/theme_rtl')}}/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="{{asset('dashboard_files/theme_rtl')}}/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
        <script src="{{asset('dashboard_files/theme_rtl')}}/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="{{asset('dashboard_files/theme_rtl')}}/assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="{{asset('dashboard_files/theme_rtl')}}/assets/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
        <script src="{{asset('dashboard_files/theme_rtl')}}/assets/layouts/layout/scripts/demo.min.js" type="text/javascript"></script>
        <script src="{{asset('dashboard_files/theme_rtl')}}/assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.ar.min.js"></script>
        {!! Toastr::message() !!}
        @stack('js')
        <script>
            $(document).ready(function () {
                
            //delete
            $('.delete').click(function (e) {

                var that = $(this)

                e.preventDefault();

                var n = new Noty({
                    text: "@lang('site.confirm_delete')",
                    type: "warning",
                    killer: true,
                    buttons: [
                        Noty.button("@lang('site.yes')", 'btn btn-success mr-2', function () {
                            that.closest('form').submit();
                        }),

                        Noty.button("@lang('site.no')", 'btn btn-primary mr-2', function () {
                            n.close();
                        })
                    ]
                });

                n.show();

            });//end of delete

              
        });//end of ready 
        </script>
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>

</html>