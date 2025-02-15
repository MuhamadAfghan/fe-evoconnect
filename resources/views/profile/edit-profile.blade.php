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
                                alt="Responsive image">
                            <div class="d-flex justify-content-between me-2 p-4" style="gap: 5px;">
                                <!-- Form untuk mengunggah foto profil -->
                                <form action="{{ route('profile.update.photo') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <label data-toggle="tooltip" data-placement="top"
                                        data-original-title="Upload New Picture" class="btn btn-info m-0"
                                        for="fileAttachmentBtn">
                                        <i class="feather-image"></i>
                                        <input id="fileAttachmentBtn" name="profile_photo" type="file" class="d-none"
                                            onchange="this.form.submit()">
                                    </label>
                                </form>


                                <form action="{{ route('profile.delete.photo') }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button data-toggle="tooltip" data-placement="top" data-original-title="Delete"
                                        type="submit" class="btn btn-danger">
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
                                <p class="small mb-0 mt-0">Tell about yourself in two sentences.
                                </p>
                            </div>
                            <div class="box-body">
                                <div class="border-bottom p-3">
                                    <div class="form-group mb-4">
                                        <label class="mb-1">About You</label>
                                        <div class="position-relative">
                                            <textarea class="form-control" name="about" rows="4" name="text" placeholder="Enter About You">{{ old('about', auth()->user()->about) }}</textarea>
                                        </div>
                                    </div>
                                    {{-- add skills --}}
                                    <div class="col-sm-12 mb-3">
                                        <div class="js-form-message">
                                            <label id="skillsLabel" class="form-label">
                                                Skills <span class="text-danger">*</span>
                                            </label>
                                            <div id="skillsContainer">
                                                @foreach (old('skills', auth()->user()->skills) ?? [] as $index => $skill)
                                                    <div class="d-flex align-items-center mb-2">
                                                        <input class="form-control w-100 p-2" type="text"
                                                            name="skills[{{ $index }}]"
                                                            placeholder="Enter your skill" aria-label="Enter your skill"
                                                            value="{{ $skill }}" required="">
                                                        <i class="feather-trash-2 text-danger ml-2"
                                                            style="cursor: pointer;"></i>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>

                                        <!-- Tombol Tambah Skill -->
                                        <div class="mt-2">
                                            <a class="d-inline-block u-text-muted" href="#" id="addSkill">
                                                <span class="mr-1">+</span> Add skills
                                            </a>
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
                    <form action="{{ route('profile.update.medsos') }}" name="medsos" method="POST">
                        @csrf
                        <div class="mb-3 rounded border bg-white">
                            <div class="box-title border-bottom p-3">
                                <h6 class="m-0">Social profiles</h6>
                                <p class="small mb-0 mt-0">Add elsewhere links to your profile.</p>
                            </div>
                            <div class="box-body">
                                <div class="p-3" id="savedSocialMedia"></div>
                                <div class="p-1">
                                    <label>Select Platform:</label>
                                    <div class="d-flex justify-content-center mb-3 gap-2">
                                        <button type="button" class="btn btn-light platform-btn" data-platform="instagram">
                                            <i class="feather-instagram text-warning"></i>
                                        </button>
                                        <button type="button" class="btn btn-light platform-btn" data-platform="facebook">
                                            <i class="feather-facebook text-primary"></i>
                                        </button>
                                        <button type="button" class="btn btn-light platform-btn" data-platform="twitter">
                                            <i class="feather-twitter text-info"></i>
                                        </button>
                                        <button type="button" class="btn btn-light platform-btn" data-platform="youtube">
                                            <i class="feather-youtube text-danger"></i>
                                        </button>
                                        <button type="button" class="btn btn-light platform-btn" data-platform="github">
                                            <i class="feather-github text-dark"></i>
                                        </button>
                                    </div>
                                    <div id="socialInputs"></div>
                                </div>
                                <div class="d-flex justify-content-center gap-2 overflow-hidden p-3 text-center">
                                    <button type="button" id="addSocialMedia" class="btn btn-primary small-btn">Add
                                        Social Media</button>
                                    <button type="submit" class="btn btn-light small-btn">Save Social Profiles</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </aside>
                <main class="col-md-8">
                    <div class="mb-3 rounded border bg-white">
                        <div class="box-title border-bottom p-3">
                            <h6 class="m-0">Edit Your Profile</h6>
                            <p class="small mb-0 mt-0">Add information about yourself
                            </p>
                        </div>
                        <div class="box-body p-3">
                            <form action="{{ route('profile.save') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <!-- Input -->
                                    <div class="col-sm-6 mb-2">
                                        <div class="js-form-message">
                                            <label id="nameLabel" class="form-label">
                                                Name
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="name"
                                                    value="{{ auth()->user()->name }}" placeholder="Enter your name"
                                                    aria-label="Enter your name" required=""
                                                    aria-describedby="nameLabel" data-msg="Please enter your name."
                                                    data-error-class="u-has-error" data-success-class="u-has-success">
                                                <small class="form-text text-muted">Displayed on your public profile,
                                                    notifications and other places.</small>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Input -->
                                    <!-- Input -->
                                    <div class="col-sm-6 mb-2">
                                        <div class="js-form-message">
                                            <label id="usernameLabel" class="form-label">
                                                Username
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="form-group">
                                                <input type="text" class="form-control"
                                                    name="username"placeholder="Enter your username"
                                                    aria-label="Enter your username" required=""
                                                    aria-describedby="usernameLabel"
                                                    value="{{ auth()->user()->username }}"
                                                    data-msg="Please enter your username." data-error-class="u-has-error"
                                                    data-success-class="u-has-success">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Input -->
                                </div>
                                {{-- Input Tanggal Lahir dan Gender dalam satu baris --}}
                                <div class="row">
                                    <!-- Input Birthdate -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="birthdate" class="form-label">Birthdate
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="date" id="birthdate" name="birthdate" class="form-control"
                                                value="{{ old('birthdate', auth()->user()->birthdate ? auth()->user()->birthdate->format('Y-m-d') : '') }}"
                                                required>

                                        </div>
                                    </div>

                                    <!-- Input Gender -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="gender" class="form-label">Gender</label>
                                            <span class="text-danger">*</span>
                                            <select id="gender" class="form-control custom-select" name="gender"
                                                required="" data-msg="Please select your gender."
                                                data-error-class="u-has-error" data-success-class="u-has-success">
                                                <option value="" disabled
                                                    {{ old('gender', auth()->user()->gender) ? '' : 'selected' }}>Pilih
                                                    Gender</option>
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
                                    <!-- Input -->
                                    <div class="col-sm-6 mb-2">
                                        <div class="js-form-message">
                                            <label id="emailLabel" class="form-label">
                                                Email address
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="form-group">
                                                <input type="email" class="form-control" name="email"
                                                    value="{{ auth()->user()->email }}"
                                                    placeholder="Enter your email address"
                                                    aria-label="Enter your email address" required=""
                                                    aria-describedby="emailLabel"
                                                    data-msg="Please enter a valid email address."
                                                    data-error-class="u-has-error" data-success-class="u-has-success">
                                                <small class="form-text text-muted">We'll never share your email with
                                                    anyone else.</small>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Input -->
                                    <!-- Input -->
                                    <div class="col-sm-6 mb-2">
                                        <div class="js-form-message">
                                            <label id="locationLabel" class="form-label">
                                                Location
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="location"
                                                    value="{{ old('location', auth()->user()->location) }}"
                                                    placeholder="Enter your location" aria-label="Enter your location"
                                                    required aria-describedby="locationLabel"
                                                    data-msg="Please enter your location." data-error-class="u-has-error"
                                                    data-success-class="u-has-success">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Input -->
                                </div>
                                <div class="row">
                                    <!-- Input -->
                                    <div class="col-sm-6 mb-2">
                                        <div class="js-form-message">
                                            <label id="organizationLabel" class="form-label">
                                                Organization
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="organization"
                                                    value="{{ old('organization', auth()->user()->organization) }}"
                                                    placeholder="Enter your organization name"
                                                    aria-label="Enter your organization name" required
                                                    aria-describedby="organizationLabel"
                                                    data-msg="Please enter your organization name"
                                                    data-error-class="u-has-error" data-success-class="u-has-success">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Input -->
                                    <!-- Input -->
                                    <div class="col-sm-6 mb-2">
                                        <div class="js-form-message">
                                            <label id="websiteLabel" class="form-label">
                                                Website
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="form-group">
                                                <input class="form-control" type="url" name="website"
                                                    placeholder="Enter your website" aria-label="Enter your website"
                                                    required aria-describedby="websiteLabel"
                                                    data-msg="Password enter a valid website"
                                                    data-error-class="u-has-error" data-success-class="u-has-success"
                                                    value="{{ old('website', auth()->user()->website) }}">
                                                <small class="form-text text-muted">Your home page, blog or company site,
                                                    e.g. http://example.com</small>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Input -->
                                </div>
                                <div class="row">
                                    <!-- Input phone number-->
                                    <div class="col-sm-6 mb-2">
                                        <div class="js-form-message">
                                            <label id="phoneNumberLabel" class="form-label">
                                                Phone number <span class="text-danger">*</span>
                                            </label>
                                            <div id="phoneNumberContainer">
                                                <div class="d-flex align-items-center">
                                                    <input class="form-control" type="number" name="phone"
                                                        placeholder="Enter your phone number"
                                                        aria-label="Enter your phone number" required
                                                        value="{{ old('phone', auth()->user()->phone) }}">
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Tombol Tambah Nomor -->
                                        <div class="mt-2">
                                            <a class="d-inline-block u-text-muted" href="#" id="addPhoneNumber">
                                                <span class="mr-1">+</span> Add phone number
                                            </a>
                                        </div>
                                    </div>
                                    <!-- End Input -->
                                    <!-- Input -->
                                    <div class="col-sm-6 mb-2">
                                        <div class="js-form-message">
                                            <label class="form-label">
                                                Headline
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div id="headlineContainer">
                                                <div class="d-flex align-items-center">
                                                    <input class="form-control" type="text" name="headline"
                                                        placeholder="Enter your headline"
                                                        value="{{ old('headline', auth()->user()->headline) }}" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Input -->
                                </div>
                        </div>
                    </div>
                    <!-- <div class="mb-3 rounded border bg-white">
                                                                                                                                                                                                                                                                                                                                                        <div class="box-title border-bottom p-3">
                                                                                                                                                                                                                                                                                                                                                            <h6 class="m-0">Experience
                                                                                                                                                                                                                                                                                                                                                            </h6>
                                                                                                                                                                                                                                                                                                                                                            <p class="small mb-0 mt-0">Tell about your work, job, and other experiences.
                                                                                                                                                                                                                                                                                                                                                            </p>
                                                                                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                                                                                        <div class="box-body px-3 pb-0 pt-3">
                                                                                                                                                                                                                                                                                                                                                            <div class="row">
                                                                                                                                                                                                                                                                                                                                                                <div class="col-sm-6 mb-4">
                                                                                                                                                                                                                                                                                                                                                                    <label id="FROM" class="form-label">FROM</label> -->
                    <!-- Input -->
                    <!-- <div class="input-group">
                                                                                                                                                                                                                                                                                                                                                                        <input type="text" class="form-control" placeholder="From" aria-label="FROM"
                                                                                                                                                                                                                                                                                                                                                                            aria-describedby="FROM">
                                                                                                                                                                                                                                                                                                                                                                    </div> -->
                    <!-- End Input -->
                    <!-- </div>
                                                                                                                                                                                                                                                                                                                                                                <div class="col-sm-6 mb-4">
                                                                                                                                                                                                                                                                                                                                                                    <label id="TO" class="form-label">TO</label>
                                                                                                                                                                                                                                                                                                                                                                    Input -->
                    <!-- <div class="input-group">
                                                                                                                                                                                                                                                                                                                                                                        <input type="text" class="form-control" placeholder="TO" aria-label="TO"
                                                                                                                                                                                                                                                                                                                                                                            aria-describedby="TO">
                                                                                                                                                                                                                                                                                                                                                                    </div> -->
                    <!-- End Input -->
                    <!-- </div> -->
                    <!-- </div> -->
                    <!-- <div class="row">
                                                                                                                                                                                                                                                                                                                                        <div class="col-sm-6 mb-4">
                                                                                                                                                                                                                                                                                                                                            <label id="companyLabel" class="form-label">Company</label> -->
                    <!-- Input -->
                    <!-- <div class="input-group">
                                                                                                                                                                                                                                                                                                                                                <input type="text" class="form-control" placeholder="Enter your company title"
                                                                                                                                                                                                                                                                                                                                                    aria-label="Enter your company title" aria-describedby="companyLabel">
                                                                                                                                                                                                                                                                                                                                            </div> -->
                    <!-- End Input -->
                    <!-- </div>
                                                                                                                                                                                                                                                                                                                                <div class="col-sm-6 mb-4">
                                                                                                                                                                                                                                                                                                                                    <label id="positionLabel" class="form-label">Position</label> -->
                    <!-- Input -->
                    <!-- <div class="input-group">
                                                                                                                                                                                                                                                                                                                                        <input type="text" class="form-control" placeholder="Enter your position"
                                                                                                                                                                                                                                                                                                                                            aria-label="Enter your position" aria-describedby="positionLabel">
                                                                                                                                                                                                                                                                                                                                    </div> -->
                    <!-- End Input -->
                    <div class="mb-3 text-right">
                        <button type="button" class="btn btn-secondary btn-lg m-1 p-2" disabled href="#">
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            Cancel &nbsp;&nbsp;&nbsp;&nbsp; </button>
                        <button type="submit" class="font-weight-bold btn btn-primary rounded p-2">
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            Save Changes &nbsp;&nbsp;&nbsp;&nbsp; </button>
                    </div>
                    </form>
            </div>
        </div>
    </div>
    </div>
    </main>
    </div>
    </div>
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

    {{-- menambahkan bagian social media --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const platformButtons = document.querySelectorAll(".platform-btn");
            const socialInputs = document.getElementById("socialInputs");
            const savedSocialMedia = document.getElementById("savedSocialMedia");
            const saveButton = document.getElementById("saveSocialMedia");
            const addButton = document.getElementById("addSocialMedia");

            const platformIcons = {
                instagram: "feather-instagram text-warning",
                facebook: "feather-facebook text-primary",
                twitter: "feather-twitter text-info",
                youtube: "feather-youtube text-danger",
                github: "feather-github text-dark"
            };

            function addDeleteFunctionality(button, parentDiv) {
                button.addEventListener("click", function() {
                    parentDiv.remove();
                });
            }

            // Ketika tombol platform diklik, hanya mengganti platform yang dipilih
            platformButtons.forEach(button => {
                button.addEventListener("click", function() {
                    selectedPlatform = this.getAttribute("data-platform");
                });
            });

            // Menambahkan input baru ketika tombol "Add Social Media" ditekan
            addButton.addEventListener("click", function() {
                const inputDiv = document.createElement("div");
                inputDiv.classList.add("d-flex", "align-items-center", "mb-3", "position-relative");

                inputDiv.innerHTML = `
             <div class="d-flex flex-grow-1 align-items-center border rounded p-2 gap-3">
                 <i class="${platformIcons[selectedPlatform]} d-flex justify-content-center align-items-center"
                     style="width: 30px; height: 30px; font-size: 1.2rem; margin-left: 10px;"></i>
                 <input data-platform="${selectedPlatform}" placeholder="Enter ${selectedPlatform} username"
                     type="text" class="form-control">
             </div>
             <button class="btn btn-danger btn-sm delete-btn" style="margin-left: 10px;">
                 <i class="feather-trash"></i>
             </button>
         `;
                socialInputs.appendChild(inputDiv);

                const deleteButton = inputDiv.querySelector(".delete-btn");
                addDeleteFunctionality(deleteButton, inputDiv);
            });

            // Saat tombol Save ditekan, hanya menyimpan input yang sudah diisi
            saveButton.addEventListener("click", function() {
                const inputs = socialInputs.querySelectorAll(".d-flex");
                let hasValidInput = false; // Cek apakah ada input yang valid

                inputs.forEach(inputDiv => {
                    const input = inputDiv.querySelector("input");
                    if (input.value.trim() !== "") { // Jika input memiliki nilai
                        const platform = input.getAttribute("data-platform");
                        const icon = inputDiv.querySelector("i");

                        // Update ikon dengan platform yang sesuai
                        icon.className = platformIcons[platform];

                        const deleteButton = inputDiv.querySelector(".delete-btn");
                        addDeleteFunctionality(deleteButton, inputDiv);
                        savedSocialMedia.appendChild(inputDiv);

                        hasValidInput = true; // Ada input yang valid
                    }
                });

                // Jika ada input valid, kosongkan socialInputs
                if (hasValidInput) {
                    socialInputs.innerHTML = "";
                }
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
