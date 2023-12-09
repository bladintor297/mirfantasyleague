@extends('layouts.main-layout')

@section('content')
<!-- Hero image -->
<div class="jarallax d-none d-md-block" data-jarallax data-speed="0.35" style="position: relative;">
    <span class="position-absolute top-0 start-0 w-100 h-100 "></span>
    <div class="jarallax-img"
        style="background-image: url('{{ asset('assets/img/league/header-wildcard.png') }}'); background-size: cover;">
    </div>
    <div class="d-none d-xxl-block" style="height: 500px;"></div>
    <div class="d-none d-md-block d-xxl-none" style="height: 550px;"></div>
</div>

<!-- Hero -->
<section
    class="dark-mode bg-dark hero bg-size-cover bg-repeat-0 bg-position-center position-relative overflow-hidden pb-5 ">
    <div class="container position-relative zindex-2 pb-md-2 pb-lg-4  hero-container ">

        <!-- Title -->
        <div class="row d-flex justify-content-center text-center pb-4 mb-2 zindex-5">
            <div class="col">
                <h2 class="display-5 mb-4 text-warning">M5 World Championship</h2>
            </div>
        </div>

        <!-- Icon boxes (Features) -->
        <div class="row row-cols-1 row-cols-md-3 g-4 pt-2 pt-md-4 pb-lg-2 d-flex justify-content-center">

            <div class="row g-3 card shadow w-100 py-4 px-2 overflow-auto row-submission" style="height:500px">

                @php $count = 0 @endphp
                
                <!-- Step 5: Form Submission -->
                <div class="step-box" id="step{{ ++$count }}">
                    @php
                        $roles = [
                            'EXP_Laner',
                            'Jungler',
                            'Mid_Laner',
                            'Gold_Laner',
                            'Roamer',
                        ];
                        $reserveRoles = [
                            'Reserve_1',
                            'Reserve_2',
                            'Reserve_3',
                            'Reserve_4',
                            'Reserve_5',
                        ];
                    @endphp
                    <form action="{{ route('myTeam.update', ['myTeam' => 4]) }}" method="post" id="selectHeroForm">
                        @csrf
                        @method('PUT')

                        <div class="col">
                            <p class="h4 text-center text-uppercase text-white" align="justify">
                                - Team {{ $myTeam->label }} -
                            </p>
                        </div>
                        <div class="col-12 mb-5 mb-lg-3">
                            <div class="table-responsive">
                                <table class="table table-dark table-bordered " >
                                    <thead>
                                        <tr>
                                        <th scope="col">#PlayerID</th>
                                        <th scope="col">Roles</th>
                                        <th scope="col">Player</th>
                                        <th scope="col">Team</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                            @foreach($roles as $roleKey => $roleValue)
                                                <tr>
                                                    <th scope="row" class="text-center">
                                                        <div class="d-flex justify-content-center">
                                                            {{$myTeam->{$roleValue}  }} 
                                                            @if ($myTeam->captain == $myTeam->{$roleValue} )
                                                                <i class='bx bx-crown text-warning my-auto ms-1' style="font-size: 1.5rem"></i>
                                                            @endif

                                                            @if ($myTeam->vice_captain == $myTeam->{$roleValue} )
                                                                <i class='bx bx-crown text-warning my-auto ms-1' style="font-size: 1.0rem"></i>
                                                            @endif
                                                        </div>
                                                    </th>
                                                    <td>
                                                        {{$roles[$roleKey]  }}
                                                    </td>
                                                    <td>
                                                        @foreach ($players as $player)
                                                            @if ($player->id == $myTeam->{$roleValue})
                                                                {{$player->name }}
                                                            @endif
                                                        @endforeach
                                                        
                                                    </td>
                                                    <td>
                                                        @foreach ($players as $player)
                                                            @if ($player->id == $myTeam->{$roleValue})
                                                                {{ $player->team_name }}
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                </tr>
                                            @endforeach
                                            
                                            @if ($game->reserve_isOn == 1)
                                                @php $rsvcnt= 0;@endphp
                                                @foreach($reserveRoles as $roleKey => $roleValue)
                                                    @if ($myTeam->{'Reserve_'.$roleKey+1} !== null)
                                                    <tr>
                                                        <th scope="row" class="text-center">
                                                            {{$myTeam->{'Reserve_' . $roleKey +1}  }}
                                                        </th>
                                                        <td>
                                                            {{$reserveRoles[$roleKey] }} -- ({{$roles[$roleKey] }})
                                                        </td>
                                                        <td>
                                                            @foreach ($players as $player)
                                                                @if ($player->id == $myTeam->{'Reserve_' . $roleKey +1})
                                                                    {{$player->name }}
                                                                @endif
                                                            @endforeach
                                                            
                                                        </td>
                                                        <td>
                                                            @foreach ($players as $player)
                                                                @if ($player->id == $myTeam->{'Reserve_' . $roleKey +1})
                                                                    {{ $player->team_name }}
                                                                @endif
                                                            @endforeach
                                                        </td>
                                                    </tr>
                                                    @endif
                                                @endforeach
                                            @endif
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col d-flex justify-content-end mt-5 pb-3 py-2">
                            <input type="hidden" value="{{ $game->id }}" name="game_id">
                            <input type="hidden" value="{{ $myTeam->id }}" name="myTeam_id">
                            <button type="submit" class="btn btn-success mx-1 disabled">Register</button>
    
                        </div>

                    </form>
                    
                    
                </div>


                
                
            </div>

        </div>
    </div>
</section>


@endsection