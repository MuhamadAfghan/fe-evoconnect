@extends('layouts.templates')

@section('content')
    <div class="py-4">
        <div class="container">
            <div class="row">
                <!-- Main Content -->
                <main class="col col-xl-9 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
                    {{-- ini bagian header di dalam nya ada h5 yang berisi judul dan search messages  --}}
                    <div class="box osahan-chat mb-3 rounded bg-white shadow-sm">
                        <h5 class="border-bottom mb-0 pb-3 pl-3 pr-3 pt-3">Messaging</h5>
                        <div class="row m-0">
                            <div class="border-right col-lg-5 col-xl-4 px-0">
                                <div class="osahan-chat-left">
                                    <div class="position-relative icon-form-control border-bottom p-3">
                                        <i class="feather-search position-absolute"></i>
                                        <input placeholder="Search messages" type="text" class="form-control">
                                    </div>
                                    <div class="p-3">
                                        @foreach ($connections as $connection)
                                            {{-- @php
                                                // Tentukan siapa teman kita
                                                $friend =
                                                    $connection->fromUser->id == auth()->id()
                                                        ? $connection->toUser
                                                        : $connection->fromUser;
                                            @endphp --}}

                                            <div
                                                class="d-flex align-items-center bg-light border-left border-primary border-bottom osahan-post-header overflow-hidden p-3">
                                                <div class="dropdown-list-image mr-3">
                                                    <img class="rounded-circle" src="{{ $connection->profile_photo_url }}"
                                                        alt="{{ $connection->name }}">
                                                </div>
                                                <div class="font-weight-bold mr-1 overflow-hidden">
                                                    <div class="text-truncate">{{ $connection->name }}</div>
                                                    <div class="small text-truncate text-black-50 overflow-hidden">
                                                        <i class="feather-check"></i> {{ $connection->status ?? 'Online' }}
                                                    </div>
                                                </div>
                                                <span class="mb-auto ml-auto">
                                                    <div class="text-muted small pt-1 text-right">
                                                        {{ now()->format('h:i A') }}</div>
                                                </span>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            {{-- ini bagian room chat --}}
                            <div class="col-lg-7 col-xl-8 px-0">
                                <div class="d-flex align-items-center border-bottom osahan-post-header p-3">
                                    <div class="font-weight-bold mr-1 overflow-hidden">
                                        <div class="text-truncate">{{ $connection->name }}
                                        </div>
                                        <div class="small text-truncate text-black-50 overflow-hidden">Askbootstap.com -
                                            Become a Product Manager with super power</div>
                                    </div>
                                    <span class="ml-auto">
                                        <button type="button" class="btn btn-light btn-sm rounded">
                                            <i class="feather-phone"></i>
                                        </button>
                                        <button type="button" class="btn btn-light btn-sm rounded">
                                            <i class="feather-video"></i>
                                        </button>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-light btn-sm rounded"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="feather-more-vertical"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <button class="dropdown-item" type="button"><i class="feather-trash"></i>
                                                    Delete</button>
                                                <button class="dropdown-item" type="button"><i
                                                        class="feather-x-circle"></i> Turn Off</button>
                                            </div>
                                        </div>
                                    </span>
                                </div>
                                <div class="osahan-chat-box border-top border-bottom bg-light p-3">
                                    <div class="my-3 text-center">
                                        <span class="small rounded bg-white px-3 py-2 shadow-sm">DEC 21, 2020</span>
                                    </div>
                                    <div class="d-flex align-items-center osahan-post-header">
                                        <div class="dropdown-list-image mb-auto mr-3"><img class="rounded-circle"
                                                src="img/p1.png" alt=""></div>
                                        <div class="mr-1">
                                            <div class="text-truncate h6 mb-3">Carl Jenkins
                                            </div>
                                            <p>Hi Marie</p>
                                            <p>welcome to Live Chat! My name is Jason. How can I help you today?
                                                <a href="#">{{ auth()->user()->email }}</a>
                                            </p>
                                        </div>
                                        <span class="mb-auto ml-auto">
                                            <div class="text-muted small pt-1 text-right">00:21PM</div>
                                        </span>
                                    </div>
                                </div>
                                <div class="w-100 border-top border-bottom">
                                    <textarea placeholder="Write a message…" class="form-control border-0 p-3 shadow-none" rows="2"></textarea>
                                </div>
                                <div class="d-flex align-items-center p-3">
                                    <div class="overflow-hidden">
                                        <button type="button" class="btn btn-light btn-sm rounded">
                                            <i class="feather-image"></i>
                                        </button>
                                        <button type="button" class="btn btn-light btn-sm rounded">
                                            <i class="feather-paperclip"></i>
                                        </button>
                                        <button type="button" class="btn btn-light btn-sm rounded">
                                            <i class="feather-camera"></i>
                                        </button>
                                    </div>
                                    <span class="ml-auto">
                                        <button type="button" class="btn btn-primary btn-sm rounded">
                                            <i class="feather-send"></i> Send
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                {{-- ini bagian sidebar menage my network --}}
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
@endsection
