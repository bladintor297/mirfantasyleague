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
        <h1 class="text-white tst text-end">Scoreboard</h1>
    </div>

    <!-- Stats -->
    <section class="bg-white position-relative pt-5 pb-4 py-md-5">
        <div class="position-absolute top-0 start-0 w-100 h-100 "></div>
        <div class="container position-relative zindex-3 py-lg-4 py-xl-3 mb-lg-4">

            <!-- Title -->
            <div class="row d-flex justify-content-center text-center pb-4 mb-2">
                <div class="col pt-2">
                    <ul class="nav nav-tabs d-flex justify-content-center text-center  scoreboard">
                        <li class="nav-item">
                            <a class="nav-link active rounded-pill px-4" data-bs-toggle="tab" href="#participants">Participants</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link rounded-pill px-4" data-bs-toggle="tab" href="#players">Players</a>
                        </li>
                    </ul>
                    <h2 class="display-2">Scoreboard</h2>
                    <div class="row d-flex justify-content-center my-2">
                        <div class="col-8">
                            <form action="score/" id="filter-game">
                                <select name="game" id="game" class="form-select mb-3">
    
                                    @foreach ($games as $game)
                                        <option class="form-select" value="{{ $game->id }}"  {{ (isset($id) && $id == $game->id) ? 'selected' : '' }}>
                                            {{ $game->name }} -- <em>{{ $game->league_name }}</em>
                                        </option>
                                    @endforeach
    
                                </select>
                            </form>
                            <div class="input-group mt-5">
                                <!-- Add this input field above your table -->
                                <input type="text" id="searchInput" class="form-control mb-3" placeholder="Search by username">
                            </div>
                        </div>
                    </div>




                    <div class="tab-content " style="min-height: 500px;">
                        <div class="tab-pane fade show active" id="participants">
                            <p class="text-muted mb-4">Updated at:
                                @if (count($totalScore)>0)
                                    {{ date('F j, Y, G:i:s ', strtotime($totalScore[0]->updated_at )); }}
                                @endif
                                MYT
                            </p>

                            <div class="table-responsive">
                                <table class="table bg-white shadow" >
                                    <thead class="bg-dark thead">
                                            <th class="h4 border-bottom py-3 py-lg-4 mb-0 ps-3 text-white"  width="10%">
                                                <h3 class="h4 mb-0  text-white">RANK</h3>
                                            </th>
                                            <th class="border-bottom py-3 py-lg-4"  width="15%">
                                                <h3 class="h4 mb-0 text-start text-white">POINTS</h3>
                                            </th>
                                            <th class="border-bottom py-3 py-lg-4"  width="20%">
                                                <h3 class="h4 mb-0 text-start text-white">PARTICIPANTS</h3>
                                            </th>
                                            <th class="h4 border-bottom py-3 py-lg-4 mb-0 ps-3 text-white"  width="30%">
                                                <h3 class="h4 mb-0 text-start text-white">TEAM</h3>
                                            </th>
                                            <th class="h4 border-bottom py-3 py-lg-4 mb-0 ps-3 text-white" >
                                                <h3 class="h4 mb-0 text-start text-white"></h3>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="tbody">
                                        @if (count($totalScore)>0)
                                            <!-- Row 1 -->
                                            <tr data-aos="flip-up" data-aos-anchor-placement="center-center" class="user-row">
                                                <td class="d-lg-table-cell align-middle h2 border-bottom py-3 py-lg-4 mb-0 ps-3">#1</td>
                                                <td class="d-lg-table-cell align-middle h2 border-bottom py-3 py-lg-4">
                                                    <div class="d-flex align-items-center">
                                                        <img class="diamond" src="https://d1x91p7vw3vuq8.cloudfront.net/itemku-upload/202155/kxreukcwaabzi98gw5t2.png"
                                                            style="width: 32px; height: 32px; object-fit: cover" alt="Bitcoin">
                                                        <div class="ps-3">
                                                            <h3 class="h2 mb-0">{{ number_format($totalScore[0]->total_score, 2) }}
                                                                <i class="fa-solid fa-medal fa-beat-fade" style="color: #ffd700;"></i>
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="d-lg-table-cell align-middle text-lg-start text-dark border-bottom py-3 py-lg-4 h2 user-username">
                                                    {{ $totalScore[0]->username }} </td>
                                                <td class="d-lg-table-cell h2 align-middle text-lg-start border-bottom py-3 py-lg-4 text-dark team-name">
                                                    <img src="{{ asset('public/assets/img/profile/' . $totalScore[0]->team_logo) }}" class="rounded-circle ms-2 object-cover"
                                                        style="width: 48px; height: 48px; object-fit: cover" alt="Bitcoin">
                                                    <span>{{ $totalScore[0]->team_name }}</span>
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
                                            @for ($i = 1; $i < count($totalScore); ++$i)
                                                <tr data-aos="fade-up" data-aos-anchor-placement="center-center" class="user-row">
                                                    <td class="d-lg-table-cell align-middle h4 border-bottom py-3 py-lg-4 mb-0 ps-3">#{{ $i+1 }}</td>
                                                    <td class="d-lg-table-cell align-middle h2 border-bottom py-3 py-lg-4">
                                                        <div class="d-flex align-items-center">
                                                            <img class="diamond" src="https://d1x91p7vw3vuq8.cloudfront.net/itemku-upload/202155/kxreukcwaabzi98gw5t2.png"
                                                                style="width: 32px; height: 32px; object-fit: cover" alt="Bitcoin">
                                                            <div class="ps-3">
                                                                <h3 class="h2 mb-0">{{ number_format($totalScore[$i]->total_score, 2) }}
                                                                    <i class="fa-solid fa-medal fa-beat-fade" style="color: #ffd700;"></i>
                                                                </h3>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="d-lg-table-cell align-middle text-lg-start text-dark border-bottom py-3 py-lg-4 h4 user-username">
                                                        {{ $totalScore[$i]->username }} </td>
                                                    <td class="d-lg-table-cell h4 align-middle text-lg-start border-bottom py-3 py-lg-4 text-dark team-name">
                                                        <img src="{{ asset('public/assets/img/profile/' . $totalScore[$i]->team_logo) }}" class="rounded-circle ms-2 object-cover"
                                                            style="width: 32px; height: 32px; object-fit: cover" alt="{{ $totalScore[$i]->username }}">
                                                        {{ $totalScore[$i]->team_name }}
                                                    </td>
                                                    <td class="d-lg-table-cell border-bottom-lg text-lg-center pt-2 pb-3 py-lg-4 my-auto">
                                                        <button type="button" class="btn btn-sm btn-outline-warning fs-sm w-100 w-lg-auto">View
                                                            Profile</button>
                                                    </td>
                                                </tr>

                                                @if (Auth::check() && $totalScore[$i]->user_id == Auth::user()->id)

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
                                                                <div class="h5 my-0 py-0"><span class="fw-bold">{{ $totalScore[$i]->username }} </span><em>({{ $totalScore[$i]->total_score }} pts)</em></div>
                                                            </div>
                                                        </div>
                                                    </div>
                
                                                </div>
                                                    
                                                @endif
                                            @endfor
                                        @else
                                            <tr data-aos="flip-up" data-aos-anchor-placement="center-center" class="user-row">
                                                <td class="d-lg-table-cell align-middle h2 border-bottom py-3 py-lg-4 mb-0 ps-3" colspan="5">
                                                    <p class="h6 text-muted">No record found</p>
                                                </td>
                                            </tr>
                                        @endif
                                        
                                    </tbody>
                                </table>
                                
                            </div>
                            
                        </div>
                        <div class="tab-pane fade" id="players">
                            <p class="text-muted mb-4">Updated at:
                                @if (count($totalScore)>0)
                                    {{ date('F j, Y, G:i:s ', strtotime($playerScores->sortByDesc('updated_at')->first()->updated_at )); }}
                                @endif
                                MYT
                            </p>
                            <div class="table-responsive">
                                <table class="table bg-white shadow" >
                                    <thead class="bg-dark thead ">
                                            <th class="h4 border-bottom py-3 py-lg-4 mb-0 ps-3 text-white "  width="10%">
                                                <h3 class="h4 mb-0  text-white text-start">RANK</h3>
                                            </th>
                                            <th class="border-bottom py-3 py-lg-4 "  width="15%">
                                                <h3 class="h4 mb-0  text-white text-start">POINTS</h3>
                                            </th>
                                            <th class="border-bottom py-3 py-lg-4"  width="20%">
                                                <h3 class="h4 mb-0  text-white text-start">PLAYER</h3>
                                            </th>
                                            <th class="h4 border-bottom py-3 py-lg-4 mb-0 ps-3 text-white"  width="30%">
                                                <h3 class="h4 mb-0  text-white text-start">TEAM</h3>
                                            </th>
                                            <th class="h4 border-bottom py-3 py-lg-4 mb-0 ps-3 text-white" >
                                                <h3 class="h4 mb-0  text-white text-start">NATIONALITY</h3>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="tbody">

                                        <!-- Row 1 -->
                                        <tr data-aos="fade-up" data-aos-anchor-placement="center-center" class="user-row">
                                            <td class="d-lg-table-cell align-middle h2 border-bottom py-3 py-lg-4 mb-0 ps-3">#1</td>
                                            <td class="d-lg-table-cell align-middle h2 border-bottom py-3 py-lg-4">
                                                <div class="d-flex align-items-center">
                                                    <img class="diamond" src="https://d1x91p7vw3vuq8.cloudfront.net/itemku-upload/202155/kxreukcwaabzi98gw5t2.png"
                                                        style="width: 32px; height: 32px; object-fit: cover" alt="Bitcoin">
                                                    <div class="ps-3">
                                                        <h3 class="h2 mb-0">{{ number_format($playerScores[0]->score, 2) }}
                                                            <i class="fa-solid fa-medal fa-beat-fade" style="color: #ffd700;"></i>
                                                        </h3>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="d-lg-table-cell align-middle text-lg-start text-dark border-bottom py-3 py-lg-4 h2 user-username">
                                                {{ $playerScores[0]->name }} </td>
                                            <td class="d-lg-table-cell h2 align-middle text-lg-start border-bottom py-3 py-lg-4 text-dark team-name">
                                                <img src="{{ $playerScores[0]->team_logo}}" class="rounded-circle ms-2 object-cover"
                                                    style="width: 48px; height: 48px; object-fit: cover" alt="Bitcoin">
                                                <span>{{ $playerScores[0]->team_name }}</span>
                                            </td>
                                            <td class="d-lg-table-cell align-middle text-lg-start text-dark border-bottom py-3 py-lg-4 h2 user-username">
                                                {{ $playerScores[0]->nationality }} </td>
                                        </tr>
                            
                                        <!-- Rows 2 and onwards -->
                                        @for ($i = 1; $i < count($playerScores); ++$i)
                                        <tr data-aos="fade-up" data-aos-anchor-placement="center-center" class="user-row">
                                            <td class="d-lg-table-cell align-middle h4 border-bottom py-3 py-lg-4 mb-0 ps-3">

                                                @if ($playerScores[$i]->score < -999)
                                                    --
                                                @else
                                                    #{{ $i+1 }}
                                                @endif
                                            </td>
                                            <td class="d-lg-table-cell align-middle h2 border-bottom py-3 py-lg-4">
                                                <div class="d-flex align-items-center">
                                                    @if ($playerScores[$i]->score < -999)
                                                        <p class="badge bg-danger ">Eliminated</p>
                                                    @else
                                                        <img class="diamond" src="https://d1x91p7vw3vuq8.cloudfront.net/itemku-upload/202155/kxreukcwaabzi98gw5t2.png"
                                                        style="width: 32px; height: 32px; object-fit: cover" alt="Bitcoin">
                                                        <div class="ps-3">
                                                            <h3 class="h2 mb-0">{{ number_format($playerScores[$i]->score, 2) }}
                                                                <i class="fa-solid fa-medal fa-beat-fade" style="color: #ffd700;"></i>
                                                            </h3>
                                                        </div>
                                                    @endif
                                                    
                                                </div>
                                            </td>
                                            <td class="d-lg-table-cell align-middle text-lg-start text-dark border-bottom py-3 py-lg-4 h4 user-username">
                                                {{ $playerScores[$i]->name }} </td>
                                            <td class="d-lg-table-cell h4 align-middle text-lg-start border-bottom py-3 py-lg-4 text-dark team-name">
                                                <img src="{{ $playerScores[$i]->team_logo}}" class="rounded-circle ms-2 object-cover"
                                                    style="width: 32px; height: 32px; object-fit: cover" alt="{{ $playerScores[$i]->name }}">
                                                {{ $playerScores[$i]->team_name }}
                                            </td>
                                            <td class="d-lg-table-cell align-middle text-lg-start text-dark border-bottom py-3 py-lg-4 h4 user-username">
                                                {{ $playerScores[$i]->nationality }} </td>
                                        </tr>
                                
                                    @endfor
                                    </tbody>
                                </table>
                                
                            </div>

                        </div>
                    </div>


                </div>
            </div>


        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#game').change(function () {
                var selectedGameId = $(this).val();
                var newAction = selectedGameId;
                $('#filter-game').attr('action', newAction);
                window.location.href = newAction;
            });
        });
    </script>

    <!-- Add this script section at the end of your HTML body -->
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        // Get the input field and table rows
        var input = document.getElementById('searchInput');
        var rows = document.querySelectorAll('.user-row');

        // Add event listener for the input field
        input.addEventListener('input', function () {
            var searchTerm = input.value.toLowerCase();

            // Iterate through each row and toggle visibility based on the search term
            rows.forEach(function (row) {
                var username = row.querySelector('.user-username').innerText.toLowerCase();
                var isVisible = username.includes(searchTerm);

                // Toggle the visibility of the row
                row.style.display = isVisible ? '' : 'none';
            });
        });
    });
    </script>
    

    
@endsection
