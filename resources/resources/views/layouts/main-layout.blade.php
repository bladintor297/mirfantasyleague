<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="utf-8">
    <title>MLBB Fantasy League</title>

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
    <link rel="stylesheet" media="screen"
        href="https://fontawesome.com/icons/medal?f=classic&s=duotone&an=beat&pc=%23ffd700&sc=%23ffd700" />
    <link rel="stylesheet" media="screen" href="{{ url('assets/vendor/swiper/swiper-bundle.min.css') }}" />
    <link rel="stylesheet" media="screen"
        href="{{ url('assets/vendor/lightgallery/css/lightgallery-bundle.min.css') }}" />

    <!-- Main Theme Styles + Bootstrap -->
    <link rel="stylesheet" media="screen" href="{{ url('assets/css/theme.min.css') }}">

    <!-- Custom CSS -->
    <link rel="stylesheet" media="screen" href="{{ url('assets/css/style.css') }}">

    <!-- Fonts -->
    <link href="https://db.onlinewebfonts.com/c/561f38b1f4570de0fb8a39d691ab058c?family=Tungsten-Bold" rel="stylesheet">

    <!-- Page Loader JS -->
    <script src="{{ url('assets/js/top-function.js') }}"></script>

    <style>
        /* Styling for the modal */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 1;
        }

        .modal-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            border-radius: 5px;
            width: 300px;
            /* Set the width to 300px */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        /* Styling for the close button */
        .close {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 20px;
            cursor: pointer;
        }

        #preview {
            max-width: 100px;
            max-height: 100px;
        }

        .fixed-width {
            width: 300px;
            /* Adjust the width as needed */
            margin: 0 auto;
        }

        .table {
            font-size: 1rem;
            /* Default font size */
        }

        @media (max-width: 768px) {
            .diamond {
                display: none;
            }

            thead th,
            thead th .h4,
            tbody td,
            tbody td .h2 {
                font-size: 0.8em !important;
            }

            tbody td img,
            thead .btn-header {
                display: none;
            }

            tbody td .btn,
            tbody td img thead .btn-header {
                display: none;
            }

            .table-submission {
                width: 100% !important;
            }
        }


        /* Regular styles for the table */
        .table-submission {
            font-size: 1rem;
            /* Default font size */
        }

        /* Media query for smaller screens (e.g., phones) */
        @media (max-width: 767px) {

            .table-submission,
            .table-submission td input {
                font-size: 0.5rem !important;
                /* Adjust the font size for smaller screens */
            }

            .row-submission {
                width: 100% !important;
            }
        }

        @media (max-width: 768px) {
            .my-rank {
                display: flex !important;
                position: fixed !important;
                justify-content: center;
            }

            .my-rank i {
                font-size: 1.5rem !important;
            }

            .my-rank .h5,
            .my-rank .text-muted {
                font-size: 0.8rem !important;

            }
        }
    </style>

</head>

<body>

    <main class="page-wrapper ">

        @include('inc.navbar')
        @yield('content')

    </main>

    <!-- footer here -->
    @include ('inc.footer')

    <!-- top button -->
    @include ('inc.top-button')

    <!-- Vendor Scripts -->
    <script src="{{ url('assets/vendor/parallax-js/dist/parallax.min.js') }}"></script>
    <script src="{{ url('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('assets/vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js') }}"></script>
    <script src="{{ url('assets/vendor/jarallax/dist/jarallax.min.js') }}"></script>
    <script src="{{ url('assets/vendor/@lottiefiles/lottie-player/dist/lottie-player.js') }}"></script>
    <script src="{{ url('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ url('assets/vendor/lightgallery/lightgallery.min.js') }}"></script>
    <script src="{{ url('assets/vendor/lightgallery/plugins/video/lg-video.min.js') }}"></script>
    <script src="{{ url('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ url('assets/vendor/shufflejs/dist/shuffle.min.js') }}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- Main Theme Script -->
    <script src="{{ url('assets/js/theme.min.js') }}"></script>
    <script src="{{ url('assets/js/bottom-function.js') }}"></script>

    <!-- Include jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>

    </script>

</body>

</html>