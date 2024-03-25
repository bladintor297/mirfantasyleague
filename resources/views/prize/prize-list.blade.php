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

                <h1 class="display-1 text-center mb-0 pb-0 text-warning header-parallax hero-title">
                    <span class="text-warning ">Prize</span><span class="text-muted"> Pool</span>

                    @if (Auth::check() && Auth::user()->role == 1)
                        <button class="btn btn-link mx-0 px-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#edit-prize"><i class='bx bxs-cog h1 text-warning'></i></button>
                        <div class="offcanvas offcanvas-start " tabindex="-1" id="edit-prize" aria-labelledby="edit-prizeLabel" style="width:700px">
                            <div class="offcanvas-header mt-5 pt-5">
                                <h5 class="offcanvas-title" id="edit-prizeLabel">Edit Prize Poster</h5>
                            </div>
                            <div class="offcanvas-body">
                                <p class="fs-sm text-start my-0 py-0">Template Link (<span class="text-danger">***Save as .png</span>):
                                    <a href="https://www.canva.com/design/DAGAWjD44b8/NdztQ8atOAjos5usGlLu_A/edit" class="text-warning text-decoration-none">
                                        <em>
                                            Prize Poster Template (Page 3) 
                                        </em>
                                    </a>
                                </p>
                                <form action="{{ route('prize.update', ['prize' => '1']) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                        <div class="table-responsive">
                                            <table class="table">
                                                <tbody>
                                                    
                                                    <tr>
                                                        <th scope="row" >
                                                            Poster Overall
                                                        </th>
                                                        <td width="60%">
                                                            <img id="image-overall" src="{{ asset('public/assets/img/prizes/poster-2.png') }}" class="card-img-top mb-3" alt="Poster-Overall">
                                                            <input type="file" name="overall-prize" accept="image/*" class="form-control">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" >
                                                            Poster Weekly
                                                        </th>
                                                        <td width="60%">
                                                            <img id="image-weekly" src="{{ asset('public/assets/img/prizes/poster-4.png') }}" class="card-img-top mb-3" alt="Poster-Weekly">
                                                            <input type="file" name="weekly-prize" accept="image/*" class="form-control">
                                                        </td>
                                                    </tr>
                                                    
                                            </table>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                </form>
                            </div>
                        </div>
                    @endif
                
                </h1>
                
                <div class="tab-content ">
                    <div class="tab-pane fade show active" id="overall">
                        <div class="row align-items-center justify-content-center pt-2 pb-3 mt-sm-5 position-relative">

                            <!-- Parallax gfx -->
                            <div class="col-md-8">
                                <div class="parallax ratio ratio-1x1 mx-auto" style="max-width: 1000px;">
                                    <div class="parallax-layer position-absolute zindex-3 p-3" data-depth="-0.15">
                                        <img src="{{ asset('public/assets/img/prizes/poster-3.png')  }}" alt="Avatar" >
                                    </div>
                                    <div class="parallax-layer position-absolute zindex-2 p-3" data-depth="0.25">
                                        <img src="{{ asset('public/assets/img/prizes/poster-1.png')  }}" alt="Avatar" class="bg-primary">
                                    </div>
                                    <div class="parallax-layer position-absolute zindex-4 p-3" data-depth="0.15">
                                        <img src="{{ asset('public/assets/img/prizes/poster-2.png')  }}" alt="Avatar" >
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
                                        <img src="{{ asset('public/assets/img/prizes/poster-3.png')  }}" alt="Avatar" >
                                    </div>
                                    <div class="parallax-layer position-absolute zindex-2 p-3" data-depth="0.25">
                                        <img src="{{ asset('public/assets/img/prizes/poster-1.png')  }}" alt="Avatar" class="bg-primary">
                                    </div>
                                    <div class="parallax-layer position-absolute zindex-4 p-3" data-depth="0.15">
                                        <img src="{{ asset('public/assets/img/prizes/poster-4.png')  }}" alt="Avatar" >
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