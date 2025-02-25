{{-- halaman edit profile --}}
@extends('layouts.templates')

@section('content')
    <style>
        .profile-box img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 50%;
        }

        .small-btn {
            padding: 6px 12px;
            font-size: 14px;
        }
    </style>
    <div class="py-4">
        <div class="container">
            <div class="row">
                <!-- Main Content -->
                <aside class="col-md-4">
                    <div class="profile-box mb-3 w-10 rounded border bg-white text-center">
                        <div class="d-flex align-items-center p-4">
                            <img src="{{ auth()->user()->getProfileImage() }}" class="img-fluid rounded-circle"
                                alt="Profile Image">
                            <div class="d-flex justify-content-between me-2 p-4" style="gap: 5px;">
                                <!-- Form untuk mengunggah foto profil -->
                                <form action="{{ route('profile.update.photo') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <label class="btn btn-info m-0" for="fileAttachmentBtn" data-toggle="tooltip"
                                        data-placement="top" data-original-title="Upload New Picture">
                                        <i class="feather-image"></i>
                                        <input id="fileAttachmentBtn" name="profile_photo" type="file" class="d-none"
                                            onchange="this.form.submit()">
                                    </label>
                                </form>
                                <form action="{{ route('profile.delete.photo') }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" data-toggle="tooltip" data-placement="top"
                                        data-original-title="Delete">
                                        <i class="feather-trash-2"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <form action="{{ route('profile.update.about') }}" method="POST">
                        @csrf
                        <div class="mb-3 rounded border bg-white">
                            <div class="box-title border-bottom p-3">
                                <h6 class="m-0">About</h6>
                                <p class="small mb-0 mt-0">Tell about yourself in two sentences.</p>
                            </div>
                            <div class="box-body">
                                <div class="border-bottom p-3">
                                    <div class="form-group mb-4">
                                        <label class="mb-1">About You</label>
                                        <textarea class="form-control resize-none" name="about" rows="4" placeholder="Enter About You">{{ old('about', auth()->user()->about) }}</textarea>
                                    </div>
                                    {{-- add skills --}}
                                    <div class="col-sm-12 mb-3">
                                        <label id="skillsLabel" class="form-label">Skills <span
                                                class="text-danger">*</span></label>
                                        <div id="skillsContainer">
                                            @foreach (old('skills', auth()->user()->skills) ?? [] as $index => $skill)
                                                <div class="d-flex align-items-center mb-2">
                                                    <input class="form-control w-100 p-2" type="text"
                                                        name="skills[{{ $index }}]" placeholder="Enter your skill"
                                                        value="{{ $skill }}" required>
                                                    <i class="feather-trash-2 text-danger ml-2"
                                                        style="cursor: pointer;"></i>
                                                </div>
                                            @endforeach
                                        </div>
                                        <!-- Tombol Tambah Skill -->
                                        <div class="mt-2">
                                            <a class="d-inline-block u-text-muted" href="#" id="addSkill"><span
                                                    class="mr-1">+</span> Add skills</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="overflow-hidden p-3 text-center">
                                    <button type="submit"
                                        class="font-weight-bold btn btn-light d-block rounded p-3">SAVE</button>
                                </div>
                            </div>
                        </div>
                    </form>

                    {{-- input social profile --}}
                    <form action="{{ route('profile.update.medsos') }}" method="POST" id="socialForm">
                        @csrf
                        <div class="mb-3 rounded border bg-white">
                            <div class="box-title border-bottom p-3">
                                <h6 class="m-0">Social profiles</h6>
                                <p class="small mb-0 mt-0">Add multiple accounts for each platform.</p>
                            </div>
                            <div class="box-body">
                                <!-- Daftar Akun yang Sudah Tersimpan -->
                                <div id="savedSocialMedia" class="p-3">
                                    @if (auth()->user()->medsos)
                                        @php
                                            $socials = is_string(auth()->user()->medsos)
                                                ? json_decode(auth()->user()->medsos, true)
                                                : auth()->user()->medsos;
                                        @endphp
                                        @foreach ($socials as $platform => $accounts)
                                            @foreach ($accounts as $index => $data)
                                                <div class="d-flex align-items-center mb-2 rounded border p-2">
                                                    <i class="feather-{{ $platform }}"
                                                        style="width: 30px; height: 30px; font-size: 1.2rem; margin-right: 10px;"></i>
                                                    <input type="text" name="saved_medsos[{{ $platform }}][]"
                                                        value="{{ is_array($data) ? $data['username'] : $data }}"
                                                        class="form-control username-input">
                                                    <button type="button"
                                                        class="btn btn-danger btn-sm remove-saved ms-2">X</button>
                                                </div>
                                            @endforeach
                                        @endforeach
                                    @endif
                                </div>

                                <div class="p-1">
                                    <label>Select Platform:</label>
                                    <div class="d-flex justify-content-center mb-3 gap-2">
                                        @foreach (['instagram', 'facebook', 'twitter', 'youtube', 'github'] as $platform)
                                            <button type="button" class="btn btn-light platform-btn"
                                                data-platform="{{ $platform }}">
                                                <i class="feather-{{ $platform }}"></i>
                                            </button>
                                        @endforeach
                                    </div>

                                    <!-- Input Medsos Baru -->
                                    <div id="socialInputs"></div>
                                </div>

                                <div class="d-flex justify-content-center gap-2 overflow-hidden p-3 text-center">
                                    <button type="submit" id="saveSocialMedia" class="btn btn-primary small-btn">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>

                </aside>

                <main class="col-md-8">
                    <div class="mb-3 rounded border bg-white">
                        <div class="box-title border-bottom p-3">
                            <h6 class="m-0">Edit Your Profile</h6>
                            <p class="small mb-0 mt-0">Add information about yourself</p>
                        </div>
                        <div class="box-body p-3">
                            <form action="{{ route('profile.save') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-6 mb-2">
                                        <div class="form-group">
                                            <label id="nameLabel" class="form-label">Name <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="name"
                                                value="{{ auth()->user()->name }}" placeholder="Enter your name" required
                                                aria-describedby="nameLabel">
                                            <small class="form-text text-muted">Displayed on your public profile,
                                                notifications and other places.</small>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mb-2">
                                        <div class="form-group">
                                            <label id="usernameLabel" class="form-label">Username <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="username"
                                                value="{{ auth()->user()->username }}" placeholder="Enter your username"
                                                required aria-describedby="usernameLabel">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="birthdate" class="form-label">Birthdate <span
                                                    class="text-danger">*</span></label>
                                            <input type="date" id="birthdate" name="birthdate" class="form-control"
                                                value="{{ old('birthdate', auth()->user()->birthdate ? auth()->user()->birthdate->format('Y-m-d') : '') }}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="gender" class="form-label">Gender <span
                                                    class="text-danger">*</span></label>
                                            <select id="gender" class="form-control custom-select" name="gender"
                                                required>
                                                <option value="" disabled
                                                    {{ old('gender', auth()->user()->gender) ? '' : 'selected' }}>Select
                                                    gender</option>
                                                <option value="male"
                                                    {{ old('gender', auth()->user()->gender) == 'male' ? 'selected' : '' }}>
                                                    Male</option>
                                                <option value="female"
                                                    {{ old('gender', auth()->user()->gender) == 'female' ? 'selected' : '' }}>
                                                    Female</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 mb-2">
                                        <div class="form-group">
                                            <label id="emailLabel" class="form-label">Email address <span
                                                    class="text-danger">*</span></label>
                                            <input type="email" class="form-control" name="email"
                                                value="{{ auth()->user()->email }}"
                                                placeholder="Enter your email address" required
                                                aria-describedby="emailLabel">
                                            <small class="form-text text-muted">We'll never share your email with anyone
                                                else.</small>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mb-2">
                                        <div class="form-group">
                                            <label id="locationLabel" class="form-label">Location <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="location"
                                                value="{{ old('location', auth()->user()->location) }}"
                                                placeholder="Enter your location" required
                                                aria-describedby="locationLabel">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 mb-2">
                                        <div class="form-group">
                                            <label id="organizationLabel" class="form-label">Organization <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="organization"
                                                value="{{ old('organization', auth()->user()->organization) }}"
                                                placeholder="Enter your organization name" required
                                                aria-describedby="organizationLabel">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mb-2">
                                        <div class="form-group">
                                            <label id="websiteLabel" class="form-label">Website <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" type="url" name="website"
                                                placeholder="Enter your website" required aria-describedby="websiteLabel"
                                                value="{{ old('website', auth()->user()->website) }}">
                                            <small class="form-text text-muted">Your home page, blog or company site, e.g.
                                                http://example.com</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 mb-2">
                                        <div class="form-group">
                                            <label id="phoneNumberLabel" class="form-label">Phone number <span
                                                    class="text-danger">*</span></label>
                                            <div id="phoneNumberContainer">
                                                <input class="form-control" type="number" name="phone"
                                                    placeholder="Enter your phone number" required
                                                    value="{{ old('phone', auth()->user()->phone) }}">
                                            </div>
                                            <div class="mt-2">
                                                <a class="d-inline-block u-text-muted" href="#"
                                                    id="addPhoneNumber"><span class="mr-1">+</span> Add phone number</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mb-2">
                                        <div class="form-group">
                                            <label class="form-label">Headline <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="headline"
                                                placeholder="Enter your headline"
                                                value="{{ old('headline', auth()->user()->headline) }}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 text-right">
                                    <button type="button" class="btn btn-secondary btn-lg m-1 p-2"
                                        disabled>Cancel</button>
                                    <button type="submit" class="font-weight-bold btn btn-primary rounded p-2">Save
                                        Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </main>
            </div>

            <!-- JavaScript untuk Menambah dan Menghapus Input Nomor -->
            <script>
                document.getElementById("addPhoneNumber").addEventListener("click", function(event) {
                    event.preventDefault();

                    // Buat elemen div baru untuk input tambahan
                    let newInputDiv = document.createElement("div");
                    newInputDiv.classList.add("d-flex", "align-items-center", "mt-2");

                    // Input baru
                    let newInput = document.createElement("input");
                    newInput.classList.add("form-control");
                    newInput.setAttribute("type", "tel");
                    newInput.setAttribute("name", "phoneNumber[]");
                    newInput.setAttribute("placeholder", "Enter another phone number");
                    newInput.required = true;

                    // Tombol hapus (ikon trash)
                    let deleteButton = document.createElement("span");
                    deleteButton.innerHTML = '<i class="feather-trash-2 ml-2 text-danger" style="cursor: pointer;"></i>';
                    deleteButton.addEventListener("click", function() {
                        newInputDiv.remove();
                    });

                    // Tambahkan input dan tombol hapus ke dalam div
                    newInputDiv.appendChild(newInput);
                    newInputDiv.appendChild(deleteButton);

                    // Tambahkan ke dalam container
                    document.getElementById("phoneNumberContainer").appendChild(newInputDiv);
                });
            </script>

            <!-- JavaScript untuk Menambah dan Menghapus Skills -->
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    // Function to add delete functionality to a button
                    function addDeleteFunctionality(button, parentDiv) {
                        button.addEventListener("click", function() {
                            parentDiv.remove();
                        });
                    }

                    // Add skill functionality
                    document.getElementById("addSkill").addEventListener("click", function(event) {
                        event.preventDefault();

                        // Create a new div for the additional input
                        let newInputDiv = document.createElement("div");
                        newInputDiv.classList.add("d-flex", "align-items-center", "mt-2");

                        // New input for skill
                        let newInput = document.createElement("input");
                        newInput.classList.add("form-control");
                        newInput.setAttribute("type", "text");
                        newInput.setAttribute("name", "skills[]");
                        newInput.setAttribute("placeholder", "Enter another skill");
                        newInput.required = true;

                        // Delete button (trash icon)
                        let deleteButton = document.createElement("span");
                        deleteButton.innerHTML =
                            '<i class="feather-trash-2 ml-2 text-danger" style="cursor: pointer;"></i>';
                        addDeleteFunctionality(deleteButton, newInputDiv);

                        // Append input and delete button to the div
                        newInputDiv.appendChild(newInput);
                        newInputDiv.appendChild(deleteButton);

                        // Append to the container
                        document.getElementById("skillsContainer").appendChild(newInputDiv);
                    });

                    // Add delete functionality to existing skills
                    document.querySelectorAll("#skillsContainer .feather-trash-2").forEach(function(button) {
                        addDeleteFunctionality(button, button.parentElement);
                    });
                });
            </script>
            {{-- ini untuk medsos --}}
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    const platformButtons = document.querySelectorAll(".platform-btn");
                    const socialInputs = document.getElementById("socialInputs");
                    const savedSocialMedia = document.getElementById("savedSocialMedia");
                    const saveButton = document.getElementById("saveSocialMedia");
                    const form = document.getElementById("socialForm");

                    const platformIcons = {
                        instagram: "feather-instagram text-warning",
                        facebook: "feather-facebook text-primary",
                        twitter: "feather-twitter text-info",
                        youtube: "feather-youtube text-danger",
                        github: "feather-github text-dark",
                    };

                    let hasNewInput = false;
                    let hasUpdatedInput = false;

                    platformButtons.forEach((button) => {
                        button.addEventListener("click", function() {
                            const platform = this.getAttribute("data-platform");

                            // Tambahkan input baru tanpa menghapus yang lama
                            const inputGroup = document.createElement("div");
                            inputGroup.classList.add("mb-2", "d-flex", "align-items-center", "border",
                                "rounded", "p-2");

                            inputGroup.innerHTML = `
                            <i class="${platformIcons[platform]} d-flex justify-content-center align-items-center"
                               style="width: 30px; height: 30px; font-size: 1.2rem; margin-right: 10px;"></i>
                            <input type="hidden" name="medsos[${platform}][]" value="${platform}">
                            <input type="text" class="form-control username-input" placeholder="Enter ${platform} username">
                            <button type="button" class="btn btn-danger btn-sm remove-input" style="margin-left: 10px;">X</button>
                        `;

                            socialInputs.appendChild(inputGroup);
                            hasNewInput = true;
                            updateButtonState();

                            inputGroup.querySelector(".remove-input").addEventListener("click", function() {
                                inputGroup.remove();
                                hasNewInput = socialInputs.children.length > 0;
                                updateButtonState();
                            });
                        });
                    });

                    savedSocialMedia.addEventListener("input", function(e) {
                        if (e.target.classList.contains("username-input")) {
                            hasUpdatedInput = true;
                            updateButtonState();
                        }
                    });

                    savedSocialMedia.addEventListener("click", function(e) {
                        if (e.target.classList.contains("remove-saved")) {
                            e.target.parentElement.remove();
                            updateButtonState();
                        }
                    });

                    form.addEventListener("submit", function(event) {
                        if (!hasNewInput && !hasUpdatedInput) {
                            alert("Tidak ada perubahan untuk disimpan!");
                            event.preventDefault();
                        }
                    });

                    function updateButtonState() {
                        if (hasNewInput && hasUpdatedInput) {
                            saveButton.textContent = "Save & Update";
                        } else if (hasNewInput) {
                            saveButton.textContent = "Save";
                        } else if (hasUpdatedInput) {
                            saveButton.textContent = "Update";
                        } else {
                            saveButton.textContent = "Save";
                        }
                    }
                });
            </script>
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    const platformButtons = document.querySelectorAll(".platform-btn");
                    const socialInputs = document.getElementById("socialInputs");
                    let selectedPlatforms = new Set();

                    platformButtons.forEach(button => {
                        button.addEventListener("click", function() {
                            const platform = this.getAttribute("data-platform");

                            if (!selectedPlatforms.has(platform)) {
                                selectedPlatforms.add(platform);

                                const inputGroup = document.createElement("div");
                                inputGroup.classList.add("mb-2", "d-flex", "align-items-center");

                                inputGroup.innerHTML = `
                                <input type="hidden" name="medsos[${platform}][platform]" value="${platform}">
                                <input type="text" name="medsos[${platform}][username]" class="form-control" placeholder="${platform} username">
                                <button type="button" class="btn btn-danger btn-sm remove-input" style="margin-left: 10px;">X</button>
                                `;

                                socialInputs.appendChild(inputGroup);

                                inputGroup.querySelector(".remove-input").addEventListener("click",
                                    function() {
                                        inputGroup.remove();
                                        selectedPlatforms.delete(platform);
                                    });
                            }
                        });
                    });
                }); <
            </script>
            </script>
            <!-- Bootstrap core JavaScript -->
            <script src="vendor/jquery/jquery.min.js"></script>
            <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
            <!-- slick Slider JS-->
            <script type="text/javascript" src="vendor/slick/slick.min.js"></script>
            <!-- Custom scripts for all pages-->
            <script src="js/osahan.js"></script>
        @endsection
