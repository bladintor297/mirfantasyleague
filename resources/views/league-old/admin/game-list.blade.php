@extends('layouts.main-layout')

@section('content')
    
    

    <!-- Hero -->
    <section class="dark-mode hero bg-size-cover bg-repeat-0 bg-position-center position-relative overflow-hidden py-5 " style="min-height: 100vh">

        <div class="mt-4 mb-lg-2 mb-2 pt-3">
            <h1 class="display-1 text-center mb-0 text-warning header-parallax hero-title">All Games</h1>
        </div>

        <div class="container position-relative zindex-2 pb-md-2 pb-lg-4  hero-container ">


            <sup class="text-danger d-flex justify-content-end my-1">TW - Transfer Window; PL - Player Limit; RP - Reserve Player; IL - Import Limit, RRsv - Reset Reserves</sup>
            <!-- Dark bordered table -->
            <div class="table-responsive">
                <form action="{{ route('game.update', ['game' => 'updateAll']) }}" method="post">
                @csrf
                    @method('PUT')
                    <table class="table table-dark table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">League</th>
                                <th scope="col">Game</th>
                                <th scope="col">Status</th>
                                <th scope="col">TW Rule</th>
                                <th scope="col">PL Rule</th>
                                <th scope="col" width="8%">PL Num</th>
                                <th scope="col">RP Rule</th>
                                <th scope="col" width="8%">RP Num</th>
                                <th scope="col" width="8%">IL Num</th>
                                <th scope="col">R Rsv</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($games as $index => $game)
                                <tr>
                                    <th scope="row">{{ $game->id }}</th>
                                    <td>
                                        <select class="form-select" name="games[{{ $game->id }}][league_id]">
                                            @foreach($leagues as $league)
                                                <option value="{{ $league->id }}" {{ $game->league_id == $league->id ? 'selected' : '' }}>{{ $league->league_name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input type="hidden" name="games[{{ $game->id }}][id]" value="{{ $game->id }}">
                                        <input type="text" name="games[{{ $game->id }}][name]" value="{{ $game->name }}" class="form-control">
                                    </td>
                                    <td>
                                        <select class="form-select" name="games[{{ $game->id }}][status]">
                                            <option value="0" {{ $game->status == 0 ? 'selected' : '' }}>Coming Soon</option>
                                            <option value="1" {{ $game->status == 1 ? 'selected' : '' }}>Registration Open</option>
                                            <option value="2" {{ $game->status == 2 ? 'selected' : '' }}>Registration Closed</option>
                                            <option value="3" {{ $game->status == 3 ? 'selected' : '' }}>Game Ended</option>
                                        </select>

                                    </td>
                                    <td>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id="transfer_isOn{{ $index }}" value="1" name="games[{{ $game->id }}][transfer_isOn]" {{ $game->transfer_isOn ? 'checked' : '' }}>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" name="games[{{ $game->id }}][player_isOn]" {{ $game->player_isOn ? 'checked' : '' }} value="1">
                                        </div>
                                    </td>
                                    <td>
                                        <input type="number" class="form-control form-control-sm" name="games[{{ $game->id }}][player_limit]" value="{{ $game->player_limit }}">
                                    </td>
                                    <td>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" name="games[{{ $game->id }}][reserve_isOn]" {{ $game->reserve_isOn ? 'checked' : '' }} value="1">
                                        </div>
                                    </td>
                                    <td>
                                        <input type="number" class="form-control form-control-sm" name="games[{{ $game->id }}][reserve_limit]" value="{{ $game->reserve_limit }}">
                                    </td>
                                    <td>
                                        <input type="number" class="form-control form-control-sm" name="games[{{ $game->id }}][import_limit]" value="{{ $game->import_limit }}">
                                    </td>
                                    <td>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id="reset_reserve{{ $index }}" name="games[{{ $game->id }}][reset_reserve]" value="1">
                                        </div>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="offcanvas" data-bs-target="#EditGameDetails{{ $game->id }}" aria-controls="EditGameDetails{{ $game->id }}">Edit </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-grid justify-content-end fixed-bottom fixed-right mb-4 me-5 pe-5">
                        <button class="btn btn-warning btn-lg " type="button" data-bs-toggle="offcanvas" data-bs-target="#AddNewGame" aria-controls="AddNewGame"><i class='bx bx-plus-circle me-1'></i> New Game</button>
                        <button type="submit" class="btn btn-success btn-lg px-5 mt-1">Update Record</button>
                    </div>
                </form>
                
            </div>
        </div>

        {{-- Edit Game Offcanvas --}}
        @foreach($games as $game)
            <div class="offcanvas offcanvas-end" tabindex="-1" id="EditGameDetails{{ $game->id }}" aria-labelledby="EditGameDetailsLabel{{ $game->id }}" style="width: 500px">
                <!-- ... existing content ... -->
                <div class="offcanvas-body">
                    <h3 class="mb-0 pb-0">Rules and Regulations</h3>
                    <sup class="text-danger fst-italic">*** Use "// " to initiate a new line</sup>
                    <form action="{{ route('game.update', ['game' => $game->id]) }}" method="post">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label for="brief_info" class="form-label">Brief Info</label>
                            <textarea class="form-control" id="brief_info" name="brief_info" rows="4">{{ $game->brief_info }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="instructions" class="form-label">Instructions</label>
                            <textarea class="form-control" id="instructions" name="instructions" rows="4">{{ $game->instructions }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="transfer_rule" class="form-label">Transfer Rule</label>
                            <textarea class="form-control" id="transfer_rule" name="instructions" rows="4">{{ $game->transfer_rule }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="player_rule" class="form-label">Player Limit Rule</label>
                            <textarea class="form-control" id="player_rule" name="player_rule" rows="1">{{ $game->player_rule }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="scoring" class="form-label">Scoring Rule</label>
                            <textarea class="form-control" id="scoring" name="scoring" rows="4">{{ $game->scoring }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-success">Submit</button>

                    </form>
                </div>
            </div>
        @endforeach

        {{-- New Game Offcanvas --}}
        <div class="offcanvas offcanvas-start" tabindex="-1" id="AddNewGame" aria-labelledby="AddNewGameLabel"  style="width: 500px">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="AddNewGameLabel">Add New Game</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <form method="POST" action="{{ route('game.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="league" class="form-label">League Name</label>
                        <select name="league" id="league" class="form-select">
                            @foreach ($leagues as $league)
                                <option value="{{ $league->id }}">{{ $league->league_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Game Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="row mb-3">
                        <div class="col-6">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" name="status">
                                <option value="0" selected>Coming Soon</option>
                                <option value="1">Registration Open</option>
                                <option value="2">Registration Closed</option>
                                <option value="3">Game Ended</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="team_num" class="form-label">Team Number</label>
                            <input type="number" class="form-control" id="team_num" name="team_num" required value="1">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="brief_info" class="form-label">Brief Information</label>
                        <textarea class="form-control" id="brief_info" name="brief_info" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="instructions" class="form-label">Instructions</label>
                        <textarea class="form-control" id="instructions" name="instructions"required></textarea>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="reserve_rule" class="form-label">Reserve Rule</label>
                            <textarea class="form-control" id="reserve_rule" name="reserve_rule" required></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="transfer_rule" class="form-label">Transfer Rule</label>
                            <textarea class="form-control" id="transfer_rule" name="transfer_rule" required></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="player_rule" class="form-label">Player Limit Rule</label>
                            <textarea class="form-control" id="player_rule" name="player_rule" required></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-4">
                            <label for="reserve_limit" class="form-label">Reserve Limit</label>
                            <input type="number" class="form-control" id="reserve_limit" name="reserve_limit" required>
                        </div>
                        <div class="col-4">
                            <label for="player_limit" class="form-label">Player Limit</label>
                            <input type="number" class="form-control" id="player_limit" name="player_limit" required>
                        </div>
                        <div class="col-4">
                            <label for="import_limit" class="form-label">Import Limit</label>
                            <input type="number" class="form-control" id="import_limit" name="import_limit" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="scoring" class="form-label">Scoring Rule</label>
                            <textarea class="form-control" id="scoring" name="scoring" required></textarea>
                        </div>
                    </div>
                    <div class="hr"></div>
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
                
            </div>
        </div>
    </section>
@endsection
