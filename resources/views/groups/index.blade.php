@extends('layouts.templates')

@section('content')
    <div class="py-4">
        <div class="container">
            <div class="row">
                <!-- Main Content -->
                <main class="col col-xl-9 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
                    <div class="box osahan-share-post mb-3 rounded border bg-white shadow-sm">
                        <div class="d-flex justify-content-between align-items-center border-bottom p-3">
                            <h5 class="mb-0">Groups</h5>
                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#groupModal">
                                Create Group
                            </button>
                        </div>

                        <div class="card-body">
                            @if ($groups->count() > 0)
                                <ul class="list-unstyled">
                                    @foreach ($groups as $group)
                                        <li class="border-bottom d-flex justify-content-between align-items-center p-3">
                                            <div class="d-flex align-items-center">
                                                <img src="{{ $group->image ? asset('storage/' . $group->image) : asset('default-group.png') }}"
                                                    class="rounded-circle mr-3" width="50" height="50"
                                                    alt="{{ $group->name }}">
                                                <div>
                                                    <a href="{{ route('groups.show', $group->id) }}">
                                                        <h6 class="font-weight-bold">{{ $group->name }}</h6>
                                                    </a>
                                                    <div class="d-flex align-items-center mt-1">
                                                        <i class="feather-users text-primary mr-2"></i>
                                                        <small class="text-muted">{{ $group->members->count() }}
                                                            members</small>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Dropdown Menu -->
                                            <div class="dropdown">
                                                <button class="btn btn-light btn-sm dropdown-toggle" type="button"
                                                    id="dropdownMenuButton{{ $group->id }}" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end"
                                                    aria-labelledby="dropdownMenuButton{{ $group->id }}">
                                                    <li>
                                                        <form action="{{ route('groups.destroy', $group->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="dropdown-item text-danger">Hapus
                                                                Grup</button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <p class="text-center">No groups available.</p>
                            @endif
                        </div>
                    </div>
                </main>

                <!-- Sidebar -->
                <aside class="col col-xl-3 order-xl-2 col-lg-12 order-lg-2 col-12">
                    <div class="box list-sidebar mb-3 rounded border bg-white shadow-sm">
                        <div class="border-bottom box-title p-3">
                            <h6 class="m-0">Group Statistics</h6>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex align-items-center text-dark pl-3 pr-3">
                                <i class="feather-users text-dark mr-2"></i> Total Groups
                                <span class="font-weight-bold ml-auto">{{ $groups->count() }}</span>
                            </li>
                            <li class="list-group-item d-flex align-items-center text-dark pl-3 pr-3">
                                <i class="feather-user-plus text-dark mr-2"></i> My Groups
                                <span class="font-weight-bold ml-auto">{{ $myGroups ?? 0 }}</span>
                            </li>
                        </ul>
                    </div>
                    <div class="box list-sidebar rounded border bg-white shadow-sm">
                        <div class="border-bottom box-title p-3">
                            <h6 class="m-0">Groups you might be interested</h6>
                        </div>
                        <div class="border-bottom card-body">
                            @if ($groups->count() > 0)
                                <ul class="list-unstyled">
                                    @foreach ($groups as $group)
                                        <li class="border-bottom d-flex justify-content-between align-items-center p-1">
                                            <div class="d-flex align-items-center">
                                                <img src="{{ $group->image ? asset('storage/' . $group->image) : asset('default-group.png') }}"
                                                    class="rounded-circle mr-1" width="50" height="50"
                                                    alt="{{ $group->name }}">
                                                <div>
                                                    <a href="{{ route('groups.show', $group->id) }}">
                                                        <h6 class="font-weight-bold mb-0">{{ $group->name }}</h6>
                                                    </a>
                                                    <div class="d-flex align-items-center mt-1">
                                                        <i class="feather-users text-primary mr-2"></i>
                                                        <small class="text-muted">{{ $group->members->count() }}
                                                            members</small>
                                                    </div>
                                                    <button class="btn btn-outline-primary btn-sm join-group-btn"
                                                        data-group-id="{{ $group->id }}">
                                                        Join
                                                    </button>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <p class="text-center">No groups available.</p>
                            @endif
                        </div>
                        <a href="#"
                            class="font-weight-bold d-block text-primary w-100 border-0 bg-transparent p-3 text-center">Show
                            all <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </aside>
            </div>
        </div>
    </div>

    <!-- Create Group Modal -->
    <div class="modal fade" id="groupModal" tabindex="-1" aria-labelledby="groupModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="groupModalLabel">Create Group</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('groups.store') }}" method="POST" enctype="multipart/form-data"
                        id="createGroupForm">
                        @csrf
                        <div class="form-group">
                            <label>Group Name</label>
                            <input type="text" class="form-control" name="name" required
                                placeholder="Enter group name">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" name="description" rows="3" placeholder="Enter group description"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Group Image</label>
                            <input type="file" class="form-control" name="image" accept="image/*">
                        </div>
                        <div class="modal-footer px-0 pb-0">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Create Group</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap dan jQuery (Pastikan Terhubung) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Scripts -->
    <script>
        $(document).ready(function() {
            // Debug modal untuk memastikan modal bisa terbuka
            $('#groupModal').on('shown.bs.modal', function() {
                console.log('Modal berhasil dibuka');
            });

            // Pastikan modal bisa dibuka secara manual jika ada kendala
            $('.btn-primary').click(function() {
                var myModal = new bootstrap.Modal(document.getElementById('groupModal'));
                myModal.show();
            });

            // Form submission handling menggunakan AJAX
            $('#createGroupForm').on('submit', function(e) {
                e.preventDefault();

                const formData = new FormData(this);

                $.ajax({
                    url: $(this).attr('action'),
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        $('#groupModal').modal('hide');
                        location.reload();
                    },
                    error: function(xhr) {
                        const errors = xhr.responseJSON.errors;
                        alert('Error creating group. Please check your inputs.');
                    }
                });
            });

            // Join Group Button
            $('.join-group-btn').click(function() {
                let groupId = $(this).data('group-id');

                $.ajax({
                    url: '/groups/' + groupId + '/join',
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        alert(response.message);
                        location.reload();
                    },
                    error: function(xhr) {
                        alert(xhr.responseJSON.message);
                    }
                });
            });

            // Leave Group Button
            $(document).on('click', '.leave-group-btn', function() {
                let groupId = $(this).data('group-id');

                $.ajax({
                    url: '/groups/' + groupId + '/leave',
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        alert(response.message);
                        location.reload();
                    },
                    error: function(xhr) {
                        alert(xhr.responseJSON.message);
                    }
                });
            });
        });
    </script>
@endsection
