{{-- halaman edit profile --}}
@extends('layouts.templates')

@section('content')
    <div class="py-4">
        <div class="container">
            <div class="row">
                <!-- Main Content -->
                <aside class="col-md-4">
                    <div class="profile-box mb-3 w-10 rounded border bg-white text-center">
                        <div class="d-flex align-items-center p-4">
                            <img src="{{ auth()->user()->getProfileImage() }}" class="img-fluid rounded-circle"
                                alt="Responsive image">
                            <div class="p-4">
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

                                <!-- Form untuk menghapus foto profil -->
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
                    <div class="mb-3 rounded border bg-white">
                        <div class="box-title border-bottom p-3">
                            <h6 class="m-0">About</h6>
                            <p class="small mb-0 mt-0">Tell about yourself in two sentences.
                            </p>
                        </div>
                        <div class="box-body">
                            <div class="border-bottom p-3">
                                <div class="form-group mb-4">
                                    <label class="mb-1">BIO</label>
                                    <div class="position-relative">
                                        <textarea class="form-control" rows="4" name="text" placeholder="Enter Bio"></textarea>
                                    </div>
                                </div>
                                <div class="form-group mb-0">
                                    <label class="w-100 mb-1">SKILLS</label>
                                    <div class="custom-control custom-checkbox d-inline mr-3">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">JavaScript, jQuery</label>
                                    </div>
                                    <div class="custom-control custom-checkbox d-inline">
                                        <input type="checkbox" class="custom-control-input" id="customCheck2">
                                        <label class="custom-control-label" for="customCheck2">HTML5, CSS3</label>
                                    </div>
                                </div>
                            </div>
                            <div class="overflow-hidden p-3 text-center">
                                <a class="font-weight-bold btn btn-light d-block rounded p-3" href="#"> SAVE </a>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 rounded border bg-white">
                        <div class="box-title border-bottom p-3">
                            <h6 class="m-0">Social profiles</h6>
                            <p class="small mb-0 mt-0">Add elsewhere links to your profile.
                            </p>
                        </div>
                        <div class="box-body">
                            <div class="border-bottom p-3">
                                <div class="position-relative icon-form-control mb-2">
                                    <i class="feather-instagram position-absolute text-warning"></i>
                                    <input placeholder="Add Instagram link" type="text" class="form-control">
                                </div>
                                <div class="position-relative icon-form-control mb-2">
                                    <i class="feather-facebook position-absolute text-primary"></i>
                                    <input placeholder="Add Facebook link" type="text" class="form-control">
                                </div>
                                <div class="position-relative icon-form-control mb-2">
                                    <i class="feather-twitter position-absolute text-info"></i>
                                    <input placeholder="Add Twitter link" type="text" class="form-control">
                                </div>
                                <div class="position-relative icon-form-control mb-2">
                                    <i class="feather-youtube position-absolute text-danger"></i>
                                    <input placeholder="Add Youtube link" type="text" class="form-control">
                                </div>
                                <div class="position-relative icon-form-control mb-0">
                                    <i class="feather-github position-absolute text-dark"></i>
                                    <input placeholder="Add Github link" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="overflow-hidden p-3 text-center">
                                <a class="font-weight-bold btn btn-light d-block rounded p-3" href="#"> Update Social
                                    Profiles </a>
                            </div>
                        </div>
                    </div>
                </aside>
                <main class="col-md-8">
                    <div class="mb-3 rounded border bg-white">
                        <div class="box-title border-bottom p-3">
                            <h6 class="m-0">Edit Basic Info</h6>
                            <p class="small mb-0 mt-0">Lorem ipsum dolor sit amet, consecteturs.
                            </p>
                        </div>
                        <div class="box-body p-3">
                            <form class="js-validate" novalidate="novalidate">
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
                                                    data-msg="Please enter your username." data-error-class="u-has-error"
                                                    data-success-class="u-has-success">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Input -->
                                </div>
                                <label class="form-label">
                                    Birth date
                                    <span class="text-danger">*</span>
                                </label>
                                <!-- Input -->
                                <div class="row col">
                                    <!-- Input -->
                                    <label for="birthdate"></label>
                                    <input type="date" id="birthdate" name="birthdate">
                                    <!-- End Input -->
                                    <!-- Input -->
                                    <div class="col-sm-4 col-md-2 mb-2">
                                        <div class="js-form-message">
                                            <div class="form-group">
                                                <select class="form-control custom-select" required=""
                                                    data-msg="Please select your gender." data-error-class="u-has-error"
                                                    data-success-class="u-has-success">
                                                    <option value="genderSelect1" selected="">Male</option>
                                                    <option value="genderSelect2">Female</option>
                                                    <option value="genderSelect3">Other</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Input -->
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
                                                    value="Ludhiana, Punjab" placeholder="Enter your location"
                                                    aria-label="Enter your location" required=""
                                                    aria-describedby="locationLabel"
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
                                                    value="Askbootsrap Ltd." placeholder="Enter your organization name"
                                                    aria-label="Enter your organization name" required=""
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
                                                    required="" aria-describedby="websiteLabel"
                                                    data-msg="Password enter a valid website"
                                                    data-error-class="u-has-error" data-success-class="u-has-success">
                                                <small class="form-text text-muted">Your home page, blog or company site,
                                                    e.g. http://example.com</small>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Input -->
                                </div>
                                <div class="row">
                                    <!-- Input -->
                                    <div class="col-sm-6 mb-2">
                                        <div class="js-form-message">
                                            <label id="phoneNumberLabel" class="form-label">
                                                Phone number
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="form-group">
                                                <input class="form-control" type="tel" name="phoneNumber"
                                                    placeholder="Enter your phone number"
                                                    aria-label="Enter your phone number" required=""
                                                    aria-describedby="phoneNumberLabel"
                                                    data-msg="Please enter a valid phone number"
                                                    data-error-class="u-has-error" data-success-class="u-has-success">
                                            </div>
                                        </div>
                                        <a class="d-inline-block u-text-muted" href="#">
                                            <span class="mr-1">+</span>
                                            Add phone number
                                        </a>
                                    </div>
                                    <!-- End Input -->
                                    <!-- Input -->
                                    <div class="col-sm-6 mb-2">
                                        <div class="js-form-message">
                                            <label class="form-label">
                                                Preferred language
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="form-group">
                                                <select class="custom-select">
                                                    <option value="">Select language</option>
                                                    <option value="languageSelect1">English</option>
                                                    <option value="languageSelect2">Français</option>
                                                    <option value="languageSelect3">Deutsch</option>
                                                    <option value="languageSelect4">Português</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Input -->
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="mb-3 rounded border bg-white">
                        <div class="box-title border-bottom p-3">
                            <h6 class="m-0">Experience
                            </h6>
                            <p class="small mb-0 mt-0">Tell about your work, job, and other experiences.
                            </p>
                        </div>
                        <div class="box-body px-3 pb-0 pt-3">
                            <div class="row">
                                <div class="col-sm-6 mb-4">
                                    <label id="FROM" class="form-label">FROM</label>
                                    <!-- Input -->
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="From" aria-label="FROM"
                                            aria-describedby="FROM">
                                    </div>
                                    <!-- End Input -->
                                </div>
                                <div class="col-sm-6 mb-4">
                                    <label id="TO" class="form-label">TO</label>
                                    <!-- Input -->
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="TO" aria-label="TO"
                                            aria-describedby="TO">
                                    </div>
                                    <!-- End Input -->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 mb-4">
                                    <label id="companyLabel" class="form-label">Company</label>
                                    <!-- Input -->
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Enter your company title"
                                            aria-label="Enter your company title" aria-describedby="companyLabel">
                                    </div>
                                    <!-- End Input -->
                                </div>
                                <div class="col-sm-6 mb-4">
                                    <label id="positionLabel" class="form-label">Position</label>
                                    <!-- Input -->
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Enter your position"
                                            aria-label="Enter your position" aria-describedby="positionLabel">
                                    </div>
                                    <!-- End Input -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('profile.update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3 text-right">
                            <a class="font-weight-bold btn btn-link rounded p-3" href="#"> &nbsp;&nbsp;&nbsp;&nbsp;
                                Cancel &nbsp;&nbsp;&nbsp;&nbsp; </a>
                            <button type="submit" class="font-weight-bold btn btn-primary rounded p-3">
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                Save Changes &nbsp;&nbsp;&nbsp;&nbsp; </button>
                        </div>
                    </form>
                </main>
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
