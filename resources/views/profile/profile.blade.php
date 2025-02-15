{{-- halaman profile --}}
@extends('layouts.templates')

@section('content')
    <style>
        #photo {
            padding: 2px;
            max-width: 100%;
        }

        /* Common styles for both Education and Experience sections */
        .education-item,
        .experience-item {
            background-color: #ffffff;
            transition: all 0.3s ease;
        }

        .education-item:hover,
        .experience-item:hover {
            background-color: #f8f9fa;
        }

        .education-content {
            position: relative;
            padding: 20px;
        }


        .education-photo {
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #e8f0fe;
            border-radius: 12px;
        }


        .education-info {
            flex: 1;
        }

        .education-info h5 {
            font-size: 1.1rem;
            margin-bottom: 0.3rem;
        }

        .education-info h6 {
            font-size: 0.95rem;
            color: #0d6efd;
        }

        .education-description {
            padding-left: 73px;
        }

        .education-description p {
            font-size: 0.9rem;
            line-height: 1.5;
            color: #6c757d;
        }

        .education-actions {
            margin-left: 15px;
        }

        .education-actions .btn {
            padding: 0.375rem 0.75rem;
            font-size: 0.875rem;
            border-radius: 6px;
            transition: all 0.2s ease;
        }

        .education-actions .btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .education-divider {
            height: 1px;
            background: linear-gradient(to right, #e9ecef 0%, #dee2e6 50%, #e9ecef 100%);
            margin: 0;
        }

        .education-item:last-child .education-divider,
        .experience-item:last-child .education-divider {
            display: none;
        }

        /* Photo preview styles */
        #educationPhotoPreview,
        #experiencePhotoPreview {
            border: 2px solid #dee2e6;
            padding: 2px;
            transition: all 0.3s ease;
        }

        /* Animation for new items */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }


        .experience-item {
            animation: fadeIn 0.3s ease-out forwards;
        }

        /* Modal form styles */
        .modal .form-group {
            margin-bottom: 1rem;
        }

        .modal .form-control {
            border-radius: 6px;
        }

        .modal .form-control:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .education-content {
                padding: 15px;
            }

            .education-description {
                padding-left: 45px;
            }

            .education-photo {
                width: 40px;
                height: 40px;
            }

            .education-info h5 {
                font-size: 1rem;
            }

            .education-info h6 {
                font-size: 0.9rem;
            }
        }

        /* social media */
        .social-box {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .social-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 15px;
            border-radius: 10px;
            border: 1px solid #ddd;
            transition: all 0.3s ease;
            cursor: pointer;
            position: relative;
        }

        .social-item i {
            font-size: 40px;
            transition: transform 0.3s ease;
        }

        .social-item .username {
            position: absolute;
            bottom: -25px;
            opacity: 0;
            background: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 14px;
            transition: opacity 0.3s ease, bottom 0.3s ease;
            white-space: nowrap;
        }

        .social-item:hover i {
            transform: scale(1.2);
        }

        .social-item:hover .username {
            opacity: 1;
            bottom: -35px;
        }

        .facebook i {
            color: #1877f2;
        }

        .twitter i {
            color: #1da1f2;
        }

        .instagram i {
            color: #c13584;
        }

        youtube i {
            color: #ff0000;
        }

        github i {
            color: #333;
        }
    </style>
    <div class="py-4">
        <div class="container">
            <div class="row">
                <!-- Main Content -->
                <aside class="col col-xl-3 order-xl-1 col-lg-12 order-lg-1 col-12">
                    <div class="box profile-box mb-3 rounded border bg-white text-center shadow-sm">
                        <div class="border-bottom px-3 py-4">
                            <img src="{{ isset($user) ? $user->getProfileImage() : auth()->user()->getProfileImage() }}"
                                class="rounded-circle border shadow-sm"
                                style="width: 100px; height: 100px; object-fit: cover;" alt="Profile Image">
                            <h5 class="font-weight-bold text-dark mb-1 mt-4">
                                {{ isset($user) ? $user->name : auth()->user()->name }}</h5>
                            <p class="text-muted mb-0">{{ Auth::user()->headline ?? 'No information yet.' }}</p>
                        </div>
                        <div class="box profile-box mb-3 rounded border bg-white p-3 text-center">
                            <div class="d-flex">
                                <div class="w-100 text-left">
                                    <div class="d-flex align-items-center justify-content-between mb-2"
                                        style="font-size: 0.9rem;">
                                        <div class="d-flex align-items-center" style="gap: 10px;">
                                            <i class="fa-solid fa-users"
                                                style="font-size: 1rem; width: 20px; text-align: center;"></i>
                                            <p class="text-black-50 mb-0">Connections</p>
                                        </div>
                                        <h6 class="font-weight-bold text-dark mb-0">358</h6>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mb-2"
                                        style="font-size: 0.9rem;">
                                        <div class="d-flex align-items-center" style="gap: 10px;">
                                            <i class="fa-solid fa-eye"
                                                style="font-size: 1rem; width: 25px; text-align: center;"></i>
                                            <p class="text-black-50 mb-0">Views</p>
                                        </div>
                                        <h6 class="font-weight-bold text-dark mb-0">85</h6>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between"
                                        style="font-size: 0.9rem;">
                                        <a href="{{ route('jobs.saved') }}" class="d-flex align-items-center"
                                            style="gap: 10px;">
                                            <i class="fa-solid fa-bookmark"
                                                style="font-size: 1rem; width: 25px; text-align: center;color: black;"></i>
                                            <p class="text-black-50 mb-0">Job Saved</p>
                                        </a>
                                        <h6 class="font-weight-bold text-dark mb-0">120</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border-top overflow-hidden">
                            <a class="font-weight-bold d-block p-3" href="{{ route('login') }}"> Log Out </a>
                        </div>
                    </div>
                    <div class="box mb-3 rounded border bg-white shadow-sm">
                        <div class="box-title border-bottom p-3">
                            <h6 class="m-s0">Skills</h6>
                        </div>
                        <div class="box-body">
                            <div class="d-flex flex-wrap">
                                @foreach (auth()->user()->skills ?? [] as $skill)
                                    <div class="mb-2 mr-2 rounded border px-2 py-1">
                                        {{ $skill }}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <style>
                            .box-body .border {
                                border-color: #dee2e6;
                            }

                            .box-body .border.rounded {
                                border-radius: 0.25rem;
                            }

                            .box-body .d-flex>div {
                                flex: 0 0 auto;
                                width: fit-content;
                            }
                        </style>

                        <div class="d-flex flex-wrap gap-2 rounded bg-white p-2 shadow-sm">
                            @foreach (isset($user) ? $user->medsos ?? [] : auth()->user()->medsos ?? [] as $platform => $item)
                                @if ($platform == 'facebook')
                                    <div class="social-item twitter">
                                        <i class="fa-brands fa-twitter" style="font-size: 1rem;"></i>
                                        <span class="username">{{ $item['username'] }}</span>
                                    </div>
                                @endif
                                @if ($platform == 'instagram')
                                    <div class="social-item instagram">
                                        <i class="fa-brands fa-instagram" style="font-size: 1rem;"></i>
                                        <span class="username">{{ $item['username'] }}</span>
                                    </div>
                                @endif
                                @if ($platform == 'youtube')
                                    <div class="social-item youtube">
                                        <i class="fa-brands fa-youtube" style="font-size: 1rem;"></i>
                                        <span class="username">{{ $item['username'] }}</span>
                                    </div>
                                @endif
                                @if ($platform == 'github')
                                    <div class="social-item github">
                                        <i class="fa-brands fa-github" style="font-size: 1rem;"></i>
                                        <span class="username">{{ $item['username'] }}</span>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <!-- <div class="box ads-box mb-3 overflow-hidden rounded bg-white text-center shadow-sm">                                                                                                                                                                                                                             </div> -->
                </aside>
                <main class="col col-xl-6 order-xl-2 col-lg-12 order-lg-2 col-md-12 col-sm-12 col-12">
                    <div class="box mb-3 rounded border bg-white shadow-sm">
                        <div class="box-title border-bottom p-3">
                            <h6 class="m-0">About You</h6>
                        </div>
                        <div class="box-body p-3">
                            <p>{{ Auth::user()->about ?? 'No information provided yet.' }}</p>
                        </div>
                    </div>
                    <!-- experience -->
                    <div class="box mb-3 rounded border bg-white shadow-sm">
                        <div class="box-title border-bottom p-3">
                            <h6 class="m-0">Experience</h6>
                            <a href="#" data-toggle="modal" data-target="#addExperienceModal">
                                <span>+</span> Add Experience
                            </a>
                        </div>

                        <!-- Wadah untuk Experience List -->
                        <div class="box-body border-bottom p-3" id="experienceList">
                            @foreach (auth()->user()->experiences as $experience)
                                <div class="experience-item">
                                    <!-- Experience display template -->
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="addExperienceModal" tabindex="-1" role="dialog"
                        aria-labelledby="addExperienceModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addExperienceModalLabel">Add Experience</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="form-group">
                                            <label for="jobTitle">Job Title</label>
                                            <input type="text" class="form-control" id="jobTitle"
                                                placeholder="Enter your job title">
                                        </div>
                                        <div class="form-group">
                                            <label for="companyName">Company</label>
                                            <input type="text" class="form-control" id="companyName"
                                                placeholder="Enter your company">
                                        </div>
                                        <div class="form-group">
                                            <label for="startDate" class="form-label">Start date<span
                                                    class="text-danger">*</span></label>
                                            <div class="d-flex" style="width: 50px">
                                                <select class="form-select" id="startMonth">
                                                    <option selected disabled>Month</option>
                                                </select>
                                                <select class="form-select" id="startYear">
                                                    <option selected disabled>Year</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group mt-3">
                                            <label for="endDate" class="form-label">End date<span
                                                    class="text-danger">*</span></label>
                                            <div class="d-flex gap-2">
                                                <select class="form-select" id="endMonth" disabled>
                                                    <option selected>Month</option>
                                                </select>
                                                <select class="form-select" id="endYear" disabled>
                                                    <option selected>Year</option>
                                                </select>
                                            </div>
                                            <div class="text-danger mt-1" style="font-size: 0.875rem;">
                                                <i class="bi bi-exclamation-circle-fill"></i> Start and end dates are
                                                required
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="caption">Caption</label>
                                            <input type="text" class="form-control" id="caption"
                                                placeholder="Enter your caption">
                                        </div>
                                        <div class="form-group">
                                            <label for="photo">Photo</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="photo"
                                                    accept="image/*">
                                                <label class="custom-file-label" for="photo">Choose file...</label>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" id="saveExperience">Save
                                        Experience</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="box mb-3 rounded border bg-white shadow-sm">
                        <div class="box-title border-bottom p-3">
                            <h6 class="m-0">Education</h6>
                            <a href="#" data-toggle="modal" data-target="#addEducationModal">
                                <span>+</span> Add Education
                            </a>
                        </div>
                        <!-- Tempat untuk menampilkan daftar pendidikan -->
                        <div id="educationList" class="box-body border-bottom p-3">
                            @foreach (auth()->user()->educations as $education)
                                <div class="education-item">
                                    <!-- Education display template -->
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- Modal Add Education -->
                    <div class="modal fade" id="addEducationModal" tabindex="-1" role="dialog"
                        aria-labelledby="addEducationModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addEducationModalLabel">Add Education</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="educationForm">
                                        <div class="form-group">
                                            <label for="schoolName">School Name</label>
                                            <input type="text" class="form-control" id="schoolName" required
                                                placeholder="Enter your school name">
                                        </div>
                                        <div class="form-group">
                                            <label for="major">Major</label>
                                            <input type="text" class="form-control" id="major"
                                                placeholder="Enter your major">
                                        </div>
                                        <div class="form-group">
                                            <label for="educationPeriod">Period</label>
                                            <input type="text" class="form-control" id="educationPeriod"
                                                placeholder="Start date - end date">
                                        </div>
                                        <div class="form-group">
                                            <label for="captionEdu">Caption</label>
                                            <input type="text" class="form-control" id="captionEdu"
                                                placeholder="Enter captionEdu">
                                        </div>
                                        {{-- <div class="form-group">
                                            <label for="educationPhoto">Photo</label>
                                            <input type="file" class="form-control" id="educationPhoto"
                                                accept="image/*">
                                            <div class="mt-2">
                                                <img id="educationPhotoPreview" src="#" alt="Preview"
                                                    style="display: none; max-width: 100px; max-height: 100px; object-fit: cover; border-radius: 8px;">
                                            </div>
                                        </div> --}}
                                    </form>
                                </div>
                                <meta name="csrf-token" content="{{ csrf_token() }}">
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" id="saveEducation">Save
                                        Education</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <aside class="col col-xl-3 order-xl-3 col-lg-12 order-lg-3 col-12">
                    <div class="box mb-3 rounded border bg-white shadow-sm">
                        <div class="box-title border-bottom p-3">
                            <h6 class="m-0">Who viewed your profile</h6>
                        </div>
                        <div class="box-body p-3">
                            <div class="d-flex align-items-center osahan-post-header people-list mb-3">
                                <div class="dropdown-list-image mr-3">
                                    <img class="rounded-circle" src="img/p4.png" alt="">
                                    <div
                                        class="status-indicator {{ auth()->user()->isOnline() ? 'bg-success' : 'bg-secondary' }}">
                                    </div>
                                </div>
                                <div class="font-weight-bold mr-2">
                                    <div class="text-truncate">Sophia Lee</div>
                                    <div class="small text-gray-500">@Harvard
                                    </div>
                                </div>
                                <span class="ml-auto">
                                    <button type="button" class="btn btn-light btn-sm connect-btn">Connect</button>
                                </span>

                            </div>
                        </div>
                    </div>
                    <div class="box ads-box mb-3 overflow-hidden rounded bg-white text-center shadow-sm">
                        <img src="img/ads1.png" class="img-fluid" alt="Responsive image">
                        <div class="border-bottom p-3">
                            <h6 class="font-weight-bold text-gold">Osahanin Premium</h6>
                            <p class="text-muted mb-0">Grow &amp; nurture your network</p>
                        </div>
                        <div class="p-3">
                            <a href="{{ route('pricing') }}">
                                <button type="button" class="btn btn-outline-gold pl-4 pr-4"> ACTIVATE </button>
                            </a>
                        </div>
                    </div>
                    {{-- menyambungkan ke halaman job profile --}}
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
                                    <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top"
                                        title="" src="img/p9.png" alt="" data-original-title="Sophia Lee">
                                    <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top"
                                        title="" src="img/p10.png" alt="" data-original-title="John Doe">
                                    <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top"
                                        title="" src="img/p11.png" alt="" data-original-title="Julia Cox">
                                    <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top"
                                        title="" src="img/p10.png" alt="" data-original-title="John Doe">
                                    <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top"
                                        title="" src="img/p11.png" alt="" data-original-title="Julia Cox">
                                    <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top"
                                        title="" src="img/p12.png" alt=""
                                        data-original-title="Robert Cook">
                                </div>
                                <span class="font-weight-bold text-muted">18 connections</span>
                            </div>
                            <div class="job-item-footer p-3">
                                <small class="text-gray-500"><i class="feather-clock"></i> Posted 3 Days ago</small>
                            </div>
                        </div>
                    </a>
                    {{-- manyambungkan ke halaman job profile --}}
                    <a href="{{ route('job-profile') }}">
                        <div class="job-item mb-3 rounded border bg-white shadow-sm">
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
                                        title="" src="img/p13.png" alt=""
                                        data-original-title="Sophia Lee">
                                    <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top"
                                        title="" src="img/p1.png" alt="" data-original-title="John Doe">
                                    <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top"
                                        title="" src="img/p2.png" alt="" data-original-title="Julia Cox">
                                    <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top"
                                        title="" src="img/p3.png" alt=""
                                        data-original-title="Robert Cook">
                                </div>
                                <span class="font-weight-bold text-muted">18 connections</span>
                            </div>
                            <div class="job-item-footer p-3">
                                <small class="text-gray-500"><i class="feather-clock"></i> Posted 3 Days ago</small>
                            </div>
                        </div>
                    </a>
                </aside>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const startMonth = document.getElementById("startMonth");
            const startYear = document.getElementById("startYear");
            const endMonth = document.getElementById("endMonth");
            const endYear = document.getElementById("endYear");

            // Tambahkan opsi bulan
            const months = [
                "January", "February", "March", "April", "May", "June",
                "July", "August", "September", "October", "November", "December"
            ];

            months.forEach((month, index) => {
                const optionStart = document.createElement("option");
                optionStart.value = index + 1;
                optionStart.text = month;
                startMonth.add(optionStart);

                const optionEnd = document.createElement("option");
                optionEnd.value = index + 1;
                optionEnd.text = month;
                endMonth.add(optionEnd);
            });

            // Tambahkan opsi tahun (dari 1900 hingga tahun saat ini)
            const currentYear = new Date().getFullYear();
            for (let i = currentYear; i >= 1900; i--) {
                const optionStartYear = document.createElement("option");
                optionStartYear.value = i;
                optionStartYear.text = i;
                startYear.add(optionStartYear);

                const optionEndYear = document.createElement("option");
                optionEndYear.value = i;
                optionEndYear.text = i;
                endYear.add(optionEndYear);
            }

            // Aktifkan End date setelah memilih Start date
            startMonth.addEventListener("change", enableEndDate);
            startYear.addEventListener("change", enableEndDate);

            function enableEndDate() {
                if (startMonth.value && startYear.value) {
                    endMonth.disabled = false;
                    endYear.disabled = false;
                } else {
                    endMonth.disabled = true;
                    endYear.disabled = true;
                }
            }

            // Script JavaScript untuk Menambah Experience
            document.getElementById('saveExperience').addEventListener('click', function() {
                // Ambil Nilai dari Input
                var jobTitle = document.getElementById('jobTitle').value;
                var companyName = document.getElementById('companyName').value;
                var startMonthText = startMonth.options[startMonth.selectedIndex].text;
                var startYearText = startYear.value;
                var endMonthText = endMonth.options[endMonth.selectedIndex]?.text || '';
                var endYearText = endYear.value || '';
                var caption = document.getElementById('caption').value;
                var photoInput = document.getElementById('photo');
                var photoUrl = '';

                // Format Job Period
                var jobPeriod = `${startMonthText} ${startYearText}`;
                if (endMonthText && endYearText) {
                    jobPeriod += ` - ${endMonthText} ${endYearText}`;
                } else {
                    jobPeriod += ' - Present';
                }

                // Cek jika ada foto yang diunggah
                if (photoInput.files && photoInput.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        photoUrl = e.target.result;

                        // Buat Elemen Experience Baru dengan Foto
                        var newExperience = `
                    <!-- Garis Tipis Pemisah -->
                    <div class="experience-item border-bottom pb-2 mb-2" style="border-bottom: 1px solid #e0e0e0;">
                        <div class="d-flex align-items-top experience-item-header">
                            <div class="mr-2">
                                <h6 class="font-weight-bold text-dark mb-0">${jobTitle}</h6>
                                <div class="text-truncate text-primary">${companyName}</div>
                                <div class="small text-gray-500">${jobPeriod}</div>
                            </div>
                            <div class="ml-auto">
                                <img src="${photoUrl}" class="img-fluid" style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover;" alt="Experience Photo">
                            </div>
                        </div>
                        <p class="mb-0">${caption}</p>
                    </div>
                `;

                        // Tambahkan ke Daftar Experience
                        document.getElementById('experienceList').innerHTML += newExperience;

                        // Reset Form
                        resetForm();

                        // Tutup Modal menggunakan jQuery
                        $('#addExperienceModal').modal('hide');

                        // Optional: Remove modal backdrop if it persists
                        $('.modal-backdrop').remove();
                        $('body').removeClass('modal-open');
                    };
                    reader.readAsDataURL(photoInput.files[0]);
                } else {
                    alert('Please upload a photo!');
                }
            });

            // Function to reset the form
            function resetForm() {
                document.getElementById('jobTitle').value = '';
                document.getElementById('companyName').value = '';
                startMonth.selectedIndex = 0;
                startYear.selectedIndex = 0;
                endMonth.selectedIndex = 0;
                endYear.selectedIndex = 0;
                endMonth.disabled = true;
                endYear.disabled = true;
                document.getElementById('caption').value = '';
                document.getElementById('photo').value = '';
            }
        });
    </script>
    {{-- end button --}}
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- slick Slider JS-->
    <script type="text/javascript" src="vendor/slick/slick.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/osahan.js"></script>
@endsection
