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
    <meta name="keywords" content="Fitness solution, Healthier lifestyle, Fito, Personalized programs,  Exercise, Nutrition, Motivation, Fitness journey, DexignZone">
    <meta name="description" content="Some description for the page">

    <meta property="og:title" content="Fito - A Comprehensive Fitness Solution for a Healthier Lifestyle | DexignZone">
    <meta property="og:description" content="Laravel | Page Login">
    <meta property="og:image" content="../social-image.png">
    <meta name="format-detection" content="telephone=no">
    <title>Laravel | Page Login </title>

    <!-- Mobile Specific -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" href="{{asset('images/favicon.png')}}">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet" type="text/css" />
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
                                                    <img id="selected_image" src="{{asset('images/logo.png')}}" class="img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar bg-info progress-bar-striped" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" role="progressbar">
                                        </div>
                                    </div>

                                    <h4 class="text-center mb-4" style=" margin: revert; -webkit-text-stroke-width: thin; ">User account</h4>
                                    <form class="needs-validation" action="{{route('registerUser')}}" method="POST" enctype="multipart/form-data" novalidate>
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
                                                                    <input type="file" class="form-control" id="validationCustom01" placeholder="Enter a username.." accept="image/*" name="image" onchange="previewImage(event)">
                                                                    <div class="invalid-feedback">
                                                                        Please enter a username.
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
                                                                        Please enter a Email.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="mb-3 row">
                                                                <label class="col-lg-4 col-form-label" for="validationCustom03">Password
                                                                    <span class="text-danger">*</span>
                                                                </label>
                                                                <div class="col-lg-8">
                                                                    <input type="password" class="form-control" id="validationCustom03" name="password" placeholder="Choose a safe one.." required>
                                                                    <div class="invalid-feedback">
                                                                        Please enter a password.
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
                                                                    <select class="default-select wide form-control" id="validationCustom05" name="gender">
                                                                        <option data-display="Select">Please select</option>
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
                                                                <label class="col-lg-4 col-form-label" for="validationCustom08">Phone
                                                                    <span class="text-danger">*</span>
                                                                </label>
                                                                <div class="col-lg-6">
                                                                    <input type="text" class="form-control" id="validationCustom08" name="phone" placeholder="212-999-0000" required>
                                                                    <div class="invalid-feedback">
                                                                        Please enter a phone no.
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
                                                                        Please enter a url.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6">
                                                            <div class="mb-3 row">

                                                                <div class="mb-3 row">
                                                                    <label class="col-lg-4 col-form-label" for="validationCustom01">Company Name
                                                                        <span class="text-danger">*</span>
                                                                    </label>
                                                                    <div class="col-lg-6">
                                                                        <input type="text" class="form-control" id="validationCustom01" name="company_name" placeholder="Enter a Company Name.." required>
                                                                        <div class="invalid-feedback">
                                                                            Please enter a username.
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="mb-3 row">
                                                                    <label class="col-lg-4 col-form-label" for="validationCustom01">Company Address
                                                                        <span class="text-danger">*</span>
                                                                    </label>
                                                                    <div class="col-lg-6">
                                                                        <input type="text" class="form-control" id="validationCustom01" name="company_address" placeholder="Enter a Company Address.." required>
                                                                        <div class="invalid-feedback">
                                                                            Please enter a username.
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <label class="col-lg-4 col-form-label" for="validationCustom05">No of Device Allowed </label>
                                                                <div class="col-lg-6">
                                                                    <select class="default-select wide form-control" id="validationCustom05" name="no_of_device">
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
                                                                <label class="col-lg-4 col-form-label"><a href="javascript:void(0);">Terms
                                                                        &amp; Conditions</a> <span class="text-danger">*</span>
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
                                                                <button type="submit" style=" width: -webkit-fill-available; " class=" btn btn-primary">Register</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <a class="text-primary" href="/admin/login">
                                            <p>Admin Login
                                            </p>
                                        </a>

                                        <a class="text-primary" href="/view-user-register">
                                            <p>Register
                                            </p>
                                        </a>
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
    <!-- <script src="{{asset('vendor/global/global.min.js')}}" type="text/javascript"></script> -->
    <script src="{{asset('vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/custom.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/deznav-init.js')}}" type="text/javascript"></script>

    
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
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()
</script>

    <script>
        function togglePasswordVisibility() {
            var passwordField = document.getElementById("password");
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
    </script>

    <script src="https://fito.dexignzone.com/laravel/demo/vendor/global/global.min.js" type="text/javascript"></script>
    <script src="https://fito.dexignzone.com/laravel/demo/vendor/bootstrap-select/dist/js/bootstrap-select.min.js" type="text/javascript"></script>
    <script src="https://fito.dexignzone.com/laravel/demo/vendor/deznav/deznav.min.js" type="text/javascript"></script>
    <script src="https://fito.dexignzone.com/laravel/demo/js/custom.min.js" type="text/javascript"></script>
    <script src="https://fito.dexignzone.com/laravel/demo/js/deznav-init.js" type="text/javascript"></script>
</body>

</html>