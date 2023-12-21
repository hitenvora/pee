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
    <!-- style CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">
    <!-- responsive CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/responsive.css') }}">
    <!-- modernizr JSa
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/jquery.dataTable.min.css') }}">

    <script src="{{ asset('admin/assets/js/vendor/modernizr-2.8.3.min.js') }}"></script>

    @yield('styles')
</head>

<body>
    <div class="error-pagewrap">
        <div class="error-page-int">
            <div class="text-center m-b-md custom-login">
                <h3>SUPPLIER LOGIN</h3>
            </div>
            <div class="content-error">
                <div class="hpanel">
                    <div class="panel-body">
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ $error }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endforeach
                        @endif
                        @include('layouts.flash-message')
                        <form action="{{ route('supplier.login.submit') }}" method="POST" id="loginform">
                            @csrf
                            <div class="form-group">
                                <label class="control-label" for="username">Username</label>
                                <input type="text" placeholder="abc" title="Please enter you username"
                                    value="{{ old('user_name') }}" name="user_name" id="user_name" required
                                    autocomplete="user_name"
                                    class="form-control @error('user_name') is-invalid @enderror">
                                <span class="help-block small text-muted">Your unique username to app</span>
                                @error('user_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Password</label>
                                <input type="password" title="Please enter your password" placeholder="******"
                                    value="{{ old('password') }}" name="password" id="password" required
                                    autocomplete="password"
                                    class="form-control @error('password') is-invalid @enderror">
                                <span class="help-block small text-muted">Your strong password</span>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="checkbox login-checkbox">
                                <label>
                                    <input type="checkbox" class="i-checks"> Remember me </label>
                            </div>
                            <button type="submit" class="btn btn-success d-block w-100 loginbtn">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
    @yield('scripts')
</body>

</html>
