
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
        <h1 class="text-white tst header-parallax mb-0">SELECT CAPTAIN</h1>
    </div>

    <!-- How it works (Slider) -->
    <section class="position-relative bg-white py-5" style="min-height:100vh">
        <!-- Page title -->
        <div class="mt-4 mb-lg-2 mb-2 pt-3">
            <h1 class="h3 text-center mb-0 text-gaming d-grid ">
                <span class="text-dark my-0 py-0">{{ $league->league_name }}: </span>
                <span class="text-warning header-parallax hero-title my-0 py-0">{{ $game->name }}</span>
            </h1>
        </div>
        <div class="container mt-3 pt-md-2 pt-lg-4 pb-2 pb-md-4 pb-lg-5">
            
        
            <div class="position-relative mx-5 mb-3">

                <!-- Slider prev/next buttons -->
                <button type="button" id="prev-screen" class="btn btn-prev btn-icon position-absolute top-50 start-0 ms-n5 translate-middle-y" aria-label="Previous">
                    <i class="bx bx-chevron-left"></i>
                </button>
                <button type="button" id="next-screen" class="btn btn-next btn-icon position-absolute top-50 end-0 me-n5 translate-middle-y" aria-label="Next">
                    <i class="bx bx-chevron-right"></i>
                </button>


                <!-- Swiper slider -->
                <div class="swiper" data-swiper-options='{
                    "slidesPerView": 1,
                    "spaceBetween": 24,
                    "centeredSlides": true,
                    "loop": true,
                    "autoplay": {
                        "delay": 1000,
                        "disableOnInteraction": true
                    },
                    "tabs": true,
                    "pagination": {
                        "el": "#swiper-progress",
                        "type": "progressbar"
                    },
                    "navigation": {
                        "prevEl": "#prev-screen",
                        "nextEl": "#next-screen"
                    },
                    "breakpoints": {
                        "768": { "slidesPerView": 5 }
                    }
                }'>

                    <div class="swiper-wrapper">

                        @php
                            $count = 0;
                        @endphp

                        <!-- Iterate through player positions -->
                        @foreach ([
                            'EXPLaner' => 'EXP Laner',
                            'Jungler' => 'Jungler',
                            'MidLaner' => 'Mid Laner',
                            'GoldLaner' => 'Gold Laner',
                            'Roamer' => 'Roamer',
                        ] + ($game->reserve_isOn ? [
                            'Reserve_1' => '(Reserve) EXP Laner ',
                            'Reserve_2' => '(Reserve) Jungler ',
                            'Reserve_3' => '(Reserve) Mid Laner ',
                            'Reserve_4' => '(Reserve) Gold Laner ',
                            'Reserve_5' => '(Reserve) Roamer ',
                        ] : []) as $position => $label)
                            @if($myteam->{$position} !== null || $myteam->{$position} !== 'EXPLaner' || $myteam->{$position} !== 'Jungler' || $myteam->{$position} !== 'MidLaner' || $myteam->{$position} !== 'GoldLaner' || $myteam->{$position} !== 'Roamer')
                                
                                <!-- Player card -->
                                <div class="swiper-slide">
                                    <a href="#" class="text-decoration-none">

                                    @php
                                        $playerFound = false;
                                    @endphp
                                    
                                    @foreach($players as $player)
                                        @if($player->id == $myteam->{$position})
                                            <!-- Player found, update the image source -->
                                            <img src="{{ asset('public/assets/img/players/'.$player->id.'.png') }}" class="d-block mx-auto zindex-5" alt="Screen" id="{{ $position }}Img">
                                            @php $playerFound = true; $count++; @endphp
                                            @break
                                        @endif
                                    @endforeach

                                    @if (!$playerFound)
                                        <!-- No player found, keep the original image source -->
                                        <img src="{{ asset('assets/img/league/hero-selection/default-screen.png') }}" class="d-block mx-auto zindex-5" alt="Screen" id="{{ $position }}Img">
                                    @endif
                                        
                                        <!-- Display player label -->
                                        <h3 class="h6 text-center mt-3 mb-0">{{ $label }}</h3>
                                        
                                        <div class="mt-2 mb-3">
                                            <div class="d-flex justify-content-center fs-sm">
                                                @if ($player->id == $myteam->captain)
                                                    <span class="badge bg-primary rounded-pill">
                                                        <i class='bx bx-crown text-white my-auto mx-1'></i>
                                                        <span class="me-1">Captain</span>
                                                    </span>
                                                @endif
                                            </div>
        
                                            <div class="d-flex justify-content-center fs-sm">
                                                @if ($player->id == $myteam->vice_captain)
                                                    <span class="badge bg-secondary rounded-pill">
                                                        <i class='bx bx-crown my-auto mx-1'></i>
                                                        <span class="me-1">Vice Captain</span>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        
                                    </a>
                                </div>

                            @endif
                            
                        @endforeach
                        

                    </div>
                </div>

            </div>

   
            <hr class="mt-3"></div>
            <div class="row">
                <div class="col d-flex justify-content-center align-items-center">
                    <a href="/hero/{{ $myteam->id }}/edit" class="btn btn-primary shadow px-5 fw-bold rounded-pill  btn-sm{{ $myteam->isCompleted == 0 ? '' : ' disabled' }}">Edit Team</a>
                </div>
            </div>
            <div class="row mt-md-3 mt-3">
                <div class="col d-flex justify-content-center align-items-center">
                    <h3 class="h4 pb-1 mb-0 text-warning text-gaming">Step Step {{ $game->reserveIsOn ? '4' : '3' }}. Your team is completed</h3>
                        @if ($myteam->isCompleted == 1)
                            <span class="text-success"><i class='bx bxs-check-circle' style='font-size: 28px;'></i></span>
                        @else
                            <span class="text-danger"><i class='bx bxs-x-circle' style='font-size: 28px;'></i></span>
                        @endif
                </div>
            </div>

            {{-- <div class="row">
                <div class="col d-flex justify-content-center align-items-center">
                    <form action="{{ route('captain.update', ['captain' => $myteam]) }}" id="playerForm" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="selected_captain" id="selectedCaptain">
                        <input type="hidden" name="selected_vice_captain" id="selectedViceCaptain">
                        <button type="submit" id="proceedButton" class="btn btn-primary shadow px-5 fw-bold rounded-pill btn-sm">Proceed</button>
                    </form>
                </div>
            </div> --}}


        </div>


    </section>

@endsection