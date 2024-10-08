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
    <title> Admin Login </title>

    <!-- Mobile Specific -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <div class="row emial-setup">
                                        <div class="col-lg-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <div class="mailclinet" id="mailclinet">
                                                    <img id="selected_image" src="{{ asset('images/logo.png') }}">
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
                                        style=" margin: revert; -webkit-text-stroke-width: thin; ">Admin account</h4>
                                    <form class="form" id="log_in" method="POST" action="/admin/login">
                                        @csrf
                                        <div class="form-group">
                                            <label class="mb-1"><strong>Email</strong></label>
                                            <input type="email" class="form-control" name="email"
                                                placeholder="Email" required>
                                        </div>
                                        <div class="form-group position-relative">
                                            <label class="mb-1"><strong>Password</strong></label>
                                            <input type="password" class="form-control" id="password" name="password"
                                                placeholder="Password" required>
                                            <span class="show-pass eye" onclick="togglePasswordVisibility()">
                                                <i class="fa fa-eye-slash"></i>
                                                <i class="fa fa-eye"></i>
                                            </span>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">Sign Me In</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p>Go to the User Login <a class="text-primary" href='/view-user-login'>User
                                                Login</a></p>
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
    <script src="https://fito.dexignzone.com/laravel/demo/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"
        type="text/javascript"></script>
    <script src="https://fito.dexignzone.com/laravel/demo/vendor/deznav/deznav.min.js" type="text/javascript"></script>
    <script src="https://fito.dexignzone.com/laravel/demo/js/deznav-init.js" type="text/javascript"></script>


</body>

</html>
