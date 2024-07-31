<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from fito.dexignzone.com/laravel/demo/ecom-invoice by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 26 May 2024 06:40:00 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

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
    <meta property="og:description" content="Laravel | Invoice">
    <meta property="og:image" content="../social-image.png">
    <meta name="format-detection" content="telephone=no">

    <title> Invoice </title>
    <!-- Mobile Specific -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" href="{{asset('images/favicon.png')}}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">




    <link href="{{asset('vendor/bootstrap-select/dist/css/bootstrap-select.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css" />


</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>

        <!--**********************************
            Nav header start
        ***********************************-->
       
        <!--**********************************
    Chat box End
***********************************-->

         <div class="row">
                    <div class="col-lg-12">

                        <div class="card">
                            <div class="card-header"> Invoice <strong>{{ $order->created_at->format('F j, Y') }}</strong> <span class="float-end">
                                    <strong>Status:</strong> <span class="{{ $order->user->payment_status == 1 ? 'text-success' : 'text-warning' }}">
                                        {{ $order->user->payment_status == 1 ? 'Success' : 'Pending' }}
                                    </span>
                                </span> </div>
                            <div class="card-body">
                                <div class="row mb-5">
                                    <div class="mt-4 col-xl-3 col-lg-3 col-md-6 col-sm-12">
                                        <h6>From:</h6>
                                        <div> <strong>Jigar Publicity</strong> </div>
                                        <div>Madalinskiego 8</div>
                                        <div>71-101 Szczecin, Poland</div>
                                        <div>Email: <a href="https://fito.dexignzone.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="c6afa8a0a986b1a3a4bce8a5a9abe8b6aa">[email&#160;protected]</a></div>
                                        <div>Phone: +48 444 666 3333</div>
                                    </div>
                                    <div class="mt-4 col-xl-3 col-lg-3 col-md-6 col-sm-12">
                                        <h6>To:</h6>
                                        <div> <strong>{{$order->user->company_name}}</strong> </div>
                                        <div>{{$order->user->company_address}}</div>
                                        <div>{{$order->user->email}}</div>
                                        <div>Phone: {{$order->user->phone}}</div>
                                    </div>
                                    <div class="mt-4 col-xl-6 col-lg-6 col-md-12 col-sm-12 d-flex justify-content-lg-end justify-content-md-center justify-content-xs-start">
                                        <div class="row align-items-center">
                                            <div class="col-sm-9">
                                                <div class="brand-logo mb-3">
                                                    <img class="logo-abbr me-2" src="public/images/logo.png" alt="">
                                                    <img class="logo-compact" src="public/images/logo-text.png" alt="">
                                                </div>
                                                <span>Please send exact amount:{{$order->user->name}} <strong class="d-block">0.15050000 BTC</strong>
                                                    <strong>1Doia1wtcpPXz9FuUWVKpwn2WPgrzoi5ZK</strong></span><br>
                                                <small class="text-muted">Current exchange rate 1BTC = $6590 USD</small>
                                            </div>
                                            <div class="col-sm-3 mt-3"> <img src="public/images/qr.png" class="img-fluid width110" alt=""></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th class="center">Order Id</th>
                                                <th>No Of Device</th>
                                                <th class="right">Price Per Hour</th>
                                                <th>No of Hours</th>
                                                <th class="right">Subtotal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="center">{{$order->orderId}}</td>
                                                <td class="left strong">{{$order->no_of_device}}</td>
                                                <td class="left">&#8377; {{$order->price_per_hour}}</td>
                                                <td class="right">{{$order->number_of_hours}}</td>
                                                <td class="right"> &#8377; {{$order->subtotal}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-sm-5"> </div>
                                    <div class="col-lg-4 col-sm-5 ms-auto">
                                        <table class="table table-clear">
                                            <tbody>
                                                <tr>
                                                    <td class="left"><strong class="text-black">IGST</strong></td>
                                                    <td class="right"> &#8377; {{$order->igst}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="left"><strong class="text-black">Total</strong></td>
                                                    <td class="right"> &#8377; {{$order->amount}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
          
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="http://dexignzone.com/" target="_blank">DexignZone</a> 2023</p>
            </div>
        </div> <!--**********************************
            Footer end
        ***********************************-->

    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="{{asset('vendor/global/global.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('vendor/highlightjs/highlight.pack.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/custom.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/deznav-init.js')}}" type="text/javascript"></script>


</body>

<!-- Mirrored from fito.dexignzone.com/laravel/demo/ecom-invoice by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 26 May 2024 06:40:02 GMT -->

</html>