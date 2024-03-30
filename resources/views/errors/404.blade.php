@extends('layouts.main-layout')

@section('content')
<div class="d-dark-mode-none position-absolute top-0 start-0 w-100 h-100 bg-repeat-0 bg-position-center bg-size-cover"
    style="background-image: url({{ asset('assets/img/404/light/bg.jpg') }});"></div>

<!-- Page content -->
<section class="container d-flex flex-column h-100 align-items-center position-relative zindex-5 pt-5" style="min-height: 100vh">
    <div class="text-center pt-5 pb-3 mt-auto">

        <!-- Parallax gfx (Light version) -->
        <div class="parallax mx-auto d-dark-mode-none" style="max-width: 574px;">
            <div class="parallax-layer" data-depth="-0.15">
                <img src="{{ asset('assets/img/404/light/layer01.png') }}" alt="Layer">
            </div>
            <div class="parallax-layer" data-depth="0.12">
                <img src="{{ asset('assets/img/404/light/layer02.png') }}" alt="Layer">
            </div>
            <div class="parallax-layer zindex-5" data-depth="-0.12">
                <img src="{{ asset('assets/img/404/light/layer03.png') }}" alt="Layer">
            </div>
        </div>


        <h1 class="visually-hidden">404</h1>
        <h2 class="display-5 text-gaming">Ooops, Sorry!</h2>
        <p class="fs-xl pb-3 pb-md-0 mb-md-5">The page you are looking for does not exist or is not available.</p>
        <a href="/home" class="btn btn-lg btn-primary shadow-primary w-sm-auto w-100">
            <i class="bx bx-home-alt me-2 ms-n1 lead"></i>
            Go to homepage
        </a>
    </div>

    <div class="text-center py-lg-5 py-4 mt-auto">
        <p class="nav d-block fs-sm pt-3 pt-lg-0 mb-0">
            {{-- <span class="opacity-75">&copy; All rights reserved. Made by</span> --}}
        </p>
    </div>
</section>
@endsection