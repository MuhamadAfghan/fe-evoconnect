@extends('layouts.templates')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="py-4">
        <div class="container">
            <div class="row">
                <!-- Main Content -->
                <main class="col col-xl-6 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
                    <div class="box osahan-share-post mb-3 rounded border bg-white shadow-sm">
                        <!-- Search Form -->
                        <form class="job-search border-bottom p-3">
                            <div class="input-group">
                                <input type="text" class="form-control job-search-input" name="query"
                                    placeholder="Search jobs..." aria-label="Search jobs">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button">
                                        <i class="feather-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel"
                                aria-labelledby="home-tab">
                                <div class="job-tags p-3">
                                    <button type="button" class="btn btn-outline-secondary btn-sm filter-btn active mr-1"
                                        data-filter="All">All</button>
                                    <button type="button" class="btn btn-outline-secondary btn-sm filter-btn mr-1"
                                        data-filter="Engineering">Engineering</button>
                                    <button type="button" class="btn btn-outline-secondary btn-sm filter-btn mr-1"
                                        data-filter="Marketing">Marketing</button>
                                    <button type="button" class="btn btn-outline-secondary btn-sm filter-btn mr-1"
                                        data-filter="Design">Design</button>
                                </div>
                            </div>

                            <!-- JavaScript untuk Filter Kategori -->
                            <script>
                                document.addEventListener("DOMContentLoaded", function() {
                                    // Tangkap semua tombol filter
                                    const filterButtons = document.querySelectorAll(".filter-btn");
                                    const jobItems = document.querySelectorAll(".job-item");

                                    // Event listener untuk setiap tombol filter
                                    filterButtons.forEach(button => {
                                        button.addEventListener("click", function() {
                                            // Ambil kategori filter dari atribut data-filter
                                            const category = this.getAttribute("data-filter");

                                            // Reset class tombol filter
                                            filterButtons.forEach(btn => {
                                                btn.classList.remove("active", "btn-primary");
                                                btn.classList.add("btn-outline-secondary");
                                            });

                                            // Tambahkan class aktif ke tombol yang diklik
                                            this.classList.add("active", "btn-primary");
                                            this.classList.remove("btn-outline-secondary");

                                            // Filter job-item berdasarkan kategori
                                            jobItems.forEach(item => {
                                                const jobCategory = item.getAttribute("data-category");

                                                if (category === "All" || jobCategory === category) {
                                                    item.style.display = "block";
                                                } else {
                                                    item.style.display = "none";
                                                }
                                            });
                                        });
                                    });
                                });
                            </script>
                            <div class="border-top p-3">
                                <div class="row" id="jobList">
                                    @foreach ($jobs as $job)
                                        <div class="col-md-6">
                                            <a href="{{ route('jobs-profile', $job->id) }}">
                                                <div class="job-item mb-3 border" data-title="{{ strtolower($job->title) }}"
                                                    data-company="{{ strtolower($job->company->name) }}"
                                                    data-location="{{ strtolower($job->location) }}">
                                                    <div class="d-flex align-items-center job-item-header p-3">
                                                        <div class="overflow-hidden">
                                                            <h6 class="font-weight-bold text-dark text-truncate mb-0">
                                                                {{ $job->title }}
                                                            </h6>
                                                            <div class="text-truncate text-primary">
                                                                {{ $job->company->name }}
                                                            </div>
                                                            <div class="small text-gray-500">
                                                                <i class="feather-map-pin"></i> {{ $job->location }}
                                                            </div>
                                                        </div>
                                                        <img src="{{ $job->job_photo_path ? asset('storage/' . $job->job_photo_path) : auth()->user()->getProfileImage() }}"
                                                            class="img-fluid rounded-circle job-photo ml-auto"
                                                            alt="Job Image">
                                                    </div>
                                                    <div
                                                        class="d-flex align-items-center border-top border-bottom job-item-body p-3">
                                                        <span class="text-warning">
                                                            @for ($i = 1; $i <= 5; $i++)
                                                                @php echo ($i <= $job->rating) ? '<i class="feather-star"></i>' : '<i class="feather-star text-gray-500"></i>'; @endphp
                                                            @endfor
                                                        </span>
                                                        <span
                                                            class="text-dark font-weight-bold ml-2">{{ $job->rating }}</span>
                                                        <span class="reviews-count ml-2">0</span> reviews
                                                    </div>
                                                    <div class="job-item-footer p-3">
                                                        <small class="text-gray-500">
                                                            <i class="feather-clock"></i> Posted
                                                            {{ $job->created_at->diffForHumans() }}
                                                        </small>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="w-100 p-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card overflow-hidden">
                                            <iframe
                                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.3002608935976!2d106.72595537400711!3d-6.224082960955564!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f975a8705c85%3A0xc95f8ab6c33477aa!2sPT.%20Evolusi%20Teknologi%20Solusi%20(EVOTEKS)!5e0!3m2!1sen!2sin!4v1738730384234!5m2!1sen!2sin"
                                                width="100%" height="150" frameborder="0" style="border:0;"
                                                allowfullscreen=""></iframe>
                                            <div class="card-body">
                                                <h6 class="card-title">PT EVOTEKS</h6>
                                                <p class="card-text">Jl. Basoka Raya No.8 Blok R, RT.5/RW.002, Joglo,
                                                    Kec. Kembangan, Kota adm, Daerah Khusus Ibukota Jakarta 11640,
                                                    Indonesia</p>
                                                <a href="https://maps.app.goo.gl/8wguEM6amE7zmmDT8"
                                                    class="text-link font-weight-bold"><i class="feather-external-link"></i>
                                                    Get Directions</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card overflow-hidden">
                                            <iframe
                                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.396597453054!2d106.71022587400688!3d-6.211309560838616!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f9b25c439fff%3A0x6d7446c4311ed4d6!2sE17%20Course!5e0!3m2!1sen!2sin!4v1738730312617!5m2!1sen!2sin"
                                                width="100%" height="150" frameborder="0" style="border:0;"
                                                allowfullscreen=""></iframe>
                                            <div class="card-body">
                                                <h6 class="card-title">E17 Course</h6>
                                                <p class="card-text">Jl. Raden Saleh No.1, Karang Tengah, Kec. Karang
                                                    Tengah, Kota Tangerang, Banten 15157, Indonesia
                                                </p>
                                                <a href="https://maps.app.goo.gl/kyuTLqxM8TJ1r9xk8"
                                                    class="text-link font-weight-bold"><i class="feather-external-link"></i>
                                                    Get Directions</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="type" role="tabpanel" aria-labelledby="type-tab">
                            <div class="w-100 p-3">
                                <div class="row">

                                    <div class="col-md-6">
                                        <a href="profile">
                                            <div class="network-item mb-3 rounded border">
                                                <div class="d-flex align-items-center network-item-header p-3">
                                                    <div class="dropdown-list-image mr-3">
                                                        <img class="rounded-circle" src="img/p4.png" alt="">
                                                    </div>
                                                    <div class="font-weight-bold">
                                                        <h6 class="font-weight-bold text-dark mb-0">Nama Pengguna</h6>
                                                        <div class="small text-black-50">Major/Jurusan</div>
                                                    </div>
                                                </div>
                                        </a>
                                        <div
                                            class="d-flex align-items-center border-top border-bottom network-item-body p-3">
                                            <div class="overlap-rounded-circle">
                                                <img class="rounded-circle shadow-sm" data-toggle="tooltip"
                                                    data-placement="top" title="" src="img/p1.png" alt=""
                                                    data-original-title="Sophia Lee">
                                                <img class="rounded-circle shadow-sm" data-toggle="tooltip"
                                                    data-placement="top" title="" src="img/p3.png" alt=""
                                                    data-original-title="Julia Cox">
                                                <img class="rounded-circle shadow-sm" data-toggle="tooltip"
                                                    data-placement="top" title="" src="img/p4.png" alt=""
                                                    data-original-title="Robert Cook">
                                            </div>
                                            <span class="font-weight-bold small text-primary">4 mutual
                                                connections</span>
                                        </div>
                                        <div class="network-item-footer d-flex py-3 text-center">
                                            <div class="col-6 pl-3 pr-1">
                                                <button type="button"
                                                    class="btn btn-primary btn-sm btn-block connect-btn"> Connect
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            </main>
            <aside class="col col-xl-3 order-xl-1 col-lg-6 order-lg-2 col-md-6 col-sm-6 col-12">
                <div class="box ads-box mb-3 overflow-hidden rounded bg-white text-center shadow-sm">
                    <img src="img/job1.png" class="img-fluid" alt="Responsive image">
                    <div class="border-bottom p-3">
                        <h6 class="font-weight-bold text-dark">EVOConnect Solutions</h6>
                        <p class="text-muted mb-0">Looking for talent?</p>
                    </div>
                    <div class="p-3">
                        <button type="button" class="btn btn-primary" id="postJobBtn" data-bs-toggle="modal"
                            data-bs-target="#postJobModal">
                            Post a Job
                        </button>
                    </div>
                </div>

                <!-- Modal for Posting a Job -->
                <div class="modal" id="postJobModal" tabindex="-1" aria-labelledby="postJobModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h2>Job Solutions</h2>
                                <button type="button" class="close p-2" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="jobForm">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Job Title</label>
                                        <input type="text" class="form-control" id="title" name="title"
                                            placeholder="Enter Job Title" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="position" class="form-label">Position</label>
                                        <input type="text" class="form-control" id="position" name="position"
                                            placeholder="Enter Position" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="location" class="form-label">Location</label>
                                        <input type="text" class="form-control" id="location" name="location"
                                            placeholder="Enter Location" list="location-list" required>
                                        <datalist id="location-list"></datalist>
                                    </div>
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Job Description</label>
                                        <textarea class="form-control" id="description" name="description" rows="4"
                                            placeholder="Enter Job Description" required></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="rating" class="form-label">Rating (1-5)</label>
                                        <input type="number" class="form-control" id="rating" name="rating"
                                            placeholder="Enter Rating" min="1" max="5" required>
                                    </div>
                                    <div class="mb-4">
                                        <label for="job_details" class="form-label fw-bold mb-3">Job Details</label>
                                        <div class="row gy-4">
                                            <div class="col-md-6">
                                                <div class="pe-md-3">
                                                    <label for="seniority_level" class="form-label">Seniority
                                                        Level</label>
                                                    <select class="form-control w-100" id="seniority_level"
                                                        name="seniority_level" required>
                                                        <option value="" disabled selected>Choose Seniority Level
                                                        </option>
                                                        <option value="Mid-Senior level">Mid-Senior level</option>
                                                        <option value="Entry level">Entry level</option>
                                                        <option value="Director">Director</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="ps-md-3">
                                                    <label for="industry" class="form-label">Industry</label>
                                                    <select class="form-control w-100" id="industry" name="industry"
                                                        required>
                                                        <option value="" disabled selected>Choose Industry
                                                        </option>
                                                        <option value="Internet Information Technology & Services">
                                                            Internet Information Technology & Services</option>
                                                        <option value="Finance">Finance</option>
                                                        <option value="Healthcare">Healthcare</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="pe-md-3">
                                                    <label for="employment_type" class="form-label">Employment
                                                        Type</label>
                                                    <select class="form-control w-100" id="employment_type"
                                                        name="employment_type" required>
                                                        <option value="" disabled selected>Choose Employment Type
                                                        </option>
                                                        <option value="Full-time">Full-time</option>
                                                        <option value="Part-time">Part-time</option>
                                                        <option value="Contract">Contract</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="ps-md-3">
                                                    <label for="job_functions" class="form-label">Job
                                                        Functions</label>
                                                    <select class="form-control w-100" id="job_functions"
                                                        name="job_functions" required>
                                                        <option value="" disabled selected>Choose Job Functions
                                                        </option>
                                                        <option value="Other">Other</option>
                                                        <option value="Engineering">Engineering</option>
                                                        <option value="Marketing">Marketing</option>
                                                        <option value="Design">Design</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="company_id" class="form-label">Company</label>
                                        <select class="form-control" id="company_id" name="company_id" required>
                                            <option value="" disabled selected>Choose Company</option>
                                            @foreach ($companies as $company)
                                                <option value="{{ $company->id }}">{{ $company->name }}</option>
                                            @endforeach
                                            <option value="new">+ Add Company</option>
                                        </select>
                                    </div>

                                    <!-- Form Tambah Perusahaan (Tersembunyi) -->
                                    <div class="d-none mb-3" id="newCompanyDiv">
                                        <label for="new_company_name" class="form-label">New Company Name</label>
                                        <input type="text" class="form-control" id="new_company_name"
                                            name="new_company_name" placeholder="Enter Company">
                                        <button type="button" id="saveNewCompany"
                                            class="btn btn-sm btn-success mt-2">Save Company</button>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Submit Job</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="job-item-2 mb-3 rounded bg-white p-3 shadow-sm">
                    <div class="media">
                        <div class="u-avatar mr-3">
                            <img class="img-fluid" src="img/l3.png" alt="Image Description">
                        </div>
                        <div class="media-body">
                            <div class="mb-3">
                                <h6 class="font-weight-bold mb-0"><a class="text-dark"
                                        href="{{ route('job-profile') }}">C# Developer</a></h6>
                                <a class="d-inline-block small pt-1" href="{{ route('job-profile') }}">
                                    <span class="text-warning">
                                        <span class="feather-star"></span>
                                        <span class="feather-star"></span>
                                        <span class="feather-star"></span>
                                        <span class="feather-star text-gray-500"></span>
                                        <span class="feather-star text-gray-500"></span>
                                    </span>
                                    <span class="text-dark font-weight-bold ml-2">3.74</span>
                                    <span class="text-muted">(567 reviews)</span>
                                </a>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="border-right mr-3 pr-3">
                                    <a class="text-secondary small" href="{{ route('job-profile') }}">Salaries</a>
                                </div>
                                <a class="small" href="{{ route('job-profile') }}">Open jobs</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="job-item-2 mb-3 rounded bg-white p-3 shadow-sm">
                    <div class="media">
                        <div class="u-avatar mr-3">
                            <img class="img-fluid" src="img/l2.png" alt="Image Description">
                        </div>
                        <div class="media-body">
                            <div class="mb-3">
                                <h6 class="font-weight-bold mb-0"><a class="text-dark"
                                        href="{{ route('job-profile') }}">Junior UX Designer</a></h6>
                                <a class="d-inline-block small pt-1" href="{{ route('job-profile') }}">
                                    <span class="text-warning">
                                        <span class="feather-star"></span>
                                        <span class="feather-star"></span>
                                        <span class="feather-star"></span>
                                        <span class="feather-star"></span>
                                        <span class="feather-star"></span>
                                    </span>
                                    <span class="text-dark font-weight-bold ml-2">3.74</span>
                                    <span class="text-muted">(567 reviews)</span>
                                </a>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="border-right mr-3 pr-3">
                                    <a class="text-secondary small" href="{{ route('job-profile') }}">Salaries</a>
                                </div>
                                <a class="small" href="{{ route('job-profile') }}">Open jobs</a>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>
            <aside class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-6 col-12">
                <div class="pb-3">
                    <h6 class="font-weight-bold text-dark mb-1">Because you viewed</h6>
                    <p class="text-muted mb-0">Designer at Google?</p>
                </div>
                <a href="{{ route('job-profile') }}">
                    <div class="job-item mb-3 rounded bg-white shadow-sm">
                        <div class="d-flex align-items-center job-item-header p-3">
                            <div class="mr-2 overflow-hidden">
                                <h6 class="font-weight-bold text-dark text-truncate mb-0">Product Director</h6>
                                <div class="text-truncate text-primary">Spotify Inc.</div>
                                <div class="small text-gray-500"><i class="feather-map-pin"></i> India, Punjab</div>
                            </div>
                            <img class="img-fluid ml-auto" src="img/l3.png" alt="">
                        </div>
                        <div class="d-flex align-items-center border-top border-bottom job-item-body p-3">
                            <div class="overlap-rounded-circle">
                                <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top"
                                    title="Sophia Lee" src="img/p9.png" alt="">
                                <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top"
                                    title="John Doe" src="img/p10.png" alt="">
                                <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top"
                                    title="Julia Cox" src="img/p11.png" alt="">
                                <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top"
                                    title="John Doe" src="img/p10.png" alt="">
                                <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top"
                                    title="Julia Cox" src="img/p11.png" alt="">
                                <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top"
                                    title="Robert Cook" src="img/p12.png" alt="">
                            </div>
                            <span class="font-weight-bold text-muted">18 connections</span>
                        </div>
                        <div class="job-item-footer p-3">
                            <small class="text-gray-500"><i class="feather-clock"></i> Posted 3 Days ago</small>
                        </div>
                    </div>
                </a>
                <a href="{{ route('job-profile') }}">
                    <div class="job-item mb-3 rounded bg-white shadow-sm">
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
                                <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top"
                                    title="Sophia Lee" src="img/p13.png" alt="">
                                <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top"
                                    title="John Doe" src="img/p1.png" alt="">
                                <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top"
                                    title="Julia Cox" src="img/p2.png" alt="">
                                <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top"
                                    title="Robert Cook" src="img/p3.png" alt="">
                            </div>
                            <span class="font-weight-bold text-muted">18 connections</span>
                        </div>
                        <div class="job-item-footer p-3">
                            <small class="text-gray-500"><i class="feather-clock"></i> Posted 3 Days ago</small>
                        </div>
                    </div>
                </a>
                <div class="box mb-3 rounded border bg-white shadow-sm">
                    <div class="box-title border-bottom p-3">
                        <h6 class="m-0">People you might know</h6>
                    </div>
                    <div class="box-body p-3">
                        <div class="d-flex align-items-center osahan-post-header people-list mb-3">
                            <div class="dropdown-list-image mr-3">
                                <img class="rounded-circle" src="img/p8.png" alt="">
                                <div
                                    class="status-indicator {{ auth()->user()->isOnline() ? 'bg-success' : 'bg-secondary' }}">
                                </div>
                            </div>
                            <div class="font-weight-bold mr-2">
                                <div class="text-truncate">Nama</div>
                                <div class="small text-gray-500">Student at Harvard
                                </div>
                            </div>
                            <span class="ml-auto"><button id="followBtn" type="button" class="btn btn-light btn-sm"><i
                                        id="followIcon" class="feather-user-plus"></i></button>
                            </span>
                        </div>
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
        // button
        function clearInput() {
            document.querySelector("#jobForm").reset(); // Reset semua input di form
        }
        // end
        $(document).ready(function() {
            $('.connect-btn').click(function() {
                var button = $(this);
                if (button.text().trim() === "Connect") {
                    button.text("Connected");
                    button.removeClass('btn-primary').addClass('btn-secondary');
                } else {
                    button.text("Connect");
                    button.removeClass('btn-secondary').addClass('btn-primary');
                }
            });

            $('.follow-btn').click(function() {
                var button = $(this);
                if (button.text().trim() === "Follow") {
                    button.text("Followed");
                    button.removeClass('btn-outline-primary').addClass('btn-success');
                } else {
                    button.text("Follow");
                    button.removeClass('btn-success').addClass('btn-outline-primary');
                }
            });
        });
    </script>

    <script>
        document.getElementById("followBtn").addEventListener("click", function() {
            var icon = document.getElementById("followIcon");

            if (icon.classList.contains("feather-user-plus")) {
                icon.classList.remove("feather-user-plus");
                icon.classList.add("feather-check");
            } else {
                icon.classList.remove("feather-primary");
                icon.classList.add("feather-user-plus");
            }
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let postJobBtn = document.getElementById("postJobBtn");
            let postJobModal = new bootstrap.Modal(document.getElementById("postJobModal"));

            if (postJobBtn) {
                postJobBtn.addEventListener("click", function() {
                    postJobModal.show();
                });
            } else {
                console.warn("Tombol postJobBtn tidak ditemukan.");
            }
        });
    </script>

    {{-- add location --}}
    <script>
        $(document).ready(function() {
            // Menampilkan form tambah perusahaan jika user memilih "Add Company"
            $("#company_id").change(function() {
                if ($(this).val() === "new") {
                    $("#newCompanyDiv").removeClass("d-none");
                } else {
                    $("#newCompanyDiv").addClass("d-none");
                }
            });

            // AJAX untuk menyimpan perusahaan baru
            $("#saveNewCompany").click(function() {
                let newCompanyName = $("#new_company_name").val().trim();

                if (newCompanyName === "") {
                    alert("Company name cannot be empty!");
                    return;
                }

                $.ajax({
                    url: "{{ route('companies.store') }}", // Sesuaikan dengan route Laravel kamu
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        name: newCompanyName
                    },
                    success: function(response) {
                        if (response.success) {
                            // Tambahkan perusahaan baru ke dropdown
                            let newOption =
                                `<option value="${response.company.id}" selected>${response.company.name}</option>`;
                            $("#company_id").prepend(newOption);

                            // Sembunyikan form tambah perusahaan
                            $("#newCompanyDiv").addClass("d-none");
                            $("#new_company_name").val("");
                        }
                    },
                    error: function() {
                        alert("Failed to add company, please try again!");
                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $("#jobForm").unbind().submit(function(e) {
                e.preventDefault(); // Mencegah submit ulang halaman

                var formData = $(this).serialize(); // Serialize form data

                $.ajax({
                    url: "{{ route('jobs.store') }}", // URL untuk mengirim data
                    type: "POST",
                    data: formData,
                    success: function(response) {
                        if (response.success) {
                            let jobHtml = `
                    <div class="col-md-6">
                        <a href="/jobs/${response.job.id}">
                            <div class="job-item mb-3 border" data-title="${response.job.position}"
                                            data-company="${response.company_name}"
                                            data-location="${response.job.location}">
                                <div class="d-flex align-items-center job-item-header p-3">
                                    <div class="mr-2 overflow-hidden">
                                        <h6 class="font-weight-bold text-dark text-truncate mb-0">
                                            ${response.job.position}
                                        </h6>
                                        <div class="text-truncate text-primary">
                                            ${response.company_name}
                                        </div>
                                        <div class="small text-gray-500"><i class="feather-map-pin"></i>
                                            ${response.job.location}
                                        </div>
                                    </div>
                                    <img class="img-fluid ml-auto" src="{{ asset('img/job1.png') }}" alt="">
                                </div>
                                <div class="d-flex align-items-center border-top border-bottom job-item-body p-3">
                                    <span class="rating" data-rating="${response.job.rating}"></span>
                                </div>
                                <div class="job-item-footer p-3">
                                    <small class="text-gray-500"><i class="feather-clock"></i>
                                        Posted ${response.time}
                                    </small>
                                </div>
                            </div>
                        </a>
                    </div>
                `;
                            // Tambahkan elemen baru ke dalam daftar pekerjaan
                            $("#jobList").prepend(jobHtml);

                            // Panggil ulang fungsi rating jika ada
                            if (typeof updateRatings === "function") {
                                updateRatings();
                            }

                            // Jika pakai plugin jQuery Star Rating, pastikan plugin ada
                            if ($.fn.starRating) {
                                $(".rating").each(function() {
                                    $(this).starRating();
                                });
                            }

                            // Reset form setelah submit
                            $("#jobForm")[0].reset();

                            // Sembunyikan modal setelah submit
                            $("#postJobModal").modal('hide');
                        }
                    },
                    error: function(response) {
                        alert("Terjadi kesalahan, coba lagi!");
                    }
                });
            });
        });
    </script>

    {{-- api untuk bagian location --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Ganti idProv dengan ID provinsi yang diinginkan
            const locationQuery = ''; // Contoh: 32 untuk Jawa Barat

            // Ambil elemen input
            const locationInput = document.getElementById('location');

            // Event listener untuk input
            locationInput.addEventListener('input', function() {
                const locationQuery = this.value;

                // URL API
                const apiUrl =
                    `https://nominatim.openstreetmap.org/search?format=json&q=${locationQuery}&countrycodes=ID`;

                // Ambil data dari API
                fetch(apiUrl)
                    .then(response => response.json())
                    .then(data => {
                        console.log(data)
                        const datalist = document.getElementById('location-list');
                        datalist.innerHTML = ''; // Kosongkan datalist terlebih dahulu

                        // Loop data dan buat option untuk setiap kota
                        data.forEach(item => {
                            const option = document.createElement('option');
                            option.value = item.display_name;
                            datalist.appendChild(option);
                        });
                    })
                    .catch(error => console.error('Error:', error));
            });
        });
    </script>

    <script>
        // Pilih semua card dengan class .job-item-2
        document.querySelectorAll('.job-item-2').forEach(card => {
            // Tambahkan event listener klik
            card.addEventListener('click', function() {
                // Cari elemen .reviews-count di dalam card yang diklik
                let reviewsCountSpan = this.querySelector('.reviews-count');

                // Jika elemen ditemukan
                if (reviewsCountSpan) {
                    // Ambil angka saat ini dan ubah ke integer
                    let currentCount = parseInt(reviewsCountSpan.innerText);

                    // Pastikan currentCount adalah angka
                    if (Number.isNaN(currentCount)) {
                        currentCount = 0;
                    }

                    // Tambahkan 1 ke angka saat ini
                    reviewsCountSpan.innerText = currentCount + 1;
                }
            });
        });
    </script>

    {{-- search --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.job-search-input').on('input', function() {
                const searchTerm = $(this).val().trim().toLowerCase();

                // Hide all job items initially
                $('.job-item').hide();

                // If search term is empty, show all items
                if (!searchTerm) {
                    $('.job-item').show();
                    return;
                }

                // Search through job items
                $('.job-item').each(function() {
                    const $job = $(this);

                    // Safely get data attributes with fallbacks to empty string
                    const title = ($job.data('title') || '').toLowerCase();
                    const company = ($job.data('company') || '').toLowerCase();
                    const location = ($job.data('location') || '').toLowerCase();

                    // Check if any field contains the search term
                    if (title.includes(searchTerm) ||
                        company.includes(searchTerm) ||
                        location.includes(searchTerm)) {
                        $job.show();
                    }
                });
            });
        });
    </script>
@endsection
