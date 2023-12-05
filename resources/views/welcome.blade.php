@extends('layouts.main-layout')

@section('content')

    <!-- Hero -->
    <section
        class="dark-mode hero bg-dark bg-size-cover bg-repeat-0 bg-position-center position-relative overflow-hidden py-5 "
        style="background-image: url({{ asset('assets/img/background/ml-bg.png') }});">
        <div class="container position-relative zindex-2 pb-md-2 pb-lg-4 pb-xl-5  hero-container ">
            <div class="row pt-3 pb-2 py-md-4 ">

                <!-- Text -->
                <div class="col-xl-5 col-md-6 pt-lg-5 text-center text-md-start mb-4 mb-md-0 mt-xxl-5">
                    <h1 class="display-2  pb-2 pb-sm-2">
                        <span class="text-warning text-uppercase">M5 World Championship</span>
                        Fantasy League
                    </h1>
                    <p class="fs-4 d-md-none d-xl-block pb-2 pb-md-0 mb-4 mb-md-5">
                        Draft your dream team, conquer the arena. M5 World Championships Fantasy League awaits.
                        Join the battle for glory and write your own heroic saga!
                    </p>
                    <div class="d-flex justify-content-center justify-content-md-start pb-2 pt-lg-2 pt-xl-0">
                        <a href="/league" class="btn btn-lg btn-warning shadow-warning me-3 me-sm-4 px-5 fs-4 w-75">Join us
                            now</a>
                    </div>
                    <div
                        class="d-flex align-items-center justify-content-center justify-content-md-start text-start pt-4 pt-lg-5 ">

                    </div>
                </div>


            </div>
        </div>
    </section>

@endsection
