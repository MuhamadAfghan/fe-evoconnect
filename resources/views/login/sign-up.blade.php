<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" href="img/fav.png">
    <title>EVOConnect - Job Portal & Social Network HTML Template</title>
    <!-- Slick Slider -->
    <link rel="stylesheet" type="text/css" href="vendor/slick/slick.min.css" />
    <link rel="stylesheet" type="text/css" href="vendor/slick/slick-theme.min.css" />
    <!-- Feather Icon-->
    <link href="vendor/icons/feather.css" rel="stylesheet" type="text/css">
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
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
                            <h5 class="font-weight-bold mt-3">Join EVOConnect</h5>
                            <p class="text-muted">Make the most of your professional life</p>
                        </div>
                        <form action="{{ route('register') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="mb-1">Name</label>
                                <div class="position-relative icon-form-control">
                                    <i class="feather-user position-absolute"></i>
                                    <input type="text" class="form-control" name="name">
                                </div>
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="mb-1">Email</label>
                                <div class="position-relative icon-form-control">
                                    <i class="feather-at-sign position-absolute"></i>
                                    <input type="email" class="form-control" name="email">
                                </div>
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="mb-1">Password (6 or more characters)</label>
                                <div class="position-relative icon-form-control">
                                    <i class="feather-unlock position-absolute"></i>
                                    <input type="password" class="form-control" name="password">
                                </div>

                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="mb-1">You agree to the EVOConnect <a href="{{ route('terms.term') }}"
                                        target="blank">User Agreement</a>, and
                                    <a href="{{ route('privacy') }}" target="blank">Privacy Policy</a>.</label>
                            </div>
                            <button class="btn btn-primary btn-block text-uppercase" type="submit"> Agree & Join
                            </button>
                            <div class="border-bottom mt-3 pb-3 text-center">
                                <p class="small text-muted">Or login with</p>
                                <div class="mt-4 flex items-center justify-end align-middle">

                                    <a href="{{ route('auth.google') }}">

                                        <img src="https://developers.google.com/identity/images/btn_google_signin_dark_normal_web.png"
                                            style="margin-left: 3em;">

                                    </a>

                                </div>
                            </div>
                            <div class="d-flex align-item-center py-3">
                                <a href="{{ route('forgot-password') }}">Forgot password?</a>
                                <span class="ml-auto"> Already on EVOConnect? <a class="font-weight-bold"
                                        href="{{ route('login') }}">Sign in</a></span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- alert section --}}
    <div style="position: fixed; top: 20px; right: 20px; z-index: 1000;">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> {{ session('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if (session('warning'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Warning!</strong> {{ session('warning') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
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
