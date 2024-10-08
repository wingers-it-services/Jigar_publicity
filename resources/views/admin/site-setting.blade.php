@extends('admin.master')
@section('title', 'Site Settings')
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
    </style>
    <div class="content-body ">
        <div class="container-fluid">
            <div class="page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Setting</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Site Setting</a></li>
                </ol>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form class="needs-validation" action="{{ route('updateSiteSetting') }}" method="POST"
                        enctype="multipart/form-data" novalidate>
                        @csrf

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Site Setting</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-validation">
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom01">One Device
                                                    Per Hour
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="validationCustom01"
                                                        name="one_device_per_hour" placeholder="Enter Charges.."
                                                        value="{{ $setting ? $setting->one_device_per_hour : '' }}"
                                                        required>
                                                    <div class="invalid-feedback">
                                                        Please enter a charges.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom01">Two Device
                                                    Per Hour
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="validationCustom01"
                                                        name="two_device_per_hour" placeholder="Enter Charges.."
                                                        value="{{ $setting ? $setting->two_device_per_hour : '' }}"
                                                        required>
                                                    <div class="invalid-feedback">
                                                        Please enter a charges.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom01">Three Device
                                                    Per Hour
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="validationCustom01"
                                                        name="three_device_per_hour" placeholder="Enter Charges.."
                                                        value="{{ $setting ? $setting->three_device_per_hour : '' }}"
                                                        required>
                                                    <div class="invalid-feedback">
                                                        Please enter a charges.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom01">Four Device
                                                    Per Hour
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="validationCustom01"
                                                        name="four_device_per_hour" placeholder="Enter Charges.."
                                                        value="{{ $setting ? $setting->four_device_per_hour : '' }}"
                                                        required>
                                                    <div class="invalid-feedback">
                                                        Please enter a charges.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom01">Five Device
                                                    Per Hour
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="validationCustom01"
                                                        name="five_device_per_hour" placeholder="Enter Charges.."
                                                        value="{{ $setting ? $setting->five_device_per_hour : '' }}"
                                                        required>
                                                    <div class="invalid-feedback">
                                                        Please enter a charges.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom01">Six Device
                                                    Per Hour
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="validationCustom01"
                                                        name="six_device_per_hour" placeholder="Enter Charges.."
                                                        value="{{ $setting ? $setting->six_device_per_hour : '' }}"
                                                        required>
                                                    <div class="invalid-feedback">
                                                        Please enter a charges.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom01">Seven
                                                    Device Per Hour
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="validationCustom01"
                                                        name="seven_device_per_hour" placeholder="Enter Charges.."
                                                        value="{{ $setting ? $setting->seven_device_per_hour : '' }}"
                                                        required>
                                                    <div class="invalid-feedback">
                                                        Please enter a charges.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom01">Eight
                                                    Device Per Hour
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="validationCustom01"
                                                        name="eight_device_per_hour" placeholder="Enter Charges.."
                                                        value="{{ $setting ? $setting->eight_device_per_hour : '' }}"
                                                        required>
                                                    <div class="invalid-feedback">
                                                        Please enter a charges.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom01">Nine
                                                    Device Per Hour
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="validationCustom01"
                                                        name="nine_device_per_hour" placeholder="Enter Charges.."
                                                        value="{{ $setting ? $setting->nine_device_per_hour : '' }}"
                                                        required>
                                                    <div class="invalid-feedback">
                                                        Please enter a charges.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom01">Ten Device
                                                    Per Hour
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="validationCustom01"
                                                        name="ten_device_per_hour" placeholder="Enter Charges.."
                                                        value="{{ $setting ? $setting->ten_device_per_hour : '' }}"
                                                        required>
                                                    <div class="invalid-feedback">
                                                        Please enter a charges.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom01">IGST in
                                                    percentage
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="validationCustom01"
                                                        name="igst" placeholder="Enter Charges.."
                                                        value="{{ $setting ? $setting->igst : '' }}" required>
                                                    <div class="invalid-feedback">
                                                        Please enter a name.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom01">Payment
                                                    Gateway Allow
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <select class="default-select wide form-control"
                                                        id="validationCustom05" name="payment_gateway_allow">
                                                        <option value="" disabled>Please select</option>
                                                        <option value="1"
                                                            {{ $setting && $setting->payment_gateway_allow == 1 ? 'selected' : '' }}>
                                                            TRUE</option>
                                                        <option value="0"
                                                            {{ $setting && $setting->payment_gateway_allow == 0 ? 'selected' : '' }}>
                                                            FALSE</option>
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Please select a one.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">


                                        <div class="modal-content">
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Update</button>
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
        (function() {
            'use strict'

            var forms = document.querySelectorAll('.needs-validation')

            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        var isValid = form.checkValidity();

                        // Custom numeric validation
                        var inputs = form.querySelectorAll('input[type="text"]');
                        inputs.forEach(function(input) {
                            if (input.value.trim() !== '' && isNaN(input.value)) {
                                isValid = false;
                                input.classList.add('is-invalid');
                                input.nextElementSibling.textContent =
                                    'Please enter a valid number.';
                            } else {
                                input.classList.remove('is-invalid');
                            }
                        });

                        if (!isValid) {
                            event.preventDefault();
                            event.stopPropagation();
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>
    @include('CustomSweetAlert');
@endsection
