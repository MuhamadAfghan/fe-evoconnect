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
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                    aria-controls="home" aria-selected="true">People</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                    aria-controls="profile" aria-selected="false">Invitations</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel"
                                aria-labelledby="home-tab">
                                <div class="p-3">
                                    <div class="row">
                                        @foreach ($users as $user)
                                            <div class="col-md-4">
                                                <a href="{{ route('user.detail', $user->username) }}">
                                                    <div class="network-item mb-3 rounded border">
                                                        <div class="d-flex align-items-center network-item-header p-3">
                                                            <div class="dropdown-list-image mr-3">
                                                                <img class="rounded-circle"
                                                                    src="{{ $user->getProfileImage() }}" alt="">
                                                                <div
                                                                    class="status-indicator {{ $user->isOnline() ? 'bg-success' : 'bg-secondary' }}">
                                                                </div>
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
                                                                @if ($user->is_connected)
                                                                    <button class="btn btn-secondary btn-sm btn-block"
                                                                        disabled>Connected</button>
                                                                @elseif ($user->has_pending_request)
                                                                    <button class="btn btn-warning btn-sm btn-block"
                                                                        disabled>Pending</button>
                                                                @else
                                                                    <form
                                                                        action="{{ route('connections.send', $user->id) }}"
                                                                        method="POST" class="connect-form">
                                                                        @csrf
                                                                        <button type="submit"
                                                                            class="btn btn-primary btn-sm btn-block connect-btn"
                                                                            id="connect-btn-{{ $user->id }}">Connect</button>
                                                                    </form>
                                                                @endif
                                                            </div>
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
                                    <h6>Invitations</h6>
                                    <ul id="invitations-list">
                                        @if (isset($invitations) && $invitations->isNotEmpty())
                                            @foreach ($invitations as $invitation)
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-center">
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{ $invitation->sender->getProfileImage() }}"
                                                            class="rounded-circle mr-2" width="40" height="40">
                                                        <span>{{ $invitation->sender->name }}</span>
                                                    </div>
                                                    <div>
                                                        <button class="btn btn-success btn-sm accept-btn"
                                                            data-id="{{ $invitation->id }}">Accept</button>
                                                        <button class="btn btn-danger btn-sm reject-btn"
                                                            data-id="{{ $invitation->id }}">Reject</button>
                                                    </div>
                                                </li>
                                            @endforeach
                                        @else
                                            <p>Tidak ada undangan koneksi saat ini.</p>
                                        @endif


                                    </ul>
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
                            <a href="{{ route('connection.list') }}">
                                <li class="list-group-item d-flex align-items-center text-dark pl-3 pr-3"><i
                                        class="feather-users text-dark mr-2"></i> Connections <span
                                        class="font-weight-bold ml-auto">68</span></li>
                            </a>
                            <a href="#">
                                <li class="list-group-item d-flex align-items-center text-dark pl-3 pr-3"><i
                                        class="feather-book text-dark mr-2"></i> Contacts <span
                                        class="font-weight-bold ml-auto">869</span></li>
                            </a>
                            <a href="{{ route('groups.index') }}">
                                <li class="list-group-item d-flex align-items-center text-dark pl-3 pr-3"><i
                                        class="feather-message-circle text-dark mr-2"></i> Groups <span
                                        class="font-weight-bold ml-auto">{{ $groups->count() }}</span></li>
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
            $('#profile-tab').click(function() {
                $.ajax({
                    url: '/connections/requests', // Endpoint untuk mengambil daftar permintaan
                    method: 'GET',
                    success: function(response) {
                        let invitationsList = $('#invitations-list');
                        invitationsList.empty(); // Hapus data lama

                        response.requests.forEach(function(request) {
                            invitationsList.append(`
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <img src="${request.sender_profile_image}" class="rounded-circle mr-2" width="40" height="40">
                                <span>${request.sender_name}</span>
                            </div>
                        </li>
                    `);
                        });

                        // Tambahkan event listener untuk tombol Accept dan Reject
                        $('.accept-btn').click(function() {
                            let requestId = $(this).data('id');
                            $.ajax({
                                url: `/connections/${requestId}/accept`,
                                method: 'POST',
                                success: function() {
                                    alert('Connection accepted');
                                    $(`button[data-id="${requestId}"]`)
                                        .parent().parent().remove();
                                }
                            });
                        });

                        $('.reject-btn').click(function() {
                            let requestId = $(this).data('id');
                            $.ajax({
                                url: `/connections/${requestId}/reject`,
                                method: 'POST',
                                success: function() {
                                    alert('Connection rejected');
                                    $(`button[data-id="${requestId}"]`)
                                        .parent().parent().remove();
                                }
                            });
                        });
                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            // Initialize tooltips
            $('[data-toggle="tooltip"]').tooltip();

            // Add csrf token to all ajax requests
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Handle Invitations tab click
            $('#profile-tab').click(function() {
                loadInvitations();
            });

            // Handle Connect button click
            $('.connect-btn').click(function(e) {
                e.preventDefault();
                const button = $(this);
                const form = button.closest('form');

                // Check if the button is already disabled
                if (button.hasClass('disabled')) {
                    return; // Exit if the button is disabled
                }

                // Disable the button and change its text
                button.addClass('disabled').text('Sending...');

                $.ajax({
                    url: form.attr('action'),
                    type: 'POST',
                    data: form.serialize(),
                    success: function(response) {
                        // Change button to indicate connection is pending
                        button.removeClass('btn-primary')
                            .addClass('btn-warning')
                            .text('Pending')
                            .prop('disabled', true);

                        // Optionally, you can also show a notification
                        showNotification('success', 'Connection request sent successfully');
                    },
                    error: function(xhr) {
                        button.removeClass('disabled').text(
                            'Connect'); // Re-enable the button on error
                        showNotification('error', xhr.responseJSON?.message ||
                            'Error sending connection request');
                    }
                });
            });
            // Function to load invitations
            function loadInvitations() {
                const invitationsList = $('#invitations-list');
                invitationsList.html(
                    '<div class="text-center"><i class="fas fa-spinner fa-spin"></i> Loading...</div>');

                $.ajax({
                    url: '/connections/requests',
                    type: 'GET',
                    success: function(response) {
                        invitationsList.empty();

                        if (response.requests.length === 0) {
                            invitationsList.html(
                                '<p class="text-center p-3">No pending invitations</p>');
                            return;
                        }

                        response.requests.forEach(function(request) {
                            const invitationHtml = `
                        <li class="list-group-item d-flex justify-content-between align-items-center" id="invitation-${request.id}">
                            <div class="d-flex align-items-center">
                                <img src="${request.sender_profile_image}" class="rounded-circle mr-2" width="40" height="40" alt="${request.sender_name}">
                                <div>
                                    <strong>${request.sender_name}</strong>
                                    <small class="text-muted d-block">${request.created_at}</small>
                                </div>
                            </div>
                            <div class="btn-group">
                                <button class="btn btn-success btn-sm accept-invitation mr-1" data-id="${request.id}">
                                    <i class="fas fa-check mr-1"></i> Accept
                                </button>
                                <button class="btn btn-danger btn-sm reject-invitation" data-id="${request.id}">
                                    <i class="fas fa-times mr-1"></i> Reject
                                </button>
                            </div>
                        </li>
                    `;
                            invitationsList.append(invitationHtml);
                        });

                        // Bind events for accept/reject buttons
                        bindInvitationActions();
                    },
                    error: function() {
                        invitationsList.html(
                            '<p class="text-center text-danger p-3">Error loading invitations</p>');
                    }
                });
            }

            // Function to bind invitation actions
            function bindInvitationActions() {
                // Handle Accept button
                $(document).on('click', '.accept-invitation', function() {
                    const button = $(this);
                    const requestId = button.data('id');
                    const invitationItem = $(`#invitation-${requestId}`);

                    button.prop('disabled', true);

                    $.ajax({
                        url: `/connections/${requestId}/accept`,
                        type: 'POST',
                        success: function(response) {
                            // Change the button to "Connected" in the original user list
                            const connectButton = $(`#connect-btn-${response.user_id}`);
                            if (connectButton.length) {
                                connectButton.removeClass('btn-primary btn-warning')
                                    .addClass('btn-secondary')
                                    .text('Connected')
                                    .prop('disabled', true);
                            }

                            // Remove the invitation item from the list
                            invitationItem.fadeOut(function() {
                                $(this).remove();
                                if ($('#invitations-list li').length === 0) {
                                    $('#invitations-list').html(
                                        '<p class="text-center p-3">No pending invitations</p>'
                                    );
                                }
                            });
                            showNotification('success', 'Connection accepted');
                        },
                        error: function() {
                            button.prop('disabled', false);
                            showNotification('error', 'Error accepting connection');
                        }
                    });
                });
                // Handle Reject button
                $(document).on('click', '.reject-invitation', function() {
                    const button = $(this);
                    const requestId = button.data('id');
                    const invitationItem = $(`#invitation-${requestId}`);

                    button.prop('disabled', true);

                    $.ajax({
                        url: `/connections/${requestId}/reject`,
                        type: 'POST',
                        success: function() {
                            invitationItem.fadeOut(function() {
                                $(this).remove();
                                if ($('#invitations-list li').length === 0) {
                                    $('#invitations-list').html(
                                        '<p class="text-center p-3">No pending invitations</p>'
                                    );
                                }
                            });
                            showNotification('success', 'Connection rejected');
                        },
                        error: function() {
                            button.prop('disabled', false);
                            showNotification('error', 'Error rejecting connection');
                        }
                    });
                });
            }

            // Function to show notifications
            function showNotification(type, message) {
                const alertClass = type === 'success' ? 'alert-success' : 'alert-danger';
                const notification = `
            <div class="alert ${alertClass} alert-dismissible fade show" role="alert">
                ${message}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        `;

                $('#notification-area').html(notification);
                setTimeout(() => {
                    $('.alert').alert('close');
                }, 3000);
            }
        });
    </script>
@endsection
