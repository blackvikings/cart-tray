<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from codedthemes.com/demos/admin-templates/datta-able/bootstrap/default/dashboard-ecommerce.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 26 May 2021 11:54:24 GMT -->
<head>
    <title>Datta Able - Ecommerce dashboard</title>
    <!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 11]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Datta Able Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
    <meta name="keywords" content="admin templates, bootstrap admin templates, bootstrap 4, dashboard, dashboard templets, sass admin templets, html admin templates, responsive, bootstrap admin templates free download,premium bootstrap admin templates, datta able, datta able bootstrap admin template">
    <meta name="author" content="Codedthemes" />

    <!-- Favicon icon -->
    <link rel="icon" href="https://codedthemes.com/demos/admin-templates/datta-able/bootstrap/assets/images/favicon.ico" type="image/x-icon">
    <!-- fontawesome icon -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome/css/fontawesome-all.min.css') }}">
    <!-- animation css -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/animation/css/animate.min.css') }}">
    <!-- vendor css -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    @toastr_css
    @stack('css')

</head>

<body>
<!-- [ Pre-loader ] start -->
<div class="loader-bg">
    <div class="loader-track">
        <div class="loader-fill"></div>
    </div>
</div>
<!-- [ Pre-loader ] End -->

<!-- [ navigation menu ] start -->
<nav class="pcoded-navbar">
    <div class="navbar-wrapper">
        <div class="navbar-brand header-logo">
            <a href="{{ route('admin.dashboard') }}" class="b-brand">
                <div class="b-bg">
                    <i class="feather icon-trending-up"></i>
                </div>
                <span class="b-title">Cart Tray</span>
            </a>
            <a class="mobile-menu" id="mobile-collapse" href="{{ route('admin.dashboard') }}"><span></span></a>
        </div>
        <div class="navbar-content scroll-div">
            <ul class="nav pcoded-inner-navbar">
                <li class="nav-item pcoded-menu-caption">
                    <label>Navigation</label>
                </li>
                <li data-username="Dashboard" class="nav-item @if(request()->is('admin_panel')) active @endif">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link" >
                        <span class="pcoded-micon">
                            <i class="feather icon-home"></i>
                        </span>
                        <span class="pcoded-mtext">Dashboard</span>
                    </a>
                </li>

                <li data-username="Products" class="nav-item {{Route::is('admin.products') ? 'active' : ''}}">
                    <a class="nav-link" href="{{route('admin.products')}}">
                       <span class="pcoded-micon">
                            <i class="feather icon-shopping-cart"></i>
                        </span>
                        <span class="pcoded-mtext">Products</span>
                    </a>
                </li>
                <li data-username="Categories" class="nav-item {{Route::is('admin.categories') ? 'active' : ''}}">
                    <a class="nav-link" href="{{route('admin.categories')}}">
                        <span class="pcoded-micon">
                            <i class="feather icon-list"></i>
                        </span>
                        <span class="pcoded-mtext">Categories</span>
                    </a>
                </li>
                <li data-username="Orders" class="nav-item {{Route::is('admin.orderManagement') ? 'active' : ''}}">
                    <a class="nav-link" href="{{route('admin.orderManagement')}}">
                        <span class="pcoded-micon">
                            <i class="feather icon-package"></i>
                        </span>
                        <span class="pcoded-mtext">Order Management</span>
                    </a>
                </li>
                <li data-username="Media" class="nav-item {{Route::is('admin.media') ? 'active' : ''}}">
                    <a class="nav-link" href="{{route('admin.media')}}">
                        <span class="pcoded-micon">
                            <i class="feather icon-image"></i>
                        </span>
                        <span class="pcoded-mtext">Slider Management</span>
                    </a>
                </li>
                <li data-username="Prescription" class="nav-item {{Route::is('admin.prescription') ? 'active' : ''}}">
                    <a class="nav-link" href="{{route('admin.prescription')}}">
                        <span class="pcoded-micon">
                            <i class="feather icon-paperclip"></i>
                        </span>
                        <span class="pcoded-mtext">Prescription Management</span>
                    </a>
                </li>
                <li data-username="Composition" class="nav-item {{Route::is('admin.composition') ? 'active' : ''}}">
                    <a class="nav-link" href="{{route('admin.composition')}}">
                        <span class="pcoded-micon">
                            <i class="feather icon-slack"></i>
                        </span>
                        <span class="menu-title">Composition Management</span>
                    </a>
                </li>
                <li data-username="MedicineRequest" class="nav-item {{Route::is('admin.medicine-request') ? 'active' : ''}}">
                    <a class="nav-link" href="{{route('admin.medicine-request')}}">
                        <span class="pcoded-micon">
                            <i class="feather icon-wifi"></i>
                        </span>
                        <span class="menu-title">Medicine Request</span>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>
