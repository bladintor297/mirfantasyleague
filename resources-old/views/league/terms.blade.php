@extends('layouts.main-layout')

@section('content')
<!-- Hero image -->
<div class="jarallax d-none d-md-block" data-jarallax data-speed="0.35" style="position: relative;">
    <span class="position-absolute top-0 start-0 w-100 h-100 "></span>
    <div class="jarallax-img"
        style="background-image: url('{{ asset('assets/img/league/header-wildcard.png') }}'); background-size: cover;">
    </div>
    <div class="d-none d-xxl-block" style="height: 500px;"></div>
    <div class="d-none d-md-block d-xxl-none" style="height: 550px;"></div>
</div>

<!-- Hero -->
<section
    class="dark-mode bg-dark hero bg-size-cover bg-repeat-0 bg-position-center position-relative overflow-hidden pb-5 ">
    <div class="container position-relative zindex-2 pb-md-2 pb-lg-4  hero-container ">

        <!-- Title -->
        <div class="row d-flex justify-content-center text-center pb-4 mb-2 zindex-5">
            <div class="col">
                <h2 class="display-5 mb-4 text-warning">M5 World Championship</h2>
            </div>
        </div>

        <!-- Icon boxes (Features) -->
        <div class="row row-cols-1 row-cols-md-3 g-4 pt-2 pt-md-4 pb-lg-2 d-flex justify-content-center">

            <div class="row g-3 card shadow w-75 py-4 px-5 overflow-auto" style="height:500px">

                @php $count = 0 @endphp
                
                <!-- Step 1: Rules and Regulations -->
                <div class="step-box" id="step{{ ++$count }}">
                    <form action="{{ route('myTeam.update', ['myTeam' => 'TeamSelect']) }}" method="post">
                    @csrf
                    @method('PUT')

                        <div class="col mb-5">
                            <p class="h6 text-white" align="justify">
                                {{ $game->brief_info }}
                            </p>
                            {{-- <h5><u></u></h5> --}}
                        </div>
                        <div class="col">

                            <!-- Vertical steps -->
                            <div class="steps  steps-sm text-white">

                                <!-- Step -->
                                <div class="step">
                                    <div class="step-number">
                                        <div class="step-number-inner">1</div>
                                    </div>
                                    <div class="step-body">
                                        <h5 class="mb-2">Instructions for participation in the game:</h5>
                                        <p class="fs-sm mb-0">
                                            <ol>
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
                                            <ul>
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
                                        <h5 class="mb-2">Reserve Rules</h5>
                                        <p class="fs-sm mb-0">
                                            <ul>
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
                                            <ul>
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
                                            <ul>
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

                            </div>

                        </div>
                        <div class="col d-flex justify-content-end">
                            <input type="hidden" value="{{ $game->id }}" name="game_id">
                            <button type="submit" class="btn btn-warning px-3">Agree</button>
                        </div>
                    </form>

                </div>

            </div>

        </div>
    </div>
</section>
<script>
    // Store scroll position before reload
    window.onbeforeunload = function () {
        sessionStorage.setItem('scrollPosition', window.scrollY);
    };

    // Set scroll position after reload
    window.onload = function () {
        var scrollPosition = sessionStorage.getItem('scrollPosition');
        window.scrollTo(0, scrollPosition || 0);
    };
</script>

@endsection