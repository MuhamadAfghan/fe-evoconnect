@extends('layouts.templates')

@section('content')
    <div class="bg-primary py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mx-auto">
                    <h1 class="font-weight-light text-white"><span class="font-weight-bold">Blog
                        </span> Single</h1>
                    <p class="text-white-50 mb-2">Last modified: March 27, 202 (view archived versions)
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8">

                    <div class="blog-card padding-card box mb-3 rounded border-0 bg-white shadow-sm">
                        <img class="card-img-top" src="img/blog/2.png" alt="Card image cap">
                        <div class="card-body">
                            <span class="badge badge-success">House/Villa</span>
                            <h2>Possimus aut mollitia eum ipsum</h2>
                            <h6 class="mb-3"><i class="feather-calendar"></i> March 09, 2020 / 3 Comments</h6>
                            <p>
                                There are many variations of passages of Lorem Ipsum available, but the majority have
                                suffered alteration in
                                some form, by injected humour, or randomised words which don't look even slightly
                                believable. If you are going to use a passage of Lorem Ipsum...
                            </p>
                            <p>
                                Praesent eget euismod nibh. Fusce ac tellus eu nisl lobortis maximus ac eget sapien. Nulla
                                malesuada mauris non nulla imperdiet ullamcorper.
                            </p>
                            <p>Spacial has both a web app and an android app to make your website easy and always available.
                                It offers you all the designs in collaboration with some smart people. Your projects will
                                look great everywhere you go. Use new components that come included!</p>
                            <div class="row">
                                <div class="col-xl-10 offset-xl-1">
                                    <blockquote class="margin-top-1x margin-bottom-1x">
                                        <p class="font-weight-bold">Perspiciatis unde omnis iste natus error sit voluptatem
                                            accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo.
                                        </p>
                                        <cite>Someone famous</cite>
                                    </blockquote>
                                </div>
                            </div>
                            <p>
                                Focus on creating and growing your projects and websites, and we‘ll take care of spinning up
                                new designs for your users and making sure they’re great. Work with all types of customers
                                right out of the box while still getting paid in your preferred currency.
                            </p>
                            <p class="mb-0">Sed porta libero metus, nec feugiat enim pharetra vel. Sed vel sagittis augue.
                                Donec hendrerit nibh ac dolor lobortis, eu varius odio sollicitudin. Proin non condimentum
                                nulla, quis dictum leo. Vestibulum lobortis urna eu mauris viverra porttitor. Cras consequat
                                leo condimentum lacus viverra sollicitudin. Donec dignissim ornare est, nec scelerisque
                                purus mollis eu. Phasellus dictum suscipit ligula. Donec malesuada gravida velit. Nulla
                                egestas diam in ligula mollis, nec tincidunt diam porta. Proin eleifend lacinia diam quis
                                pretium. Sed lacinia varius nisi et euismod. Ut ac arcu vulputate, porta nibh non, ultricies
                                erat. Nulla facilisi. </p>
                        </div>
                        <div class="card-footer border-0">
                            <div class="footer-social"><span>Share</span> : &nbsp;
                                <a href="#"><i class="feather-facebook"></i></a>
                                <a href="#"><i class="feather-twitter"></i></a>
                                <a href="#"><i class="feather-instagram"></i></a>
                            </div>
                        </div>

                    </div>

                    <div class="padding-card reviews-card box mb-3 rounded border-0 bg-white shadow-sm">

                        <div class="card-body">
                            <h5 class="card-title mb-4">3 Reviews</h5>
                            <div class="media mb-4">
                                <img class="d-flex mr-3 rounded" src="img/user/1.jpg" alt="">
                                <div class="media-body">
                                    <h5 class="mt-0">Stave Martin <small>Feb 12, 2020</small>
                                        {{-- <span class="star-rating float-right">
                                            <i class="feather-star text-warning"></i>
                                            <i class="feather-star text-warning"></i>
                                            <i class="feather-star text-warning"></i>
                                            <i class="feather-star text-warning"></i>
                                            <i class="feather-star text-warning"></i><small class="text-success">5/2</small>
                                        </span> --}}
                                    </h5>
                                    <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante
                                        sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.
                                        Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in
                                        faucibus.</p>
                                </div>
                            </div>
                            <div class="media">
                                <img class="d-flex mr-3 rounded" src="img/user/2.jpg" alt="">
                                <div class="media-body">
                                    <h5 class="mt-0">Mark Smith <small>Feb 09, 2020</small>
                                        {{-- <span
                                            class="star-rating float-right">
                                            <i class="feather-star text-warning"></i>
                                            <i class="feather-star text-warning"></i>
                                            <i class="feather-star text-warning"></i>
                                            <i class="feather-star text-warning"></i>
                                            <i class="feather-star text-warning"></i><small class="text-success">5/1</small>
                                        </span> --}}
                                    </h5>
                                    <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante
                                        sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.
                                        Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in
                                        faucibus.</p>

                                    <div class="media mt-4">
                                        <img class="d-flex mr-3 rounded" src="img/user/3.jpg" alt="">
                                        <div class="media-body">
                                            <h5 class="mt-0">Ryan Printz <small>Nov 13, 2020</small>
                                                {{-- <span
                                                    class="star-rating float-right">
                                                    <i class="feather-star text-warning"></i>
                                                    <i class="feather-star text-warning"></i>
                                                    <i class="feather-star text-warning"></i>
                                                    <i class="feather-star text-warning"></i>
                                                    <i class="feather-star text-warning"></i><small
                                                        class="text-success">5/5</small>
                                                </span> --}}
                                            </h5>
                                            <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante
                                                sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra
                                                turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia
                                                congue felis in faucibus.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="media mt-4">
                                <img class="d-flex mr-3 rounded" src="img/user/5.jpg" alt="">
                                <div class="media-body">
                                    <h5 class="mt-0">Stave Mark <small>Feb 12, 2020</small>
                                        {{-- <span class="star-rating float-right">
                                            <i class="feather-star text-warning"></i>
                                            <i class="feather-star text-warning"></i>
                                            <i class="feather-star text-warning"></i>
                                            <i class="feather-star text-warning"></i>
                                            <i class="feather-star text-warning"></i><small class="text-success">5/2</small>
                                        </span> --}}
                                    </h5>
                                    <p class="mb-0">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus
                                        scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus
                                        viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia
                                        congue felis in faucibus.</p>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="padding-card box mb-3 rounded border-0 bg-white shadow-sm">

                        <div class="card-body">
                            <h5 class="card-title mb-4">Leave a Comment</h5>


                            <form name="sentMessage">
                                <div class="row">
                                    <div class="control-group form-group col-lg-6 col-md-6">
                                        <div class="controls">
                                            <label>Your Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" required="">
                                        </div>
                                    </div>
                                    <div class="control-group form-group col-lg-6 col-md-6">
                                        <div class="controls">
                                            <label>Your Email <span class="text-danger">*</span></label>
                                            <input placeholder="{{ auth()->user()->email }}" type="text"
                                                class="form-control">
                                        </div>
                                    </div>

                                </div>

                                <div class="control-group form-group">
                                    <div class="controls">
                                        <label>Review <span class="text-danger">*</span></label>
                                        <textarea rows="10" cols="100" class="form-control"></textarea>
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
                                                    <h6 class="font-weight-bold text-dark text-truncate mb-0">Product
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
                                                <small class="text-gray-500"><i class="feather-clock"></i> Posted 3 Days
                                                    ago</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="carousel-item active">
                                        <div class="job-item rounded border bg-white">
                                            <div class="d-flex align-items-center job-item-header p-3">
                                                <div class="mr-2 overflow-hidden">
                                                    <h6 class="font-weight-bold text-dark text-truncate mb-0">Product
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
                                                <small class="text-gray-500"><i class="feather-clock"></i> Posted 3 Days
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
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- slick Slider JS-->
    <script type="text/javascript" src="vendor/slick/slick.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/osahan.js"></script>
@endsection
