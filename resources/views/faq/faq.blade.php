@extends('errors.templates')

{{-- @section('content') --}}
<div class="bg-primary pb-5 pt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-7 mx-auto my-4 text-center">
                <!-- Title -->
                <div class="mb-4">
                    <h1 class="display-4 mb-0 text-white">How can we <span class="font-weight-bold">help?</span></h1>
                </div>
                <!-- End Title -->
                <!-- Input -->
                <form class="input-group input-group-lg input-group-borderless mb-4">
                    <div class="input-group-prepend">
                        <span class="input-group-text border-0 bg-white" id="askQuestions">
                            <span class="feather-search"></span>
                        </span>
                    </div>
                    <input type="search" class="form-control border-0 shadow-none" placeholder="Ask a question"
                        aria-label="Ask a question" aria-describedby="askQuestions">
                </form>
                <!-- End Input -->
                <!-- Text/Links -->
                <p class="text-white">
                    Popular help topics:
                    <a class="text-info ml-1" href="pricing">pricing,</a>
                    <!-- <a class="text-info ml-1" href="#">upgrade,</a>
                    <a class="text-info ml-1" href="#">hosting,</a>
                    <a class="text-info ml-1" href="pricing">membership</a> -->
                </p>
                <!-- End Text/Links -->
            </div>
        </div>
    </div>
