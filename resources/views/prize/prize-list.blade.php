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


<!-- Stats -->
<section class="bg-white position-relative pt-5 pb-4 py-md-5" style="min-height: 80vh">
    <div class="position-absolute top-0 start-0 w-100 h-100 "></div>
    <div class="container position-relative zindex-3 py-lg-4 py-xl-3 mb-lg-4">

        <!-- Title -->
        <div class="row d-flex justify-content-center pb-4 mb-2 mt-4">
            <div class="col pt-2">
                <ul class="nav nav-tabs d-flex justify-content-center text-center  scoreboard">
                    <li class="nav-item">
                        <a class="nav-link active rounded-pill px-4" data-bs-toggle="tab" href="#overall">Overall</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link rounded-pill px-4" data-bs-toggle="tab" href="#weekly">Weekly</a>
                    </li>
                </ul>

                <h1 class="display-1 text-center mb-0 pb-0 text-warning header-parallax hero-title"><span class="text-warning ">Prize</span><span class="text-muted"> Pool</span></h1>
                
                <div class="tab-content ">
                    <div class="tab-pane fade show active" id="overall">
                        <div class="row align-items-center justify-content-center pt-2 pb-3 mt-sm-5 position-relative">

                            <!-- Parallax gfx -->
                            <div class="col-md-8">
                                <div class="parallax ratio ratio-1x1 mx-auto" style="max-width: 1000px;">
                                    <div class="parallax-layer position-absolute zindex-3 p-3" data-depth="-0.15">
                                        <img src="{{ asset('assets/img/prizes/poster-3.png')  }}" alt="Avatar" >
                                    </div>
                                    <div class="parallax-layer position-absolute zindex-2 p-3" data-depth="0.25">
                                        <img src="{{ asset('assets/img/prizes/poster-1.png')  }}" alt="Avatar" class="bg-primary">
                                    </div>
                                    <div class="parallax-layer position-absolute zindex-4 p-3" data-depth="0.15">
                                        <img src="{{ asset('assets/img/prizes/poster-2.png')  }}" alt="Avatar" >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade show" id="weekly">
                        <div class="row align-items-center justify-content-center pt-2 pb-3 mt-sm-5 position-relative">

                            <!-- Parallax gfx -->
                            <div class="col-md-8">
                                <div class="parallax ratio ratio-1x1 mx-auto" style="max-width: 1000px;">
                                    <div class="parallax-layer position-absolute zindex-3 p-3" data-depth="-0.15">
                                        <img src="{{ asset('assets/img/prizes/poster-3.png')  }}" alt="Avatar" >
                                    </div>
                                    <div class="parallax-layer position-absolute zindex-2 p-3" data-depth="0.25">
                                        <img src="{{ asset('assets/img/prizes/poster-1.png')  }}" alt="Avatar" class="bg-primary">
                                    </div>
                                    <div class="parallax-layer position-absolute zindex-4 p-3" data-depth="0.15">
                                        <img src="{{ asset('assets/img/prizes/poster-4.png')  }}" alt="Avatar" >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection