@extends('layouts.templates')

@push('css')
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="vendor/jquery/jquery.min.js"></script>
    <style>
        .liked {
            color: red;
        }
    </style>
@endpush


@section('content')
    <div class="py-4">
        <div class="container">
            <div class="row">
                <!-- Main Content -->
                <main class="col col-xl-6 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
                    @include('home.components.create-post')
                    {{-- @include('home.components.posts') --}}

                    <!-- Template for single post item -->
                    <template id="post-template">
                        <div class="box post-card mb-3 rounded border bg-white shadow-sm">
                            <div class="border-bottom post-header d-flex align-items-center justify-content-between p-3">
                                <div class="d-flex align-items-center">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="" alt="user avatar" id="user-avatar">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate" id="user-name"></div>
                                        <div class="small text-gray-500" id="post-time"></div>
                                    </div>
                                </div>

                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="gray"
                                    title="Visibility: public" class="bi bi-globe2" viewBox="0 0 16 16">
                                    <path
                                        d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m7.5-6.923c-.67.204-1.335.82-1.887 1.855q-.215.403-.395.872c.705.157 1.472.257 2.282.287zM4.249 3.539q.214-.577.481-1.078a7 7 0 0 1 .597-.933A7 7 0 0 0 3.051 3.05q.544.277 1.198.49zM3.509 7.5c.036-1.07.188-2.087.436-3.008a9 9 0 0 1-1.565-.667A6.96 6.96 0 0 0 1.018 7.5zm1.4-2.741a12.3 12.3 0 0 0-.4 2.741H7.5V5.091c-.91-.03-1.783-.145-2.591-.332M8.5 5.09V7.5h2.99a12.3 12.3 0 0 0-.399-2.741c-.808.187-1.681.301-2.591.332zM4.51 8.5c.035.987.176 1.914.399 2.741A13.6 13.6 0 0 1 7.5 10.91V8.5zm3.99 0v2.409c.91.03 1.783.145 2.591.332.223-.827.364-1.754.4-2.741zm-3.282 3.696q.18.469.395.872c.552 1.035 1.218 1.65 1.887 1.855V11.91c-.81.03-1.577.13-2.282.287zm.11 2.276a7 7 0 0 1-.598-.933 9 9 0 0 1-.481-1.079 8.4 8.4 0 0 0-1.198.49 7 7 0 0 0 2.276 1.522zm-1.383-2.964A13.4 13.4 0 0 1 3.508 8.5h-2.49a6.96 6.96 0 0 0 1.362 3.675c.47-.258.995-.482 1.565-.667m6.728 2.964a7 7 0 0 0 2.275-1.521 8.4 8.4 0 0 0-1.197-.49 9 9 0 0 1-.481 1.078 7 7 0 0 1-.597.933M8.5 11.909v3.014c.67-.204 1.335-.82 1.887-1.855q.216-.403.395-.872A12.6 12.6 0 0 0 8.5 11.91zm3.555-.401c.57.185 1.095.409 1.565.667A6.96 6.96 0 0 0 14.982 8.5h-2.49a13.4 13.4 0 0 1-.437 3.008M14.982 7.5a6.96 6.96 0 0 0-1.362-3.675c-.47.258-.995.482-1.565.667.248.92.4 1.938.437 3.008zM11.27 2.461q.266.502.482 1.078a8.4 8.4 0 0 0 1.196-.49 7 7 0 0 0-2.275-1.52c.218.283.418.597.597.932m-.488 1.343a8 8 0 0 0-.395-.872C9.835 1.897 9.17 1.282 8.5 1.077V4.09c.81-.03 1.577-.13 2.282-.287z" />
                                </svg>
                            </div>
                            <div class="border-bottom post-body p-3">
                                <p class="mb-0" id="post-content"></p>
                            </div>
                            <div class="post-footer p-3">
                                <div class="d-flex align-items-center">
                                    <div class="button-group">
                                        <button class="btn btn-light btn-sm like-button mr-2"><i
                                                class="feather-heart mr-1"></i> Like</button>
                                        <span class="like-count">0</span>
                                        <button class="btn btn-light btn-sm mr-2" type="button" data-toggle="modal"
                                            data-target="#modalPost" data-postId="1"><i
                                                class="feather-message-square mr-1"></i>
                                            Comment</button>
                                        {{-- <button class="btn btn-light btn-sm"><i class="feather-share mr-1"></i>
                                            Share</button> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>

                    <!-- Container for posts -->
                    <div id="posts-container"></div>
                </main>
                <aside class="col col-xl-3 order-xl-1 col-lg-6 order-lg-2 col-md-6 col-sm-6 col-12">
                    <div class="box profile-box mb-3 rounded border bg-white text-center shadow-sm">
                        <div class="border-bottom px-3 py-4">
                            <img src="{{ auth()->user()->getProfileImage() }}" class="img-fluid rounded-circle mt-2"
                                style="border-radius: 50%;" alt="Responsive image">
                            <h5 class="font-weight-bold text-dark mb-1 mt-4">
                                {{ auth()->user()->name }}</h5>
                            <p class="text-muted mb-0">{{ auth()->user()->headline }}</p>
                        </div>
                        <div class="d-flex">
                            <div class="col-6 border-right p-3">
                                <h6 class="font-weight-bold text-dark mb-1">358</h6>
                                <p class="text-black-50 small mb-0">Connections</p>
                            </div>
                            <div class="col-6 p-3">
                                <h6 class="font-weight-bold text-dark mb-1">85</h6>
                                <p class="text-black-50 small mb-0">Views</p>
                            </div>
                        </div>
                        <div class="border-top overflow-hidden">
                            <a class="font-weight-bold d-block p-3" href="{{ route('profile') }}"> View my profile </a>
                        </div>
                    </div>
                    <div class="box view-box mb-3 overflow-hidden rounded bg-white shadow-sm">
                        <div class="box-title border-bottom p-3">
                            <h6 class="m-0">Profile Views</h6>
                        </div>
                        <div class="d-flex text-center">
                            <div class="col-6 border-right px-2 py-4">
                                <h5 class="font-weight-bold text-info mb-1">08 <i class="feather-bar-chart-2"></i></h5>
                                <p class="text-black-50 small mb-0">last 5 days</p>
                            </div>
                            <div class="col-6 px-2 py-4">
                                <h5 class="font-weight-bold text-success mb-1">+ 43% <i class="feather-bar-chart"></i>
                                </h5>
                                <p class="text-black-50 small mb-0">Since last week</p>
                            </div>
                        </div>
                        <div class="border-top overflow-hidden text-center">
                            <img src="img/chart.png" class="img-fluid" alt="Responsive image">
                        </div>
                    </div>
                </aside>
                <aside class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="box mb-3 rounded border bg-white shadow-sm">
                        <div class="box-title border-bottom p-3">
                            <h6 class="m-0">People you might know</h6>
                        </div>
                        <div class="box-body p-3">
                            <div class="d-flex align-items-center osahan-post-header people-list mb-3">
                                <div class="dropdown-list-image mr-3">
                                    <img class="rounded-circle" src="img/p8.png" alt="">
                                    <div
                                        class="status-indicator {{ auth()->user()->isOnline() ? 'success' : 'bg-secondary' }}">
                                    </div>
                                </div>
                                <div class="font-weight-bold mr-2">
                                    <div class="text-truncate">Bintang Asydqi</div>
                                    <div class="small text-gray-500">Student at Alexander
                                    </div>
                                </div>
                                <span class="ml-auto"><button id="followBtn" type="button" class="btn btn-light btn-sm">
                                        <i id="followIcon" class="fa-solid fa-link"></i> </button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="box ads-box mb-3 overflow-hidden rounded bg-white text-center shadow-sm">
                        <img src="img/ads1.png" class="img-fluid" alt="Responsive image">
                        <div class="border-bottom p-3">
                            <h6 class="font-weight-bold text-gold">EVOConnect Premium</h6>
                            <p class="text-muted mb-0">Grow & nurture your network</p>
                        </div>
                        <div class="p-3">
                            <a href="{{ route('pricing') }}">
                                <button type="button" class="btn btn-outline-gold pl-4 pr-4"> ACTIVATE </button>
                            </a>
                        </div>
                    </div>
                    <div class="box mb-3 rounded border bg-white shadow-sm">
                        <div class="box-title border-bottom p-3">
                            <h6 class="m-0">Jobs
                            </h6>
                        </div>
                        <div class="box-body p-3">
                            <a href="{{ route('job-profile') }}">
                                <div class="job-item mb-3 rounded border bg-white shadow-sm">
                                    <div class="d-flex align-items-center job-item-header p-3">
                                        <div class="mr-2 overflow-hidden">
                                            <h6 class="font-weight-bold text-dark text-truncate mb-0">Product Director</h6>
                                            <div class="text-truncate text-primary">Spotify Inc.</div>
                                            <div class="small text-gray-500">
                                                <i class="feather-map-pin"></i> India, Punjab
                                            </div>
                                        </div>
                                        <img class="img-fluid ml-auto" src="img/l3.png" alt="">
                                    </div>
                                    <div class="d-flex align-items-center border-top border-bottom job-item-body p-3">
                                        <div class="overlap-rounded-circle">
                                            <img class="rounded-circle shadow-sm" data-toggle="tooltip"
                                                data-placement="top" title="" src="img/p9.png" alt=""
                                                data-original-title="Sophia Lee">
                                            <img class="rounded-circle shadow-sm" data-toggle="tooltip"
                                                data-placement="top" title="" src="img/p10.png" alt=""
                                                data-original-title="John Doe">
                                            <img class="rounded-circle shadow-sm" data-toggle="tooltip"
                                                data-placement="top" title="" src="img/p11.png" alt=""
                                                data-original-title="Julia Cox">
                                            <img class="rounded-circle shadow-sm" data-toggle="tooltip"
                                                data-placement="top" title="" src="img/p12.png" alt=""
                                                data-original-title="Robert Cook">
                                        </div>
                                        <span class="font-weight-bold text-muted">18 connections</span>
                                    </div>
                                    <div class="job-item-footer p-3">
                                        <small class="text-gray-500"><i class="feather-clock"></i> Posted 3 Days
                                            ago</small>
                                    </div>
                                </div>
                            </a>
                            <a href="{{ route('job-profile') }}">
                                <div class="job-item rounded border bg-white shadow-sm">
                                    <div class="d-flex align-items-center job-item-header p-3">
                                        <div class="mr-2 overflow-hidden">
                                            <h6 class="font-weight-bold text-dark text-truncate mb-0">.NET Developer</h6>
                                            <div class="text-truncate text-primary">Invision</div>
                                            <div class="small text-gray-500"><i class="feather-map-pin"></i> London, UK
                                            </div>
                                        </div>
                                        <img class="img-fluid ml-auto" src="img/l4.png" alt="">
                                    </div>
                                    <div class="d-flex align-items-center border-top border-bottom job-item-body p-3">
                                        <div class="overlap-rounded-circle">
                                            <img class="rounded-circle shadow-sm" data-toggle="tooltip"
                                                data-placement="top" title="" src="img/p13.png" alt=""
                                                data-original-title="Sophia Lee">
                                            <img class="rounded-circle shadow-sm" data-toggle="tooltip"
                                                data-placement="top" title="" src="img/p1.png" alt=""
                                                data-original-title="John Doe">
                                            <img class="rounded-circle shadow-sm" data-toggle="tooltip"
                                                data-placement="top" title="" src="img/p3.png" alt=""
                                                data-original-title="Robert Cook">
                                        </div>

                                        <span class="font-weight-bold text-muted">18 connections</span>
                                    </div>
                                    <div class="job-item-footer p-3">
                                        <small class="text-gray-500"><i class="feather-clock"></i> Posted 3 Days
                                            ago</small>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>

    <!-- Modal for adding tailnts -->
    <div class="modal fade" id="modalPost" tabindex="-1" role="dialog" aria-labelledby="modalPostTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalPostTitle">Comment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="d-flex align-items-top border-bottom osahan-post-comment p-3">
                        {{-- <div class="dropdown-list-image mr-3">
                            <img class="rounded-circle" src="{{ auth()->user()->getProfileImage() }}" alt="">
                            <div class="status-indicator {{ auth()->user()->isOnline() ? 'bg-success' : 'bg-secondary' }}">
                            </div>
                        </div> --}}
                        <div class="font-weight-bold">
                            <!-- Template untuk komentar -->
                            <template id="comment-template">
                                <div class="comment-item mb-3">
                                    <div class="d-flex align-items-top">
                                        <div class="dropdown-list-image mr-3">
                                            <img class="rounded-circle" src="" alt="user avatar"
                                                id="comment-user-avatar">
                                            <div class="status-indicator"></div>
                                        </div>
                                        <div class="font-weight-bold">
                                            <div class="text-truncate" id="comment-user-name"></div>
                                            <div class="small text-gray-500" id="comment-time"></div>
                                            <p class="mb-0" id="comment-content"></p>
                                        </div>
                                    </div>
                                    <div class="comment-footer">
                                        <button class="btn btn-light btn-sm reply-button">Reply</button>
                                        <div class="reply-form d-none">
                                            <textarea class="form-control reply-input" placeholder="Write a reply..."></textarea>
                                            <button class="btn btn-primary btn-sm send-reply-btn">Send</button>
                                        </div>
                                        <div class="replies-container"></div>
                                    </div>
                                </div>
                            </template>

                            <!-- Container untuk menampilkan semua komentar -->
                            <div id="comments-container"></div>
                        </div>
                    </div>
                    <div class="p-3">
                        <textarea id="commentContent" placeholder="Add Comment..." class="form-control border-0 p-0 shadow-none"
                            rows="1"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="sendCommentButton">Send</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <!-- Bootstrap core JavaScript -->

    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- slick Slider JS-->
    <script type="text/javascript" src="vendor/slick/slick.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/osahan.js"></script>
    <script>
        let isFetchPosts = false;
        let currentPage = 1;
        const postsPerPage = 5;
        let posts = [];
        let currentPostId = null;

        // // Fungsi untuk memuat komentar
        // function loadComments(currentPostId) {
        //     axios.get(`/api/posts/${currentPostId}/comments`) // Ganti {post_id} dengan ID post yang sesuai
        //         .then(response => {
        //             if (response.data.status === 'success') {
        //                 const comments = response.data.data;
        //                 comments.forEach(comment => {
        //                     const commentElement = createCommentElement(comment);
        //                     commentsContainer.appendChild(commentElement);
        //                 });
        //             }
        //         })
        //         .catch(error => {
        //             console.error('Error loading comments:', error);
        //         });
        // }
        // Fungsi untuk memuat komentar
        function loadComments(postId) {
            // Clear existing comments first
            const commentsContainer = document.getElementById('comments-container');
            commentsContainer.innerHTML = '';

            axios.get(`/api/posts/${postId}/comments`)
                .then(response => {
                    if (response.data.status === 'success') {
                        const comments = response.data.data;
                        comments.forEach(comment => {
                            const commentElement = createCommentElement(comment);
                            commentsContainer.appendChild(commentElement);
                        });
                    }
                })
                .catch(error => {
                    console.error('Error loading comments:', error);
                });
        }

        document.addEventListener('DOMContentLoaded', function() {
            const commentsContainer = document.getElementById('comments-container');
            const commentTemplate = document.getElementById('comment-template');

            // Fungsi untuk memformat waktu
            function formatPostDate(dateString) {
                const date = new Date(dateString);
                return date.toLocaleString(); // Sesuaikan format waktu sesuai kebutuhan
            }

            // Fungsi untuk membuat elemen komentar
            function createCommentElement(comment) {
                const commentElement = commentTemplate.content.cloneNode(true);

                // Isi data komentar
                const avatar = commentElement.querySelector('#comment-user-avatar');
                const userName = commentElement.querySelector('#comment-user-name');
                const time = commentElement.querySelector('#comment-time');
                const content = commentElement.querySelector('#comment-content');
                const replyButton = commentElement.querySelector('.reply-button');
                const replyForm = commentElement.querySelector('.reply-form');
                const replyInput = commentElement.querySelector('.reply-input');
                const sendReplyBtn = commentElement.querySelector('.send-reply-btn');
                const repliesContainer = commentElement.querySelector('.replies-container');

                avatar.src = comment.user.profile_photo_url || 'img/default-avatar.png';
                userName.textContent = comment.user.name;
                time.textContent = formatPostDate(comment.created_at);
                content.textContent = comment.content;

                // Handle tombol reply
                replyButton.addEventListener('click', () => {
                    replyForm.classList.toggle('d-none');
                    replyInput.focus();
                });

                // Handle pengiriman balasan
                sendReplyBtn.addEventListener('click', () => {
                    const replyContent = replyInput.value.trim();
                    if (replyContent) {
                        axios.post(`/api/comments/${comment.id}/reply`, {
                                content: replyContent
                            })
                            .then(response => {
                                if (response.data.status === 'success') {
                                    // Tambahkan balasan ke UI
                                    const replyElement = createCommentElement(response.data.data);
                                    repliesContainer.appendChild(replyElement);
                                    replyInput.value = '';
                                    replyForm.classList.add('d-none');
                                }
                            })
                            .catch(error => {
                                console.error('Error sending reply:', error);
                            });
                    }
                });

                // Tampilkan balasan yang sudah ada
                // if (comment.replies && comment.replies.length > 0) {
                //     comment.replies.forEach(reply => {
                //         const replyElement = createCommentElement(reply);
                //         repliesContainer.appendChild(replyElement);
                //     });
                // }

                return commentElement;
            }

            // Handle pengiriman komentar baru
            const sendCommentButton = document.getElementById('sendCommentButton');
            const commentContent = document.getElementById('commentContent');

            sendCommentButton.addEventListener('click', function() {
                const content = commentContent.value.trim();
                if (content) {
                    axios.post(`/api/posts/${currentPostId}/comment`, { // Ganti {post_id} dengan ID post yang sesuai
                            content: content
                        })
                        .then(response => {
                            console.log(response);
                            if (response.data.status === 'success') {
                                // Tambahkan komentar baru ke UI
                                const commentElement = createCommentElement(response.data.data);
                                commentsContainer.appendChild(commentElement);
                                commentContent.value = '';
                            }

                            loadComments(currentPostId);
                        })
                        .catch(error => {
                            console.error('Error sending comment:', error);
                        });
                } else {
                    alert('Comment cannot be empty.');
                }
            });

            // Muat komentar saat halaman dimuat
            loadComments(currentPostId);
        });

        // Function to format the post date
        function formatPostDate(dateString) {
            const date = new Date(dateString);
            const now = new Date();
            const diffTime = Math.abs(now - date);
            const diffSeconds = Math.floor(diffTime / 1000);
            const diffMinutes = Math.floor(diffTime / (1000 * 60));
            const diffHours = Math.floor(diffTime / (1000 * 60 * 60));
            const diffDays = Math.floor(diffTime / (1000 * 60 * 60 * 24));

            if (diffSeconds < 60) {
                return `${diffSeconds} seconds ago`;
            } else if (diffMinutes < 60) {
                return `${diffMinutes} minutes ago`;
            } else if (diffHours < 24) {
                return `${diffHours} hours ago`;
            } else if (diffDays < 7) {
                return `${diffDays} days ago`;
            } else if (diffDays < 30) {
                return `${Math.floor(diffDays / 7)} weeks ago`;
            } else if (diffDays < 365) {
                return `${Math.floor(diffDays / 30)} months ago`;
            } else {
                return `${Math.floor(diffDays / 365)} years ago`;
            }
        }

        // Function to create a comment element
        function createCommentElement(comment) {
            const template = document.getElementById('comment-template');
            const commentElement = template.content.cloneNode(true);

            // Set comment data
            const avatar = commentElement.querySelector('#comment-user-avatar');
            const userName = commentElement.querySelector('#comment-user-name');
            const time = commentElement.querySelector('#comment-time');
            const content = commentElement.querySelector('#comment-content');
            const replyButton = commentElement.querySelector('.reply-button');
            const replyForm = commentElement.querySelector('.reply-form');
            const replyInput = commentElement.querySelector('.reply-input');
            const sendReplyBtn = commentElement.querySelector('.send-reply-btn');
            const repliesContainer = commentElement.querySelector('.replies-container');

            if (avatar) avatar.src = comment.user.profile_photo_url || 'img/default-avatar.png';
            if (userName) userName.textContent = comment.user.name;
            if (time) time.textContent = formatPostDate(comment.created_at);
            if (content) content.textContent = comment.content;

            commentElement.querySelector('#comment-user-avatar').src = comment.user.profile_photo_url ||
                'img/default-avatar.png';
            commentElement.querySelector('#comment-user-name').textContent = comment.user.name;
            commentElement.querySelector('#comment-time').textContent = formatPostDate(comment.created_at);
            commentElement.querySelector('#comment-content').textContent = comment.content;

            // Handle reply button click
            replyButton.addEventListener('click', () => {
                replyForm.classList.toggle('d-none');
                replyInput.focus();
            });

            // Handle reply submission
            sendReplyBtn.addEventListener('click', () => {
                const replyContent = replyInput.value.trim();
                if (replyContent) {
                    axios.post(`/api/comments/${comment.id}/reply`, {
                            content: replyContent
                        })
                        .then(response => {
                            if (response.data.status === 'success') {
                                // Add new reply to the UI
                                const replyElement = createCommentElement(response.data.data);
                                repliesContainer.appendChild(replyElement);
                                replyInput.value = '';
                                replyForm.classList.add('d-none');
                            }
                        })
                        .catch(error => {
                            console.error('Error sending reply:', error);
                        });
                }
            });

            // Load existing replies
            // if (comment.replies && comment.replies.length > 0) {
            //     comment.replies.forEach(reply => {
            //         repliesContainer.appendChild(createCommentElement(reply));
            //     });
            // }

            return commentElement;
        }


        // Function to create a post element
        function createPostElement(post) {
            const template = document.getElementById('post-template');
            const postElement = template.content.cloneNode(true);

            // Set post data
            const avatar = postElement.querySelector('#user-avatar');
            const userName = postElement.querySelector('#user-name');
            const postTime = postElement.querySelector('#post-time');
            const content = postElement.querySelector('#post-content');
            const likeButton = postElement.querySelector('.like-button');
            const likeCount = postElement.querySelector('.like-count');
            const commentButton = postElement.querySelector('[data-toggle="modal"][data-target="#modalPost"]');

            // Safely set values with fallbacks
            if (avatar) avatar.src = post.user?.profile_photo_url || 'img/default-avatar.png';
            if (userName) userName.textContent = post.user?.name || 'Anonymous';
            if (postTime) postTime.textContent = formatPostDate(post.created_at || new Date());
            if (content) content.innerHTML = post.content || '';
            if (likeCount) likeCount.textContent = post.likes.length || 0;

            // Set online status
            const statusIndicator = postElement.querySelector('.status-indicator');
            if (statusIndicator) {
                statusIndicator.classList.add(post.user?.is_online ? 'bg-success' : 'bg-secondary');
            }

            // Check if the post is liked by the authenticated user
            if (post.is_liked) {
                likeButton.classList.add('liked');
            }

            // Handle like button click
            if (likeButton) {
                likeButton.addEventListener('click', function() {
                    axios.post(`/api/posts/${post.id}/like`)
                        .then(response => {
                            if (response.data.status === 'liked') {
                                likeButton.classList.add('liked');
                                likeCount.textContent = parseInt(likeCount.textContent) + 1;
                            } else {
                                likeButton.classList.remove('liked');
                                likeCount.textContent = parseInt(likeCount.textContent) - 1;
                            }
                        })
                        .catch(error => {
                            console.error('Error liking post:', error);
                        });
                });
            }

            // Handle comment button click
            if (commentButton) {
                // Store the post ID as data attribute on the button
                commentButton.setAttribute('data-postId', post.id);

                // Add event listener to set currentPostId when clicked
                commentButton.addEventListener('click', function() {
                    currentPostId = post.id;
                    // Clear previous comments
                    document.getElementById('comments-container').innerHTML = '';
                    // Load comments for this post
                    loadComments(post.id);
                });
            }

            // Add comments container and load existing comments
            const commentsContainer = postElement.querySelector('.comments-container');
            if (post.comments && post.comments.length > 0) {
                post.comments.forEach(comment => {
                    commentsContainer.appendChild(createCommentElement(comment));
                });
            }

            return postElement;
        }

        // Function to render posts
        function renderPosts(newPosts) {
            if (!Array.isArray(newPosts)) {
                console.log('No posts to render or invalid posts data');
                return;
            }

            const container = document.getElementById('posts-container');
            if (!container) {
                console.error('Posts container not found');
                return;
            }

            newPosts.forEach(post => {
                if (post && typeof post === 'object') {
                    container.appendChild(createPostElement(post));
                }
            });
        }

        // Function to fetch posts
        function fetchPosts(page = 1, limit = postsPerPage) {
            if (isFetchPosts) {
                return;
            }

            isFetchPosts = true;

            axios.get(`/api/posts?page=${page}&limit=${limit}`)
                .then(response => {
                    // Access the nested posts data
                    const responseData = response.data;
                    if (responseData.status === 'success' && responseData.data && responseData.data.data) {
                        if (responseData.data.data.length === 0) {
                            // window.removeEventListener('scroll', handleScroll);
                            return
                        }
                        const newPosts = responseData.data.data;
                        posts = [...posts, ...newPosts];
                        renderPosts(newPosts);
                        currentPage = page;
                    } else {
                        console.error('Unexpected API response structure:', responseData);
                    }
                })
                .catch(error => {
                    console.error('Error fetching posts:', error);
                })
                .finally(() => {
                    isFetchPosts = false;
                });
        }

        // Infinite scroll implementation
        function handleScroll() {
            const scrollTop = window.scrollY;
            const windowHeight = window.innerHeight;
            const documentHeight = document.documentElement.scrollHeight;

            if (scrollTop + windowHeight >= documentHeight - 100 && !isFetchPosts) {
                fetchPosts(currentPage + 1);
            }
        }

        // Initialize
        document.addEventListener('DOMContentLoaded', () => {
            fetchPosts();
            window.addEventListener('scroll', handleScroll);
        });

        // Handle comment submission
        document.getElementById('modalPost').addEventListener('shown.bs.modal', function() {
            const sendButton = document.querySelector('#sendCommentButton');
            sendButton.addEventListener('click', function() {
                const commentContent = document.querySelector('#commentContent').value;
                if (commentContent && currentPostId) {
                    axios.post(`/api/posts/${currentPostId}/comment`, {
                            content: commentContent
                        })
                        .then(response => {
                            if (response.data.status === 'success') {
                                $('#modalPost').modal('hide');
                                document.querySelector('#commentContent').value = '';
                                // Optionally, you can append the new comment to the post's comment section
                            }
                        })
                        .catch(error => {
                            console.error('Error commenting on post:', error);
                        });
                }
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let badges = document.querySelectorAll(".badge-hover");
            let visibility = '';

            badges.forEach(function(badge) {
                badge.addEventListener("click", function() {
                    // Jika badge yang diklik sudah aktif, maka hapus class 'badge-active' (unclick)
                    if (this.classList.contains("badge-active")) {
                        this.classList.remove("badge-active");
                        visibility = ''; // Reset visibility
                    } else {
                        // Hapus kelas 'badge-active' dari semua badge
                        badges.forEach(b => b.classList.remove("badge-active"));
                        // Tambahkan kelas 'badge-active' ke badge yang diklik
                        this.classList.add("badge-active");
                        visibility = this.textContent.trim().toLowerCase().replace(' ',
                            '_'); // Set visibility
                    }

                    // Enable or disable the submit button based on visibility selection
                    document.getElementById('btn-submit-post').disabled = visibility === '';
                });
            });

            // Handle form submission
            window.handleSubmitPost = function(event) {
                event.preventDefault();

                if (visibility === '') {
                    alert('Please select a visibility option.');
                    return;
                }

                let form = event.target;
                let formData = new FormData(form);

                // Ambil tab yang sedang aktif
                let activeTab = document.querySelector('.nav-link.active').getAttribute('href');

                let content = '';
                let type = '';
                if (activeTab === '#story') {
                    content = document.getElementById('story_content').value;
                    type = 'story';
                } else if (activeTab === '#article') {
                    content = document.getElementById('article_content').value;
                    type = 'article';
                }

                formData.set('content', content);
                formData.set('type', type);
                formData.set('visibility', visibility);
                console.log("Content: ", content);

                // Kirim data dengan axios atau fetch jika diperlukan
                axios.post('{{ route('posts.store') }}', formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                }).then(response => {
                    console.log(response.data);
                    form.reset();
                    visibility = ''; // Reset visibility
                    document.getElementById('btn-submit-post').disabled =
                        true; // Disable submit button
                    fetchPosts();
                }).catch(error => {
                    console.log(error.response.data);
                }).finally(() => {
                    isSubmittingPost = false;
                    document.getElementById('btn-submit-post').innerHTML = 'Share an update';
                    document.getElementById('btn-submit-post').removeAttribute('disabled');
                });
            };

            // // Modal event handler
            // $('#modalPost').on('show.bs.modal', function(event) {
            //     // Get the button that triggered the modal
            //     const button = $(event.relatedTarget);
            //     // Extract post id from data attribute
            //     currentPostId = button.data('postid');
            //     console.log("Opening modal for post ID:", currentPostId);

            //     // Clear previous comments
            //     $('#comments-container').empty();

            //     // Load comments for this post
            //     if (currentPostId) {
            //         loadComments(currentPostId);
            //     } else {
            //         console.error("No post ID available for comments");
            //     }
            // });
            // Modal event handler
            $('#modalPost').on('show.bs.modal', function(event) {
                // Get the button that triggered the modal
                const button = $(event.relatedTarget);
                // Extract post id from data attribute
                currentPostId = button.data('postid');
                console.log("Opening modal for post ID:", currentPostId);

                // Clear previous comments
                $('#comments-container').empty();

                // Load comments for this post
                // if (currentPostId) {
                //     loadComments(currentPostId);
                // } else {
                //     console.error("No post ID available for comments");
                // }
            });

            // Modal close event handler
            $('#modalPost').on('hidden.bs.modal', function(event) {
                // Reset current post ID
                currentPostId = null;

                // Clear previous comments
                $('#commentContent').val('');
            });
        });
    </script>


    {{-- ini script bug button send ga bs --}}

    {{-- <script>
        $(document).on('click', '#sendCommentButton', function() {
            const commentContent = $('#commentContent').val().trim();
            if (commentContent) {
                axios.post('/api/comments', {
                        content: commentContent
                    })
                    .then(response => {
                        if (response.data.status === 'success') {
                            alert('Comment sent successfully!');
                            $('#commentContent').val('');
                            $('#modalPost').modal('hide');
                        }
                    })
                    .catch(error => {
                        console.error('Error sending comment:', error);
                    });
            } else {
                alert('Comment cannot be empty.');
            }
        });
    </script> --}}

    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
@endpush
