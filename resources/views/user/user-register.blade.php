<!DOCTYPE html>
<html lang="en" class="h-100">

<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="ZY4pR8wIEdrTLWxVivLo4lvqoE0UPbxm6RtBU20w">
    <meta name="author" content="DexignZone">
    <meta name="robots" content="">
    <meta name="keywords"
        content="Fitness solution, Healthier lifestyle, Fito, Personalized programs,  Exercise, Nutrition, Motivation, Fitness journey, DexignZone">
    <meta name="description" content="Some description for the page">

    <meta property="og:title" content="Fito - A Comprehensive Fitness Solution for a Healthier Lifestyle | DexignZone">
    <meta property="og:description" content="Laravel | Page Login">
    <meta property="og:image" content="../social-image.png">
    <meta name="format-detection" content="telephone=no">
    <title>Page Login </title>

    <!-- Mobile Specific -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet"
        type="text/css" />
    <style>
        .existing-image,
        #imagePreview img {
            max-width: 200px;
            /* Adjust this value as needed */
            max-height: 200px;
            /* Adjust this value as needed */
            width: auto;
            height: auto;
        }
    </style>

</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-12">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <div class="row emial-setup">
                                        <div class="col-lg-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <div class="mailclinet" id="mailclinet">
                                                    <img id="selected_image" src="{{ asset('images/logo.png') }}"
                                                        class="img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar bg-info progress-bar-striped" aria-valuenow="0"
                                            aria-valuemin="0" aria-valuemax="100" role="progressbar">
                                        </div>
                                    </div>

                                    <h4 class="text-center mb-4"
                                        style=" margin: revert; -webkit-text-stroke-width: thin; ">User account</h4>
                                    <form class="needs-validation" action="{{ route('registerUser') }}" method="POST"
                                        enctype="multipart/form-data" novalidate>
                                        @csrf

                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">User Account Details</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="form-validation">
                                                    <div class="row">
                                                        <div class="col-xl-9">
                                                            <div class="mb-3 row">
                                                                <label class="col-lg-4 col-form-label"
                                                                    for="validationCustom01">Profile
                                                                    Image
                                                                    <span class="text-danger">*</span>
                                                                </label>
                                                                <div class="col-lg-8">
                                                                    <input type="file" class="form-control"
                                                                        id="validationCustom01"
                                                                        placeholder="Enter a username.."
                                                                        accept="image/*" name="image"
                                                                        onchange="previewImage(event)" required>
                                                                    <div class="invalid-feedback">
                                                                        Please enter a username.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="mb-3 row">
                                                                <label class="col-lg-4 col-form-label"
                                                                    for="validationCustom02">Email
                                                                    (unique)<span class="text-danger">*</span>
                                                                </label>
                                                                <div class="col-lg-8">
                                                                    <input type="text" class="form-control"
                                                                        id="validationCustom02" name="email"
                                                                        placeholder="Your valid email.." required>
                                                                    <div class="invalid-feedback">
                                                                        Please enter a Email.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="mb-3 row">
                                                                <label class="col-lg-4 col-form-label"
                                                                    for="validationCustom03">Password
                                                                    <span class="text-danger">*</span>
                                                                </label>
                                                                <div class="form-group col-lg-8 position-relative">
                                                                    <input type="password" class="form-control"
                                                                        id="validationCustom03" name="password"
                                                                        placeholder="Choose a safe one.." required>
                                                                    <span class="show-pass eye"
                                                                        onclick="togglePasswordVisibility()">
                                                                        <i class="fa fa-eye-slash"></i>
                                                                        <i class="fa fa-eye"></i>
                                                                    </span>
                                                                    <div class="invalid-feedback">
                                                                        Please enter a valid password.
                                                                    </div>
                                                                    <div id="passwordHelp" class="form-text" style="display: none;">
                                                                        Password must be at least 6 characters long.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-3" id="imagePreview">
                                                            <img width="80"
                                                                src="https://cdn.prod.website-files.com/62d84e447b4f9e7263d31e94/6557420216a456cfaef685c0_6399a4d27711a5ad2c9bf5cd_ben-sweet-2LowviVHZ-E-unsplash-1-p-1080.jpg"
                                                                style="border-radius: 45px;width: -webkit-fill-available;"
                                                                loading="lazy" alt="image">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">User Info</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="form-validation">
                                                    <div class="row">
                                                        <div class="col-xl-6">
                                                            <div class="mb-3 row">
                                                                <label class="col-lg-4 col-form-label"
                                                                    for="validationCustom01">Name
                                                                    <span class="text-danger">*</span>
                                                                </label>
                                                                <div class="col-lg-6">
                                                                    <input type="text" class="form-control"
                                                                        id="validationCustom01" name="name"
                                                                        placeholder="Enter a name.." required>
                                                                    <div class="invalid-feedback">
                                                                        Please enter a name.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="mb-3 row">
                                                                <label class="col-lg-4 col-form-label"
                                                                    for="validationCustom03">Gender
                                                                    <span class="text-danger">*</span>
                                                                </label>
                                                                <div class="col-lg-6">
                                                                    <select class="default-select wide form-control"
                                                                        id="validationCustom05" name="gender"
                                                                        required>
                                                                        <option data-display="Select">Please select
                                                                        </option>
                                                                        <option value="Male">Male</option>
                                                                        <option value="Female">Female</option>
                                                                        <option value="Other">Other</option>
                                                                    </select>
                                                                    <div class="invalid-feedback">
                                                                        Please enter a password.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="mb-3 row">
                                                                <label class="col-lg-4 col-form-label"
                                                                    for="validationCustom08">Phone
                                                                    <span class="text-danger">*</span>
                                                                </label>
                                                                <div class="col-lg-6">
                                                                    <input type="text" class="form-control"
                                                                        id="validationCustom08" name="phone"
                                                                        placeholder="2129990000" required>
                                                                    <div class="invalid-feedback">
                                                                        Please enter a phone no.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="mb-3 row">
                                                                <label class="col-lg-4 col-form-label"
                                                                    for="validationCustom07">Website
                                                                    <span class="text-danger">*</span>
                                                                </label>
                                                                <div class="col-lg-6">
                                                                    <input type="text" class="form-control"
                                                                        id="validationCustom07" name="website"
                                                                        placeholder="http://example.com" required>
                                                                    <div class="invalid-feedback">
                                                                        Please enter a url.
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="mb-3 row">
                                                                <label class="col-lg-4 col-form-label"
                                                                    for="validationCustom05">No of Device Allowed

                                                                    <span class="text-danger">*</span>
                                                                </label>
                                                                <div class="col-lg-6">
                                                                    <select class="default-select wide form-control"
                                                                        id="no_of_device" name="no_of_device"
                                                                        required>
                                                                        <option data-display="Select">Please select
                                                                        </option>
                                                                        <option value="1">1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                        <option value="4">4</option>
                                                                        <option value="5">5</option>
                                                                        <option value="6">6</option>
                                                                        <option value="7">7</option>
                                                                        <option value="8">8</option>
                                                                        <option value="9">9</option>
                                                                        <option value="10">10</option>
                                                                    </select>
                                                                    <div class="invalid-feedback">
                                                                        Please select a one.
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="mb-3 row">

                                                                <label class="col-lg-4 col-form-label"
                                                                    for="validationCustom05">No of Hour

                                                                    <span class="text-danger">*</span>
                                                                </label>
                                                                <div class="col-lg-6">
                                                                    <select class="default-select wide form-control"
                                                                        id="number_of_hours" name="no_of_hour"
                                                                        required>
                                                                        <option data-display="Select">Please select
                                                                        </option>
                                                                        <option value="1">1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                        <option value="4">4</option>
                                                                        <option value="5">5</option>
                                                                        <option value="6">6</option>
                                                                        <option value="7">7</option>
                                                                        <option value="8">8</option>
                                                                        <option value="9">9</option>
                                                                        <option value="10">10</option>
                                                                    </select>
                                                                    <div class="invalid-feedback">
                                                                        Please select a one.
                                                                    </div>

                                                                </div>
                                                            </div>


                                                        </div>
                                                        <div class="col-xl-6">
                                                            <div class="mb-3 row">

                                                                <div class="mb-3 row">
                                                                    <label class="col-lg-4 col-form-label"
                                                                        for="validationCustom01">Company Name
                                                                        <span class="text-danger">*</span>
                                                                    </label>
                                                                    <div class="col-lg-6">
                                                                        <input type="text" class="form-control"
                                                                            id="validationCustom01"
                                                                            name="company_name"
                                                                            placeholder="Enter a Company Name.."
                                                                            required>
                                                                        <div class="invalid-feedback">
                                                                            Please enter a username.
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="mb-3 row">
                                                                    <label class="col-lg-4 col-form-label"
                                                                        for="validationCustom01">Company Address
                                                                        <span class="text-danger">*</span>
                                                                    </label>
                                                                    <div class="col-lg-6">
                                                                        <input type="text" class="form-control"
                                                                            id="validationCustom01"
                                                                            name="company_address"
                                                                            placeholder="Enter a Company Address.."
                                                                            required>
                                                                        <div class="invalid-feedback">
                                                                            Please enter a username.
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>



                                                            <div class="mb-3 row">
                                                                <h4
                                                                    class="d-flex justify-content-between align-items-center mb-3">
                                                                    <span class="text-black">Amount Detail</span>
                                                                    <span
                                                                        class="badge badge-primary badge-pill"></span>
                                                                </h4>
                                                                <ul class="list-group mb-3">
                                                                    <li
                                                                        class="list-group-item d-flex justify-content-between lh-condensed">
                                                                        <div>
                                                                            <h6 class="my-0"><span
                                                                                    id=""></span>PER HOUR
                                                                                PRICE <span
                                                                                    id="price_per_hour_span">0</span> X
                                                                                <span id="hours">0</span> Hours:
                                                                            </h6>
                                                                        </div>
                                                                        <span class="text-muted">&#8377; <span
                                                                                id="price">0</span></span>
                                                                    </li>
                                                                    <li
                                                                        class="list-group-item d-flex justify-content-between lh-condensed">
                                                                        <div>
                                                                            <h6 class="my-0">IGST:</h6>
                                                                        </div>
                                                                        <span class="text-muted">&#8377; <span
                                                                                id="igst">0</span></span>
                                                                    </li>
                                                                    <li
                                                                        class="list-group-item d-flex justify-content-between">
                                                                        <span>Total Amount</span>
                                                                        <strong>&#8377; <span
                                                                                id="total-amount">0</span></strong>
                                                                    </li>
                                                                </ul>
                                                            </div>

                                                            <div class="mb-3 row">
                                                                <label class="col-lg-4 col-form-label"><a
                                                                        href="javascript:void(0);">Terms
                                                                        &amp; Conditions</a> <span
                                                                        class="text-danger">*</span>
                                                                </label>
                                                                <div class="col-lg-8">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input"
                                                                            type="checkbox" value=""
                                                                            id="validationCustom12" required>
                                                                        <label class="form-check-label"
                                                                            for="validationCustom12">
                                                                            Agree to terms and conditions
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="col-xl-12">
                                                            <div class="col-lg-12 ms-auto">
                                                                <button type="submit"
                                                                    style=" width: -webkit-fill-available; "
                                                                    class=" btn btn-primary">Register</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p> Already have Account?
                                            <a class="text-primary" href="/view-user-login">
                                                Login
                                            </a>
                                        </p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--**********************************
    Scripts
