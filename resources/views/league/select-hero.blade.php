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

            <div class="row g-3 card shadow w-75 py-4 px-5 overflow-auto" style="height:500px">

                @php $count = 0 @endphp
                
                <!-- Step 2: Hero Selection -->
                <div class="step-box" id="step{{ ++$count }}">
                    <div class="col">
                        <p class="h4 text-center text-uppercase text-white" align="justify">
                            - Select Hero -
                        </p>
                    </div>
                    <div class="col-12 mb-5 mb-lg-3">
                        <form action="{{ route('myTeam.update', ['myTeam' => 1]) }}" method="post" id="selectHeroForm" onsubmit="return validateTeamIDs()">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                @php
                                    $roles = [
                                        'EXP_Laner',
                                        'Jungler',
                                        'Mid_Laner',
                                        'Gold_Laner',
                                        'Roamer',
                                    ];

                                    $num = 0;
                                    $x = 0;
                                @endphp
                                @foreach($roles as $roleKey => $roleValue)
                                    <div class="col my-2">
                                        <div class="card card-hover" style="height: 300px; width: 150px">

                                            <div class="card-body d-grid align-items-center justify-content-center"
                                            style="background-image: url('{{ $myTeam->{$roleValue} ? $players->where('id', $myTeam->{$roleValue})->first()->picture : '' }}'); background-size: cover;">
                                                <input name="playerName{{$roleKey}}" class="btn btn-link text-warning stretched-link openModalButton"
                                                data-index="{{ $roleKey }}"
                                                value="{{ isset($myTeam->{$roleValue}) ? $players->where('id', $myTeam->{$roleValue})->first()->name : '' }}" placeholder="+">
                                                <input type="hidden" name="playerID{{$roleKey}}" id="playerID" value="{{ $myTeam->{$roleValue} ?? '+' }}">
                                                <input
                                                    type="hidden"
                                                    name="teamID{{$roleKey}}"
                                                    id="teamID"
                                                    value="{{ isset($myTeam->{$roleValue}) ? $myTeam->{$roleValue} : '+' }}">
                                            </div>
                                            <div class="card-footer text-white text-center">
                                                {{ $roleValue }}
                                            </div>
                                        </div>
                                    </div>

                                    @if ($roleKey == $num)
                                    
                                    <script>var i = {{ $roleKey }};</script>

                                    <div id="customModal" class="modal" data-roleKey="">

                                        {{-- <script>alert({{ $num }})</script> --}}
                                        <div class="modal-content">
                                            <span class="close" id="closeModal">&times;</span>
                                            <p>-Please Select Your Player- </p>
                                            
                                            <select name="player" id="playerSelect" class="form-select">
                                                <option value="0" disabled selected> - Choose Player -</option>
                                                    @foreach($players as $player) 
                                                        @if ($player->status == 1)
                                                        <option value="{{ $player->id }}" data-id="{{ $player->id }}"
                                                            data-role="{{ $player->role }}" data-nationality="{{ $player->nationality }}" data-card="{{ $player->picture }}"
                                                            data-team="{{ $player->team }}">{{ $player->name }} ---  {{ $player->team_name }}
                                                        </option>
                                                            
                                                        @endif
                                                    @endforeach
                                            </select>
                                            <button type="button" class="btn btn-sm btn-warning" id="choosePlayerButton">Choose Player</button>
                                        </div>
                                    </div>
                                    
                                    @endif

                                    @php ++$num @endphp
                                    
                                @endforeach
                            </div>
                            <div class="d-flex justify-content-center mt-3">

                                <!-- Add a hidden input field to store the current step index -->
                                {{-- <input type="hidden" id="currentStep" name="currentStep" value="{{$step}}"> --}}
                                <input type="hidden" value="{{ $game->id }}" name="game_id">
                                <input type="hidden" value="{{ $myTeam->id }}" name="myTeam_id">
                                <button id="submitBtn" type="submit" class="btn btn-danger rounded-pill px-5" >Confirm Players</button>
                            </div>
                        </form>
                        

                        
                        
                    </div>

                    
                    <div class="col d-flex justify-content-start mt-2 pb-3 py-2">
                        <a href="/league/{{ $game->id }}" class="btn btn-warning">Back</a>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>


