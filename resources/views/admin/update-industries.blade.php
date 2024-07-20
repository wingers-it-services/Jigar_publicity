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
    </style>

    <div class="content-body ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <form class="needs-validation" action="{{ route('updateIndustry', $industryDetails->uuid) }}"
                        method="POST" enctype="multipart/form-data" novalidate>
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Update Industry Details</h4>
                            </div>
                            <!-- <input type="hidden" class="form-control" value="{{ $industryDetails->uuid }}" name="uuid"> -->
                            <div class="card-body">
                                <div class="form-validation">
                                    <div class="row">
                                        <div class="col-xl-9">
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom02">Industry
                                                    Name
                                                </label>
                                                <div class="col-lg-8">
                                                    <input type="text" class="form-control"
                                                        value="{{ $industryDetails->industry_name }}"
                                                        id="validationCustom02" name="industry_name" required>
                                                    <div class="invalid-feedback">
                                                        Please enter the industry name.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label"
                                                    for="validationCustom01">Advertisement Image
                                                </label>
                                                <div class="col-lg-8">
                                                    <input type="file" class="form-control" id="validationCustom01"
                                                        value="{{ $industryDetails->advertisment_image }}" accept="image/*"
                                                        name="advertisment_image" onchange="previewImage(event)" required>
                                                    <div class="invalid-feedback">
                                                        Please upload an image.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <br>
                                                <label class="col-lg-4 col-form-label"
                                                    for="validationCustom01">Address</label>
                                                <div class="col-lg-8">
                                                    <textarea class="form-control" name="address" required>{{ $industryDetails->address }}</textarea>
                                                    <div class="invalid-feedback">
                                                        Please enter an address.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3" id="imagePreview">
                                            @if ($industryDetails->advertisment_image)
                                                <img src="{{ asset($industryDetails->advertisment_image) }}"
                                                    style="width: 400px; height: 200px" loading="lazy" alt="image">
                                            @endif
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-6 mb-2">
                                            <div class="form-group">
                                                <label>Office Address</label>
                                                <textarea class="form-control" name="office_address" type="text" required>{{ $industryDetails->office_address }}</textarea>
                                                <div class="invalid-feedback">
                                                    Please enter a office address.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-2">
                                            <label>Industrial Category</label>
                                            <select id="category_id" name="category_id" class="form-control" required
                                                {{ $categorys->isEmpty() ? 'disabled' : '' }}>
                                                <option value="" disabled>Select Industrial Category</option>
                                                @foreach ($categorys as $category)
                                                    <option value="{{ $category->id }}"
                                                        {{ $category->id == $industryDetails->category_id ? 'selected' : '' }}>
                                                        {{ $category->category_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @if ($categorys->isEmpty())
                                                <div class="invalid-feedback">No categories available. Please add a category
                                                    first.</div>
                                            @else
                                                <div class="invalid-feedback">Please select a category.</div>
                                            @endif
                                        </div>
                                        <div class="col-lg-6 mb-2">
                                            <label>Industrial Area</label>
                                            <select id="area_id" name="area_id" class="form-control" required
                                                {{ $areas->isEmpty() ? 'disabled' : '' }}>
                                                <option value="" disabled>Select Industrial Area</option>
                                                @foreach ($areas as $area)
                                                    <option value="{{ $area->id }}"
                                                        {{ $area->id == $industryDetails->area_id ? 'selected' : '' }}>
                                                        {{ $area->area_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @if ($areas->isEmpty())
                                                <div class="invalid-feedback">No areas available. Please add an area first.
                                                </div>
                                            @else
                                                <div class="invalid-feedback">Please select an area.</div>
                                            @endif
                                        </div>
                                        <div class="col-lg-6 mb-2">
                                            <div class="form-group">
                                                <label>Contact Number</label>
                                                <input class="form-control" name="contact_no"
                                                    value="{{ $industryDetails->contact_no }}" type="text" required>
                                                <div class="invalid-feedback">
                                                    Please enter a contact number.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-2">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" class="form-control"
                                                    value="{{ $industryDetails->email }}" name="email" required>
                                                <div class="invalid-feedback">
                                                    Please enter a valid email.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-2">
                                            <div class="form-group">
                                                <label>Web Link</label>
                                                <input type="text" class="form-control" name="web_link"
                                                    value="{{ $industryDetails->web_link }}" required>
                                                <div class="invalid-feedback">
                                                    Please enter a valid website.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-2">
                                            <div class="form-group">
                                                <label class="col-lg-3 col-form-label">Select Sector</label>
                                                <br>
                                                <div class="col-lg-9 d-flex align-items-center">
                                                    <div class="form-check me-3">
                                                        <input class="form-check-input" type="radio"
                                                            name="industry_type" value="manufacturing"
                                                            id="validationCustom12"
                                                            {{ $industryDetails->industry_type == 'manufacturing' ? 'checked' : '' }}
                                                            required>
                                                        <label class="form-check-label" for="validationCustom12">
                                                            Manufacturing
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="industry_type" value="non-manufacturing"
                                                            id="validationCustom13"
                                                            {{ $industryDetails->industry_type == 'non-manufacturing' ? 'checked' : '' }}
                                                            required>
                                                        <label class="form-check-label" for="validationCustom13">
                                                            Non-Manufacturing
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>

                        <!-- This is the card that will be conditionally shown/hidden -->
                        <div class="card" id="conditionalCard" style="display: none;">
                            <div class="card-header">
                                <h4 class="card-title">Add Manufacturing Industry Info.</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-validation">
                                    <div class="row">
                                        <div class="col-xl-9">
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="product">Product Name</label>
                                                <div class="col-lg-8">
                                                    <input type="text" class="form-control"
                                                        value="{{ $industryDetails->product }}" id="product"
                                                        name="product" required>
                                                    <div class="invalid-feedback">
                                                        Please enter the product name.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="by_product">By Product</label>
                                                <div class="col-lg-8">
                                                    <input type="text" class="form-control"
                                                        value="{{ $industryDetails->by_product }}" id="by_product"
                                                        name="by_product" required>
                                                    <div class="invalid-feedback">
                                                        Please enter the by-product.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="raw_material">Raw
                                                    Material</label>
                                                <div class="col-lg-8">
                                                    <input type="text" class="form-control"
                                                        value="{{ $industryDetails->raw_material }}" id="raw_material"
                                                        name="raw_material" required>
                                                    <div class="invalid-feedback">
                                                        Please enter the raw material.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        @foreach ($contacts as $contact)
                            <div class="row">
                                <div class="card mb-3">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h5 class="card-title mb-0">Add Contact Details</h5>
                                        <button type="button" class="btn btn-danger btn-sm"
                                            data-row-id="{{ $contact->id }}"
                                            onclick="removeIndustryField(this)">Remove</button>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-4 mt-3">
                                                <div class="form-group">
                                                    <label>Contact Name</label>
                                                    <input class="form-control" name="contact_name[]"
                                                        value="{{ $contact->contact_name }}" type="text" required>
                                                    <div class="invalid-feedback">
                                                        Please enter the contact name.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 mt-3">
                                                <div class="form-group">
                                                    <label>Mobile</label>
                                                    <input class="form-control" name="mobile[]"
                                                        value="{{ $contact->mobile }}" type="text" required>
                                                    <div class="invalid-feedback">
                                                        Please enter the mobile number.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 mt-3">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="email" class="form-control"
                                                        value="{{ $contact->email_id }}" name="email_id[]" required>
                                                    <div class="invalid-feedback">
                                                        Please enter a valid email.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <!-- Container for dynamically added fields -->
                        <div class="card" id="industryFields">
                        </div>

                        <div class="card">
                            <div class="modal-content">
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light" onclick="addIndustryField()">Add
                                        Contacts</button>&nbsp;
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

        document.addEventListener('DOMContentLoaded', function() {
            const manufacturingCheckbox = document.getElementById('validationCustom12');
            const nonManufacturingCheckbox = document.getElementById('validationCustom13');
            const conditionalCard = document.getElementById('conditionalCard');

            function toggleConditionalCard() {
                if (manufacturingCheckbox.checked) {
                    conditionalCard.style.display = 'block';
                } else {
                    conditionalCard.style.display = 'none';
                }
            }

            manufacturingCheckbox.addEventListener('change', toggleConditionalCard);
            nonManufacturingCheckbox.addEventListener('change', toggleConditionalCard);

            // Initial check on page load
            toggleConditionalCard();
        });

        function addIndustryField() {
            const html = `
            <div class="card mb-3">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Add Contact Details</h5>
                    <button type="button" class="btn btn-danger btn-sm" onclick="removeIndustryField(this)">Remove</button>
                </div>
                <div class="card-body">
                    <div class="row">
                         <div class="col-lg-3 mt-3">
                            <div class="form-group">
                                <label>Contact Name <span class="text-danger">*</span></label>
                                <input class="form-control" name="contact_name[]" type="text" required>
                                <div class="invalid-feedback">
                                    Please enter the contact name.
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 mt-3">
                            <div class="form-group">
                                <label>Designation <span class="text-danger">*</span></label>
                                <input class="form-control" name="designation[]" type="text" required>
                                <div class="invalid-feedback">
                                    Please enter the contact designation.
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 mt-3">
                            <div class="form-group">
                                <label>Mobile</label>
                                <input class="form-control" name="mobile[]"   type="number"  minlength="10"  maxlength="10" pattern='\d{10}'  required>
                                <div class="invalid-feedback">
                                    Please enter the mobile number.
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 mt-3">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email_id[]" required>
                                <div class="invalid-feedback">
                                    Please enter a valid email.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>`;
            document.getElementById('industryFields').insertAdjacentHTML('beforeend', html);
        }

        function removeIndustryField(button) {
            button.closest('.card').remove();
        }

        $(document).ready(function() {
            $(".card").on("click", ".btn-sm", function() {
                var button = $(this);
                var rowId = button.data('row-id');
                if (rowId) {
                    // Make an AJAX request to delete the row from the database
                    $.ajax({
                        url: "/admin/delete-contacts/" + rowId,
                        type: 'POST',
                        data: {
                            _token: "{{ csrf_token() }}",
                        },
                        success: function(response) {
                            // Remove the row from the UI if the deletion was successful
                            button.closest('.card').remove();
                            // Swal.fire('Deleted!', 'Contact has been deleted.', 'success');
                        },
                        error: function(error) {
                            console.log(error);
                            Swal.fire('Error!', 'Failed to delete contact.', 'error');
                        }
                    });
                } else {
                    // If no row ID is available, simply remove the row from the UI
                    button.closest('.card').remove();
                }
            });
        });
    </script>
@endsection
