
@extends('layouts.main-layout')

@section('content')

    <!-- Hero -->
    <section class="vh-100 bg-repeat-0 bg-position-center bg-size-cover overflow-hidden"
        style="background-image: url({{ asset('assets/img/background/ml-bg.png')  }});" data-bs-theme="dark">
        <div class="container">
            <div class="row flex-nowrap mt-5 pt-5">
                <div class="col-lg-6 col-xl-5 text-center text-lg-start pt-3 mt-xl-4  py-5 mt-2">
                    <h1 class="display-3 pt-5 pb-2 pb-lg-1 mt-sm-2 mt-lg-5 fw-bold">
                        <span class="text-warning text-uppercase header-parallax hero-title">{{ $league->league_name }}</span>
                        <span class="header-parallax hero-title">Fantasy League</span>
                    </h1>
                    <p class="fs-lg mb-2 mb-lg-4 px-3 px-sm-0 text-white" align="justify">
                        Draft your dream team, conquer the arena. {{ $league->league_name }}  Fantasy League awaits.
                        Join us in the battle and draft your own heroic saga and win interesting prizes now!
                    </p>
                    <a href="/league" class="btn btn-primary btn-lg mt-2 mt-md-0 px-5 fw-bold fst-italic">Join Us Now !</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Hero -->
    <section class="position-relative pt-5">

        <!-- Background -->
        <div class="position-absolute top-0 start-0 w-100 bg-position-bottom-center bg-size-cover bg-repeat-0" style="background-image: url(assets/img/about/hero-bg.gif);">
          <div class="d-lg-none" style="height: 960px;"></div>
          <div class="d-none d-lg-block" style="height: 768px;"></div>
        </div>

        <!-- Content -->
        <div class="container position-relative zindex-5 pt-5">
          <div class="row px-3 px-lg-0">
            <div class="col-lg-6">
              
              <!-- Breadcrumb -->
              <nav class="pt-md-2 pt-lg-3 pb-4 pb-md-5 mb-xl-4" aria-label="breadcrumb">
                {{-- <ol class="breadcrumb mb-0">
                  <li class="breadcrumb-item">
                    <a href="index.html"><i class="bx bx-home-alt fs-lg me-1"></i>Home</a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">About v.1</li>
                </ol> --}}
              </nav>

              <!-- Text -->
              <h1 class="py-0 pb-md-3 text-warning display-1 text-gaming" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">About Us</h1>
              <h3 class="text-white py-0 my-0 pb-md-3 fst-italic" >Your Gateway to Tournament Glory!</h3>
              <p align="justify" class="fs-md  mb-1 mb-md-2 mb-lg-3 text-white mt-3 fst-italic" style="max-width: 526px;" id="about-us">
            </p>
              <div class="row row-cols-3 pt-2 pt-md-3 mt-2 mt-xl-3 d-flex justify-content-start">
                <div class="col">
                    <!-- Primary outline button -->
                    <a href="/about" class="btn btn-primary btn-sm mt-2 mt-md-0 px-5 fw-bold fst-italic">Read More</a>
                </div>
              </div>
            </div>

            <!-- Images -->
            <div class="col-lg-6 mt-xl-3 pt-5 pt-lg-4">
              <div class="row row-cols-2 gx-3 gx-lg-4">
                <div class="col pt-lg-5 mt-lg-1">
                  <img src="https://cdn.gamerspm.com.my/mobile-legends-bang-bang-dhEkF422.png" class="d-block rounded-3 mb-3 mb-lg-4" alt="Image">
                  <img src="https://cdn2.omg.rocks/i/15f36db9f43170/mobile-legends-cover.png?w=768" class="d-block rounded-3" alt="Image">
                </div>
                <div class="col">
                  <img src="https://images.ctfassets.net/vfkpgemp7ek3/353425681/dd78845e8603855fa22276f8bcbee5c2/mobile-legends-generates-500-million-usd.jpg" class="d-block rounded-3 mb-3 mb-lg-4" alt="Image">
                  <img src="https://img.redbull.com/images/c_crop,x_154,y_0,h_1152,w_921/c_fill,w_450,h_600/q_auto:low,f_auto/redbullcom/2018/04/26/17ee4974-07f8-45fd-b30e-2bfba34cf9a2/mobile-legends-tips-from-pros" alt="">
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

    <!-- Social Media -->
    <section class="container py-5 mb-1 mb-md-4 mb-lg-5">
        <h2 class="h1 text-center pt-1 pb-4 mb-1 mb-lg-3">Visit Our Socials</h2>
        <div class="position-relative px-xl-5">
        
        <!-- Slider prev/next buttons -->
        <button type="button" id="prev-news" class="btn btn-prev btn-icon btn-sm position-absolute top-50 start-0 translate-middle-y d-none d-xl-inline-flex" aria-label="Previous">
            <i class="bx bx-chevron-left"></i>
        </button>
        <button type="button" id="next-news" class="btn btn-next btn-icon btn-sm position-absolute top-50 end-0 translate-middle-y d-none d-xl-inline-flex" aria-label="Next">
            <i class="bx bx-chevron-right"></i>
        </button>

        <!-- Slider -->
        <div class="px-xl-2">
            <div class="swiper mx-n2" data-swiper-options='{
            "loop": true,
            "autoplay": {
                "delay": 2000, 
                "disableOnInteraction": false 
            },
            "pagination": {
                "el": ".swiper-pagination",
                "clickable": true
            },
            "navigation": {
                "prevEl": "#prev-news",
                "nextEl": "#next-news"
            },
            "breakpoints": {
                "500": {
                "slidesPerView": 2
                },
                "1000": {
                "slidesPerView": 3
                }
            }
            }'>
                <div class="swiper-wrapper">
        
                    @foreach ($posts as $post)
                        
                    <!-- Item -->
                    <div class="swiper-slide h-auto pb-3">
                        <article class="card h-100 border-0 shadow-sm mx-2">
                            <div class="position-relative">
                                <img src="{{ asset('assets/img/home/feed/'.$post->image)  }}" class="card-img-top" alt="Image">
                            </div>
                            <div class="card-body pb-4">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <a target="_blank" href="https://www.instagram.com/mir.fantasyleague/" class="badge fs-sm text-nav bg-secondary text-decoration-none stretched-link">Instagram</a>
                                <span class="fs-sm text-muted">{{ $post->updated_at->format('j F Y, g.i a') }}</span>
                            </div>
                            <h3 class="h5 mb-0">
                                <a >{{ $post->title }}</a>
                            </h3>
                            </div>
                        </article>
                    </div>
                    @endforeach


                </div>
        
            </div>
        </div>
        
    </section>

    <!-- Location -->
    <section class="container py-5" style="min-height: 100vh" >
        <h1 class="py-0 pb-md-3 text-warning display-1 text-gaming text-center" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">Scoreboard</h1>
        <div class="table-responsive">
            <table class="table" >
                <div class="bg-dark">
                    <thead class="thead">
                        <tr class="bg-dark">
                            <th class="h4 border-bottom py-3 py-lg-4 mb-0 ps-3 text-white bg-dark"  width="10%" id="theader">
                                <h3 class="h4 mb-0  text-white text-rank text-center">RANK</h3>
                            </th>
                            <th class="border-bottom py-3 py-lg-4 bg-dark" id="theader" style="width:15%">
                                <h3 class="h4 mb-0 text-start text-white">POINTS</h3>
                            </th>
                            <th class="border-bottom py-3 py-lg-4 bg-dark"  id="theader" style="width:20%">
                                <h3 class="h4 mb-0 text-start text-white">PARTICIPANTS</h3>
                            </th>
                            <th class="h4 border-bottom py-3 py-lg-4 mb-0 ps-3 text-white bg-dark"  id="theader" style="width:30%">
                                <h3 class="h4 mb-0 text-start text-white">TEAM</h3>
                            </th>
                            <th class="h4 border-bottom py-3 py-lg-4 mb-0 ps-3 text-white bg-dark" id="theader">
                                <h3 class="h4 mb-0 text-start text-white"></h3>
                            </th>
                        </tr>
                    </thead>
                </div>
                <tbody class="tbody">
                    @if (count($totalScores)>0)
                        <!-- Row 1 -->
                        <tr data-aos="flip-up" data-aos-anchor-placement="center-center" class="user-row">
                            <td class="d-lg-table-cell align-middle h2 border-bottom py-3 py-lg-4 mb-0 ps-3 rank-no text-center">#1</td>
                            <td class="d-lg-table-cell align-middle h2 border-bottom py-3 py-lg-4">
                                <div class="d-flex align-items-center">
                                    <img class="diamond pe-1" src="https://d1x91p7vw3vuq8.cloudfront.net/itemku-upload/202155/kxreukcwaabzi98gw5t2.png"
                                        style="width: 30px; height: 30px; object-fit: cover" alt="Diamond">
                                    <div class="total-score">
                                        <h3 class="h2 mb-0 text-info">{{ number_format($totalScores[0]->total_score, 2) }}
                                            <i class="fa-solid fa-medal fa-beat-fade" style="color: #ffd700;"></i>
                                        </h3>
                                    </div>
                                </div>
                            </td>
                            <td class="d-lg-table-cell align-middle text-lg-start text-dark border-bottom py-3 py-lg-4 h2 user-username">
                                {{ $totalScores[0]->username }} </td>
                            <td class="d-lg-table-cell h2 align-middle text-lg-start border-bottom py-3 py-lg-4 text-dark team-name">
                                <img src="{{ asset('assets/img/profile/' . $totalScores[0]->team_logo) }}" class="rounded-circle ms-2 object-cover"
                                    style="width: 48px; height: 48px; object-fit: cover" alt="Diamond">
                                <span>{{ $totalScores[0]->team_name }}</span>
                            </td>
                            <td class="d-lg-table-cell text-lg-center border-bottom-lg pt-2 pb-3 py-lg-4">
                                <button type="button" class="btn btn-lg btn-outline-warning fs-sm w-100 w-lg-auto fs-3 py-1">View
                                    Profile</button>

                                    <!-- Default modal -->
                                    <div class="modal fade" id="modalId" tabindex="-1" role="dialog">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                ...
                                            </div>
                                        </div>
                                    </div>

                            </td>
                        </tr>
            
                        <!-- Rows 2 and onwards -->
                        @for ($i = 1; $i <= 3; ++$i)
                            <tr data-aos="fade-up" data-aos-anchor-placement="center-center" class="user-row">
                                <td class="d-lg-table-cell align-middle h4 border-bottom py-3 py-lg-4 mb-0 ps-3 rank-no text-center">#{{ $i+1 }}</td>
                                <td class="d-lg-table-cell align-middle h2 border-bottom py-3 py-lg-4">
                                    <div class="d-flex align-items-center">
                                        <img class="diamond pe-1" src="https://d1x91p7vw3vuq8.cloudfront.net/itemku-upload/202155/kxreukcwaabzi98gw5t2.png"
                                            style="width: 30px; height: 30px; object-fit: cover" alt="Diamond">
                                        <div class="total-score">
                                            <h3 class="h2 mb-0 text-info">{{ number_format($totalScores[$i]->total_score, 2) }}
                                                <i class="fa-solid fa-medal fa-beat-fade" style="color: #ffd700;"></i>
                                            </h3>
                                        </div>
                                    </div>
                                </td>
                                <td class="d-lg-table-cell align-middle text-lg-start text-dark border-bottom py-3 py-lg-4 h4 user-username">
                                    {{ $totalScores[$i]->username }} </td>
                                <td class="d-lg-table-cell h4 align-middle text-lg-start border-bottom py-3 py-lg-4 text-dark team-name">
                                    <img src="{{ asset('assets/img/profile/' . $totalScores[$i]->team_logo) }}" class="rounded-circle ms-2 object-cover"
                                        style="width: 30px; height: 30px; object-fit: cover" alt="{{ $totalScores[$i]->username }}">
                                    {{ $totalScores[$i]->team_name }}
                                </td>
                                <td class="d-lg-table-cell border-bottom-lg text-lg-center pt-2 pb-3 py-lg-4 my-auto">
                                    <button type="button" class="btn btn-sm btn-outline-warning fs-sm w-100 w-lg-auto">View
                                        Profile</button>
                                </td>
                            </tr>
                            

                            @if (Auth::check() && $totalScores[$i]->user_id == Auth::user()->id)

                            <div class="d-flex justify-content-end fixed-bottom fixed-right mb-4 me-3 my-rank">
                                <div class="card bg-white border border-warning border-3 px-4 shadow ">
                                    <div class="position-relative d-flex align-items-center py-2 my-1">
                                        <div class="position-relative flex-shrink-0 p-3">
                                            <span class="position-absolute top-0 start-0 w-100 h-100 rounded-circle bg-faded-warning"></span>
                                            <span class="position-relative d-flex zindex-2">
                                                <i class='bx bx-medal text-warning' style="font-size: 40px"></i>
                                            </span>
                                        </div>
                                        <div class="nav flex-column ps-3 text-start">
                                            <div class="nav-link p-0 text-muted">My Rank: <span class="text-warning fs-lg">#{{ $i+1 }}</span></div>
                                            <div class="h5 my-0 py-0"><span class="fw-bold">{{ $totalScores[$i]->username }} </span><em>({{ $totalScores[$i]->total_score }} pts)</em></div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                                
                            @endif
                        @endfor
                        <tr>
                            <td colspan="5">
                                <div class="d-flex justify-content-center">
                                    <a href="/score" class="btn btn-link">View More...</a>
                                </div>
                            </td>
                        </tr>
                    @else
                        <tr data-aos="flip-up" data-aos-anchor-placement="center-center" class="user-row">
                            <td colspan="5">
                                <div class="d-flex justify-content-center">
                                    <p class="h6 text-muted mt-4">No record found</p>
                                </div>
                            </td>
                        </tr>
                    @endif
                    
                </tbody>
            </table>
            
        </div>
        {{-- <div class="">
            <img src="assets/img/landing/conference/venue.jpg" class="rounded-3" width="952" alt="Venue">
        </div> --}}
    </section>

    <!-- Hero -->
    <section class="position-relative py-5 mb-5">

        <!-- Background -->
        <div class="position-absolute top-0 start-0 w-100 bg-position-bottom-center bg-size-cover bg-repeat-0" style="background-image: url(assets/img/about/prize-bg.png);">
          <div class="d-lg-none" style="height: 960px;"></div>
          <div class="d-none d-lg-block" style="height: 768px;"></div>
        </div>
        

        <!-- Content -->
        <div class="container position-relative pt-5">
            <div class="row mt-lg-3 pt-2 pt-md-3">
                <div class="col-xl-3 col-md-4 text-center text-md-start" >
                    <div class="d-none d-md-block text-primary" style="transform: scaleY(-1);">
                        <svg xmlns="http://www.w3.org/2000/svg" width="118" height="118" fill="none"><g clip-path="url(#A)"><path d="M116.912 76.527c-4.963-3.081-9.413-6.675-13.52-10.782-1.37-1.369-3.766-.343-3.766 1.54 0 1.54-.171 3.081-.171 4.621-14.89 2.739-29.78 3.936-45.013 4.108-12.836.342-30.123 1.712-41.761-4.45-8.9-4.792-10.269-15.917-6.504-24.475 1.54-3.594 4.279-6.504 7.702-8.557 3.936-2.396 7.873-1.027 11.981-2.054.513-.171.685-.856.342-1.369-6.333-6.675-17.457 1.027-21.565 6.504-5.819 7.702-6.161 18.998-1.027 27.042 7.531 11.981 25.501 11.125 37.653 11.467 19.169.685 39.365.171 58.192-4.108 0 1.712.171 3.252.685 4.963 0 .342.171.513.342.685-1.369 1.198-.171 4.279 2.225 3.765 4.963-1.027 9.927-2.568 14.548-4.792 1.198-1.026.856-3.251-.343-4.107zm-13.178-4.45c2.396 2.054 4.792 4.108 7.531 5.99-2.396 1.027-4.964 1.712-7.531 2.396v-.685c-.514-2.567-.342-5.135 0-7.702z" fill="currentColor"/></g><defs><clipPath id="A"><path fill="#fff" d="M0 0h118v118H0z"/></clipPath></defs></svg>
                    </div>
                        <h2 class="hero-title text-gaming text-warning mb-0 pb-0">Prize Pool</h2>
                        <h3 class="h5 mt-0 mb-2 py-0">Interesting Prize Pool Awaits ! </h3>
                    <div class="d-none d-md-block text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="118" height="118" fill="none"><g clip-path="url(#A)"><path d="M116.912 76.527c-4.963-3.081-9.413-6.675-13.52-10.782-1.37-1.369-3.766-.343-3.766 1.54 0 1.54-.171 3.081-.171 4.621-14.89 2.739-29.78 3.936-45.013 4.108-12.836.342-30.123 1.712-41.761-4.45-8.9-4.792-10.269-15.917-6.504-24.475 1.54-3.594 4.279-6.504 7.702-8.557 3.936-2.396 7.873-1.027 11.981-2.054.513-.171.685-.856.342-1.369-6.333-6.675-17.457 1.027-21.565 6.504-5.819 7.702-6.161 18.998-1.027 27.042 7.531 11.981 25.501 11.125 37.653 11.467 19.169.685 39.365.171 58.192-4.108 0 1.712.171 3.252.685 4.963 0 .342.171.513.342.685-1.369 1.198-.171 4.279 2.225 3.765 4.963-1.027 9.927-2.568 14.548-4.792 1.198-1.026.856-3.251-.343-4.107zm-13.178-4.45c2.396 2.054 4.792 4.108 7.531 5.99-2.396 1.027-4.964 1.712-7.531 2.396v-.685c-.514-2.567-.342-5.135 0-7.702z" fill="currentColor"/></g><defs><clipPath id="A"><path fill="#fff" d="M0 0h118v118H0z"/></clipPath></defs></svg>
                    </div>
                </div>
                <div class="col-xl-9 col-md-8">
                    {{-- <div class="swiper" data-swiper-options='{
                            "slidesPerView": 1,
                            "spaceBetween": 24,
                            "loop": "true",
                            "autoplay": {
                                "delay": 1000, 
                                "disableOnInteraction": false 
                            },
                            "pagination": {
                            "el": ".swiper-pagination",
                            "clickable": true
                            },
                            "breakpoints": {
                            "560": {
                                "slidesPerView": 2
                            },
                            "960": {
                                "slidesPerView": 3
                            }
                            }
                        }'>
                        <div class="swiper-wrapper">
                
                            <!-- Item -->
                            <div class="swiper-slide">
                                <a href="#" class="card-portfolio position-relative d-block rounded-3 overflow-hidden">
                                    <div class="position-absolute top-0 w-100 zindex-2 p-4">
                                        <div class="px-md-3">
                                        <h3 class="h4 text-primary  mb-0">First Place</h3>
                                        <div class="card-portfolio-meta d-flex align-items-center justify-content-between">
                                            <span class="text-white fs-xs text-truncate opacity-70 pe-3">1200 Diamonds</span>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="card-img">
                                        <img src="{{ asset('assets/img/prizes/poster1.png')  }}" alt="Ecommerce">
                                    </div>
                                </a>
                            </div>
                            
                            <!-- Item -->
                            <div class="swiper-slide">
                                <a href="#" class="card-portfolio position-relative d-block rounded-3 overflow-hidden">
                                    <div class="position-absolute top-0 w-100 zindex-2 p-4">
                                        <div class="px-md-3">
                                        <h3 class="h4 text-primary  mb-0">Second Place</h3>
                                        <div class="card-portfolio-meta d-flex align-items-center justify-content-between">
                                            <span class="text-white fs-xs text-truncate opacity-70 pe-3">800 Diamonds</span>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="card-img">
                                        <img src="{{ asset('assets/img/prizes/poster2.png')  }}" alt="Ecommerce">
                                    </div>
                                </a>
                            </div>
                
                            <!-- Item -->
                            <div class="swiper-slide">
                                <a href="#" class="card-portfolio position-relative d-block rounded-3 overflow-hidden">
                                    <div class="position-absolute top-0 w-100 zindex-2 p-4">
                                        <div class="px-md-3">
                                        <h3 class="h4 text-primary  mb-0">Third Place</h3>
                                        <div class="card-portfolio-meta d-flex align-items-center justify-content-between">
                                            <span class="text-white fs-xs text-truncate opacity-70 pe-3">500 Diamonds</span>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="card-img">
                                        <img src="{{ asset('assets/img/prizes/poster3.png')  }}" alt="Ecommerce">
                                    </div>
                                </a>
                            </div>

                            <!-- Item -->
                            <div class="swiper-slide">
                                <a href="#" class="card-portfolio position-relative d-block rounded-3 overflow-hidden">
                                    <div class="position-absolute top-0 w-100 zindex-2 p-4">
                                        <div class="px-md-3">
                                        <h3 class="h4 text-primary  mb-0">Consolation</h3>
                                        <div class="card-portfolio-meta d-flex align-items-center justify-content-between">
                                            <span class="text-white fs-xs text-truncate opacity-70 pe-3">200 Diamonds</span>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="card-img">
                                        <img src="{{ asset('assets/img/prizes/poster4.png')  }}" alt="Ecommerce">
                                    </div>
                                </a>
                            </div>
        
                        </div>
                    </div> --}}
                    <img src="{{ asset('assets/img/prizes/default_prize.png') }}" alt="Card" style="filter: drop-shadow(2px 4px 8px hsla(0, 0%, 100%, 0.499))" class="border border-5">
                </div>
            </div>
        </div>
        

        
    </section>
    
    <script>
        var typed = new Typed('#about-us', {
            strings: ['Dive into the world of MIR Fantasy League, brought to you by MIR Ventures. As passionate organizers of fantasy sports tournaments, we offer an exhilarating platform for players to build their dream teams and compete in thrilling tournaments. Join us, plan your strategies, pick your stars, and watch as your team rises to victory!'],
            typeSpeed: 1,
        });
    </script>
@endsection