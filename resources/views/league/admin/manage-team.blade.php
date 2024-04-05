@extends('layouts.main-layout')

@section('content')

    <!-- Hero -->
    <section class="dark-mode hero bg-size-cover bg-repeat-0 bg-position-center position-relative overflow-hidden py-5 ">

        <div class="mt-4 mb-lg-2 mb-2 pt-3">
            <h1 class="display-1 text-center mb-0 text-warning header-parallax hero-title">Manage Teams</h1>
        </div>

        <div class="container">
            <div class="d-flex justify-content-end my-3">
                {{-- <form action="score/" id="filter-game"  >
                    <select name="game" id="game" class="form-select bg-dark" >
                        @foreach ($games as $game)
                            <option class="text-white" value="{{ $game->id }}" {{ (isset($id) && $id == $game->id) ? 'selected' : '' }}>{{ $game->name }}</option>
                        @endforeach
                    </select>
                </form> --}}
                <form action="{{ route('import-team') }}" method="POST" name="importform" class="d-flex justify-content-end mx-1" enctype="multipart/form-data">
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
                    Reset Teams
                </button>
                
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Reset Teams</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure want to reset all teams? This will usually be done when current game has ended.
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <!-- Form starts here -->
                                <form id="resetForm" method="POST" action="{{ route('team.destroy', ['team' => '1']) }}">
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
                <form action="{{ route('team.update', ['team' => '1']) }}" method="post">
                    @csrf
                    @method('PUT')
                    <table class="table table-dark table-bordered">
                        <thead>
                            <tr>
                                <th scope="col" width="1%">#TeamID</th>
                                <th scope="col" width="10%">Group</th>
                                <th scope="col">Team Name</th>
                                <th scope="col"  width="30%">Team Logo</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($teams as $team)
                            {{-- @foreach($games as $index => $game) --}}
                                <tr>
                                    <th scope="row"><span class="text-white">{{ $team->id }}</span></th>
                                    <td>
                                        <select class="form-select" name="teams[{{ $team->id }}][label]">
                                            @for ($i = 'A'; $i <= 'D'; ++$i)
                                                <option value="{{ $i }}" {{ $i == $team->label ? 'selected' : '' }}>{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" name="teams[{{ $team->id }}][team_name]" value="{{ $team->team_name }}" class="form-control">
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <input type="file" class="form-control"  name="teams[{{ $team->id }}][logo]">
                                            <img src="{{ asset('public/assets/img/teams/'.$team->id.'.png') }}" alt="team logo" style="height: 30px"class="rounded float-start"> 
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" value="1" name="teams[{{ $team->id }}][status]" {{ $team->status ? 'checked' : '' }}>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-end fixed-bottom fixed-right mb-4 me-5 pe-5">
                        <button type="submit" class="btn btn-primary btn-lg px-5">Update Team</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
