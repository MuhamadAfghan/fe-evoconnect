<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" href="{{ asset('img/logo2.png') }}">
    <title>EVOConnect - Job Portal & Social Network HTML Template</title>
    <!-- Slick Slider -->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/slick/slick.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/slick/slick-theme.min.css') }}" />
    <!-- Feather Icon-->
    <link href="{{ asset('vendor/icons/feather.css') }}" rel="stylesheet" type="text/css">
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <style>
        .logo-evo {
            display: block;
            max-width: 100%;
            height: auto;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <div class="bg-white">
        <div class="container">
            <div class="row justify-content-center align-items-center d-flex vh-100">
                <div class="col-md-4 mx-auto">
                    <div class="osahan-login py-4">
                        <div class="mb-4 text-center">
                            <img src="{{ asset('img/logo1.png') }}" alt="" class="logo-evo">
                            <h5 class="font-weight-bold mt-3">Reset Password</h5>
                            <p class="text-muted">
                                Fill in the form below to reset your password
                            </p>
                        </div>
                        <form action="{{ route('password.update') }}" method="POST">
                            @csrf

                            {{-- <input type="hidden" name="token" value="{{ $request->route('token') }}"> --}}
                            <input type="hidden" name="token" value="{{ $token }}">
                            <div class="form-group">
                                <label class="mb-1">Email</label>
                                <div class="position-relative icon-form-control">
                                    <i class="feather-user position-absolute"></i>
                                    <input type="email" name="email" class="form-control"
                                        value="{{ request()->query('email') }}">
                                </div>
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="mb-1">Password</label>
                                <div class="position-relative icon-form-control">
                                    <i class="feather-lock position-absolute"></i>
                                    <input type="password" name="password" class="form-control">
                                </div>
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="mb-1">Confirm Password</label>
                                <div class="position-relative icon-form-control">
                                    <i class="feather-lock position-absolute"></i>
                                    <input type="password" name="password_confirmation" class="form-control">
                                </div>
                                @if ($errors->has('password_confirmation'))
                                    <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                @endif
                            </div>

                            {{-- <div class="form-group">
                                <div class="g-recaptcha" data-sitekey="{{ env('CAPTCHA_SITE_KEY') }}"></div>
                                @if ($errors->has('g-recaptcha-response'))
                                    <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
                                @endif
                            </div> --}}

                            <button class="btn btn-primary btn-block text-uppercase" type="submit">Confirm
                            </button>
                            <div class="d-flex align-item-center py-3">
                                <a href="{{ route('login') }}">Sign In</a>
                                <span class="ml-auto"><a class="font-weight-bold" href="{{ route('register') }}">Create
                                        an account?</a></span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- slick Slider JS-->
    <script type="text/javascript" src="vendor/slick/slick.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/osahan.js"></script>
</body>

</html>
