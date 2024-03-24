@extends('layouts.main-layout')

@section('content')
    
    

    <!-- Hero -->
    <section class="dark-mode hero bg-size-cover bg-repeat-0 bg-position-center position-relative overflow-hidden py-5 " style="min-height: 100vh">

        <div class="mt-4 mb-lg-2 mb-2 pt-3">
            <h1 class="display-1 text-center mb-0 text-warning header-parallax hero-title">Manage Score</h1>
        </div>

        <div class="container position-relative zindex-2 pb-md-2 pb-lg-4  hero-container ">

            <div class="row justify-content-end my-1 pt-4">
                <div class="col-5 btn-group btn-group-lg" role="group">
                    <form action="{{ route('import') }}" method="POST" name="importform" enctype="multipart/form-data" class="me-1">
                        @csrf
                        <div class="input-group">
                            <input id="file" type="file" name="file" class="form-control" >
                            <button class="btn btn-success">Import File</button>
                        </div>
                        
                    </form>
                    <form action="{{ route('export-teams') }}" name="importform" enctype="multipart/form-data" class="me-1">
                        @csrf
                        <button class="btn btn-info"><i class='bx bxs-download'></i> Teams</button>
                    </form>
                    <form action="{{ route('export') }}" name="importform" enctype="multipart/form-data">
                        @csrf
                        <button class="btn btn-info"><i class='bx bxs-download'></i> Users</button>
                    </form>
                </div>
            </div>

            
            <!-- Dark bordered table -->
            <div class="table-responsive mt-3">
                
                <form action="{{ route('score.update', ['score' => 1]) }}" method="post">
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
