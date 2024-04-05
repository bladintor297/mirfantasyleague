
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
        <h1 class="text-white tst header-parallax mb-0">My Teams</h1>
    </div>

    <!-- How it works (Slider) -->
    <section class="position-relative bg-secondary py-5">
        <!-- Page title -->
        <div class="mt-4 mb-lg-2 pt-3">
            <h1 class="h3 text-center mb-0 text-gaming d-grid ">
                <span class="text-dark my-0 py-0">{{ $game->league->league_name }}: </span>
                <span class="text-warning header-parallax hero-title my-0 py-0">{{ $game->name }}</span>
            </h1>
        </div>
        <div class="container py-md-2 py-lg-2">
            <div class="row pb-5">
                @foreach ($myteams as $myteam)
                <div class="col-lg-3 col-md-4">
                    <div class="card mt-3 card-hover">
                        <div class="card-header fw-bolder text-center d-grid my-0 py-3">
                            <span class="text-gaming h5 my-0 py-0">Team {{$myteam->label }}</span>
                            <span>
                                @if ($myteam->isCompleted !== '1')
                                    <span class="badge bg-danger shadow-danger">Incomplete</span>
                                @else
                                    <span class="badge bg-success shadow-success">Completed</span>
                                @endif
                            </span>
                        
                        </div>
                        <div class="card-body mb-0 pb-0 ">

                            <!-- Swiper slider -->
                            <div class="swiper" data-swiper-options='{
                                "spaceBetween": 20,
                                    "loop": true,
                                    "autoplay": {
                                        "delay": 2000,
                                        "disableOnInteraction": false
                                    },
                                    "pagination": {
                                        "el": ".swiper-pagination",
                                        "clickable": true
                                    }
                                }'>

                                <div class="swiper-wrapper mb-3">

                                    @php
                                        $count = 0;
                                    @endphp

                                    <!-- Iterating through different player positions -->
                                    @foreach ([
                                        'EXPLaner' => 'EXP Laner',
                                        'Jungler' => 'Jungler',
                                        'MidLaner' => 'Mid Laner',
                                        'GoldLaner' => 'Gold Laner',
                                        'Roamer' => 'Roamer'
                                    ] as $position => $label)
                                        <!-- Item -->
                                        <div class="swiper-slide" data-swiper-tab="#text-{{ $loop->iteration }}">
                                            <a data-bs-toggle="modal" data-bs-target="#select{{ $position }}" class="text-decoration-none">
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

                                                <h3 class="h6 text-center mt-3">{{ $label }}</h3>
                                            </a>
                                        </div>
                                    @endforeach

                                </div>

                                <!-- Pagination -->
                                <div class="swiper-pagination mt"></div>
                            </div>
                        </div>
                        <div class="card-footer my-0 py-1 d-flex justify-content-center">
                            <a href="/hero/{{ $myteam->id }}/edit"
                                class="btn btn-sm py-1 btn-warning strechted-link px-5  rounded-pill my-2 {{ ($game->transfer_isOn == 1) ? '' : 'disabled' }}">
                                <span class="text-dark fw-bold stretched-link">Edit Team</span>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
                
            </div>
            

        </div>

        @if (!$myteams->first()->term_isRead)
            <div class="modal fade" tabindex="-1" id="onload" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Game Rules</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Icon boxes (Features) -->

                                    <!-- Vertical steps -->
                                    <div class="steps">

                                        <form action="{{ route('myteam.update', ['myteam' => 'terms']) }}" method="post">
                                            @csrf
                                            @method('PUT')

                                            <!-- Step -->
                                            <div class="col">
                                                
                                                <div class="step-body">
                                                    <p class="fs-sm mb-0">
                                                        {{ $game->brief_info }}</p>
                                                </div>
                                            </div>

                                            <!-- Step -->
                                            <div class="step">
                                                <div class="step-number">
                                                    <div class="step-number-inner">1</div>
                                                </div>
                                                <div class="step-body">
                                                    <h5 class="mb-2">General Instructions</h5>
                                                    <p class="fs-sm mb-0">
                                                        <ol class="fs-sm">
                                                            @php
                                                                $instructions = explode('// ', $game->instructions); // Replace $yourDynamicData with the variable holding your dynamic data
                                                            @endphp

                                                            @foreach($instructions as $item)
                                                                @if(trim($item) !== '')
                                                                    <li>{{ trim($item) }}</li>
                                                                @endif
                                                            @endforeach

                                                        </ol>
                                                    </p>
                                                </div>
                                            </div>

                                            <!-- Step -->
                                            <div class="step">
                                                <div class="step-number">
                                                    <div class="step-number-inner">2</div>
                                                </div>
                                                <div class="step-body">
                                                    <h5 class="mb-2">Player Limits</h5>
                                                    <p class="fs-sm mb-0">
                                                        <ul class="fs-sm">
                                                            @php
                                                                $player_rules = explode('// ', $game->player_rule); // Replace $yourDynamicData with the variable holding your dynamic data
                                                            @endphp

                                                            @foreach($player_rules as $item)
                                                                @if(trim($item) !== '')
                                                                    <li>{{ trim($item) }}</li>
                                                                @endif
                                                            @endforeach

                                                        </ul>
                                                    </p>
                                                </div>
                                            </div>

                                            <!-- Step -->
                                            <div class="step">
                                                <div class="step-number">
                                                    <div class="step-number-inner">3</div>
                                                </div>
                                                <div class="step-body">
                                                    <h5 class="mb-2">Reserve Rule</h5>
                                                    <p class="fs-sm mb-0">
                                                        <ul  class="fs-sm">
                                                            @php
                                                                $reserve_rules = explode('// ', $game->reserve_rule); // Replace $yourDynamicData with the variable holding your dynamic data
                                                            @endphp

                                                            @foreach($reserve_rules as $item)
                                                                @if(trim($item) !== '')
                                                                    <li>{{ trim($item) }}</li>
                                                                @endif
                                                            @endforeach

                                                        </ul>
                                                    </p>
                                                </div>
                                            </div>

                                            <!-- Step -->
                                            <div class="step">
                                                <div class="step-number">
                                                    <div class="step-number-inner">4</div>
                                                </div>
                                                <div class="step-body">
                                                    <h5 class="mb-2">Transfer Window</h5>
                                                    <p class="fs-sm mb-0">
                                                        <ul class="fs-sm">
                                                            @php
                                                                $transfer_rules = explode('// ', $game->transfer_rule); // Replace $yourDynamicData with the variable holding your dynamic data
                                                            @endphp

                                                            @foreach($transfer_rules as $item)
                                                                @if(trim($item) !== '')
                                                                    <li>{{ trim($item) }}</li>
                                                                @endif
                                                            @endforeach

                                                        </ul>
                                                    </p>
                                                </div>
                                            </div>


                                            <!-- Step -->
                                            <div class="step">
                                                <div class="step-number">
                                                    <div class="step-number-inner">5</div>
                                                </div>
                                                <div class="step-body">
                                                    <h5 class="mb-2">Scoring</h5>
                                                    <p class="fs-sm mb-0">
                                                        <ul class="fs-sm">
                                                            @php
                                                                $scoring = explode('// ', $game->scoring); // Replace $yourDynamicData with the variable holding your dynamic data
                                                            @endphp

                                                            @foreach($scoring as $item)
                                                                @if(trim($item) !== '')
                                                                    <li>{{ trim($item) }}</li>
                                                                @endif
                                                            @endforeach
                                                        </ul>
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="col d-flex justify-content-center ">
                                                <input type="hidden" value="{{ $game->id }}" name="game_id">
                                                <button type="submit" class="btn btn-warning px-5 btn-sm rounded-pill">Agree</button>
                                            </div>
                                        </form>
                                    </div>


                        </div>
                    </div>
                </div>
            </div>
            
            <!--Modal JS Script -->
            <script type="text/javascript">
                window.onload = () => {
                    $('#onload').modal('show');
                }
            </script>
        @endif

    </section>


@endsection