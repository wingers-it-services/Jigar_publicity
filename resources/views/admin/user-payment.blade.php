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
            <form class="needs-validation" novalidate="">
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
                                    <input type="text" class="form-control" id="email" placeholder="" name="email" required="">
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
                                    <select class="default-select wide form-control" id="no_of_device" name="no_of_device" required="">
                                        <!-- Options will be populated via JavaScript -->
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
                                        <!-- Options will be populated via JavaScript -->
                                    </select>
                                    <div class="invalid-feedback">
                                        Please select no of hours.
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary btn-lg btn-block" id="checkout-button" type="button">Continue to Pay</button>
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
                                                <a href="/admin/user-details/{{ $payment->uuid }}" class="btn btn-primary shadow btn-xs sharp me-1">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <button class="btn btn-primary shadow btn-xs sharp me-1 edit-payment-button" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg" data-payment-id="{{ $payment->id }}">
                                                    <i class="fa fa-pencil"></i>
                                                </button>
                                                <a onclick="confirmDelete('{{ $payment->uuid }}')" class="btn btn-danger shadow btn-xs sharp">
                                                    <i class="fa fa-trash"></i>
                                                </a>
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
        // Static data for demonstration purposes
        const deviceOptions = [
            { value: 1, text: '1' },
            { value: 2, text: '2' },
            { value: 3, text: '3' },
            { value: 4, text: '4' },
            { value: 5, text: '5' },
            { value: 6, text: '6' },
            { value: 7, text: '7' },
            { value: 8, text: '8' },
            { value: 9, text: '9' },
            { value: 10, text: '10' }
        ];

        const hourOptions = [
            { value: 1, text: '1' },
            { value: 2, text: '2' },
            { value: 3, text: '3' },
            { value: 4, text: '4' },
            { value: 5, text: '5' },
            { value: 6, text: '6' },
            { value: 7, text: '7' },
            { value: 8, text: '8' },
            { value: 9, text: '9' },
            { value: 10, text: '10' }
        ];

        function populateSelect(id, options) {
            const select = document.getElementById(id);
            select.innerHTML = '<option data-display="Select">Please select</option>';
            options.forEach(option => {
                const opt = document.createElement('option');
                opt.value = option.value;
                opt.textContent = option.text;
                select.appendChild(opt);
            });
        }

        // Populate the selects with static data
        populateSelect('no_of_device', deviceOptions);
        populateSelect('number_of_hours', hourOptions);

        document.querySelectorAll('.edit-payment-button').forEach(button => {
            button.addEventListener('click', function() {
                const paymentId = this.getAttribute('data-payment-id');
                fetch(`/admin/payment-details/${paymentId}`)
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById('userId').value = data.id;
                        document.getElementById('name').value = data.name;
                        document.getElementById('email').value = data.email;
                        document.getElementById('mobile').value = data.phone;
                    populateSelect('no_of_device', deviceOptions, data.no_of_device);
                    populateSelect('number_of_hours', hourOptions, data.no_of_hour);

                        updateValues(); // Update values based on the selected options
                    });
            });
        });
    });

    $(document).ready(function() {
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
                        if (data.error) {
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

                            $('#price').text(price);
                            $('#igst').text(igst);
                            $('#total-amount').text(total);
                            $('#total-amount-input').val(total);
                            $('#igst-input').val(igst);
                            $('#price_per_hour').val(pricePerHour);
                            $('#subtotal').val(price);
                            $('#price_per_hour_span').text(pricePerHour);
                        } else {
                            $('#price').text('Error');
                            $('#igst').text('Error');
                            $('#total-amount').text('Error');
                            $('#total-amount-input').val('Error');
                            $('#igst-input').val('Error');
                            $('#price_per_hour').val('Error');
                            $('#subtotal').val('Error');
                            $('#price_per_hour_span').text('Error');
                        }
                    },
                    error: function(xhr, status, error) {
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

        $('#number_of_hours, #no_of_device').change(updateValues);
        updateValues();
    });
</script>
<!--**********************************
Content body end
***********************************-->
@endsection
