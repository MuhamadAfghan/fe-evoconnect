@extends('layouts.templates')

@section('content')
    <style>
        /* Container utama komentar */
        #comments-container {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        /* Setiap komentar */
        .media {
            display: flex;
            align-items: flex-start;
            gap: 15px;
            padding-bottom: 15px;
            width: 100%;
            position: relative;
        }

        /* Garis pemisah penuh */
        .media::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 1px;
            background-color: #ddd;
        }

        /* Styling untuk gambar profil */
        .media img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
        }

        /* Bagian teks dalam komentar */
        .media-body {
            flex: 1;
        }

        .media-body h5 {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .media-body small {
            color: gray;
            font-size: 12px;
        }

        .media-body p {
            margin-bottom: 0;
            color: #333;
            font-size: 14px;
        }

        *::-webkit-scrollbar {
            width: 5px;
        }

        *::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        *::-webkit-scrollbar-thumb {
            background: #c1c1c1;
        }

        *::-webkit-scrollbar-thumb:hover {
            background: #c1c1c1;
        }

        .blog {
            border: 1px solid #ddd;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
        }

        .blog img {
            width: 100%;
            height: auto;
            max-height: 200px;
            object-fit: cover;
        }
    </style>
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <!-- <div id="blogs"></div> -->
                    <div class="blog-card padding-card box mb-3 rounded border-0 bg-white shadow-sm">
                        <img class="card-img-top" style="width: 100%; max-height: 400px; object-fit: cover;"
                            src="{{ $blog->image ? asset('storage/' . $blog->image) : asset('default-group.png') }}"
                            alt="Card image cap">
                        <div class="card-body">
                            <span class="badge badge-success">{{ $blog->category }}</span>
                            <h2>{{ $blog->title }}</h2>
                            <h6 class="small text-muted mb-3"><i class="feather-calendar"></i>
                                {{ $blog->created_at->format('F d, Y') }}
                            </h6>
                            <div style="font-size: 17px; white-space: normal; word-wrap: break-word;"
                                id="content-blog-wrapper">
                                {!! $blog->content !!}
                            </div>
                        </div>
                    </div>
                    <div class="sidebar-card box mb-3 rounded border-0 bg-white shadow-sm">
                        <div class="padding-card reviews-card box mb-3 rounded border-0 bg-white shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title mb-4"><span id="review-count">0</span> Reviews</h5>
                                <div class="media mb-4"id="comments-container" style="max-height: 300px; overflow-y: auto;">
                                    <!-- isi dari komen setelah di submit -->
                                    {{-- <a class="d-inline-block u-text-muted" href="#" id="viewMore">
                                        <span>+</span> View More
                                    </a> --}}

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- input komentar -->
                    <div class="padding-card box mb-3 rounded border-0 bg-white shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title mb-4">Leave a Comment</h5>
                            <form name="sentMessage">
                                <div class="control-group form-group">
                                    <div class="controls">
                                        <label>Review <span class="text-danger">*</span></label>
                                        <textarea rows="5" cols="100" name="content" class="form-control"></textarea>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">SUBMIT</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4">
                    <div class="sidebar-card box mb-3 rounded border-0 bg-white shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title mb-4">Blog Search</h5>
                            <div class="input-group">
                                <input class="form-control" placeholder="Type and hit enter"
                                    aria-label="Recipient's username" aria-describedby="basic-addon2" type="text">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button"><i
                                            class="feather-arrow-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar-card box mb-3 rounded border-0 bg-white shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title mb-4">Popular Posts</h5>
                            <a href="#">
                                <h6>Possimus aut mollitia eum ipsum</h6>
                            </a>
                            <p class="mb-0"><i class="feather-calendar"></i> April 05, 2020</p>
                            <hr>
                            <a href="#">
                                <h6>Nulla malesuada mauris non nulla imperdiet ullamcorper</h6>
                            </a>
                            <p class="mb-0"><i class="feather-calendar"></i> June 20, 2020</p>
                            <hr>
                            <a href="#">
                                <h6 class="text-dark">Focus on creating and growing your projects and websites</h6>
                            </a>
                            <p class="mb-0"><i class="feather-calendar"></i> June 29, 2020</p>
                            <hr>
                            <a href="#">
                                <h6>Vestibulum lobortis urna eu mauris viverra porttitor. Cras consequat </h6>
                            </a>
                            <p class="mb-0"><i class="feather-calendar"></i> October 10, 2020</p>
                            <hr>
                            <a href="#">
                                <h6>Sed lacinia varius nisi et euismod.</h6>
                            </a>
                            <p class="mb-0"><i class="feather-calendar"></i> April 05, 2020</p>
                        </div>
                    </div>
                    {{-- <div class="sidebar-card box shadow-sm rounded bg-white mb-3 border-0">
                            <div class="card-body">
                                <h5 class="card-title mb-3">Archives</h5>
                                <ul class="sidebar-card-list">
                                    <li><a href="#"><i class="feather-arrow-right-circle"></i> December, 2017</a></li>
                                    <li><a href="#"><i class="feather-arrow-right-circle"></i> November, 2017</a></li>
                                    <li><a href="#"><i class="feather-arrow-right-circle"></i> October, 2017</a></li>
                                </ul>
                            </div>
                        </div> --}}

                    <div class="sidebar-card box mb-3 rounded border-0 bg-white shadow-sm">

                        <div class="card-body">
                            <h5 class="card-title mb-4">Jobs</h5>

                            <div id="featured-properties" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#featured-properties" data-slide-to="0" class=""></li>
                                    <li data-target="#featured-properties" data-slide-to="1" class="active"></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item">
                                        <div class="job-item rounded border bg-white">
                                            <div class="d-flex align-items-center job-item-header p-3">
                                                <div class="mr-2 overflow-hidden">
                                                    <h6 class="font-weight-bold text-dark text-truncate mb-0">
                                                        Product
                                                        Director</h6>
                                                    <div class="text-truncate text-primary">Spotify Inc.</div>
                                                    <div class="small text-gray-500"><i class="feather-map-pin"></i>
                                                        India, Punjab</div>
                                                </div>
                                                <img class="img-fluid ml-auto" src="img/l3.png" alt="">
                                            </div>
                                            <div
                                                class="d-flex align-items-center border-top border-bottom job-item-body p-3">
                                                <div class="overlap-rounded-circle">
                                                    <img class="rounded-circle shadow-sm" data-toggle="tooltip"
                                                        data-placement="top" title="" src="img/p9.png"
                                                        alt="" data-original-title="Sophia Lee">
                                                    <img class="rounded-circle shadow-sm" data-toggle="tooltip"
                                                        data-placement="top" title="" src="img/p10.png"
                                                        alt="" data-original-title="John Doe">
                                                    <img class="rounded-circle shadow-sm" data-toggle="tooltip"
                                                        data-placement="top" title="" src="img/p11.png"
                                                        alt="" data-original-title="Julia Cox">
                                                    <img class="rounded-circle shadow-sm" data-toggle="tooltip"
                                                        data-placement="top" title="" src="img/p12.png"
                                                        alt="" data-original-title="Robert Cook">
                                                </div>
                                                <span class="font-weight-bold text-muted">18 connections</span>
                                            </div>
                                            <div class="job-item-footer p-3">
                                                <small class="text-gray-500"><i class="feather-clock"></i> Posted
                                                    3 Days
                                                    ago</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="carousel-item active">
                                        <div class="job-item rounded border bg-white">
                                            <div class="d-flex align-items-center job-item-header p-3">
                                                <div class="mr-2 overflow-hidden">
                                                    <h6 class="font-weight-bold text-dark text-truncate mb-0">
                                                        Product
                                                        Director</h6>
                                                    <div class="text-truncate text-primary">Spotify Inc.</div>
                                                    <div class="small text-gray-500"><i class="feather-map-pin"></i>
                                                        India, Punjab</div>
                                                </div>
                                                <img class="img-fluid ml-auto" src="img/l3.png" alt="">
                                            </div>
                                            <div
                                                class="d-flex align-items-center border-top border-bottom job-item-body p-3">
                                                <div class="overlap-rounded-circle">
                                                    <img class="rounded-circle shadow-sm" data-toggle="tooltip"
                                                        data-placement="top" title="" src="img/p9.png"
                                                        alt="" data-original-title="Sophia Lee">
                                                    <img class="rounded-circle shadow-sm" data-toggle="tooltip"
                                                        data-placement="top" title="" src="img/p10.png"
                                                        alt="" data-original-title="John Doe">
                                                    <img class="rounded-circle shadow-sm" data-toggle="tooltip"
                                                        data-placement="top" title="" src="img/p11.png"
                                                        alt="" data-original-title="Julia Cox">
                                                    <img class="rounded-circle shadow-sm" data-toggle="tooltip"
                                                        data-placement="top" title="" src="img/p12.png"
                                                        alt="" data-original-title="Robert Cook">
                                                </div>
                                                <span class="font-weight-bold text-muted">18 connections</span>
                                            </div>
                                            <div class="job-item-footer p-3">
                                                <small class="text-gray-500"><i class="feather-clock"></i> Posted
                                                    3 Days
                                                    ago</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>

    <script>
        let blogId = "{{ $blog->id }}";
        let commentsContainer = document.querySelector('#comments-container');
        let reviewCountElement = document.querySelector('#review-count');

        function createCommentMoreElement(data) {
            //
        }

        function createCommentElement(data) {
            let commentsContainer = document.querySelector('#comments-container');
            let currentDate = new Date(data.created_at);
            let formattedDate = currentDate.toLocaleDateString("en-US", {
                year: "numeric",
                month: "short",
                day: "2-digit"
            });

            let newComment = `
                    <div class="media mb-4">
                        <img class="d-flex mr-3 rounded" src="${data.user.profile_photo_url}" alt="">
                        <div class="media-body">
                            <h5 class="mt-0">${data.user.name} <small>${formattedDate}</small></h5>
                            <p>${data.content}</p>
                        </div>
                    </div>
                `;

            commentsContainer.insertAdjacentHTML("afterbegin",
                newComment);

            return;
        }

        function fetchComments() {

            fetch(`/api/blogs/comments/${blogId}`)
                .then(response => response.json())
                .then(data => {

                    reviewCountElement.textContent = data.data.length;

                    commentsContainer.innerHTML = '';
                    data.data.forEach(comment => {
                        createCommentElement(comment);
                    });
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }

        document.addEventListener('DOMContentLoaded', function() {
            fetchComments();

            document.querySelector('form[name="sentMessage"]').addEventListener('submit', function(event) {
                event.preventDefault();

                let content = document.querySelector('textarea').value;

                if (content.trim() === "") {
                    alert("Komentar tidak boleh kosong!");
                    return;
                }

                fetch(`/api/blogs/comments/${blogId}`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        },
                        body: JSON.stringify({
                            content: content
                        })
                    })
                    .then(response => response.json())
                    .then(data => {

                        fetchComments();

                        document.querySelector('textarea').value =
                            ''; // Kosongkan textarea setelah sukses

                        // Perbarui jumlah review
                        let currentCount = parseInt(reviewCountElement.textContent);
                        reviewCountElement.textContent = currentCount + 1;

                        // alert("Komentar berhasil dikirim!");
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert("Terjadi kesalahan saat mengirim komentar.");
                    });

            });

            const contentBlogWrapper = document.querySelector('#content-blog-wrapper')
            contentBlogWrapper.querySelectorAll('a[href^="http"]').forEach((a) => {
                a.setAttribute('target', '_blank');
                a.setAttribute('rel', 'noopener noreferrer');
            });
        });
    </script>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- slick Slider JS-->
    <script type="text/javascript" src="vendor/slick/slick.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/osahan.js"></script>
@endsection
