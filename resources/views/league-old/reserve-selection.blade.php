
@extends('layouts.main-layout')

@section('content')
    <style>
        .swiper-slide {
            opacity: 0.75 !important;
            transform: scale(0.90);
            transition: transform 0.5s ease;
        }
        .swiper-slide-active {
            transform: scale(1.00); /* Increase size by 20% */
            transition: transform 0.5s ease; /* Add a smooth transition */
            z-index: 1; /* Ensure the active slide is on top */
            opacity: 1 !important;

        }
    </style>
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

    <!-- How it works (Slider) -->
    <section class="position-relative bg-white py-5" style="min-height:100vh">
        <!-- Page title -->
        <div class="mt-4 mb-lg-2 mb-2 pt-3">
            <h1 class="display-1 text-center mb-0 text-warning header-parallax hero-title">Reserve Line-Up</h1>
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
                <div class="swiper " data-swiper-options='{
                        "slidesPerView": 1,
                        "initialSlide": {{ session('currentSlide', 0) }},
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
                        

                        @for ($i = 1; $i <= 5; $i++)
                            <!-- Item -->
                            <div class="swiper-slide" data-swiper-tab="#text-{{ $i }}">
                                <a
                                    @if ($count == $game->reserve_limit)
                                        {{-- If $count equals reserve_limit, make the slide unclickable --}}
                                        href="javascript:void(0);" 
                                        onclick="alert('Reserve limit reached. To make any changes, click reset line-up.');" 
                                    @else
                                        {{-- If $count does not equal reserve_limit, enable the modal --}}
                                        data-bs-toggle="modal" data-bs-target="#selectReserve_{{ $i }}"
                                    @endif class="text-decoration-none">
                                    
                                    @php
                                        $playerFound = false; // Initialize player found flag
                                    @endphp
                    
                                    @foreach($players as $player)
                                        @if($player->id == $myteam->{'Reserve_'.$i})
                                            <!-- Player found, update the image source -->
                                            <img src="{{ asset('assets/img/players/'.$player->id.'.png') }}" class="d-block mx-auto zindex-5" alt="Screen" id="Reserve_{{ $i }}Img">
                                            @php $playerFound = true;@endphp
                                            @break
                                        @endif
                                    @endforeach
                                    
                                    @if (!$playerFound)
                                        <!-- No player found, keep the original image source -->
                                        <img src="{{ asset('assets/img/league/hero-selection/default-screen.png') }}" class="d-block mx-auto zindex-5" alt="Screen" id="Reserve_{{ $i }}Img">
                                    @endif
                                    
                                    <h3 class="h6 text-center mt-3">Reserve_{{ $i }}</h3>
                                </a>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-center mx-5 mb-sm-2">
                <form action="{{ route('reserve.destroy', ['reserve' => $myteam]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                
                    <button class="btn btn-outline-danger btn-sm me-lg-2 shadow-danger" type="submit" aria-label="Dismiss">
                        <i class="bx bx-error-circle"></i>
                        <span class="ms-2">Reset Line Up</span>
                    </button>
                </form>
            </div>

            <!-- Swiper tabs (Description text) -->
            <div class="row justify-content-center mt-2 mt-md-3">
                <div class="swiper-tabs col-xl-6 col-lg-7 col-md-8 text-center">
                    
                    
                    <!-- Text 1 -->
                    <div id="text-1" class="swiper-tab <?php echo session('currentSlide') == 0 ? 'active' : ''; ?>">
                        <h3 class="h5 pb-1 mb-2"> Choose your Reserve 1 (EXP Laner)</h3>
                    </div>

                    <!-- Text 2 -->
                    <div id="text-2" class="swiper-tab <?php echo session('currentSlide') == 1 ? 'active' : ''; ?>">
                        <h3 class="h5 pb-1 mb-2"> Choose your Reserve 2 (Jungler)</h3>
                    </div>

                    <!-- Text 3 -->
                    <div id="text-3" class="swiper-tab <?php echo session('currentSlide') == 2 ? 'active' : ''; ?>">
                        <h3 class="h5 pb-1 mb-2"> Choose your Reserve 3 (Mid Laner)</h3>
                    </div>

                    <!-- Text 4 -->
                    <div id="text-4" class="swiper-tab <?php echo session('currentSlide') == 3 ? 'active' : ''; ?>">
                        <h3 class="h5 pb-1 mb-2"> Choose your Reserve 4 (Gold Laner)</h3>
                    </div>

                    <!-- Text 5 -->
                    <div id="text-5" class="swiper-tab <?php echo session('currentSlide') == 4 ? 'active' : ''; ?>">
                        <h3 class="h5 pb-1 mb-2"> Choose your Reserve 5 (Roamer)</h3>
                        {{-- <p class="mb-0">A sed lorem felis, pulvinar pharetra. At tempus, vel sed faucibus amet sit elementum sed erat. Id nunc blandit pharetra facilisis.</p> --}}
                    </div>


                    
                </div>
            </div>


            <div class="row mt-2 mt-md-3">
                <div class="col d-flex justify-content-center align-items-center">
                    <h3 class="h4 pb-1 mb-0 text-warning text-gaming">Step 2. Form {{ $game->reserve_limit }} Reserve Line Up</h3>
                    @if ($count == $game->reserve_limit)
                        <span class="text-success"><i class='bx bxs-check-circle' style='font-size: 28px;'></i></span>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col d-flex justify-content-center align-items-center">
                    <a href="/captain/{{ $myteam->id }}" class="btn btn-primary shadow px-5 fw-bold rounded-pill  btn-sm{{ $count == $game->reserve_limit ? '' : ' disabled' }}" >Proceed {{ $count }} {{ $game->reserve_limit }}</a>
                </div>
            </div>


        </div>


        @php
        $roles = ['EXP Laner', 'Jungler', 'Mid Laner', 'Gold Laner', 'Roamer'];
        @endphp
        
        @for ($i = 1; $i <= count($roles); $i++)
            <!-- Modal -->
            <div class="modal fade" id="selectReserve_{{ $i }}" tabindex="-1" aria-labelledby="selectReserve_{{ $i }}Label" aria-hidden="true">
                <div class="modal-dialog  modal-xl">
                    <div class="modal-content">
                        <div class="modal-header text-center">
                            <h1 class="modal-title display-5 my-0 py-0 text-center text-gaming text-warning" id="selectReserve_{{ $i }}Label">Choose your {{ $roles[$i-1] }}</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Square image (default) -->
                            <div class="row row-cols-2 row-cols-sm-3 row-cols-md-3 row-cols-lg-5 g-4 mt-2 mt-lg-4">
                                @foreach ($players->where('role', $i - 1) as $player)
                                    <!-- Item -->
                                    <div class="col">
                                        <div class="card card-hover border-0 bg-transparent">

                                            @foreach ($teamExceedLimit as $team)
                                                @if ($team == $player->team)
                                                    <div class="card-img-overlay d-flex flex-column align-items-center justify-content-center rounded-3">
                                                        <span class="position-absolute top-0 start-0 w-100 h-100 bg-dark opacity-50 rounded-3"></span>
                                                        <div class="position-relative zindex-2" >
                                                            <h3 class="h5 text-center mb-2 text-danger">Cannot be selected</h3>
                                                            <span class="fs-sm text-white fst-italic fw-bold text-center opacity-75">Exceeded player limit for the same team</span>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach

                                            @if ($foreignPlayerReached)
                                                @if (!($player->nationality == "Malaysia"))
                                                    <div class="card-img-overlay d-flex flex-column align-items-center justify-content-center rounded-3">
                                                        <span class="position-absolute top-0 start-0 w-100 h-100 bg-dark opacity-50 rounded-3"></span>
                                                        <div class="position-relative zindex-2" >
                                                            <h3 class="h5 text-center mb-2 text-danger">Cannot be selected</h3>
                                                            <span class="fs-sm text-white fst-italic fw-bold text-center opacity-75">Exceeded player limit for foreign countries</span>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endif

                                            <div class="position-relative">
                                                <img src="{{ asset('assets/img/players/'.$player->id.'.png') }}" class="modal-img" alt="{{ $player->name }}" data-player-id="{{ $player->id }}" style="width: 100%; height: auto; object-fit: cover;">
                                            </div>
                                            <div class="card-body text-center p-3">
                                                <h3 class="fs-lg fw-semibold pt-1 mb-2">{{ $player->name }}</h3>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endfor
    

            <form action="{{ route('hero.update', ['hero' => $myteam]) }}" id="playerForm" method="POST"> 
                {{-- Use same method, hence, same --}}
                @csrf
                @method('PUT')
                    <input type="hidden" name="Reserve_1" id="Reserve_1">
                    <input type="hidden" name="Reserve_2" id="Reserve_2">
                    <input type="hidden" name="Reserve_3" id="Reserve_3">
                    <input type="hidden" name="Reserve_4" id="Reserve_4">
                    <input type="hidden" name="Reserve_5" id="Reserve_5">
                    <input type="hidden" name="currentSwiper" id="currentSwiper" value="">
            </form>

        <!-- Slider progress -->
        {{-- <div id="swiper-progress" class="swiper-pagination bottom-0" style="top: auto;"></div> --}}
        
    </section>

    <script>
        // Function to handle modal image selection
        function handleModalImageSelection(modalId, swiperImageId, roleId) {
            const modalImages = document.querySelectorAll(`#${modalId} img`);
            const swiperImage = document.querySelector(`#${swiperImageId}`);
            const roleInput = document.querySelector(`#${roleId}`);
            const swiperIndex = document.getElementById('currentSwiper');
            
            modalImages.forEach(image => {
                image.addEventListener('click', function() {
                    const newImageSrc = this.src;
                    
                    swiperImage.src = newImageSrc;
                    const playerId = image.getAttribute('data-player-id');
                    console.log('Selected Player ID:', playerId);

                    if (roleInput.name === 'Reserve_2') {
                        swiperIndex.value = 1;
                    } else if (roleInput.name === 'Reserve_3') {
                        swiperIndex.value = 2;
                    } else if (roleInput.name === 'Reserve_4') {
                        swiperIndex.value = 3;
                    } else if (roleInput.name === 'Reserve_5') {
                        swiperIndex.value = 4;
                    } else
                        swiperIndex.value = 0;

                    // Set the player ID to the corresponding hidden input field
                    roleInput.value = playerId;

                    // Submit the form
                    playerForm.submit();
                    
                    $(`#${modalId}`).modal('hide');
                });
            });
        }
    
        // Call the function for each modal and swiper image pair
        handleModalImageSelection('selectReserve_1', 'Reserve_1Img', 'Reserve_1');
        handleModalImageSelection('selectReserve_2', 'Reserve_2Img', 'Reserve_2');
        handleModalImageSelection('selectReserve_3', 'Reserve_3Img', 'Reserve_3');
        handleModalImageSelection('selectReserve_4', 'Reserve_4Img', 'Reserve_4');
        handleModalImageSelection('selectReserve_5', 'Reserve_5Img', 'Reserve_5');
    </script>
@endsection
