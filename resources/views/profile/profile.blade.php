{{-- halaman profile --}}
@extends('layouts.templates')

@section('content')
    <style>
        /* Common styles for both Education and Experience sections */
        .box {
            background: #fff;
            border-radius: 0.5rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .profile-box img.rounded-circle {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border: 3px solid #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        /* Shared styles for Education and Experience sections */
        .education-item {
            background-color: #ffffff;
            transition: all 0.3s ease;
            margin-bottom: 1.5rem;
        }

        .education-item:hover {
            background-color: #f8f9fa;
        }

        .education-content {
            position: relative;
            padding: 1.25rem;
            display: flex;
            align-items: flex-start;
        }

        .education-photo {
            width: 60px;
            height: 60px;
            min-width: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #e8f0fe;
            border-radius: 12px;
            margin-right: 1rem;
            overflow: hidden;
        }

        .education-photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .education-info {
            flex: 1;
        }

        .education-info h5 {
            font-size: 1.1rem;
            margin-bottom: 0.3rem;
            color: #2d3748;
            font-weight: 600;
        }

        .education-info h6 {
            font-size: 0.95rem;
            color: #0d6efd;
            margin-bottom: 0.3rem;
        }

        .education-info p {
            font-size: 0.9rem;
            color: #6c757d;
            margin-bottom: 0;
        }

        .experience-item {
            background-color: #ffffff;
            transition: all 0.3s ease;
            margin-bottom: 1.5rem;
        }

        .experience-item:hover {
            background-color: #f8f9fa;
        }

        .experience-content {
            position: relative;
            padding: 1.25rem;
            display: flex;
            align-items: flex-start;
        }

        .experience-photo {
            width: 60px;
            height: 60px;
            min-width: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #e8f0fe;
            border-radius: 12px;
            margin-right: 1rem;
            overflow: hidden;
        }

        .experience-photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .experience-info {
            flex: 1;
        }

        .experience-info h5 {
            font-size: 1.1rem;
            margin-bottom: 0.3rem;
            color: #2d3748;
            font-weight: 600;
        }

        .experience-info h6 {
            font-size: 0.95rem;
            color: #0d6efd;
            margin-bottom: 0.3rem;
        }

        .experience-info p {
            font-size: 0.9rem;
            color: #6c757d;
            margin-bottom: 0;
        }

        .date-info {
            font-size: 0.85rem;
            color: #718096;
            margin-bottom: 0.5rem;
        }

        /* Box headers */
        .box-title {
            padding: 1rem;
            border-bottom: 1px solid #e9ecef;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .box-title h6 {
            margin: 0;
            font-weight: 600;
            color: #2d3748;
        }

        /* Add buttons */
        .add-button {
            padding: 0.375rem 0.75rem;
            font-size: 0.875rem;
            color: #0d6efd;
            background: transparent;
            border: 1px solid #0d6efd;
            border-radius: 0.375rem;
            transition: all 0.2s;
        }

        .add-button:hover {
            background: #0d6efd;
            color: #fff;
        }

        .modal-content {
            border-radius: 0.5rem;
        }

        .modal-header {
            background: #f8f9fa;
            border-radius: 0.5rem 0.5rem 0 0;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .form-control {
            border-radius: 0.375rem;
        }

        .form-control:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
        }

        /* Photo preview */
        .photo-preview {
            max-width: 200px;
            margin-top: 0.5rem;
            border-radius: 0.375rem;
            border: 2px solid #dee2e6;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {

            .education-photo,
            .experience-photo {
                width: 45px;
                height: 45px;
                min-width: 45px;
            }

            .education-content,
            .experience-content {
                padding: 1rem;
            }

            .education-info h5,
            .experience-info h5 {
                font-size: 1rem;
            }
        }

        /* Skills section */
        .skills-container {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            padding: 1rem;
        }

        .skill-tag {
            background: #e9ecef;
            padding: 0.25rem 0.75rem;
            border-radius: 1rem;
            font-size: 0.875rem;
            color: #495057;
        }

        /* Social media section */
        .social-links {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            padding: 1rem;
        }

        .social-link {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #495057;
            text-decoration: none;
            transition: color 0.2s;
        }

        .social-link:hover {
            color: #0d6efd;
        }

        /* Stats cards */
        .stats-card {
            padding: 1rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid #e9ecef;
        }

        .stats-card:last-child {
            border-bottom: none;
        }

        .stats-icon {
            width: 2rem;
            height: 2rem;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #e8f0fe;
            border-radius: 0.5rem;
            color: #0d6efd;
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
                            <form action="{{ route('logout') }}" method="POST" class="m-0">
                                @csrf
                                <button
                                    class="font-weight-bold d-block text-primary w-100 border-0 bg-transparent p-3 text-center"
                                    type="submit">
                                    Log Out
                                </button>
                            </form>
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



                        {{-- <div class="box ads-box mb-3 overflow-hidden rounded bg-white text-center shadow-sm">
                            <p>slkdajf</p>
                        </div>
                        <p>slkdajf</p> --}}
                    </div>
                    <div class="box mb-3 rounded border bg-white shadow-sm">
                        <div class="box-title border-bottom p-3">
                            <h6 class="m-s0">Social Media</h6>
                        </div>
                        <div class="box-body">
                            <div class="d-flex flex-wrap">
                                @php
                                    $medsos = isset($user)
                                        ? json_decode(json_encode($user->medsos), true) ?? []
                                        : json_decode(json_encode(auth()->user()->medsos), true) ?? [];

                                    $links = [
                                        'facebook' => 'https://www.facebook.com/',
                                        'instagram' => 'https://www.instagram.com/',
                                        'youtube' => 'https://www.youtube.com/@',
                                        'github' => 'https://github.com/',
                                        'twitter' => 'https://twitter.com/',
                                    ];

                                    $icons = [
                                        'facebook' => 'fa-facebook-f',
                                        'instagram' => 'fa-instagram',
                                        'youtube' => 'fa-youtube',
                                        'github' => 'fa-github',
                                        'twitter' => 'fa-x-twitter', // Jika masih pakai Twitter, bisa pakai 'fa-twitter'
                                    ];
                                @endphp

                                <div class="d-flex flex-wrap gap-2 rounded bg-white p-2 shadow-sm">
                                    @foreach ($medsos as $platform => $items)
                                        @if (isset($links[$platform]) && is_array($items) && count($items) > 0)
                                            @php
                                                $firstItem = $items[0];
                                            @endphp
                                            <a href="{{ $links[$platform] . ($firstItem['username'] ?? '') }}"
                                                target="_blank"
                                                class="social-item {{ $platform }} text-decoration-none position-relative d-flex flex-column align-items-center p-2">
                                                <i class="fa-brands {{ $icons[$platform] ?? 'fa-globe' }} social-icon"
                                                    style="font-size: 2rem;"></i>
                                                <span
                                                    class="username text-muted small d-none mt-1">{{ $firstItem['username'] ?? 'Unknown' }}</span>
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <style>
                        .social-item {
                            transition: transform 0.2s ease-in-out;
                        }

                        .social-item:hover {
                            transform: scale(1.1);
                        }

                        .social-item .social-icon {
                            color: #333;
                        }

                        .social-item:hover .social-icon {
                            color: #007bff;
                        }

                        .social-item:hover .username {
                            display: block !important;
                        }
                    </style>
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
                    <div class="box mb-3 rounded border bg-white shadow-sm">
                        <div class="box-title border-bottom d-flex justify-content-between align-items-center p-3">
                            <h6 class="m-0">Experience</h6>
                            @isset($user)
                            @else
                                <a href="#" class="btn btn-sm btn-primary" data-toggle="modal"
                                    data-target="#addExperienceModal">
                                    <i class="fas fa-plus"></i> Add Experience
                                </a>
                            @endisset
                        </div>

                        <!-- Experience List -->
                        <div id="experienceList" class="box-body p-3">
                            @foreach (isset($user) ? $user->experiences : auth()->user()->experiences as $experience)
                                <div class="experience-item mb-3">
                                    <div class="experience-content d-flex">
                                        <div class="experience-photo mr-3">
                                            @if ($experience->photo)
                                                <img src="{{ $experience->photo_url }}" alt="Company Logo" class="rounded"
                                                    style="width: 60px; height: 60px; object-fit: cover;">
                                            @else
                                                <div class="bg-light d-flex align-items-center justify-content-center rounded"
                                                    style="width: 60px; height: 60px;">
                                                    <i class="fas fa-building text-secondary"></i>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="experience-info">
                                            <h5 class="font-weight-bold mb-1">{{ $experience->job_title }}</h5>
                                            <h6 class="text-primary mb-1">{{ $experience->company_name }}</h6>
                                            <p class="text-muted mb-1">
                                                {{ date('F', mktime(0, 0, 0, $experience->start_month, 1)) }}
                                                {{ $experience->start_year }} -
                                                @if ($experience->end_month && $experience->end_year)
                                                    {{ date('F', mktime(0, 0, 0, $experience->end_month, 1)) }}
                                                    {{ $experience->end_year }}
                                                @else
                                                    Present
                                                @endif
                                            </p>
                                            @if ($experience->caption)
                                                <p class="mb-0">{{ $experience->caption }}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <hr class="my-3">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- Experience Modal -->
                    <div class="modal fade" id="addExperienceModal" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add Experience</h5>
                                    <button type="button" class="close" data-dismiss="modal">
                                        <span>&times;</span>
                                    </button>
                                </div>
                                <form id="experienceForm" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>Job Title <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="jobTitle" name="job_title"
                                                required>
                                        </div>

                                        <div class="form-group">
                                            <label>Company Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="companyName"
                                                name="company_name" required>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Start Date <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <select class="form-control" id="startMonth" name="start_month"
                                                        required>
                                                        <option value="" disabled selected>Month</option>
                                                        @for ($i = 1; $i <= 12; $i++)
                                                            <option value="{{ $i }}">
                                                                {{ date('F', mktime(0, 0, 0, $i, 10)) }}</option>
                                                        @endfor
                                                    </select>
                                                    <select class="form-control" id="startYear" name="start_year"
                                                        required>
                                                        <option value="" disabled selected>Year</option>
                                                        @for ($i = date('Y'); $i >= 1950; $i--)
                                                            <option value="{{ $i }}">{{ $i }}
                                                            </option>
                                                        @endfor
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>End Date</label>
                                                <div class="input-group">
                                                    <select class="form-control" id="endMonth" name="end_month">
                                                        <option value="" disabled selected>Month</option>
                                                        @for ($i = 1; $i <= 12; $i++)
                                                            <option value="{{ $i }}">
                                                                {{ date('F', mktime(0, 0, 0, $i, 10)) }}</option>
                                                        @endfor
                                                    </select>
                                                    <select class="form-control" id="endYear" name="end_year">
                                                        <option value="" disabled selected>Year</option>
                                                        @for ($i = date('Y'); $i >= 1950; $i--)
                                                            <option value="{{ $i }}">{{ $i }}
                                                            </option>
                                                        @endfor
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control" id="caption" name="caption" rows="3"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Company Logo</label>
                                            <input type="file" class="form-control-file" id="photo"
                                                name="photo" accept="image/*">
                                            <img id="photoPreview" src="#" alt="Preview"
                                                style="display: none; max-width: 200px; margin-top: 10px;">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" id="saveExperience">Save
                                            Experience</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="box mb-3 rounded border bg-white shadow-sm">
                        <div class="box-title border-bottom d-flex justify-content-between align-items-center p-3">
                            <h6 class="m-0">Education</h6>
                            @if (!isset($user))
                                <a href="#" class="btn btn-sm btn-primary" data-toggle="modal"
                                    data-target="#addEducationModal">
                                    <i class="fas fa-plus"></i> Add Education
                                </a>
                            @endif
                        </div>
                    </div>
                    <!-- Education List -->
                    <div id="educationList" class="box-body p-3">
                        @foreach (isset($user) ? $user->educations : auth()->user()->educations as $education)
                            <div class="education-item mb-3">
                                <div class="education-content d-flex">
                                    <div class="education-photo mr-3">
                                        @if ($education->photo)
                                            <img src="{{ $education->photo_url }}" alt="School" class="rounded"
                                                style="width: 60px; height: 60px; object-fit: cover;">
                                        @else
                                            <div class="bg-light d-flex align-items-center justify-content-center rounded"
                                                style="width: 60px; height: 60px;">
                                                <i class="fas fa-university text-secondary"></i>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="education-info">
                                        <h5 class="font-weight-bold mb-1">{{ $education->school_name }}</h5>
                                        <h6 class="text-primary mb-1">{{ $education->major }}</h6>
                                        <p class="text-muted mb-1">
                                            {{ $education->start_month }}/{{ $education->start_year }} -
                                            @if ($education->end_month && $education->end_year)
                                                {{ $education->end_month }}/{{ $education->end_year }}
                                            @else
                                                Present
                                            @endif
                                        </p>
                                        @if ($education->caption)
                                            <p class="mb-0">{{ $education->caption }}</p>
                                        @endif
                                    </div>
                                </div>
                                <hr class="my-3">
                            </div>
                        @endforeach
                    </div>
                    <div class="container mt-4">

                        <h5 id="loading-text" class="text-muted text-center">Loading posts...</h5>
                        <div id="post-container" class="row justify-content-center"></div>
                        <div class="mt-4 text-center">
                            <button id="load-more" class="btn btn-primary d-none">Load More</button>
                        </div>
                    </div>
                    {{-- ini js buat ngeliat postingan --}}
                    <style>
                        .post-wrapper {
                            background: #fff;
                            padding: 20px;
                            border-radius: 10px;
                            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
                            text-align: center;
                            max-width: 600px;
                            margin: auto;
                            position: relative;
                            overflow: hidden;
                        }

                        .post-card-container {
                            display: flex;
                            transition: transform 0.5s ease-in-out;
                        }

                        .post-card {
                            flex: 0 0 100%;
                            background: #f8f9fa;
                            padding: 20px;
                            border-radius: 8px;
                            margin: 0;
                            box-sizing: border-box;
                            max-width: 100%;
                        }

                        .post-image {
                            width: 100%;
                            max-height: 250px;
                            object-fit: cover;
                            border-radius: 8px;
                        }

                        .view-post-btn {
                            display: block;
                            width: auto;
                            margin-top: 15px;
                        }

                        .slider-button {
                            position: absolute;
                            top: 50%;
                            transform: translateY(-50%);
                            background: rgba(0, 0, 0, 0.5);
                            color: white;
                            border: none;
                            padding: 10px;
                            border-radius: 50%;
                            cursor: pointer;
                            z-index: 10;
                        }

                        .slider-button.left {
                            left: 10px;
                        }

                        .slider-button.right {
                            right: 10px;
                        }
                    </style>

                    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            const postContainer = document.getElementById("post-container");
                            const loadingText = document.getElementById("loading-text");
                            const loadMoreBtn = document.getElementById("load-more");
                            let currentPage = 1;
                            let posts = [];
                            let currentIndex = 0;

                            function fetchPosts(page) {
                                axios
                                    .get(`/api/posts/my-posts?page=${page}`)
                                    .then((response) => {
                                        posts = response.data.data.data;
                                        loadingText.style.display = "none";

                                        if (!posts.length && page === 1) {
                                            postContainer.innerHTML =
                                                "<p class='text-muted text-center'>No posts available.</p>";
                                            return;
                                        }

                                        renderPosts();

                                        if (response.data.data.next_page_url) {
                                            loadMoreBtn.classList.remove("d-none");
                                        } else {
                                            loadMoreBtn.classList.add("d-none");
                                        }
                                    })
                                    .catch((error) => {
                                        console.error("Error fetching posts:", error);
                                        loadingText.innerText = "Failed to load posts!";
                                    });
                            }

                            function renderPosts() {
                                const sliderContent = posts
                                    .map((post) => {
                                        const image = post.image ?
                                            `<img class='post-image' src='${post.image}' alt='Post Image'>` :
                                            "";
                                        const formattedDate = new Date(post.created_at).toLocaleDateString("en-GB", {
                                            day: "numeric",
                                            month: "short",
                                            year: "numeric",
                                        });

                                        return `
                                                                <div class="post-card">
                                                                    <h6 class="font-weight-bold mt-2">${post.content}</h6>
                                                                    <p class="text-primary mb-1">${post.user.name}</p>
                                                                    <small class="text-muted"><i class="feather-clock"></i> Posted on ${formattedDate}</small>
                                                                    ${image}
                                                                    <a href="/posts/${post.id}" class="btn btn-primary view-post-btn">View Full Post</a>
                                                                </div>
                                                            `;
                                    })
                                    .join("");

                                postContainer.innerHTML = `
                                                        <div class="post-wrapper">
                                                            <button class="slider-button left" onclick="prevPost()">&#10094;</button>
                                                            <div class="post-card-container" style="transform: translateX(-${currentIndex * 100}%);">
                                                                ${sliderContent}
                                                            </div>
                                                            <button class="slider-button right" onclick="nextPost()">&#10095;</button>
                                                        </div>
                                                    `;
                            }

                            window.nextPost = function() {
                                if (currentIndex < posts.length - 1) {
                                    currentIndex++;
                                    document.querySelector(
                                        ".post-card-container"
                                    ).style.transform = `translateX(-${currentIndex * 100}%)`;
                                }
                            };

                            window.prevPost = function() {
                                if (currentIndex > 0) {
                                    currentIndex--;
                                    document.querySelector(
                                        ".post-card-container"
                                    ).style.transform = `translateX(-${currentIndex * 100}%)`;
                                }
                            };

                            loadMoreBtn.addEventListener("click", function() {
                                currentPage++;
                                fetchPosts(currentPage);
                            });

                            fetchPosts(currentPage);
                        });
                    </script>
            </div>
            {{-- <div class="row d-flex flex-row-reverse">
                <aside class="col col-xl-3 order-xl-3 col-lg-12 order-lg-3 col-12 d-flex">
                    <div class="box mb-3 rounded border bg-white shadow-sm" style="width: 100%;">
                        <div class="box-title border-bottom">
                            <h6 class="m-0">Who viewed your profile</h6>
                        </div>
                        <div class="box-body p-3">
                            <div class="d-flex align-items-center osahan-post-header people-list mb-3">
                                <div class="dropdown-list-image mr-3">
                                    <img class="rounded-circle" src="img/p4.png" alt="">
                                    <div class="status-indicator bg-success"></div>
                                </div>
                                <div class="font-weight-bold mr-2">
                                    <div class="text-truncate">Sophia Lee</div>
                                    <div class="small text-gray-500">@Harvard
                                    </div>
                                </div>
                                <span class="ml-auto"><button type="button"
                                        class="btn btn-light btn-sm">Connent</button>
                                </span>
                            </div>
                        </div>
                        <div class="box ads-box mb-3 overflow-hidden rounded bg-white text-center shadow-sm">
                            <img src="img/ads1.png" class="img-fluid" alt="Responsive image">
                            <div class="border-bottom p-3">
                                <h6 class="font-weight-bold text-gold">Osahanin Premium</h6>
                                <p class="text-muted mb-0">Grow &amp; nurture your network</p>
                            </div>
                            <div class="p-3">
                                <button type="button" class="btn btn-outline-gold pl-4 pr-4"> ACTIVATE </button>
                            </div>
                        </div>
                    </div>
                </aside>
            </div> --}}

            <!-- Education Modal -->
            <div class="modal fade" id="addEducationModal" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Education</h5>
                            <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                            </button>
                        </div>
                        <form id="educationForm" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>School Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="schoolName" name="school_name"
                                        required>
                                </div>

                                <div class="form-group">
                                    <label>Major <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="major" name="major" required>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Start Date <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <select class="form-control" id="eduStartMonth" name="start_month" required>
                                                <option value="" disabled selected>Month</option>
                                                @for ($i = 1; $i <= 12; $i++)
                                                    <option value="{{ $i }}">
                                                        {{ date('F', mktime(0, 0, 0, $i, 10)) }}</option>
                                                @endfor
                                            </select>
                                            <select class="form-control" id="eduStartYear" name="start_year" required>
                                                <option value="" disabled selected>Year</option>
                                                @for ($i = date('Y'); $i >= 1950; $i--)
                                                    <option value="{{ $i }}">{{ $i }}
                                                    </option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>End Date</label>
                                        <div class="input-group">
                                            <select class="form-control" id="eduEndMonth" name="end_month">
                                                <option value="" disabled selected>Month</option>
                                                @for ($i = 1; $i <= 12; $i++)
                                                    <option value="{{ $i }}">
                                                        {{ date('F', mktime(0, 0, 0, $i, 10)) }}</option>
                                                @endfor
                                            </select>
                                            <select class="form-control" id="eduEndYear" name="end_year">
                                                <option value="" disabled selected>Year</option>
                                                @for ($i = date('Y'); $i >= 1950; $i--)
                                                    <option value="{{ $i }}">{{ $i }}
                                                    </option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Caption/Description</label>
                                    <textarea class="form-control" id="eduCaption" name="caption" rows="3"></textarea>
                                </div>

                                <div class="form-group">
                                    <label>School Photo</label>
                                    <input type="file" class="form-control-file" id="educationPhoto" name="photo"
                                        accept="image/*">
                                    <img id="educationPhotoPreview" src="#" alt="Preview"
                                        style="display: none; max-width: 200px; margin-top: 10px;">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" id="saveEducation">Save
                                    Education</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            </main>


        </div>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                // Initialize form elements
                const startMonth = document.getElementById("startMonth");
                const startYear = document.getElementById("startYear");
                const endMonth = document.getElementById("endMonth");
                const endYear = document.getElementById("endYear");
                const photoInput = document.getElementById('photo');
                const photoPreview = document.getElementById('photoPreview');
                const experienceList = document.getElementById('experienceList');
                const experienceForm = document.getElementById('experienceForm');

                // Initialize months
                const months = [
                    "January", "February", "March", "April", "May", "June",
                    "July", "August", "September", "October", "November", "December"
                ];

                // Add month options
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

                // Add year options
                const currentYear = new Date().getFullYear();
                for (let year = currentYear; year >= 1950; year--) {
                    const optionStartYear = document.createElement("option");
                    optionStartYear.value = year;
                    optionStartYear.text = year;
                    startYear.add(optionStartYear);

                    const optionEndYear = document.createElement("option");
                    optionEndYear.value = year;
                    optionEndYear.text = year;
                    endYear.add(optionEndYear);
                }

                // Enable/disable end date based on start date selection
                function enableEndDate() {
                    if (startMonth.value && startYear.value) {
                        endMonth.disabled = false;
                        endYear.disabled = false;
                    } else {
                        endMonth.disabled = true;
                        endYear.disabled = true;
                    }
                }

                startMonth.addEventListener("change", enableEndDate);
                startYear.addEventListener("change", enableEndDate);

                // Handle photo preview
                photoInput.addEventListener('change', function(e) {
                    const file = e.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function(event) {
                            photoPreview.src = event.target.result;
                            photoPreview.style.display = 'block';
                        };
                        reader.readAsDataURL(file);
                    } else {
                        photoPreview.style.display = 'none';
                        photoPreview.src = '#';
                    }
                });

                // Handle form submission with API integration
                experienceForm.addEventListener('submit', async function(e) {
                    e.preventDefault();

                    try {
                        const formData = new FormData(this);

                        // Send data to API
                        const response = await fetch('/api/users/experience', {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                    .content,
                            },
                            body: formData
                        });

                        const result = await response.json();

                        if (result.success) {
                            // Create experience HTML with returned data
                            const experience = result.data;
                            const newExperience = `
                    <div class="experience-item mb-3">
                        <div class="experience-content d-flex">
                            <div class="experience-photo mr-3">
                                ${experience.photo_url ?
                                    `<img src="${experience.photo_url}" alt="Company Logo" class="rounded" style="width: 60px; height: 60px; object-fit: cover;">` :
                                    `<div class="bg-light d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                                                                                                                                                                                                                                                                                                                                                                                                                                                        <i class="fas fa-building text-secondary"></i>
                                                                                                                                                                                                                                                                                                                                                                                                                                                    </div>`
                                }
                            </div>
                            <div class="experience-info">
                                <h5 class="font-weight-bold mb-1">${experience.job_title}</h5>
                                <h6 class="text-primary mb-1">${experience.company_name}</h6>
                                <p class="text-muted mb-1">
                                    ${months[experience.start_month - 1]} ${experience.start_year} -
                                    ${experience.end_month && experience.end_year ?
                                        `${months[experience.end_month - 1]} ${experience.end_year}` :
                                        'Present'
                                    }
                                </p>
                                ${experience.caption ? `<p class="mb-0">${experience.caption}</p>` : ''}
                            </div>
                        </div>
                        <hr class="my-3">
                    </div>
                `;

                            // Add new experience to the list
                            experienceList.insertAdjacentHTML('afterbegin', newExperience);

                            // Show success message
                            Swal.fire({
                                icon: 'success',
                                title: 'Success!',
                                text: 'Experience has been added successfully.',
                                timer: 1500,
                                showConfirmButton: false
                            });

                            // Reset form
                            experienceForm.reset();
                            photoPreview.style.display = 'none';
                            photoPreview.src = '#';
                            endMonth.disabled = true;
                            endYear.disabled = true;

                            // Close modal
                            $('#addExperienceModal').modal('hide');
                            $('.modal-backdrop').remove();
                            $('body').removeClass('modal-open');

                        } else {
                            throw new Error(result.message || 'Failed to save experience');
                        }

                    } catch (error) {
                        console.error('Error:', error);

                        // Show error message
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'Failed to save experience. Please try again.',
                        });
                    }
                });
            });
        </script>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const educationList = document.getElementById("educationList");
                const eduStartMonth = document.getElementById("eduStartMonth");
                const eduStartYear = document.getElementById("eduStartYear");
                const eduEndMonth = document.getElementById("eduEndMonth");
                const eduEndYear = document.getElementById("eduEndYear");
                const educationPhoto = document.getElementById("educationPhoto");
                const photoPreview = document.getElementById("educationPhotoPreview");
                const caption = document.getElementById("eduCaption");

                // Inisialisasi bulan
                const months = [
                    "January", "February", "March", "April", "May", "June",
                    "July", "August", "September", "October", "November", "December"
                ];

                function populateMonths() {
                    eduStartMonth.innerHTML = '<option selected disabled>Month</option>';
                    eduEndMonth.innerHTML = '<option selected disabled>Month</option>';

                    months.forEach((month, index) => {
                        const optionStart = new Option(month, index + 1);
                        const optionEnd = new Option(month, index + 1);
                        eduStartMonth.add(optionStart);
                        eduEndMonth.add(optionEnd);
                    });
                }

                function populateYears() {
                    eduStartYear.innerHTML = '<option selected disabled>Year</option>';
                    eduEndYear.innerHTML = '<option selected disabled>Year</option>';

                    const currentYear = new Date().getFullYear();
                    for (let year = currentYear; year >= 1950; year--) {
                        const optionStart = new Option(year, year);
                        const optionEnd = new Option(year, year);
                        eduStartYear.add(optionStart);
                        eduEndYear.add(optionEnd);
                    }
                }

                function handleDateFields() {
                    const startDateSelected = eduStartMonth.value && eduStartYear.value;
                    eduEndMonth.disabled = !startDateSelected;
                    eduEndYear.disabled = !startDateSelected;

                    if (startDateSelected) {
                        const startYear = parseInt(eduStartYear.value);
                        const startMonth = parseInt(eduStartMonth.value);

                        if (eduEndYear.value && eduEndMonth.value) {
                            const endYear = parseInt(eduEndYear.value);
                            const endMonth = parseInt(eduEndMonth.value);

                            if (endYear < startYear || (endYear === startYear && endMonth < startMonth)) {
                                eduEndMonth.selectedIndex = 0;
                                eduEndYear.selectedIndex = 0;
                            }
                        }
                    }
                }

                function handlePhotoPreview(e) {
                    const file = e.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function(event) {
                            photoPreview.src = event.target.result;
                            photoPreview.style.display = "block";
                            photoPreview.style.maxWidth = "200px";
                            photoPreview.style.marginTop = "10px";
                        };
                        reader.readAsDataURL(file);
                    } else {
                        photoPreview.style.display = "none";
                        photoPreview.src = "";
                    }
                }

                function addEducationToDOM(data) {
                    const educationItem = document.createElement("div");
                    educationItem.classList.add("education-item", "mb-3");
                    educationItem.innerHTML = `
                <div class="education-content d-flex">
                    <div class="education-photo mr-3">
                        ${data.photo ? `<img src="${data.photo}" alt="School" class="rounded" style="width: 60px; height: 60px; object-fit: cover;">` :
                        `<div class="bg-light d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <i class="fas fa-university text-secondary"></i>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                </div>`}
                    </div>
                    <div class="education-info">
                        <h5 class="font-weight-bold mb-1">${data.schoolName}</h5>
                        <h6 class="text-primary mb-1">${data.major}</h6>
                        <p class="text-muted mb-1">
                            ${months[data.startMonth - 1]} ${data.startYear} -
                            ${data.endMonth && data.endYear ? `${months[data.endMonth - 1]} ${data.endYear}` : 'Present'}
                        </p>
                        ${data.caption ? `<p class="mb-0">${data.caption}</p>` : ''}
                    </div>
                </div>
                <hr class="my-3">
            `;

                    educationList.appendChild(educationItem);
                }

                document.getElementById("educationForm").addEventListener("submit", async function(e) {
                    e.preventDefault();

                    const formData = new FormData();
                    formData.append("schoolName", document.getElementById("schoolName").value);
                    formData.append("major", document.getElementById("major").value);
                    formData.append("startMonth", document.getElementById("eduStartMonth").value);
                    formData.append("startYear", document.getElementById("eduStartYear").value);
                    formData.append("endMonth", document.getElementById("eduEndMonth").value);
                    formData.append("endYear", document.getElementById("eduEndYear").value);
                    formData.append("caption", document.getElementById("eduCaption").value);

                    const photoInput = document.getElementById("educationPhoto");
                    if (photoInput.files[0]) {
                        formData.append("photo", photoInput.files[0]);
                    }

                    try {
                        const response = await fetch("/api/users/education", {
                            method: "POST",
                            headers: {
                                "X-CSRF-TOKEN": document.querySelector("meta[name='csrf-token']")
                                    .content
                            },
                            body: formData
                        });

                        if (response.ok) {
                            const data = await response.json();
                            addEducationToDOM(data);
                            $("#addEducationModal").modal("hide");
                            document.getElementById("educationForm").reset();
                            photoPreview.style.display = "none";
                        } else {
                            alert("Gagal menyimpan data. Coba lagi!");
                        }
                    } catch (error) {
                        console.error("Error:", error);
                        alert("Terjadi kesalahan!");
                    }
                });

                function init() {
                    populateMonths();
                    populateYears();

                    eduStartMonth.addEventListener("change", handleDateFields);
                    eduStartYear.addEventListener("change", handleDateFields);
                    educationPhoto.addEventListener("change", handlePhotoPreview);

                    eduEndMonth.disabled = true;
                    eduEndYear.disabled = true;
                }

                init();

                document.addEventListener("DOMContentLoaded", function() {
                    const educationForm = document.getElementById("educationForm");
                    const educationPhoto = document.getElementById("educationPhoto");
                    const photoPreview = document.getElementById("educationPhotoPreview");

                    educationPhoto.addEventListener("change", function(e) {
                        const file = e.target.files[0];
                        if (file) {
                            const reader = new FileReader();
                            reader.onload = function(event) {
                                photoPreview.src = event.target.result;
                                photoPreview.style.display = "block";
                            };
                            reader.readAsDataURL(file);
                        } else {
                            photoPreview.style.display = "none";
                            photoPreview.src = "";
                        }
                    });

                    $(document).ready(function() {
                        // Ambil data pendidikan saat halaman dimuat
                        fetchEducations();

                        // Tambah Pendidikan
                        $('#educationForm').on('submit', function(e) {
                            e.preventDefault();
                            let formData = new FormData(this);

                            $.ajax({
                                url: '/api/users/education',
                                type: 'POST',
                                data: formData,
                                processData: false,
                                contentType: false,
                                beforeSend: function() {
                                    $('#submitBtn').prop('disabled', true).text(
                                        'Saving...');
                                },
                                success: function(response) {
                                    $('#educationForm')[0].reset();
                                    $('#educationModal').modal('hide');
                                    fetchEducations();
                                    showToast('success',
                                        'Education added successfully!');
                                },
                                error: function(xhr) {
                                    showToast('error', 'Failed to add education.');
                                },
                                complete: function() {
                                    $('#submitBtn').prop('disabled', false).text(
                                        'Save');
                                }
                            });
                        });

                        // Hapus Pendidikan
                        $(document).on('click', '.delete-education', function() {
                            let educationId = $(this).data('id');

                            if (!confirm('Are you sure you want to delete this education?'))
                                return;

                            $.ajax({
                                url: '/educations/' + educationId,
                                type: 'DELETE',
                                data: {
                                    _token: $('meta[name="csrf-token"]').attr('content')
                                },
                                success: function(response) {
                                    fetchEducations();
                                    showToast('success',
                                        'Education deleted successfully!');
                                },
                                error: function(xhr) {
                                    showToast('error',
                                        'Failed to delete education.');
                                }
                            });
                        });

                        // Ambil Data Pendidikan
                        function fetchEducations() {
                            $.ajax({
                                url: '/educations',
                                type: 'GET',
                                success: function(response) {
                                    let educationList = '';
                                    response.educations.forEach(function(edu) {
                                        educationList += `
                        <div class="card my-3">
                            <div class="card-body">
                                <h4>${edu.school_name} (${edu.start_year} - ${edu.end_year ?? 'Present'})</h4>
                                <p><strong>Major:</strong> ${edu.major}</p>
                                <p>${edu.caption ?? ''}</p>
                                ${edu.photo ? `<img src="/storage/${edu.photo}" width="100" class="img-thumbnail">` : ''}
                                <button class="btn btn-danger delete-education" data-id="${edu.id}">Delete</button>
                            </div>
                        </div>
                    `;
                                    });
                                    $('#educationContainer').html(educationList);
                                },
                                error: function(xhr) {
                                    showToast('error', 'Failed to fetch educations.');
                                }
                            });
                        }

                        // Tampilkan Notifikasi Toast
                        function showToast(type, message) {
                            let bgColor = type === 'success' ? 'bg-success' : 'bg-danger';
                            $('#toastMessage').removeClass('bg-success bg-danger').addClass(bgColor)
                                .text(message);
                            $('#toastContainer').fadeIn().delay(3000).fadeOut();
                        }
                    });

                });
            });
        </script>
        {{-- ngehit api annjai --}}
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                fetchMyPosts();
            });

            function fetchMyPosts() {
                axios.get('/api/posts/my-posts', {
                        params: {
                            limit: 10,
                            page: 1
                        }
                    })
                    .then(response => {
                        console.log("Response:", response.data.data.data);
                        let posts = response.data.data.data;

                        if (!Array.isArray(posts.data)) {
                            console.error("Error: Expected an array but got", typeof posts.data);
                            return;
                        }

                        displayPosts(posts.data);
                    })
                    .catch(error => {
                        console.error("Error fetching posts:", error);
                    });
            }

            function displayPosts(posts) {
                const postContainer = document.getElementById("postContainer");

                // Cek apakah `postContainer` ditemukan
                if (!postContainer) {
                    console.error("Error: Element #postContainer not found!");
                    return;
                }

                postContainer.innerHTML = "";

                posts.forEach(post => {
                    const postElement = document.createElement("div");
                    postElement.classList.add("post");
                    postElement.innerHTML = `
                <div class="post-content">
                    <p>${post.content}</p>
                    <small>By: ${post.user?.name || "Unknown"}</small>
                    <br>
                    <button onclick="toggleLike(${post.id}, this)">
                        ${post.is_liked ? "Unlike" : "Like"}
                    </button>
                </div>
            `;
                    postContainer.appendChild(postElement);
                });
            }

            function toggleLike(postId, btn) {
                axios.post(`/api/posts/${postId}/like`)
                    .then(response => {
                        if (response.data.status === "liked") {
                            btn.textContent = "Unlike";
                        } else {
                            btn.textContent = "Like";
                        }
                    })
                    .catch(error => {
                        console.error("Error liking/unliking post:", error);
                    });
            }
        </script>
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- slick Slider JS-->
        <script type="text/javascript" src="vendor/slick/slick.min.js"></script>
        <script src="js/osahan.js"></script>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    @endsection
