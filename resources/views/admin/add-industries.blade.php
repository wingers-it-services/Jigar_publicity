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
                <form class="needs-validation" action="{{ route('addIndustry') }}" method="POST" enctype="multipart/form-data" novalidate>
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
                                            <label class="col-lg-4 col-form-label" for="validationCustom02">Industry Name<span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" id="validationCustom02" name="industry_name" required>
                                                <div class="invalid-feedback">
                                                    Please enter the industry name.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label" for="validationCustom01">Advertisement Image
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-8">
                                                <input type="file" class="form-control" id="validationCustom01" accept="image/*" name="image" onchange="previewImage(event)" required>
                                                <div class="invalid-feedback">
                                                    Please upload an image.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-12">
                                            <br>
                                            <label>Address</label>
                                            <textarea class="form-control" name="industry_address" required></textarea>
                                            <div class="invalid-feedback">
                                                Please enter an address.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3" id="imagePreview">
                                        <img src="https://cdn.prod.website-files.com/62d84e447b4f9e7263d31e94/6557420216a456cfaef685c0_6399a4d27711a5ad2c9bf5cd_ben-sweet-2LowviVHZ-E-unsplash-1-p-1080.jpg" style="width: 400px;height:200px" loading="lazy" alt="image">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-lg-6 mb-2">
                                        <label>Category</label>
                                        <select id="category_id" name="category_id" class="form-control" required>
                                            <option value="" disabled selected>Select Category</option>
                                            @foreach($categorys as $category)
                                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">Please select a category.</div>
                                    </div>
                                    <br>
                                    <div class="col-lg-6 mb-2">
                                        <label>Area</label>
                                        <select id="area_id" name="area_id" class="form-control" required>
                                            <option value="" disabled selected>Select Area</option>
                                            @foreach($areas as $area)
                                            <option value="{{ $area->id }}">{{ $area->area_name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">Please select an area.</div>
                                    </div>
                                    <div class="col-lg-6 mb-2">
                                        <div class="form-group">
                                            <br>
                                            <label>Contact Number</label>
                                            <input class="form-control" name="industry_contact_no" type="text" required>
                                            <div class="invalid-feedback">
                                                Please enter a contact number.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-2">
                                        <div class="form-group">
                                            <br>
                                            <label>Email</label>
                                            <input type="email" class="form-control" name="industry_email" required>
                                            <div class="invalid-feedback">
                                                Please enter a valid email.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-lg-3 col-form-label">Select Sector</label>
                                        <div class="col-lg-9 d-flex align-items-center">
                                            <div class="form-check me-3">
                                                <input class="form-check-input" type="radio" name="industry_type" value="manufacturing" id="validationCustom12" required>
                                                <label class="form-check-label" for="validationCustom12">
                                                    Manufacturing
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="industry_type" value="non-manufacturing" id="validationCustom13" required>
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
                                            <label class="col-lg-4 col-form-label" for="validationCustom02">Product Name<span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" id="product_name" name="product_name" required>
                                                <div class="invalid-feedback">
                                                    Please enter the product name.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label" for="by_product">By Product
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" id="by_product" name="by_product" required>
                                                <div class="invalid-feedback">
                                                    Please enter the by-product.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label" for="raw_material">Raw Material
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" id="raw_material" name="raw_material" required>
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

                    <!-- Container for dynamically added fields -->
                    <div class="card" id="industryFields">
                    </div>

                    <div class="card">
                        <div class="modal-content">
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" onclick="addIndustryField()">Add Contacts</button>&nbsp; 
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

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
                        <div class="col-lg-4 mt-3">
                            <div class="form-group">
                                <label>Contact Name</label>
                                <input class="form-control" name="contact_name[]" type="text" required>
                                <div class="invalid-feedback">
                                    Please enter the contact name.
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mt-3">
                            <div class="form-group">
                                <label>Mobile</label>
                                <input class="form-control" name="mobile[]" type="text" required>
                                <div class="invalid-feedback">
                                    Please enter the mobile number.
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mt-3">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email[]" required>
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
</script>
@endsection