</div>
<div class="py-4">
    <div class="col-md-8 container mx-auto">
        <!-- Main Content -->
        <div class="row">
            <div class="col-md-12">
                <div id="basics">
                    <!-- Title -->
                    <div class="mb-3 mt-0">
                        <h4 class="font-weight-semi-bold">Basics</h4>
                    </div>
                    <!-- End Title -->
                    <!-- Basics Accordion -->
                    <div id="basicsAccordion">
                        <!-- Card -->
                        <div class="box mb-2 rounded border bg-white shadow-sm">
                            <div id="basicsHeadingOne">
                                <h5 class="mb-0">
                                    <button
                                        class="btn btn-block d-flex justify-content-between card-btn collapsed p-3 shadow-none"
                                        data-toggle="collapse" data-target="#basicsCollapseOne" aria-expanded="false"
                                        aria-controls="basicsCollapseOne">
                                        Is my data safe on this platform?
                                        <span class="card-btn-arrow">
                                            <span class="feather-chevron-down"></span>
                                        </span>
                                    </button>
                                </h5>
                            </div>
                            <div id="basicsCollapseOne" class="collapse" aria-labelledby="basicsHeadingOne"
                                data-parent="#basicsAccordion" style="">
                                <div class="card-body border-top text-muted p-3">
                                    Yes, we are committed to keeping your data secure. We use a variety of protection
                                    measures to ensure that your personal information and data remain safe.
                                </div>
                            </div>
                        </div>
                        <!-- End Card -->
                        <!-- Card -->
                        <div class="box mb-2 rounded border bg-white shadow-sm">
                            <div id="basicsHeadingTwo">
                                <h5 class="mb-0">
                                    <button
                                        class="btn btn-block d-flex justify-content-between card-btn collapsed p-3 shadow-none"
                                        data-toggle="collapse" data-target="#basicsCollapseTwo" aria-expanded="false"
                                        aria-controls="basicsCollapseTwo">
                                        What are the requirements for using this service?
                                        <span class="card-btn-arrow">
                                            <span class="feather-chevron-down"></span>
                                        </span>
                                    </button>
                                </h5>
                            </div>
                            <div id="basicsCollapseTwo" class="collapse" aria-labelledby="basicsHeadingTwo"
                                data-parent="#basicsAccordion">
                                <div class="card-body border-top text-muted p-3">
                                    Anda hanya memerlukan perangkat dengan koneksi internet dan akun terdaftar untuk
                                    mulai menggunakan layanan kami.
                                </div>
                            </div>
                        </div>
                        <!-- End Card -->
                        <!-- Card -->
                        <div class="box mb-2 rounded border bg-white shadow-sm">
                            <div id="basicsHeadingThree">
                                <h5 class="mb-0">
                                    <button
                                        class="btn btn-block d-flex justify-content-between card-btn collapsed p-3 shadow-none"
                                        data-toggle="collapse" data-target="#basicsCollapseThree" aria-expanded="false"
                                        aria-controls="basicsCollapseThree">
                                        How do I update my profile?
                                        <span class="card-btn-arrow">
                                            <span class="feather-chevron-down"></span>
                                        </span>
                                    </button>
                                </h5>
                            </div>
                            <div id="basicsCollapseThree" class="collapse" aria-labelledby="basicsHeadingThree"
                                data-parent="#basicsAccordion">
                                <div class="card-body border-top text-muted p-3">
                                    You can update your profile by going to edit profile, then editing information such
                                    as name, profile photo, and other details.
                                </div>
                            </div>
                        </div>
                        <!-- End Card -->
                        <!-- Card -->
                        <div class="box mb-2 rounded border bg-white shadow-sm">
                            <div id="basicsHeadingFour">
                                <h5 class="mb-0">
                                    <button
                                        class="btn btn-block d-flex justify-content-between card-btn collapsed p-3 shadow-none"
                                        data-toggle="collapse" data-target="#basicsCollapseFour" aria-expanded="false"
                                        aria-controls="basicsCollapseFour">
                                        Is this service free or paid?
                                        <span class="card-btn-arrow">
                                            <span class="feather-chevron-down"></span>
                                        </span>
                                    </button>
                                </h5>
                            </div>
                            <div id="basicsCollapseFour" class="collapse" aria-labelledby="basicsHeadingFour"
                                data-parent="#basicsAccordion">
                                <div class="card-body border-top text-muted p-3">
                                    We provide a free package with basic features, as well as paid packages with
                                    additional features for broader needs. You can choose the package that suits your
                                    needs.
                                </div>
                            </div>
                        </div>
                        <!-- End Card -->
                    </div>
                    <!-- End Basics Accordion -->
                </div>
                <div id="syncing">
                    <!-- Title -->
                    <div class="mb-3 mt-4">
                        <h4 class="font-weight-semi-bold">Jobs</h4>
                    </div>
                    <!-- End Title -->
                    <!-- job Accordion -->
                    <div id="syncingAccordion">
                        <!-- Card -->
                        <div class="box mb-2 rounded border bg-white shadow-sm">
                            <div id="syncingHeadingOne">
                                <h5 class="mb-0">
                                    <button
                                        class="btn btn-block d-flex justify-content-between card-btn p-3 shadow-none"
                                        data-toggle="collapse" data-target="#syncingCollapseOne"
                                        aria-expanded="false" aria-controls="syncingCollapseOne">
                                        How to apply for a job on this website?
                                        <span class="card-btn-arrow">
                                            <span class="feather-chevron-down"></span>
                                        </span>
                                    </button>
                                </h5>
                            </div>
                            <div id="syncingCollapseOne" class="show collapse" aria-labelledby="syncingHeadingOne"
                                data-parent="#syncingAccordion">
                                <div class="card-body border-top text-muted p-3">
                                    Click the "Jobs" tab at the top of EVOConnect, use keywords or category filters,
                                    click
                                    on a job or save it for later, and enable the "Notifications" feature to receive
                                    updates from companies.
                                </div>
                            </div>
                        </div>
                        <!-- End Card -->
                        <!-- Card -->
                        <div class="box mb-2 rounded border bg-white shadow-sm">
                            <div id="syncingHeadingTwo">
                                <h5 class="mb-0">
                                    <button
                                        class="btn btn-block d-flex justify-content-between card-btn collapsed p-3 shadow-none"
                                        data-toggle="collapse" data-target="#syncingCollapseTwo"
                                        aria-expanded="false" aria-controls="syncingCollapseTwo">
                                        How do I connect with other people on this website?
                                        <span class="card-btn-arrow">
                                            <span class="feather-chevron-down"></span>
                                        </span>
                                    </button>
                                </h5>
                            </div>
                            <div id="syncingCollapseTwo" class="collapse" aria-labelledby="syncingHeadingTwo"
                                data-parent="#syncingAccordion">
                                <div class="card-body border-top text-muted p-3">
                                    Search for the person's name you want to connect with, click "Connect," and add a
                                    short message if needed. You can also follow someone without connecting.
                                </div>
                            </div>
                        </div>
                        <!-- End Card -->
                        <!-- Card -->
                        <div class="box mb-2 rounded border bg-white shadow-sm">
                            <div id="syncingHeadingThree">
                                <h5 class="mb-0">
                                    <button
                                        class="btn btn-block d-flex justify-content-between card-btn collapsed p-3 shadow-none"
                                        data-toggle="collapse" data-target="#syncingCollapseThree"
                                        aria-expanded="false" aria-controls="syncingCollapseThree">
                                        Do I need to create an account to apply for a job?
                                        <span class="card-btn-arrow">
                                            <span class="feather-chevron-down"></span>
                                        </span>
                                    </button>
                                </h5>
                            </div>
                            <div id="syncingCollapseThree" class="collapse" aria-labelledby="syncingHeadingThree"
                                data-parent="#syncingAccordion">
                                <div class="card-body border-top text-muted p-3">
                                    Yes, to access the full features, including applying for jobs, saving openings, and
                                    getting notifications, you need to create an account and log in to the platform.
                                </div>
                            </div>
                        </div>
                        <!-- End Card -->
                    </div>
                    <!-- End Job Accordion -->

                    <!-- company Accordion -->
                    <div id="syncingAccordion">
                        <!-- Card -->
                        <div class="box mb-2 rounded border bg-white shadow-sm">
                            <div id="syncingHeadingOne">
                                <h5 class="mb-0">
                                    <button
                                        class="btn btn-block d-flex justify-content-between card-btn p-3 shadow-none"
                                        data-toggle="collapse" data-target="#syncingCollapseOne"
                                        aria-expanded="false" aria-controls="syncingCollapseOne">
                                        Is there a fee to apply for a job?
                                        <span class="card-btn-arrow">
                                            <span class="feather-chevron-down"></span>
                                        </span>
                                    </button>
                                </h5>
                            </div>
                            <div id="syncingCollapseOne" class="show collapse" aria-labelledby="syncingHeadingOne"
                                data-parent="#syncingAccordion">
                                <div class="card-body border-top text-muted p-3">
                                    No, applying for jobs on this platform is completely free. However, beware of job
                                    scams that ask for payment.
                                </div>
                            </div>
                        </div>
                        <!-- End Card -->
                        <!-- Card -->
                        <div class="box mb-2 rounded border bg-white shadow-sm">
                            <div id="syncingHeadingTwo">
                                <h5 class="mb-0">
                                    <button
                                        class="btn btn-block d-flex justify-content-between card-btn collapsed p-3 shadow-none"
                                        data-toggle="collapse" data-target="#syncingCollapseTwo"
                                        aria-expanded="false" aria-controls="syncingCollapseTwo">
                                        How do I know if I am qualified for a job?
                                        <span class="card-btn-arrow">
                                            <span class="feather-chevron-down"></span>
                                        </span>
                                    </button>
                                </h5>
                            </div>
                            <div id="syncingCollapseTwo" class="collapse" aria-labelledby="syncingHeadingTwo"
                                data-parent="#syncingAccordion">
                                <div class="card-body border-top text-muted p-3">
                                    Each job posting lists requirements, such as experience, skills,
                                    and education needed. Make sure you read the job description carefully before
                                    applying.
                                </div>
                            </div>
                        </div>
                        <!-- End Card -->
                        <!-- Card -->
                        <div class="box mb-2 rounded border bg-white shadow-sm">
                            <div id="syncingHeadingThree">
                                <h5 class="mb-0">
                                    <button
                                        class="btn btn-block d-flex justify-content-between card-btn collapsed p-3 shadow-none"
                                        data-toggle="collapse" data-target="#syncingCollapseThree"
                                        aria-expanded="false" aria-controls="syncingCollapseThree">
                                        How do I make my profile stand out to make it more attractive to recruiters?
                                        <span class="card-btn-arrow">
                                            <span class="feather-chevron-down"></span>
                                        </span>
                                    </button>
                                </h5>
                            </div>
                            <div id="syncingCollapseThree" class="collapse" aria-labelledby="syncingHeadingThree"
                                data-parent="#syncingAccordion">
                                <div class="card-body border-top text-muted p-3">
                                    Use a professional photo, write an attractive profile summary, add relevant work
                                    experience and skills.
                                </div>
                            </div>
                        </div>
                        <!-- End Card -->
                    </div>
                    <!-- End company Accordion -->
                </div>
                <div id="account">
                    <!-- Title -->
                    <div class="mb-3 mt-4">
                        <h4 class="font-weight-semi-bold">Account</h4>
                    </div>
                    <!-- End Title -->
                    <!-- Account Accordion -->
                    <div id="accountAccordion">
                        <!-- Card -->
                        <div class="box mb-2 rounded border bg-white shadow-sm">
                            <div id="accountHeadingOne">
                                <h5 class="mb-0">
                                    <button
                                        class="btn btn-block d-flex justify-content-between card-btn p-3 shadow-none"
                                        data-toggle="collapse" data-target="#accountCollapseOne"
                                        aria-expanded="false" aria-controls="accountCollapseOne">
                                        How do I change my password?
                                        <span class="card-btn-arrow">
                                            <span class="feather-chevron-down"></span>
                                        </span>
                                    </button>
                                </h5>
                            </div>
                            <div id="accountCollapseOne" class="show collapse" aria-labelledby="accountHeadingOne"
                                data-parent="#accountAccordion">
                                <div class="card-body border-top text-muted p-3">
                                    On the login page there is a text "Forgot Password". After that, the "Reset
                                    Password" page will appear with a column to enter an email. Next, the user will
                                    receive a message via email to reset the password.
                                </div>
                            </div>
                        </div>
                        <!-- End Card -->
                        <!-- Card -->
                        <div class="box mb-2 rounded border bg-white shadow-sm">
                            <div id="accountHeadingTwo">
                                <h5 class="mb-0">
                                    <button
                                        class="btn btn-block d-flex justify-content-between card-btn collapsed p-3 shadow-none"
                                        data-toggle="collapse" data-target="#accountCollapseTwo"
                                        aria-expanded="false" aria-controls="accountCollapseTwo">
                                        How to log out?
                                        <span class="card-btn-arrow">
                                            <span class="feather-chevron-down"></span>
                                        </span>
                                    </button>
                                </h5>
                            </div>
                            <div id="accountCollapseTwo" class="collapse" aria-labelledby="accountHeadingTwo"
                                data-parent="#accountAccordion">
                                <div class="card-body border-top text-muted p-3">
                                    Click "profile" then select the "logout" description, and after that you will return
                                    to the login page.
                                </div>
                            </div>
                        </div>
                        <!-- End Card -->
                        <!-- Card -->
                        <div class="box mb-2 rounded border bg-white shadow-sm">
                            <div id="accountHeadingThree">
                                <h5 class="mb-0">
                                    <button
                                        class="btn btn-block d-flex justify-content-between card-btn collapsed p-3 shadow-none"
                                        data-toggle="collapse" data-target="#accountCollapseThree"
                                        aria-expanded="false" aria-controls="accountCollapseThree">
                                        How do I change my personal data?
                                        <span class="card-btn-arrow">
                                            <span class="feather-chevron-down"></span>
                                        </span>
                                    </button>
                                </h5>
                            </div>
                            <div id="accountCollapseThree" class="collapse" aria-labelledby="accountHeadingThree"
                                data-parent="#accountAccordion">
                                <div class="card-body border-top text-muted p-3">
                                    You just need to go to the "Edit Profile" page, then update your personal data.
                                </div>
                            </div>
                        </div>
                        <!-- End Card -->
                        <!-- Card -->
                        <div class="box mb-2 rounded border bg-white shadow-sm">
                            <div id="accountHeadingFour">
                                <h5 class="mb-0">
                                    <button
                                        class="btn btn-block d-flex justify-content-between card-btn collapsed p-3 shadow-none"
                                        data-toggle="collapse" data-target="#accountCollapseFour"
                                        aria-expanded="false" aria-controls="accountCollapseFour">
                                        I forgot my password. How do I reset it?
                                        <span class="card-btn-arrow">
                                            <span class="feather-chevron-down"></span>
                                        </span>
                                    </button>
                                </h5>
                            </div>
                            <div id="accountCollapseFour" class="collapse" aria-labelledby="accountHeadingFour"
                                data-parent="#accountAccordion">
                                <div class="card-body border-top text-muted p-3">
                                    1. On the login page, click "Forgot Password" <br>
                                    2. Enter your registered email address, then click "send". <br>
                                    3. Check your email, and click "reset password" <br>
                                    4. Enter your new password, then confirm the change. <br>
                                    5. Once done, try logging in again with the new password.
                                </div>
                            </div>
                        </div>
                        <!-- End Card -->
                    </div>
                    <!-- End Account Accordion -->
                </div>
                <div id="privacy">
                    <!-- Title -->
                    <div class="mb-3 mt-4">
                        <h4 class="font-weight-semi-bold">Privacy</h4>
                    </div>
                    <!-- End Title -->
                    <!-- Privacy Accordion -->
                    <div id="privacyAccordion">
                        <!-- Card -->
                        <div class="box mb-2 rounded border bg-white shadow-sm">
                            <div id="privacyHeadingOne">
                                <h5 class="mb-0">
                                    <button
                                        class="btn btn-block d-flex justify-content-between card-btn p-3 shadow-none"
                                        data-toggle="collapse" data-target="#privacyCollapseOne"
                                        aria-expanded="false" aria-controls="privacyCollapseOne">
                                        Can I specify my own private key?
                                        <span class="card-btn-arrow">
                                            <span class="feather-chevron-down"></span>
                                        </span>
                                    </button>
                                </h5>
                            </div>
                            <div id="privacyCollapseOne" class="show collapse" aria-labelledby="privacyHeadingOne"
                                data-parent="#privacyAccordion">
                                <div class="card-body border-top text-muted p-3">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                    richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor
                                    brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt
                                    aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
                                    Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente
                                    ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer
                                    farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them
                                    accusamus labore sustainable VHS.
                                </div>
                            </div>
                        </div>
                        <!-- End Card -->
                        <!-- Card -->
                        <div class="box mb-2 rounded border bg-white shadow-sm">
                            <div id="privacyHeadingTwo">
                                <h5 class="mb-0">
                                    <button
                                        class="btn btn-block d-flex justify-content-between card-btn collapsed p-3 shadow-none"
                                        data-toggle="collapse" data-target="#privacyCollapseTwo"
                                        aria-expanded="false" aria-controls="privacyCollapseTwo">
                                        My files are missing! How do I get them back?
                                        <span class="card-btn-arrow">
                                            <span class="feather-chevron-down"></span>
                                        </span>
                                    </button>
                                </h5>
                            </div>
                            <div id="privacyCollapseTwo" class="collapse" aria-labelledby="privacyHeadingTwo"
                                data-parent="#privacyAccordion">
                                <div class="card-body border-top text-muted p-3">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                    richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor
                                    brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt
                                    aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
                                    Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente
                                    ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer
                                    farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them
                                    accusamus labore sustainable VHS.
                                </div>
                            </div>
                        </div>
                        <!-- End Card -->
                        <!-- Card -->
                        <div class="box mb-2 rounded border bg-white shadow-sm">
                            <div id="privacyHeadingThree">
                                <h5 class="mb-0">
                                    <button
                                        class="btn btn-block d-flex justify-content-between card-btn collapsed p-3 shadow-none"
                                        data-toggle="collapse" data-target="#privacyCollapseThree"
                                        aria-expanded="false" aria-controls="privacyCollapseThree">
                                        How can I access my privacy data?
                                        <span class="card-btn-arrow">
                                            <span class="feather-chevron-down"></span>
                                        </span>
                                    </button>
                                </h5>
                            </div>
                            <div id="privacyCollapseThree" class="collapse" aria-labelledby="privacyHeadingThree"
                                data-parent="#privacyAccordion">
                                <div class="card-body border-top text-muted p-3">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                    richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor
                                    brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt
                                    aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
                                    Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente
                                    ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer
                                    farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them
                                    accusamus labore sustainable VHS.
                                </div>
                            </div>
                        </div>
                        <!-- End Card -->
                        <!-- Card -->
                        <div class="box mb-2 rounded border bg-white shadow-sm">
                            <div id="privacyHeadingFour">
                                <h5 class="mb-0">
                                    <button
                                        class="btn btn-block d-flex justify-content-between card-btn collapsed p-3 shadow-none"
                                        data-toggle="collapse" data-target="#privacyCollapseFour"
                                        aria-expanded="false" aria-controls="privacyCollapseFour">
                                        How can I control if other search engines can link to my profile?
                                        <span class="card-btn-arrow">
                                            <span class="feather-chevron-down"></span>
                                        </span>
                                    </button>
                                </h5>
                            </div>
                            <div id="privacyCollapseFour" class="collapse" aria-labelledby="privacyHeadingFour"
                                data-parent="#privacyAccordion">
                                <div class="card-body border-top text-muted p-3">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                    richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor
                                    brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt
                                    aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
                                    Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente
                                    ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer
                                    farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them
                                    accusamus labore sustainable VHS.
                                </div>
                            </div>
                        </div>
                        <!-- End Card -->
                    </div>
                    <!-- End Privacy Accordion -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Bootstrap core JavaScript -->
