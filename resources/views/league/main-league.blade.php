@extends('layouts.main-layout')

@section('content')
    
    <!-- Hero image -->
    <div class="jarallax d-none d-md-block" data-jarallax data-speed="0.35" style="position: relative;">
        <span class="position-absolute top-0 start-0 w-100 h-100 "></span>
        <div class="jarallax-img"
            style="background-image: url(assets/img/league/header-zilong.png); width: 100%; background-size: cover;">
        </div>
        <div class="d-none d-xxl-block" style="height: 450px;"></div>
        <div class="d-none d-md-block d-xxl-none" style="height: 550px;"></div>
    </div>

    <!-- Hero -->
    <section class="dark-mode hero bg-size-cover bg-repeat-0 bg-position-center position-relative overflow-hidden pb-5 " style="min-height: 100vh;">
        <div class="container position-relative zindex-2 pb-md-2 pb-lg-4  hero-container ">

            <!-- Title -->
            <div class="row d-flex justify-content-center text-center pb-4 mb-2 zindex-5">
                <div class="col">
                    <h2 class="display-2 mb-4 text-warning">All Leagues</h2>
                </div>
            </div>

            @if (Auth::check())
            <span class="badge bg-warning px-3 rounded-pill">Ongoing</span>


            <!-- Icon boxes (Features) -->
            <div class="row row-cols-1 row-cols-md-3 g-4 pt-2 pt-md-4 pb-lg-2">

                <div class="col">
                    <!-- Pagination: Bullets -->
                    <div class="swiper swiper-nav-onhover"
                        data-swiper-options='{
                            "spaceBetween": 20,
                            "loop": true,
                            "effect": "fade",
                            "pagination": {
                            "el": ".swiper-pagination",
                            "clickable": true
                            },
                            "navigation": {
                            "prevEl": ".btn-prev",
                            "nextEl": ".btn-next"
                            },
                            "autoplay": {
                            "delay": 3000,
                            "disableOnInteraction": false
                            }
                        }'>
                        @foreach ($allGames as $league)
                            <div class="swiper-wrapper">
                                
                                @foreach ($league['games'] as $game)
                                    

                                    @if ($game->status == 1)
                                        <!-- League Item -->
                                        <div class="swiper-slide">
                                            <!-- Button in the top right corner -->

                                            <h3 class="h5 text-uppercase mb-2 mt-n4 mt-sm-0 mt-md-n4 mt-xxl-0 text-warning text-center">
                                                {{ $league['league_name'] }}
                                            </h3>
                            
                                            <div class="card pt-1 pb-3 flex-column flex-sm-row flex-md-column flex-xxl-row align-items-center border-warning bg-black h-100">
                                            
                                            @if ((Auth::check()) && (Auth::user()->role == 1))
                                                <a href="league/1/edit" class="btn position-absolute top-0 end-0 m-2 px-2 btn-link text-warning zindex-5">
                                                    <i class='bx bx-cog'></i>
                                                </a>
                                            @endif
                                                
                                                <!-- Display item details here using $item properties -->
                                                <img src="{{ url('assets/img/league/tournaments/MPL-Malaysia.png') }} " width="168" alt="Doctor icon" class="p-3 pe-0">
                                                <div class="card-body text-center text-sm-start text-md-center text-xxl-start pb-3 pb-sm-2 pb-md-3 pb-xxl-2">
                                                    <h3 class="h6 text-uppercase mb-2 mt-n4 mt-sm-0 mt-md-n4 mt-xxl-0 text-warning">
                                                        {{ $game->name }}
                                                    </h3>
                                                    <p class="fs-sm mb-1">{{ $league['description']  }}</p>
                                                    <a href="/league/{{ $game->id }}" class="btn btn-warning btn-sm rounded-pill">
                                                        Join Now
                                                        <i class='bx bxs-chevron-right-circle fs-xl ms-1'></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                    @else
                                        <div class="swiper-slide">
                                            <h3 class="h5 text-uppercase mb-2 mt-n4 mt-sm-0 mt-md-n4 mt-xxl-0 text-warning text-center">
                                                {{ $league['league_name'] }}
                                            </h3>
                                            <div class="league">
                                                <div class="card pt-1 pb-3 flex-column flex-sm-row flex-md-column flex-xxl-row align-items-center border-warning h-100"
                                                    style="background-color: rgba(0, 0, 0, 0.597);">
                                                    @if ((Auth::check()) && (Auth::user()->role == 1))
                                                        <a href="league/1/edit" class="btn position-absolute top-0 end-0 m-2 px-2 btn-link text-warning zindex-5">
                                                            <i class='bx bx-cog'></i>
                                                        </a>
                                                    @endif
                                                    <img src="{{ url('assets/img/league/tournaments/MPL-Malaysia.png') }}" width="168"
                                                        alt="Doctor icon" class="p-3 pe-0">
                                                    <div
                                                        class="card-body text-center text-sm-start text-md-center text-xxl-start pb-3 pb-sm-2 pb-md-3 pb-xxl-2">
                                                        <h6 class="text-uppercase mb-2 mt-n4 mt-sm-0 mt-md-n4 mt-xxl-0 text-warning">
                                                            {{ $game->name }}
                                                        </h6>
                                                        <p class="fs-sm mb-1"> {{ $league['description'] }}</p>
                                                        <a class="btn btn-warning btn-sm rounded-pill disabled" aria-disabled="true">
                                                            Join Now
                                                            <i class="bx bx-right-arrow-alt fs-xl ms-1"></i>
                                                        </a>
                                                    </div>
                            
                                                    <!-- Overlay with text and background -->
                                                    <div class="overlay zindex-2">
                                                        <h3 class="fw-bold text-warning"><b>Registration closed</b></h3>
                                                    </div>
                            
                                                </div>
                                            </div>
            
                                        </div>
                                    @endif

                                @endforeach
                            </div>
                        @endforeach
                        
                        
                        {{-- <div class="swiper-wrapper ">
                            

                            <!-- Item -->
                            <div class="swiper-slide">
                                <h3 class="h5 text-uppercase mb-2 mt-n4 mt-sm-0 mt-md-n4 mt-xxl-0 text-warning text-center">
                                    {{ $league->league_name }}</h3>
                                <div
                                    class="card pt-1 pb-3 flex-column flex-sm-row flex-md-column flex-xxl-row align-items-center border-warning bg-black h-100">
                                    <img src="{{ url('assets/img/league/tournaments/MPL-Malaysia.png') }} " width="168"
                                        alt="Doctor icon" class="p-3 pe-0">
                                    <div
                                        class="card-body text-center text-sm-start text-md-center text-xxl-start pb-3 pb-sm-2 pb-md-3 pb-xxl-2">
                                        <h3 class="h6 text-uppercase mb-2 mt-n4 mt-sm-0 mt-md-n4 mt-xxl-0 text-warning">
                                            Wildcard</h3>

                                        <p class="fs-sm mb-1">Ongoing in Kuala Lumpur, Malaysia & Philippines.</p>
                                        <a href="/league/{{ $game->id }}" class="btn btn-link text-warning px-0">
                                            Join Now
                                            <i class='bx bxs-chevron-right-circle fs-xl ms-1' ></i>
                                        </a>
                                    </div>
                                </div>
                            </div>


                            <div class="swiper-slide">
                                <h3 class="h5 text-uppercase mb-2 mt-n4 mt-sm-0 mt-md-n4 mt-xxl-0 text-warning text-center">
                                    {{ $league->league_name }}</h3>
                                <div class="league">
                                    <div class="card pt-1 pb-3 flex-column flex-sm-row flex-md-column flex-xxl-row align-items-center border-warning h-100"
                                        style="background-color: rgba(0, 0, 0, 0.597);">
                                        <img src="{{ url('assets/img/league/tournaments/MPL-Malaysia.png') }}" width="168"
                                            alt="Doctor icon" class="p-3 pe-0">
                                        <div
                                            class="card-body text-center text-sm-start text-md-center text-xxl-start pb-3 pb-sm-2 pb-md-3 pb-xxl-2">
                                            <h6 class="text-uppercase mb-2 mt-n4 mt-sm-0 mt-md-n4 mt-xxl-0 text-warning">
                                                Knockout
                                            </h6>
                                            <p class="fs-sm mb-1">{{ $league->description }}</p>
                                            <a class="btn btn-link text-warning px-0" aria-disabled="true">
                                                Join Now
                                                <i class="bx bx-right-arrow-alt fs-xl ms-1"></i>
                                            </a>
                                        </div>
                
                                        <!-- Overlay with text and background -->
                                        <div class="overlay">
                                            <h2 class="fw-bold"><b>Coming Soon !</b></h2>
                                        </div>
                
                                    </div>
                                </div>

                            </div>

                            <div class="swiper-slide">
                                <h3 class="h5 text-uppercase mb-2 mt-n4 mt-sm-0 mt-md-n4 mt-xxl-0 text-warning text-center">
                                    M5 World Championship</h3>
                                <div class="league">
                                    <div class="card pt-1 pb-3 flex-column flex-sm-row flex-md-column flex-xxl-row align-items-center border-warning h-100"
                                        style="background-color: rgba(0, 0, 0, 0.597);">
                                        <img src="{{ url('assets/img/league/tournaments/MPL-Malaysia.png') }}" width="168"
                                            alt="Doctor icon" class="p-3 pe-0">
                                        <div
                                            class="card-body text-center text-sm-start text-md-center text-xxl-start pb-3 pb-sm-2 pb-md-3 pb-xxl-2">
                                            <h6 class="text-uppercase mb-2 mt-n4 mt-sm-0 mt-md-n4 mt-xxl-0 text-warning">
                                                Group Stage
                                            </h6>
                                            <p class="fs-sm mb-1">Ongoing in Kuala Lumpur, Malaysia & Philippines.</p>
                                            <a class="btn btn-link text-warning px-0" aria-disabled="true">
                                                Join Now
                                                <i class="bx bx-right-arrow-alt fs-xl ms-1"></i>
                                            </a>
                                        </div>
                
                                        <!-- Overlay with text and background -->
                                        <div class="overlay">
                                            <h2 class="fw-bold"><b>Coming Soon !</b></h2>
                                        </div>
                
                                    </div>
                                </div>

                            </div>

                        </div> --}}

                        <!-- Pagination -->
                        <div class="swiper-pagination"></div>
                    </div>
                </div>

            </div>
                
            @else
                <p class="text-warning">Please login first !</p>
            @endif
        </div>
    </section>
@endsection
