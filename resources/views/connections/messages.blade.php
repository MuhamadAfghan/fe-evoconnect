@extends('layouts.templates')

@push('css')
    <style>
        .message-container {
            margin-bottom: 8px;
        }

        .avatar {
            min-width: 40px;
            /* Ensures the column width is fixed */
        }

        .message-bubble {
            position: relative;
            max-width: 80%;
            border-radius: 18px;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
        }

        .message-time {
            font-size: 0.7rem;
        }

        /* Styling for user's messages */
        .justify-content-end .message-bubble {
            border-top-right-radius: 5px;
            background-color: #dcf8c6;
            /* WhatsApp green bubbles */
            color: #303030;
        }

        /* Styling for other users' messages */
        .justify-content-start .message-bubble {
            border-top-left-radius: 5px;
            background-color: #f1f1f1;
            /* Light gray bubbles */
        }

        /* Style for continued messages from same sender (less spacing, connected bubbles) */
        .rounded-top-right-0 {
            border-top-right-radius: 5px !important;
        }

        .rounded-top-left-0 {
            border-top-left-radius: 5px !important;
        }

        .max-w-75 {
            max-width: 75%;
        }
    </style>
@endpush

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
                                        @if (!empty($connections))
                                            @foreach ($connections as $connection)
                                                <a href="{{ route('messages.show', $connection->id) }}"
                                                    class="d-flex align-items-center bg-light border-left border-primary border-bottom osahan-post-header overflow-hidden p-3">
                                                    <div
                                                        class="d-flex align-items-center bg-light border-left border-primary border-bottom osahan-post-header overflow-hidden p-3">
                                                        <div class="dropdown-list-image mr-3">
                                                            <img class="rounded-circle"
                                                                src="{{ $connection->profile_photo_url }}"
                                                                alt="{{ $connection->name }}">
                                                        </div>
                                                        <div class="font-weight-bold mr-1 overflow-hidden">
                                                            <div class="text-truncate">{{ $connection->name }}</div>
                                                            <div class="small text-truncate text-black-50 overflow-hidden">
                                                                @if ($connection->fromMe)
                                                                    <i class="feather-check"></i>
                                                                @endif
                                                                {{ $connection->latest_message }}
                                                            </div>
                                                        </div>
                                                        <span class="mb-auto ml-auto">
                                                            <div class="text-muted small pt-1 text-right">
                                                                {{ $connection->latest_message_time ?? now()->format('h:i A') }}
                                                            </div>
                                                        </span>
                                                    </div>
                                                </a>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                            {{-- ini bagian room chat --}}
                            <div class="col-lg-7 col-xl-8 px-0">
                                @isset($room_chat)
                                    <div class="d-flex align-items-center border-bottom osahan-post-header p-3">
                                        <div class="font-weight-bold mr-1 overflow-hidden">
                                            <div class="text-truncate">{{ $room_chat->name }}
                                            </div>
                                            <div class="small text-truncate text-black-50 overflow-hidden">
                                                {{ $room_chat->email }}
                                            </div>
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
                                        @forelse ($spesific_messages as $message)
                                            @if (
                                                $loop->index === 0 ||
                                                    $spesific_messages[$loop->index - 1]->created_at->format('Y-m-d') !== $message->created_at->format('Y-m-d'))
                                                <div class="my-3 text-center">
                                                    <span class="small rounded bg-white px-3 py-2 shadow-sm">
                                                        @if ($message->created_at->isToday())
                                                            Today
                                                        @else
                                                            {{ $message->created_at->format('d-m-Y') }}
                                                        @endif
                                                    </span>
                                                </div>
                                            @endif

                                            @php
                                                $isCurrentUser = $message->fromUser->id === auth()->id();
                                                $showSender =
                                                    $loop->index === 0 ||
                                                    $spesific_messages[$loop->index - 1]->fromUser->id !==
                                                        $message->fromUser->id;
                                                $continuedMessage = !$showSender;
                                            @endphp

                                            <div
                                                class="message-container d-flex {{ $isCurrentUser ? 'justify-content-end' : 'justify-content-start' }} mb-2">
                                                @if (!$isCurrentUser)
                                                    <div class="avatar align-self-start mr-2"
                                                        style="width: 40px; height: 40px;">
                                                        @if ($showSender)
                                                            <img class="rounded-circle" width="40" height="40"
                                                                src="{{ $message->fromUser->profile_photo_url }}"
                                                                alt="">
                                                        @endif
                                                    </div>
                                                @endif

                                                <div class="message-content {{ $isCurrentUser ? 'ml-auto' : '' }} max-w-75">
                                                    @if ($showSender && !$isCurrentUser)
                                                        <div class="sender-name small text-muted mb-1">
                                                            {{ $message->fromUser->name }}</div>
                                                    @endif

                                                    <div
                                                        class="message-bubble {{ $isCurrentUser ? 'bg-primary text-white' : 'bg-light' }} {{ $continuedMessage ? ($isCurrentUser ? 'rounded-top-right-0 mt-1' : 'rounded-top-left-0 mt-1') : '' }} rounded-lg p-2 px-3">
                                                        {{ $message->content }}
                                                        <div
                                                            class="message-time small {{ $isCurrentUser ? 'text-white-50' : 'text-muted' }} mt-1 text-right">
                                                            {{ $message->created_at->format('h:iA') }}
                                                        </div>
                                                    </div>
                                                </div>

                                                @if ($isCurrentUser)
                                                    <div class="avatar align-self-start ml-2"
                                                        style="width: 40px; height: 40px;">
                                                        @if ($showSender)
                                                            <img class="rounded-circle" width="40" height="40"
                                                                src="{{ auth()->user()->profile_photo_url }}" alt="">
                                                        @endif
                                                    </div>
                                                @endif
                                            </div>
                                        @empty
                                            <div class="p-5 text-center">
                                                <img src="img/evoconnect-logo.png" alt="EvoConnect Logo" class="mb-3"
                                                    width="150">
                                                <p class="lead">Mulai percakapan dengan teman Anda sekarang!</p>
                                            </div>
                                        @endforelse
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
                                @else
                                    <div class="p-5 text-center">
                                        <p class="lead">Mulai percakapan dengan teman Anda sekarang!</p>
                                    </div>
                                @endisset
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
    {{-- ini js untuk menangani chatan --}}
    <script>
        // document.addEventListener("DOMContentLoaded", function() {
        //     const connections = document.querySelectorAll(".d-flex.align-items-center.bg-light");
        //     const chatRoom = document.querySelector(".col-lg-7.col-xl-8.px-0");
        //     const chatHeader = chatRoom.querySelector(".osahan-post-header .font-weight-bold .text-truncate");
        //     const chatStatus = chatRoom.querySelector(".osahan-post-header .small.text-black-50");
        //     const defaultContent = `<div class="text-center p-5">
    //                             <img src="img/evoconnect-logo.png" alt="EvoConnect Logo" class="mb-3" width="150">
    //                             <p class="lead">"Setiap langkah kecil membawa perubahan besar."</p>
    //                             <p>Mulai percakapan dengan teman Anda sekarang!</p>
    //                         </div>`;

        //     chatRoom.querySelector(".osahan-chat-box").innerHTML = defaultContent;

        //     connections.forEach(connection => {
        //         connection.addEventListener("click", function() {
        //             connections.forEach(c => c.classList.remove("border-primary", "bg-light"));
        //             this.classList.add("border-primary", "bg-white");

        //             const userId = this.getAttribute("data-user-id");
        //             const userName = this.querySelector(".text-truncate").textContent.trim();
        //             const userStatus = this.querySelector(".small.text-black-50").textContent
        //                 .trim();

        //             chatHeader.textContent = userName;
        //             chatStatus.textContent = userStatus;
        //             // append /messages/{userId} to the current URL
        //             const url = window.location.href.split("/").slice(0, -1).join("/") +
        //                 `/messages/${userId}`;

        //             chatRoom.querySelector(".osahan-chat-box").innerHTML = `<div class="d-flex align-items-center osahan-post-header">
    //             <div class="dropdown-list-image mb-auto mr-3">
    //                 <img class="rounded-circle" src="img/user-placeholder.png" alt="">
    //             </div>
    //             <div class="mr-1">
    //                 <div class="text-truncate h6 mb-3">${userName}</div>
    //                 <p>Hai ${userName}, ayo mulai percakapan!</p>
    //             </div>
    //             <span class="mb-auto ml-auto">
    //                 <div class="text-muted small pt-1 text-right">${new Date().toLocaleTimeString()}</div>
    //             </span>
    //         </div>`;
        //         });
        //     });


        // });
    </script>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- slick Slider JS-->
    <script type="text/javascript" src="vendor/slick/slick.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/osahan.js"></script>
@endsection
