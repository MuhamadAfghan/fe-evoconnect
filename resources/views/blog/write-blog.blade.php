@extends('errors.templates')

@push('css')
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
@endpush

@section('content')
    <style>
        .trix-editor {
            height: auto;
            font-size: 1rem;
            line-height: 1.5;
        }

        .trix-button--icon-attach {
            display: none;
        }
    </style>

    <!-- Input Hidden buat Title & Category -->
    <input id="titleInput" type="hidden" name="title" value="{{ $title ?? '' }}">
    <input id="categoryInput" type="hidden" name="category" value="{{ $category ?? '' }}">
    <input id="article_content" type="hidden" name="content" required>

    <!-- Button Upload Gambar -->
    <trix-editor input="article_content" placeholder="Start typing and let the ideas flow...">
        <img id="preview" src="" alt="Preview" style="display: none; max-width: 200px; margin-top: 10px;">
    </trix-editor>
    <div class="d-flex justify-content-between align-items-center mb-5 mt-4">
        <!-- Tombol Upload Gambar (Kiri) -->
        <div>
            <input type="file" id="imageUpload" accept="image/*" style="display: none;">
            <button id="uploadImageBtn" class="btn btn-outline-primary">
                <i class="bi bi-file-earmark-image"></i>
            </button>
            <img id="preview" src="" alt="Preview" style="display: none; max-width: 200px; margin-top: 10px;">
        </div>
        <!-- Tombol Publish (Kanan) -->
        <div>
            <button id="publish-btn" class="btn btn-success disabled w-40">Publish</button>
        </div>
    </div>

    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
@endsection

@push('js')
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const formData = new FormData();
            const imageUpload = document.getElementById("imageUpload");
            const uploadImageBtn = document.getElementById("uploadImageBtn");
            const publishBtn = document.getElementById("publish-btn");
            const trixEditor = document.querySelector("trix-editor");
            const articleContent = document.getElementById("article_content");
            let uploadedImage = null;

            uploadImageBtn.addEventListener("click", function() {
                imageUpload.click();
            });


            imageUpload.addEventListener("change", function(event) {
                const file = event.target.files[0];
                const allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'];

                if (file) {
                    // Validate file type
                    if (!allowedTypes.includes(file.type)) {
                        alert('Please upload only jpeg, png, jpg, or gif files.');
                        this.value = ''; // Clear the input
                        return;
                    }

                    // Validate file size (max 2MB)
                    if (file.size > 2 * 1024 * 1024) {
                        alert('File size should not exceed 2MB.');
                        this.value = '';
                        return;
                    }

                    uploadedImage = file;
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const editor = document.querySelector("trix-editor");
                        const imagePreview = document.getElementById("preview");
                        imagePreview.src = e.target.result;
                        imagePreview.style.display = "block";
                    };
                    reader.readAsDataURL(file);
                }
            });

            // Event listener untuk memantau perubahan dalam Trix Editor
            trixEditor.addEventListener("trix-change", function() {
                checkContent();
            });

            function checkContent() {
                const content = articleContent.value.trim();
                if (content.length > 0) {
                    publishBtn.classList.remove("disabled");
                } else {
                    publishBtn.classList.add("disabled");
                }
            }

            const urlParams = new URLSearchParams(window.location.search);
            const titleInput = urlParams.get("title");
            const categoryInput = urlParams.get("category");

            publishBtn.addEventListener("click", function() {
                if (!uploadedImage) {
                    alert('Please upload an image for your blog post.');
                    return;
                }

                const title = titleInput;
                const category = categoryInput;
                const content = articleContent.value;

                // Validate required fields
                if (!title || !category || !content.trim()) {
                    alert('Please fill in all required fields.');
                    return;
                }

                const formData = new FormData();
                formData.append("title", title);
                formData.append("category", category);
                formData.append("content", content);
                formData.append("image", uploadedImage);

                // Add loading state to button
                publishBtn.disabled = true;
                publishBtn.innerHTML =
                    '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Publishing...';

                axios.post("{{ route('blogs.store') }}", formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data',
                        'Accept': 'application/json',
                    }
                }).then(function(response) {
                    let blog_slug = response.data.data.slug;
                    window.location.href = `/blogs/${blog_slug}`;
                    // window.location.href = response.data.redirect;
                }).catch(function(error) {
                    console.log(error);

                    console.error('Error:', error.response?.data);
                    let errorMessage = 'An error occurred while publishing the blog.';

                    if (error.response?.data?.errors?.image) {
                        errorMessage = error.response.data.errors.image[0];
                    } else if (error.response?.data?.message) {
                        errorMessage = error.response.data.message;
                    }

                    alert(errorMessage);
                    publishBtn.disabled = false;
                    publishBtn.innerHTML = 'Publish';
                });
            });
        });
    </script>
@endpush
