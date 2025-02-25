@extends('layouts.templates')
@push('css')
    <style>
        .profile-photo-container {
            position: relative;
            display: inline-block;
            width: 150px;
            height: 150px;
        }

        .job-photo {
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
    @php
        $jobDetails = json_decode($job->job_details, true);
    @endphp
    <div class="profile-cover text-center">
        <img class="img-fluid" src="{{ asset('img/job-profile.jpg') }}" alt="">
    </div>
    <div class="border-bottom bg-white shadow-sm">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex align-items-center py-3">
                        <div class="profile-left">
                            <h5 class="font-weight-bold text-dark mb-1 mt-0">{{ $job->position }}</h5>
                            <p class="text-muted mb-0"><a class="font-weight-bold mr-2"
                                    href="#">{{ $job->company->name }}</a> <i class="feather-map-pin"></i>
                                {{ $job->location }} -- {{ $job->created_at->diffForHumans() }}</p>
                        </div>
                        <div class="profile-right ml-auto">
                            <button type="button" class="btn btn-light save-job-btn mr-1"
                                data-job-id="{{ $job->id }}">
                                &nbsp; Save &nbsp;
                            </button>

                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#applyModal">
                                &nbsp; Apply &nbsp;
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="applyModal" tabindex="-1" aria-labelledby="applyModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="applyModalLabel">Apply for this Job</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Form untuk apply -->
                                            <form action="{{ route('job.apply', ['job' => $job->id]) }}" method="POST">

                                                @csrf
                                                <div class="form-group">
                                                    <label for="coverLetter">Cover Letter</label>
                                                    <textarea class="form-control" id="coverLetter" name="cover_letter" rows="4" required></textarea>
                                                </div>
                                                <button type="submit" class="btn btn-success">Submit Application</button>
                                            </form>
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
    <div class="py-4">
        <div class="container">
            <div class="row">
                <aside class="col col-xl-3 order-xl-1 col-lg-6 order-lg-1 col-md-6 col-sm-6 col-12">
                    <div class="box profile-box mb-1 rounded border bg-white text-center shadow-sm">
                        <div class="p-2 text-center">
                            <div>
                                <!-- Menampilkan Foto Job -->
                                <div class="profile-photo-container">
                                    <img src="{{ $job->job_photo ? asset('storage/' . $job->job_photo) : auth()->user()->getProfileImage() }}"
                                        class="img-fluid rounded-circle job-photo ml-auto" alt="Job Image">

                                </div>
                                <div class="p-3 text-center">
                                    <button type="button" class="btn btn-light btn-sm follow-btn text-nowrap"
                                        onclick="toggleFollow(this)">
                                        <i class="feather-plus"></i> Follow
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="border-top border-bottom p-3">
                            <h5 class="font-weight-bold text-dark mb-1 mt-0">
                                <a href="{{ route('company.profile', $job->company->id) }}"
                                    class="text-dark text-decoration-none">
                                    {{ $job->company->name }}
                                </a>
                            </h5>
                            <p class="text-muted mb-0">{{ $job->location }}</p>
                        </div>

                        <div class="p-3">
                            <div class="d-flex align-items-top mb-2">
                                <p class="text-muted mb-0">Posted</p>
                                <p class="font-weight-bold text-dark mb-0 ml-auto mt-0">
                                    {{ $job->created_at->diffForHumans() }}</p>
                            </div>
                            <div class="d-flex align-items-top">
                                <p class="text-muted mb-0">Applicant Rank</p>
                                <p class="font-weight-bold text-dark mb-0 ml-auto mt-0">25</p>
                            </div>
                        </div>
                    </div>

                    <div class="box mb-3 rounded border bg-white shadow-sm">
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
                    </div>
                </aside>
                <main class="col col-xl-6 order-xl-2 col-lg-12 order-lg-2 col-md-12 col-sm-12 col-12">
                    <div class="box mb-3 rounded border bg-white shadow-sm">
                        <div class="box-title border-bottom p-3">
                            <h6 class="m-0">Overview</h6>
                        </div>
                        <div class="box-body p-3">
                            <p>{{ $job->description }}</p>
                        </div>
                    </div>
                    <div class="box mb-3 rounded border bg-white shadow-sm">
                        <div class="box-title border-bottom p-3">
                            <h6 class="m-0">Job Details</h6>
                        </div>
                        <div class="box-body">
                            <table class="table-borderless mb-0 table">
                                <tbody>
                                    <tr class="border-bottom">
                                        <th class="p-3">Seniority Level</th>
                                        <td class="p-3">{{ $jobDetails['Seniority Level'] }}</td>
                                    </tr>
                                    <tr class="border-bottom">
                                        <th class="p-3">Industry</th>
                                        <td class="p-3">{{ $jobDetails['Industry'] }}</td>
                                    </tr>
                                    <tr class="border-bottom">
                                        <th class="p-3">Employment Type</th>
                                        <td class="p-3">{{ $jobDetails['Employment Type'] }}</td>
                                    </tr>
                                    <tr class="border-bottom">
                                        <th class="p-3">Job Functions</th>
                                        <td class="p-3">{{ $jobDetails['Job Functions'] }}</td>
                                    </tr>
                                    <tr class="border-bottom">
                                        <th class="p-3">Salary</th>
                                        <td class="p-3">Rp {{ number_format($job->salary, 0, ',', '.') }}</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="box osahan-post mb-3 rounded border bg-white shadow-sm">
                        <div class="d-flex align-items-center border-bottom osahan-post-header p-3">
                            <div class="dropdown-list-image mr-3">
                                <img class="rounded-circle"
                                    src="{{ $job->company->logo ? asset('storage/' . $job->company->logo) : asset('img/default-logo.png') }}"
                                    alt="">
                            </div>
                            <div class="font-weight-bold">
                                <div class="text-truncate">{{ $job->company->name }}</div>
                                <div class="small text-gray-500">{{ $job->company->industry }} | 24,044 followers</div>
                            </div>
                        </div>
                        <img src="img/post1.png" class="img-fluid" alt="Responsive image">
                        <div class="osahan-post-body p-3">
                            <h5 class="mb-3">About us</h5>
                            <p>Welcome! We’re so happy you found us. Since you’ve come this far, we’d love to take the
                                opportunity to introduce ourselves.</p>
                            <p class="mb-0">Our story starts in 2006 with three founders in a Sydney garage (no, we’re
                                not kidding). Born from a desire to earn a living doing what they loved, with the
                                flexibility to do it from anywhere, Envato set out to create an online community for buying
                                and selling creative digital assets. Nearly 13 years later, we’re profitable and still
                                totally bootstrapped. This allows us to stay super experimental and totally focused on the
                                best interests of our authors and customers around the world.
                            </p>
                        </div>
                        <div class="border-top overflow-hidden text-center">
                            <a class="font-weight-bold d-block p-3" href="#"> READ MORE </a>
                        </div>
                    </div>
                </main>
                <aside class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-6 col-12">
                    <button type="button" class="btn btn-lg btn-block btn-danger mb-3"> <i class="feather-bell"></i> Set
                        alert for jobs </button>
                    <div class="box mb-3 rounded border bg-white shadow-sm">
                        <div class="box-title border-bottom p-3">
                            <h6 class="m-0">Similar Jobs
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
                        </div>

                        <style>
                            .job-photo {
                                width: 150px;
                                /* Ukuran foto */
                                height: 150px;
                                /* Ukuran foto */
                                object-fit: cover;
                                /* Menjaga rasio gambar */
                                border-radius: 50%;
                                /* Membulatkan gambar */
                                border: 3px solid #ddd;
                                /* Tambahkan border agar lebih rapi */
                            }

                            .save-job-btn.saved {
                                background-color: #28a745;
                                color: white;
                            }
                        </style>

                        <!-- Bootstrap core JavaScript -->
                        <script src="vendor/jquery/jquery.min.js"></script>
                        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
                        <!-- slick Slider JS-->
                        <script type="text/javascript" src="vendor/slick/slick.min.js"></script>
                        <!-- Custom scripts for all pages-->
                        <script src="js/osahan.js"></script>

                        <script>
                            document.getElementById("jobPhoto").addEventListener("click", function() {
                                let imgSrc = this.src;
                                document.getElementById("modalJobPhoto").src = imgSrc;
                                document.getElementById("downloadPhoto").href = imgSrc;

                                // Panggil modal dengan cara yang sesuai dengan Bootstrap 5
                                var photoModal = new bootstrap.Modal(document.getElementById('photoModal'));
                                photoModal.show();
                            });

                            document.getElementById("fileAttachmentBtn").addEventListener("change", function() {
                                if (this.files && this.files[0]) {
                                    let form = this.closest('form');
                                    form.submit();
                                }
                            });
                        </script>


                        <script>
                            document.addEventListener("DOMContentLoaded", function() {
                                document.querySelectorAll(".connect-btn").forEach(function(button) {
                                    button.addEventListener("click", function() {
                                        if (this.innerText === "Connect") {
                                            this.innerText = "Connected";
                                            this.classList.remove("btn-light");
                                            this.classList.add("btn-primary");
                                        } else {
                                            this.innerText = "Connect";
                                            this.classList.remove("btn-primary");
                                            this.classList.add("btn-light");
                                        }
                                    });
                                });
                            });
                        </script>
                        <script>
                            function toggleFollow(button) {
                                if (button.classList.contains('followed')) {
                                    button.innerHTML = '<i class="feather-plus"></i> Follow';
                                    button.classList.remove('btn-primary', 'followed');
                                    button.classList.add('btn-light');
                                } else {
                                    button.innerHTML = '<i class="feather-check"></i> Followed';
                                    button.classList.add('btn-primary', 'followed');
                                    button.classList.remove('btn-light');
                                }
                            }
                        </script>
                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
                        <script>
                            document.addEventListener("DOMContentLoaded", function() {
                                document.querySelectorAll(".save-job-btn").forEach(button => {
                                    button.addEventListener("click", function() {
                                        let jobId = this.getAttribute("data-job-id");

                                        fetch("{{ route('jobs.save') }}", {
                                                method: "POST",
                                                headers: {
                                                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                                                    "Content-Type": "application/json",
                                                },
                                                body: JSON.stringify({
                                                    job_id: jobId
                                                }),
                                            })
                                            .then(response => response.json())
                                            .then(data => {
                                                alert(data.message);
                                                this.classList.toggle('saved');
                                                this.textContent = (data.status === 'saved') ? 'Saved' : 'Save';
                                            })
                                            .catch(error => console.error("Error:", error));
                                    });
                                });
                            });
                        </script>
                    @endsection
