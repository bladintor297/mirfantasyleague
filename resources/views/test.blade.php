@extends('layouts.main-layout')

@section('content')

<style>
    .leaderboard-tr td {
        height: 50px; /* Set your desired height here */
        vertical-align: middle; /* Align content vertically */
    }
</style>
<!-- Hero -->
<section class="position-relative pt-5">
    <div class="container">
        <h1 class="mt-5 mb-4 text-center">Leaderboard</h1>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr class="text-start">
                        <th scope="col" class="bg-dark text-white text-center" width="1%">#</th>
                        <th scope="col" class="bg-dark text-white text-center" width="1%">Points</th>
                        <th scope="col" class="bg-dark text-white">Player</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($totalScores) > 0)
                        
                        @php $i = 0 @endphp

                        @foreach ($totalScores as $score)
                            <tr>
                                <td class="text-center">{{ ++$i }}</td>
                                <td class="d-flex pe-2 justify-content-center">
                                    <span class="text-info">{{ $score->total_score }}</span>
                                </td>
                                <td >
                                    {{ $score->team_name }} 
                                </td>
                            </tr>
                            
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4" class="text-center">No record found</td>
                        </tr>
                    @endif
                    
                    <!-- Add more leaderboard rows as needed -->
                </tbody>
            </table>
        </div>
    </div>

</section>

@endsection