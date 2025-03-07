<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{ asset('img/logo2.png') }}">
    <title>EVOConnect - Job Portal & Social Media</title>
    <!-- Slick Slider -->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/slick/slick.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/slick/slick-theme.min.css') }}" />
    <!-- Feather Icon-->
    <link href="{{ asset('vendor/icons/feather.css') }}" rel="stylesheet" type="text/css">
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <!-- Slick CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
    <!-- bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">



    <style>
        trix-editor ul,
        .trix-result ul {
            list-style-type: disc;
            margin-left: 1.5em;
        }

        trix-editor ol,
        .trix-result ol {
            list-style-type: decimal;
            margin-left: 1.5em;
        }

        trix-editor blockquote,
        .trix-result blockquote {
            margin-left: 0;
            padding-left: 1em;
            border-left: 2px solid #ccc;
        }

        trix-editor a,
        .trix-result a {
            color: #007bff;
            text-decoration: underline;
        }

        pre {
            white-space: pre-wrap;
            /* Mengizinkan teks untuk wrap secara responsif */
            overflow-x: auto;
            /* Memunculkan scroll horizontal jika teks terlalu lebar */
            padding: 10px;
            margin: 10px 0;
            background-color: #f8f8f8;
            border-inline-start: 5px solid #ccc;
        }

        * img {
            object-fit: cover;
        }

        .bg-primary {
            background-color: #0796E5 !important;
        }

        #searchButton {
            background-color: #fafbfc !important;
        }

        /* css search */
        .custom-search {
            border-top-left-radius: 20px;
            border-bottom-left-radius: 20px;
            padding: 10px 20px;
            transition: all 0.3s ease;
        }

        .custom-search:focus {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            outline: none;
        }

        .custom-search-btn {
            border-top-right-radius: 20px;
            border-bottom-right-radius: 20px;
            /* background-color: #28a745; */
            color: white;
            border: none;
            transition: all 0.3s ease;
        }

        .custom-search-btn:hover {
            background-color: grey;
            color: white;
        }

        .custom-search-btn:focus {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            outline: none;
        }
    </style>

    @stack('css')
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand navbar-dark bg-primary osahan-nav-top p-1">
        <div class="container">
            <a class="navbar-brand mr-2" href="{{ route('home') }}"><img src="{{ asset('img/logo1.png') }}"
                    alt="logo"></a>
            <form class="d-none d-sm-inline-block form-inline my-md-0 mw-100 navbar-search my-2 mr-auto">
                <div class="input-group">
                    <input type="text" class="form-control custom-search border-0 shadow-none" id="searchButton"
                        placeholder="Search people, jobs & more..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn custom-search-btn" type="button" id="searchButton">
                            <i class="feather-search"></i>
                        </button>
                    </div>
                </div>
            </form>
            <ul class="navbar-nav d-flex align-items-center ml-auto">
                <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                <li class="nav-item dropdown no-arrow d-sm-none">
                    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="feather-search mr-2"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right animated--grow-in p-3 shadow-sm"
                        aria-labelledby="searchDropdown">
                        <form class="form-inline w-100 navbar-search mr-auto">
                            <div class="input-group">
                                <input type="text" class="form-control border-0 shadow-none"
                                    placeholder="Search people, jobs and more..." aria-label="Search"
                                    aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn" type="button">
                                        <i class="feather-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('jobs.index') }}"><i class="feather-briefcase mr-2"></i><span
                            class="d-none d-lg-inline">Jobs</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('connect.index') }}"><i class="feather-users mr-2"></i><span
                            class="d-none d-lg-inline">Connection</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('blogs') }}">
                        <i class="bi bi-pen mr-2"></i><span class="d-none d-lg-inline">Blog</span>
                    </a>
                </li>
                @if (env('SHOW_LIST_PAGES'))
                    <li class="nav-item dropdown mr-2">
                        <a class="nav-link dropdown-toggle pr-0" href="#" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="feather-file-text mr-2"></i><span class="d-none d-lg-inline">Pages</span>
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow-sm">
                            <a class="dropdown-item" href="{{ route('jobs.index') }}"><i
                                    class="feather-briefcase mr-1"></i>
                                Jobs</a>
                            <a class="dropdown-item" href="{{ route('profile') }}"><i class="feather-user mr-1"></i>
                                Profile</a>
                            <a class="dropdown-item" href="{{ route('connect.index') }}"><i
                                    class="feather-users mr-1"></i>
                                Connection</a>
                            {{-- <a class="dropdown-item" href="{{ route('company-profile') }}"><i
                                    class="feather-user-plus mr-1"></i> Company Profile</a> --}}
                            <a class="dropdown-item" href="{{ route('job-profile') }}"><i
                                    class="feather-globe mr-1"></i>
                                Job Profile</a>
                            <a class="dropdown-item" href="{{ route('messages.index') }}"><i
                                    class="feather-message-circle mr-1"></i> Messages</a>
                            <a class="dropdown-item" href="{{ route('notifications') }}"><i
                                    class="feather-bell mr-1"></i> Notifications</a>
                            {{-- <a class="dropdown-item" href="{{ route('not-found') }}"><i
                                    class="feather-alert-triangle mr-1"></i> 404 Not Found</a> --}}
                            <a class="dropdown-item" href="{{ route('faq') }}"><i
                                    class="feather-help-circle mr-1"></i>
                                FAQ</a>
                            <a class="dropdown-item" href="{{ route('terms.term') }}"><i
                                    class="feather-book mr-1"></i>
                                Terms</a>
                            <a class="dropdown-item" href="{{ route('privacy') }}"><i class="feather-list mr-1"></i>
                                Privacy</a>
                            <a class="dropdown-item" href="{{ route('blogs') }}"><i class="feather-book mr-1"></i>
                                Blog</a>
                            {{-- <a class="dropdown-item" href="{{ route('blog-single') }}"><i
                                    class="feather-book-open mr-1"></i> Blog Single</a> --}}
                            <a class="dropdown-item" href="{{ route('create-blog') }}"><i
                                    class="feather-book-open mr-1"></i> Create Blog</a>
                            <a class="dropdown-item" href="{{ route('contact') }}"><i
                                    class="feather-mail mr-1"></i>Contact</a>
                            <a class="dropdown-item" href="{{ route('pricing') }}"><i
                                    class="feather-credit-card mr-1"></i> Pricing</a>
                            <a class="dropdown-item" href="{{ route('maintenance') }}"><i
                                    class="feather-clock mr-1"></i> Maintence</a>
                            <a class="dropdown-item" href="{{ route('coming-soon') }}"><i
                                    class="feather-cloud mr-1"></i> Coming Soon</a>
                            <a class="dropdown-item" href="{{ route('components') }}"><i
                                    class="feather-list mr-1"></i>
                                Components</a>
                            <a class="dropdown-item" href="{{ route('login') }}"><i class="feather-log-in mr-1"></i>
                                Sign In</a>
                            <a class="dropdown-item" href="{{ route('register') }}"><i
                                    class="feather-lock mr-1"></i>
                                Sign Up</a>
                        </div>
                    </li>
                @endif
                <li class="nav-item dropdown no-arrow osahan-list-dropdown mx-1">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="feather-message-square"></i>
                        <!-- Counter - Alerts -->
                        <span class="badge badge-danger badge-counter">8</span>
                    </a>
                    <!-- Dropdown - Alerts -->
                    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow-sm">
                        <h6 class="dropdown-header">
                            Message Center
                        </h6>
                        <a class="dropdown-item d-flex align-items-center" href="{{ route('messages.index') }}">
                            <div class="dropdown-list-image mr-3">
                                <img class="rounded-circle" src="img/p1.png" alt="">
                                <div
                                    class="status-indicator {{ auth()->user()->isOnline() ? 'bg-success' : 'bg-secondary' }}">
                                </div>
                            </div>
                            <div class="font-weight-bold overflow-hidden">
                                <div class="text-truncate">Hi there! I am wondering if you can help me with a problem
                                    I've been having.</div>
                                <div class="small text-gray-500">Emily Fowler · 58m</div>
                            </div>
                        </a>
                        <a class="dropdown-item d-flex align-items-center" href="{{ route('messages.index') }}">
                            <div class="dropdown-list-image mr-3">
                                <img class="rounded-circle" src="img/p2.png" alt="">
                                <div class="status-indicator"></div>
                            </div>
                            <div class="overflow-hidden">
                                <div class="text-truncate">I have the photos that you ordered last month, how would you
                                    like them sent to you?</div>
                                <div class="small text-gray-500">Jae Chun · 1d</div>
                            </div>
                        </a>
                        <a class="dropdown-item d-flex align-items-center" href="{{ route('messages.index') }}">
                            <div class="dropdown-list-image mr-3">
                                <img class="rounded-circle" src="img/p3.png" alt="">
                                <div class="status-indicator bg-warning"></div>
                            </div>
                            <div class="overflow-hidden">
                                <div class="text-truncate">Last month's report looks great, I am very happy with the
                                    progress so far, keep up the good work!</div>
                                <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                            </div>
                        </a>
                        <a class="dropdown-item d-flex align-items-center" href="{{ route('messages.index') }}">
                            <div class="dropdown-list-image mr-3">
                                <img class="rounded-circle" src="img/p4.png" alt="">
                                <div
                                    class="status-indicator {{ auth()->user()->isOnline() ? 'bg-success' : 'bg-secondary' }}">
                                </div>
                            </div>
                            <div class="overflow-hidden">
                                <div class="text-truncate">Am I a good boy? The reason I ask is because someone told me
                                    that people say this to all dogs, even if they aren't good...</div>
                                <div class="small text-gray-500">Chicken the Dog · 2w</div>
                            </div>
                        </a>
                        <a class="dropdown-item small text-center text-gray-500"
                            href="{{ route('messages.index') }}">Read
                            More Messages</a>
                    </div>
                </li>
                <li class="nav-item dropdown no-arrow osahan-list-dropdown mx-1">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="feather-bell"></i>
                        <!-- Counter - Alerts -->
                        <span class="badge badge-info badge-counter">6</span>
                    </a>
                    <!-- Dropdown - Alerts -->
                    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow-sm">
                        <h6 class="dropdown-header">
                            Alerts Center
                        </h6>
                        {{-- @if (isset($notifications) && $notifications->isEmpty())
                            <p>No new notifications.</p>
                        @else --}}
                        {{-- @foreach ($notifications as $notification) --}}
                        <a class="dropdown-item d-flex align-items-center" href="{{ route('notifications') }}">
                            <div class="mr-3">
                                <div class="icon-circle bg-primary">
                                    <i class="feather-download-cloud text-white"></i>
                                </div>
                            </div>
                            <div>
                                <div class="small text-gray-500">
                                    {{-- {{ $notification->created_at->format('F j, Y') }} --}}
                                </div>
                                {{-- <span class="font-weight-bold">{{ $notification->message }}</span> --}}
                            </div>
                        </a>
                        {{-- @endforeach
                        @endif --}}


                        <a class="dropdown-item d-flex align-items-center" href="{{ route('notifications') }}">
                            <div class="mr-3">
                                <div class="icon-circle bg-success">
                                    <i class="feather-edit text-white"></i>
                                </div>
                            </div>
                            <div>
                                <div class="small text-gray-500">December 7, 2019</div>
                                $290.29 has been deposited into your account!
                            </div>
                        </a>
                        <a class="dropdown-item d-flex align-items-center" href="{{ route('notifications') }}">
                            <div class="mr-3">
                                <div class="icon-circle bg-warning">
                                    <i class="feather-folder text-white"></i>
                                </div>
                            </div>
                            <div>
                                <div class="small text-gray-500">December 2, 2019</div>
                                Spending Alert: We've noticed unusually high spending for your account.
                            </div>
                        </a>
                        <a class="dropdown-item small text-center text-gray-500"
                            href="{{ route('notifications') }}">Show All Alerts</a>
                    </div>
                </li>
                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow osahan-profile-dropdown ml-1">
                    <a class="nav-link dropdown-toggle pr-0" href="#" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <img class="img-profile rounded-circle" src="{{ auth()->user()->getProfileImage() }}">
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow-sm">
                        <div class="d-flex align-items-center p-3">
                            <div class="dropdown-list-image mr-3">
                                <img class="rounded-circle" src="{{ auth()->user()->getProfileImage() }}"
                                    alt="">
                                <div
                                    class="status-indicator {{ auth()->user()->isOnline() ? 'bg-success' : 'bg-secondary' }}">
                                </div>
                            </div>
                            <div class="font-weight-bold">
                                <div class="text-truncate">
                                    {{ auth()->user()->name }}
                                </div>
                                <div class="small text-gray-500">{{ auth()->user()->headline }}</div>
                            </div>
                        </div>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('profile') }}"><i class="feather-user mr-1"></i> My
                            Account</a>
                        <a class="dropdown-item" href="{{ route('edit-profile') }}"><i
                                class="feather-edit mr-1"></i> Edit Profile</a>
                        <div class="dropdown-divider"></div>
                        {{-- <a class="dropdown-item" href="{{ route('login') }}"><i class="feather-log-out mr-1"></i>
                            Logout</a> --}}
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="dropdown-item" type="submit"><i class="feather-log-out mr-1"></i>
                                Logout</button>
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <audio id="notif-sound" src="{{ asset('music/notif.mp3') }}"></audio>

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
    {{-- <audio id="notif-sound" src="{{ asset('assets/music/notif.mp3') }}"></audio> --}}
    @stack('js')
    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    <script>
        const sendNotifSound = () => {
            const audio = document.getElementById("notif-sound");
            audio.play();
        };

        window.addEventListener('load', async (ev) => {
            // Connect to pusher
            const pusher = new Pusher("{{ env('PUSHER_APP_KEY') }}", {
                cluster: "{{ env('PUSHER_APP_CLUSTER') }}"
            })

            // Connect to chat channel
            const channel = pusher.subscribe('chat-channel')

            // Listen for chat-send event
            channel.bind('chat-send', async (data) => {
                if (window.location.pathname.includes('messages/chat/room')) {
                    await getChat()
                }
                console.log(data);
                if (data.sender != "{{ Auth::user()->id }}" && data.receiver ==
                    "{{ Auth::user()->id }}") {
                    sendNotifSound()
                    //
                }
            })

        });
    </script>

</body>

</html>
