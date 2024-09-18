    @extends('admin.master')
    @section('title', 'Dashboard')
    @section('content')



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

        .form-text {
            display: none;
        }

        .form-text.visible {
            display: block;
        }
    </style>
    <div class="content-body ">
        <div class="container-fluid">
            <div class="page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Add User</a></li>
                </ol>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form class="needs-validation" action="{{ route('addUserByadmin') }}" method="POST" enctype="multipart/form-data" novalidate>
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
                                                <label class="col-lg-4 col-form-label" for="validationCustom01">Profile
                                                    Image
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-8">
                                                    <input type="file" class="form-control" id="validationCustom01" placeholder="Enter a username.." accept="image/*" name="image" onchange="previewImage(event)" required>
                                                    <div class="invalid-feedback">
                                                        Please select image.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom02">Email
                                                    (unique)<span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-8">
                                                    <input type="text" class="form-control" id="validationCustom02" name="email" placeholder="Your valid email.." required>
                                                    <div class="invalid-feedback">
                                                        Please enter a valid Email.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom03">Password
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-8 form-group position-relative">
                                                    <input type="password" class="form-control" id="validationCustom03" name="password" placeholder="Choose a safe one.." required>
                                                    <span class="show-pass eye" onclick="togglePasswordVisibility()">
                                                        <i class="fa fa-eye-slash"></i>
                                                        <i class="fa fa-eye"></i>
                                                    </span>
                                                    <div class="invalid-feedback">
                                                        Please enter a valid password.
                                                    </div>
                                                    <div id="passwordHelp" class="form-text">
                                                        Password must be at least 6 characters long.
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-xl-3" id="imagePreview">
                                            <img width="80" src="https://cdn.prod.website-files.com/62d84e447b4f9e7263d31e94/6557420216a456cfaef685c0_6399a4d27711a5ad2c9bf5cd_ben-sweet-2LowviVHZ-E-unsplash-1-p-1080.jpg" style="border-radius: 45px;width: -webkit-fill-available;" loading="lazy" alt="image">
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
                                                <label class="col-lg-4 col-form-label" for="validationCustom01">Name
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="validationCustom01" name="name" placeholder="Enter a name.." required>
                                                    <div class="invalid-feedback">
                                                        Please enter a name.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom03">Gender
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <select class="default-select wide form-control" id="validationCustom03" name="gender" required>
                                                        <option data-display="Select">Please select</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                        <option value="Other">Other</option>
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Please select a gender.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom08">Phone
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="validationCustom08" name="phone" placeholder="2129990000" required>
                                                    <div class="invalid-feedback">
                                                        Please enter a valid phone number.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom07">Website
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="validationCustom07" name="website" placeholder="http://example.com" required>
                                                    <div class="invalid-feedback">
                                                        Please enter a valid url.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom05">Account
                                                    Status
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <select class="default-select wide form-control" id="validationCustom05" name="account_status" required>
                                                        <option data-display="Select">Please select</option>
                                                        <option value="{{\App\Enums\AccountStatusEnum::APPROVED }}">APPROVED
                                                        </option>
                                                        <option value="{{ \App\Enums\AccountStatusEnum::PENDING }}">PENDING
                                                        </option>
                                                        <option value="{{ \App\Enums\AccountStatusEnum::BLOCKED }}">BLOCKED
                                                        </option>
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
                                                    <label class="col-lg-4 col-form-label" for="validationCustom01">Company
                                                        Name
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="validationCustom01" name="company_name" placeholder="Enter a Company Name.." required>
                                                        <div class="invalid-feedback">
                                                            Please enter a Company name.
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label" for="validationCustom01">Company
                                                        Address
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <textarea type="text" class="form-control" id="validationCustom01" name="company_address" placeholder="Enter a Company Address.." required></textarea>
                                                        <div class="invalid-feedback">
                                                            Please enter a Company address.
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label" for="validationCustom05">No of
                                                        Device
                                                        Allowed </label>
                                                    <div class="col-lg-6">
                                                        <select class="default-select wide form-control" id="validationCustom05" name="no_of_device" required>
                                                            <option data-display="Select">Please select</option>
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
                                                    <label class="col-lg-4 col-form-label" for="validationCustom05">No of
                                                        Hour</label>
                                                    <div class="col-lg-6">
                                                        <select class="default-select wide form-control" id="validationCustom05" name="no_of_hour" required>
                                                            <option data-display="Select">Please select</option>
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
                                                    <label class="col-lg-4 col-form-label" for="validationCustom05">Payment
                                                        Status </label>
                                                    <div class="col-lg-6">
                                                        <select class="default-select wide form-control" id="validationCustom05" name="payment_status" required>
                                                            <option data-display="Select">Please select</option>
                                                            <option value="{{ \App\Enums\PaymentStatus::PAID }}">Paid
                                                            </option>
                                                            <option value="{{ \App\Enums\PaymentStatus::PENDING }}">Pending
                                                            </option>
                                                        </select>
                                                        <div class="invalid-feedback">
                                                            Please select a one.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label"><a href="javascript:void(0);">Terms
                                                        Conditions</a> <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-8">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="validationCustom12" required>
                                                        <label class="form-check-label" for="validationCustom12">
                                                            Agree to terms and conditions
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-xl-12">
                                            <div class="col-lg-12 ms-auto">
                                                <button type="submit" style=" width: -webkit-fill-available; " class=" btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const passwordInput = document.getElementById('validationCustom03');
            const passwordHelp = document.getElementById('passwordHelp');

            passwordInput.addEventListener('focus', function() {
                passwordHelp.classList.add('visible');
            });

            passwordInput.addEventListener('blur', function() {
                passwordHelp.classList.remove('visible');
            });
        });

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


            Array.prototype.slice.call(forms)
                .forEach(function(form) {
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
        })();
    </script>
    @include('CustomSweetAlert');
    @endsection
