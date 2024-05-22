@extends('layouts.main-layout')

@section('content')
    
    <!-- Hero image -->
    <div class="jarallax d-none d-md-block" data-jarallax data-speed="0.35" style="position: relative;">
        <span class="position-absolute top-0 start-0 w-100 h-100 "></span>
        <div class="jarallax-img"
            style="background-image: url('{{ asset('assets/img/background/parallax-zilong.png') }}'); width: 100%; background-size: cover;">
        </div>
        <div class="d-none d-xxl-block" style="height: 450px;"></div>
        <div class="d-none d-md-block d-xxl-none" style="height: 550px;"></div>
        <h1 class="text-white tst header-parallax mb-0">LEAGUE</h1>
    </div>

    <section class="bg-body position-relative pt-5 pb-4 py-md-5" style="min-height: 100vh">

        <!-- Page title -->
        <div class="mt-4 mb-lg-2 mb-2 pt-3">
            <h1 class="display-1 text-center mb-0 text-warning header-parallax hero-title">All Tournaments</h1>
        </div>
        
        <div class="container text-center mt-2 mt-md-4 mt-lg-5">
            <div class="row pb-2">

                @if (Auth::check())
                    @if (count($games)>0)
                        @foreach ($games as $league)
                            <div class="col-md-4 mt-3">
                        
                                <div class="card border-0 shadow-lg card-hover card-dark p-3 p-xxl-4">
                    
                                    <!-- Slider -->
                                    <div class="swiper mx-0 mb-md-n2 mb-xxl-n3" data-swiper-options='{
                                            "spaceBetween": 24,
                                            "loop": true,
                                            "pager": true,
                                            "navigation": {
                                                "prevEl": ".page-prev",
                                                "nextEl": ".page-next"
                                            }
                                        }'>
                                        
                                        <div class="swiper-wrapper mb-5 pb-3">
                                
                                            @foreach ($league['games'] as $game)
                                        

                                                {{-- @if ($game->status !== 1) --}}
                                                    <!-- Item -->
                                                    <div class="swiper-slide h-auto">
                                                        <div class="card h-100 position-relative border-0 bg-transparent text-decoration-none">
                                                            
                                                            <figcaption class="card-footer border-0 d-flex justify-content-center w-100 pb-2">
                                                                <img src="{{$league['logo'] }}"  class="rounded-circle" alt="Tournament Logo" style="height: 50px; width: 50px; object-fit:cover">
                                                                <div class="ps-3">
                                                                    <span class="text-primary text-start fw-bolder text-uppercase">{{ $game->name }}</span>
                                                                    <h5 class="fw-semibold lh-base mb-0 py-0">{{ $league['league_name'] }}</h5>
                                                                </div>
                                                            </figcaption>
                                                            <blockquote class="card-body p-0 mb-2">
                                                                <p class="fs-sm px-2 mb-0">{{ $league['description']  }}
                                                                </p>
                                                            </blockquote>
                                                            <div class="mb-2">
                                                                @if ($game->status == 0)
                                                                    <a href="#" class="btn btn-sm btn-warning btn-shadow rounded-pill px-5 disabled">Coming Soon</a>

                                                                @elseif ($game->status == 1)
                                                                    <a href="myteam/{{ $game->id }}" class="btn btn-sm btn-warning btn-shadow rounded-pill px-5">Join Now</a>
                                                                
                                                                @elseif($game->status == 2)
                                                                    <a href="#" class="btn btn-sm btn-danger btn-shadow rounded-pill px-5 disabled">Registration Closed</a>

                                                                @else
                                                                    <a href="#" class="btn btn-sm btn-dark btn-shadow rounded-pill px-5 disabled">Event Ended</a>
                                                                @endif
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                {{-- @endif --}}
                                            @endforeach
                                            
            
                                            <!-- Item -->
                                            {{-- <div class="swiper-slide h-auto">
                                                <div class="card h-100 position-relative border-0 bg-transparent text-decoration-none">
                                                    
                                                    <figcaption class="card-footer border-0 d-flex align-items-center  justify-content-center w-100 pb-2">
                                                        <img src="https://upload.wikimedia.org/wikipedia/en/c/c6/MLBB_M5_World_Championship_logo.png" width="48" class="rounded-circle" alt="Ralph Edwards">
                                                        <div class="ps-3">
                                                            <span class="badge bg-primary my-0 px-4 py-2 rounded-pill align-items-start">Knockout</span>
                                                            <h5 class="fw-semibold lh-base mb-0 py-0">M5 World Championship</h5>
                                                        </div>
                                                    </figcaption>
                                                    <blockquote class="card-body p-0 mb-2">
                                                        <p class="fs-sm px-2 mb-0">Dolor, a eget elementum, integer nulla volutpat, nunc, sit.
                                                            Quam iaculis varius mauris magna sem.  sem. sem
                                                        </p>
                                                    </blockquote>
                                                    <div class="mb-2">
                                                        <a href="#" class="btn btn-sm btn-danger btn-shadow rounded-pill px-5 disabled">Registration Closed</a>
                                                    </div>
                                                    
                                                </div>
                                            </div> --}}
                                
                                        </div>
            
            
                                        <!-- Pagination (pager) -->
                                        <nav class="pagination d-flex justify-content-center position-absolute bottom-0 zindex-2 start-50 translate-middle-x px-2 mb-3 ">
                                            <div class="page-item me-2">
                                                <a class="page-link page-prev btn-icon btn-sm" href="#" aria-label="Previous page">
                                                    <i class="bx bx-chevron-left"></i>
                                                </a>
                                            </div>
                                            <ul class="list-unstyled d-flex justify-content-center mb-0"></ul>
                                            <div class="page-item ms-2">
                                                <a class="page-link page-next btn-icon btn-sm" href="#" aria-label="Next page">
                                                    <i class="bx bx-chevron-right"></i>
                                                </a>
                                            </div>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        
                    @else
                        <p>No available games</p>
                    @endif
                @else
                    <script>
                        // Alert the user to login
                        alert("Please login or register if you dont have an account");
                        // Redirect to the login page
                        window.location.href = "{{ route('login') }}";
                    </script>
                @endif
                
                
            </div>
        </div>
        
    </section>

@endsection
