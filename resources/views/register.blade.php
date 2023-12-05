@extends('layouts.main-layout')

@section('content')
    <main class="page-wrapper" style="height: 100vh">

        <!-- Page content -->
        <section class="position-relative h-100 pt-5 pb-4">

            <!-- Registration form -->
            <div class="container d-flex justify-content-center justify-content-xl-center h-100 pt-5">
                <div class="row">
                    <div class="col my-auto border-1 border rounded shadow px-5 py-2">
                        <div class="w-100 align-self-end pt-1 pt-md-4 pb-4">
                            <h1 class="text-center text-xl-center">Registration Form</h1>
                            <form id="registrationForm" class="needs-validation mb-2" action="{{ route('register.custom') }}" method="POST"
                                enctype="multipart/form-data" novalidate>
                                @csrf
                                <!-- Step 1: Email -->
                                <div class="step" data-step="1">
                                    <div class="fixed-width">
                                        <div class="mb-2">
                                            <label for="email" class="form-label fs-base">Email</label>
                                            <input type="email" id="inputEmail" name="email" class="form-control form-control-lg" oninput="validateEmail()" required>
                                            <div id="emailValidationMessage" class="fs-base mt-2"></div>
                                            
                                        </div>
                                        <div class="mb-4">
                                            <label for="username" class="form-label fs-base">Username</label>
                                            <input type="username" name="username" id="inputUsername" class="form-control form-control-lg" oninput="validateUsername()" required>
                                            <div id="usernameValidationMessage" class="fs-base mt-2"></div>
                                        </div>
                                        <button type="button" id="step1next-btn"
                                            class="btn btn-warning shadow-warning btn-lg next-step disabled">Next</button>
                                    </div>
                                </div>

                                <!-- Step 2: Full Name -->
                                <div class="step" data-step="2">
                                    <div class="fixed-width">
                                        <div class="mb-4">
                                            <label for="fullName" class="form-label fs-base">Full Name</label>
                                            <input type="text" id="fullName" name="fullname"
                                                class="form-control form-control-lg" required>
                                            <div class="invalid-feedback position-absolute start-0 top-100">Please enter
                                                your full name!</div>
                                        </div>
                                        <button type="button"
                                            class="btn btn-warning shadow-warning btn-lg prev-step">Previous</button>
                                        <button type="button"
                                            class="btn btn-warning shadow-warning btn-lg next-step">Next</button>
                                    </div>
                                </div>

                                <!-- Step 3: Phone Number -->
                                <div class="step" data-step="3">
                                    <div class="fixed-width">
                                        <div class=" mb-4">
                                            <label for="phoneNumber" class="form-label fs-base">Phone Number</label>
                                            <input type="tel" id="phoneNumber" name="phone"
                                                class="form-control form-control-lg" required>
                                            <div class="invalid-feedback position-absolute start-0 top-100">Please enter
                                                your phone number!</div>
                                        </div>
                                        <button type="button"
                                            class="btn btn-warning shadow-warning btn-lg prev-step">Previous</button>
                                        <button type="button"
                                            class="btn btn-warning shadow-warning btn-lg next-step">Next</button>
                                    </div>
                                </div>

                                <!-- Step 4: Team Name -->
                                <div class="step" data-step="4">
                                    <div class="fixed-width">
                                        <div class="mb-4">
                                            <label for="teamName" class="form-label fs-base">Team Name</label>
                                            <input type="text" id="teamName" name="team_name"
                                                class="form-control form-control-lg" required>
                                            <div class="invalid-feedback position-absolute start-0 top-100">Please enter
                                                your team name!</div>

                                            <label for="imageUpload" class="form-label fs-base mt-4">Upload Image (1:1 aspect ratio):</label>
                                            <div class="d-flex justify-content-center">
                                                <img id="preview" src="https://cdn-icons-png.flaticon.com/512/4243/4243299.png" alt="Default Image" class="rounded-circle" style="height:300px; width:300px; object-fit:cover">
                                            </div>
                                            <input type="file" id="imageUpload" name="team_logo" accept="image/*" onchange="previewImage(this)" class="form-control mt-2" required>
                                            <br>
                                        </div>
                                        <button type="button"
                                            class="btn btn-warning shadow-warning btn-lg prev-step">Previous</button>
                                        <button type="button"
                                            class="btn btn-warning shadow-warning btn-lg next-step">Next</button>
                                    </div>
                                </div>

                                <!-- Step 5: Team Name -->
                                <div class="step" data-step="5">
                                    <div class="fixed-width">
                                            <div class="mb-2">
                                                <label for="password" class="form-label fs-base">Password</label>
                                                <div class="password-toggle">
                                                    <input type="password" id="password" name="password" class="form-control form-control-lg" required>
                                                    <label class="password-toggle-btn" aria-label="Show/hide password">
                                                        <input class="password-toggle-check" type="checkbox">
                                                        <span class="password-toggle-indicator"></span>
                                                    </label>
                                                    <div class="invalid-feedback position-absolute start-0 top-100">Please enter a password!</div>
                                                </div>
                                            </div>
                                            <div class="mb-4">
                                                <label for="password-confirm" class="form-label fs-base">Confirm password</label>
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
                                        <button type="button" class="btn btn-warning shadow-warning btn-lg prev-step">Previous</button>
                                        <button type="button" class="btn btn-warning shadow-warning btn-lg" onclick="validatePasswords()">Register</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Background -->
        </section>
    </main>

    <script>
        // Additional function for email validation
        function validateEmail() {
            const inputEmail = document.getElementById('inputEmail').value;
            const emailValidationMessage = document.getElementById('emailValidationMessage');
            const nextButton = document.getElementById('step1next-btn');

            // Assuming $users is a PHP variable passed to JavaScript
            const validEmails = @json($users->pluck('email')->toArray());

            if (validEmails.includes(inputEmail)) {
                emailValidationMessage.innerHTML = "<span class='text-danger'> <i class='bx bxs-x-circle'></i> Email has been taken or invalid! </span>";
                nextButton.classList.add('disabled');  // Disable the button

            } else {
                emailValidationMessage.innerHTML = "<span class='text-success'><i class='bx bxs-check-circle'></i> Email is valid! </span>";
                nextButton.classList.remove('disabled'); // Enable the button
            }

            if (inputEmail.length === 0) {
                emailValidationMessage.innerHTML = "<span class='text-danger'> <i class='bx bxs-x-circle'></i> Email cannot be empty </span>";
                nextButton.classList.add('disabled');  // Disable the button
            }
        }

        function validateUsername() {
            const username = document.getElementById('inputUsername').value;
            const emailValidationMessage = document.getElementById('usernameValidationMessage');
            const nextButton = document.getElementById('step1next-btn');


            // Assuming $users is a PHP variable passed to JavaScript
            const validUsernames = @json($users->pluck('username')->toArray());

            if (validUsernames.includes(username)) {
                emailValidationMessage.innerHTML = "<span class='text-danger'><i class='bx bxs-x-circle'></i> Username has been taken! </span>";
                nextButton.classList.add('disabled');  // Disable the button
            } else {
                emailValidationMessage.innerHTML = "<span class='text-success'><i class='bx bxs-check-circle'></i> Username is valid! </span>";
                nextButton.classList.remove('disabled'); // Enable the button
            }

            if (username.length === 0) {
                emailValidationMessage.innerHTML = "<span class='text-danger'> <i class='bx bxs-x-circle'></i> Username cannot be empty </span>";
                nextButton.classList.add('disabled');  // Disable the button
            }
        }

         // Additional function for password matching validation
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

        function validateForm() {
            const input = document.getElementById('imageUpload');
            const preview = document.getElementById('preview');

            if (input.files.length === 0) {
                alert('Please select an image.');
                return false;
            }

            const img = new Image();
            img.src = window.URL.createObjectURL(input.files[0]);

            img.onload = function() {
                const width = img.width;
                const height = img.height;

                if (width !== height) {
                    alert('Image aspect ratio must be 1:1. Please select a different image.');
                    input.value = ''; // Clear the input field
                    preview.src = ''; // Clear the preview
                }
            };

            return true;
        }
        
        // Multi-step form functionality
        document.addEventListener("DOMContentLoaded", function() {
            const form = document.getElementById("registrationForm");
            const steps = form.querySelectorAll(".step");

            const showStep = (stepNumber) => {
                steps.forEach((step) => {
                    step.style.display = "none";
                });
                steps[stepNumber - 1].style.display = "block";
            };

            const validateStep = (stepNumber) => {
                const currentStep = steps[stepNumber - 1];
                const inputs = currentStep.querySelectorAll("input[required], select[required]");

                let isValid = true;

                inputs.forEach((input) => {
                    if (!input.checkValidity()) {
                        isValid = false;
                    }
                });

                return isValid;
            };

            const nextStep = (currentStep) => {
                if (validateStep(currentStep)) {
                    showStep(currentStep + 1);
                }
            };

            const prevStep = (currentStep) => {
                showStep(currentStep - 1);
            };

            const addStepButtonsListener = () => {
                const nextButtons = form.querySelectorAll(".next-step");
                const prevButtons = form.querySelectorAll(".prev-step");

                nextButtons.forEach((button) => {
                    button.addEventListener("click", () => {
                        const currentStep = parseInt(button.closest(".step").getAttribute(
                            "data-step"));
                        nextStep(currentStep);
                    });
                });

                prevButtons.forEach((button) => {
                    button.addEventListener("click", () => {
                        const currentStep = parseInt(button.closest(".step").getAttribute(
                            "data-step"));
                        prevStep(currentStep);
                    });
                });
            };

            showStep(1);
            addStepButtonsListener();
        });
    </script>
@endsection
