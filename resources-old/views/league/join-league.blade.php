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
                <h2 class="display-5 mb-4 text-warning">M5 Tournament Championship</h2>
            </div>
        </div>

        <!-- Icon boxes (Features) -->
        <div class="row row-cols-1 row-cols-md-3 g-4 pt-2 pt-md-4 pb-lg-2 d-flex justify-content-center">

            <div class="row g-3 card shadow w-75 py-4 px-5 overflow-auto" style="height:500px">

                @php $count = 0 @endphp
                
                <!-- Step 1: Rules and Regulations -->
                <div class="step-box" id="step{{ ++$count }}">
                    <div class="col mb-5">
                        <p class="h6 text-white" align="justify">
                            {{ $game->brief_info }}
                        </p>
                        {{-- <h5><u></u></h5> --}}
                    </div>
                    <div class="col">
                        <!-- Vertical steps -->
                        <div class="steps  steps-sm text-white">

                            <!-- Step -->
                            <div class="step">
                                <div class="step-number">
                                    <div class="step-number-inner">1</div>
                                </div>
                                <div class="step-body">
                                    <h5 class="mb-2">Instructions for participation in the game:</h5>
                                    <p class="fs-sm mb-0">
                                        <ol>
                                            @php
                                                $instructions = explode('// ', $game->instructions); // Replace $yourDynamicData with the variable holding your dynamic data
                                            @endphp

                                            @foreach($instructions as $item)
                                                @if(trim($item) !== '')
                                                    <li>{{ trim($item) }}</li>
                                                @endif
                                            @endforeach

                                        </ol>
                                    </p>
                                </div>
                            </div>

                            <!-- Step -->
                            <div class="step">
                                <div class="step-number">
                                    <div class="step-number-inner">2</div>
                                </div>
                                <div class="step-body">
                                    <h5 class="mb-2">Player Limits</h5>
                                    <p class="fs-sm mb-0">
                                        <ul>
                                            @php
                                                $player_rules = explode('// ', $game->player_rule); // Replace $yourDynamicData with the variable holding your dynamic data
                                            @endphp

                                            @foreach($player_rules as $item)
                                                @if(trim($item) !== '')
                                                    <li>{{ trim($item) }}</li>
                                                @endif
                                            @endforeach

                                        </ul>
                                    </p>
                                </div>
                            </div>

                            <!-- Step -->
                            <div class="step">
                                <div class="step-number">
                                    <div class="step-number-inner">3</div>
                                </div>
                                <div class="step-body">
                                    <h5 class="mb-2">Reserve Rules</h5>
                                    <p class="fs-sm mb-0">
                                        <ul>
                                            @php
                                                $reserve_rules = explode('// ', $game->reserve_rule); // Replace $yourDynamicData with the variable holding your dynamic data
                                            @endphp

                                            @foreach($reserve_rules as $item)
                                                @if(trim($item) !== '')
                                                    <li>{{ trim($item) }}</li>
                                                @endif
                                            @endforeach

                                        </ul>
                                    </p>
                                </div>
                            </div>

                            <!-- Step -->
                            <div class="step">
                                <div class="step-number">
                                    <div class="step-number-inner">4</div>
                                </div>
                                <div class="step-body">
                                    <h5 class="mb-2">Transfer Window</h5>
                                    <p class="fs-sm mb-0">
                                        <ul>
                                            @php
                                                $transfer_rules = explode('// ', $game->transfer_rule); // Replace $yourDynamicData with the variable holding your dynamic data
                                            @endphp

                                            @foreach($transfer_rules as $item)
                                                @if(trim($item) !== '')
                                                    <li>{{ trim($item) }}</li>
                                                @endif
                                            @endforeach

                                        </ul>
                                    </p>
                                </div>
                            </div>

                            <!-- Step -->
                            <div class="step">
                                <div class="step-number">
                                    <div class="step-number-inner">5</div>
                                </div>
                                <div class="step-body">
                                    <h5 class="mb-2">Scoring</h5>
                                    <p class="fs-sm mb-0">
                                        <ul>
                                            @php
                                                $scoring = explode('// ', $game->scoring); // Replace $yourDynamicData with the variable holding your dynamic data
                                            @endphp

                                            @foreach($scoring as $item)
                                                @if(trim($item) !== '')
                                                    <li>{{ trim($item) }}</li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col d-flex justify-content-end">
                        <button type="button" class="btn btn-warning" onclick="nextStep({{ $count }})">Next</button>
                    </div>
                </div>

                <!-- Step 2: Hero Selection -->
                <div class="step-box" id="step{{ ++$count }}">
                    <div class="col">
                        <p class="h4 text-center text-uppercase text-white" align="justify">
                            - Select Your Hero -
                        </p>
                    </div>
                    <div class="col-12 mb-5 mb-lg-3">
                        <form action="{{ route('player.update', ['player' => 0]) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                @php
                                    $roles = [
                                        'EXP Laner',
                                        'Jungler',
                                        'Mid Laner',
                                        'Gold Laner',
                                        'Roamer',
                                    ];
                                @endphp
                                @foreach($roles as $roleKey => $roleValue)
                                    <div class="col">
                                        <div class="card card-hover" style="height: 300px; width: 150px">
                                            <div class="card-body d-grid align-items-center justify-content-center">
                                                <input name="playerName{{$roleKey}}" class="btn btn-link text-warning stretched-link openModalButton" data-index="{{ $roleKey }}"  value="{{ session('playerName_' . $roleKey, '+') }}">
                                                <input type="hidden" name="playerID{{$roleKey}}" id="playerID" value="">
                                                <input type="hidden" name="teamID{{$roleKey}}" id="teamID" value="">
                                            </div>
                                            <div class="card-footer text-white text-center">
                                                {{ $roleValue }} {{ $roleKey }}
                                            </div>
                                        </div>
                                    </div>

                                    <div id="customModal" class="modal">
                                        <div class="modal-content">
                                            <span class="close" id="closeModal">&times;</span>
                                            <p>-Please Select Your Player-</p>
                                            
                                            <select name="player" id="playerSelect" class="form-select">
                                                <option value="0" disabled selected> - Choose Player -</option>
                                                    @foreach($players as $player)
                                                        <option value="{{ $player->id }}" data-id="{{ $player->id }}"  data-role="{{ $player->role }}" data-nationality="{{ $player->nationality }}" data-team="{{ $player->team }}">{{ $player->name }} ({{ $roles[$player->role] }}) -- <em>{{ $player->team_name }}</em></option>
                                                    @endforeach
                                            </select>
                                            <button type="button" class="btn btn-sm btn-warning" id="choosePlayerButton">Choose Player</button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="d-flex justify-content-center mt-3">

                                <!-- Add a hidden input field to store the current step index -->
                                {{-- <input type="hidden" id="currentStep" name="currentStep" value="{{$step}}"> --}}
                                <button id="submitBtn" type="submit" class="btn btn-danger btn-sm rounded-pill px-5" >Confirm Players</button>
                            </div>
                        </form>
                        

                        
                        
                    </div>

                    
                    <div class="col d-flex justify-content-between mt-5 pb-3 py-2">
                        <button type="button" class="btn btn-warning" onclick="prevStep({{ $count }})">Back</button>
                        <button type="button" class="btn btn-warning " onclick="nextStep({{ $count }})">Next</button>
                    </div>
                </div>

                <!-- Step 3: Confirm heroes -->
                <div class="step-box" id="step{{ ++$count }}">
                    <form id="playerForm" action="{{ route('team.store', ['player' => 0]) }}" method="post">
                        
                        <div class="col">
                            <p class="h4 text-center text-uppercase text-white" align="justify">
                                - Select Your Hero -
                            </p>
                        </div>
                        <div class="col-12 mb-5 mb-lg-3">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    @php
                                        $roles = [
                                            'EXP Laner',
                                            'Jungler',
                                            'Mid Laner',
                                            'Gold Laner',
                                            'Roamer',
                                        ];
                                    @endphp
                                    @foreach($roles as $roleKey => $roleValue)
                                        <div class="col">

                                            <div class="card bg-gradient" style="height: 300px; width: 150px">
                                                <div class="card-body d-flex align-items-center justify-content-center">
                                                    
                                                    <input readonly name="playerName{{ $roleKey }}" class="btn btn-link text-warning stretched-link openModalButton" value="{{ session('playerName_' . $roleKey, '+') }}">
                                                    <input type="hidden" name="playerID{{$roleKey}}" class="btn btn-link text-warning stretched-link" value="{{ session('playerID_' . $roleKey) }}">
                                                </div>
                                                <div class="card-footer text-white text-center">
                                                    {{ $roleValue }}
                                                    
                                                </div>
                                            </div>
                                            
                                            <div class="text-start border-top border-1 mt-3">
                                                <label>
                                                    <input type="radio" name="captain" value="{{ $roleKey }}" required onclick="checkSelection()"> Captain
                                                </label>
                                                <label>
                                                    <input type="radio" name="vice_captain" value="{{ $roleKey }}" required onclick="checkSelection()"> Vice-Captain
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="d-flex justify-content-center">

                                    <!-- Add a hidden input field to store the current step index -->
                                    {{-- <input type="hidden" id="currentStep" name="currentStep" value="{{$step}}"> --}}
                                </div>
                            
                            

                            @if (Session::has('playerName_0'))
                                <script>
                                    alert(session(''))
                                </script>
                            @endif
                            
                        </div>
                        <div class="col d-flex justify-content-between mt-5 pb-3 py-2">
                            <button type="button" class="btn btn-warning" onclick="prevStep({{ $count }})">Back</button>
                            <button type="button" class="btn btn-warning disabled" id="confirmHero-btn" onclick="nextStep({{ $count }})">Next</button>
                        </div>
                    </form>
                </div>

                @if ($game->reserve_isOn)
                <!-- Step 4: Reserve Selection -->
                <div class="step-box" id="step{{ ++$count }}">
                    <div class="col">
                        <p class="h4 text-center text-uppercase text-white" align="justify">
                            - Select Your Reserve -
                        </p>
                    </div>
                    <div class="col-12 mb-5 mb-lg-3">
                        <form action="{{ route('player.update', ['player' => 1]) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                @php
                                    $reserveRoles = [
                                        'EXP Laner',
                                        'Jungler',
                                        'Mid Laner',
                                        'Gold Laner',
                                        'Roamer',
                                    ];
                                @endphp
                                @foreach($reserveRoles as $reserveKey => $reserveValue)
                                    <div class="col">
                                        <div class="card card-hover" style="height: 300px; width: 150px">
                                            <div class="card-body d-grid align-items-center justify-content-center">
                                                <input name="reserveName{{$reserveKey}}" class="btn btn-link text-warning stretched-link openReserveModalButton" data-index="{{ $reserveKey }}"  value="{{ session('reserveName_' . $reserveKey, '+') }}">
                                                <input type="hidden" name="reserveID{{$reserveKey}}" id="reserveID{{$reserveKey}}">
                                            </div>
                                            <div class="card-footer text-white text-center">
                                                {{ $reserveValue }} {{ $reserveKey }}
                                            </div>
                                        </div>
                                    </div>

                                    <div id="customReserveModal{{$reserveKey}}" class="modal">
                                        <div class="modal-content">
                                            <span class="close" id="closeReserveModal{{$reserveKey}}">&times;</span>
                                            <p>-Please Select Your Reserve-</p>
                                            
                                            <select name="reserve" id="reserveSelect{{$reserveKey}}" class="form-select">
                                                <option value="0" disabled selected> - Choose Reserve -</option>
                                                    @foreach($players as $reserve)
                                                        <option value="{{ $reserve->id }}" data-role="{{ $reserve->role }}" data-nationality="{{ $reserve->nationality }}" data-team="{{ $reserve->team }}">{{ $reserve->name }} ({{ $reserveRoles[$reserve->role] }}) -- <em>{{ $reserve->team_name }}</em></option>
                                                    @endforeach
                                            </select>
                                            <button type="button" class="btn btn-sm btn-warning" id="chooseReserveButton{{$reserveKey}}">Choose Reserve</button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="d-flex justify-content-center mt-3">
                                <button id="submitReserveBtn" type="submit" class="btn btn-danger btn-sm rounded-pill px-5" >Confirm Reserves</button>
                            </div>
                        </form>
                    </div>

                    <div class="col d-flex justify-content-between mt-5 pb-3 py-2">
                        <button type="button" class="btn btn-warning" onclick="prevStep({{ $count }})">Back</button>
                        <button type="button" class="btn btn-warning " onclick="nextStep({{ $count }})">Next</button>

                    </div>
                </div>
                @endif
                

                <!-- Step 5: Form Submission -->
                <div class="step-box" id="step{{ ++$count }}">
                    <form action="{{ route('team.store') }}" method="post">
                        @csrf

                        <div class="col">
                            <p class="h4 text-center text-uppercase text-white" align="justify">
                                - Confirm Your Players -
                            </p>
                        </div>
                        <div class="col-12 mb-5 mb-lg-3">
                            <div class="table-responsive">
                                <table class="table table-dark table-bordered">
                                    <thead>
                                        <tr>
                                        <th scope="col">#PlayerID</th>
                                        <th scope="col">Roles</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Team</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                            @for($i = 0; $i < 5; ++$i)
                                                <tr>
                                                    <th scope="row">{{ Session::get('playerID_'.$i) }}</th>
                                                    <td><input type="text" readonly class="form-control" name="roles[]" value="{{ $roles[$i] }}" /></td>
                                                    <td><input type="text" readonly class="form-control" name="playerIDs[]" value="{{ Session::get('playerID_'.$i) }}" /></td>
                                                    <td>
                                                        @foreach ($players as $player)
                                                            @if ($player->id == Session::get('playerID_'.$i))
                                                                <input type="text" name="teamNames[]" value="{{ $player->team_name }}" class="form-control" readonly/>
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                </tr>
                                            @endfor
                                            
                                            @if($game->reserve_isOn)
                                                @php $rsvcnt= 0;@endphp
                                                @for($i = 0; $i < 5; ++$i)
                                                    @if (Session::get('reserveName_'.$i) != '+')
                                                        <tr>
                                                            <th scope="row">{{ Session::get('reserveID_'.$i) }}</th>
                                                            <td><input type="text" readonly class="form-control" name="reserves[]" value="Reserve_{{ ++$rsvcnt }}" /></td>
                                                            <td><input type="text" readonly class="form-control" name="reserveIDs[]" value="{{ Session::get('reserveID_'.$i) }}" /></td>
                                                            <td>
                                                                @foreach ($players as $player)
                                                                    @if ($player->id == Session::get('reserveID_'.$i))
                                                                        <input type="text" class="form-control" readonly name="reserveTeamNames[]" value="{{ $player->team_name }}" />
                                                                    @endif
                                                                @endforeach
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endfor
                                            @endif
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col d-flex justify-content-between mt-5 pb-3 py-2">
                            <button type="button" class="btn btn-warning" onclick="prevStep({{ $count }})">Back</button>
                            <button type="submit" class="btn btn-success ">Register</button>
    
                        </div>

                    </form>
                    
                    
                </div>


                
                
            </div>

        </div>
    </div>
