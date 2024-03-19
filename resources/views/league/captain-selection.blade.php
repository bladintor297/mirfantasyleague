
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
            <h1 class="display-1 text-center mb-0 text-warning header-parallax hero-title">Captain</h1>
        </div>
        <div class="container mt-3 pt-md-2 pt-lg-4 pb-2 pb-md-4 pb-lg-5">
            
        
            <div class="position-relative mx-5">

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
                            'Roamer' => 'Roamer'
                        ] as $position => $label)
                            <!-- Player card -->
                            <div class="swiper-slide">
                                <a href="#" class="text-decoration-none">
                                    <!-- Display player image -->
                                    @foreach($players as $player)
                                        @if($player->id == $myteam->{$position})
                                            <!-- Player found, update the image source -->
                                            <img src="{{ asset('public/assets/img/players/'.$player->id.'.png') }}" class="d-block mx-auto zindex-5" alt="Screen" id="{{ $position }}Img">
                                            @php $playerFound = true; $count++; @endphp
                                            @break
                                        @endif
                                    @endforeach
                                    
                                    <!-- Display player label -->
                                    <h3 class="h6 text-center mt-3">{{ $label }}</h3>
                                    
                                    <!-- Radio buttons for captain and vice-captain selection -->
                                    <div class="text-start border-top border-1 mb-5">
                                        <div class="d-flex justify-content-center">
                                            <label class="form-check mt-3">
                                                <input type="radio" class="form-check-input" name="captain" value="{{ $player->id }}" id="captain-{{ $player->id }}" {{ $player->id == $myteam->captain ? 'checked' : '' }} required> Captain

                                            </label>
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <label class="form-check">
                                                <input type="radio" class="form-check-input" name="vice_captain" value="{{ $player->id }}" id="vice-captain-{{ $player->id }}" {{ $player->id == $myteam->vice_captain ? 'checked' : '' }}required> Vice Captain
                                            </label>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                        

                    </div>
                </div>

            </div>

   
            
            <div class="row mt-md-3">
                <div class="col d-flex justify-content-center align-items-center">
                    <h3 class="h4 pb-1 mb-0 text-warning text-gaming">Step 3. Select captain & vice captain </h3>
                        <span class="text-success"><i class='bx bxs-check-circle' style='font-size: 28px;'></i></span>
                </div>
            </div>

            <div class="row">
                <div class="col d-flex justify-content-center align-items-center">
                    <form action="{{ route('captain.update', ['captain' => $myteam]) }}" id="playerForm" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="selected_captain" id="selectedCaptain">
                        <input type="hidden" name="selected_vice_captain" id="selectedViceCaptain">
                        <button type="submit" id="proceedButton" class="btn btn-primary shadow px-5 fw-bold rounded-pill btn-sm">Proceed</button>
                    </form>
                </div>
            </div>


        </div>


    </section>

    <!-- JavaScript to handle radio button selections -->
    <script>
        // Listen for changes in radio button selections
        document.querySelectorAll('input[type="radio"]').forEach(function(radio) {
            radio.addEventListener('change', function() {
                // Update hidden input fields with selected IDs
                var playerId = this.value;
                if (this.name === 'captain') {
                    document.getElementById('selectedCaptain').value = playerId;
                } else if (this.name === 'vice_captain') {
                    document.getElementById('selectedViceCaptain').value = playerId;
                }
            });
        });
    
        document.addEventListener('DOMContentLoaded', function() {
            // Listen for form submission
            document.getElementById('playerForm').addEventListener('submit', function(event) {
                // Check if both captain and vice-captain are selected
                if (!isCaptainSelected() || !isViceCaptainSelected()) {
                    // Prevent form submission
                    event.preventDefault();
                    // Display error message or take any other necessary action
                    alert('Please select both a captain and a vice-captain.');
                }
            });

            // Function to check if a captain is selected
            function isCaptainSelected() {
                var captainRadioButtons = document.querySelectorAll('input[name="captain"]');
                for (var i = 0; i < captainRadioButtons.length; i++) {
                    if (captainRadioButtons[i].checked) {
                        return true;
                    }
                }
                return false;
            }

            // Function to check if a vice-captain is selected
            function isViceCaptainSelected() {
                var viceCaptainRadioButtons = document.querySelectorAll('input[name="vice_captain"]');
                for (var i = 0; i < viceCaptainRadioButtons.length; i++) {
                    if (viceCaptainRadioButtons[i].checked) {
                        return true;
                    }
                }
                return false;
            }
        });
    </script>

@endsection