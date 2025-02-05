<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Data dasar -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Icon -->
    <link rel="icon" type="image/png" href="img/fav.png">

    <!-- Judul halaman -->
    <title>EVOConnect - Job Portal & Social Network HTML Template</title>

    <!-- Slick Slider CSS -->
    <link rel="stylesheet" type="text/css" href="vendor/slick/slick.min.css" />
    <link rel="stylesheet" type="text/css" href="vendor/slick/slick-theme.min.css" />

    <!-- Feather Icon CSS -->
    <link href="vendor/icons/feather.css" rel="stylesheet" type="text/css">

    <!-- Bootstrap CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
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
    <!-- Bagian utama halaman -->
    <div class="bg-white">
        <div class="container">
            <div class="row justify-content-center align-items-center d-flex vh-100">
                <div class="col-md-4 mx-auto">
                    <!-- Kotak login -->
                    <div class="osahan-login py-4">
                        <!-- Header login -->
                        <div class="mb-4 text-center">
                            <img src="{{ asset('img/logo1.png') }}" alt="" class="logo-evo">
                            <h5 class="font-weight-bold mt-3">Welcome Back</h5>
                            <p class="text-muted">Don't miss your next opportunity. Sign in to stay updated on your
                                professional world.</p>
                        </div>
                        <!-- Form login ini digunakan untuk autentikasi pengguna -->
                        {{-- Route ini -({{route('home')}})- digunakan untuk mengarahkan pengguna ke halaman home --}}
                        <form action="{{ route('login.store') }}" method="POST">
                            @csrf
                            <!-- Input untuuk email atau nomor telepon -->
                            <div class="form-group">
                                <label class="mb-1">Email or Phone</label>
                                <div class="position-relative icon-form-control">
                                    <i class="feather-user position-absolute"></i>
                                    <input type="email" class="form-control" name="email">
                                </div>
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <!-- Input untuk password -->
                            <div class="form-group">
                                <label class="mb-1">Password</label>
                                <div class="position-relative icon-form-control">
                                    <i class="feather-unlock position-absolute"></i>
                                    <input type="password" class="form-control" name="password">
                                </div>
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <!-- Untuk Checkbox remember password -->
                            <div class="custom-control custom-checkbox mb-3">
                                <input type="checkbox" class="custom-control-input" id="customCheck1" name="remember">
                                <label class="custom-control-label" for="customCheck1">Remember password</label>
                            </div>
                            <!-- Tombol ketika kita ingin submit form login -->
                            <button class="btn btn-primary btn-block text-uppercase" type="submit"> Sign in </button>

                            <!-- Opsi login mennggunakam media sosial -->
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

                            <!--terdapat link untuk lupa password dan daftar akun baru -->
                            <div class="d-flex align-item-center py-3">
                                {{-- Route ketika kita lupa password dan akan mengarahkan ke file forgot-password --}}
                                <a href="{{ route('forgot-password') }}">Forgot password?</a>
                                {{-- Route ketika kita tidak mempunyai akun dan harus membuatnya terlebih dahulu, route ini akan mengarahkan ke file sign-up --}}
                                <span class="ml-auto"> New to EVOConnect? <a class="font-weight-bold"
                                        href="{{ route('register') }}">Join now</a></span>
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

    <!-- JavaScript inti Bootstrap -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- slick Slider JavaScript -->
    <script type="text/javascript" src="vendor/slick/slick.min.js"></script>

    <!-- JavaScript custom untuk halaman ini -->
    <script src="js/osahan.js"></script>
</body>

</html>
