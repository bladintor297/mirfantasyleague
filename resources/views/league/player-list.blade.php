@extends('layouts.main-layout')

@section('content')
    
    

    <!-- Hero -->
    <section class="dark-mode hero bg-size-cover bg-repeat-0 bg-position-center position-relative overflow-hidden pb-5 " style="min-height: 100vh">
        <div class="container position-relative zindex-2 pb-md-2 pb-lg-4  hero-container ">

            <!-- Title -->
            <div class="row d-flex justify-content-center text-center pb-4 mb-2 zindex-5">
                <div class="col">
                    <h2 class="display-2 mb-4 text-warning">All Players</h2>
                </div>
            </div>

            <div class="d-flex justify-content-end my-3">
                <form action="player/" id="filter-game"  >
                    <select name="game" id="game" class="form-select bg-dark" >
                        @foreach ($games as $game)
                            <option class="text-white" value="{{ $game->id }}" {{ (isset($id) && $id == $game->id) ? 'selected' : '' }}>{{ $game->name }}</option>
                        @endforeach
                    </select>
                </form>
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
                

            </div>
            
            
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
                                    <td class="bg-warning text-dark bg-opacity-50">
                                        <input type="number" step="0.01" name="players[{{ $player->id }}][score]" value="{{ $player->score }}" class="form-control bg-dark bg-opacity-50">
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
