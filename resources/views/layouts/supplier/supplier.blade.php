<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    @yield('desc')
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('admin/assets/img/favicon.ico') }}">
    <!-- Google Fonts
  ============================================ -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <!-- Bootstrap CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap.min.css') }}">
    <!-- Bootstrap CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/font-awesome.min.css') }}">
    <!-- owl.carousel CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/owl.theme.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/owl.transitions.css') }}">
    <!-- animate CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/animate.css') }}">
    <!-- normalize CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/normalize.css') }}">
    <!-- meanmenu icon CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/meanmenu.min.css') }}">
    <!-- main CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/main.css') }}">
    <!-- educate icon CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/educate-custon-icon.css') }}">
    <!-- morrisjs CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/morrisjs/morris.css') }}">
    <!-- mCustomScrollbar CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/scrollbar/jquery.mCustomScrollbar.min.css') }}">
    <!-- metisMenu CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/metisMenu/metisMenu.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/metisMenu/metisMenu-vertical.css') }}">
    <!-- calendar CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/calendar/fullcalendar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/calendar/fullcalendar.print.min.css') }}">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- responsive CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/responsive.css') }}">
    <!-- modernizr JSa
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/jquery.dataTable.min.css') }}">

    <!-- style CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">

    <script src="{{ asset('admin/assets/js/vendor/modernizr-2.8.3.min.js') }}"></script>

    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

    @yield('styles')
</head>

<body>
    <div class="loader">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>
    {{-- @include('layouts.admin.sidebar') --}}

    <div class="all-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro">
                        <a href="{{ route('supplier.dashboard') }}"><img class="main-logo"
                                src="{{ asset('admin/assets/img/logo/PRAMUKH ENTERPRISE.svg') }}" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-advance-area">
            <div class="header-top-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="header-top-wraper">
                                <div class="row align-items-center">
                                    <div class="col-lg-2 logo-main">
                                        <div class="sidebar-header">
                                            <a href="{{ route('supplier.dashboard') }}"><img class="main-logo"
                                                    src="{{ asset('admin/assets/img/logo/main-logo.png') }}"
                                                    alt="" /></a>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-6 col-sm-7">
                                        <div
                                            class="breadcome-heading d-flex justify-content-between align-items-center">
                                            <a class="btn-left d-flex align-items-center gap-3"
                                                href="{{ url()->previous() }}">
                                                <span class="d-flex back-btn">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none">
                                                        <path
                                                            d="M7.83 11L11.41 7.41L10 6L4 12L10 18L11.41 16.59L7.83 13H20V11H7.83Z" />
                                                    </svg>
                                                </span>
                                                Back
                                            </a>
                                            <a class="btn btn-info" href="{{ route('index') }}">home</a>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-4 col-sm-5">
                                        <div class="header-right-info">
                                            <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                                <li class="nav-item">
                                                    <a href="#" data-bs-toggle="dropdown" role="button"
                                                        aria-expanded="false"
                                                        class="d-flex gap-3 align-items-center nav-link dropdown-toggle">
                                                        <div class="d-flex gap-3 align-items-center">
                                                            <div class="flex-shrink-0">
                                                                <img src="{{ asset('admin/assets/img/profile.png') }}"
                                                                    alt="" />
                                                            </div>
                                                            <div class="flex-grow-1 d-flex flex-column">
                                                                <h5 class="admin-name m-0">{{ auth()->user()->name }}
                                                                </h5>
                                                                <span>Supplier</span>
                                                            </div>
                                                        </div>
                                                        <i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
                                                    </a>
                                                    <ul role="menu"
                                                        class="dropdown-header-top author-log dropdown-menu">
                                                        <li><a href="#"><span
                                                                    class="edu-icon edu-user-rounded author-log-ic"></span>My
                                                                Profile</a>
                                                        </li>
                                                        <li><a href="{{ route('supplier.logout') }}"><span
                                                                    class="edu-icon edu-locked author-log-ic"></span>Log
                                                                Out</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @yield('content')
    <!-- jquery
  ============================================ -->
    <script src="{{ asset('admin/assets/js/vendor/jquery.min.js') }}"></script>
    <!-- bootstrap JS
  ============================================ -->
    <script src="{{ asset('admin/assets/js/bootstrap-bundle.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/popper.min.js') }}"></script>
    <!-- wow JS
  ============================================ -->
    <script src="{{ asset('admin/assets/js/wow.min.js') }}"></script>
    <!-- price-slider JS
  ============================================ -->
    <script src="{{ asset('admin/assets/js/jquery-price-slider.js') }}"></script>
    <!-- meanmenu JS
  ============================================ -->
    <script src="{{ asset('admin/assets/js/jquery.meanmenu.js') }}"></script>
    <!-- DataTable JS
    ============================================ -->
    <script src="{{ asset('admin/assets/js/jquery.dataTable.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/datatable-custom.js') }}"></script>
    <!-- owl.carousel JS
  ============================================ -->
    <script src="{{ asset('admin/assets/js/owl.carousel.min.js') }}"></script>
    <!-- sticky JS
  ============================================ -->
    <script src="{{ asset('admin/assets/js/jquery.sticky.js') }}"></script>
    <!-- scrollUp JS
  ============================================ -->
    <script src="{{ asset('admin/assets/js/jquery.scrollUp.min.js') }}"></script>
    <!-- mCustomScrollbar JS
  ============================================ -->
    <script src="{{ asset('admin/assets/js/scrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/scrollbar/mCustomScrollbar-active.js') }}"></script>
    <!-- metisMenu JS
  ============================================ -->
    <script src="{{ asset('admin/assets/js/metisMenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/metisMenu/metisMenu-active.js') }}"></script>
    <!-- plugins JS
  ============================================ -->
    <script src="{{ asset('admin/assets/js/plugins.js') }}"></script>
    <!-- main JS
  ============================================ -->
    <script src="{{ asset('admin/assets/js/main.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    @yield('scripts')
</body>

</html>
