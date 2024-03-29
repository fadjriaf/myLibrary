<!doctype html>
<html class="fixed">
    <head>

        <!-- Basic -->
        <meta charset="UTF-8">

        <title>myLibrary - Login</title>
        <meta name="keywords" content="myLibrary" />
        <meta name="description" content="myLibrary - Web Aplikasi Perpustakaan">
        <meta name="author" content="Fadjri Alfalah">

        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

        <!-- Web Fonts  -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

        <!-- Vendor CSS -->
        <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.css') }}" />

        <link rel="stylesheet" href="{{ asset('vendor/font-awesome/css/font-awesome.css') }}" />
        <link rel="stylesheet" href="{{ asset('vendor/magnific-popup/magnific-popup.css') }}" />
        <link rel="stylesheet" href="{{ asset('vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css') }}" />

        <!-- Theme CSS -->
        <link rel="stylesheet" href="{{ asset('css/theme.css') }}" />

        <!-- Skin CSS -->
        <link rel="stylesheet" href="{{ asset('css/skins/default.css') }}" />

        <!-- Theme Custom CSS -->
        <link rel="stylesheet" href="{{ asset('css/theme-custom.css') }}">

        <!-- Head Libs -->
        <script src="{{ asset('vendor/modernizr/modernizr.js') }}"></script>

    </head>
    <body>
        <!-- start: page -->
        <section class="body-sign">
            <div class="center-sign">
                <a href="#" class="logo pull-left">
                    <img src="{{ url('img/logo.png') }}" height="54" alt="myLibrary" />
                </a>

                <div class="panel panel-sign">
                    <div class="panel-title-sign mt-xl text-right">
                        <h2 class="title text-uppercase text-weight-bold m-none"><i class="fa fa-user mr-xs"></i> Log In </h2>
                    </div>
                    <div class="panel-body">
                        <form form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group mb-lg">
                                <label>Username</label>
                                <div class="input-group input-group-icon">
                                    <input id="username" type="username" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }} input-lg" name="username" value="{{ old('username') }}" required autofocus>

                                    @if ($errors->has('username'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('username') }}</strong>
                                        </span>
                                    @endif

                                    <span class="input-group-addon">
                                        <span class="icon icon-lg">
                                            <i class="fa fa-user"></i>
                                        </span>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group mb-lg">
                                <div class="clearfix">
                                    <label class="pull-left">Password</label>
                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}" class="pull-right">Lost Password ?</a>
                                    @endif
                                    
                                </div>
                                <div class="input-group input-group-icon">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} input-lg" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif

                                    <span class="input-group-addon">
                                        <span class="icon icon-lg">
                                            <i class="fa fa-lock"></i>
                                        </span>
                                    </span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="checkbox-custom checkbox-default">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label for="RememberMe">Remember Me</label>
                                    </div>
                                </div>
                                <div class="col-sm-4 text-right">
                                    <button type="submit" class="btn btn-primary hidden-xs">Log In</button>
                                    <button type="submit" class="btn btn-primary btn-block btn-lg visible-xs mt-lg">Log In</button>
                                </div>
                            </div>

                            <br>

                        </form>
                    </div>
                </div>

                <p class="text-center text-muted mt-md mb-md">&copy; Copyright 2019 myLibrary. <br> All Rights Reserved.</p>
            </div>
        </section>
        <!-- end: page -->

        <!-- Vendor -->
        <script src="{{ asset('vendor/jquery/jquery.js') }}"></script>
        <script src="{{ asset('vendor/jquery-browser-mobile/jquery.browser.mobile.js') }}"></script>
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.js') }}"></script>
        <script src="{{ asset('vendor/nanoscroller/nanoscroller.js') }}"></script>
        <script src="{{ asset('vendor/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
        <script src="{{ asset('vendor/magnific-popup/jquery.magnific-popup.js') }}"></script>
        <script src="{{ asset('vendor/jquery-placeholder/jquery-placeholder.js') }}"></script>
        
        <!-- Theme Base, Components and Settings -->
        <script src="{{ asset('js/theme.js') }}"></script>
        
        <!-- Theme Custom -->
        <script src="{{ asset('js/theme.custom.js') }}"></script>
        
        <!-- Theme Initialization Files -->
        <script src="{{ asset('js/theme.init.js') }}"></script>

    </body>
</html>