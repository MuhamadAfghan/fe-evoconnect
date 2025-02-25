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
                    <div id="article-posts-container" class="post-grid"></div>
                    <div class="pagination" id="article-pagination-container"></div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const tabs = document.querySelectorAll('.tab-item');
                const tabContents = document.querySelectorAll('.tab-content');
                const searchInputs = {
                    all: document.getElementById('search-input'),
                    update: document.getElementById('update-search-input'),
                    article: document.getElementById('article-search-input'),
                };
                const sortSelects = {
                    all: document.getElementById('sort-select'),
                    update: document.getElementById('update-sort-select'),
                    article: document.getElementById('article-sort-select'),
                };
                const applyFiltersBtns = {
                    all: document.getElementById('apply-filters'),
                    update: document.getElementById('apply-update-filters'),
                    article: document.getElementById('apply-article-filters'),
                };
                const postsContainers = {
                    all: document.getElementById('all-posts-container'),
                    update: document.getElementById('update-posts-container'),
                    article: document.getElementById('article-posts-container'),
                };
                const paginationContainers = {
                    all: document.getElementById('pagination-container'),
                    update: document.getElementById('update-pagination-container'),
                    article: document.getElementById('article-pagination-container'),
                };

                let currentPage = {
                    all: 1,
                    update: 1,
                    article: 1,
                };

                // Fetch posts based on tab and filters
                function fetchPosts(tab, page = 1) {
                    const searchQuery = searchInputs[tab].value;
                    const sortOrder = sortSelects[tab].value;

                    let url = `/api/users/{{ $user->id }}/posts/all`;
                    if (searchQuery) {
                        url += `?search=${encodeURIComponent(searchQuery)}`;
                    }
                    url += `?sort=${sortOrder}`;

                    axios.get(url)
                        .then(response => {
                            const data = response.data.data;
                            renderPosts(data.data, postsContainers[tab]);
                            renderPagination(data, paginationContainers[tab], tab);
                        })
                        .catch(error => {
                            console.error(`Error fetching ${tab} posts:`, error);
                            postsContainers[tab].innerHTML =
                                `<div class="no-posts">Error loading posts. Please try again later.</div>`;
                        });
                }

                // Render posts to the container
                function renderPosts(posts, container) {
                    if (!posts || posts.length === 0) {
                        container.innerHTML = `<div class="no-posts">No posts found.</div>`;
                        return;
                    }

                    const postsHTML = posts.map(post => {
                        const formattedDate = new Date(post.created_at).toLocaleDateString("en-GB", {
                            day: "numeric",
                            month: "short",
                            year: "numeric",
                        });

                        return `
                <div class="post-card">
                    <h3>${post.content}</h3>
                    <p class="text-primary">${post.user.name}</p>
                    <small><i class="feather-clock"></i> Posted on ${formattedDate}</small>
                    ${post.image ? `<img class="post-image" src="${post.image}" alt="Post Image">` : ''}
                </div>
            `;
                    }).join("");

                    container.innerHTML = postsHTML;
                }

                // Render pagination
                function renderPagination(data, container, tab) {
                    const totalPages = data.last_page;
                    if (totalPages <= 1) {
                        container.innerHTML = "";
                        return;
                    }

                    let paginationHTML = `
            <button class="pagination-btn ${currentPage[tab] === 1 ? 'disabled' : ''}"
                    onclick="changePage(${currentPage[tab] - 1}, '${tab}')" ${currentPage[tab] === 1 ? 'disabled' : ''}>
                Previous
            </button>
        `;

                    for (let i = 1; i <= totalPages; i++) {
                        paginationHTML += `
                <button class="pagination-btn ${currentPage[tab] === i ? 'active' : ''}"
                        onclick="changePage(${i}, '${tab}')">
                    ${i}
                </button>
            `;
                    }

                    paginationHTML += `
            <button class="pagination-btn ${currentPage[tab] === totalPages ? 'disabled' : ''}"
                    onclick="changePage(${currentPage[tab] + 1}, '${tab}')" ${currentPage[tab] === totalPages ? 'disabled' : ''}>
                Next
            </button>
        `;

                    container.innerHTML = paginationHTML;
                }

                // Change page
                window.changePage = function(page, tab) {
                    if (page < 1 || page > currentPage[tab].last_page) return;
                    currentPage[tab] = page;
                    fetchPosts(tab, page);
                };

                // Apply filters
                Object.keys(applyFiltersBtns).forEach(tab => {
                    applyFiltersBtns[tab].addEventListener('click', () => {
                        currentPage[tab] = 1;
                        fetchPosts(tab);
                    });
                });

                // Tab switching
                tabs.forEach(tab => {
                    tab.addEventListener('click', () => {
                        const targetTab = tab.getAttribute('data-tab');

                        // Remove active class from all tabs and contents
                        tabs.forEach(t => t.classList.remove('active'));
                        tabContents.forEach(c => c.classList.remove('active'));

                        // Add active class to clicked tab and corresponding content
                        tab.classList.add('active');
                        document.getElementById(`${targetTab}-tab`).classList.add('active');

                        // Fetch posts for the selected tab if not already loaded
                        if (postsContainers[targetTab].innerHTML === "") {
                            fetchPosts(targetTab);
                        }
                    });
                });

                // Initial load for the "All" tab
                fetchPosts('all');
            });
        </script>
    </body>

    </html>
@endsection
