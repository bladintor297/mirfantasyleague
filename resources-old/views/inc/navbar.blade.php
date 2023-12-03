    <!-- Navbar -->
    <!-- Remove "navbar-sticky" class to make navigation bar scrollable with the page -->
    <header class="navbar navbar-expand-lg navbar-dark fixed-top shadow-none header-mobile">
        <div class="container">
            <a href="/welcome" class="navbar-brand">
                <img src="{{ url('assets/img/navbar/fantasyleague.png') }}" style="height: 40px" alt="MLBB Fantasy League">
            </a>
            <button class="navbar-toggler ms-auto me-3" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse2" aria-expanded="false">
                <span class="navbar-toggler-icon"></span>
            </button>

            {{-- If Not Logged In  --}}

            @if (!Auth::check())
                <div class="nav dropdown d-block order-lg-3 ms-4 d-flex justify-content-end">
                    <div>
                        <a href="{{ route('login') }}"
                            class="fs-sm order-lg-3 d-none d-lg-inline-flex px-4 nav-link text-warning border-2 border-end border-warning">
                            <i class="bx bx-log-in fs-lg me-2"></i>
                            Login
                        </a>
                    </div>
                    <div>
                        <a href="{{ route('register') }}"
                            class="fs-sm order-lg-3 d-none d-lg-inline-flex px-3 nav-link text-warning">
                            <i class="bx bx-log-in fs-lg me-2"></i>
                            Register
                        </a>
                    </div>
                </div>
            @else
                <div class="nav dropdown d-block order-lg-3 ms-4">
                    <a href="#" class="d-flex nav-link p-0 a-toggle" data-bs-toggle="dropdown">
                        <div class="d-none d-sm-block ps-2">
                            <div class="fs-xs lh-1 opacity-60">Hello,</div>
                            <div class="fs-sm dropdown-toggle">{{ Session::get('user_name') }}</div>
                        </div>
                        <img src="{{ asset('assets/img/profile/' . Session::get('user_image')) }}" class="rounded-circle ms-2" style="height: 48px; width: 48px; object-fit:cover" />

                    </a>
                    <ul class="dropdown-menu dropdown-menu-end my-1" style="width: 14rem;">
                        <li>
                            @if (Auth::user()->role == 1)
                                <a href="/league/1/edit" class="dropdown-item d-flex align-items-center">
                                    <i class="bx bx-trophy fs-base opacity-60 me-2"></i>
                                    Manage Games
                                    <span class="ms-auto fs-xs text-muted">5</span>
                                </a>
                            @else
                                <a href="/league" class="dropdown-item d-flex align-items-center">
                                    <i class="bx bx-trophy fs-base opacity-60 me-2"></i>
                                    My Games
                                    <span class="ms-auto fs-xs text-muted">5</span>
                                </a>
                            @endif
                        </li>
                        <li>
                            @if (Auth::user()->role == 1)
                                <a href="/league/2/edit" class="dropdown-item d-flex align-items-center">
                                    <i class="bx bx-group fs-base opacity-60 me-2"></i>
                                    Manage Score
                                    <span class="ms-auto fs-xs text-muted">5</span>
                                </a>
                            @else
                                <a href="/player/{{ Auth::user()->id }}" class="dropdown-item d-flex align-items-center">
                                    <i class="bx bx-group fs-base opacity-60 me-2"></i>
                                    My Teams
                                    <span class="ms-auto fs-xs text-muted">5</span>
                                </a>
                            @endif
                        </li>

                        @if (Auth::user()->role == 1)

                            <li>
                                    <a href="/team" class="dropdown-item d-flex align-items-center">
                                        <i class="bx bx-group fs-base opacity-60 me-2"></i>
                                        Manage Teams
                                        <span class="ms-auto fs-xs text-muted">5</span>
                                    </a>
                            </li>
                        @endif

                        <li>
                            <a href="#" class="dropdown-item d-flex align-items-center">
                                <i class="bx bx-chat fs-base opacity-60 me-2"></i>
                                Messages
                                <span class="bg-success rounded-circle mt-n2 ms-1"
                                    style="width: 5px; height: 5px;"></span>
                                <span class="ms-auto fs-xs text-muted">14</span>
                            </a>
                        </li>
                        <li class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ route('signout') }}">
                                <i class="bx bx-log-out fs-base opacity-60 me-2"></i>
                                Sign out
                            </a>
                        </li>
                    </ul>
                </div>
            @endif


            <nav id="navbarCollapse2" class="collapse navbar-collapse ">
                <hr class="d-lg-none mt-3 mb-2 border border-top  opacity-25 bg-secondary border-1">
                <ul class="navbar-nav me-auto align-items-center">
                    <li class="nav-item">
                        <a href="/welcome" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item ">
                        <a href="/about" class="nav-link">About</a>
                    </li>
                    <li class="nav-item">
                        <a href="/league" class="nav-link">League</a>
                    </li>
                    <li class="nav-item">
                        <a href="/scoreboard" class="nav-link">Scoreboard</a>
                    </li>
                    <li class="nav-item">
                        <a href="/prize" class="nav-link">Prizes</a>
                    </li>
                    <li class="nav-item">
                        <a href="/faq" class="nav-link">FAQ</a>
                    </li>


                    <hr class="border border-top w-100 opacity-25 bg-secondary border-1 mt-2">

                    @if (!Auth::check())
                        <a href="{{ route('login') }}" class="btn btn-outline-warning     btn-sm fs-sm rounded my-3 d-lg-none">
                            <i class="bx bx-log-in fs-lg me-2"></i>
                            Sign in
                        </a>
                    
                    @else
                        <a href="{{ route('signout') }}" class="btn btn-outline-warning     btn-sm fs-sm rounded my-3 d-lg-none">
                            <i class="bx bx-log-in fs-lg me-2"></i>
                            Sign Out
                        </a>
                    @endif
                    
                </ul>

            </nav>
        </div>
    </header>

    <!-- Include this JavaScript at the end of your HTML body or in an external JavaScript file -->
    <script>
        // Get the current URL path
        var currentPath = window.location.pathname;

        // Find all the navigation links
        var navLinks = document.querySelectorAll('.navbar-nav .nav-link');

        // Loop through the navigation links and check if the URL matches
        for (var i = 0; i < navLinks.length; i++) {
            var link = navLinks[i];
            var linkPath = link.getAttribute('href');

            // Check if the current path contains the link path
            if (currentPath.indexOf(linkPath) === 0) {
                // Add the "active" class to the link
                link.classList.add('active');
            }
        }
    </script>
