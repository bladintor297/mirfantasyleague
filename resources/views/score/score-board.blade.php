@extends('layouts.main-layout')

@section('content')

    <!-- Hero image -->
    <div class="jarallax d-none d-md-block" data-jarallax data-speed="0.35" style="position: relative;">
        <span class="position-absolute top-0 start-0 w-100 h-100 "></span>
        <div class="jarallax-img"
            style="background-image: url('{{ asset('assets/img/background/parallax-alucard.png') }}'); width: 100%; background-size: cover;">
        </div>
        <div class="d-none d-xxl-block" style="height: 450px;"></div>
        <div class="d-none d-md-block d-xxl-none" style="height: 550px;"></div>
        <h1 class="text-white tst header-parallax mb-0">SCOREBOARD</h1>
    </div>

    <!-- Stats -->
    <section class="bg-white position-relative pt-5 pb-4 py-md-5" style="min-height: 100vh">
        <div class="position-absolute top-0 start-0 w-100 h-100 "></div>
        <div class="container position-relative zindex-3 py-lg-4 py-xl-3 mb-lg-4">

            <!-- Title -->
            <div class="row d-flex justify-content-center pb-4 mb-2 mt-4">
                <div class="col pt-2">
                    <ul class="nav nav-tabs d-flex justify-content-center text-center  scoreboard">
                        <li class="nav-item">
                            <a class="nav-link active rounded-pill px-4" data-bs-toggle="tab" href="#participants">Participants</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link rounded-pill px-4" data-bs-toggle="tab" href="#players">Players</a>
                        </li>
                    </ul>
                    <h1 class="display-1 text-center mb-0 text-warning header-parallax hero-title">Scoreboard</h1>
                    
                    <div class="row d-flex justify-content-center my-2">

                        <div class="col-8">
                            {{-- <input type="text" value="{{ $league->league_name }} - {{ $game->name }}" id="" class="form-select mb-1 fw-bold" readonly> --}}
                            
                            <form id="filter-game">
                                <select name="game" id="game" class="form-select mb-3">
    
                                        <option value="0" {{ $id == 0 ? 'selected' : '' }}>{{ $league->league_name }} - {{ $game->name }} (Overall)</option>
                                        <option value="1" {{ $id == 1 ? 'selected' : '' }}>{{ $league->league_name }} - {{ $game->name }} (Week 1)</option>
                                        <option value="2" {{ $id == 2 ? 'selected' : '' }}>{{ $league->league_name }} - {{ $game->name }} (Week 2)</option>
                                        <option value="3" {{ $id == 3 ? 'selected' : '' }}>{{ $league->league_name }} - {{ $game->name }} (Week 3)</option>
                                        <option value="4" {{ $id == 4 ? 'selected' : '' }}>{{ $league->league_name }} - {{ $game->name }} (Week 4)</option>
                                        <option value="5" {{ $id == 5 ? 'selected' : '' }}>{{ $league->league_name }} - {{ $game->name }} (Week 5)</option>
                                        <option value="6" {{ $id == 6 ? 'selected' : '' }}>{{ $league->league_name }} - {{ $game->name }} (Week 6)</option>
    
                                </select>
                            </form>

                            <div class="input-group mt-2">
                                <!-- Add this input field above your table -->
                                <input type="text" id="searchInput" class="form-control mb-3" placeholder="Search player by username">
                            </div>
                            

                        </div>
                    </div>
                    <div class="d-flex justify-content-center mt-2 mb-4">
                        <!-- Secondary badge with shadow -->
                        <button type="button" class="btn btn-dark btn-sm px-5 rounded-pill disabled">View Past Games Score</button>
                    </div>

                    <div class="tab-content " style="min-height: 500px;">
                        <div class="tab-pane fade show active" id="participants">

                            <p class="text-muted mb-4 text-center">Updated at:
                                @if (count($totalScores)>0)
                                    {{ date('F j, Y, G:i:s ', strtotime($totalScores->sortByDesc('updated_at')->first()->updated_at )); }}
                                @endif
                                MYT
                            </p>
                            <div class="table-responsive">
                                <table class="table" >
                                    <div class="bg-dark">
                                        <thead class="thead">
                                            <tr class="bg-dark">
                                                <th class="h4 border-bottom py-3 py-lg-4 mb-0 ps-3 text-white bg-dark"  width="1%" id="theader">
                                                    <h3 class="h4 mb-0  text-white text-rank text-center"></h3>
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
                                        @if (count($totalScores) > 0)
                                            @php $i = 1; @endphp <!-- Add this line -->
                                            @foreach ($totalScores as $score)
                                                <tr data-aos="fade-up" data-aos-anchor-placement="center-center" class="user-row">
                                                    <td class="d-lg-table-cell align-middle h4 border-bottom py-3 py-lg-4 mb-0 rank-no text-center">#{{ $i }}</td> <!-- Use $rank variable for rank -->
                                                    <td class="d-lg-table-cell align-middle h2 border-bottom py-3 py-lg-4">
                                                        <!-- Your score display -->
                                                        <div class="d-flex align-items-center">
                                                            <img class="diamond pe-1" src="https://d1x91p7vw3vuq8.cloudfront.net/itemku-upload/202155/kxreukcwaabzi98gw5t2.png"
                                                                style="width: 30px; height: 30px; object-fit: cover" alt="Diamond">
                                                            <div class="total-score">
                                                                <h3 class="h2 mb-0 text-info">{{ number_format($score->total_score, 2) }}
                                                                    <i class="fa-solid fa-medal fa-beat-fade" style="color: #ffd700;"></i>
                                                                </h3>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="d-lg-table-cell align-middle text-lg-start text-dark border-bottom py-3 py-lg-4 h4 user-username">
                                                        {{ $score->username }}
                                                    </td>
                                                    <td class="d-lg-table-cell h4 align-middle text-lg-start border-bottom py-3 py-lg-4 text-dark team-name">
                                                        {{-- <img src="{{ asset('public/assets/img/profile/' . $score->team_logo) }}" class="rounded-circle ms-2 object-cover"
                                                        style="width: 48px; height: 48px; object-fit: cover" alt="Diamond"> --}}
                                                        <span>{{ $score->team_name }}</span>
                                                    <td class="d-lg-table-cell border-bottom-lg text-lg-center pt-2 pb-3 py-lg-4 my-auto">
                                                        <button type="button" class="btn btn-sm btn-outline-warning fs-sm w-100 w-lg-auto">View
                                                            Profile</button>
                                                    </td>
                                                </tr>
                            
                                                @if (Auth::check() && $score->user_id == Auth::user()->id)
                                                    <!-- Authenticated User Section -->
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
                                                                    <div class="nav-link p-0 text-muted">My Rank: <span class="text-warning fs-lg">#{{ $i }}</span></div>
                                                                    <div class="h5 my-0 py-0"><span class="fw-bold">{{ $score->username }} </span><em>({{ $score->total_score }} pts)</em></div>
                                                                </div>
                                                            </div>
                                                        </div>
                    
                                                    </div>
                                                @endif
                            
                                                @php $i++; @endphp <!-- Increment rank -->
                                            @endforeach
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
                            
                            {{-- {{ $totalScores->links() }} --}}
                        </div>
                        <div class="tab-pane fade " id="players">
                            <p class="text-muted mb-4 text-center">Updated at:
                                @if (count($playerScores)>0)
                                    {{ date('F j, Y, G:i:s ', strtotime($playerScores->sortByDesc('updated_at')->first()->updated_at )); }}
                                @endif
                                MYT
                            </p>

                            @php
                                $roles = [
                                    'EXP Laner',
                                    'Jungler',
                                    'Mid Laner',
                                    'Gold Laner',
                                    'Roamer'
                                ];
                            @endphp

                            {{-- <div class="d-flex justify-content-end mb-2">
                                <div class="col-lg-2 col-sm-6">
                                    <!-- Add this input field above your table -->
                                    <select id="roleFilter" class="form-select">
                                        <option value="">All Roles</option>
                                        @foreach($roles as $index => $role)
                                            <option value="{{ $index }}">{{ $role }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> --}}
                            <div class="table-responsive">
                                <table class="table bg-white shadow" >
                                    <div class="bg-dark">
                                        <thead class="thead">
                                            <tr class="bg-dark">
                                                <th class="h4 border-bottom py-3 py-lg-4 mb-0 ps-3 text-white bg-dark"  width="1%" id="theader">
                                                    <h3 class="h4 mb-0  text-white text-center"></h3>
                                                </th>
                                                <th class="border-bottom py-3 py-lg-4 bg-dark" id="theader" style="width:15%">
                                                    <h3 class="h4 mb-0 text-start text-white">POINTS</h3>
                                                </th>
                                                <th class="h4 border-bottom py-3 py-lg-4 mb-0 ps-3 text-white bg-dark"  id="theader">
                                                    <h3 class="h4 mb-0 text-start text-white">PLAYER</h3>
                                                </th>
                                                <th class="border-bottom py-3 py-lg-4 bg-dark"  id="theader" style="width:30%">
                                                    <h3 class="h4 mb-0 text-start text-white">TEAM</h3>
                                                </th>
                                                <th class="h4 border-bottom py-3 py-lg-4 mb-0 ps-3 text-white bg-dark" id="theader">
                                                    <h3 class="h4 mb-0 text-start text-white">ROLE</h3>
                                                </th>
                                            </tr>
                                        </thead>
                                    </div>
                                    <tbody class="tbody">

                                        @if (count($playerScores)>0)
                                            @php
                                                $i = 0;
                                            @endphp
                                            @foreach ($playerScores as $player)
                                            <tr data-aos="fade-up" data-aos-anchor-placement="center-center" class="user-row">
                                                <td class="d-lg-table-cell align-middle h4 border-bottom py-3 py-lg-4 mb-0 rank-no text-center">

                                                    @if ($player->score < -999)
                                                        --
                                                    @else
                                                        #{{ ++$i }}
                                                    @endif
                                                </td>
                                                <td class="d-lg-table-cell align-middle h2 border-bottom py-3 py-lg-4">
                                                    <div class="d-flex align-items-center">
                                                        
                                                        @if ($player->score < -999)
                                                            <p class="badge bg-danger ">Eliminated</p>
                                                        @else
                                                            <img class="diamond pe-1" src="https://d1x91p7vw3vuq8.cloudfront.net/itemku-upload/202155/kxreukcwaabzi98gw5t2.png"
                                                                style="width: 30px; height: 30px; object-fit: cover" alt="Diamond">
                                                            <div class="total-score">
                                                                <h3 class="h2 mb-0 text-info">{{ number_format($player->score, 2) }}
                                                                    <i class="fa-solid fa-medal fa-beat-fade" style="color: #ffd700;"></i>
                                                                </h3>
                                                            </div>
                                                        @endif

                                                    </div>
                                                    
                                                </td>
                                                <td class="d-lg-table-cell align-middle text-lg-start text-dark border-bottom py-3 py-lg-4 h4 user-username">
                                                    <div class="d-flex">
                                                        <span class="me-2"><img src="{{ asset('public/assets/img/flags/'.$player->nationality.'.png') }}" class="p-1" alt="{{ $player->nationality }}" style="height:30px;"></span>
                                                        <span>{{ $player->name }}</span>
                                                    </div>
                                                </td>
                                                <td class="d-lg-table-cell h4 align-middle text-lg-start border-bottom py-3 py-lg-4 text-dark ">
                                                    
                                                    {{-- {{ $player->team_name }} --}}
                                                    @foreach ($teams as $team)
                                                        @if ($player->team == $team->id)
                                                            <span class="player-team">
                                                                {{ $team->team_name }}
                                                            </span>
                                                        @endif
                                                    @endforeach
                                                    <img src="{{ asset('public/assets/img/teams/'.$player->team.'.png') }}" class="ms-2 object-cover"
                                                        alt="{{ $player->name }}" style="height:30px;">
                                                </td>
                                                <td class="d-lg-table-cell align-middle text-lg-start text-dark border-bottom py-3 py-lg-4 h4 user-username">
                                                    {{ $roles[$player->role]  }}
                                                </td>
                                            </tr>
                                            @endforeach

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
                        </div>
                    </div>


                </div>
            </div>


        </div>
    </section>

    <!-- Add this script section at the end of your HTML body -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var input = document.getElementById('searchInput');
            var rows = document.querySelectorAll('.user-row');
            var usernames = Array.from(rows).map(row => row.querySelector('.user-username').innerText.toLowerCase());
    
            var debounceTimer;
    
            input.addEventListener('input', function () {
                clearTimeout(debounceTimer);
                var searchTerm = input.value.trim().toLowerCase();
                if (searchTerm.length >= 3) {
                    debounceTimer = setTimeout(function () {
                        rows.forEach(function (row, index) {
                            var isVisible = usernames[index].includes(searchTerm);
                            row.style.display = isVisible ? '' : 'none';
                        });
                    }, 300); // Adjust debounce time according to your preference
                } else {
                    // Clear the timer and show all rows if the input is less than 3 characters
                    clearTimeout(debounceTimer);
                    rows.forEach(row => row.style.display = '');
                }
            });
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>

        $(document).ready(function () {
            $('#game').change(function () {
                var selectedGameId = $(this).val();
                console.log(selectedGameId);
                var newAction = '';
                if (selectedGameId == 0) {
                    newAction = '/score';
                } else {
                    newAction = '/score/' + selectedGameId;
                }
                $('#filter-game').attr('action', newAction);
                window.location.href = newAction;
            });
        });
    </script>
    

    
@endsection
