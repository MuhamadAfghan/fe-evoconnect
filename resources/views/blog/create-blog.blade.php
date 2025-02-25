@extends('errors.templates')

@section('content')
    <style>
        .page {
            display: none;
        }

        .active-page {
            display: block;
        }
    </style>

    <div class="container">
        <!-- Page 1 -->
        <div class="page active-page" id="page1">
            <div class="d-flex justify-content-center align-items-center container" style="margin-top: 120px;">
                <div class="card p-4 shadow" style="width: 500px;">
                    <h5 class="fw-bold">Choose a name for your blog</h5>
                    <p class="text-muted mt-2">This is the title that will be displayed at the top of your Blog.</p>

                    <div class="mt-4">
                        <input type="text" class="form-control" id="titleInput" placeholder="Title" maxlength="50"
                            required>
                        <small class="text-muted text-end" id="charCount">0 / 50</small>
                    </div>

                    <hr style="margin-top: 80px;">
                    <div class="d-flex justify-content-end">
                        <a href="blog" class="btn btn-secondary btn-sm me-2" style="width: 80px;">CANCEL</a>
                        <button class="btn btn-primary btn-sm" style="width: 70px;" id="nextBtn" disabled
                            onclick="showPage(2)">NEXT</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Page 2 -->
        <div class="page" id="page2">
            <div class="d-flex justify-content-center align-items-center container" style="margin-top: 120px;">
                <div class="card p-4 shadow" style="width: 500px;">
                    <h5 class="fw-bold">Pick a Category for your blog</h5>
                    <p class="text-muted mt-2">This is the category that will be displayed on your Blog.</p>

                    <div class="mt-4">
                        <select class="form-control" id="categorySelect">
                            <option value="" disabled selected>Pick category</option>
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
                        <button class="btn btn-secondary btn-sm me-2" style="width: 80px;"
                            onclick="showPage(1)">BACK</button>
                        <button class="btn btn-primary btn-sm" style="width: 70px;" id="finishBtn" disabled
                            onclick="submitForm()">NEXT</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Menyimpan input di localStorage
        document.getElementById("titleInput").addEventListener("input", function() {
            let title = this.value;
            localStorage.setItem("blogTitle", title);
            document.getElementById("charCount").textContent = title.length + " / 50";

            // Aktifkan tombol NEXT jika input tidak kosong
            document.getElementById("nextBtn").disabled = title.trim() === "";
        });

        document.getElementById("categorySelect").addEventListener("change", function() {
            let category = this.value;
            localStorage.setItem("blogCategory", category);
            document.getElementById("finishBtn").disabled = category === "";
        });

        function showPage(pageNumber) {
            document.querySelectorAll('.page').forEach(page => page.classList.remove('active-page'));
            document.getElementById('page' + pageNumber).classList.add('active-page');
        }

        function submitForm() {
            let title = localStorage.getItem("blogTitle");
            let category = localStorage.getItem("blogCategory");
            window.location.href = `{{ route('write-blog') }}?title=${title}&category=${category}`;
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection
