<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>MIR Fantasy League</title>

    <!-- SEO Meta Tags -->
    <meta name="description" content="Mobile Legend Bang Bang (MLBB) Fantasy League">
    <meta name="keywords" content="creative">
    <meta name="author" content="Baam hensem">

    <!-- Viewport -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon and Touch Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ url('assets/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ url('assets/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('assets/favicon/favicon-16x16.png') }}">
    <link rel="mask-icon" href="{{ url('assets/favicon/safari-pinned-tab.svg') }}" color="#6366f1">
    <link rel="shortcut icon" href="{{ url('assets/favicon/favicon.ico') }}">
    <meta name="msapplication-TileColor" content="#080032">
    <meta name="msapplication-config" content="{{ url('assets/favicon/browserconfig.xml') }}">
    <meta name="theme-color" content="#ffffff">

    <!-- Vendor Styles -->
    <link rel="stylesheet" media="screen" href="{{ url('assets/vendor/boxicons/css/boxicons.min.css') }}" />
    <link rel="stylesheet" media="screen" href="{{ url('assets/vendor/swiper/swiper-bundle.min.css') }}" />
    <link rel="stylesheet" media="screen" href="{{ url('assets/vendor/lightgallery/css/lightgallery-bundle.min.css') }}" />

    <!-- Main Theme Styles + Bootstrap -->
    <link rel="stylesheet" media="screen" href="{{ url('assets/css/theme.min.css') }}">

    <!-- Fonts -->
    <link href="https://db.onlinewebfonts.com/c/561f38b1f4570de0fb8a39d691ab058c?family=Tungsten-Bold" rel="stylesheet">
    {{-- <link rel="stylesheet" media="screen" href="https://fontawesome.com/icons/medal?f=classic&s=duotone&an=beat&pc=%23ffd700&sc=%23ffd700" /> --}}

    <!-- Page Loader JS -->
    {{-- <script src="{{ url('assets/js/top-function.js') }}"></script> --}}

    {{-- Custom CSS --}}
    <link rel="stylesheet" href="{{ url('assets/css/table.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/fancy-button.css') }}">

    <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
    <!-- Page loading styles -->
    <style>
        @import url('https://fonts.cdnfonts.com/css/whisper-quiet');
        
        .header-parallax{
            font-family: 'Whisper Quiet', sans-serif !important;
            margin-bottom: 0;
            font-size: 12rem;
            position: absolute !important;
            bottom: 0 !important;
            margin: 0 !important;
            padding: 0 5rem !important;
            line-height: 7.5rem !important;
        }

        .hero-title{
            font-size: 5rem !important;
            position: static !important;
            line-height: 5rem !important;
            padding: 0 !important;

        }

        .text-gaming{
            font-family: 'Whisper Quiet', sans-serif !important;
        }

        @media (max-width:768px){
            .hero-title{
                font-size: 3rem !important;
            }
        }

        .modal-img {
            filter: grayscale(80%);
            transition: all 0.3s ease;
        }

        .modal-img:hover {
            transform: scale(1.1);
            filter: grayscale(0%);
        }

        .card-img-overlay .position-absolute::before {
            display: none !important;
        }

        .card-img-overlay:hover .position-absolute::before {
            display: none !important;
        }
        
        .page-loading {
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100%;
            -webkit-transition: all .4s .2s ease-in-out;
            transition: all .4s .2s ease-in-out;
            background-color: #fff;
            opacity: 0;
            visibility: hidden;
            z-index: 9999;
        }

        [data-bs-theme="dark"] .page-loading {
            background-color: #0b0f19;
        }

        .page-loading.active {
            opacity: 1;
            visibility: visible;
        }

        .page-loading-inner {
            position: absolute;
            top: 50%;
            left: 0;
            width: 100%;
            text-align: center;
            -webkit-transform: translateY(-50%);
            transform: translateY(-50%);
            -webkit-transition: opacity .2s ease-in-out;
            transition: opacity .2s ease-in-out;
            opacity: 0;
        }

        .page-loading.active>.page-loading-inner {
            opacity: 1;
        }

        .page-loading-inner>span {
            display: block;
            font-size: 1rem;
            font-weight: normal;
            color: #9397ad;
        }

        [data-bs-theme="dark"] .page-loading-inner>span {
            color: #fff;
            opacity: .6;
        }

        .page-spinner {
            display: inline-block;
            width: 2.75rem;
            height: 2.75rem;
            margin-bottom: .75rem;
            vertical-align: text-bottom;
            border: .15em solid #b4b7c9;
            border-right-color: transparent;
            border-radius: 50%;
            -webkit-animation: spinner .75s linear infinite;
            animation: spinner .75s linear infinite;
        }

        [data-bs-theme="dark"] .page-spinner {
            border-color: rgba(255, 255, 255, .4);
            border-right-color: transparent;
        }

        @-webkit-keyframes spinner {
            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }

        @keyframes spinner {
            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }

        #btnModal {
            padding: 8px 30px !important;
        }

        @media only screen and (max-width: 576px) {
            #btnModal {
                font-size: 15px !important; /* Adjust the font size as needed */
                padding: 8px 15px !important; /* Adjust the padding as needed */
                min-height: auto !important; /* Remove the minimum height */
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Add shadow effect */
            }
        }

        
    </style>

</head>

<body>

    <main class="page-wrapper">

        @include('inc.navbar')
        @yield('content')

    </main>

    <!-- footer here -->
    @include ('inc.footer')

    <!-- top button -->
    @include ('inc.top-button')

    <!-- Default modal -->
    <div class="modal fade" id="ingame-guide" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <img src="{{ asset('public/assets/img/home/ingame-guide.jpg') }}" alt="xx">
            </div>
        </div>
    </div>
    {{-- <script type="text/javascript" src="https://storage.sociabuzz.com/storage/js/main/buttononwebsite/index.min.js"></script>
    <script>sbBoW.draw("mirfantasyleague","U3VwcG9ydCBVcyE","position-bottom-left","#ffcc00","#FFFFFF")</script> --}}

    <!-- Vendor Scripts -->
    <script src="{{ url('assets/vendor/parallax-js/dist/parallax.min.js') }}"></script>
    <script src="{{ url('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    {{-- <script src="{{ url('assets/vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js') }}"></script> --}}
    <script src="{{ url('assets/vendor/jarallax/dist/jarallax.min.js') }}"></script>
    {{-- <script src="{{ url('assets/vendor/@lottiefiles/lottie-player/dist/lottie-player.js') }}"></script> --}}
    <script src="{{ url('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ url('assets/vendor/lightgallery/lightgallery.min.js') }}"></script>
    {{-- <script src="{{ url('assets/vendor/lightgallery/plugins/video/lg-video.min.js') }}"></script> --}}
    <script src="{{ url('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ url('assets/vendor/shufflejs/dist/shuffle.min.js') }}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- Main Theme Script -->
    <script src="{{ url('assets/js/theme.min.js') }}"></script>
    {{-- <script src="{{ url('assets/js/bottom-function.js') }}"></script> --}}

    <!-- Include jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) {
                // Smoothly scroll to the stored position
                window.scrollTo({
                    top: scrollpos,
                    behavior: 'smooth'
                });
            }
        });

        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
    </script>

</body>

</html>

