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

        .slider-button {
            width: 40px;
            /* Atur ukuran yang sama untuk lebar dan tinggi */
            height: 40px;
            border-radius: 50%;
            /* Membuat tombol menjadi lingkaran */
            background-color: rgba(0, 0, 0, 0.5);
            /* Warna background */
            color: white;
            /* Warna ikon */
            border: none;
            /* Menghapus border */
            cursor: pointer;
            display: flex;
            /* Agar ikon terpusat */
            align-items: center;
            justify-content: center;
            font-size: 20px;
            /* Ukuran ikon */
            transition: background 0.3s ease;
            margin-top: -20px;
        }

        .slider-button:hover {
            background-color: rgba(0, 0, 0, 0.8);
            /* Efek hover */
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
                            <p class="text-muted mb-4">{{ Auth::user()->headline ?? 'No information yet.' }}</p>
                            <div class="mt-4">
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
                                                <p class="text-black-50 mb-2">Job Saved</p>
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
                                        class="font-weight-bold d-block text-primary w-100 border-0 bg-transparent p-4 text-center"
                                        type="submit" style="font-size: 13px; margin-bottom: -20px;">
                                        Log Out
                                    </button>
                                </form>
                            </div>
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
                                <div class="experience-item bg-light mb-3 rounded border p-3 shadow-sm">
                                    <div class="experience-content d-flex align-items-center">
                                        <div class="experience-photo mr-3">
                                            @if ($experience->photo)
                                                <img src="{{ asset('storage/' . $experience->photo) }}" alt="Company Logo"
                                                    class="rounded" style="width: 60px; height: 60px; object-fit: cover;">
                                            @else
                                                <div class="d-flex align-items-center justify-content-center rounded border bg-white"
                                                    style="width: 60px; height: 60px;">
                                                    <i class="fas fa-building text-secondary"></i>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="experience-info">
                                            <h5 class="font-weight-bold text-dark mb-1">{{ $experience->job_title }}</h5>
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
                                                <p class="text-dark mb-0">{{ $experience->caption }}</p>
                                            @endif
                                        </div>
                                    </div>
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
                                        <!-- Form fields for experience -->
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
                                        <button type="submit" class="btn btn-primary">Save Experience</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Education Section -->
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

                        <!-- Education List -->
                        <div id="educationList" class="box-body p-3">
                            @foreach (isset($user) ? $user->educations : auth()->user()->educations as $education)
                                <div class="education-item bg-light mb-3 rounded border p-3 shadow-sm">
                                    <div class="education-content d-flex align-items-center">
                                        <div class="education-photo mr-3">
                                            @if ($education->photo)
                                                <img src="{{ asset('storage/' . $education->photo) }}" alt="School Logo"
                                                    class="rounded" style="width: 60px; height: 60px; object-fit: cover;">
                                            @else
                                                <div class="d-flex align-items-center justify-content-center rounded border bg-white"
                                                    style="width: 60px; height: 60px;">
                                                    <i class="fas fa-university text-secondary"></i>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="education-info">
                                            <h5 class="font-weight-bold text-dark mb-1">{{ $education->school_name }}</h5>
                                            <h6 class="text-primary mb-1">{{ $education->major }}</h6>
                                            <p class="text-muted mb-1">
                                                {{ date('F', mktime(0, 0, 0, $education->start_month, 1)) }}
                                                {{ $education->start_year }} -
                                                @if ($education->end_month && $education->end_year)
                                                    {{ date('F', mktime(0, 0, 0, $education->end_month, 1)) }}
                                                    {{ $education->end_year }}
                                                @else
                                                    Present
                                                @endif
                                            </p>
                                            @if ($education->caption)
                                                <p class="text-dark mb-0">{{ $education->caption }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

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
                                            <input type="text" class="form-control" id="schoolName"
                                                name="school_name" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Major <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="major" name="major"
                                                required>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Start Date <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <select class="form-control" id="eduStartMonth" name="start_month"
                                                        required>
                                                        <option value="" disabled selected>Month</option>
                                                        @for ($i = 1; $i <= 12; $i++)
                                                            <option value="{{ $i }}">
                                                                {{ date('F', mktime(0, 0, 0, $i, 10)) }}</option>
                                                        @endfor
                                                    </select>
                                                    <select class="form-control" id="eduStartYear" name="start_year"
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
                                            <label>Description</label>
                                            <textarea class="form-control" id="eduCaption" name="caption" rows="3"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>School Logo</label>
                                            <input type="file" class="form-control-file" id="educationPhoto"
                                                name="photo" accept="image/*">
                                            <img id="educationPhotoPreview" src="#" alt="Preview"
                                                style="display: none; max-width: 200px; margin-top: 10px;">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save Education</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="container mt-4">
                        <h5 id="loading-text" class="text-muted text-center">Loading</h5>
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
                                let url =
                                    @isset($user)
                                        "/api/users/{{ $user->id }}/posts"
                                    @else
                                        "/api/posts/my-posts";
                                    @endisset

                                axios
                                    .get(url)
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

                                        // In the renderPosts() function, modify the post card template:

                                        const postType = post.type || 'article'; // Default to article if type not specified
                                        return `
                                        <div class="post-card">
                                            <h6 class="font-weight-bold mt-2">${post.content}</h6>
                                            <p class="text-primary mb-1">${post.user.name}</p>
                                            <small class="text-muted"><i class="feather-clock"></i> Posted on ${formattedDate}</small>
                                            ${image}
                                            <a href="/profile/${post.user.username}/posts/all" class="btn btn-primary view-post-btn">View Full Post</a>
                                        </div>
                                    `;
                                    })
                                    .join("");

                                postContainer.innerHTML = `
                                        <div class="post-wrapper w-100">
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
            </main>
        </div>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const experienceForm = document.getElementById('experienceForm');
                const experienceList = document.getElementById('experienceList');
                const photoInput = document.getElementById('photo');
                const photoPreview = document.getElementById('photoPreview');

                // Tampilkan preview gambar
                photoInput.addEventListener('change', function() {
                    const file = this.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            photoPreview.src = e.target.result;
                            photoPreview.style.display = 'block';
                        };
                        reader.readAsDataURL(file);
                    } else {
                        photoPreview.style.display = 'none';
                        photoPreview.src = '#';
                    }
                });

                experienceForm.addEventListener("submit", async function(e) {
                    e.preventDefault();

                    const formData = new FormData(this);

                    try {
                        const response = await axios.post('/api/users/experience', formData, {
                            headers: {
                                'Content-Type': 'multipart/form-data',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                    .content
                            }
                        });

                        if (response.data.success) {
                            // Close the modal
                            $('#addExperienceModal').modal('hide');

                            // Clear the form
                            experienceForm.reset();

                            // Add the new experience to the DOM
                            const newExperience = response.data.experience;
                            const experienceItem = document.createElement("div");
                            experienceItem.classList.add("experience-item", "bg-light", "mb-3", "rounded",
                                "border", "p-3", "shadow-sm");

                            experienceItem.innerHTML = `
                    <div class="experience-content d-flex align-items-center">
                        <div class="experience-photo mr-3">
                            ${newExperience.photo ? `<img src="${newExperience.photo}" alt="Company Logo" class="rounded" style="width: 60px; height: 60px; object-fit: cover;">` :
                            `<div class="d-flex align-items-center justify-content-center rounded border bg-white" style="width: 60px; height: 60px;">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <i class="fas fa-building text-secondary"></i>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    </div>`}
                        </div>
                        <div class="experience-info">
                            <h5 class="font-weight-bold text-dark mb-1">${newExperience.job_title}</h5>
                            <h6 class="text-primary mb-1">${newExperience.company_name}</h6>
                            <p class="text-muted mb-1">
                                ${new Date(newExperience.start_year, newExperience.start_month - 1).toLocaleString('default', { month: 'long' })} ${newExperience.start_year} -
                                ${newExperience.end_year ? `${new Date(newExperience.end_year, newExperience.end_month - 1).toLocaleString('default', { month: 'long' })} ${newExperience.end_year}` : 'Present'}
                            </p>
                            ${newExperience.caption ? `<p class="text-dark mb-0">${newExperience.caption}</p>` : ''}
                        </div>
                    </div>
                `;

                            experienceList.appendChild(experienceItem);

                            // Show success message
                            Swal.fire({
                                icon: 'success',
                                title: 'Success!',
                                text: 'Experience has been added successfully.',
                                timer: 1500,
                                showConfirmButton: false
                            });
                        } else {
                            throw new Error(response.data.message || 'Failed to save experience');
                        }
                    } catch (error) {
                        console.error("Error:", error);
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
                const educationForm = document.getElementById("educationForm");
                const educationList = document.getElementById("educationList");
                const educationPhoto = document.getElementById("photo");
                const photoPreview = document.getElementById("photoPreview");

                educationForm.addEventListener("submit", async function(e) {
                    e.preventDefault();

                    const formData = new FormData(this);

                    try {
                        const response = await axios.post('/api/users/education', formData, {
                            headers: {
                                'Content-Type': 'multipart/form-data',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                    .content
                            }
                        });

                        if (response.data.success) {
                            // Close the modal
                            $('#addEducationModal').modal('hide');

                            // Clear the form
                            educationForm.reset();

                            // Add the new education to the DOM
                            const newEducation = response.data.education;
                            const educationItem = document.createElement("div");
                            educationItem.classList.add("education-item", "bg-light", "mb-3", "rounded",
                                "border", "p-3", "shadow-sm");

                            educationItem.innerHTML = `
                    <div class="education-content d-flex align-items-center">
                        <div class="education-photo mr-3">
                            ${newEducation.photo ? `<img src="${newEducation.photo}" alt="School Logo" class="rounded" style="width: 60px; height: 60px; object-fit: cover;">` :
                            `<div class="d-flex align-items-center justify-content-center rounded border bg-white" style="width: 60px; height: 60px;">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <i class="fas fa-university text-secondary"></i>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            </div>`}
                        </div>
                        <div class="education-info">
                            <h5 class="font-weight-bold text-dark mb-1">${newEducation.school_name}</h5>
                            <h6 class="text-primary mb-1">${newEducation.major}</h6>
                            <p class="text-muted mb-1">
                                ${new Date(newEducation.start_year, newEducation.start_month - 1).toLocaleString('default', { month: 'long' })} ${newEducation.start_year} -
                                ${newEducation.end_year ? `${new Date(newEducation.end_year, newEducation.end_month - 1).toLocaleString('default', { month: 'long' })} ${newEducation.end_year}` : 'Present'}
                            </p>
                            ${newEducation.caption ? `<p class="text-dark mb-0">${newEducation.caption}</p>` : ''}
                        </div>
                    </div>
                `;

                            educationList.appendChild(educationItem);

                            // Show success message
                            Swal.fire({
                                icon: 'success',
                                title: 'Success!',
                                text: 'Education has been added successfully.',
                                timer: 1500,
                                showConfirmButton: false
                            });
                        } else {
                            throw new Error(response.data.message || 'Failed to save education');
                        }
                    } catch (error) {
                        console.error("Error:", error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'Failed to save education. Please try again.',
                        });
                    }
                });

                // Handle photo preview
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
                        photoPreview.src = "#";
                    }
                });
            });
        </script>
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- slick Slider JS-->
        <script type="text/javascript" src="vendor/slick/slick.min.js"></script>
        <script src="js/osahan.js"></script>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    @endsection
