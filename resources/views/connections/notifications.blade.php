@extends('layouts.templates')

@section('content')
    @if (session('success') && !session('notification_disable'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error') && !session('notification_disable'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="bg-light min-vh-100 py-4">
        <div class="container">
            <div class="row">
                <!-- Left Sidebar -->
                <aside class="col col-xl-3 order-xl-1 col-lg-6 order-lg-2 col-md-6 col-sm-6 col-12">
                    <div class="box mb-3 rounded-lg bg-white text-center shadow-sm">
                        <img src="img/job1.png" class="img-fluid" alt="Notification Banner">
                        <div class="border-bottom p-3">
                            <h6 class="font-weight-bold text-dark">Notifications</h6>
                            <p class="text-muted mb-0">You're all caught up! Check back later for new notifications</p>
                        </div>
                        <div class="p-3">
                            <button type="button" class="btn btn-outline-primary px-4">View settings</button>
                        </div>
                    </div>

                    <div class="box profile-box mb-3 rounded-lg border bg-white text-center shadow-sm">
                        <div class="p-5">
                            <img src="img/clogo2.png" class="img-fluid" alt="Company Logo">
                        </div>
                        <div class="border-top border-bottom p-3">
                            <h5 class="font-weight-bold text-dark mb-1 mt-0">Envato</h5>
                            <p class="text-muted mb-0">Melbourne, AU</p>
                        </div>
                        <div class="p-3">
                            <div class="d-flex align-items-top mb-2">
                                <p class="text-muted mb-0">Posted</p>
                                <p class="font-weight-bold text-dark mb-0 ml-auto">1 day ago</p>
                            </div>
                            <div class="d-flex align-items-top">
                                <p class="text-muted mb-0">Applicant Rank</p>
                                <p class="font-weight-bold text-dark mb-0 ml-auto">25</p>
                            </div>
                        </div>
                    </div>
                </aside>

                <!-- Main Content -->
                <main class="col col-xl-6 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
                    <!-- Recent Notifications -->
                    <div class="box mb-3 rounded-lg border bg-white shadow-sm">
                        <div class="box-title border-bottom p-3">
                            <h6 class="font-weight-bold m-0">Recent</h6>
                        </div>
                        <div class="box-body p-0">
                            <!-- Daily Rundown Wednesday -->
                            <div class="d-flex align-items-center bg-light border-bottom p-3">
                                <div class="mr-3">
                                    <img class="rounded-circle" src="img/p6.png" width="50" height="50"
                                        alt="">
                                </div>
                                <div class="flex-grow-1 mr-3">
                                    <div class="text-truncate font-weight-bold">DAILY RUNDOWN: WEDNESDAY</div>
                                    <div class="small text-muted">Income tax sops on the cards, The bias in VC funding, and
                                        other top news for you</div>
                                </div>
                                <div class="text-right">
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-light btn-sm rounded" data-toggle="dropdown">
                                            <i class="feather-more-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <button class="dropdown-item" type="button">
                                                <i class="feather-trash"></i> Delete
                                            </button>
                                            <button class="dropdown-item" type="button">
                                                <i class="feather-x-circle"></i> Turn Off
                                            </button>
                                        </div>
                                    </div>
                                    <div class="text-muted small mt-2">3d</div>
                                </div>
                            </div>

                            <!-- Job Notification -->
                            <div class="d-flex align-items-center p-3">
                                <div class="mr-3">
                                    <img class="rounded-circle" src="img/l2.png" width="50" height="50"
                                        alt="">
                                </div>
                                <div class="flex-grow-1 mr-3">
                                    <div class="mb-2">We found a job at askbootstrap Ltd that you may be interested in
                                        Vivamus imperdiet venenatis est...</div>
                                    <button type="button" class="btn btn-outline-primary btn-sm">View Jobs</button>
                                </div>
                                <div class="text-right">
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-light btn-sm rounded" data-toggle="dropdown">
                                            <i class="feather-more-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <button class="dropdown-item" type="button">
                                                <i class="feather-trash"></i> Delete
                                            </button>
                                            <button class="dropdown-item" type="button">
                                                <i class="feather-x-circle"></i> Turn Off
                                            </button>
                                        </div>
                                    </div>
                                    <div class="text-muted small mt-2">4d</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earlier Notifications -->
                    <div class="box mb-3 rounded-lg border bg-white shadow-sm">
                        <div class="box-title border-bottom p-3">
                            <h6 class="font-weight-bold m-0">Earlier</h6>
                        </div>
                        <div class="box-body p-0">
                            <!-- Repeat this block for each earlier notification -->
                            <div class="d-flex align-items-center border-bottom p-3">
                                <div class="d-flex align-items-center justify-content-center rounded-circle bg-danger mr-3 text-white"
                                    style="width: 50px; height: 50px">
                                    DRM
                                </div>
                                <div class="flex-grow-1 mr-3">
                                    <div class="text-truncate font-weight-bold">DAILY RUNDOWN: MONDAY</div>
                                    <div class="small text-muted">Nunc purus metus, aliquam vitae venenatis sit amet, porta
                                        non est.</div>
                                </div>
                                <div class="text-right">
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-light btn-sm rounded" data-toggle="dropdown">
                                            <i class="feather-more-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <button class="dropdown-item" type="button">
                                                <i class="feather-trash"></i> Delete
                                            </button>
                                            <button class="dropdown-item" type="button">
                                                <i class="feather-x-circle"></i> Turn Off
                                            </button>
                                        </div>
                                    </div>
                                    <div class="text-muted small mt-2">3d</div>
                                </div>
                            </div>
                            <!-- Add more notification items here -->
                        </div>
                    </div>
                </main>

                <!-- Right Sidebar -->
                <aside class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-6 col-12">
                    <!-- Alert Button -->
                    <button type="button" class="btn btn-lg btn-block btn-danger mb-3">
                        <i class="feather-bell"></i> Set alert for jobs
                    </button>

                    <!-- Similar Jobs -->
                    <div class="box mb-3 rounded-lg border bg-white shadow-sm">
                        <div class="box-title border-bottom p-3">
                            <h6 class="font-weight-bold m-0">Similar Jobs</h6>
                        </div>
                        <div class="box-body p-3">
                            <a href="{{ route('job-profile') }}" class="text-decoration-none">
                                <div class="job-item mb-3 rounded border bg-white shadow-sm">
                                    <div class="d-flex align-items-center p-3">
                                        <div class="mr-auto">
                                            <h6 class="font-weight-bold text-dark mb-1">Product Director</h6>
                                            <div class="text-primary">Spotify Inc.</div>
                                            <div class="small text-muted">
                                                <i class="feather-map-pin"></i> India, Punjab
                                            </div>
                                        </div>
                                        <img class="ml-3" src="img/l3.png" width="40" alt="">
                                    </div>
                                    <div class="d-flex align-items-center border-top p-3">
                                        <div class="overlap-rounded-circle">
                                            <img class="rounded-circle shadow-sm" src="img/p9.png" alt=""
                                                width="30" height="30">
                                            <img class="rounded-circle shadow-sm" src="img/p10.png" alt=""
                                                width="30" height="30">
                                            <img class="rounded-circle shadow-sm" src="img/p11.png" alt=""
                                                width="30" height="30">
                                        </div>
                                        <span class="font-weight-bold text-muted ml-2">18 connections</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- Profile Views -->
                    <div class="box mb-3 rounded-lg border bg-white shadow-sm">
                        <div class="box-title border-bottom p-3">
                            <h6 class="font-weight-bold m-0">Who viewed your profile</h6>
                        </div>
                        <div class="box-body p-3">
                            <div class="d-flex align-items-center mb-3">
                                <div class="position-relative mr-3">
                                    <img class="rounded-circle" src="img/p4.png" width="50" height="50"
                                        alt="">
                                    <div
                                        class="status-indicator {{ auth()->user()->isOnline() ? 'bg-success' : 'bg-secondary' }}">
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="font-weight-bold">Sophia Lee</div>
                                    <div class="small text-muted">@Harvard</div>
                                </div>
                                <button type="button" class="btn btn-light btn-sm connect-btn">Connect</button>
                            </div>
                            <!-- Add more profile viewers here -->
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Connect button functionality
            document.querySelectorAll(".connect-btn").forEach(function(button) {
                button.addEventListener("click", function() {
                    if (this.innerText === "Connect") {
                        this.innerText = "Connected";
                        this.classList.remove("btn-light");
                        this.classList.add("btn-primary");
                    } else {
                        this.innerText = "Connect";
                        this.classList.remove("btn-primary");
                        this.classList.add("btn-light");
                    }
                });
            });

            // Initialize tooltips
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Slick Slider JS-->
    <script type="text/javascript" src="vendor/slick/slick.min.js"></script>
    <!-- Custom scripts -->
    <script src="js/osahan.js"></script>
@endsection
