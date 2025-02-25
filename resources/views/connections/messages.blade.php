@extends('layouts.templates')

@push('css')
    <style>
        .message-bubble {
            position: relative;
            transition: all 0.2s ease;
        }

        .message-content:hover .message-time {
            opacity: 1 !important;
        }

        .message-time {
            transition: opacity 0.3s ease;
            right: 8px;
            bottom: 2px;
            font-size: 0.7rem;
            background-color: rgba(0, 0, 0, 0.05);
            border-radius: 4px;
            padding: 2px 4px;
        }

        .bg-primary .message-time {
            background-color: rgba(255, 255, 255, 0.1);
        }

        /* Better spacing and alignment */
        .message-container {
            margin-bottom: 0.75rem;
            align-items: flex-start;
        }

        .message-bubble {
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
            word-break: break-word;
        }

        /* Continued message styling */
        .message-container+.message-container {
            margin-top: -0.5rem;
        }

        .max-w-75 {
            max-width: 75%;
        }

        .gap-2 {
            gap: 0.5rem;
        }

        .small {
            font-size: 0.575rem;
        }

        .text-right {
            text-align: left !important;
        }

        .preserve-whitespace {
            white-space: pre-wrap;
        }

        .rounded-top-right-0 {
            border-top-right-radius: 0 !important;
        }

        .rounded-top-left-0 {
            border-top-left-radius: 0 !important;
        }

        .mr-custom {
            margin-right: 2.230rem !important;
        }

        .ml-custom {
            margin-left: 2.230rem !important;
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
                                    <div class="osahan-chat-box border-top border-bottom bg-light p-3" id="message">
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
                                    <form id="form">
                                        <div class="w-100 border-top border-bottom">
                                            <textarea placeholder="Write a message…" name="message" class="form-control border-0 p-3 shadow-none" rows="2"></textarea>
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
                                                <button class="btn btn-primary btn-sm rounded">
                                                    <i class="feather-send"></i> Send
                                                </button>
                                            </span>
                                        </div>
                                    </form>


                                    <!-- Scroll to Bottom Button -->
                                    <button id="scrollToBottomBtn" class="btn btn-primary btn-sm rounded"
                                        style="display: none; position: fixed; bottom: 20px; right: 20px; z-index: 1000;">
                                        Scroll to Bottom
                                    </button>
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
                                        class="feather-message-circle text-dark mr-2"></i> Groups <span
                                        class="font-weight-bold ml-auto">15</span></li>
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

@endsection

@push('js')
    <!-- JavaScript inti Bootstrap -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- slick Slider JavaScript -->
    <script type="text/javascript" src="{{ asset('vendor/slick/slick.min.js') }}"></script>

    <!-- JavaScript custom untuk halaman ini -->
    <script src="{{ asset('js/osahan.js') }}"></script>

    @isset($room_chat)
        <script>
            document.querySelector('textarea[name="message"]').addEventListener('keydown', function(e) {
                // Check if the key pressed was Enter (key code 13)
                if (e.key === 'Enter') {
                    // If Shift key is also pressed, allow the default behavior (new line)
                    if (e.shiftKey) {
                        return true;
                    }
                    // If only Enter is pressed, prevent default and submit the form
                    else {
                        e.preventDefault();
                        document.getElementById('form').dispatchEvent(new Event('submit'));
                    }
                }
            });
        </script>
        <script>
            // Get chat from API
            const getChat = async () => {
                const response = await fetch('/api/messages/chat/{{ $room->id }}')
                const data = await response.json()

                // Print chat
                let chatsHTML = ''

                let lastDate = null;
                data.forEach((message, index) => {
                    // Check if date changed
                    const messageDate = new Date(message.created_at);
                    const formattedDate = messageDate.toISOString().split('T')[0];

                    if (lastDate !== formattedDate) {
                        const today = new Date().toISOString().split('T')[0];
                        chatsHTML += `
                            <div class="my-3 text-center">
                                <span class="small rounded bg-white px-3 py-2 shadow-sm">
                                    ${formattedDate === today ? 'Today' : new Date(message.created_at).toLocaleDateString()}
                                </span>
                            </div>
                        `;
                        lastDate = formattedDate;
                    }

                    const isCurrentUser = message.user_id == "{{ Auth::user()->id }}";
                    const showSender = index === 0 || data[index - 1].user_id !== message.user_id;
                    const continuedMessage = !showSender;

                    chatsHTML += `
                        <div class="message-container d-flex ${isCurrentUser ? 'justify-content-end' : 'justify-content-start'} mb-2">
                            <!-- Avatar for non-current user -->
                            ${!isCurrentUser ? `
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <div class="avatar align-self-start mr-2 flex-shrink-0">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        ${showSender ? `
                                <img class="rounded-circle" width="36" height="36" src="${message.user_photo}" alt="${message.user_name}">
                                ` : ''}
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    ` : ''}

                            <!-- Message content -->
                            <div class="message-content position-relative ${isCurrentUser ? 'ml-auto' : ''} w-auto max-w-75">
                                <!-- Sender name for non-current user -->
                                ${(showSender && !isCurrentUser) ? `
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <div class="sender-name small text-muted mb-1">${message.user_name}</div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        ` : ''}

                                <!-- Message bubble -->
                                <div class="message-bubble ${isCurrentUser ? 'bg-primary text-white' : 'bg-light'}
                                    ${continuedMessage ? (isCurrentUser ? 'rounded-top-right-0 mt-1 mr-custom' : 'rounded-top-left-0 mt-1 ml-custom') : ''}
                                    rounded-lg p-1 px-2 position-relative">

                                    <div class="d-flex align-items-end flex-wrap gap-2 ">
                                        <!-- Message content -->
                                        <div class="preserve-whitespace">${message.message.replace(/\n/g, '<br>')}</div>

                                        <!-- Time indicator - hidden by default, shown on hover -->
                                        <span class="small ${isCurrentUser ? 'text-white-50' : 'text-muted'}   text-right">
                                            ${new Date(message.created_at).toLocaleTimeString('en-US', {hour: 'numeric', minute: '2-digit'})}
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <!-- Avatar for current user -->
                            ${isCurrentUser ? `
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <div class="avatar align-self-start ml-2 flex-shrink-0">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        ${showSender ? `
                                <img class="rounded-circle" width="36" height="36" src="{{ Auth::user()->profile_photo_url }}" alt="">
                                ` : ''}
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    ` : ''}
                        </div>
                    `;
                });

                document.getElementById('message').innerHTML = chatsHTML
                //scroll to bottom
                document.getElementById('message').scrollTop = document.getElementById('message').scrollHeight
            }

            window.addEventListener('load', async (ev) => {
                await getChat()

                // Send message
                document.getElementById('form').addEventListener('submit', async (ev) => {
                    ev.preventDefault()

                    const message = document.querySelector('textarea[name="message"]')
                    const response = await fetch('/api/messages/chat/send', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            message: message.value,
                            room: '{{ $room->id }}'
                        })
                    })

                    const data = await response.json()

                    if (data) {
                        // Get chat
                        await getChat()

                        message.value = ''
                    }
                })
            })

            // Show/hide scroll to bottom button
            const messageContainer = document.getElementById('message');
            const scrollToBottomBtn = document.getElementById('scrollToBottomBtn');

            messageContainer.addEventListener('scroll', () => {
                if (messageContainer.scrollTop + messageContainer.clientHeight < messageContainer.scrollHeight - 100) {
                    scrollToBottomBtn.style.display = 'block';
                } else {
                    scrollToBottomBtn.style.display = 'none';
                }
            });

            // Scroll to bottom when button is clicked
            scrollToBottomBtn.addEventListener('click', () => {
                messageContainer.scrollTop = messageContainer.scrollHeight;
            });
        </script>
    @endisset
@endpush
