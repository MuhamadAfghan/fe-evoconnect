@extends('login.templates')

@section('content')
    <div class="col-md-4 mx-auto">
        <!-- Kotak login -->
        <div class="osahan-login py-4">
            <!-- Header login -->
            <div class="mb-4 text-center">
                <img src="{{ asset('img/logo1.png') }}" alt="" class="logo-evo">
                <p class="text-muted">Buat Username</p>
            </div>
            <!-- Form login ini digunakan untuk autentikasi pengguna -->
            {{-- Route ini -({{route('home')}})- digunakan untuk mengarahkan pengguna ke halaman home --}}
            <form action="{{ route('auth.store-username') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="mb-1">Username</label>
                    <div class="position-relative icon-form-control">
                        <i class="feather-user position-absolute"></i>
                        <input type="text" class="form-control" name="username" value="{{ old('username') }}">
                    </div>
                    @if ($errors->has('username'))
                        <span class="text-danger">{{ $errors->first('username') }}</span>
                    @endif
                </div>
                <!-- Tombol ketika kita ingin submit form login -->
                <button class="btn btn-primary btn-block text-uppercase" type="submit">Lanjutkan</button>

            </form>
        </div>
    </div>
@endsection
