@extends('errors.templates')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card">
                <div class="card-body text-center">
                    <img src="{{ asset('img/gmail.jpg') }}" alt="Email Verification" class="mb-4" style="max-width: 70px;">
                    <h4 class="mb-3">Verifikasi Email Anda</h4>

                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            Link verifikasi baru telah dikirim ke email Anda.
                        </div>
                    @endif

                    <p class="mb-4">
                        Sebelum melanjutkan, silakan periksa email Anda untuk link verifikasi.
                        Jika Anda tidak menerima email tersebut,
                    </p>

                    <form method="POST" action="{{ route('verification.resend') }}" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-primary">
                            Kirim Ulang Link Verifikasi
                        </button>
                    </form>

                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-danger">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