***********************************-->
    <!-- Required vendors -->
    {{-- Custom sweetAlert --}}
    @include('CustomSweetAlert');
    <!-- <script src="{{ asset('vendor/global/global.min.js') }}" type="text/javascript"></script> -->
    <script src="{{ asset('vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/custom.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/deznav-init.js') }}" type="text/javascript"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        function previewImage(event) {
            const imagePreview = document.getElementById('imagePreview');
            const file = event.target.files[0];

            // Check if a file is selected
            if (file) {
                const reader = new FileReader();

                // FileReader onload event
                reader.onload = function() {
                    // Create an image element
                    const imgElement = document.createElement('img');
                    imgElement.src = reader.result;
                    imgElement.classList.add('max-w-full', 'h-auto');

                    // Clear previous image preview, if any
                    imagePreview.innerHTML = '';

                    // Append the image preview to the imagePreview div
                    imagePreview.appendChild(imgElement);

                    // Show the image preview div
                    imagePreview.classList.remove('hidden');
                }

                // Read the image file as a data URL
                reader.readAsDataURL(file);
            } else {
                // Hide the image preview if no file is selected
                imagePreview.innerHTML = '';
                imagePreview.classList.add('hidden');
            }
        }

        (function() {
            'use strict';
            window.addEventListener('load', function() {
                var forms = document.getElementsByClassName('needs-validation');
                Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();

        function togglePasswordVisibility() {
            var passwordField = document.getElementById("validationCustom03");
            var toggleIcon = document.getElementById("togglePassword");

            if (passwordField.type === "password") {
                passwordField.type = "text";
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            } else {
                passwordField.type = "password";
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            }
        }


        var forms = document.querySelectorAll('.needs-validation');

        function validatePassword(password) {
            return password.length >= 6;
        }

        function validatePhone(phone) {
            var phoneRegex = /^\d{10}$/;
            return phoneRegex.test(phone);
        }

        function validateWebsite(website) {
            var websiteRegex = /^(https?:\/\/)?([\da-z.-]+)\.([a-z.]{2,6})([/\w .-]*)*\/?$/;
            return websiteRegex.test(website);
        }

        function validateEmail(email) {
            var emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            return emailRegex.test(email);
        }

        function handlePasswordInput(event) {
            var passwordInput = event.target;
            var password = passwordInput.value;
            var passwordHelp = document.getElementById('passwordHelp');

            if (validatePassword(password)) {
                passwordHelp.style.display = 'none';
                passwordInput.classList.remove('is-invalid');
            } else {
                passwordHelp.style.display = 'block';
                passwordInput.classList.add('is-invalid');
            }
        }

        function handlePhoneInput(event) {
            var phoneInput = event.target;
            var phone = phoneInput.value;
            var phoneFeedback = phoneInput.nextElementSibling;

            if (validatePhone(phone)) {
                phoneFeedback.style.display = 'none';
                phoneInput.classList.remove('is-invalid');
            } else {
                phoneFeedback.style.display = 'block';
                phoneInput.classList.add('is-invalid');
            }
        }

        function handleWebsiteInput(event) {
            var websiteInput = event.target;
            var website = websiteInput.value;
            var websiteFeedback = websiteInput.nextElementSibling;

            if (validateWebsite(website)) {
                websiteFeedback.style.display = 'none';
                websiteInput.classList.remove('is-invalid');
            } else {
                websiteFeedback.style.display = 'block';
                websiteInput.classList.add('is-invalid');
            }
        }

        function handleEmailInput(event) {
            var emailInput = event.target;
            var email = emailInput.value;
            var emailFeedback = emailInput.nextElementSibling;

            if (validateEmail(email)) {
                emailFeedback.style.display = 'none';
                emailInput.classList.remove('is-invalid');
            } else {
                emailFeedback.style.display = 'block';
                emailInput.classList.add('is-invalid');
            }
        }

        forms.forEach(function(form) {
            form.addEventListener('submit', function(event) {
                var passwordInput = form.querySelector('#validationCustom03');
                var password = passwordInput.value;
                var phoneInput = form.querySelector('#validationCustom08');
                var phone = phoneInput.value;
                var websiteInput = form.querySelector('#validationCustom07');
                var website = websiteInput.value;
                var emailInput = form.querySelector('#validationCustom02');
                var email = emailInput.value;

                if (!validatePassword(password)) {
                    event.preventDefault();
                    event.stopPropagation();
                    passwordInput.classList.add('is-invalid');
                    document.getElementById('passwordHelp').style.display = 'block';
                } else {
                    passwordInput.classList.remove('is-invalid');
                }

                if (!validatePhone(phone)) {
                    event.preventDefault();
                    event.stopPropagation();
                    phoneInput.classList.add('is-invalid');
                    phoneInput.nextElementSibling.style.display = 'block';
                } else {
                    phoneInput.classList.remove('is-invalid');
                }

                if (!validateWebsite(website)) {
                    event.preventDefault();
                    event.stopPropagation();
                    websiteInput.classList.add('is-invalid');
                    websiteInput.nextElementSibling.style.display = 'block';
                } else {
                    websiteInput.classList.remove('is-invalid');
                }

                if (!validateEmail(email)) {
                    event.preventDefault();
                    event.stopPropagation();
                    emailInput.classList.add('is-invalid');
                    emailInput.nextElementSibling.style.display = 'block';
                } else {
                    emailInput.classList.remove('is-invalid');
                }

                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }

                form.classList.add('was-validated');
            }, false);

            var passwordInput = form.querySelector('#validationCustom03');
            if (passwordInput) {
                passwordInput.addEventListener('input', handlePasswordInput);
            }

            var phoneInput = form.querySelector('#validationCustom08');
            if (phoneInput) {
                phoneInput.addEventListener('input', handlePhoneInput);
            }

            var websiteInput = form.querySelector('#validationCustom07');
            if (websiteInput) {
                websiteInput.addEventListener('input', handleWebsiteInput);
            }

            var emailInput = form.querySelector('#validationCustom02');
            if (emailInput) {
                emailInput.addEventListener('input', handleEmailInput);
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            // Function to update values
            function updateValues() {
                const devices = parseInt($('#no_of_device').val()) || 0;
                const hours = parseInt($('#number_of_hours').val()) || 0;

                $('#devices').text(devices);
                $('#hours').text(hours);

                if (devices > 0 && hours > 0) {
                    $.ajax({
                        url: '{{ route('calculateAmount') }}',
                        type: 'GET',
                        data: {
                            numberOfDevices: devices,
                            numberOfHours: hours
                        },
                        success: function(data) {
                            console.log('Response:', data); // Log the response for debugging
                            if (data.error) {
                                console.error(data.error);
                                $('#price').text('Error');
                                $('#igst').text('Error');
                                $('#total-amount').text('Error');
                                $('#total-amount-input').val('Error');
                                $('#igst-input').val('Error');
                                $('#price_per_hour').val('Error');
                                $('#subtotal').val('Error');
                                $('#price_per_hour_span').text('Error');
                            } else if (typeof data.amount !== 'undefined' && typeof data.igst !==
                                'undefined' && typeof data.price !== 'undefined') {
                                const price = parseFloat(data.amount).toFixed(2);
                                const igst = parseFloat(data.igst).toFixed(2);
                                const pricePerHour = parseFloat(data.price).toFixed(2);
                                const total = (parseFloat(price) + parseFloat(igst)).toFixed(2);

                                $('#price').text(price); // Display price
                                $('#igst').text(igst); // Display IGST
                                $('#total-amount').text(total); // Display total amount
                                $('#total-amount-input').val(total);
                                $('#igst-input').val(igst);
                                $('#price_per_hour').val(pricePerHour);
                                $('#subtotal').val(price);
                                $('#price_per_hour_span').text(pricePerHour);
                            } else {
                                console.error('Amount or IGST is undefined in response');
                                $('#price').text('Error');
                                $('#igst').text('Error');
                                $('#total-amount').text('Error');
                                $('#total-amount-input').val('Error');
                                $('#igst-input').val('Error');
                                $('#price_per_hour').val('Error');
                                $('#subtotal').val('Error');
                                $('#price_per_hour_span').text('Error')
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('Error fetching price:', error);
                            $('#price').text('Error');
                            $('#igst').text('Error');
                            $('#total-amount').text('Error');
                            $('#total-amount-input').val('Error');
                            $('#igst-input').val('Error');
                            $('#price_per_hour').val('Error');
                            $('#subtotal').val('Error');
                            $('#price_per_hour_span').text('Error');
                        }
                    });
                } else {
                    $('#price').text('0');
                    $('#igst').text('0');
                    $('#total-amount').text('0');
                    $('#total-amount-input').val('0');
                    $('#igst-input').val('0');
                    $('#price_per_hour').val('0');
                    $('#subtotal').val('0');
                    $('#price_per_hour_span').text('0');
                }
            }

            // Attach event handler to input change
            $('#number_of_hours, #no_of_device').change(updateValues);

            // Call updateValues on page load
            updateValues();

            // Checkout button click handler
            $('#checkout-button').click(function() {
                // Retrieve form data
                var amount = $('#total-amount-input').val();
                var userId = $('#userId').val();
                var mobile = $('#mobile').val();
                var email = $('#email').val();
                var no_of_device = $('#no_of_device').val();
                var number_of_hours = $('#number_of_hours').val();
                var name = $('#name').val();
                var subtotal = $('#subtotal').val();
                var igst = $('#igst-input').val();
                var price_per_hour = $('#price_per_hour').val();

            });
        });
    </script>
    <script src="https://fito.dexignzone.com/laravel/demo/vendor/global/global.min.js" type="text/javascript"></script>
    <script src="https://fito.dexignzone.com/laravel/demo/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"
        type="text/javascript"></script>
    <script src="https://fito.dexignzone.com/laravel/demo/vendor/deznav/deznav.min.js" type="text/javascript"></script>
    <script src="https://fito.dexignzone.com/laravel/demo/js/custom.min.js" type="text/javascript"></script>
    <script src="https://fito.dexignzone.com/laravel/demo/js/deznav-init.js" type="text/javascript"></script>
</body>

</html>
