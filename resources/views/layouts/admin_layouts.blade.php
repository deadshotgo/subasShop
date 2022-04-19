<!DOCTYPE html>
<html lang="ru">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <link href="/admin/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/admin/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="/admin/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="/admin/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="/admin/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <link href="/admin/css/colorbox.css" rel="stylesheet">


    <!-- Custom Theme Style -->
    <link href="/admin/build/css/custom.min.css" rel="stylesheet">
    @yield('custom_css')
</head>

<body class="nav-md">

<div class="container body">
    <div class="main_container">

        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Gentelella Alela!</span></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile clearfix">
                    <div class="profile_pic">
                        <img src="/admin/images/img.jpg" alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Доброго дня,</span>
                        <h2>{{\Illuminate\Support\Facades\Auth::user()['name']}}</h2>
                    </div>
                </div>
                <!-- /menu profile quick info -->

                <br />

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <h3>Меню</h3>
                        <ul class="nav side-menu">
                            <li><a href="{{route('/admin-home')}}"><i class="fa fa-home"></i> Головна </a></li>
                            <li><a><i class="fa fa-folder-open"></i>Категорії<span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{route('Category.index')}}">Категорії</a></li>
                                    <li><a href="{{route('Brand.index')}}">Бренди</a></li>
                                    <li><a href="{{route('System.index')}}">Операційні системи</a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-tag"></i> Продукти<span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="#">Всі продукти</a></li>
                                    <li><a href="#">Додати продукт</a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-sitemap"></i> Інше<span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /sidebar menu -->
                <!-- /menu footer buttons -->
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <div class="nav toggle">
                    <a id="menu_toggle"></a>
                </div>
                <nav class="nav navbar-nav">
                    <ul class=" navbar-right">
                        <li class="nav-item dropdown open" style="padding-left: 15px;">
                            <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                                <img src="/admin/images/img.jpg" alt="">{{\Illuminate\Support\Facades\Auth::user()['name']}}
                            </a>
                            <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item"  href="javascript:;"> Profile</a>
                                <a class="dropdown-item"  href="javascript:;">
                                    <span class="badge bg-red pull-right">50%</span>
                                    <span>Settings</span>
                                </a>
                                <a class="dropdown-item"  href="javascript:;">Help</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->

        @yield('content')
</div>
</div>
        </div>


<!-- jQuery -->
<script src="/admin/vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="/admin/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!-- FastClick -->
<script src="/admin/vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="/admin/vendors/nprogress/nprogress.js"></script>
<!-- Chart.js -->
<script src="/admin/vendors/Chart.js/dist/Chart.min.js"></script>
<!-- jQuery Sparklines -->
<script src="/admin/vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- morris.js -->
<script src="/admin/vendors/raphael/raphael.min.js"></script>
<script src="/admin/vendors/morris.js/morris.min.js"></script>
<!-- gauge.js -->
<script src="/admin/vendors/gauge.js/dist/gauge.min.js"></script>
<!-- bootstrap-progressbar -->
<script src="/admin/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- Skycons -->
<script src="/admin/vendors/skycons/skycons.js"></script>
<!-- Flot -->
<script src="/admin/vendors/Flot/jquery.flot.js"></script>
<script src="/admin/vendors/Flot/jquery.flot.pie.js"></script>
<script src="/admin/vendors/Flot/jquery.flot.time.js"></script>
<script src="/admin/vendors/Flot/jquery.flot.stack.js"></script>
<script src="/admin/vendors/Flot/jquery.flot.resize.js"></script>
<!-- Flot plugins -->
<script src="/admin/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
<script src="/admin/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
<script src="/admin/vendors/flot.curvedlines/curvedLines.js"></script>
<!-- DateJS -->
<script src="/admin/vendors/DateJS/build/date.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="/admin/vendors/moment/min/moment.min.js"></script>
<script src="/admin/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

<!-- Custom Theme Scripts -->
<script src="/admin/build/js/custom.min.js"></script>
<script src="/admin/admi.js"></script>

@yield('custom_js')

</body>
</html>
