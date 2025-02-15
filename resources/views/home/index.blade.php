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
                            <div class="border-bottom post-header p-3">
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
                                            data-target="#modalPost" data-postId=""><i
                                                class="feather-message-square mr-1"></i>
                                            Comment</button>
                                        <button class="btn btn-light btn-sm"><i class="feather-share mr-1"></i>
                                            Share</button>
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
                                <span class="ml-auto"><button id="followBtn" type="button" class="btn btn-light btn-sm"><i
                                            id="followIcon" class="feather-user-plus"></i></button>
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
                                            <div class="small text-gray-500"><i class="feather-map-pin"></i> India, Punjab
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

    <!-- Modal for adding comments -->
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
                        <div class="dropdown-list-image mr-3">
                            <img class="rounded-circle" src="{{ auth()->user()->getProfileImage() }}" alt="">
                            <div class="status-indicator {{ auth()->user()->isOnline() ? 'bg-success' : 'bg-secondary' }}">
                            </div>
                        </div>
                        <div class="font-weight-bold">
                            <div class="text-truncate">{{ auth()->user()->name }} <span
                                    class="small float-right">Now</span></div>
                            <div class="small text-gray-500">Add your comment below</div>
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

        // Function to format the post date
        function formatPostDate(dateString) {
            const date = new Date(dateString);
            const now = new Date();
            const diffTime = Math.abs(now - date);
            const diffDays = Math.floor(diffTime / (1000 * 60 * 60 * 24));

            if (diffDays === 0) {
                return 'Today';
            } else if (diffDays === 1) {
                return 'Yesterday';
            } else {
                return `${diffDays} days ago`;
            }
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
            const commentButton = postElement.querySelector('.comment-button');

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
                commentButton.addEventListener('click', function() {
                    currentPostId = post.id;
                    $('#modalPost').modal('show');
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
                    document.getElementById('btn-submit-post').innerHTML = 'Post Status';
                    document.getElementById('btn-submit-post').removeAttribute('disabled');
                });
            };

        });
    </script>
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
@endpush
