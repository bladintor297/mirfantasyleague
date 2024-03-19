@extends('layouts.main-layout')

@section('content')

<!-- Page content -->
<section class="position-relative h-100 pt-5 pb-4">

    <!-- Sign up form -->
    <div class="container d-flex flex-wrap justify-content-center justify-content-xl-start h-100 pt-5">
        <div class="w-100 align-self-end pt-1 pt-md-4 pb-4" style="max-width: 526px;">
            <h1 class="text-center text-xl-start text-gaming">Create Account</h1>
            <p class="text-center text-xl-start ">Already have an account? <a href="/login">Sign in here.</a></p>
            <!-- Forms validation: status tooltips -->
            <form id="registrationForm" class="needs-validation"action="{{ route('register.custom') }}" method="POST" enctype="multipart/form-data" novalidate>
            @csrf
                <div class="row">
                    <div class="col">
                        <div class=" mb-3">
                            <div class="d-flex justify-content-center">
                                <label for="imageUpload" class="form-label mt-4 text-center">Upload Image (1:1 aspect ratio):</label>
                            </div>
                            <div class="d-flex justify-content-center">
                                <img id="preview" src="https://static-00.iconduck.com/assets.00/avatar-default-icon-2048x2048-h6w375ur.png" alt="Default Image" class="rounded-circle" style="height:100px; width:100px; object-fit:cover">
                            </div>
                            <div class="d-flex justify-content-center">
                                <input type="file" id="imageUpload" name="team_logo" accept="image/*" onchange="previewImage(this)" class="form-control mt-2" required style="width: 200px;">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="fullname" class="form-label">Full Name</label>
                        <input class="form-control" type="text" id="fullname" name="fullname" placeholder="Full name" required>
                        <div class="valid-tooltip">Looks good!</div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input class="form-control" type="email" id="email" name="email" placeholder="Email" oninput="validateEmail()" required>
                        <div id="emailValidationMessage" class="fs-sm mt-2"></div>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input class="form-control" type="text" id="username" placeholder="Username" name="username" oninput="validateUsername()" required>
                        <div id="usernameValidationMessage" class="fs-sm mt-2"></div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="team_name" class="form-label">Team Name</label>
                        <input class="form-control" type="text" id="team_name" placeholder="Team Name" name="team_name" required>
                        <div class="valid-tooltip">Looks good!</div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input class="form-control" type="text" id="phone" placeholder="Phone Number" name="phone" required>
                        <div class="valid-tooltip">Looks good!</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="password" class="form-label">Password</label>
                        <div class="password-toggle">
                            <input type="password" id="password" name="password" class="form-control form-control-lg" required>
                            <label class="password-toggle-btn" aria-label="Show/hide password">
                                <input class="password-toggle-check" type="checkbox">
                                <span class="password-toggle-indicator"></span>
                            </label>
                            <div class="invalid-feedback position-absolute start-0 top-100">Please enter a password!</div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="password-confirm" class="form-label">Confirm password</label>
                        <div class="password-toggle">
                            <input type="password" id="password-confirm" class="form-control form-control-lg" required>
                            <label class="password-toggle-btn" aria-label="Show/hide password">
                                <input class="password-toggle-check" type="checkbox">
                                <span class="password-toggle-indicator"></span>
                            </label>
                            <div class="invalid-feedback position-absolute start-0 top-100">Please enter a password!</div>
                            <div id="password-match-error" class="text-danger position-absolute start-0 top-100"></div>
                        </div>
                    </div>
                </div>
                <hr class="my-4">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="ingame_id" class="form-label">In-Game ID</label>
                        <input class="form-control" type="text" id="ingame_id" placeholder="In-Game ID" name="ingame_id" required>
                        <div class="valid-tooltip">Looks good!</div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="ingame_name" class="form-label">In-Game Name</label>
                        <input class="form-control" type="text" id="ingame_name" placeholder="In-Game Name" name="ingame_name" required>
                        <div class="valid-tooltip">Looks good!</div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="ingame_server" class="form-label">In-Game Server</label>
                        <input class="form-control" type="text" id="ingame_server" placeholder="In-Game Server" name="ingame_server" required>
                        <div class="valid-tooltip">Looks good!</div>
                    </div>
                </div>
                <div class="mb-3 d-flex  justify-content-center">
                    {{-- <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="invalidCheck01" required>
                        <label class="form-check-label" for="invalidCheck01">Agree to terms and conditions</label>
                        <div class="invalid-tooltip">You must agree before submitting.</div>
                    </div> --}}
                </div>
                <div class="mb-3 d-flex  justify-content-center">
                    <button class="btn btn-primary btn-sm" type="submit">Register</button>
                </div>
            </form>
            <hr class="my-4">
        </div>
    </div>

    <!-- Background -->
    <div class="position-absolute top-0 end-0 w-50 h-100 bg-position-center bg-repeat-0 bg-size-cover d-none d-xl-block"
        style="background-image: url(https://c4.wallpaperflare.com/wallpaper/988/906/427/mobile-legends-pharsa-indigo-aviatrix-hd-wallpaper-preview.jpg);"></div>
</section>

    <script>
        function previewImage(input) {
            const preview = document.getElementById('preview');
            const file = input.files[0];

            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                };

                reader.readAsDataURL(file);
            }
        }

        function validateEmail() {
            const inputEmail = document.getElementById('email').value;
            const emailValidationMessage = document.getElementById('emailValidationMessage');

            // Regular expression for email format validation
            const emailFormat = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            // Assuming $users is a PHP variable passed to JavaScript
            const validEmails = @json($users->pluck('email')->toArray());

            if (!emailFormat.test(inputEmail)) {
                // Invalid email format
                emailValidationMessage.innerHTML = "<span class='text-danger'> <i class='bx bxs-x-circle'></i> Invalid email format! </span>";
            } else if (validEmails.includes(inputEmail)) {
                // Email is taken
                emailValidationMessage.innerHTML = "<span class='text-danger'> <i class='bx bxs-x-circle'></i> Email has been taken! </span>";
            } else {
                // Valid email
                emailValidationMessage.innerHTML = "<span class='text-success'><i class='bx bxs-check-circle'></i> Email is valid! </span>";
            }
        }

        function validateUsername() {
            const username = document.getElementById('username').value;
            const emailValidationMessage = document.getElementById('usernameValidationMessage');


            // Assuming $users is a PHP variable passed to JavaScript
            const validUsernames = @json($users->pluck('username')->toArray());

            if (validUsernames.includes(username)) {
                emailValidationMessage.innerHTML = "<span class='text-danger'><i class='bx bxs-x-circle'></i> Username has been taken! </span>";
            } else {
                emailValidationMessage.innerHTML = "<span class='text-success'><i class='bx bxs-check-circle'></i> Username is valid! </span>";
            }

        }

        function validatePasswords() {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('password-confirm').value;
            const errorElement = document.getElementById('password-match-error');
            const form = document.getElementById('registrationForm');

            if (password !== confirmPassword) {
                errorElement.textContent = "Passwords do not match. Please enter matching passwords.";
            } else {
                errorElement.textContent = ""; // Clear the error message if passwords match
                // Proceed to the next step or submit the form if this is the last step
                // Example: nextStep(currentStep);
                form.submit();
            }
        }


    </script>
@endsection