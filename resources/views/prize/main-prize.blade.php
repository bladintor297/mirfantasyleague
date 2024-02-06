@extends('layouts.main-layout')

@section('content')
    <!-- Hero -->
    <section class="bg-size-cover bg-dark bg-position-center position-relative overflow-hidden py-5 ">
        <div class="container position-relative zindex-2 pt-5 ">
            <div class="row pt-3">

                <!-- Title -->
                <div class="row d-flex justify-content-center text-center mb-3">
                    <div class="col pt-2 position-absolute top-25  zindex-5">
                        <ul class="nav nav-tabs d-flex justify-content-center text-center prize">
                            <li class="nav-item">
                                <a class="nav-link active rounded-pill px-4" data-bs-toggle="tab" href="#overall">Overall</a>
                            </li>
                            {{-- <li class="nav-item">
                                <a class="nav-link rounded-pill px-4" data-bs-toggle="tab" href="#weekly">Weekly</a>
                            </li> --}}
                        </ul>
                        <h2 class="display-2 text-white text-uppercase ">
                            <span class="text-warning">Prize</span><span class="text-muted">Pool</span>
                        </h2>
                        <div class="row d-flex justify-content-center my-2">
                            <div class="col-8">
                                <form action="prize/" id="filter-game">
                                    <select name="game" id="game" class="form-select mb-3">
        
                                        @foreach ($games as $game)
                                            <option class="form-select" value="{{ $game->id }}"  {{ (isset($id) && $id == $game->id) ? 'selected' : '' }}>
                                                {{ $game->name }} -- <em>{{ $game->league_name }}</em>
                                            </option>
                                        @endforeach
        
                                    </select>
                                </form>
                            </div>
                        </div>
                        
                    </div>
                </div>


                <div class="tab-content " style="min-height: 100vh;">
                    <div class="tab-pane fade show active pt-5" id="overall">
                        @php
                            $imageDirectory = asset('assets/img/prize/' . $id);

                        @endphp

                        @if($id !== '1')
                        <!-- Parallax gfx -->
                        <div class="col-12 d-md-flex justify-content-start mt-5 pt-5">
                            <div class="parallax mx-auto ms-md-0 me-md-n5">
                                <div class="parallax-layer zindex-5" data-depth="0.15">
                                    <img src="{{ asset('assets/img/prize/' . $id . '/overall_first_prize.png') }}" alt="Card" style="filter: drop-shadow(2px 4px 8px hsla(0, 0%, 100%, 0.499))">
                                </div>
                                <div class="parallax-layer zindex-4" data-depth="-0.30">
                                    <img src="{{ asset('assets/img/prize/' . $id . '/overall_second_prize.png') }}" alt="Card" style="filter: drop-shadow(2px 4px 8px hsla(0, 0%, 100%, 0.499))">
                                </div>
                                <div class="parallax-layer zindex-3" data-depth="-0.25">
                                    <img src="{{ asset('assets/img/prize/' . $id . '/overall_third_prize.png') }}" alt="Bubble" style="filter: drop-shadow(2px 4px 8px hsla(0, 0%, 100%, 0.499))">
                                </div>
                            </div>
                        </div>

                        <h2 class="text-uppercase text-center text-warning m-0 p-0">Consolation Prize</h2>

                        <div class="col-12 d-md-flex justify-content-start">

                            <div class="parallax mx-auto ms-md-0 me-md-n5">
                                
                                <div class="parallax-layer zindex-5" data-depth="0.1">
                                    <img src="{{ asset('assets/img/prize/' . $id . '/overall_others_prize.png') }}" alt="Bubble">
                                </div>
                            </div>
                        </div>
                        
                        @else
                        <!-- Parallax gfx -->
                        <div class="col-12 d-md-flex justify-content-center mt-5 pt-5">
                            <div class="parallax mx-auto ms-md-0 me-md-n5">
                                <p class="text-warning zindex-5 mt-5 pt-5 text-center">No Record Found</p>
                            </div>
                        </div>

                        @endif

                        <!-- Title -->
                        {{-- <div class="row d-flex justify-content-center text-center pb-4 mb-2">
                            <div class="col-8 ">
                                <h2 class="display-5 text-white text-uppercase text-center "><span
                                        class="text-warning">Consolation</span> Prizes</h2>

                                <!-- Table -->
                                <div
                                    class="d-sm-flex flex-wrap d-lg-table w-100 bg-white shadow justify-content-center mt-0 pt-0">

                                    <!-- Row -->
                                    <div class="d-lg-table-row w-sm-50 w-lg-100 pe-sm-3 pe-lg-0 mb-3 mb-lg-0">
                                        <div
                                            class="d-lg-table-cell align-middle h5  py-3 py-lg-3 mb-0 ps-3 bg-warning border-bottom">
                                            #4th - #5th Place
                                        </div>
                                        <div
                                            class="d-lg-table-cell align-middle text-lg-center text-dark border-bottom  py-lg-3 h5">
                                            750 Diamonds
                                        </div>
                                    </div>

                                    <!-- Row -->
                                    <div class="d-lg-table-row w-sm-50 w-lg-100 pe-sm-3 pe-lg-0 mb-3 mb-lg-0">
                                        <div
                                            class="d-lg-table-cell align-middle h5  py-3 py-lg-3 mb-0 ps-3 bg-warning border-bottom">
                                            #6th - #10th Place
                                        </div>
                                        <div
                                            class="d-lg-table-cell align-middle text-lg-center text-dark border-bottom  py-lg-3 h5">
                                            500 Diamonds
                                        </div>
                                    </div>

                                    <!-- Row -->
                                    <div class="d-lg-table-row w-sm-50 w-lg-100 pe-sm-3 pe-lg-0 mb-3 mb-lg-0">
                                        <div
                                            class="d-lg-table-cell align-middle h5  py-3 py-lg-3 mb-0 ps-3 bg-warning border-bottom">
                                            #11th - #20th Place
                                        </div>
                                        <div
                                            class="d-lg-table-cell align-middle text-lg-center text-dark border-bottom  py-lg-3 h5">
                                            400 Diamonds
                                        </div>
                                    </div>

                                    <!-- Row -->
                                    <div class="d-lg-table-row w-sm-50 w-lg-100 pe-sm-3 pe-lg-0 mb-3 mb-lg-0">
                                        <div
                                            class="d-lg-table-cell align-middle h5  py-3 py-lg-3 mb-0 ps-3 bg-warning border-bottom">
                                            #21th - #50th Place
                                        </div>
                                        <div
                                            class="d-lg-table-cell align-middle text-lg-center text-dark border-bottom  py-lg-3 h5">
                                            300 Diamonds
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div> --}}
                    </div>
                    <div class="tab-pane fade" id="weekly">

                        <!-- Parallax gfx -->
                        {{-- <div class="col-12 d-md-flex justify-content-end">
                            <div class="parallax mx-auto ms-md-0 me-md-n5">
                                <div class="parallax-layer zindex-5" data-depth="0.1">
                                    <img src="assets/img/prize/weekly_frame.png" alt="Card">
                                </div>
                                <div class="parallax-layer zindex-5" data-depth="0.15">
                                    <img src="assets/img/prize/weekly_first_prize.png" alt="Card"
                                        style="filter: drop-shadow(2px 4px 8px hsla(0, 0%, 100%, 0.499))">
                                </div>
                                <div class="parallax-layer zindex-4" data-depth="-0.30">
                                    <img src="assets/img/prize/weekly_second_prize.png" alt="Card"
                                        style="filter: drop-shadow(2px 4px 8px hsla(0, 0%, 100%, 0.499))">
                                </div>
                                <div class="parallax-layer zindex-3" data-depth="-0.25">
                                    <img src="assets/img/prize/weekly_third_prize.png" alt="Bubble"
                                        style="filter: drop-shadow(2px 4px 8px hsla(0, 0%, 100%, 0.499))">
                                </div>
                            </div>
                        </div> --}}

                        <div class="container  mt-5 pt-5">
                            <p class="text-warning zindex-5 mt-5 pt-5 text-center">TO BE ANNOUNCED</p>

                        </div>

                    </div>
                </div>


            </div>





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
