@extends('layouts.templates')

@section('content')
    <div class="bg-primary mt-5 py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 py-5 text-center">
                    <h1 class="font-weight-light mt-0 text-white">Find the <span class="font-weight-bold">right plan</span>
                        for your site</h1>
                    <p class="text-white-50 mb-4">Last modified: March 27, 202 (view archived versions)
                    </p>
                    <button type="button" class="btn btn-lg btn-outline-light">Monthly</button>
                    <button type="button" class="btn btn-lg btn-outline-light">Yearly <span
                            class="badge badge-pill badge-warning">50%</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="box card rounded border-0 shadow-sm">
                        <!-- Header -->
                        <header class="card-header border-0 p-5 text-center">
                            <h4 class="h6 text-danger mb-2">Starter</h4>
                            <span class="d-block">
                                <span class="display-4 text-dark font-weight-normal">
                                    <span class="small">$</span>199
                                </span>
                                <span class="d-block text-secondary">Per Year</span>
                            </span>
                        </header>
                        <!-- End Header -->
                        <!-- Content -->
                        <div class="card-body p-4">
                            <ul class="list-group list-group-flush mb-4">
                                <li class="list-group-item border-0 px-0 py-2"><i
                                        class="feather-check text-success mr-1"></i> Community support</li>
                                <li class="list-group-item border-0 px-0 py-2"><i class="feather-x text-danger mr-1"></i>
                                    400+ pages</li>
                                <li class="list-group-item border-0 px-0 py-2"><i class="feather-x text-danger mr-1"></i>
                                    100+ header variations</li>
                                <li class="list-group-item border-0 px-0 py-2"><i class="feather-x text-danger mr-1"></i>
                                    20+ home page options</li>
                                <li class="list-group-item border-0 px-0 py-2"><i class="feather-x text-danger mr-1"></i>
                                    Priority Support</li>
                            </ul>
                            <button type="button" class="btn btn-block btn-light" tabindex="0">Contact Us</button>
                        </div>
                        <!-- End Content -->
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="box card rounded border-0 shadow-sm">
                        <!-- Header -->
                        <header class="card-header border-0 p-5 text-center">
                            <h4 class="h6 text-warning mb-2">Basic</h4>
                            <span class="d-block">
                                <span class="display-4 text-dark font-weight-normal">
                                    <span class="small">$</span>399
                                </span>
                                <span class="d-block text-secondary">Per Year</span>
                            </span>
                        </header>
                        <!-- End Header -->
                        <!-- Content -->
                        <div class="card-body p-4">
                            <ul class="list-group list-group-flush mb-4">
                                <li class="list-group-item border-0 px-0 py-2"><i
                                        class="feather-check text-success mr-1"></i> Community support</li>
                                <li class="list-group-item border-0 px-0 py-2"><i
                                        class="feather-check text-success mr-1"></i> 400+ pages</li>
                                <li class="list-group-item border-0 px-0 py-2"><i
                                        class="feather-check text-success mr-1"></i> 100+ header variations</li>
                                <li class="list-group-item border-0 px-0 py-2"><i class="feather-x text-danger mr-1"></i>
                                    20+ home page options</li>
                                <li class="list-group-item border-0 px-0 py-2"><i class="feather-x text-danger mr-1"></i>
                                    Priority Support</li>
                            </ul>
                            <button type="button" class="btn btn-block btn-light" tabindex="0">Subscribe</button>
                        </div>
                        <!-- End Content -->
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="box card rounded border-0 shadow-sm">
                        <!-- Header -->
                        <header class="card-header border-0 p-5 text-center">
                            <h4 class="h6 text-success mb-2">Company</h4>
                            <span class="d-block">
                                <span class="display-4 text-dark font-weight-normal">
                                    <span class="small">$</span>1099
                                </span>
                                <span class="d-block text-secondary">Per Year</span>
                            </span>
                        </header>
                        <!-- End Header -->
                        <!-- Content -->
                        <div class="card-body p-4">
                            <ul class="list-group list-group-flush mb-4">
                                <li class="list-group-item border-0 px-0 py-2"><i
                                        class="feather-check text-success mr-1"></i> Community support</li>
                                <li class="list-group-item border-0 px-0 py-2"><i
                                        class="feather-check text-success mr-1"></i> 400+ pages</li>
                                <li class="list-group-item border-0 px-0 py-2"><i
                                        class="feather-check text-success mr-1"></i> 100+ header variations</li>
                                <li class="list-group-item border-0 px-0 py-2"><i
                                        class="feather-check text-success mr-1"></i> 20+ home page options</li>
                                <li class="list-group-item border-0 px-0 py-2"><i class="feather-x text-danger mr-1"></i>
                                    riority Support</li>
                            </ul>
                            <button type="button" class="btn btn-block btn-light" tabindex="0">Subscribe</button>
                        </div>
                        <!-- End Content -->
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="box card rounded border-0 shadow-sm">
                        <!-- Header -->
                        <header class="card-header border-0 p-5 text-center">
                            <h4 class="h6 text-danger mb-2">Enterprise</h4>
                            <span class="d-block">
                                <span class="display-4 text-dark font-weight-normal">
                                    Help
                                </span>
                                <span class="d-block text-secondary font-size-1">no user limit</span>
                            </span>
                        </header>
                        <!-- End Header -->
                        <!-- Content -->
                        <div class="card-body p-4">
                            <ul class="list-group list-group-flush mb-4">
                                <li class="list-group-item border-0 px-0 py-2"><i
                                        class="feather-check text-success mr-1"></i> Community support</li>
                                <li class="list-group-item border-0 px-0 py-2"><i
                                        class="feather-check text-success mr-1"></i> 400+ pages</li>
                                <li class="list-group-item border-0 px-0 py-2"><i
                                        class="feather-check text-success mr-1"></i> 100+ header variations</li>
                                <li class="list-group-item border-0 px-0 py-2"><i
                                        class="feather-check text-success mr-1"></i> 20+ home page options</li>
                                <li class="list-group-item border-0 px-0 py-2"><i
                                        class="feather-check text-success mr-1"></i> riority Support</li>
                            </ul>
                            <button type="button" class="btn btn-block btn-primary" tabindex="0">Contact Us</button>
                        </div>
                        <!-- End Content -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="bg-light py-4">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <!-- Copyright -->
                <p class="small text-muted mb-0">© EVOConnect. 2020 Askbootstrap.</p>
                <!-- End Copyright -->
                <!-- Social Networks -->
                <ul class="list-inline mb-0">
                    <li class="list-inline-item">
                        <a class="btn btn-sm btn-light" href="#">
                            <span class="feather-facebook"></span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a class="btn btn-sm btn-light" href="#">
                            <span class="feather-youtube"></span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a class="btn btn-sm btn-light" href="#">
                            <span class="feather-twitter"></span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a class="btn btn-sm btn-light" href="#">
                            <span class="feather-github"></span>
                        </a>
                    </li>
                </ul>
                <!-- End Social Networks -->
            </div>
        </div>
    </footer>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- slick Slider JS-->
    <script type="text/javascript" src="vendor/slick/slick.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/osahan.js"></script>
@endsection
