@extends('layouts.templates')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>All Posts</title>
        <!-- Sesuaikan dengan CSS yang sudah ada di aplikasi Anda -->
        <link rel="stylesheet" href="/css/app.css">
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <style>
            .main-container {
                display: grid;
                grid-template-columns: 300px 1fr;
                /* 300px untuk sidebar, 1fr untuk konten utama */
                gap: 20px;
                padding: 20px;
            }

            .profile-sidebar {
                position: sticky;
                top: 20px;
                height: fit-content;
            }

            .posts-container {
                max-width: 800px;
                /* Sesuaikan dengan lebar yang diinginkan */
                margin: 0 auto;
                /* Pusatkan konten */
            }

            /* Sesuaikan dengan CSS yang sudah ada di aplikasi Anda */
            .post-grid {
                display: grid;
                grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
                gap: 20px;
                margin-top: 20px;
            }

            .post-card {
                border: 1px solid #ddd;
                border-radius: 12px;
                padding: 20px;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
                transition: all 0.3s ease;
                background-color: #fff;
            }

            .post-card:hover {
                transform: translateY(-8px);
                box-shadow: 0 8px 24px rgba(0, 123, 255, 0.15);
            }

            .post-card h3 {
                color: #333;
                margin-top: 0;
                font-size: 1.2rem;
                line-height: 1.4;
            }

            .post-card p.text-primary {
                font-weight: 600;
                margin: 10px 0 5px;
            }

            .post-image {
                width: 100%;
                border-radius: 8px;
                margin: 15px 0;
                max-height: 200px;
                object-fit: cover;
                box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            }

            .view-post-btn {
                display: block;
                margin-top: 15px;
                text-align: center;
                padding: 10px;
                background-color: #007bff;
                color: white;
                border-radius: 8px;
                text-decoration: none;
                font-weight: 500;
                transition: all 0.2s ease;
                box-shadow: 0 2px 5px rgba(0, 123, 255, 0.3);
            }

            .view-post-btn:hover {
                background-color: #0069d9;
                box-shadow: 0 4px 8px rgba(0, 123, 255, 0.4);
                transform: translateY(-2px);
            }

            .pagination {
                display: flex;
                justify-content: center;
                margin: 30px 0;
                gap: 10px;
                flex-wrap: wrap;
            }

            .pagination-btn {
                padding: 8px 16px;
                border: 1px solid #007bff;
                border-radius: 8px;
                cursor: pointer;
                background-color: white;
                color: #007bff;
                font-weight: 500;
                transition: all 0.2s ease;
            }

            .pagination-btn:hover:not(.disabled):not(.active) {
                background-color: #f0f7ff;
                box-shadow: 0 2px 5px rgba(0, 123, 255, 0.2);
            }

            .pagination-btn.active {
                background-color: #007bff;
                color: white;
                box-shadow: 0 2px 5px rgba(0, 123, 255, 0.3);
            }

            .pagination-btn.disabled {
                border-color: #ccc;
                color: #ccc;
                cursor: not-allowed;
            }

            .pagination-ellipsis {
                padding: 8px 5px;
                color: #6c757d;
            }

            .filters {
                display: flex;
                gap: 15px;
                margin-bottom: 20px;
                flex-wrap: wrap;
                align-items: center;
                background-color: #f8f9fa;
                padding: 15px;
                border-radius: 10px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
            }

            .filter-input {
                padding: 10px 15px;
                border: 1px solid #ddd;
                border-radius: 8px;
                font-size: 0.95rem;
                transition: all 0.2s ease;
                flex-grow: 1;
            }

            .filter-input:focus {
                border-color: #007bff;
                box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.2);
                outline: none;
            }

            .filter-btn {
                padding: 10px 20px;
                background-color: #007bff;
                color: white;
                border: none;
                border-radius: 8px;
                cursor: pointer;
                font-weight: 500;
                transition: all 0.2s ease;
                box-shadow: 0 2px 5px rgba(0, 123, 255, 0.3);
            }

            .filter-btn:hover {
                background-color: #0069d9;
                box-shadow: 0 4px 8px rgba(0, 123, 255, 0.4);
            }

            .no-posts {
                text-align: center;
                color: #6c757d;
                margin-top: 50px;
                grid-column: 1 / -1;
                font-size: 1.1rem;
                background-color: #f8f9fa;
                padding: 30px;
                border-radius: 10px;
                box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.05);
            }

            /* Style untuk Tabs */
            .tabs-container {
                margin-bottom: 30px;
                position: relative;
            }

            .tabs-container::after {
                content: '';
                position: absolute;
                bottom: 0;
                left: 0;
                right: 0;
                height: 1px;
                background-color: #e9ecef;
            }

            .tabs {
                display: flex;
                list-style: none;
                margin: 0;
                padding: 0;
                position: relative;
                z-index: 1;
            }

            .tab-item {
                padding: 12px 25px;
                cursor: pointer;
                margin-right: 8px;
                border-radius: 10px 10px 0 0;
                font-weight: 600;
                font-size: 1rem;
                transition: all 0.3s ease;
                position: relative;
                overflow: hidden;
                color: #495057;
            }

            .tab-item.active {
                background-color: #007bff;
                color: white;
                box-shadow: 0 -2px 10px rgba(0, 123, 255, 0.2);
            }

            .tab-item.active::after {
                content: '';
                position: absolute;
                bottom: 0;
                left: 0;
                width: 100%;
                height: 3px;
                background-color: #0056b3;
            }

            .tab-item:not(.active) {
                background-color: #f8f9fa;
                border: 1px solid #ddd;
                border-bottom: none;
            }

            .tab-item:hover:not(.active) {
                background-color: #e9ecef;
                color: #007bff;
            }

            .tab-item:active {
                transform: translateY(1px);
            }

            .tab-content {
                display: none;
                padding-top: 20px;
                animation: fadeIn 0.3s ease-in-out;
            }

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

            .tab-content.active {
                display: block;
            }

            .loading-spinner {
                display: flex;
                justify-content: center;
                align-items: center;
                padding: 40px 0;
            }

            .loading-spinner::after {
                content: "";
                width: 40px;
                height: 40px;
                border: 5px solid #f3f3f3;
                border-top: 5px solid #007bff;
                border-radius: 50%;
                animation: spin 1s linear infinite;
            }

            @keyframes spin {
                0% {
                    transform: rotate(0deg);
                }

                100% {
                    transform: rotate(360deg);
                }
            }

            .page-title-container {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 20px;
                padding-bottom: 15px;
                border-bottom: 2px solid #f0f0f0;
            }

            .page-title {
                font-size: 28px;
                color: #333;
                margin: 0;
                position: relative;
                padding-bottom: 5px;
            }

            .page-title::after {
                content: '';
                position: absolute;
                bottom: -2px;
                left: 0;
                width: 60px;
                height: 3px;
                background-color: #007bff;
                border-radius: 3px;
            }

            .back-btn {
                padding: 8px 16px;
                background-color: #f8f9fa;
                color: #495057;
                border: 1px solid #ddd;
                border-radius: 8px;
                text-decoration: none;
                font-weight: 500;
                transition: all 0.2s ease;
                display: flex;
                align-items: center;
                gap: 5px;
            }

            .back-btn:hover {
                background-color: #e9ecef;
                color: #007bff;
                border-color: #007bff;
            }

            .back-btn i {
                font-size: 14px;
            }
        </style>
    </head>

    <body>
        <div class="main-container">
            <!-- Profile Sidebar -->
            <aside class="profile-sidebar">
                <div class="box profile-box mb-3 rounded border bg-white text-center shadow-sm">
                    <div class="border-bottom px-3 py-4">
                        <img src="{{ isset($user) ? $user->getProfileImage() : auth()->user()->getProfileImage() }}"
                            class="rounded-circle border shadow-sm" style="width: 100px; height: 100px; object-fit: cover;"
                            alt="Profile Image">
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
                                <div class="d-flex align-items-center justify-content-between" style="font-size: 0.9rem;">
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
            </aside>

            <!-- Posts Container -->
            <div class="posts-container">
                <div class="page-title-container">
                    <h1 class="page-title">All Posts</h1>
                    <a href="/" class="back-btn"><i class="fa-solid fa-arrow-left"></i> Back to Home</a>
                </div>

                <!-- Tabs Container -->
                <div class="tabs-container">
                    <ul class="tabs">
                        <li class="tab-item active" data-tab="all">All</li>
                        <li class="tab-item" data-tab="update">Update</li>
                        <li class="tab-item" data-tab="article">Article</li>
                    </ul>
                </div>

                <!-- All Posts Tab Content -->
                <div id="all-tab" class="tab-content active">
                    <div class="filters">
                        <input type="text" id="search-input" class="filter-input" placeholder="Search by content...">
                        <select id="sort-select" class="filter-input">
                            <option value="newest">Newest First</option>
                            <option value="oldest">Oldest First</option>
                        </select>
                        <button id="apply-filters" class="filter-btn">Apply Filters</button>
                    </div>

                    <div id="loading-text" class="loading-spinner"></div>
                    <div id="all-posts-container" class="post-grid"></div>

                    <div class="pagination" id="pagination-container"></div>
                </div>

                <!-- Update Tab Content -->
                <div id="update-tab" class="tab-content">
                    <div class="filters">
                        <input type="text" id="update-search-input" class="filter-input" placeholder="Search updates...">
                        <select id="update-sort-select" class="filter-input">
                            <option value="newest">Newest First</option>
                            <option value="oldest">Oldest First</option>
                        </select>
                        <button id="apply-update-filters" class="filter-btn">Apply Filters</button>
                    </div>
                    <div id="update-loading-text" class="loading-spinner"></div>
                    <div id="update-posts-container" class="post-grid"></div>
                    <div class="pagination" id="update-pagination-container"></div>
                </div>

                <!-- Article Tab Content -->
                <div id="article-tab" class="tab-content">
                    <div class="filters">
                        <input type="text" id="article-search-input" class="filter-input"
                            placeholder="Search articles...">
                        <select id="article-sort-select" class="filter-input">
                            <option value="newest">Newest First</option>
                            <option value="oldest">Oldest First</option>
                        </select>
                        <button id="apply-article-filters" class="filter-btn">Apply Filters</button>
                    </div>
                    <div id="article-loading-text" class="loading-spinner"></div>
                    <div id="article-posts-container" class="post-grid"></div>
                    <div class="pagination" id="article-pagination-container"></div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                // Tab functionality
                const tabs = document.querySelectorAll('.tab-item');
                const tabContents = document.querySelectorAll('.tab-content');

                tabs.forEach(tab => {
                    tab.addEventListener('click', () => {
                        const targetTab = tab.getAttribute('data-tab');

                        // Remove active class from all tabs and contents
                        tabs.forEach(t => t.classList.remove('active'));
                        tabContents.forEach(c => c.classList.remove('active'));

                        // Add active class to clicked tab and corresponding content
                        tab.classList.add('active');
                        document.getElementById(`${targetTab}-tab`).classList.add('active');

                        // Load content based on tab if not already loaded
                        if (targetTab === 'update' && !updateLoaded) {
                            currentUpdatePage = 1;
                            fetchUpdatePosts();
                            updateLoaded = true;
                        } else if (targetTab === 'article' && !articleLoaded) {
                            currentArticlePage = 1;
                            fetchArticlePosts();
                            articleLoaded = true;
                        } else if (targetTab === 'all' && !allLoaded) {
                            currentPage = 1;
                            fetchAllPosts();
                            allLoaded = true;
                        }
                    });
                });

                // All Posts Tab Variables
                const postsContainer = document.getElementById("all-posts-container");
                const loadingText = document.getElementById("loading-text");
                const paginationContainer = document.getElementById("pagination-container");
                const searchInput = document.getElementById("search-input");
                const sortSelect = document.getElementById("sort-select");
                const applyFiltersBtn = document.getElementById("apply-filters");

                // Update Tab Variables
                const updatePostsContainer = document.getElementById("update-posts-container");
                const updateLoadingText = document.getElementById("update-loading-text");
                const updatePaginationContainer = document.getElementById("update-pagination-container");
                const updateSearchInput = document.getElementById("update-search-input");
                const updateSortSelect = document.getElementById("update-sort-select");
                const applyUpdateFiltersBtn = document.getElementById("apply-update-filters");

                // Article Tab Variables
                const articlePostsContainer = document.getElementById("article-posts-container");
                const articleLoadingText = document.getElementById("article-loading-text");
                const articlePaginationContainer = document.getElementById("article-pagination-container");
                const articleSearchInput = document.getElementById("article-search-input");
                const articleSortSelect = document.getElementById("article-sort-select");
                const applyArticleFiltersBtn = document.getElementById("apply-article-filters");

                // Track which tabs have been loaded
                let allLoaded = false;
                let updateLoaded = false;
                let articleLoaded = false;

                let currentPage = 1;
                let currentUpdatePage = 1;
                let currentArticlePage = 1;
                let searchQuery = "";
                let updateSearchQuery = "";
                let articleSearchQuery = "";
                let sortOrder = "newest";
                let updateSortOrder = "newest";
                let articleSortOrder = "newest";

                // Initial load for All Posts tab
                fetchAllPosts();
                allLoaded = true;

                // Apply filters for All Posts tab
                applyFiltersBtn.addEventListener("click", function() {
                    searchQuery = searchInput.value;
                    sortOrder = sortSelect.value;
                    currentPage = 1;
                    fetchAllPosts();
                });

                // Apply filters for Update tab
                applyUpdateFiltersBtn.addEventListener("click", function() {
                    updateSearchQuery = updateSearchInput.value;
                    updateSortOrder = updateSortSelect.value;
                    currentUpdatePage = 1;
                    fetchUpdatePosts();
                });

                // Apply filters for Article tab
                applyArticleFiltersBtn.addEventListener("click", function() {
                    articleSearchQuery = articleSearchInput.value;
                    articleSortOrder = articleSortSelect.value;
                    currentArticlePage = 1;
                    fetchArticlePosts();
                });

                // Enter key for search inputs
                searchInput.addEventListener("keypress", function(event) {
                    if (event.key === "Enter") {
                        applyFiltersBtn.click();
                    }
                });

                updateSearchInput.addEventListener("keypress", function(event) {
                    if (event.key === "Enter") {
                        applyUpdateFiltersBtn.click();
                    }
                });

                articleSearchInput.addEventListener("keypress", function(event) {
                    if (event.key === "Enter") {
                        applyArticleFiltersBtn.click();
                    }
                });

                // Function to fetch all posts
                function fetchAllPosts() {
                    loadingText.style.display = "block";
                    postsContainer.innerHTML = "";

                    // Build the query URL with filters
                    let url = `/api/posts/all?page=${currentPage}`;
                    if (searchQuery) {
                        url += `&search=${encodeURIComponent(searchQuery)}`;
                    }
                    url += `&sort=${sortOrder}`;

                    axios.get(url)
                        .then(response => {
                            loadingText.style.display = "none";
                            const data = response.data.data;

                            if (!data.data || data.data.length === 0) {
                                postsContainer.innerHTML = `<div class="no-posts">No posts found</div>`;
                                paginationContainer.innerHTML = "";
                                return;
                            }

                            renderPosts(data.data, postsContainer);
                            renderPagination(data, paginationContainer, 'all');
                        })
                        .catch(error => {
                            console.error("Error fetching posts:", error);
                            loadingText.style.display = "none";
                            postsContainer.innerHTML =
                                `<div class="no-posts">Error loading posts. Please try again later.</div>`;
                        });
                }

                // Function to fetch update posts
                function fetchUpdatePosts() {
                    updateLoadingText.style.display = "block";
                    updatePostsContainer.innerHTML = "";

                    // Here you would add the specific type parameter for updates
                    let url = `/api/posts/all?page=${currentUpdatePage}&type=update`;
                    if (updateSearchQuery) {
                        url += `&search=${encodeURIComponent(updateSearchQuery)}`;
                    }
                    url += `&sort=${updateSortOrder}`;

                    axios.get(url)
                        .then(response => {
                            updateLoadingText.style.display = "none";
                            const data = response.data.data;

                            if (!data.data || data.data.length === 0) {
                                updatePostsContainer.innerHTML = `<div class="no-posts">No updates found</div>`;
                                updatePaginationContainer.innerHTML = "";
                                return;
                            }

                            renderPosts(data.data, updatePostsContainer);
                            renderPagination(data, updatePaginationContainer, 'update');
                        })
                        .catch(error => {
                            console.error("Error fetching updates:", error);
                            updateLoadingText.style.display = "none";
                            updatePostsContainer.innerHTML =
                                `<div class="no-posts">Error loading updates. Please try again later.</div>`;
                        });
                }

                // Function to fetch article posts
                function fetchArticlePosts() {
                    articleLoadingText.style.display = "block";
                    articlePostsContainer.innerHTML = "";

                    // Here you would add the specific type parameter for articles
                    let url = `/api/posts/all?page=${currentArticlePage}&type=article`;
                    if (articleSearchQuery) {
                        url += `&search=${encodeURIComponent(articleSearchQuery)}`;
                    }
                    url += `&sort=${articleSortOrder}`;

                    axios.get(url)
                        .then(response => {
                            articleLoadingText.style.display = "none";
                            const data = response.data.data;

                            if (!data.data || data.data.length === 0) {
                                articlePostsContainer.innerHTML = `<div class="no-posts">No articles found</div>`;
                                articlePaginationContainer.innerHTML = "";
                                return;
                            }

                            renderPosts(data.data, articlePostsContainer);
                            renderPagination(data, articlePaginationContainer, 'article');
                        })
                        .catch(error => {
                            console.error("Error fetching articles:", error);
                            articleLoadingText.style.display = "none";
                            articlePostsContainer.innerHTML =
                                `<div class="no-posts">Error loading articles. Please try again later.</div>`;
                        });
                }

                // Generic function to render posts to a container
                function renderPosts(posts, container) {
                    container.innerHTML = posts.map(post => {
                        const image = post.image ?
                            `<img class="post-image" src="${post.image}" alt="Post Image">` : "";
                        const formattedDate = new Date(post.created_at).toLocaleDateString("en-GB", {
                            day: "numeric",
                            month: "short",
                            year: "numeric"
                        });

                        return `
                        <div class="post-card">
                            <h3>${post.content}</h3>
                            <p class="text-primary">${post.user.name}</p>
                            <small><i class="feather-clock"></i> Posted on ${formattedDate}</small>
                            ${image}
                            <a href="/posts/${post.id}" class="view-post-btn">View Full Post</a>
                        </div>
                    `;
                    }).join("");
                }

                // Generic function to render pagination
                function renderPagination(data, container, tabType) {
                    const totalPages = data.last_page;
                    let currentPageVar = (tabType === 'update') ? currentUpdatePage :
                        (tabType === 'article') ? currentArticlePage : currentPage;

                    if (totalPages <= 1) {
                        container.innerHTML = "";
                        return;
                    }

                    let paginationHTML = "";

                    // Previous button
                    paginationHTML += `
                        <button class="pagination-btn ${currentPageVar === 1 ? 'disabled' : ''}"
                                ${currentPageVar === 1 ? 'disabled' : ''}
                                onclick="changePage(${currentPageVar - 1}, '${tabType}')">
                            Previous
                        </button>
                    `;

                    // Page numbers
                    const showPages = [];

                    // Always show first page
                    showPages.push(1);

                    // Pages around current page
                    for (let i = Math.max(2, currentPageVar - 1); i <= Math.min(totalPages - 1, currentPageVar +
                            1); i++) {
                        showPages.push(i);
                    }

                    // Always show last page for more than 1 page
                    if (totalPages > 1) {
                        showPages.push(totalPages);
                    }

                    // Sort and remove duplicates
                    const uniquePages = [...new Set(showPages)].sort((a, b) => a - b);

                    // Create page buttons with ellipsis
                    let prevPage = 0;
                    for (const page of uniquePages) {
                        if (page - prevPage > 1) {
                            paginationHTML += `<span class="pagination-ellipsis">...</span>`;
                        }

                        paginationHTML += `
                            <button class="pagination-btn ${page === currentPageVar ? 'active' : ''}"
                                    onclick="changePage(${page}, '${tabType}')">
                                ${page}
                            </button>
                        `;

                        prevPage = page;
                    }

                    // Next button
                    paginationHTML += `
                        <button class="pagination-btn ${currentPageVar === totalPages ? 'disabled' : ''}"
                                ${currentPageVar === totalPages ? 'disabled' : ''}
                                onclick="changePage(${currentPageVar + 1}, '${tabType}')">
                            Next
                        </button>
                    `;

                    container.innerHTML = paginationHTML;
                }

                // Make changePage function globally available
                window.changePage = function(page, tabType) {
                    if (page < 1) return;

                    if (tabType === 'update') {
                        currentUpdatePage = page;
                        fetchUpdatePosts();
                    } else if (tabType === 'article') {
                        currentArticlePage = page;
                        fetchArticlePosts();
                    } else {
                        currentPage = page;
                        fetchAllPosts();
                    }

                    // Scroll to top when changing pages
                    window.scrollTo(0, 0);
                };
            });
        </script>
    </body>

    </html>
@endsection