<!-- [ navigation menu ] end -->

<!-- [ Header ] start -->
<header class="navbar pcoded-header navbar-expand-lg navbar-light">
    <div class="m-header">
        <a class="mobile-menu" id="mobile-collapse1" href="#!"><span></span></a>
        <a href="{{ route('admin.dashboard') }}" class="b-brand">
            <div class="b-bg">
                <i class="feather icon-trending-up"></i>
            </div>
            <span class="b-title">Cart Tray</span>
        </a>
    </div>
    <a class="mobile-menu" id="mobile-header" href="#!">
        <i class="feather icon-more-horizontal"></i>
    </a>
    <div class="collapse navbar-collapse">

        <ul class="navbar-nav ml-auto">

            <li>
                <div class="dropdown drp-user">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="icon feather icon-settings"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-notification">
                        <div class="pro-head">
                            <img src="../assets/images/user/avatar-1.jpg" class="img-radius" alt="User-Profile-Image">
                            <span>John Doe</span>
                            <a href="auth-signin.html" class="dud-logout" title="Logout">
                                <i class="feather icon-log-out"></i>
                            </a>
                        </div>
                        <ul class="pro-body">
                            <li><a href="#!" class="dropdown-item"><i class="feather icon-settings"></i> Settings</a></li>
                            <li><a href="#!" class="dropdown-item"><i class="feather icon-user"></i> Profile</a></li>
                            <li><a href="message.html" class="dropdown-item"><i class="feather icon-mail"></i> My Messages</a></li>
                            <li><a href="auth-signin.html" class="dropdown-item"><i class="feather icon-lock"></i> Lock Screen</a></li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</header>
<!-- [ Header ] end -->


<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <!-- [ breadcrumb ] start -->
                <div class="page-header">
                    <div class="page-block">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <div class="page-header-title">
                                    <h5 class="m-b-10">Dashboard</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="feather icon-home"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- [ breadcrumb ] end -->
                <div class="main-body">
                    <div class="page-wrapper">
                        <!-- [ Main Content ] start -->
                        <div class="row">

                            @yield('content')

                        </div>
                        <!-- [ Main Content ] end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- [ Main Content ] end -->



<!-- Required Js -->
<script src="{{ asset('assets/js/vendor-all.min.js') }}"></script>
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/pcoded.min.js') }}"></script>
<script src="{{ asset('assets/js/menu-setting.min.js') }}"></script>

<!-- amchart js -->
<script src="{{ asset('assets/plugins/amchart/js/amcharts.js') }}"></script>
<script src="{{ asset('assets/plugins/amchart/js/gauge.js') }}"></script>
<script src="{{ asset('assets/plugins/amchart/js/serial.js') }}"></script>
<script src="{{ asset('assets/plugins/amchart/js/light.js') }}"></script>
<script src="{{ asset('assets/plugins/amchart/js/pie.min.js') }}"></script>
<script src="{{ asset('assets/plugins/amchart/js/ammap.min.js') }}"></script>
<script src="{{ asset('assets/plugins/amchart/js/usaLow.js') }}"></script>
<script src="{{ asset('assets/plugins/amchart/js/radar.js') }}"></script>
<script src="{{ asset('assets/plugins/amchart/js/worldLow.js') }}"></script>

<!-- dashboard-custom js -->
<script src="{{ asset('assets/js/pages/dashboard-ecommerce.js') }}"></script>
@toastr_js
@toastr_render
@stack('js')
</body>

<!-- Mirrored from codedthemes.com/demos/admin-templates/datta-able/bootstrap/default/dashboard-ecommerce.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 26 May 2021 11:54:27 GMT -->
</html>
