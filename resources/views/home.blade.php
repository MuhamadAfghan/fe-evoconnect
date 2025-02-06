@extends('layouts.templates')

@section('content')
    <div class="py-4">
        <div class="container">
            <div class="row">
                <!-- Main Content -->
                <main class="col col-xl-6 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
                    <div class="box osahan-share-post mb-3 rounded border bg-white shadow-sm">
                        <ul class="nav nav-justified border-bottom osahan-line-tab" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                    aria-controls="home" aria-selected="true"><i class="feather-edit"></i> Share an
                                    update</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                    aria-controls="profile" aria-selected="false"><i class="feather-image"></i> Upload a
                                    photo</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                                    aria-controls="contact" aria-selected="false"><i class="feather-clipboard"></i> Write an
                                    article</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel"
                                aria-labelledby="home-tab">
                                <div class="d-flex align-items-center w-100 p-3" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/user.png" alt="">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="w-100">
                                        <textarea placeholder="Write your thoughts..." class="form-control border-0 p-0 shadow-none" rows="1"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="w-100 p-3">
                                    <textarea placeholder="Write your thoughts..." class="form-control border-0 p-0 shadow-none" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                <div class="w-100 p-3">
                                    <textarea placeholder="Write an article..." class="form-control border-0 p-0 shadow-none" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="border-top d-flex align-items-center p-3">
                            <!-- <div class="mr-auto"><a href="#" class="text-link small"><i class="feather-map-pin"></i>
                                                            Add Location</a></div> -->
                            <div class="flex-shrink-1">
                                <button type="button" class="btn btn-primary btn-sm">Post Status</button>
                            </div>
                        </div>
                    </div>
                    <div class="box osahan-post mb-3 rounded border bg-white shadow-sm">
                        <div class="d-flex align-items-center border-bottom osahan-post-header p-3">
                            <div class="dropdown-list-image mr-3">
                                <img class="rounded-circle" src="img/p5.png" alt="">
                                <div class="status-indicator bg-success"></div>
                            </div>
                            <div class="font-weight-bold">
                                <div class="text-truncate">Tobia Crivellari</div>
                                <div class="small text-gray-500">Product Designer at askbootstrap</div>
                            </div>
                            <span class="small ml-auto">3 hours</span>
                        </div>
                        <div class="border-bottom osahan-post-body p-3">
                            <p class="mb-0">Tmpo incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco <a href="#">laboris consequat.</a></p>
                        </div>
                        <div class="border-bottom osahan-post-footer p-3">
                            <a href="#" class="text-secondary mr-3"><i class="feather-heart text-danger"></i> 16</a>
                            <a href="#" class="text-secondary mr-3"><i class="feather-message-square"></i> 8</a>
                        </div>
                        <div class="p-3">
                            <button type="button" class="btn btn-outline-primary btn-sm mr-1">Awesome!!</button>
                            <button type="button" class="btn btn-light btn-sm mr-1">😍</button>
                            <button type="button" class="btn btn-outline-secondary btn-sm mr-1">Whats it about?</button>
                            <button type="button" class="btn btn-outline-secondary btn-sm mr-1">Oooo Great Wow</button>
                        </div>
                    </div>
                    <div class="box osahan-slider-main mb-3 rounded bg-white shadow-sm">
                        <div class="osahan-slider">
                            <div class="osahan-slider-item">
                                <a href="{{ route('job-profile') }}">
                                    <div class="job-item job-item mb-3 mr-2 mt-3 rounded border bg-white shadow-sm">
                                        <div class="d-flex align-items-center job-item-header p-3">
                                            <div class="mr-2 overflow-hidden">
                                                <h6 class="font-weight-bold text-dark text-truncate mb-0">UI/UX designer
                                                </h6>
                                                <div class="text-truncate text-primary">Envato</div>
                                                <div class="small text-gray-500"><i class="feather-map-pin"></i> India,
                                                    Punjab</div>
                                            </div>
                                            <img class="img-fluid ml-auto" src="img/l1.png" alt="">
                                        </div>
                                        <div class="d-flex align-items-center border-top border-bottom job-item-body p-3">
                                            <div class="overlap-rounded-circle d-flex">
                                                <img class="rounded-circle shadow-sm" data-toggle="tooltip"
                                                    data-placement="top" title="" src="img/p1.png" alt=""
                                                    data-original-title="Sophia Lee">
                                                <img class="rounded-circle shadow-sm" data-toggle="tooltip"
                                                    data-placement="top" title="" src="img/p2.png" alt=""
                                                    data-original-title="John Doe">
                                                <img class="rounded-circle shadow-sm" data-toggle="tooltip"
                                                    data-placement="top" title="" src="img/p3.png" alt=""
                                                    data-original-title="Julia Cox">
                                                <img class="rounded-circle shadow-sm" data-toggle="tooltip"
                                                    data-placement="top" title="" src="img/p4.png" alt=""
                                                    data-original-title="Robert Cook">
                                                <img class="rounded-circle shadow-sm" data-toggle="tooltip"
                                                    data-placement="top" title="" src="img/p5.png" alt=""
                                                    data-original-title="Sophia Lee">
                                            </div>
                                            <span class="font-weight-bold text-primary">18 connections</span>
                                        </div>
                                        <div class="job-item-footer p-3">
                                            <small class="text-gray-500"><i class="feather-clock"></i> Posted 3 Days
                                                ago</small>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="osahan-slider-item">
                                <a href="{{ route('job-profile') }}">
                                    <div class="job-item job-item mb-3 mr-2 mt-3 rounded border bg-white shadow-sm">
                                        <div class="d-flex align-items-center job-item-header p-3">
                                            <div class="mr-2 overflow-hidden">
                                                <h6 class="font-weight-bold text-dark text-truncate mb-0">.NET Developer
                                                </h6>
                                                <div class="text-truncate text-primary">Invision</div>
                                                <div class="small text-gray-500"><i class="feather-map-pin"></i> London,
                                                    UK
                                                </div>
                                            </div>
                                            <img class="img-fluid ml-auto" src="img/l4.png" alt="">
                                        </div>
                                        <div class="d-flex align-items-center border-top border-bottom job-item-body p-3">
                                            <div class="overlap-rounded-circle d-flex">
                                                <img class="rounded-circle shadow-sm" data-toggle="tooltip"
                                                    data-placement="top" title="" src="img/p13.png" alt=""
                                                    data-original-title="Sophia Lee">
                                                <img class="rounded-circle shadow-sm" data-toggle="tooltip"
                                                    data-placement="top" title="" src="img/p1.png" alt=""
                                                    data-original-title="John Doe">
                                                <img class="rounded-circle shadow-sm" data-toggle="tooltip"
                                                    data-placement="top" title="" src="img/p2.png" alt=""
                                                    data-original-title="Julia Cox">
                                                <img class="rounded-circle shadow-sm" data-toggle="tooltip"
                                                    data-placement="top" title="" src="img/p3.png" alt=""
                                                    data-original-title="Robert Cook">
                                            </div>
                                            <span class="font-weight-bold text-primary">18 connections</span>
                                        </div>
                                        <div class="job-item-footer p-3">
                                            <small class="text-gray-500"><i class="feather-clock"></i> Posted 3 Days
                                                ago</small>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="osahan-slider-item">
                                <a href="{{ route('job-profile') }}">
                                    <div class="job-item job-item mb-3 mr-2 mt-3 rounded border bg-white shadow-sm">
                                        <div class="d-flex align-items-center job-item-header p-3">
                                            <div class="mr-2 overflow-hidden">
                                                <h6 class="font-weight-bold text-dark text-truncate mb-0">Channel Sales
                                                    Director</h6>
                                                <div class="text-truncate text-primary">Slack Inc.</div>
                                                <div class="small text-gray-500"><i class="feather-map-pin"></i> London,
                                                    UK
                                                </div>
                                            </div>
                                            <img class="img-fluid ml-auto" src="img/l7.png" alt="">
                                        </div>
                                        <div class="d-flex align-items-center border-top border-bottom job-item-body p-3">
                                            <div class="overlap-rounded-circle d-flex">
                                                <img class="rounded-circle shadow-sm" data-toggle="tooltip"
                                                    data-placement="top" title="" src="img/p12.png" alt=""
                                                    data-original-title="Sophia Lee">
                                                <img class="rounded-circle shadow-sm" data-toggle="tooltip"
                                                    data-placement="top" title="" src="img/p13.png" alt=""
                                                    data-original-title="John Doe">
                                                <img class="rounded-circle shadow-sm" data-toggle="tooltip"
                                                    data-placement="top" title="" src="img/p2.png" alt=""
                                                    data-original-title="Julia Cox">
                                            </div>
                                            <span class="font-weight-bold text-primary">18 connections</span>
                                        </div>
                                        <div class="job-item-footer p-3">
                                            <small class="text-gray-500"><i class="feather-clock"></i> Posted 3 Days
                                                ago</small>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="box osahan-post mb-3 rounded border bg-white shadow-sm">
                        <div class="d-flex align-items-center border-bottom osahan-post-header p-3">
                            <div class="dropdown-list-image mr-3">
                                <img class="rounded-circle" src="img/p6.png" alt="">
                                <div class="status-indicator bg-success"></div>
                            </div>
                            <div class="font-weight-bold">
                                <div class="text-truncate">Collin Weiland</div>
                                <div class="small text-gray-500">Web Developer @Google</div>
                            </div>
                            <span class="small ml-auto">3 hours</span>
                        </div>
                        <div class="border-bottom osahan-post-body p-3">
                            <p>Lorem ipsum dolor sit amet, consectetur 😍😎 adipisicing elit, sed do eiusmod tempo
                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                exercitation ullamco <a href="#">laboris consequat.</a></p>
                            <img src="img/post1.png" class="img-fluid" alt="Responsive image">
                        </div>
                        <div class="border-bottom osahan-post-footer p-3">
                            <a href="#" class="text-secondary mr-3"><i class="feather-heart text-danger"></i>
                                16</a>
                            <a href="#" class="text-secondary mr-3"><i class="feather-message-square"></i> 8</a>
                        </div>
                        <div class="d-flex align-items-top border-bottom osahan-post-comment p-3">
                            <div class="dropdown-list-image mr-3">
                                <img class="rounded-circle" src="img/p7.png" alt="">
                                <div class="status-indicator bg-success"></div>
                            </div>
                            <div class="font-weight-bold">
                                <div class="text-truncate"> James Spiegel <span class="small float-right">2 min</span>
                                </div>
                                <div class="small text-gray-500">Ratione voluptatem sequi en lod nesciunt. Neque porro
                                    quisquam est, quinder dolorem ipsum quia dolor sit amet, consectetur</div>
                            </div>
                        </div>
                        <div class="p-3">
                            <textarea placeholder="Add Comment..." class="form-control border-0 p-0 shadow-none" rows="1"></textarea>
                        </div>
                    </div>
                </main>
                <aside class="col col-xl-3 order-xl-1 col-lg-6 order-lg-2 col-md-6 col-sm-6 col-12">
                    <div class="box profile-box mb-3 rounded border bg-white text-center shadow-sm">
                        <div class="border-bottom px-3 py-4">
                            <img src="img/p1.png" class="img-fluid rounded-circle mt-2" alt="Responsive image">
                            <h5 class="font-weight-bold text-dark mb-1 mt-4">
                                {{ auth()->user()->firstname . ' ' . auth()->user()->lastname }}</h5>
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
                    <!-- <div class="box ads-box mb-3 rounded bg-white text-center shadow-sm">
                                                                <img src="img/job1.png" class="img-fluid" alt="Responsive image">
                                                                <div class="border-bottom p-3">
                                                                    <h6 class="font-weight-bold text-dark">EVOConnect Solutions</h6>
                                                                    <p class="text-muted mb-0">Looking for talent?</p>
                                                                </div>
                                                                <div class="p-3">
                                                                    <button type="button" class="btn btn-outline-primary pl-4 pr-4"> POST A JOB </button>
                                                                </div>
                                                            </div> -->
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
                                <span class="ml-auto"><button id="followBtn" type="button"
                                        class="btn btn-light btn-sm"><i id="followIcon"
                                            class="feather-user-plus"></i></button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="box mb-3 rounded border bg-white shadow-sm">
                        <div class="box-title border-bottom d-flex align-items-center p-3">
                            <h6 class="m-0">Photos</h6>
                            <a class="ml-auto" href="#">See All <i class="feather-chevron-right"></i></a>
                        </div>
                        <div class="box-body p-3">
                            <div class="gallery-box-main">
                                <div class="gallery-box">
                                    <img class="img-fluid" src="img/p4.png" alt="">
                                    <img class="img-fluid" src="img/p5.png" alt="">
                                    <img class="img-fluid" src="img/p6.png" alt="">
                                </div>
                                <div class="gallery-box">
                                    <img class="img-fluid" src="img/p7.png" alt="">
                                    <img class="img-fluid" src="img/p8.png" alt="">
                                    <img class="img-fluid" src="img/p9.png" alt="">
                                </div>
                                <div class="gallery-box">
                                    <img class="img-fluid" src="img/p10.png" alt="">
                                    <img class="img-fluid" src="img/p11.png" alt="">
                                    <img class="img-fluid" src="img/p12.png" alt="">
                                </div>
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
                            <button type="button" class="btn btn-outline-gold pl-4 pr-4"> ACTIVATE </button>
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
                                            <img class="rounded-circle shadow-sm" data-toggle="tooltip"
                                                data-placement="top" title="" src="img/p9.png" alt=""
                                                data-original-title="Sophia Lee">
                                            <img class="rounded-circle shadow-sm" data-toggle="tooltip"
                                                data-placement="top" title="" src="img/p10.png" alt=""
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
@endsection
