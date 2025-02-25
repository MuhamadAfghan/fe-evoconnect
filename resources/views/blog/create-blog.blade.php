@extends('errors.templates')

@section('content')
    {{-- <div class="d-flex justify-content-center align-items-center container" style="margin-top: 120px;">
        <div class="card p-4 shadow" style="width: 500px;">
            <h5 class="fw-bold">Choose a name for your blog</h5>
            <p class="text-muted mt-2">This is the title that will be displayed at the top of your Blog.</p>

            <div class="mt-4">
                <input type="text" class="form-control" id="titleInput" placeholder="Title" maxlength="100" required>
                <small class="text-muted text-end" id="charCount">0 / 50</small>
            </div>

            <hr style="margin-top: 80px;">
            <div class="d-flex justify-content-end">
                <button class="btn btn-secondary btn-sm justify-content-space-between me-2"
                    style="width: 80px; margin-right: 5px;">CANCEL</button>
                <button class="btn btn-primary btn-sm px-3 py-1" style="width: 70px;">NEXT</button>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-center align-items-center" style="margin-top: 30px;">
        <small class="d-block text-muted small" style="font-size: 12px;">
            This site is protected by Google
            <a href="{{ route('privacy') }}" class="text-decoration-none">Privacy Policy</a> and
            <a href="{{ route('terms.term') }}" class="text-decoration-none">Terms of Service</a> EVOConnect.
        </small>
    </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById("titleInput").addEventListener("input", function() {
            let count = this.value.length;
            document.getElementById("charCount").textContent = count + " / 50";
        });
    </script> --}}

    {{-- bates --}}
    <style>
        .page {
            display: none;
            /* Sembunyikan semua halaman kecuali yang aktif */
        }

        .active-page {
            display: block;
        }
    </style>
    </head>

    <div class="container">
        <!-- Page 1 -->
        <div class="page active-page" id="page1">
            <div class="d-flex justify-content-center align-items-center container" style="margin-top: 120px;">
                <div class="card p-4 shadow" style="width: 500px;">
                    <h5 class="fw-bold">Choose a name for your blog</h5>
                    <p class="text-muted mt-2">This is the title that will be displayed at the top of your Blog.</p>

                    <div class="mt-4">
                        <input type="text" class="form-control" id="titleInput" placeholder="Title" maxlength="100"
                            required oninput="validateInput()">
                        <small class="text-muted text-end" id="charCount">0 / 50</small>
                    </div>

                    <hr style="margin-top: 80px;">
                    <div class="d-flex justify-content-end">
                        <a href="blog" class="btn btn-secondary btn-sm justify-content-space-between me-2"
                            style="width: 80px; margin-right: 5px;">CANCEL</a>
                        <button class="btn btn-primary btn-sm px-3 py-1" style="width: 70px;" id="nextBtn"
                            onclick="showPage(2)" disabled>NEXT</button>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-center align-items-center" style="margin-top: 30px;">
                <small class="d-block text-muted small" style="font-size: 12px;">
                    This site is protected by Google
                    <a href="{{ route('privacy') }}" class="text-decoration-none">Privacy Policy</a> and
                    <a href="{{ route('terms.term') }}" class="text-decoration-none">Terms of Service</a> EVOConnect.
                </small>
            </div>
        </div>
    </div>

    <div class="container">
        <!-- Page 2 -->
        <div class="page" id="page2">
            <div class="d-flex justify-content-center align-items-center container" style="margin-top: 120px;">
                <div class="card p-4 shadow" style="width: 500px;">
                    <h5 class="fw-bold">Choose a name for your blog</h5>
                    <p class="text-muted mt-2">This is the title that will be displayed at the top of your Blog.</p>
                    <div class="mt-4">
                        <select class="form-control" id="categorySelect">
                            <option value="" disabled selected> Pick your blog category </option>
                            <option value="Fashion">Fashion</option>
                            <option value="Beauty">Beauty</option>
                            <option value="Travel">Travel</option>
                            <option value="Lifestyle">Lifestyle</option>
                            <option value="Personal">Personal</option>
                            <option value="Technology">Technology</option>
                            <option value="Health">Health</option>
                            <option value="Fitness">Fitness</option>
                            <option value="Healthcare">Healthcare</option>
                            <option value="SaaS Services">SaaS Services</option>
                            <option value="Business">Business</option>
                            <option value="Education">Education</option>
                            <option value="Food & Recipes">Food & Recipes</option>
                            <option value="Love & Relationships">Love & Relationships</option>
                            <option value="Alternative Topics">Alternative Topics</option>
                            <option value="Eco-Friendly Living">Eco-Friendly Living</option>
                            <option value="Music">Music</option>
                            <option value="Automotive">Automotive</option>
                            <option value="Marketing">Marketing</option>
                            <option value="Internet Services">Internet Services</option>
                            <option value="Finance">Finance</option>
                            <option value="Sports">Sports</option>
                            <option value="Entertainment">Entertainment</option>
                            <option value="Productivity">Productivity</option>
                            <option value="Hobbies">Hobbies</option>
                            <option value="Parenting">Parenting</option>
                            <option value="Pets">Pets</option>
                            <option value="Photography">Photography</option>
                            <option value="Farming">Farming</option>
                            <option value="Art">Art</option>
                            <option value="Homemade">Homemade</option>
                            <option value="Science">Science</option>
                            <option value="Games">Games</option>
                            <option value="History">History</option>
                            <option value="Self-Development">Self-Development</option>
                            <option value="News & Current Affairs">News & Current Affairs</option>
                        </select>
                    </div>

                    <hr style="margin-top: 80px;">
                    <div class="d-flex justify-content-end">
                        <button href="blog" class="btn btn-secondary btn-sm justify-content-space-between me-2"
                            style="width: 80px; margin-right: 5px;" onclick="showPage(1)">CANCEL</button>
                        <button class="btn btn-primary btn-sm px-3 py-1" style="width: 70px;" id="nextBtn"
                            onclick="showPage(3)" disabled>NEXT</button>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-center align-items-center" style="margin-top: 30px;">
                <small class="d-block text-muted small" style="font-size: 12px;">
                    This site is protected by Google
                    <a href="{{ route('privacy') }}" class="text-decoration-none">Privacy Policy</a> and
                    <a href="{{ route('terms.term') }}" class="text-decoration-none">Terms of Service</a> EVOConnect.
                </small>
            </div>
        </div>
    </div>

    <div class="container">
        <!-- Page 3 -->
        <div class="page" id="page3">
            <div class="d-flex justify-content-center align-items-center container" style="margin-top: 120px;">
                <div class="card p-4 shadow" style="width: 500px;">
                    <h5 class="fw-bold">Choose a name for your blog</h5>
                    <p class="text-muted mt-2">This is the title that will be displayed at the top of your Blog.</p>

                    <div class="mt-4">
                        <input type="text" class="form-control" id="titleInput" placeholder="Title" maxlength="100"
                            required oninput="validateInput()">
                        <small class="text-muted text-end" id="charCount">0 / 50</small>
                    </div>

                    <hr style="margin-top: 80px;">
                    <div class="d-flex justify-content-end">
                        <button href="blog" class="btn btn-secondary btn-sm justify-content-space-between me-2"
                            style="width: 80px; margin-right: 5px;" onclick="showPage(2)">CANCEL</button>
                        <a href="" class="btn btn-primary btn-sm px-3 py-1" style="width: 70px;" id="nextBtn"
                            onclick="showPage(4)" disabled>NEXT</button>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-center align-items-center" style="margin-top: 30px;">
                <small class="d-block text-muted small" style="font-size: 12px;">
                    This site is protected by Google
                    <a href="{{ route('privacy') }}" class="text-decoration-none">Privacy Policy</a> and
                    <a href="{{ route('terms.term') }}" class="text-decoration-none">Terms of Service</a> EVOConnect.
                </small>
            </div>
        </div>
    </div>




    <script>
        // page halaman
        function showPage(pageNumber) {
            // Sembunyikan semua halaman
            document.querySelectorAll('.page').forEach(page => {
                page.classList.remove('active-page');
            });

            // Tampilkan halaman yang sesuai
            document.getElementById('page' + pageNumber).classList.add('active-page');
        }

        // required
        function validateInput() {
            let inputField = document.getElementById("titleInput");
            let nextButton = document.getElementById("nextBtn");

            // Cek apakah input sudah diisi
            if (inputField.value.trim() !== "") {
                nextButton.removeAttribute("disabled"); // Aktifkan tombol NEXT
            } else {
                nextButton.setAttribute("disabled", "true"); // Nonaktifkan tombol NEXT
            }
        }

        // input
        document.getElementById("titleInput").addEventListener("input", function() {
            let count = this.value.length;
            document.getElementById("charCount").textContent = count + " / 50";
        });
    </script>
    {{-- css bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection
