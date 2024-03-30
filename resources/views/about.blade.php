@extends('layouts.main-layout')

@section('content')

<!-- Hero -->
<section class="position-relative pt-5 mb-5" style="background-color: #151922;">
    <span class="d-dark-mode-none d-block position-absolute start-0 bottom-0 w-100 bg-white"
        style="height: 19.875vw;"></span>
    <span class="d-dark-mode-block d-none position-absolute start-0 bottom-0 w-100 bg-light"
        style="height: 19.875vw;"></span>
    <div class="container position-relative zindex-2 pt-5" data-bs-theme="dark">

        <!-- Page title -->
        <div class="mt-4 mb-lg-5 mb-4 py-3">
            <h1 class="display-1 text-center mb-0 text-warning header-parallax hero-title">MIR FANTASY LEAGUE</h1>
        </div>

        <!-- Gallery -->
        <div class="row g-md-4 g-3">
            <div class="col-md-6">
                <img src="https://wallpapers.com/images/featured/mobile-legends-v0u46grjbqc6h9ga.jpg" alt="Hero image"
                    class="rounded-3">
            </div>

            <div class="col-md-3 col-6 d-md-block d-none">
                <img src="https://assets.dearplayers.com/products/channels4_profile_689b95c8.jpg" alt="Hero image"
                    class="rounded-3">
            </div>
            <div class="col-md-3 col-6 d-md-block d-none mt-5 pt-3 pt-xl-4">
                <img src="https://wallpaperaccess.com/full/1098334.png" alt="Hero image" class="rounded-3">
            </div>
        </div>
    </div>
</section>

<!-- Story -->
<section class="container mb-5 pt-md-1 pt-lg-4 pt-xl-5">
    <div class="mt-4 py-2 pb-sm-3 pb-md-4 pb-lg-5 mx-auto text-center" style="max-width: 46.625rem;">
        <h2 class="h1 mb-4 text-warning text-uppercase">The new level begins</h2>
        <p class="mb-4">
            With a pure passion towards esports industry, MIR Ventures through MIR Fantasy League brings you to 'play'
            the tournament along, without being a professional gamer.
        </p>
    </div>

    <!-- Steps -->
    <div class="steps steps-center steps-sm steps-horizontal-lg"
        style="--si-steps-number-size-sm: 1.5rem; --si-steps-number-inner-size-sm: 1rem; --si-steps-number-bg: rgba(99,102,241,.2); --si-steps-number-inner-bg: #6366f1;">

        <!-- Step -->
        <div class="step w-100 mx-auto" style="max-width: 26rem;">
            <div class="step-number">
                <div class="step-number-inner bg-warning"></div>
            </div>
            <div class="step-body pe-2">
                <h3 class="mb-3">MIR Fantasy League</h3>
                <p class="mb-0" align="justify">This is the official website of MIR Fantasy League, organized by MIR
                    Ventures, a company from Malaysia. Our Fantasy League is played for random sport tournaments, such
                    as for current on-going M5 World Championship. As other Fantasy League game, the participants need
                    to build up their own fantasy team in a certain tournament. Plan your strategies, pick the best
                    player for each role, watch the real tournament and the team with the highest point wins. Play
                    along!</p>
            </div>
        </div>

        <!-- Step -->
        <div class="step w-100 mx-auto" style="max-width: 26rem;">
            <div class="step-number">
                <div class="step-number-inner bg-warning"></div>
            </div>
            <div class="step-body pe-2">
                <h3 class="mb-3">Disclaimer</h3>
                <p class="mb-0" align="justify">MIR Fantasy League under the management of MIR Ventures is a third-party
                    event. Although our Fantasy League collaborates with any official sport tournament, it does not mean
                    we are officially organizing the Fantasy League under the main official company or organizer, unless
                    we stated otherwise.

                    For the current on-going M5 World Championship Fantasy League, we respect the intellectual property
                    rights of MOONTON GAMES and would like to give the credit for all players’ picture, logo etc.
                </p>
            </div>
        </div>

        <!-- Step -->
        <div class="step w-100 mx-auto" style="max-width: 26rem;">
            <div class="step-number">
                <div class="step-number-inner bg-warning"></div>
            </div>
            <div class="step-body pe-2">
                <h3 class="mb-3">Organizer</h3>
                <p class="mb-0" align="justify">MIR Ventures is a Malaysian company, registered under the Companies
                    Commission of Malaysia (SSM) with registration number 003542882-U. We are very passionate to lift up
                    this event and collaborating with more official partners to make a sport tournament more
                    interesting! In this long journey of developing, we would love to learn from any third party to make
                    this event more and more interesting. Please contact us at

                    <a target="_blank" href="mailto:support@mirfantasyleague.com"
                        class="badge text-warning fs-sm">support@mirfantasyleague.com</a>
                </p>
            </div>
        </div>

</section>

<!-- Team -->
<section class="container mb-5 py-lg-3 py-xl-4 py-xxl-5">
    <div
        class="d-md-flex align-items-center justify-content-center text-md-center text-center pt-1 pt-sm-3 pt-md-4 mb-5">
        <h2 class="h1 mb-md-0">Our talented team</h2>

    </div>

    <!-- Team grid -->
    <div
        class="row row-cols-2 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 pb-lg-2 pb-xl-3 d-flex justify-content-center">

        <!-- Item -->
        <div class="col">
            <div class="card card-hover border-0 bg-transparent">
                <div class="position-relative">
                    <img src="{{ url('public/assets/img/about/amir.png') }}" class="rounded-3 h-100 w-100"
                        style="height: 300px; width:300px; object-fit:cover" alt="Amir Syafiq">
                    <div
                        class="card-img-overlay d-flex flex-column align-items-center justify-content-center rounded-3">
                        <span
                            class="position-absolute top-0 start-0 w-100 h-100 bg-warning opacity-35 rounded-3"></span>
                        <div class="position-absolute bottom-0 pb-2 zindex-2">
                            <p class="mb-2 blockquote text-white text-center">"Have passion, be patient"</p>
                            <div class="d-flex justify-content-center">
                                <a target="_blank" href="https://www.facebook.com/amirsyafiq1616"
                                    class="btn btn-icon btn-secondary btn-facebook btn-sm bg-white me-2"
                                    aria-label="Facebook">
                                    <i class="bx bxl-facebook"></i>
                                </a>
                                <a target="_blank" href="#"
                                    class="btn btn-icon btn-secondary btn-linkedin btn-sm bg-white me-2 disabled"
                                    aria-label="LinkedIn">
                                    <i class="bx bxl-linkedin"></i>
                                </a>
                                <a target="_blank" href="mailto:amirsyafiq@mirfantasyleague.com"
                                    class="btn btn-icon btn-secondary btn-google btn-sm bg-white" aria-label="gmail">
                                    <i class="bx bxl-gmail"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body text-center p-3">
                    <h3 class="fs-lg fw-semibold pt-1 mb-2">Amir Syafiq</h3>
                    <p class="fs-sm mb-0">Game Developer &amp; Manager</p>
                </div>
            </div>
        </div>

        <!-- Item -->
        <div class="col">
            <div class="card card-hover border-0 bg-transparent">
                <div class="position-relative">
                    <img src="{{ url('public/assets/img/about/idham.jpeg') }}" class="rounded-3 h-100 w-100"
                        style="height: 300px; width:300px; object-fit:cover" alt="Baam">
                    <div
                        class="card-img-overlay d-flex flex-column align-items-center justify-content-center rounded-3">
                        <span
                            class="position-absolute top-0 start-0 w-100 h-100 bg-warning opacity-35 rounded-3"></span>
                        <div class="position-absolute bottom-0 pb-2 zindex-2">
                            <p class="mb-2 blockquote text-white text-center">"Enjoy while it lasts"</p>
                            <div class="d-flex justify-content-center">
                                <a target="_blank" href="https://www.facebook.com/mohd.idham.18041092/"
                                    class="btn btn-icon btn-secondary btn-facebook btn-sm bg-white me-2"
                                    aria-label="Facebook">
                                    <i class="bx bxl-facebook"></i>
                                </a>
                                <a target="_blank" href="https://www.linkedin.com/in/idhamanur/"
                                    class="btn btn-icon btn-secondary btn-linkedin btn-sm bg-white me-2"
                                    aria-label="LinkedIn">
                                    <i class="bx bxl-linkedin"></i>
                                </a>
                                <a target="_blank" href="mailto:idhamanur@gmail.com"
                                    class="btn btn-icon btn-secondary btn-google btn-sm bg-white" aria-label="gmail">
                                    <i class="bx bxl-gmail"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body text-center p-3">
                    <h3 class="fs-lg fw-semibold pt-1 mb-2">Baam</h3>
                    <p class="fs-sm mb-0">Website Developer</p>
                </div>
            </div>
        </div>


    </div>
</section>
@endsection