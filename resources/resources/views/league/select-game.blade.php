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
        <!-- Contact form -->
        <section
            class="dark-mode hero bg-size-cover bg-repeat-0 bg-position-center position-relative overflow-hidden pb-5 ">
            <div class="container position-relative zindex-2 pb-md-2 pb-lg-4  hero-container ">

                <!-- Title -->
                <div class="row d-flex justify-content-center text-center pb-4 mb-2 zindex-5">
                    <div class="col">
                        <h2 class="display-2 mb-4 text-warning">My Teams</h2>
                    </div>
                </div>


                <span class="badge bg-warning px-3 rounded-pill">Ongoing</span>

                <!-- Icon boxes (Features) -->
                <div class="row row-cols-1 row-cols-md-3 g-4 pt-2 pt-md-4 pb-lg-2">

                    @foreach ($myTeams as $myTeam)

                        <!-- Item -->
                        <div class="col" >
                            
                            <div
                                class="card flex-column flex-sm-row flex-md-column flex-xxl-row align-items-center card-hover border-warning bg-black h-100">
                                <img src="{{ url('assets/img/league/tournaments/MPL-Malaysia.png') }} "
                                    width="168" alt="Doctor icon" class="p-3 pe-0">
                                    <div class="position-absolute top-0 start-0 m-2 mt-0 ms-0">
                                        <span class="badge bg-primary px-3">Group {{ $myTeam->label }}</span>
                                    </div>
                                    
                                <div
                                    class="card-body text-center text-sm-start text-md-center text-xxl-start pb-3 pb-sm-2 pb-md-3 pb-xxl-2">
                                    <h3 class="h6 text-uppercase mb-2 mt-n4 mt-sm-0 mt-md-n4 mt-xxl-0 text-warning">M5 World Championship
                                    </h3>
                                    
                                    <h6 class="m-1 mt-0">{{ $game->name }}
                                        <span class="{{ ($myTeam->isCompleted == 0) ? 'badge bg-danger' : 'badge bg-success ' }}">#
                                            {{ ($myTeam->isCompleted == 0) ? 'Incomplete' : 'Completed' }}
                                        </span>
                                    
                                    </h6>

                                    <a href="/myTeam/{{ $myTeam->id }}?label={{ $myTeam->label}}"
                                        class="btn btn-sm py-1 btn-warning strechted-link px-3  rounded-pill my-2 {{ ($game->transfer_isOn == 1) ? '' : 'disabled' }}">
                                        <span class="text-dark">Edit Team</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                    @endforeach
                </div>
            </div>

            <!-- BG shape -->
            <div class="position-absolute end-0 bottom-0 text-primary">
                <svg width="469" height="343" viewBox="0 0 469 343" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.08" fill-rule="evenodd" clip-rule="evenodd"
                        d="M273.631 680.872C442.436 768.853 639.315 708.216 717.593 558.212C795.871 408.208 732.941 212.157 564.137 124.176C395.333 36.195 198.453 96.8326 120.175 246.836C41.8972 396.84 104.827 592.891 273.631 680.872ZM236.335 752.344C440.804 858.914 688.289 788.686 789.109 595.486C889.928 402.286 805.903 159.274 601.433 52.7043C396.964 -53.8654 149.479 16.3623 48.6595 209.562C-52.1598 402.762 31.8652 645.774 236.335 752.344Z"
                        fill="currentColor" />
                    <path opacity="0.08" fill-rule="evenodd" clip-rule="evenodd"
                        d="M298.401 633.404C434.98 704.59 598.31 656.971 664.332 530.451C730.355 403.932 675.946 242.827 539.367 171.642C402.787 100.457 239.458 148.076 173.435 274.595C107.413 401.114 161.822 562.219 298.401 633.404ZM288.455 652.464C434.545 728.606 611.369 678.429 683.403 540.391C755.437 402.353 695.402 228.725 549.312 152.583C403.222 76.4404 226.398 126.617 154.365 264.655C82.331 402.693 142.365 576.321 288.455 652.464Z"
                        fill="currentColor" />
                </svg>
            </div>
        </section>
        
    @endsection
