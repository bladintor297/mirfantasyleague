@extends('layouts.main-layout')

@section('content')
    
    

    <!-- Hero -->
    <section class="dark-mode hero bg-size-cover bg-repeat-0 bg-position-center position-relative overflow-hidden py-5 " style="min-height: 100vh">

        <div class="mt-4 mb-lg-2 mb-2 pt-3">
            <h1 class="display-1 text-center mb-0 text-warning header-parallax hero-title">All Leagues</h1>
        </div>

        <div class="container position-relative zindex-2 pb-md-2 pb-lg-4  hero-container ">

            <!-- Dark bordered table -->
            <div class="table-responsive">
                
                <form action="{{ route('league.update', ['league' => 1]) }}" method="post">
                    @csrf
                    @method('PUT')
                    <table class="table table-dark table-bordered">
                        <thead>
                            <tr>
                            <th scope="col" width="5%">#No</th>
                            <th scope="col" width="20%">League Name</th>
                            <th scope="col"  width="40%">Description</th>
                            <th scope="col" >Logo</th>
                            <th scope="col" width="8%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($leagues as $index => $league)
                                <tr>
                                    <td class="text-center">
                                        {{ ++$index }}
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="leagues[{{ $index }}][league_name]" value="{{ $league->league_name }}">
                                        <input type="hidden" name="leagues[{{ $index }}][id]" value="{{ $league->id }}">
                                    </td>
                                    <td>
                                        <textarea name="leagues[{{ $index }}][description]" rows="2" class="form-control">{{ $league->description }}</textarea>
                                    </td>
                                    <td >
                                        <input type="text" class="form-control" name="leagues[{{ $index }}][logo]" value="{{ $league->logo }}">
                                    </td>
                                    <td>
                                        <img src="{{ $league->logo }}" alt="" >
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-grid justify-content-end fixed-bottom fixed-right mb-4 me-5 pe-5">
                        <button class="btn btn-warning btn-lg " type="button" data-bs-toggle="offcanvas" data-bs-target="#AddNewLeague" aria-controls="AddNewLeague"><i class='bx bx-plus-circle me-1'></i> New League</button>
                        <button type="submit" class="btn btn-success btn-lg px-5 mt-1">Update Record</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="offcanvas offcanvas-start" tabindex="-1" id="AddNewLeague" aria-labelledby="AddNewLeagueLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="AddNewLeagueLabel">Add New League</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <form  method="POST" action="{{ route('league.store') }}">
                @csrf
                    <div class="mb-3">
                        <label for="league_name" class="form-label">League Name</label>
                        <input type="text" class="form-control" id="league_name" name="league_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="logo" class="form-label">Logo URL</label>
                        <input type="url" class="form-control" id="logo" name="logo" required>
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
        </div>
        
    </section>
@endsection
