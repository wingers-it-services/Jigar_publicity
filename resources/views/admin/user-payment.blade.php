@extends('admin.master')
@section('title', 'Dashboard')
@section('content')
<!--**********************************
                            Content body start
                        ***********************************-->

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Make Payment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form class="needs-validation" action="{{ route('payment.store') }}" method="POST" novalidate="">
                @csrf

                <div class="modal-body">
                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <input type="hidden" name="userId" id="userId">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="firstName">Name</label>
                                    <input type="text" class="form-control" id="name" placeholder="" name="name" required="">
                                    <div class="invalid-feedback">
                                        Valid name is required.
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="lastName">Email</label>
                                    <input type="text" class="form-control" id="email" placeholder="" name="email" ail required="">
                                    <div class="invalid-feedback">
                                        Valid email is required.
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="firstName">Mobile no</label>
                                    <input type="text" class="form-control" id="mobile" placeholder="" name="mobile" required="">
                                    <div class="invalid-feedback">
                                        Valid mobile is required.
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-6 mb-3">
                                    <label for="lastName">No of Device</label>



                                    <input type="number" class="form-control" id="no_of_device" placeholder="" name="no_of_device" required="">
                                    <div class="invalid-feedback">
                                        Valid no_of_device is required.
                                    </div>
                                </div>

                                <input type="hidden" name="igst" id="igst-input" value="">
                                <input type="hidden" name="price_per_hour" id="price_per_hour" value="">
                                <input type="hidden" name="subtotal" id="subtotal" value="">

                                <input type="hidden" name="amount" id="total-amount-input" value="">
                                <input type="hidden" name="providerReferenceId" value="Admin">
                                <div class="col-md-6 mb-3">
                                    <label for="lastName">No of Hours</label>
                                    <input type="number" class="form-control" id="number_of_hours" placeholder="" name="number_of_hours" required="">
                                    <div class="invalid-feedback">
                                        Valid number_of_hours is required.
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-primary btn-lg btn-block" id="checkout-button" type="submit">Continue to Pay</button>
                        </div>

                        <div class="col-md-6 mb-3">
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
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="content-body ">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Payment</a></li>
            </ol>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display min-w850">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>User Name</th>
                                        <th>User Email</th>
                                        <th>User Phone</th>
                                        <th>Payment Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="orders">
                                    @foreach ($userPayments as $payment)
                                    <tr>
                                        <td>{{ $payment->created_at->format('d/m/Y') }}</td>
                                        <td>{{ $payment->name }}</td>
                                        <td>{{ $payment->email }}</td>
                                        <td>{{ $payment->phone }}</td>
                                        <td>
                                            <span class="badge badge-{{ $payment->payment_status == \App\Enums\PaymentStatus::PAID ? 'success' : 'warning' }} badge-sm light">
                                                {{ $payment->payment_status == \App\Enums\PaymentStatus::PAID ? 'Paid' : ($payment->payment_status == \App\Enums\PaymentStatus::PENDING ? 'Pending' : 'Unknown') }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="d-flex">

                                                <button class="btn btn-primary shadow btn-xs sharp me-1 edit-payment-button" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg" data-payment-id="{{ $payment->id }}">
                                                    <i class="fa fa-pencil"></i>
                                                </button>

                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
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

        // Populate modal fields and update values when the edit button is clicked
        document.querySelectorAll('.edit-payment-button').forEach(button => {
            button.addEventListener('click', function() {
                const paymentId = this.getAttribute('data-payment-id');
                fetch(`/admin/payment-details/${paymentId}`)
                    .then(response => response.json())
                    .then(data => {
                        // Populate the modal fields with fetched data
                        document.getElementById('userId').value = data.id;
                        document.getElementById('name').value = data.name;
                        document.getElementById('email').value = data.email;
                        document.getElementById('mobile').value = data.phone;
                        document.getElementById('no_of_device').value = data.no_of_device;
                        document.getElementById('number_of_hours').value = data.no_of_hour;

                        // Trigger value update calculations
                        updateValues();
                    });
            });
        });

        // Attach event handler to input change
        $('#number_of_hours, #no_of_device').change(updateValues);

        // Call updateValues on page load to initialize values
        updateValues();

        // Checkout button click handler
        $('#checkout-button').click(function() {
            // Handle checkout logic
        });
    });
</script>


<!--**********************************
                            Content body end
                        ***********************************-->
@endsection