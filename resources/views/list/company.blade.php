@extends('layouts.templates')

@section('content')
    <style>
        .avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: gray;
            margin-right: 15px;
        }

        .list-group {
            width: 70%;
            box-shadow: 10%;
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
    </style>
    <div class="container mb-5 mt-4">
        <h6 class="text-muted">130 hasil</h6>
        <div class="list-group mt-3 shadow-sm" style="border-radius: 10px;">

            <div class="group" style="border-radius: 10px;">
                <!-- Item 1 -->
                <a href="company-profile">
                    <div class="list-group-item d-flex align-items-center">
                        <div class="me-3">
                            <div class="avatar"></div>
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="mb-0">pajri</h6>
                            <p class="text-muted mb-1">Senior Tax Manager di PT Sampoerna Agro Tbk</p>
                            <small class="text-muted">Area DKI Jakarta</small>
                        </div>
                        <button class="button Connect">Connect</button>
                    </div>
                </a>

                <!-- Item 2 -->
                <div class="list-group-item d-flex align-items-center">
                    <div class="me-3">
                        <div class="avatar"></div>
                    </div>
                    <div class="flex-grow-1">
                        <h6 class="mb-0">pajri Teng</h6>
                        <p class="text-muted mb-1">Chief Agency Officer</p>
                        <small class="text-muted">WP. Kuala Lumpur</small>
                    </div>
                    <button class="button Connect">Connect</button>
                </div>

                <!-- Item 3 -->
                <div class="list-group-item d-flex align-items-center">
                    <div class="me-3">
                        <div class="avatar"></div>
                    </div>
                    <div class="flex-grow-1">
                        <h6 class="mb-0">pajri Fong</h6>
                        <p class="text-muted mb-1">Engineering company business management</p>
                        <small class="text-muted">Pulau Pinang, Malaysia</small>
                    </div>
                    <button class="button Connect">Connect</button>
                </div>

                <!-- Item 4 -->
                <div class="list-group-item d-flex align-items-center">
                    <div class="me-3">
                        <div class="avatar"></div>
                    </div>
                    <div class="flex-grow-1">
                        <h6 class="mb-0">pajri San</h6>
                        <p class="text-muted mb-1">Plant Engineering & Maintenance Senior Manager</p>
                        <small class="text-muted">Shah Alam</small>
                    </div>
                    <button class="button Connect">Connect</button>
                </div>

                <!-- Item 5 -->
                <div class="list-group-item d-flex align-items-center">
                    <div class="me-3">
                        <div class="avatar"></div>
                    </div>
                    <div class="flex-grow-1">
                        <h6 class="mb-0">pajri L.</h6>
                        <p class="text-muted mb-1">Senior Associate, Regional IT Infrastructure</p>
                        <small class="text-muted">CGS-CIMB Securities, Singapura</small>
                    </div>
                    <button class="button Connect">Connect</button>
                </div>
                <!-- Item 1 -->
                <div class="list-group-item d-flex align-items-center">
                    <div class="me-3">
                        <div class="avatar"></div>
                    </div>
                    <div class="flex-grow-1">
                        <h6 class="mb-0">pajri</h6>
                        <p class="text-muted mb-1">Senior Tax Manager di PT Sampoerna Agro Tbk</p>
                        <small class="text-muted">Area DKI Jakarta</small>
                    </div>
                    <button class="button Connect">Connect</button>
                </div>

                <!-- Item 2 -->
                <div class="list-group-item d-flex align-items-center">
                    <div class="me-3">
                        <div class="avatar"></div>
                    </div>
                    <div class="flex-grow-1">
                        <h6 class="mb-0">pajri Teng</h6>
                        <p class="text-muted mb-1">Chief Agency Officer</p>
                        <small class="text-muted">WP. Kuala Lumpur</small>
                    </div>
                    <button class="button Connect">Connect</button>
                </div>

                <!-- Item 3 -->
                <div class="list-group-item d-flex align-items-center">
                    <div class="me-3">
                        <div class="avatar"></div>
                    </div>
                    <div class="flex-grow-1">
                        <h6 class="mb-0">pajri Fong</h6>
                        <p class="text-muted mb-1">Engineering company business management</p>
                        <small class="text-muted">Pulau Pinang, Malaysia</small>
                    </div>
                    <button class="button Connect">Connect</button>
                </div>

                <!-- Item 4 -->
                <div class="list-group-item d-flex align-items-center">
                    <div class="me-3">
                        <div class="avatar"></div>
                    </div>
                    <div class="flex-grow-1">
                        <h6 class="mb-0">pajri San</h6>
                        <p class="text-muted mb-1">Plant Engineering & Maintenance Senior Manager</p>
                        <small class="text-muted">Shah Alam</small>
                    </div>
                    <button class="button Connect">Connect</button>
                </div>

                <!-- Item 5 -->
                <div class="list-group-item d-flex align-items-center">
                    <div class="me-3">
                        <div class="avatar"></div>
                    </div>
                    <div class="flex-grow-1">
                        <h6 class="mb-0">pajri L.</h6>
                        <p class="text-muted mb-1">Senior Associate, Regional IT Infrastructure</p>
                        <small class="text-muted">CGS-CIMB Securities, Singapura</small>
                    </div>
                    <button class="button Connect">Connect</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.querySelectorAll('.Connect').forEach(button => {
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
    </script>
@endsection