<script src="{{ @asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ @asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- slick Slider JS-->
<script type="text/javascript" src="{{ @asset('vendor/slick/slick.min.js') }}"></script>
<!-- Custom scripts for all pages-->
<script src="js/osahan.js"></script>

@push('js')
    <script>
        $(document).ready(function() {
            // Menangani input pencarian
            $('input[type="search"]').on('input', function() {
                const searchTerm = $(this).val().trim().toLowerCase();

                // Loop melalui setiap bagian (Basics, Syncing, Account, Privacy)
                $('div[id^="basics"], div[id^="syncing"], div[id^="account"], div[id^="privacy"]').each(
                    function() {
                        const $section = $(this);
                        let hasVisibleQuestion = false;

                        // Loop melalui setiap pertanyaan dalam bagian
                        $section.find('.box').each(function() {
                            const $question = $(this);
                            const questionText = $question.find('.card-btn').text()
                                .toLowerCase();
                            const isVisible = questionText.includes(searchTerm);
                            $question.toggle(isVisible);

                            // Jika ada pertanyaan yang cocok, tandai bagian ini sebagai memiliki pertanyaan yang terlihat
                            if (isVisible) {
                                hasVisibleQuestion = true;
                            }
                        });

                        // Sembunyikan atau tampilkan judul bagian berdasarkan apakah ada pertanyaan yang cocok
                        $section.find('h4').toggle(hasVisibleQuestion);
                    });

                // Jika pencarian kosong, tampilkan semua bagian dan pertanyaan
                if (!searchTerm) {
                    $('.box').show();
                    $('h4').show();
                }
            });
        });
    </script>
@endpush
{{-- @endsection --}}