</section>
<script>


    let currentStep = 1;
    
    console.log(currentStep);
    showStep(currentStep);


    function showStep(step) {
        const steps = document.querySelectorAll('.step-box');
        for (let i = 0; i < steps.length; i++) {
            steps[i].style.display = 'none';
        }
        steps[step - 1].style.display = 'block';
    }

    function nextStep(step) {
        currentStep = step + 1;
        showStep(currentStep);
    }

    function prevStep(step) {
        currentStep = step - 1;
        showStep(currentStep);
    }

    var selectedPlayers = 0;
    var reserveLimit = {{ $game->reserve_limit }};

    function checkSelection() {
        var captainSelected = document.querySelector('input[name="captain"]:checked');
        var viceCaptainSelected = document.querySelector('input[name="vice_captain"]:checked');
        var nextButton = document.getElementById('confirmHero-btn');

        if (captainSelected && viceCaptainSelected) {
            nextButton.classList.remove('disabled');
        } else {
            nextButton.classList.add('disabled');
        }
    }

</script>
<script>
    var selectedPlayers = 0;
    var reserveLimit = {{ $game->reserve_limit }};

    function checkSelection() {
        var captainSelected = document.querySelector('input[name="captain"]:checked');
        var viceCaptainSelected = document.querySelector('input[name="vice_captain"]:checked');
        var nextButton = document.getElementById('confirmHero-btn');

        if (captainSelected && viceCaptainSelected) {
            nextButton.classList.remove('disabled');
        } else {
            nextButton.classList.add('disabled');
        }
    }
    document.addEventListener('DOMContentLoaded', function () {
    // Your existing code...

    let selectedReserves = 0;

    // Add event listeners for modal buttons
    const openReserveButtons = document.querySelectorAll('.openReserveModalButton');
    openReserveButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            const index = button.getAttribute('data-index');
            const modal = document.getElementById('customReserveModal' + index);
            modal.style.display = 'block';
        });
    });

    // Add event listeners for close buttons in modals
    const closeReserveButtons = document.querySelectorAll('.close');
    closeReserveButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            const modal = button.parentElement;
            modal.style.display = 'none';
        });
    });

    // Add event listeners for chooseReserveButton
    const chooseReserveButtons = document.querySelectorAll('.btn-warning[id^="chooseReserveButton"]');
    chooseReserveButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            if (selectedReserves <= 2) {
                const index = button.getAttribute('id').replace('chooseReserveButton', '');
                const select = document.getElementById('reserveSelect' + index);
                const selectedOption = select.options[select.selectedIndex];
                const reserveIDInput = document.getElementById('reserveID' + index);

                // Update the value of the linked input in the main form
                const linkedInput = document.querySelector('input[name="reserveName' + index + '"]');
                linkedInput.value = selectedOption.text.split(' (')[0];
                reserveIDInput.value = selectedOption.value;


                // You might want to update other hidden fields as well (e.g., reserveID)

                // Close the modal
                const modal = document.getElementById('customReserveModal' + index);
                modal.style.display = 'none';

                // Disable the selected option in the dropdown
                selectedOption.disabled = true;

                // Increment the count of selected reserves
                selectedReserves++;
            }
        });
    });

    // Add event listener to close modals if clicked outside the modal content
    window.addEventListener('click', function (event) {
        const modals = document.querySelectorAll('.modal');
        modals.forEach(function (modal) {
            if (event.target === modal) {
                modal.style.display = 'none';
            }
        });
    });
});


</script>

@endsection