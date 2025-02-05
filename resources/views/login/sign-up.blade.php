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
                        <form action="{{ route('home') }}">
                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label class="mb-1">First name</label>
                                        <div class="position-relative icon-form-control">
                                            <i class="feather-user position-absolute"></i>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label class="mb-1">Last name</label>
                                        <div class="position-relative icon-form-control">
                                            <i class="feather-user position-absolute"></i>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="mb-1">Email</label>
                                <div class="position-relative icon-form-control">
                                    <i class="feather-at-sign position-absolute"></i>
                                    <input type="email" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="mb-1">Password (6 or more characters)</label>
                                <div class="position-relative icon-form-control">
                                    <i class="feather-unlock position-absolute"></i>
                                    <input type="password" class="form-control">
                                </div>
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
                                <div class="row">
                                    <div class="col-4">
                                        <button type="button" class="btn btn-sm btn-outline-instagram btn-block"><i
                                                class="feather-instagram"></i> Instagram</button>
                                    </div>
                                    <div class="col-4">
                                        <button type="button" class="btn btn-sm btn-outline-linkedin btn-block"><i
                                                class="feather-linkedin"></i> Linkedin</button>
                                    </div>
                                    <div class="col-4">
                                        <button type="button" class="btn btn-sm btn-outline-facebook btn-block"><i
                                                class="feather-facebook"></i> Facebook</button>
                                    </div>
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
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- slick Slider JS-->
    <script type="text/javascript" src="vendor/slick/slick.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/osahan.js"></script>
</body>

</html>
