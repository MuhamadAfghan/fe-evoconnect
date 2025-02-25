@extends('layouts.templates')
@push('css')
    <style>
        .profile-photo-container {
            position: relative;
            display: inline-block;
            width: 150px;
            height: 150px;
        }

        .profile-photo {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
            border: 3px solid #ddd;
        }

        .camera-icon {
            position: absolute;
            bottom: 5px;
            right: 5px;
            background-color: #007bff;
            width: 35px;
            height: 35px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid #fff;
            color: white;
            cursor: pointer;
            transition: all 0.3s ease;
            z-index: 2;
        }

        .camera-icon:hover {
            background-color: #0056b3;
        }
    </style>
@endpush

@section('content')
    <div class="profile-cover text-center">
        <img class="img-fluid" src="#" alt="">
    </div>
    <div class="border-bottom bg-white shadow-sm">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Kosongkan bagian ini jika tidak ada konten tambahan -->
                </div>
            </div>
        </div>
    </div>
    <div class="py-4">
        <div class="container">
            <div class="row">
                <aside class="col col-xl-3 order-xl-1 col-lg-6 order-lg-1 col-md-6 col-sm-6 col-12">
                    <div class="box profile-box mb-1 rounded border bg-white text-center shadow-sm">
                        <div class="p-2 text-center">
                            <div>
                                <!-- Menampilkan Foto Profil User -->
                                <div class="profile-photo-container">
                                    <img id="jobPhoto"
                                        src="{{ $user->profile_photo ? asset('storage/' . $user->profile_photo) : auth()->user()->getProfileImage() }}"
                                        class="img-fluid rounded-circle job-photo mt-4" alt="Job Image">
                                    <h5 class="font-weight-bold text-dark mb-1 mt-3">{{ $user->name }}</h5>
                                    <small>Group Created :</small>
                                </div>

                                <div class="p-3">
                                    <div class="d-flex align-items-top">
                                        <p class="text-muted mb-0">Request Join</p>
                                        <p class="font-weight-bold text-dark mb-0 ml-auto mt-0">{{ $user->following_count }}
                                        </p>
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="box mb-3 rounded border bg-white shadow-sm">
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
                            </div> --}}
                </aside>
                <main class="col col-xl-6 order-xl-2 col-lg-12 order-lg-2 col-md-12 col-sm-12 col-12">
                    <div class="box mb-3 rounded border bg-white shadow-sm">
                        <div class="box-body p-3">
                            <!-- Pindahkan Informasi Group ke sini -->
                            <div
                                class="border-bottom d-flex flex-column align-items-center justify-content-center p-3 text-center">
                                <div class="d-flex align-items-center">
                                    <img class="img-fluid rounded-circle job-photo" width="80" height="80"
                                        src="{{ $group->image ? asset('storage/' . $group->image) : asset('default-group.png') }}"
                                        alt="">
                                </div>
                                <h5 class="font-weight-bold text-dark mb-2 mt-3">{{ $group->name }}</h5>
                                <p class="text-muted mb-0">{{ $group->description }}</p>
                            </div>
                            <div class="p-3">
                                <div class="d-flex align-items-top mb-2">
                                    <p class="text-muted mb-0">Members</p>
                                    <p class="font-weight-bold text-dark mb-0 ml-auto mt-0">25</p>
                                </div>
                                <div class="d-flex align-items-top">
                                    <p class="text-muted mb-0">Posts</p>
                                    <p class="font-weight-bold text-dark mb-0 ml-auto mt-0">120</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Add this code below the Group Details box in the main section -->
                    <div class="box mb-3 rounded border bg-white shadow-sm">
                        <div class="box-title border-bottom p-3">
                            <h6 class="m-0">Create New Post</h6>
                        </div>
                        <div class="box-body p-3">
                            <form action="#" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <div class="d-flex align-items-center mb-3">
                                        <img src="{{ auth()->user()->profile_photo ? asset('storage/' . auth()->user()->profile_photo) : auth()->user()->getProfileImage() }}"
                                            class="rounded-circle mr-2" width="40" height="40" alt="">
                                        <span class="font-weight-bold">{{ auth()->user()->name }}</span>
                                    </div>
                                    <textarea class="form-control" id="post-content" name="content" rows="3" placeholder="What's on your mind?"></textarea>
                                </div>

                                <div class="post-preview-container d-none mb-3">
                                    <div class="position-relative">
                                        <img id="image-preview" src="#" alt="Preview"
                                            class="img-fluid w-100 rounded" style="max-height: 300px; object-fit: contain;">
                                        <button type="button" class="btn btn-sm btn-danger position-absolute"
                                            style="top: 10px; right: 10px;" id="remove-image">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="post-options">
                                        <label for="post-image" class="text-primary mb-0 mr-3" style="cursor: pointer;">
                                            <i class="fa fa-image"></i> Photo
                                        </label>
                                        <input type="file" id="post-image" name="image" accept="image/*"
                                            style="display: none;">

                                        <span class="text-primary mr-3" style="cursor: pointer;">
                                            <i class="fa fa-video"></i> Video
                                        </span>

                                    </div>

                                    <button type="submit" class="btn btn-primary px-4">Post</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Posts Display Section -->
                    <div class="box mb-3 rounded border bg-white shadow-sm">
                        <div class="box-title border-bottom p-3">
                            <h6 class="m-0">Recent Posts</h6>
                        </div>
                        <div class="box-body p-0">
                            <!-- Sample Post -->
                            <div class="border-bottom p-3">
                                <div class="d-flex align-items-center mb-3">
                                    <img src="{{ asset('default-user.png') }}" class="rounded-circle mr-2" width="40"
                                        height="40" alt="">
                                    <div>
                                        <h6 class="font-weight-bold mb-0">John Doe</h6>
                                        <small class="text-muted">2 hours ago</small>
                                    </div>
                                    <div class="dropdown ml-auto">
                                        <button class="btn btn-light btn-sm rounded-circle" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <i class="fa fa-ellipsis-h"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right"
                                            aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="#">Edit</a>
                                            <a class="dropdown-item" href="#">Delete</a>
                                            <a class="dropdown-item" href="#">Report</a>
                                        </div>
                                    </div>
                                </div>
                                <p>This is a sample post content. Looking forward to our next group meeting!</p>
                                <img src="{{ asset('default-post.jpg') }}" class="img-fluid w-100 mb-3 rounded"
                                    alt="">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <button class="btn btn-light btn-sm"><i class="fa fa-thumbs-up"></i> Like
                                            (24)</button>
                                        <button class="btn btn-light btn-sm"><i class="fa fa-comment"></i> Comment
                                            (8)</button>
                                    </div>
                                    <button class="btn btn-light btn-sm"><i class="fa fa-share"></i> Share</button>
                                </div>
                            </div>

                            <!-- More posts would be dynamically loaded here -->
                        </div>
                        <a href="#"
                            class="font-weight-bold d-block text-primary w-100 border-0 bg-transparent p-3 text-center">
                            Load More <i class="fa-solid fa-arrow-down"></i>
                        </a>
                    </div>
                </main>
                <aside class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="box mb-3 rounded border bg-white shadow-sm">
                        <div class="box-title border-bottom p-3">
                            <h6 class="m-0">{{ $group->members->count() }} Members</h6>
                        </div>
                        <div class="box-body p-3">
                            <div class="d-flex flex-wrap">
                                @foreach ($group->members as $member)
                                    <div class="m-2 text-center">
                                        <img src="{{ $member->user->profile_photo_url }}" class="rounded-circle"
                                            width="50" height="50" alt="{{ $member->user->name }}">

                                    </div>
                                @endforeach
                            </div>
                            <div class="p-3">
                                <button type="button" class="btn btn-outline-primary btn-sm pl-4 pr-4"
                                    data-toggle="modal" data-target="#inviteModal"> Invite Connection
                                </button>
                            </div>

                            <!-- Modal Invite Connection -->
                            <div class="modal fade" id="inviteModal" tabindex="-1" aria-labelledby="inviteModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="inviteModalLabel">Invite Connection</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Select the users you want to invite to the group.</p>
                                            <ul class="list-group">
                                                @forelse ($connections as $connection)
                                                    <li
                                                        class="list-group-item d-flex justify-content-between align-items-center">
                                                        <div class="d-flex align-items-center">
                                                            <img src="{{ $connection->user?->profile_photo_url ?? asset('default-avatar.png') }}"
                                                                class="rounded-circle mr-2" width="40" height="40"
                                                                alt="{{ $connection->name }}">
                                                            <span>
                                                                {{ $connection->user->name }}
                                                            </span>
                                                        </div>
                                                        <button class="btn btn-sm btn-primary invite-btn"
                                                            data-id="{{ $connection->user->id }}">Invite</button>
                                                    </li>
                                                @empty
                                                    <li class="list-group-item text-center">No connections available</li>
                                                @endforelse
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        </div>
                        <a href="#"
                            class="font-weight-bold d-block text-primary w-100 border-0 bg-transparent p-3 text-center">Show
                            all <i class="fa-solid fa-arrow-right"></i></a>
                    </div>

                    <div class="box ads-box mb-3 rounded border bg-white shadow-sm">
                        <div class="box-title border-bottom p-3">
                            <h6 class="m-0">Admin</h6>
                        </div>
                        <div class="box-body p-3">
                            @foreach ($group->members as $member)
                                @if ($member->role === 'admin')
                                    <div class="d-flex align-items-center mb-2">
                                        <img src="{{ $member->user->profile_photo_url }}" class="rounded-circle mr-3"
                                            width="50" height="50" alt="{{ $member->user->name }}">
                                        <div>
                                            <h6 class="font-weight-bold mb-0">{{ $member->user->name }}</h6>
                                            <small class="text-primary">Group Admin</small>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </aside>

            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelector(".btn-outline-primary").addEventListener("click", function() {
                $("#inviteModal").modal("show");
            });

            document.querySelectorAll(".invite-btn").forEach(button => {
                button.addEventListener("click", function() {
                    let userId = this.getAttribute("data-id");
                    console.log("Inviting user ID:", userId);
                    // Di sini bisa tambahkan AJAX untuk invite user ke grup
                });
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            $(".invite-btn").on("click", function() {
                let userId = $(this).data("id");

                $.ajax({
                    url: "{{ route('group.invite') }}", // Pastikan route ini sesuai
                    method: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        user_id: userId,
                        group_id: "{{ $group->id }}"
                    },
                    success: function(response) {
                        alert(response.message);
                    },
                    error: function(xhr) {
                        alert("Failed to invite user.");
                    }
                });
            });
        });
    </script>
@endpush
