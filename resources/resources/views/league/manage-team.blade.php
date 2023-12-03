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
                        <th scope="col">#TeamID</th>
                        <th scope="col" width="10%">Group</th>
                        <th scope="col">Team Name</th>
                        <th scope="col">Team Logo</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                        
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($teams as $team)
                            <form action="{{ route('team.update', ['team' => $team->id]) }}" method="post">
                                @csrf
                                @method('PUT')
                                <tr>
                                    <th scope="row">{{ $team->id }}</th>
                                    <td>
                                        <select name="label" class="form-select" id="label">
                                            @for ($i = 'A'; $i <= 'D'; ++$i)
                                                <option value="{{ $i }}" {{ $i == $team->label ? 'selected' : '' }}>{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </td>
                                    <td>{{ $team->team_name }}</td>
                                    <td><img src="{{ $team->logo }}" alt="" style="height: 30px"> </td>
                                    <td >
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id="status" name="status" {{ $team->status ? 'checked' : '' }}>
                                        </div>
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
