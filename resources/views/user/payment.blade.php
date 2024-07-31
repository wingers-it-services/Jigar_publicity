<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from fito.dexignzone.com/laravel/demo/ecom-checkout by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 26 May 2024 06:40:00 GMT -->
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
    <meta property="og:description" content="Laravel | Checkout">
    <meta property="og:image" content="../social-image.png">
    <meta name="format-detection" content="telephone=no">

    <title> Checkout </title>
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
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->

    <div class="card">
    <div class="card">
    <div class="card">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4 order-lg-2 mb-4">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-black">Amount Detail</span>
                            <span class="badge badge-primary badge-pill"></span>
                        </h4>
                        <ul class="list-group mb-3">
                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <div>
                                    <h6 class="my-0"><span id=""></span>PER HOUR PRICE <span id="price_per_hour_span">0</span> X <span id="hours">0</span> Hours:</h6>
                                </div>
                                <span class="text-muted">&#8377; <span id="price">0</span></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <div>
                                    <h6 class="my-0">IGST:</h6>
                                </div>
                                <span class="text-muted">&#8377; <span id="igst">0</span></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Total Amount</span>
                                <strong>&#8377; <span id="total-amount">0</span></strong>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-8 order-lg-1">
                        <h4 class="mb-3">Billing address</h4>
                        <form class="needs-validation" novalidate="">
                            @csrf
                            <input type="hidden" name="userId" id="userId" value="7">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="firstName">Name</label>
                                    <input type="text" class="form-control" id="name" placeholder="" name="name" value="{{$user->name}}" required="">
                                    <div class="invalid-feedback">
                                        Valid name is required.
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="lastName">Email</label>
                                    <input type="text" class="form-control" id="email" placeholder="" name="email" value="{{$user->email}}" required="">
                                    <div class="invalid-feedback">
                                        Valid email is required.
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="firstName">Mobile no</label>
                                    <input type="text" class="form-control" id="mobile" placeholder="" name="mobile" value="{{$user->phone}}" required="">
                                    <div class="invalid-feedback">
                                        Valid mobile is required.
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-6 mb-3">
                                    <label for="lastName">No of Device</label>
                                    <select class="default-select wide form-control" id="no_of_device" name="no_of_device" required="">
                                        <option data-display="Select">Please select</option>
                                        @for ($i = 1; $i <= 10; $i++) <option value="{{ $i }}" @if($i==$user->no_of_device) selected @endif>{{ $i }}</option>
                                            @endfor
                                    </select>
                                    <div class="invalid-feedback">
                                        Please select no of device.
                                    </div>
                                </div>

                                <input type="hidden" name="igst" id="igst-input" value="">
                                <input type="hidden" name="price_per_hour" id="price_per_hour" value="">
                                <input type="hidden" name="subtotal" id="subtotal" value="">

                                <input type="hidden" name="amount" id="total-amount-input" value="">

                                <div class="col-md-6 mb-3">
                                    <label for="lastName">No of Hours</label>
                                    <select class="default-select wide form-control" id="number_of_hours" name="number_of_hours" required="">
                                        <option data-display="Select">Please select</option>
                                        @for ($i = 1; $i <= 10; $i++) <option value="{{ $i }}" @if($i==$user->no_of_hour) selected @endif>{{ $i }}</option>
                                            @endfor
                                    </select>
                                    <div class="invalid-feedback">
                                        Please select no of device.
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-primary btn-lg btn-block" id="checkout-button" type="button">Continue to Pay</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>

    <div class="footer">
        <div class="copyright">
            <p>Copyright © Designed &amp; Developed by <a href="https://wingersitservices.co.in/" target="_blank">WingersItServices</a> 2024</p>
        </div>
    </div>
    <!-- Required vendors -->
    <script src="{{asset('vendor/global/global.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('vendor/highlightjs/highlight.pack.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/custom.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/deznav-init.js')}}" type="text/javascript"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
                        url: '{{ route("calculateAmount") }}',
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
                            } else if (typeof data.amount !== 'undefined' && typeof data.igst !== 'undefined' && typeof data.price !== 'undefined') {
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

                $.ajax({
                    url: '{{ route('checkout') }}', // Use your actual route name
                    type: 'GET',
                    data: {
                        _token: $('input[name=_token]').val(),
                        amount: amount,
                        userId: userId,
                        subtotal: subtotal,
                        igst: igst,
                        price_per_hour: price_per_hour,
                        mobile: mobile,
                        no_of_device: no_of_device,
                        number_of_hours: number_of_hours,
                        email: email,
                        name: name
                    },
                    success: function(response) {
                        console.log('Response:', response);
                        window.location.replace(response); // Redirect to payment URL
                    },
                    error: function(xhr) {
                        console.error('Error:', xhr.responseText);
                        alert('An error occurred while processing your request.');
                    }
                });
            });
        });
    </script>



</body>

</html>