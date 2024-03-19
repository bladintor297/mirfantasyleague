
@extends('layouts.main-layout')

@section('content')

    <!-- Hero image -->
    <div class="jarallax d-none d-md-block" data-jarallax data-speed="0.35" style="position: relative;">
        <span class="position-absolute top-0 start-0 w-100 h-100 "></span>
        <div class="jarallax-img"
            style="background-image: url('{{ asset('assets/img/background/parallax-zilong.png') }}'); width: 100%; background-size: cover;">
        </div>
        <div class="d-none d-xxl-block" style="height: 450px;"></div>
        <div class="d-none d-md-block d-xxl-none" style="height: 550px;"></div>
        <h1 class="text-white tst header-parallax mb-0">MY PROFILE</h1>
    </div>

    <!-- How it works (Slider) -->
    <!-- Page content -->
    <section class="container pt-5">
        <div class="row">

  
          <!-- Sidebar (User info + Account menu) -->
          <aside class="col-lg-3 col-md-4 border-end pb-5 mt-n5">
            <div class="position-sticky top-0">
              <div class="text-center pt-5">
                <div class="d-table position-relative mx-auto mt-2 mt-lg-4 pt-5 mb-3">
                  <img src="{{ asset('public/assets/img/profile/'.Auth::user()->team_logo)  }}" class="d-block rounded-circle" width="120"  alt="{{ Auth::user()->name }}" style="width: 120px; height:120px; object-fit:cover">
                  <button type="button" class="btn btn-icon btn-light bg-white btn-sm border rounded-circle shadow-sm position-absolute bottom-0 end-0 mt-4" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Change picture" aria-label="Change picture">
                    <i class="bx bx-refresh"></i>
                  </button>
                </div>
                <h2 class="h5 mb-1">{{ Auth::user()->name }}</h2>
                <p class="mb-3 pb-3">{{ Auth::user()->email }}</p>
                <button type="button" class="btn btn-secondary w-100 d-md-none mt-n2 mb-3" data-bs-toggle="collapse" data-bs-target="#account-menu">
                  <i class="bx bxs-user-detail fs-xl me-2"></i>
                  Account menu
                  <i class="bx bx-chevron-down fs-lg ms-1"></i>
                </button>
                <div id="account-menu" class="list-group list-group-flush collapse d-md-block">
                  <a href="account-details.html" class="list-group-item list-group-item-action d-flex align-items-center active">
                    <i class="bx bx-cog fs-xl opacity-60 me-2"></i>
                    Account Details
                  </a>
                  <a  href="{{ route('signout') }}" class="list-group-item list-group-item-action d-flex align-items-center">
                    <i class="bx bx-log-out fs-xl opacity-60 me-2"></i>
                    Sign Out
                  </a>
                </div>
              </div>
            </div>
          </aside>


          <!-- Account details -->
          <div class="col-md-8 offset-lg-1 pb-5 mb-2 mb-lg-4 pt-md-5 mt-n3 mt-md-0">
            <div class="ps-md-3 ps-lg-0 mt-md-2 py-md-4">
              <h1 class="h2 pt-xl-1 pb-3">Account Details</h1>

              <!-- Basic info -->
              <h2 class="h5 text-primary mb-4">Basic info</h2>
              <form class="needs-validation  pb-3 pb-lg-4" action="{{ route('profile.update', ['profile' => Auth::user()->id]) }}" method="POST" novalidate>
                @csrf
                @method('PUT')
                <div class="row pb-2">
                  <div class="col-sm-6 mb-4">
                    <label for="fn" class="form-label fs-base">Full Name</label>
                    <input type="text" id="fn" name="name" class="form-control form-control-lg" value="{{ Auth::user()->name }}" required>
                    <div class="invalid-feedback">Please enter your first name!</div>
                  </div>
                  <div class="col-sm-6 mb-4">
                    <label for="sn" class="form-label fs-base">Username</label>
                    <input type="text" id="sn" name="username" class="form-control form-control-lg" value="{{ Auth::user()->username }}" required>
                    <div class="invalid-feedback">Please enter your second name!</div>
                  </div>
                  <div class="col-sm-6 mb-4">
                    <label for="phone" class="form-label fs-base">Phone Number</label>
                    <input type="text" id="phone" class="form-control form-control-lg" name="phone" value="{{ Auth::user()->phone }}">
                  </div>
                  <div class="col-sm-6 mb-4">
                    <label for="team_name" class="form-label fs-base">Team Name</label>
                    <input type="text" id="team_name" name="team_name" class="form-control form-control-lg" name="phone" value="{{ Auth::user()->team_name }}">
                  </div>
                  
                </div>
                <hr class="my-4">
              <h2 class="h5 text-primary pt-1 pt-lg-3 my-4">In-Game Details</h2>
              <div class="row pb-2">
                    <div class="col-sm-6 mb-4">
                        <label for="zip" class="form-label fs-base">In-Game ID:</label>
                        <input type="text" id="ingame_id" name="ingame_id" class="form-control form-control-lg" value="{{ Auth::user()->ingame_id }}" required>
                    </div>
                    <div class="col-sm-6 mb-4">
                        <label for="zip" class="form-label fs-base">In-Game Name:</label>
                        <input type="text" id="ingame_name" name="ingame_name" class="form-control form-control-lg" value="{{ Auth::user()->ingame_name }}" required>
                    </div>
                    <div class="col-sm-6 mb-4">
                        <label for="zip" class="form-label fs-base">In-Game Server ID:</label>
                        <input type="text" id="ingame_server" name="ingame_server" class="form-control form-control-lg" value="{{ Auth::user()->ingame_server }}" required>
                    </div>
                </div>
                <hr class="my-4">
                <div class="d-flex mb-3">
                    <button type="reset" class="btn btn-secondary me-3">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>

            <!-- Delete account -->
            {{-- <h2 class="h5 text-primary pt-1 pt-lg-3 mt-4">Delete account</h2>
            <p>When you delete your account, your public profile will be deactivated immediately. If you change your mind before the 14 days are up, sign in with your email and password, and we’ll send you a link to reactivate your account.</p>
            <div class="form-check mb-4">
                <input type="checkbox" id="delete-account" class="form-check-input">
                <label for="delete-account" class="form-check-label fs-base">Yes, I want to delete my account</label>
            </div>
            <button type="button" class="btn btn-danger disabled">Delete (Not Yet Avai)</button>
            </div> --}}
        </div>
        </div>
    </section>

@endsection