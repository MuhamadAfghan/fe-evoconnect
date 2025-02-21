@extends('layouts.templates')

@section('content')
    <style>
        .bg-primary {
            padding: 9em;
        }
    </style>
    {{-- ini bagian header h1 dan p --}}
    <div class="bg-primary">
        <div class="mb-1 text-start">
            <h1 class="font-weight-light text-white"><span class="font-weight-bold">EVOConnect Blog</span></h1>
            <h2 class="font-weight-light text-white">Blog Your Way to a Better
                Career</h2>
            <a href="create-blog" class="btn btn-light mt-1">Write Your Career Story</a>
        </div>
    </div>
    <!-- </div> -->
    {{-- ini bagian konten di dalam nya ada gambar, category, title, deskripsi  --}}
    <div class="py-5">
        <div class="">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="row">
                        <div class="col-lg-4 col-md-4">
                            <div class="box blog-card mb-3 rounded border-0 bg-white shadow-sm">
                                <div class="card-body">
                                    <span~ class="badge badge-success">House/Villa</span~>
                                    <h6 class="text-dark">Possimus aut mollitia eum ipsum</h6>
                                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                        Possimus
                                        aut mollitia eum ipsum fugiat odio officiis odit.</p>
                                </div>
                                <div class="card-footer border-0">
                                    <p class="mb-0"><img class="rounded-circle" src="img/user.png" alt="Card image cap">
                                        <strong>Rahul Yadav</strong> On October 03, 2020
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="box blog-card mb-3 rounded border-0 bg-white shadow-sm">
                                <div class="card-body">
                                    <span class="badge badge-danger">Shop/Showroom</span>
                                    <h6 class="text-dark">Consectetur adipisicing elit</h6>
                                    <p class="mb-0">Cnsectetur ipsum dolor sit amet, consectetur adipisicing elit.
                                        Possimus aut mollitia eum ipsum fugiat odio officiis odit.</p>
                                </div>
                                <div class="card-footer border-0">
                                    <p class="mb-0"><img class="rounded-circle" src="img/user/2.jpg" alt="Card image cap">
                                        <strong>Rahul Yadav</strong> On October 05, 2020
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="box blog-card mb-3 rounded border-0 bg-white shadow-sm">
                                <div class="card-body">
                                    <span class="badge badge-info">Industrial Building</span>
                                    <h6 class="text-dark">Fugiat odio officiis odit</h6>
                                    <p class="mb-0">Mollitia ipsum dolor sit amet, consectetur adipisicing elit.
                                        Possimus aut mollitia eum ipsum fugiat odio officiis odit.</p>
                                </div>
                                <div class="card-footer border-0">
                                    <p class="mb-0"><img class="rounded-circle" src="img/user/1.jpg" alt="Card image cap">
                                        <strong>Rahul Yadav</strong> On October 06, 2020
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-lg-4 col-md-4">
                            <div class="box blog-card mb-3 rounded border-0 bg-white shadow-sm">
                                <div class="card-body">
                                    <span class="badge badge-white">House/Villa</span>
                                    <h6 class="text-dark">Possimus aut mollitia eum ipsum</h6>
                                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus
                                        aut mollitia eum ipsum fugiat odio officiis odit.</p>
                                </div>
                                <div class="card-footer border-0">
                                    <p class="mb-0"><img class="rounded-circle" src="img/user/4.jpg" alt="Card image cap">
                                        <strong>Rahul Yadav</strong> On October 03, 2020
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="box blog-card mb-3 rounded border-0 bg-white shadow-sm">
                                <div class="card-body">
                                    <span class="badge badge-info">Shop/Showroom</span>
                                    <h6 class="text-dark">Consectetur adipisicing elit</h6>
                                    <p class="mb-0">Cnsectetur ipsum dolor sit amet, consectetur adipisicing elit.
                                        Possimus aut mollitia eum ipsum fugiat odio officiis odit.</p>
                                </div>
                                <div class="card-footer border-0">
                                    <p class="mb-0"><img class="rounded-circle" src="img/user/5.jpg" alt="Card image cap">
                                        <strong>Rahul Yadav</strong> On October 05, 2020
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="box blog-card mb-3 rounded border-0 bg-white shadow-sm">
                                <div class="card-body">
                                    <span class="badge badge-dark">Industrial Building</span>
                                    <h6 class="text-dark">Fugiat odio officiis odit</h6>
                                    <p class="mb-0">Mollitia ipsum dolor sit amet, consectetur adipisicing elit.
                                        Possimus aut mollitia eum ipsum fugiat odio officiis odit.</p>
                                </div>
                                <div class="card-footer border-0">
                                    <p class="mb-0"><img class="rounded-circle" src="img/user/1.jpg" alt="Card image cap">
                                        <strong>Rahul Yadav</strong> On October 06, 2020
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="row">
                        <div class="col-lg-4 col-md-4">
                            <div class="box blog-card mb-3 rounded border-0 bg-white shadow-sm">
                                <div class="card-body">
                                    <span class="badge badge-success">House/Villa</span>
                                    <h6 class="text-dark">Possimus aut mollitia eum ipsum</h6>
                                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                        Possimus aut mollitia eum ipsum fugiat odio officiis odit.</p>
                                </div>
                                <div class="card-footer border-0">
                                    <p class="mb-0"><img class="rounded-circle" src="img/user/4.jpg" alt="Card image cap">
                                        <strong>Rahul Yadav</strong> On October 03, 2020
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="box blog-card mb-3 rounded border-0 bg-white shadow-sm">
                                <div class="card-body">
                                    <span class="badge badge-danger">Shop/Showroom</span>
                                    <h6 class="text-dark">Consectetur adipisicing elit</h6>
                                    <p class="mb-0">Cnsectetur ipsum dolor sit amet, consectetur adipisicing elit.
                                        Possimus aut mollitia eum ipsum fugiat odio officiis odit.</p>
                                </div>
                                <div class="card-footer border-0">
                                    <p class="mb-0"><img class="rounded-circle" src="img/user/3.jpg"
                                            alt="Card image cap">
                                        <strong>Rahul Yadav</strong> On October 05, 2020
                                    </p>
                                </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="box blog-card mb-3 rounded border-0 bg-white shadow-sm">
                                <a href="#"><img class="card-img-top" src="img/blog/9.png" alt="Card image cap">
                                    <div class="card-body">
                                        <span class="badge badge-primary">Industrial Building</span>
                                        <h6 class="text-dark">Fugiat odio officiis odit</h6>
                                        <p class="mb-0">Mollitia ipsum dolor sit amet, consectetur adipisicing elit.
                                            Possimus aut mollitia eum ipsum fugiat odio officiis odit.</p>
                                    </div>
                                    <div class="card-footer border-0">
                                        <p class="mb-0"><img class="rounded-circle" src="img/user/2.jpg"
                                                alt="Card image cap"> <strong>Rahul Yadav</strong> On October 06, 2020
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>

                    </div>


                    <nav class="mt-5">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1"><i
                                        class="feather-arrow-left"></i></a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">...</a></li>
                            <li class="page-item"><a class="page-link" href="#">10</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#"><i class="feather-arrow-right"></i></a>
                            </li>
                        </ul>
                    </nav>

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
