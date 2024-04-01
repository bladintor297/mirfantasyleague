<!-- User logged in state. User account dropdown -->
<header class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm fixed-top">
    <div class="container">

        {{-- Logo --}}
        <a href="/home" class="navbar-brand ms-4">
            <img src="{{ url('assets/img/navbar/fantasyleague.png') }}" style="height: 40px" alt="MLBB Fantasy League">
        </a>

        {{-- Mobile Toggler --}}
        <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse5"
            aria-expanded="false">
            <span class="navbar-toggler-icon"></span>
        </button>

        @if (Auth::check())

            {{-- Admin Dropdown --}}
            <div class="nav dropdown d-block order-lg-3 ms-4">
                <a href="#" class="d-flex nav-link p-0" data-bs-toggle="dropdown">
                    <img src="{{ asset('public/assets/img/profile/'.Auth::user()->team_logo)  }}" class="rounded-circle" alt="Avatar" style="width:45px; height: 48px; object-fit:cover">
                    <div class="d-none d-sm-block ps-2 text-primary">
                        <div class="fs-xs lh-1 opacity-60">Hello,</div>
                        <div class="fs-sm dropdown-toggle">{{ Auth::user()->username }}</div>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end my-1" style="width: 14rem;">
                    @if (Auth::user()->role == 1)
                        <li>
                            <a href="/league/1/edit" class="dropdown-item d-flex align-items-center">
                                <i class="bx bx-trophy fs-base opacity-60 me-2"></i>
                                Manage League
                                {{-- <span class="ms-auto fs-xs text-muted">5</span> --}}
                            </a>
                        </li>
                        <li>
                            <a href="/game" class="dropdown-item d-flex align-items-center">
                                <i class="bx bx-joystick fs-base opacity-60 me-2"></i>
                                Manage Games
                                {{-- <span class="ms-auto fs-xs text-muted">5</span> --}}
                            </a>
                        </li>
                        <li>
                            <a href="/team" class="dropdown-item d-flex align-items-center">
                                <i class="bx bx-group fs-base opacity-60 me-2"></i>
                                Manage Teams
                                {{-- <span class="ms-auto fs-xs text-muted">5</span> --}}
                            </a>
                        </li>
                        <li>
                            <a href="/player" class="dropdown-item d-flex align-items-center">
                                <i class="bx bx-body fs-base opacity-60 me-2"></i>
                                Manage Players
                                {{-- <span class="ms-auto fs-xs text-muted">5</span> --}}
                            </a>
                        </li>
                        <li>
                            <a href="/score/create" class="dropdown-item d-flex align-items-center">
                                <i class="bx bx-clipboard fs-base opacity-60 me-2"></i>
                                Manage Score
                                {{-- <span class="ms-auto fs-xs text-muted">5</span> --}}
                            </a>
                        </li>
                        <hr class="my-2">
                        <li>
                            <a href="/profile" class="dropdown-item d-flex align-items-center">
                                <i class="bx bx-group fs-base opacity-60 me-2"></i>
                                My Accounts
                                {{-- <span class="ms-auto fs-xs text-muted">2</span> --}}
                            </a>
                        </li>
                        <li>
                            <a href="/myteam" class="dropdown-item d-flex align-items-center">
                                <i class="bx bx-joystick fs-base opacity-60 me-2"></i>
                                My Team
                                {{-- <span class="ms-auto fs-xs text-muted">2</span> --}}
                            </a>
                        </li>
                    @else
                        <li>
                            <a href="/profile" class="dropdown-item d-flex align-items-center">
                                <i class="bx bx-group fs-base opacity-60 me-2"></i>
                                My Accounts
                                {{-- <span class="ms-auto fs-xs text-muted">2</span> --}}
                            </a>
                        </li>
                        <li>
                            <a href="/myteam" class="dropdown-item d-flex align-items-center">
                                <i class="bx bx-joystick fs-base opacity-60 me-2"></i>
                                My Teams
                                {{-- <span class="ms-auto fs-xs text-muted">2</span> --}}
                            </a>
                        </li>
                    @endif
                    
                    
                    <li class="dropdown-divider"></li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="{{ route('signout') }}">
                            <i class="bx bx-log-out fs-base opacity-60 me-2"></i>
                            Sign out
                        </a>
                    </li>
                </ul>
            </div>

        @else
            <div class="btn-group btn-group-sm d-block order-lg-3 ms-4" role="group" aria-label="Small group">
                <a href="/register" class="btn btn-primary d-none d-md-inline">
                    <i class="bx bx-user me-2"></i>
                    <span class="">Register</span>
                </a>
                <a href="/login" class="btn btn-secondary d-none d-md-inline">
                    <i class="bx bx-log-in  me-2 "></i>
                    <span class="">Login</span>
                </a>
            </div>
            
            
        @endif
        


        <nav id="navbarCollapse5" class="collapse navbar-collapse order-lg-2">
            <hr class="d-lg-none mt-3 mb-2">
            <ul class="navbar-nav me-auto align-items-center">
                <li class="nav-item">
                    <a href="/home" class="nav-link">Home</a>
                </li>
                <li class="nav-item ">
                    <a href="/about" class="nav-link">About</a>
                </li>
                <li class="nav-item">
                    <a href="/league" class="nav-link">League</a>
                </li>
                <li class="nav-item">
                    <a href="/score" class="nav-link">Scoreboard</a>
                </li>
                <li class="nav-item">
                    <a href="/prize" class="nav-link">Prizes</a>
                </li>
                <li class="nav-item">
                    <a href="/faq" class="nav-link">FAQ</a>
                </li>
            </ul>
            <hr class="d-lg-none mt-3 mb-2">
            
            <ul class="navbar-nav me-auto align-items-center d-lg-none ">
                <hr class="d-lg-none border-top">
                @if (Auth::check())
                <li class="nav-item">
                    <a href="/profile" class="nav-link">My Account</a>
                </li>
                <li class="nav-item">
                    <a href="/myteam" class="nav-link">My Teams</a>
                </li>
                <li>
                    <a href="{{ route('signout') }}"  class="btn btn-warning btn-sm rounded-pill my-1">
                        <i class="bx bx-log-in fs-sm me-2"></i>
                        <span >Logout</span>
                    </a>
                </li>
                @endif
                <li class="nav-item d-md-none">
                    @if (Auth::check())
                        <a href="/login"  class="btn btn-secondary d-none d-md-inline">
                            <i class="bx bx-log-in fs-lg me-2 d-none d-md-inline"></i>
                            <span class="d-none d-md-inline">Login</span>
                        </a>
                    @else
                        <a href="/login"  class="btn btn-warning btn-sm rounded-pill my-1">
                            <i class="bx bx-log-in fs-sm me-2"></i>
                            <span >Login</span>
                        </a>
                    @endif
                </li>
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