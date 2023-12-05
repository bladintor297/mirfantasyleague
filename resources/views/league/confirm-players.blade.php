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
                <h2 class="display-5 mb-4 text-warning">M5 Tournament Championship</h2>
            </div>
        </div>

        <!-- Icon boxes (Features) -->
        <div class="row row-cols-1 row-cols-md-3 g-4 pt-2 pt-md-4 pb-lg-2 d-flex justify-content-center">

            <div class="row g-3 card shadow w-75 py-4 px-5 overflow-auto" style="height:500px">

                @php $count = 0 @endphp
                
                <!-- Step 2: Hero Selection -->
                <div class="step-box" id="step{{ ++$count }}">
                    <form action="{{ route('myTeam.update', ['myTeam' => 2]) }}" method="post" id="selectHeroForm">
                        @csrf
                        @method('PUT')

                        <div class="col">
                            <p class="h4 text-center text-uppercase text-white" align="justify">
                                - Choose Captain -
                            </p>
                        </div>
                        <div class="col-12 mb-5 mb-lg-3">
                            <div class="row">
                                @php
                                    $roles = [
                                        "EXP_Laner",
                                        "Jungler",
                                        "Mid_Laner",
                                        "Gold_Laner",
                                        "Roamer",
                                    ];
                                @endphp
                                @foreach($roles as $roleKey => $roleValue)
                                    <div class="col">

                                        <div class="card bg-gradient" style="height: 300px; width: 150px">

                                            <div class="card-body d-flex align-items-center justify-content-center"
                                            style="background-image: url('{{ $myTeam->{$roleValue} ? $players->where('id', $myTeam->{$roleValue})->first()->picture : '' }}'); background-size: cover;">
                                                <input name="playerName{{$roleKey}}" class="btn btn-link text-warning stretched-link openModalButton" data-index="{{ $roleKey }}"
                                                value="{{ isset($myTeam->{$roleValue}) ? $players->where('id', $myTeam->{$roleValue})->first()->name : '+' }}">
                                                <input type="hidden" name="playerID{{$roleKey}}" class="btn btn-link text-warning stretched-link"
                                                value="{{ isset($myTeam->{$roleValue}) ? $myTeam->{$roleValue} : '+' }}">
                                            </div>
                                            <div class="card-footer text-white text-center">
                                                {{ $roleValue }}
                                                
                                            </div>
                                        </div>
                                        
                                        <div class="text-start border-top border-1 mb-5">
                                            <label>
                                                <input type="radio" name="captain" value="{{ $myTeam->{$roleValue} }}" required onclick="checkSelection()" {{ $myTeam->{$roleValue} == $myTeam->captain ? 'checked' : '' }}> Captain
                                            </label>
                                            <label>
                                                <input type="radio" name="vice_captain" value="{{ $myTeam->{$roleValue} }}" required onclick="checkSelection()" {{ $myTeam->{$roleValue} == $myTeam->vice_captain ? 'checked' : '' }}> Vice-Captain
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="d-flex justify-content-center">

                                <!-- Add a hidden input field to store the current step index -->
                                {{-- <input type="hidden" id="currentStep" name="currentStep" value="{{$step}}"> --}}
                            </div>
                        
                        

                        @if (Session::has('playerName_0'))
                            <script>
                                alert(session(''))
                            </script>
                        @endif
                        
                    </div>

                        
                        <div class="col d-flex justify-content-between mt-2 pb-3 py-2">
                            <input type="hidden" value="{{ $game->id }}" name="game_id">
                            <input type="hidden" value="{{ $myTeam->id }}" name="myTeam_id">
                            <a href="/league/{{ $game->id }}" class="btn btn-warning mx-1">Back</a>
                            <button type="submit" class="btn btn-warning mx-1" >Next</button>
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
<script>
    function checkSelection() {
        var captainSelected = document.querySelector('input[name="captain"]:checked');
        var viceCaptainSelected = document.querySelector('input[name="vice_captain"]:checked');
        var nextButton = document.getElementById('confirmHero-btn');

        if (captainSelected && viceCaptainSelected) {
            nextButton.classList.remove('disabled');
        } else {
            nextButton.classList.add('disabled');
        }
    }
</script>


@endsection