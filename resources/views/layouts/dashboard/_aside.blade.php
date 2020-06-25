<style>
    .page-sidebar .page-sidebar-menu>li.active.open>a, .page-sidebar .page-sidebar-menu>li.active>a, .page-sidebar-closed.page-sidebar-fixed .page-sidebar:hover .page-sidebar-menu>li.active.open>a, .page-sidebar-closed.page-sidebar-fixed .page-sidebar:hover .page-sidebar-menu>li.active>a {
        background: #32c5d2;
    }

</style>

<div class="page-sidebar-wrapper">
   
    <div class="page-sidebar navbar-collapse collapse">
      
        <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-closed" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                        <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                        <li class="sidebar-toggler-wrapper hide">
                            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                            <div class="sidebar-toggler"> </div>
                            <!-- END SIDEBAR TOGGLER BUTTON -->
                        </li>
                        <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
                        <li class="sidebar-search-wrapper">
                            <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
                            <!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
                            <!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
                            <form class="sidebar-search  " action="#">
                                <a href="javascript:;" class="remove">

                                    <!-- <i class="icon-close"></i> -->
                                </a>
                                <div class="input-group">
                                    <input style="text-align: center; font-weight: bold;" type="text" disabled class="form-control" placeholder="لوجة التحكم">
                                    <span class="input-group-btn">
                                        <a href="#" class="btn submit">
                                            <i class="fa fa-dashboard"></i>
                                        </a>
                                    </span>
                                </div>
                            </form>
                            <!-- END RESPONSIVE QUICK SEARCH FORM -->
                        </li>
                        <li class="nav-item start {{ Request::is(App::getLocale().'/dashboard/welcome') ? 'active open' : '' }}">
                            <a href="{{asset('/dashboard/welcome')}}" class="nav-link nav-toggle">
                                <i class="icon-home"></i>
                                <span class="title">الرئيسية</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                        <li class="heading">
                            <h3 class="uppercase"></h3>
                        </li>
                        <!-- <li class="nav-item  ">
                            <a href="{{asset('dashboard/settings')}}" class="nav-link nav-toggle">
                                <i class="icon-settings"></i>
                                <span class="title">اعدادت الموقع</span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="{{asset('dashboard/roles/site')}}" class="nav-link nav-toggle">
                                <i class="icon-lock"></i>
                                <span class="title">صلاحيات الموقع</span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-users"></i>
                                <span class="title">إدارة المستخدمين</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="{{asset('dashboard/roles')}}" class="nav-link ">
                                        <i class="fa fa-list"></i>
                                        <span class="title">عرض انوع المستخدمين</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="{{asset('dashboard/roles/create')}}" class="nav-link ">
                                        <i class="fa fa-plus"></i>
                                        <span class="title">إضافة مستخدم جديد</span>
                                    </a>
                                </li>
                            </ul>
                        </li> -->
                        @if (auth()->user()->hasRole('super_admin'))
                        <li class="nav-item {{ Request::is(App::getLocale().'/dashboard/vendors') ? 'active open' : '' }} {{ Request::is(App::getLocale().'/dashboard/vendors/create') ? 'active open' : '' }}">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-users"></i>
                                <span class="title">إدارة الموردين</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item {{ Request::is(App::getLocale().'/dashboard/vendors') ? 'active open' : '' }}">
                                    <a href="{{asset('dashboard/vendors')}}" class="nav-link ">
                                        <i class="fa fa-list"></i>
                                        <span class="title">عرض الموردين</span>
                                    </a>
                                </li>
                                <li class="nav-item {{ Request::is(App::getLocale().'/dashboard/vendors/create') ? 'active open' : '' }} ">
                                    <a href="{{asset('dashboard/vendors/create')}}" class="nav-link ">
                                        <i class="fa fa-plus"></i>
                                        <span class="title">إضافة مورد</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item {{ Request::is(App::getLocale().'/dashboard/affiliates') ? 'active open' : '' }}">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="fa fa-users"></i>
                                <span class="title">إدارة الافيليت</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  {{ Request::is(App::getLocale().'/dashboard/affiliates') ? 'active open' : '' }}">
                                    <a href="{{asset('dashboard/affiliates')}}" class="nav-link ">
                                        <i class="fa fa-list"></i>
                                        <span class="title">عرض الافيليت</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item {{ Request::is(App::getLocale().'/dashboard/categories') ? 'active open' : '' }}">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="fa fa-sitemap"></i>
                                <span class="title">إدارة الأقسام</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  {{ Request::is(App::getLocale().'/dashboard/categories') ? 'active open' : '' }}">
                                    <a href="{{asset('dashboard/categories')}}" class="nav-link ">
                                        <i class="fa fa-list"></i>
                                        <span class="title">عرض الأقسام</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item {{ Request::is(App::getLocale().'/dashboard/products') ? 'active open' : '' }}">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-layers"></i>
                                <span class="title">إدارة المنتجات</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  {{ Request::is(App::getLocale().'/dashboard/products') ? 'active open' : '' }}">
                                    <a href="{{asset('dashboard/products')}}" class="nav-link ">
                                        <i class="fa fa-list"></i>
                                        <span class="title">عرض المنتجات</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item {{ Request::is(App::getLocale().'/dashboard/orders') ? 'active open' : '' }}">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="fa fa-shopping-cart"></i>
                                <span class="title">إدارة الطلبات</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  {{ Request::is(App::getLocale().'/dashboard/orders') ? 'active open' : '' }}">
                                    <a href="{{asset('dashboard/orders')}}" class="nav-link ">
                                        <i class="fa fa-list"></i>
                                        <span class="title">عرض الطلبات</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item {{ Request::is(App::getLocale().'/dashboard/faqs') ? 'active open' : '' }}">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="fa fa-flag-o"></i>
                                <span class="title">إدارة Faqs</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  {{ Request::is(App::getLocale().'/dashboard/faqs') ? 'active open' : '' }}">
                                    <a href="{{asset('dashboard/faqs')}}" class="nav-link ">
                                        <i class="fa fa-list"></i>
                                        <span class="title">عرض Faqs</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item {{ Request::is(App::getLocale().'/dashboard/about-us') ? 'active open' : '' }}">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="fa fa-bullhorn"></i>
                                <span class="title">إدارة About Us</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  {{ Request::is(App::getLocale().'/dashboard/about-us') ? 'active open' : '' }}">
                                    <a href="{{asset('dashboard/about-us')}}" class="nav-link ">
                                        <i class="fa fa-list"></i>
                                        <span class="title">عرض About Us</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item {{ Request::is(App::getLocale().'/dashboard/contacts') ? 'active open' : '' }}">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-bubbles"></i>
                                <span class="title">إدارة تواصل معنا</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  {{ Request::is(App::getLocale().'/dashboard/contacts') ? 'active open' : '' }}">
                                    <a href="{{asset('dashboard/contacts')}}" class="nav-link ">
                                        <i class="fa fa-list"></i>
                                        <span class="title">تواصل معنا</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endif
                    </ul>
    </div>
    <!-- END SIDEBAR -->
</div>