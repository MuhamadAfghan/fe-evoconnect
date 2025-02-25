@extends('layouts.templates')

@section('content')
    <style>
        .bg-primary {
            padding: 9em;
        }
    </style>
    {{-- ini bagian header h1 dan p --}}
    <div class="bg-primary mt-3">
        <div class="text-start">
            <h1 class="font-weight-light text-white"><span class="font-weight-bold">EVOConnect Blog</span></h1>
            <h2 class="font-weight-light text-white">Blog Your Way to a Better
                Career</h2>
            {{-- multiple modal --}}
            <div class="mt-1">
                <a href="create-blog" class="btn btn-primary">Write Your
                    Career Story</a>
            </div>
        </div>
    </div>

    {{-- ini bagian konten di dalam nya ada gambar, category, title, deskripsi  --}}
    {{-- <div class="py-5">
        <div class="col-lg-12 col-md-12">
            <div class="row">
                @foreach ($blogs as $blog)
                    <div class="col-lg-4 col-md-4">
                        <div class="box blog-card mb-3 rounded border-0 bg-white shadow-sm">
                            <div class="card-body">
                                <span class="badge badge-success">{{ $blog->category }}</span>
                                <a href="{{ route('blog-single', $blog->slug) }}">
                                    <h6 class="text-dark">{{ $blog->title }}</h6>
                                </a>
                                <p class="mb-0">{!! \Str::substr($blog->content, 0, 100) !!}</p>
                            </div>
                            <div class="card-footer border-0">
                                <p class="mb-0"><img class="rounded-circle" src="{{ $blog->user->profile_photo_url }}"
                                        alt="Card image cap">
                                    <strong>{{ $blog->user->name }}</strong> On
                                    {{ $blog->created_at->format('F d, Y') }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div> --}}
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="row">
                        @foreach ($blogs as $blog)
                            <div class="col-lg-4 col-md-4">
                                <div class="box blog-card mb-3 rounded border-0 bg-white shadow-sm">
                                    <a href="{{ route('blog-single', $blog->slug) }}">
                                        <div class="card-body">
                                            <span~ class="badge badge-success">{{ $blog->category }}</span~>

                                            <h6 class="text-dark">{{ Str::limit($blog->title, 30) }}</h6>
                                            {{-- <p class="mb-0">{!! Str::limit($blog->content, 100) !!}</p> --}}
                                            <p class="mb-0" style="white-space: normal; word-wrap: break-word;">
                                                {{ str_replace('&nbsp;', ' ', Str::limit(strip_tags($blog->content), 100)) }}
                                            </p>

                                        </div>
                                        <div class="card-footer border-0">
                                            <p class="mb-0"><img class="rounded-circle"
                                                    src="{{ $blog->user->profile_photo_url }}" alt="Card image cap">
                                                <strong>{{ $blog->user->name }}</strong>
                                                {{ $blog->created_at->format('F d, Y') }}
                                            </p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('.next-btn').forEach(button => {
            button.addEventListener('click', function() {
                let nextModal = this.getAttribute('data-next');
                let currentModal = this.closest('.modal');

                let modalHide = new bootstrap.Modal(currentModal);
                let modalShow = new bootstrap.Modal(document.getElementById(nextModal));

                modalHide.hide();
                setTimeout(() => modalShow.show(), 500);
            });
        });
    </script>
    <!-- Bootstrap core JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- slick Slider JS-->
    <script type="text/javascript" src="vendor/slick/slick.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/osahan.js"></script>
@endsection
