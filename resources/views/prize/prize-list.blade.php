@extends('layouts.main-layout')

@section('content')

    <!-- Hero image -->
    <div class="jarallax d-none d-md-block" data-jarallax data-speed="0.35" style="position: relative;">
        <span class="position-absolute top-0 start-0 w-100 h-100 "></span>
        <div class="jarallax-img"
            style="background-image: url('{{ asset('assets/img/background/parallax-pharsa.png') }}'); width: 100%; background-size: cover;">
        </div>
        <div class="d-none d-xxl-block" style="height: 450px;"></div>
        <div class="d-none d-md-block d-xxl-none" style="height: 550px;"></div>
        <h1 class="text-white tst header-parallax mb-0">PRIZE POOL</h1>
    </div>

    <!-- How it works (Slider) -->
    <!-- Hero -->
    <section class="bg-size-cover  bg-position-center position-relative overflow-hidden py-5 ">
        <div class="container position-relative zindex-2 ">
            <div class="row pt-3">

                <!-- Title -->
                <div class="row d-flex justify-content-center text-center mb-3" >
                    
                    <div class="col-12 d-md-flex justify-content-center mt-5 text-gaming">
                        <h2 class="display-2 text-white text-uppercase ">
                            <span class="text-warning">Prize</span><span class="text-muted"> Pool</span>
                        </h2>
                    </div>
                    <div class="col-12 d-md-flex justify-content-start text-gaming" style="min-height: 50vh">
                        <div class="parallax mx-auto ms-md-0 me-md-n5">
                            <div class="parallax-layer zindex-5" data-depth="0.15">
                                <img src="{{ asset('assets/img/prizes/default_prize.png') }}" alt="Card" style="filter: drop-shadow(2px 4px 8px hsla(0, 0%, 100%, 0.499))">
                            </div>
                            {{-- <div class="parallax-layer zindex-4" data-depth="-0.30">
                                <img src="{{ asset('assets/img/prize/' . $id . '/overall_second_prize.png') }}" alt="Card" style="filter: drop-shadow(2px 4px 8px hsla(0, 0%, 100%, 0.499))">
                            </div>
                            <div class="parallax-layer zindex-3" data-depth="-0.25">
                                <img src="{{ asset('assets/img/prize/' . $id . '/overall_third_prize.png') }}" alt="Bubble" style="filter: drop-shadow(2px 4px 8px hsla(0, 0%, 100%, 0.499))">
                            </div> --}}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection