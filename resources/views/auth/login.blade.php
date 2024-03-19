
@extends('layouts.main-layout')

@section('content')

<!-- Page content -->
<section class="position-relative h-100 pt-5 pb-4">

    <!-- Sign in form -->
    <div class="container d-flex flex-wrap justify-content-center justify-content-xl-start h-100 pt-5">
        <div class="w-100 align-self-end pt-1 pt-md-4 pb-4" style="max-width: 526px;">
            <h1 class="text-center text-xl-start pt-5 text-gaming">Welcome Back</h1>
            <p class="text-center text-xl-start pb-3 mb-3">Don’t have an account yet? <a
                    href="/register">Register here.</a></p>
            <form class="needs-validation mb-2" action="{{ route('login.custom') }}" method="POST" novalidate>
            @csrf
                <div class="position-relative mb-4">
                    <label for="email" class="form-label fs-base">Email</label>
                    <input type="email" name="email" id="email" class="form-control form-control-lg" required>
                    <div class="invalid-feedback position-absolute start-0 top-100">Please enter a valid email address!
                    </div>
                </div>
                <div class="mb-4">
                    <label for="password" class="form-label fs-base">Password</label>
                    <div class="password-toggle">
                        <input type="password" name="password" id="password" class="form-control form-control-lg" required>
                        <label class="password-toggle-btn" aria-label="Show/hide password">
                            <input class="password-toggle-check" type="checkbox">
                            <span class="password-toggle-indicator"></span>
                        </label>
                        <div class="invalid-feedback position-absolute start-0 top-100">Please enter your password!
                        </div>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="form-check">
                        <input type="checkbox" id="remember" class="form-check-input">
                        <label for="remember" class="form-check-label fs-base">Remember me</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary shadow-primary btn-lg w-100">Sign in</button>
            </form>
            <a href="{{ route('forget.password.get') }}" class="btn btn-link btn-lg w-100">Forgot your password?</a>
            <hr class="my-4">
        </div>
    </div>

    <!-- Background -->
    <div class="position-absolute top-0 end-0 w-50 h-100 bg-position-center bg-repeat-0 bg-size-cover d-none d-xl-block"
        style="background-image: url(https://www.pixel4k.com/wp-content/uploads/2020/02/mobile-legends_1581273537.jpg.webp); background-position:top"></div>
</section>

@endsection