@extends('layouts.templates')

@section('content')
    <div class="py-4">
        <div class="container">
            <div class="row">
                <!-- Main Content -->
                <main class="col col-xl-9 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
                    <div class="box osahan-share-post mb-3 rounded border bg-white shadow-sm">
                        <h5 class="border-bottom mb-0 pb-3 pl-3 pr-3 pt-3">More suggestions for you</h5>
                        <ul class="nav border-bottom osahan-line-tab" id="myTab" role="tablist">
                            {{-- <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                    aria-controls="home" aria-selected="true">People</a>
                            </li> --}}
                            {{-- <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                    aria-controls="profile" aria-selected="false">Groups</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                                    aria-controls="contact" aria-selected="false">Pages</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="type-tab" data-toggle="tab" href="#type" role="tab"
                                    aria-controls="type" aria-selected="false">Hashtags</a>
                            </li> --}}
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel"
                                aria-labelledby="home-tab">
                                <div class="p-3">
                                    <div class="row">
                                        @foreach ($users as $user)
                                            <div class="col-md-4">
                                                {{-- rute profile untuk mengarahkan user ke halaman profile --}}
                                                <a href="{{ route('profile') }}">
                                                    <div class="network-item mb-3 rounded border">
                                                        <div class="d-flex align-items-center network-item-header p-3">
                                                            <div class="dropdown-list-image mr-3">
                                                                <img class="rounded-circle"
                                                                    src="{{ $user->getProfileImage() }}" alt="">
                                                            </div>
                                                            <div class="font-weight-bold">
                                                                <h6 class="font-weight-bold text-dark mb-0">
                                                                    {{ $user->name }}</h6>
                                                                <div class="small text-black-50">Photographer at Photography
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="d-flex align-items-center border-top border-bottom network-item-body p-3">
                                                            <div class="overlap-rounded-circle">
                                                                <img class="rounded-circle shadow-sm" data-toggle="tooltip"
                                                                    data-placement="top" title="{{ $user->name }}"
                                                                    src="img/p1.png" alt="">
                                                                <img class="rounded-circle shadow-sm" data-toggle="tooltip"
                                                                    data-placement="top" title="John Doe" src="img/p2.png"
                                                                    alt="">
                                                                <img class="rounded-circle shadow-sm" data-toggle="tooltip"
                                                                    data-placement="top" title="Julia Cox" src="img/p3.png"
                                                                    alt="">
                                                                <img class="rounded-circle shadow-sm" data-toggle="tooltip"
                                                                    data-placement="top" title="Robert Cook"
                                                                    src="img/p4.png" alt="">
                                                                <img class="rounded-circle shadow-sm" data-toggle="tooltip"
                                                                    data-placement="top" title="{{ $user->name }}"
                                                                    src="img/p5.png" alt="">
                                                            </div>
                                                            <span class="font-weight-bold small text-primary">4 mutual
                                                                connections</span>
                                                        </div>
                                                        <div class="network-item-footer d-flex py-3 text-center">
                                                            <div class="col-6 pl-3 pr-1">
                                                                <button type="button"
                                                                    class="btn btn-primary btn-sm btn-block connect-btn">
                                                                    Connect
                                                                </button>
                                                            </div>
                                                            {{-- <div class="col-6 pl-1 pr-3">
                                                        <button type="button"
                                                            class="btn btn-outline-primary btn-sm btn-block follow-btn">
                                                            Follow </button>
                                                    </div> --}}
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        @endforeach
                                        <!-- Repeat for other profiles -->
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="w-100 p-3">
                                    <h6>Soon in next free update</h6>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                <div class="w-100 p-3">
                                    <h6>Soon in next free update</h6>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="type" role="tabpanel" aria-labelledby="type-tab">
                                <div class="w-100 p-3">
                                    <h6>Soon in next free update</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <aside class="col col-xl-3 order-xl-2 col-lg-12 order-lg-2 col-12">
                    <div class="box list-sidebar mb-3 rounded border bg-white shadow-sm">
                        <div class="box-title p-3">
                            <h6 class="m-0">Manage my network</h6>
                        </div>
                        <ul class="list-group list-group-flush">
                            <a href="#">
                                <li class="list-group-item d-flex align-items-center text-dark pl-3 pr-3"><i
                                        class="feather-users text-dark mr-2"></i> Connections <span
                                        class="font-weight-bold ml-auto">68</span></li>
                            </a>
                            <a href="#">
                                <li class="list-group-item d-flex align-items-center text-dark pl-3 pr-3"><i
                                        class="feather-book text-dark mr-2"></i> Contacts <span
                                        class="font-weight-bold ml-auto">869</span></li>
                            </a>
                            <a href="#">
                                <li class="list-group-item d-flex align-items-center text-dark pl-3 pr-3"><i
                                        class="feather-user-check text-dark mr-2"></i> People I Follow <span
                                        class="font-weight-bold ml-auto">156</span></li>
                            </a>
                            <a href="#">
                                <li class="list-group-item d-flex align-items-center text-dark pl-3 pr-3"><i
                                        class="feather-message-circle text-dark mr-2"></i> Groups <span
                                        class="font-weight-bold ml-auto">15</span></li>
                            </a>
                            <a href="#">
                                <li class="list-group-item d-flex align-items-center text-dark pl-3 pr-3"><i
                                        class="feather-clipboard text-dark mr-2"></i> Page <span
                                        class="font-weight-bold ml-auto">3</span></li>
                            </a>
                            <a href="#">
                                <li class="list-group-item d-flex align-items-center text-dark pl-3 pr-3"><i
                                        class="feather-tag text-dark mr-2"></i> Hashtag <span
                                        class="font-weight-bold ml-auto">8</span></li>
                            </a>
                        </ul>
                    </div>
                    <div class="box ads-box mb-3 rounded border bg-white text-center shadow-sm">
                        <div class="image-overlap-2 pt-4">
                            <img src="img/l4.png" class="img-fluid rounded-circle shadow-sm" alt="Responsive image">
                            <img src="img/user.png" class="img-fluid rounded-circle shadow-sm" alt="Responsive image">
                        </div>
                        <div class="border-bottom p-3">
                            <h6 class="text-dark">Gurdeep, grow your career by following <span class="font-weight-bold">
                                    Askbootsrap</span></h6>
                            <p class="text-muted mb-0">Stay up-to industry trends!</p>
                        </div>
                        <div class="p-3">
                            <button type="button" class="btn btn-outline-primary btn-sm pl-4 pr-4"> FOLLOW </button>
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
        $(document).ready(function() {
            $('.connect-btn').click(function() {
                var button = $(this);
                if (button.text().trim() === "Connect") {
                    button.text("Connected");
                    button.removeClass('btn-primary').addClass('btn-secondary');
                } else {
                    button.text("Connect");
                    button.removeClass('btn-secondary').addClass('btn-primary');
                }
            });
        });
    </script>
@endsection
