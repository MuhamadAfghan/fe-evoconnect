{{-- File: resources/views/connections/list_connection.blade.php --}}
@extends('layouts.templates')

@section('content')

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">My Connections</h5>
                    </div>
                    <div class="card-body">
                        @if ($connections->count() > 0)
                            <ul class="list-unstyled">
                                @foreach ($connections as $connection)
                                    <li class="border-bottom p-3">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ $connection->fromUser->getProfileImage() }}"
                                                class="rounded-circle mr-3" width="50" height="50">
                                            <div>
                                                <a
                                                    href="{{ route('user.detail', $connection->fromUser->username != auth()->user()->username ? $connection->fromUser->username : $connection->toUser->username) }}">
                                                    <h6 class="mb-0">
                                                        {{ $connection->fromUser->name != auth()->user()->name ? $connection->fromUser->name : $connection->toUser->name }}
                                                    </h6>
                                                </a>
                                                <small class="text-muted">Connected since
                                                    {{ $connection->created_at->diffForHumans() }}</small>
                                            </div>
                                            <div class="ml-auto">
                                                <a href="{{ route('connections.messages', $connection->fromUser->id != auth()->user()->id ? $connection->fromUser->id : $connection->toUser->id) }}"
                                                    class="btn btn-sm btn-primary message-btn">
                                                    Message
                                                </a>

                                                <form action="{{ route('connections.disconnect', $connection->id) }}"
                                                    method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Are you sure you want to disconnect?')">
                                                        Disconnect
                                                    </button>
                                                </form>


                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-center">You don't have any connections yet.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            $(document).ready(function() {
                // Handle disconnect button
                $('.disconnect-btn').click(function() {
                    const connectionId = $(this).data('id');

                    if (confirm('Are you sure you want to disconnect?')) {
                        $.ajax({
                            url: `/connections/disconnect/${connectionId}`,
                            type: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(response) {
                                alert(response.message);
                                location.reload();
                            },
                            error: function(xhr) {
                                alert('Error disconnecting: ' + xhr.responseJSON.message);
                            }
                        });
                    }
                });


                // Handle message button
                $('.message-btn').click(function() {
                    const userId = $(this).data('id');
                    // Implementasi fitur chat/message
                    alert('Message feature coming soon!');
                });
            });
        </script>
    @endpush
@endsection
