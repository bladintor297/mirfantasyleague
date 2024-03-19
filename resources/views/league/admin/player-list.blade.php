@extends('layouts.main-layout')

@section('content')
    
    

    <!-- Hero -->
    <section class="dark-mode hero bg-size-cover bg-repeat-0 bg-position-center position-relative overflow-hidden py-5 " style="min-height: 100vh">

        <div class="mt-4 mb-lg-2 mb-2 pt-3">
            <h1 class="display-1 text-center mb-0 text-warning header-parallax hero-title">All Players</h1>
        </div>

        <div class="container">

            <div class="d-flex justify-content-end my-3">
                {{-- <form action="player/" id="filter-game"  >
                    <select name="game" id="game" class="form-select bg-dark" >
                        @foreach ($games as $game)
                            <option class="text-white" value="{{ $game->id }}" {{ (isset($id) && $id == $game->id) ? 'selected' : '' }}>{{ $game->name }}</option>
                        @endforeach
                    </select>
                </form> --}}
                <form action="{{ route('import-player') }}" method="POST" name="importform" class="d-flex justify-content-end mx-1" enctype="multipart/form-data">
                    @csrf
                    <div class="d-flex rounded bg-dark">
                        <div class="form-group">
                            <input id="file" type="file" name="file" class="form-control" >
                        </div>
                        <button class="btn btn-success">Import File</button>
                    </div>
    
                    {{-- <div class="form-group">
                        <a class="btn btn-info" href="{{ route('export') }}">Export File</a>
                    </div>  --}}
                </form>

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Reset Player
                </button>
                
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Reset Players</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure want to reset all players? This will usually be done when current game has ended.
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <!-- Form starts here -->
                                <form id="resetForm" method="POST" action="{{ route('player.destroy', ['player' => '1']) }}">
                                    @csrf
                                    @method('DELETE')
                                    <!-- Here, we'll dynamically set the action using JavaScript -->
                                    <button type="submit" class="btn btn-danger">Reset</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                

            </div>
        </div>

        <div class="container position-relative zindex-2 pb-md-2 pb-lg-4  hero-container ">

            
            
            
            <!-- Dark bordered table -->
            <div class="table-responsive">
                
                <form action="{{ route('player.update', ['player' => 'updateAll']) }}" method="post" >
                    @csrf
                    @method('PUT')
                    <table class="table table-dark table-bordered">
                        <thead>
                            <tr>
                                <th scope="col" width="1%">#ID</th>
                                <th scope="col" width="10%">Username</th>
                                <th scope="col" width="15%">Team</th>
                                <th scope="col" width="10%">Nationality</th>
                                <th scope="col" >Picture</th>
                                <th scope="col" >Role</th>
                                <th scope="col" width="10%">Label</th>
                                <th scope="col" class="bg-warning">Score</th>
                                <th scope="col" width="10%">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($players as $index => $player)
                                <tr>
                                    <td class="text-center">
                                        {{ $player->id }}
                                        <input type="hidden" name="players[{{ $player->id }}][id]" value="{{ $player->id }}">
                                    </td>
                                    <td>
                                        <input type="text" name="players[{{ $player->id }}][name]" value="{{ $player->name }}" class="form-control">
                                    </td>
                                    <td>
                                        <select name="players[{{ $player->id }}][team]" class="form-select">
                                            @foreach($teams as $team)
                                                <option value="{{ $team->id }}" {{ $team->id == $player->team ? 'selected' : '' }}>
                                                    {{ $team->team_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" name="players[{{ $player->id }}][nationality]" value="{{ $player->nationality }}" class="form-control">
                                    </td>
                                    <td>
                                        <input type="text" name="players[{{ $player->id }}][picture]" value="{{ $player->picture }}" class="form-control">
                                    </td>
                                    <td>
                                        @php
                                            $roles = [
                                                'EXP_Laner',
                                                'Jungler',
                                                'Mid_Laner',
                                                'Gold_Laner',
                                                'Roamer',
                                            ];
                                        @endphp

                                        <select name="players[{{ $player->id }}][role]" class="form-select">
                                            @foreach($roles as $index => $role)
                                                <option value="{{ $index }}" {{ $player->role == $index ? 'selected' : '' }}>
                                                    {{ $role }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" name="players[{{ $player->id }}][label]" value="{{ $player->label }}" class="form-control ">
                                    </td>
                                    <td class="bg-warning text-white bg-opacity-50">
                                        <input type="number" step="0.01" name="players[{{ $player->id }}][score]" value="{{ $player->score }}" class="form-control bg-white bg-opacity-50">
                                    </td>
                                    <td>
                                        @if ($player->status == 0)
                                            <span class="badge bg-danger">Eliminated</span>
                                        @else
                                            <span class="badge bg-success">Active</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                                
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-end fixed-bottom fixed-right mb-4 me-5 pe-5">
                        <button type="submit" class="btn btn-primary btn-lg px-5">Update Record</button>
                    </div>
                </form>
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
@endsection
