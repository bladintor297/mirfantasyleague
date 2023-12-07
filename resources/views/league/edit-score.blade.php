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

            
            <form action="{{ route('import') }}" method="POST" name="importform" class="d-flex justify-content-end my-3" enctype="multipart/form-data">
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
            <!-- Dark bordered table -->
            <div class="table-responsive">
                
                <form action="{{ route('scoreboard.update', ['scoreboard' => 1]) }}" method="post">
                    @csrf
                    @method('PUT')
                    <table class="table table-dark table-bordered">
                        <thead>
                            <tr>
                            <th scope="col">#ID</th>
                            <th scope="col" width="12%">Username</th>
                            <th scope="col">Game</th>
                            <th scope="col" width="10%">Day 1</th>
                            <th scope="col" width="10%">Day 2</th>
                            <th scope="col" width="10%">Day 3</th>
                            <th scope="col" width="10%">Day 4</th>
                            <th scope="col" width="10%">Day 5</th>
                            <th scope="col" width="10%">Day 6</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($scores as $score)
                                <tr>
                                    <th scope="row">{{ $score->id }}
                                        <input type="hidden" name="entries[{{ $score->id }}][score_id]" id="" value="{{ $score->id }}">
                                        <input type="hidden" name="entries[{{ $score->id }}][user_id]" id="" value="{{ $score->user_id }}">
                                    </th>
                                    <td><input name="entries[{{ $score->id }}][username]" type="text" class="form-control"
                                            value="{{ $score->username }}"></td>
                                    <td>
                                        @foreach ($games as $game)
                                        @if ($game->id == $score->game_id)
                                        <input name="entries[{{ $score->id }}][game_id]" type="hidden" class="form-control"
                                            value="{{ $score->game_id }}">
                                        <input name="entries[{{ $score->id }}][game_name]" type="text" readonly class="form-control"
                                            value="{{ $game->league_name }} -- {{ $game->name }}">
                                        @endif
                                        @endforeach
                                    </td>
                                    <td><input name="entries[{{ $score->id }}][day1]" type="text" class="form-control"
                                            value="{{ $score->day1 }}"></td>
                                    <td><input name="entries[{{ $score->id }}][day2]" type="text" class="form-control"
                                            value="{{ $score->day2 }}"></td>
                                    <td><input name="entries[{{ $score->id }}][day3]" type="text" class="form-control"
                                            value="{{ $score->day3 }}"></td>
                                    <td><input name="entries[{{ $score->id }}][day4]" type="text" class="form-control"
                                            value="{{ $score->day4 }}"></td>
                                    <td><input name="entries[{{ $score->id }}][day5]" type="text" class="form-control"
                                            value="{{ $score->day5 }}"></td>
                                    <td><input name="entries[{{ $score->id }}][day6]" type="text" class="form-control"
                                            value="{{ $score->day6 }}"></td>
                                </tr>
                            @endforeach
                                
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-end fixed-bottom fixed-right mb-4 me-5 pe-5">
                        <button type="submit" class="btn btn-primary btn-lg px-5">Update Marks</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
