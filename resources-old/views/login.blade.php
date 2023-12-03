@extends('layouts.main-layout')

@section('content')
    <main class="page-wrapper" style="height:100vh">

        <!-- Page content -->
        <section class="position-relative h-100 pt-5 pb-4">

            <!-- Sign in form -->
            <div class="container d-flex justify-content-center justify-content-xl-center h-100 pt-5">

                    <div class="row">
                        <div class="col-12 my-auto border-1 border rounded shadow px-5 py-2">
                            <div class="w-100 align-self-end pt-1 pt-md-4 pb-4">
                                <h1 class="text-center text-xl-start">Welcome Back</h1>
                                <p class="text-center text-xl-start pb-3 mb-3">First time? <a href="{{ route('register') }}"
                                        class="text-warning">Register here.</a></p>
                                <form class="needs-validation mb-2" action="{{ route('login.custom') }}" method="POST" novalidate>
                                    @csrf
                                    <div class="position-relative mb-4">
                                        <label for="email" class="form-label fs-base">Email</label>
                                        <input type="email" id="email" name="email" class="form-control form-control-lg"
                                            required>
                                        <div class="invalid-feedback position-absolute start-0 top-100">Please enter a valid email
                                            address!</div>
                                    </div>
                                    <div class="mb-4">
                                        <label for="password" class="form-label fs-base">Password</label>
                                        <div class="password-toggle">
                                            <input type="password" id="password" name="password" class="form-control form-control-lg"
                                                required>
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
                                    <button type="submit" class="btn btn-warning shadow-warning btn-lg w-100">Sign in</button>
                                </form>
                            </div>
                        </div>
                    </div>

            </div>

            <!-- Background -->
        </section>
    </main>
@endsection
