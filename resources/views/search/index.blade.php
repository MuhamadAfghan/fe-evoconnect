@extends('layouts.templates')

@section('content')
    <style>
        .search-results {
            max-width: 600px;
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .result {
            display: flex;
            align-items: center;
            padding: 15px 0;
            border-bottom: 1px solid #ddd;
        }

        .result:last-child {
            border-bottom: none;
        }

        .avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: gray;
            margin-right: 15px;
        }

        .info {
            flex-grow: 1;
        }

        .name {
            font-weight: bold;
        }

        .title {
            font-size: 14px;
            color: #666;
        }

        .location {
            font-size: 12px;
            color: #999;
        }

        .button {
            padding: 8px 12px;
            border: 1px solid #0a66c2;
            background: white;
            color: #0a66c2;
            border-radius: 20px;
            cursor: pointer;
            font-size: 14px;
        }

        .button:hover {
            background: #0a66c2;
            color: white;
        }

        h5 {
            font-weight: bold;
        }
    </style>
    <div class="container mt-4">
        <div class="row">
            <!-- Sidebar Kiri -->
            <div class="col-md-3">
                <div class="border-success rounded border bg-white p-3 shadow">
                    <h5 class="mb-2">On this page</h5>
                    <ul class="list-unstyled">
                        <li class="mt-2">People</li>
                        <li class="mt-2">Posts</li>
                    </ul>
                </div>
            </div>

            <!-- people -->
            <div class="col-md-9">
                <div class="search-results">
                    <h5>People</h5>
                    <div class="result">
                        <div class="avatar"></div>
                        <div class="info">
                            <div class="name">Alin .</div>
                            <div class="title">Jr. Brand Platform Manager at L’Oréal</div>
                            <div class="location">Jakarta Raya, Indonesia</div>
                        </div>
                        <button class="button Connected">Connect</button>
                    </div>

                    <div class="result">
                        <div class="avatar"></div>
                        <div class="info">
                            <div class="name">tanyaaghan</div>
                            <div class="title">Jr. Brand brenManager at L’Oréal</div>
                            <div class="location">Jakarta Barat, Indonesia</div>
                        </div>
                        <button class="button Connected">Connect</button>
                    </div>

                    <div class="result">
                        <div class="avatar"></div>
                        <div class="info">
                            <div class="name">Cepew</div>
                            <div class="title">Jr. Brand Platform Manager at L’Oréal</div>
                            <div class="location">Jakarta Raya, Indonesia</div>
                        </div>
                        <button class="button Connected">Connect</button>
                    </div>
                    <div class="info mt-2 text-center">
                        <a href="list-profile">
                            See More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jobs -->
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-3"></div>

            <!-- Hasil Pencarian -->
            <div class="col-md-9">
                <div class="search-results">
                    <h5>Jobs</h5>
                    <div class="result">
                        <div class="avatar"></div>
                        <div class="info">
                            <div class="name">PT. Untat Indonesia</div>
                            <div class="title">Jr. Brand Platform Manager at L’Oréal</div>
                            <div class="location">Cimande, Indonesia</div>
                        </div>
                        <button class="button Save">Save</button>
                    </div>

                    <div class="result">
                        <div class="avatar"></div>
                        <div class="info">
                            <div class="name">PT. JRI Indonesia</div>
                            <div class="title">Jr. Brand brenManager at L’Oréal</div>
                            <div class="location">Jakarta Barat, Indonesia</div>
                        </div>
                        <button class="button Save">Save</button>
                    </div>
                    <div class="info mt-2 text-center">
                        <a href="list-jobs">
                            See More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Template for single post item -->
    <!-- posts -->
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-3"></div>

            <div class="col-md-9">
                <div class="search-results">
                    <h5>Posts</h5>
                    <div id="post-template">
                        <div class="border-bottom post-header d-flex align-items-center justify-content-between p-3">
                            <div class="d-flex align-items-center">
                                <div class="dropdown-list-image mr-3">
                                    <a href="profile" style="color: black;">
                                        <img class="rounded-circle" src="" alt="user avatar" id="user-avatar">
                                        <div class="status-indicator"></div>
                                </div>
                                <div class="font-weight-bold">
                                    <div class="text-truncate" id="user-name">John Doe</div>
                                    <div class="small text-gray-500">Freelancer | Front End Developer</div>
                                    <div class="small text-gray-500" id="post-time"></div>
                                </div>
                                </a>
                            </div>

                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="gray"
                                title="Visibility: public" class="bi bi-globe2" viewBox="0 0 16 16">
                                <path
                                    d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m7.5-6.923c-.67.204-1.335.82-1.887 1.855q-.215.403-.395.872c.705.157 1.472.257 2.282.287zM4.249 3.539q.214-.577.481-1.078a7 7 0 0 1 .597-.933A7 7 0 0 0 3.051 3.05q.544.277 1.198.49zM3.509 7.5c.036-1.07.188-2.087.436-3.008a9 9 0 0 1-1.565-.667A6.96 6.96 0 0 0 1.018 7.5zm1.4-2.741a12.3 12.3 0 0 0-.4 2.741H7.5V5.091c-.91-.03-1.783-.145-2.591-.332M8.5 5.09V7.5h2.99a12.3 12.3 0 0 0-.399-2.741c-.808.187-1.681.301-2.591.332zM4.51 8.5c.035.987.176 1.914.399 2.741A13.6 13.6 0 0 1 7.5 10.91V8.5zm3.99 0v2.409c.91.03 1.783.145 2.591.332.223-.827.364-1.754.4-2.741zm-3.282 3.696q.18.469.395.872c.552 1.035 1.218 1.65 1.887 1.855V11.91c-.81.03-1.577.13-2.282.287zm.11 2.276a7 7 0 0 1-.598-.933 9 9 0 0 1-.481-1.079 8.4 8.4 0 0 0-1.198.49 7 7 0 0 0 2.276 1.522zm-1.383-2.964A13.4 13.4 0 0 1 3.508 8.5h-2.49a6.96 6.96 0 0 0 1.362 3.675c.47-.258.995-.482 1.565-.667m6.728 2.964a7 7 0 0 0 2.275-1.521 8.4 8.4 0 0 0-1.197-.49 9 9 0 0 1-.481 1.078 7 7 0 0 1-.597.933M8.5 11.909v3.014c.67-.204 1.335-.82 1.887-1.855q.216-.403.395-.872A12.6 12.6 0 0 0 8.5 11.91zm3.555-.401c.57.185 1.095.409 1.565.667A6.96 6.96 0 0 0 14.982 8.5h-2.49a13.4 13.4 0 0 1-.437 3.008M14.982 7.5a6.96 6.96 0 0 0-1.362-3.675c-.47.258-.995.482-1.565.667.248.92.4 1.938.437 3.008zM11.27 2.461q.266.502.482 1.078a8.4 8.4 0 0 0 1.196-.49 7 7 0 0 0-2.275-1.52c.218.283.418.597.597.932m-.488 1.343a8 8 0 0 0-.395-.872C9.835 1.897 9.17 1.282 8.5 1.077V4.09c.81-.03 1.577-.13 2.282-.287z" />
                            </svg>
                        </div>
                        <div class="post-body p-3">
                            <p class="mb-0" id="post-content">Absen dulu dik adik terkedik kedik</p>
                            <div class="small text-muted" id="post-caption">#webdevelopment #freelancing</div>
                            <div class="mt-3">
                                <div class="card w-80 p-3">
                                    <div class="d-flex align-items-center">
                                        <img src="your-logo.png" alt="Company Logo" class="rounded-circle" width="50"
                                            height="50">
                                        <div class="ms-3">
                                            <h6 class="bold mb-0">Personal Assistant (Mandarin Speaker)</h6>
                                            <small class="text-muted">Job by PT. Venus Indo Prima</small><br>
                                            <small class="text-muted">West Jakarta, Jakarta, Indonesia (On-site)</small>
                                        </div>
                                        <a href="job-profile" class="button" style="margin-left:6em;">View
                                            Job</a>
                                    </div>
                                </div>
                            </div>
                            <div class="post-footer p-3" style="margin-bottom: -20px">
                                <div class="d-flex align-items-center">
                                    <div class="button-group">
                                        <button class="btn btn-light btn-sm like-button mr-2"><i
                                                class="feather-heart mr-1"></i>
                                            Like</button>
                                        <span class="like-count">0</span>
                                        <button class="btn btn-light btn-sm mr-2" type="button" data-toggle="modal"
                                            data-target="#modalPost" data-postId="1"><i
                                                class="feather-message-square mr-1"></i>
                                            Comment</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Template for single post item -->
    <!-- companies -->
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-9">
                <div class="search-results">
                    <h5>Companies</h5>
                    <div class="result">
                        <div class="avatar"></div>
                        <div class="info">
                            <div class="name">Alin .</div>
                            <div class="title">Jr. Brand Platform Manager at L’Oréal</div>
                            <div class="location">Jakarta Raya, Indonesia</div>
                        </div>
                        <button class="button Connected">Connect</button>
                    </div>

                    <div class="result">
                        <div class="avatar"></div>
                        <div class="info">
                            <div class="name">tanyaaghan</div>
                            <div class="title">Jr. Brand brenManager at L’Oréal</div>
                            <div class="location">Jakarta Barat, Indonesia</div>
                        </div>
                        <button class="button Connected">Connect</button>
                    </div>

                    <div class="result">
                        <div class="avatar"></div>
                        <div class="info">
                            <div class="name">Cepew</div>
                            <div class="title">Jr. Brand Platform Manager at L’Oréal</div>
                            <div class="location">Jakarta Raya, Indonesia</div>
                        </div>
                        <button class="button Connected">Connect</button>
                    </div>
                    <div class="info mt-2 text-center">
                        <a href="list-company">
                            See More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Groups -->
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-9">
                <div class="search-results">
                    <h5>Groups</h5>
                    <div class="result">
                        <div class="avatar"></div>
                        <div class="info">
                            <div class="name">Alin .</div>
                            <div class="title">Jr. Brand Platform Manager at L’Oréal</div>
                            <div class="location">Jakarta Raya, Indonesia</div>
                        </div>
                        <button class="button Join">Join</button>
                    </div>

                    <div class="result">
                        <div class="avatar"></div>
                        <div class="info">
                            <div class="name">tanyaaghan</div>
                            <div class="title">Jr. Brand brenManager at L’Oréal</div>
                            <div class="location">Jakarta Barat, Indonesia</div>
                        </div>
                        <button class="button Join">Join</button>
                    </div>

                    <div class="result">
                        <div class="avatar"></div>
                        <div class="info">
                            <div class="name">Cepew</div>
                            <div class="title">Jr. Brand Platform Manager at L’Oréal</div>
                            <div class="location">Jakarta Raya, Indonesia</div>
                        </div>
                        <button class="button Join">Join</button>
                    </div>
                    <div class="info mt-2 text-center">
                        <a href="list-groups">
                            See More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        // profile
        document.querySelectorAll('.Connected').forEach(button => {
            button.addEventListener('click', () => {
                if (button.innerText === "Connect") {
                    button.innerText = "Disconnect";
                    button.style.background = "#ccc";
                    button.style.color = "black";
                    button.style.border = "1px solid #ccc";
                } else {
                    button.innerText = "Connect";
                    button.style.background = "white";
                    button.style.color = "#0a66c2";
                    button.style.border = "1px solid #0a66c2";
                }
            });
        });

        // jobs
        document.querySelectorAll('.Save').forEach(button => {
            button.addEventListener('click', () => {
                if (button.innerText === "Save") {
                    button.innerText = "Disconnect";
                    button.style.background = "#ccc";
                    button.style.color = "black";
                    button.style.border = "1px solid #ccc";
                } else {
                    button.innerText = "Save";
                    button.style.background = "white";
                    button.style.color = "#0a66c2";
                    button.style.border = "1px solid #0a66c2";
                }
            });
        });

        // groups
        document.querySelectorAll('.Join').forEach(button => {
            button.addEventListener('click', () => {
                if (button.innerText === "Join") {
                    button.innerText = "Disconnect";
                    button.style.background = "#ccc";
                    button.style.color = "black";
                    button.style.border = "1px solid #ccc";
                } else {
                    button.innerText = "Join";
                    button.style.background = "white";
                    button.style.color = "#0a66c2";
                    button.style.border = "1px solid #0a66c2";
                }
            });
        });
    </script>
@endsection
