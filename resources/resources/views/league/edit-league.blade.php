@extends('layouts.main-layout')

@section('content')
    
    

    <!-- Hero -->
    <section class="dark-mode hero bg-size-cover bg-repeat-0 bg-position-center position-relative overflow-hidden pb-5 ">
        <div class="container position-relative zindex-2 pb-md-2 pb-lg-4  hero-container ">

            <!-- Title -->
            <div class="row d-flex justify-content-center text-center pb-4 mb-2 zindex-5">
                <div class="col">
                    <h2 class="display-2 mb-4 text-warning">All Leagues</h2>
                </div>
            </div>

            <!-- Dark bordered table -->
            <div class="table-responsive">
                <table class="table table-dark table-bordered">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">League</th>
                        <th scope="col">Game</th>
                        <th scope="col">Status</th>
                        <th scope="col">TW Rule</th>
                        <th scope="col">PL Rule</th>
                        <th scope="col">PL Num</th>
                        <th scope="col">RP Rule</th>
                        <th scope="col">RP Num</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($games as $game)
                            <form action="{{ route('league.update', ['league' => $game->id]) }}" method="post">
                                @csrf
                                @method('PUT')
                                <tr>
                                    <th scope="row">{{ $game->id }}</th>
                                    <td>{{ $game->league_name }}</td>
                                    <td>{{ $game->name }}</td>
                                    <td >
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id="status" name="status" {{ $game->status ? 'checked' : '' }}>
                                        </div>
                                    </td>
                                    <td >
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id="transfer_isOn" name="transfer_isOn" {{ $game->transfer_isOn ? 'checked' : '' }}>
                                        </div>
                                    </td>
                                    <td >
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" name="player_isOn" {{ $game->player_isOn ? 'checked' : '' }}>
                                        </div>
                                    </td>
                                    <td>
                                        <input type="number" class="form-control form-control-sm" name="player_limit" value="{{ $game->player_limit }}">
                                    </td>
                                    <td>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" name="reserve_isOn" {{ $game->reserve_isOn ? 'checked' : '' }}>
                                        </div>
                                    </td>
                                    <td>
                                        <input type="number" class="form-control form-control-sm" name="reserve_limit" value="{{ $game->reserve_limit }}">
                                    </td>
                                    <td>
                                        <button type="submit" class="btn btn-warning btn-sm">Update</button>
                                    </td>
                                </tr>
                            </form>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
