@extends('layouts.templates')

@push('css')
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
@endpush

@section('content')
    <div class="py-4">
        <div class="container">
            <div class="row">
                <!-- Main Content -->
                <main class="col col-xl-6 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
                    @include('home.components.create-post')
                    @include('home.components.posts')
                </main>
                <aside class="col col-xl-3 order-xl-1 col-lg-6 order-lg-2 col-md-6 col-sm-6 col-12">
                    <div class="box profile-box mb-3 rounded border bg-white text-center shadow-sm">
                        <div class="border-bottom px-3 py-4">
                            <img src="{{ auth()->user()->profile_photo_url }}" class="img-fluid rounded-circle mt-2"
                                alt="Responsive image">
                            <h5 class="font-weight-bold text-dark mb-1 mt-4">
                                {{ auth()->user()->name }}</h5>
                            <p class="text-muted mb-0">UI / UX Designer</p>
                        </div>
                        <div class="d-flex">
                            <div class="col-6 border-right p-3">
                                <h6 class="font-weight-bold text-dark mb-1">358</h6>
                                <p class="text-black-50 small mb-0">Connections</p>
                            </div>
                            <div class="col-6 p-3">
                                <h6 class="font-weight-bold text-dark mb-1">85</h6>
                                <p class="text-black-50 small mb-0">Views</p>
                            </div>
                        </div>
                        <div class="border-top overflow-hidden">
                            <a class="font-weight-bold d-block p-3" href="{{ route('profile') }}"> View my profile </a>
                        </div>
                    </div>
                    <div class="box view-box mb-3 overflow-hidden rounded bg-white shadow-sm">
                        <div class="box-title border-bottom p-3">
                            <h6 class="m-0">Profile Views</h6>
                        </div>
                        <div class="d-flex text-center">
                            <div class="col-6 border-right px-2 py-4">
                                <h5 class="font-weight-bold text-info mb-1">08 <i class="feather-bar-chart-2"></i></h5>
                                <p class="text-black-50 small mb-0">last 5 days</p>
                            </div>
                            <div class="col-6 px-2 py-4">
                                <h5 class="font-weight-bold text-success mb-1">+ 43% <i class="feather-bar-chart"></i>
                                </h5>
                                <p class="text-black-50 small mb-0">Since last week</p>
                            </div>
                        </div>
                        <div class="border-top overflow-hidden text-center">
                            <img src="img/chart.png" class="img-fluid" alt="Responsive image">
                        </div>
                    </div>
                </aside>
                <aside class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="box mb-3 rounded border bg-white shadow-sm">
                        <div class="box-title border-bottom p-3">
                            <h6 class="m-0">People you might know</h6>
                        </div>
                        <div class="box-body p-3">
                            <div class="d-flex align-items-center osahan-post-header people-list mb-3">
                                <div class="dropdown-list-image mr-3">
                                    <img class="rounded-circle" src="img/p8.png" alt="">
                                    <div class="status-indicator bg-success"></div>
                                </div>
                                <div class="font-weight-bold mr-2">
                                    <div class="text-truncate">Bintang Asydqi</div>
                                    <div class="small text-gray-500">Student at Alexander
                                    </div>
                                </div>
                                <span class="ml-auto"><button id="followBtn" type="button" class="btn btn-light btn-sm"><i
                                            id="followIcon" class="feather-user-plus"></i></button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="box ads-box mb-3 overflow-hidden rounded bg-white text-center shadow-sm">
                        <img src="img/ads1.png" class="img-fluid" alt="Responsive image">
                        <div class="border-bottom p-3">
                            <h6 class="font-weight-bold text-gold">EVOConnect Premium</h6>
                            <p class="text-muted mb-0">Grow & nurture your network</p>
                        </div>
                        <div class="p-3">
                            <a href="{{ route('pricing') }}">
                                <button type="button" class="btn btn-outline-gold pl-4 pr-4"> ACTIVATE </button>
                            </a>
                        </div>
                    </div>
                    <div class="box mb-3 rounded border bg-white shadow-sm">
                        <div class="box-title border-bottom p-3">
                            <h6 class="m-0">Jobs
                            </h6>
                        </div>
                        <div class="box-body p-3">
                            <a href="{{ route('job-profile') }}">
                                <div class="job-item mb-3 rounded border bg-white shadow-sm">
                                    <div class="d-flex align-items-center job-item-header p-3">
                                        <div class="mr-2 overflow-hidden">
                                            <h6 class="font-weight-bold text-dark text-truncate mb-0">Product Director</h6>
                                            <div class="text-truncate text-primary">Spotify Inc.</div>
                                            <div class="small text-gray-500"><i class="feather-map-pin"></i> India, Punjab
                                            </div>
                                        </div>
                                        <img class="img-fluid ml-auto" src="img/l3.png" alt="">
                                    </div>
                                    <div class="d-flex align-items-center border-top border-bottom job-item-body p-3">
                                        <div class="overlap-rounded-circle">
                                            <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top"
                                                title="" src="img/p9.png" alt=""
                                                data-original-title="Sophia Lee">
                                            <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top"
                                                title="" src="img/p10.png" alt=""
                                                data-original-title="John Doe">
                                            <img class="rounded-circle shadow-sm" data-toggle="tooltip"
                                                data-placement="top" title="" src="img/p11.png" alt=""
                                                data-original-title="Julia Cox">
                                            <img class="rounded-circle shadow-sm" data-toggle="tooltip"
                                                data-placement="top" title="" src="img/p12.png" alt=""
                                                data-original-title="Robert Cook">
                                        </div>
                                        <span class="font-weight-bold text-muted">18 connections</span>
                                    </div>
                                    <div class="job-item-footer p-3">
                                        <small class="text-gray-500"><i class="feather-clock"></i> Posted 3 Days
                                            ago</small>
                                    </div>
                                </div>
                            </a>
                            <a href="{{ route('job-profile') }}">
                                <div class="job-item rounded border bg-white shadow-sm">
                                    <div class="d-flex align-items-center job-item-header p-3">
                                        <div class="mr-2 overflow-hidden">
                                            <h6 class="font-weight-bold text-dark text-truncate mb-0">.NET Developer</h6>
                                            <div class="text-truncate text-primary">Invision</div>
                                            <div class="small text-gray-500"><i class="feather-map-pin"></i> London, UK
                                            </div>
                                        </div>
                                        <img class="img-fluid ml-auto" src="img/l4.png" alt="">
                                    </div>
                                    <div class="d-flex align-items-center border-top border-bottom job-item-body p-3">
                                        <div class="overlap-rounded-circle">
                                            <img class="rounded-circle shadow-sm" data-toggle="tooltip"
                                                data-placement="top" title="" src="img/p13.png" alt=""
                                                data-original-title="Sophia Lee">
                                            <img class="rounded-circle shadow-sm" data-toggle="tooltip"
                                                data-placement="top" title="" src="img/p1.png" alt=""
                                                data-original-title="John Doe">
                                            <img class="rounded-circle shadow-sm" data-toggle="tooltip"
                                                data-placement="top" title="" src="img/p3.png" alt=""
                                                data-original-title="Robert Cook">
                                        </div>
                                        <span class="font-weight-bold text-muted">18 connections</span>
                                    </div>
                                    <div class="job-item-footer p-3">
                                        <small class="text-gray-500"><i class="feather-clock"></i> Posted 3 Days
                                            ago</small>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- slick Slider JS-->
    <script type="text/javascript" src="vendor/slick/slick.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/osahan.js"></script>
    <script>
        document.getElementById("followBtn").addEventListener("click", function() {
            var icon = document.getElementById("followIcon");

            if (icon.classList.contains("feather-user-plus")) {
                icon.classList.remove("feather-user-plus");
                icon.classList.add("feather-check");
            } else {
                icon.classList.remove("feather-primary");
                icon.classList.add("feather-user-plus");
            }
        });
    </script>
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
@endpush