<script>
    // Now you can use JavaScript to filter options based on the value of i
    var select = document.getElementById("playerSelect");

    for (var j = 0; j < select.options.length; j++) {
        var option = select.options[j];  // Get the current option element

        if (option.getAttribute('data-role') === i) {
            alert(option.getAttribute('data-role'));
            option.style.display = "none";
        }
    }
</script>
<script>
    function validateTeamIDs() {
    var teamIDs = document.querySelectorAll("[name^='teamID']");
    var selectedTeamIDs = [];

    // Iterate through all teamIDs and store them in selectedTeamIDs
    teamIDs.forEach(function(teamID) {
        selectedTeamIDs.push(teamID.value);
    });

    // Check if any teamID occurs more than three times
    var teamIDCounts = {};
    for (var i = 0; i < selectedTeamIDs.length; i++) {
        var teamID = selectedTeamIDs[i];
        teamIDCounts[teamID] = (teamIDCounts[teamID] || 0) + 1;
        if (teamIDCounts[teamID] > 3) {
            alert("Error: Same team ID cannot be selected more than three times.");
            return false; // Prevent form submission
        }
    }

    return true; // Allow form submission
}
</script>
<script>
    // Store scroll position before reload
    window.onbeforeunload = function () {
        sessionStorage.setItem('scrollPosition', window.scrollY);
    };

    // Set scroll position after reload
    window.onload = function () {
        var scrollPosition = sessionStorage.getItem('scrollPosition');
        window.scrollTo(0, scrollPosition || 0);
    };

    
</script>
<script>
    // Get the modal and select element
    var customModal = document.getElementById("customModal");
    var playerSelect = document.getElementById("playerSelect");
    
    // Get all the buttons with the class "openModalButton"
    var openModalButtons = document.querySelectorAll(".openModalButton");
    var playerIDs = document.querySelectorAll("#playerID");
    var teamIDs = document.querySelectorAll("#teamID");
    var cardBodys = document.querySelectorAll(".card-body");
    
    // Initialize a variable to store the selected player's index
    var selectedPlayerIndex = null;

    // Add click event listeners to open the modal for each button
    openModalButtons.forEach(function(button) {
        button.addEventListener("click", function() {
            selectedPlayerIndex = button.getAttribute("data-index");
            customModal.style.display = "block";
            customModal.setAttribute("data-roleKey", selectedPlayerIndex);

            for (var i = 0; i < playerSelect.options.length; i++) {
                var option = playerSelect.options[i];

                // Check if the current option has a data-role attribute equal to 0
                if (option.getAttribute("data-role") !== selectedPlayerIndex  && option.value !== "0") {
                    // Disable the option
                    // option.disabled = true;
                    option.style.display = "none";
                }

                else{
                    option.style.display = "block";
                }
            }
        });
    });

    // Close the modal when the close button is clicked
    var closeModalButton = document.getElementById("closeModal");
    closeModalButton.addEventListener("click", function() {
        customModal.style.display = "none";
    });

    // Handle the selection and update the button's text for each col
    var choosePlayerButton = document.getElementById("choosePlayerButton");
    choosePlayerButton.addEventListener("click", function() {
        if (selectedPlayerIndex !== null) {
            var selectedOption = playerSelect.options[playerSelect.selectedIndex];
            var selectedTeam = selectedOption.getAttribute('data-team');
            var selectedPlayerName = selectedOption.text.split(' (')[0];
            var selectedPlayerID = selectedOption.getAttribute('data-id');
            
            var playerCard= selectedOption.getAttribute('data-card');
            
            console.log(selectedTeam);
            // Replace the value of the specific button with the selected player's details
            playerIDs[selectedPlayerIndex].value = selectedPlayerID;
            teamIDs[selectedPlayerIndex].value = selectedTeam;
            cardBodys[selectedPlayerIndex].style.backgroundImage = 'url("' + playerCard + '")';

            // Update the background-image of the card-body
            // var cardBody = openModalButtons[selectedPlayerIndex].closest('.card-body').querySelector('.card-body');;
            // cardBody.style.backgroundImage = 'url("' + selectedPlayerCard + '")';
            
            // Close the modal
            customModal.style.display = "none";

        }
    });

    
    
</script>

@endsection