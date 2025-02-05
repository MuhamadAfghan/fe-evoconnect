@extends('layouts.templates')

@section('content')
    <div class="profile-cover text-center">
        <img class="img-fluid" src="img/job-profile.jpg" alt="">
    </div>
    <div class="border-bottom bg-white shadow-sm">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex align-items-center py-3">
                        <div class="profile-left">
                            <h5 class="font-weight-bold text-dark mb-1 mt-0">Senior Ruby Developer</h5>
                            <p class="text-muted mb-0"><a class="font-weight-bold mr-2" href="#">Envato</a> <i
                                    class="feather-map-pin"></i> Melbourne, AU -- DatePosted 2 weeks ago</p>
                        </div>
                        <div class="profile-right ml-auto">
                            <button type="button" class="btn btn-light mr-1"> &nbsp; Save &nbsp; </button>
                            <button type="button" class="btn btn-primary"> &nbsp; Apply &nbsp; </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="py-4">
        <div class="container">
            <div class="row">
                <!-- Main Content -->

                <main class="col col-xl-6 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">

                    <div class="box mb-3 rounded border bg-white shadow-sm">
                        <div class="box-title border-bottom p-3">
                            <h6 class="m-0">Overview</h6>
                        </div>
                        <div class="box-body p-3">
                            <p>Headquartered in Melbourne, Australia, Envato is a completely online company with an
                                ecosystem of sites and services to help people get creative. We’ve consistently been named
                                as one of the Best Places to Work in Australia, since 2015, in the BRW Awards , and we’ve
                                also been awarded the title of Australia's Coolest Company for Women and Diversity by
                                JobAdvisor.</p>
                            <p class="mb-0">Envato was found in 2006 and, since then, we’ve helped a community of creative
                                sellers earn more than $500 Million . Millions of people around the world choose our
                                marketplace, studio and courses to buy files, hire freelancers, or learn the skills needed
                                to build websites, videos, apps, graphics and more. Find out more at Envato Market , Envato
                                Elements , Envato Sites , Envato Studio and Tuts+... <a class="font-weight-bold mr-2"
                                    href="#">Read More</a>
                            </p>
                        </div>
                    </div>
                    <div class="box mb-3 rounded border bg-white shadow-sm">
                        <div class="box-title border-bottom p-3">
                            <h6 class="m-0">Job Details</h6>
                        </div>
                        <div class="box-body">
                            <table class="table-borderless mb-0 table">
                                <tbody>
                                    <tr class="border-bottom">
                                        <th class="p-3">Seniority Level</th>
                                        <td class="p-3">Mid-Senior level
                                        </td>
                                    </tr>
                                    <tr class="border-bottom">
                                        <th class="p-3">Industry</th>
                                        <td class="p-3">Internet Information Technology & Services</td>
                                    </tr>
                                    <tr class="border-bottom">
                                        <th class="p-3">Employment Type</th>
                                        <td class="p-3">Full-time
                                        </td>
                                    </tr>
                                    <tr class="border-bottom">
                                        <th class="p-3">Job Functions</th>
                                        <td class="p-3">Other</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="box osahan-post mb-3 rounded border bg-white shadow-sm">
                        <div class="d-flex align-items-center border-bottom osahan-post-header p-3">
                            <div class="dropdown-list-image mr-3">
                                <img class="rounded-circle" src="img/p6.png" alt="">
                            </div>
                            <div class="font-weight-bold">
                                <div class="text-truncate">Envato</div>
                                <div class="small text-gray-500">Internet | 24,044 followers</div>
                            </div>
                            <span class="ml-auto"><button type="button" class="btn btn-light"><i class="feather-plus"></i>
                                    Follow</button></span>
                        </div>
                        <img src="img/post1.png" class="img-fluid" alt="Responsive image">
                        <div class="osahan-post-body p-3">
                            <h5 class="mb-3">About us</h5>
                            <p>Welcome! We’re so happy you found us. Since you’ve come this far, we’d love to take the
                                opportunity to introduce ourselves.</p>
                            <p class="mb-0">Our story starts in 2006 with three founders in a Sydney garage (no, we’re not
                                kidding). Born from a desire to earn a living doing what they loved, with the flexibility to
                                do it from anywhere, Envato set out to create an online community for buying and selling
                                creative digital assets. Nearly 13 years later, we’re profitable and still totally
                                bootstrapped. This allows us to stay super experimental and totally focused on the best
                                interests of our authors and customers around the world.
                            </p>
                        </div>
                        <div class="border-top overflow-hidden text-center">
                            <a class="font-weight-bold d-block p-3" href="#"> READ MORE </a>
                        </div>
                    </div>

                </main>
                <aside class="col col-xl-3 order-xl-1 col-lg-6 order-lg-2 col-md-6 col-sm-6 col-12">
                    <div class="box profile-box mb-3 rounded border bg-white text-center shadow-sm">
                        <div class="p-5">
                            <img src="img/clogo2.png" class="img-fluid" alt="Responsive image">
                        </div>
                        <div class="border-top border-bottom p-3">
                            <h5 class="font-weight-bold text-dark mb-1 mt-0">Envato</h5>
                            <p class="text-muted mb-0">Melbourne, AU
                            </p>
                        </div>
                        <div class="p-3">
                            <div class="d-flex align-items-top mb-2">
                                <p class="text-muted mb-0">Posted</p>
                                <p class="font-weight-bold text-dark mb-0 ml-auto mt-0">1 day ago</p>
                            </div>
                            <div class="d-flex align-items-top">
                                <p class="text-muted mb-0">Applicant Rank</p>
                                <p class="font-weight-bold text-dark mb-0 ml-auto mt-0">25</p>
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
                    {{-- <div class="box ads-box mb-3 rounded bg-white text-center shadow-sm">
                        <img src="img/job1.png" class="img-fluid" alt="Responsive image">
                        <div class="border-bottom p-3">
                            <h6 class="font-weight-bold text-dark">Osahan Solutions</h6>
                            <p class="text-muted mb-0">Looking for talent?</p>
                        </div>
                        <div class="p-3">
                            <button type="button" class="btn btn-outline-primary pl-4 pr-4"> POST A JOB </button>
                        </div>
                    </div> --}}
                </aside>
                <aside class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-6 col-12">
                    <button type="button" class="btn btn-lg btn-block btn-danger mb-3"> <i class="feather-bell"></i> Set
                        alert for jobs </button>
                    <div class="box mb-3 rounded border bg-white shadow-sm">
                        <div class="box-title border-bottom p-3">
                            <h6 class="m-0">Similar Jobs
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
                    <div class="box mb-3 rounded border bg-white shadow-sm">
                        <div class="box-title border-bottom p-3">
                            <h6 class="m-0">Who viewed your profile</h6>
                        </div>
                        <div class="box-body p-3">
                            <div class="d-flex align-items-center osahan-post-header people-list mb-3">
                                <div class="dropdown-list-image mr-3">
                                    <img class="rounded-circle" src="img/p4.png" alt="">
                                    <div class="status-indicator bg-success"></div>
                                </div>
                                <div class="font-weight-bold mr-2">
                                    <div class="text-truncate">Sophia Lee</div>
                                    <div class="small text-gray-500">@Harvard
                                    </div>
                                </div>
                                <span class="ml-auto"><button type="button"
                                        class="btn btn-outline-primary btn-sm">Connent</button>
                                </span>
                            </div>
                            <div class="d-flex align-items-center osahan-post-header people-list mb-3">
                                <div class="dropdown-list-image mr-3">
                                    <img class="rounded-circle" src="img/p9.png" alt="">
                                    <div class="status-indicator bg-success"></div>
                                </div>
                                <div class="font-weight-bold mr-2">
                                    <div class="text-truncate">John Doe</div>
                                    <div class="small text-gray-500">Traveler
                                    </div>
                                </div>
                                <span class="ml-auto"><button type="button"
                                        class="btn btn-outline-primary btn-sm">Connent</button>
                                </span>
                            </div>
                            <div class="d-flex align-items-center osahan-post-header people-list mb-3">
                                <div class="dropdown-list-image mr-3">
                                    <img class="rounded-circle" src="img/p10.png" alt="">
                                    <div class="status-indicator bg-success"></div>
                                </div>
                                <div class="font-weight-bold mr-2">
                                    <div class="text-truncate">Julia Cox</div>
                                    <div class="small text-gray-500">Art Designer
                                    </div>
                                </div>
                                <span class="ml-auto"><button type="button"
                                        class="btn btn-outline-primary btn-sm">Connent</button>
                                </span>
                            </div>
                            <div class="d-flex align-items-center osahan-post-header people-list mb-3">
                                <div class="dropdown-list-image mr-3">
                                    <img class="rounded-circle" src="img/p11.png" alt="">
                                    <div class="status-indicator bg-success"></div>
                                </div>
                                <div class="font-weight-bold mr-2">
                                    <div class="text-truncate">Robert Cook</div>
                                    <div class="small text-gray-500">@Photography
                                    </div>
                                </div>
                                <span class="ml-auto"><button type="button"
                                        class="btn btn-outline-primary btn-sm">Connent</button>
                                </span>
                            </div>
                            <div class="d-flex align-items-center osahan-post-header people-list">
                                <div class="dropdown-list-image mr-3">
                                    <img class="rounded-circle" src="img/p12.png" alt="">
                                    <div class="status-indicator bg-success"></div>
                                </div>
                                <div class="font-weight-bold mr-2">
                                    <div class="text-truncate">Richard Bell</div>
                                    <div class="small text-gray-500">@Envato
                                    </div>
                                </div>
                                <span class="ml-auto"><button type="button"
                                        class="btn btn-outline-primary btn-sm">Connent</button>
                                </span>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="box ads-box mb-3 rounded bg-white text-center shadow-sm">
                        <img src="img/ads1.png" class="img-fluid" alt="Responsive image">
                        <div class="border-bottom p-3">
                            <h6 class="font-weight-bold text-gold">Osahanin Premium</h6>
                            <p class="text-muted mb-0">Grow &amp; nurture your network</p>
                        </div>
                        <div class="p-3">
                            <button type="button" class="btn btn-outline-gold pl-4 pr-4"> ACTIVATE </button>
                        </div>
                    </div> --}}
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
@endsection
