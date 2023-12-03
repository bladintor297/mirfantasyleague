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
                
                <!-- Step 2: Hero Selection -->
                <div class="step-box" id="step{{ ++$count }}">
                    <div class="col">
                        <p class="h4 text-center text-uppercase text-white" align="justify">
                            - Select {{ $game->reserve_limit }} Reserves -
                        </p>
                    </div>
                    <div class="col-12 mb-5 mb-lg-3">
                        <form action="{{ route('myTeam.update', ['myTeam' => 3]) }}" method="post" id="selectHeroForm">
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
                                            @php
                                                $fileId = null;

                                                if (isset($myTeam->{'Reserve_' . ($reserveKey + 1)})) {
                                                    $linkEscaped = $players->where('id', $myTeam->{'Reserve_' . ($reserveKey + 1)})->first()->picture;

                                                    // Extract file ID from the original link
                                                    preg_match('/\/d\/([^\/]+)\//', $linkEscaped, $matches);
                                                    $fileId = $matches[1];

                                                    // Construct the direct access link
                                                    $directAccessLink = "https://drive.google.com/uc?id=" . $fileId;

                                                    
                                                }
                                            @endphp

                                            <div class="card-body d-grid align-items-center justify-content-center" id="cardBody{{ $reserveKey }}"
                                            style="background-image: url('{{ $fileId ? $directAccessLink : '' }}'); background-size: cover;">
                                                <input name="reserveName{{$reserveKey}}" class="btn btn-link text-warning stretched-link openReserveModalButton" data-index="{{ $reserveKey }}"
                                                value="{{ isset($myTeam->{'Reserve_' . ($reserveKey + 1)}) ? $players->where('id', $myTeam->{'Reserve_' . ($reserveKey + 1)})->first()->name : '+' }}">

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
                                                        @if ($reserve->status == 1)
                                                            <option value="{{ $reserve->id }}" data-role="{{ $reserve->role }}" data-card="{{ $reserve->picture }}"
                                                                data-nationality="{{ $reserve->nationality }}" data-team="{{ $reserve->team }}">{{ $reserve->name }} ({{ $reserveRoles[$reserve->role] }}) -- <em>{{ $reserve->team_name }}</em>
                                                            </option>

                                                            
                                                        @endif
                                                    @endforeach
                                            </select>
                                            <button type="button" class="btn btn-sm btn-warning" id="chooseReserveButton{{$reserveKey}}">Choose Reserve</button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="d-flex justify-content-center mt-3">

                                <!-- Add a hidden input field to store the current step index -->
                                {{-- <input type="hidden" id="currentStep" name="currentStep" value="{{$step}}"> --}}
                                <input type="hidden" value="{{ $game->id }}" name="game_id">
                                <input type="hidden" value="{{ $myTeam->id }}" name="myTeam_id">
                                <button id="submitReserveBtn" type="submit" class="btn btn-danger rounded-pill px-5" >Confirm Reserves</button>
                            </div>
                        </form>
                        

                        
                        
                    </div>

                    
                    <div class="col d-flex justify-content-between mt-2 pb-3 py-2">
                        <a href="/league/{{ $game->id }}" class="btn btn-warning">Back</a>
                        </div>
                </div>

            </div>

        </div>
    </div>
</section>

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
    var reserveLimit = {{ $game->reserve_limit }};

    document.addEventListener('DOMContentLoaded', function () {

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
                if (selectedReserves <= reserveLimit) {
                    const index = button.getAttribute('id').replace('chooseReserveButton', '');
                    const select = document.getElementById('reserveSelect' + index);
                    const selectedOption = select.options[select.selectedIndex];
                    const reserveIDInput = document.getElementById('reserveID' + index);
                    const originalLink = selectedOption.getAttribute('data-card');
                    // Function to convert the original link to direct access link
                    function getDirectAccessLink(originalLink) {
                        // Extract file ID from the original link
                        var fileId = originalLink.match(/\/d\/([^\/]+)\//)[1];

                        // Construct the direct access link
                        var directAccessLink = "https://drive.google.com/uc?id=" + fileId;

                        return directAccessLink;
                    }

                    

                    // Update the value of the linked input in the main form
                    const linkedInput = document.querySelector('input[name="reserveName' + index + '"]');
                    const cardBody = document.getElementById('cardBody' + index);

                    linkedInput.value = selectedOption.text.split(' (')[0];
                    reserveIDInput.value = selectedOption.value;
                    
                    // Get the direct access link
                    var directAccessLink = getDirectAccessLink(originalLink);

                    cardBody.style.backgroundImage = 'url("' + directAccessLink + '")';

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