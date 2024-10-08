@extends('admin.master')
@section('title', 'Industry Add')
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
                    <form class="needs-validation" action="{{ route('addIndustry') }}" method="POST"
                        enctype="multipart/form-data" novalidate>
                        @csrf

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Industry Details</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-validation">
                                    <div class="row">
                                        <div class="col-xl-9">
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom02">Industry
                                                    Name <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-8">
                                                    <input type="text" class="form-control" id="validationCustom02"
                                                        name="industry_name" required>
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
                                                        accept="image/*" name="advertisment_image"
                                                        onchange="previewImage(event)">
                                                    <div class="invalid-feedback">
                                                        Please upload an image.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <br>
                                                <label class="col-lg-4 col-form-label" for="validationCustom01">Industry
                                                    Address <span class="text-danger">*</span></label>
                                                <div class="col-lg-8">
                                                    <textarea class="form-control" name="address" required></textarea>
                                                    <div class="invalid-feedback">
                                                        Please enter an address.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3" id="imagePreview">
                                            <img src="https://cdn.prod.website-files.com/62d84e447b4f9e7263d31e94/6557420216a456cfaef685c0_6399a4d27711a5ad2c9bf5cd_ben-sweet-2LowviVHZ-E-unsplash-1-p-1080.jpg"
                                                style="width: 400px;height:200px" loading="lazy" alt="image">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-6 mb-2">
                                            <div class="form-group">
                                                <label>Office Address</label>
                                                <textarea class="form-control" name="office_address" type="text"></textarea>
                                                <div class="invalid-feedback">
                                                    Please enter a office address.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-2">
                                            <label>Industrial Category <span class="text-danger">*</span></label>
                                            <select id="category_id" name="category_id" class="form-control" required>
                                                <option value="" disabled selected>Select Industrial Category</option>
                                                @foreach ($categorys as $category)
                                                    <option value="{{ $category->id }}">{{ $category->category_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">Please select a category.</div>
                                        </div>
                                        <br>
                                        <div class="col-lg-6 mb-2">
                                            <label>Industrial Area <span class="text-danger">*</span></label>
                                            <select id="area_id" name="area_id" class="form-control" required>
                                                <option value="" disabled selected>Select Industrial Area</option>
                                                @foreach ($areas as $area)
                                                    <option value="{{ $area->id }}">{{ $area->area_name }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">Please select an area.</div>
                                        </div>
                                        <div class="col-lg-6 mb-2">
                                            <div class="form-group">
                                                <label>Contact Number <span class="text-danger">*</span></label>
                                                <input class="form-control" name="contact_no" type="text" required
                                                    pattern="\d{10}" id="contact_no">
                                                <div class="invalid-feedback contact-feedback">
                                                    Please enter a valid contact number (10 digits).
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-2">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" class="form-control" id="email" name="email">
                                                <div class="invalid-feedback email-feedback">
                                                    Please enter a valid email.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-2">
                                            <div class="form-group">
                                                <label>Web Link</label>
                                                <input type="text" class="form-control" id="web_link" name="web_link">
                                                <div class="invalid-feedback web-feedback">
                                                    Please enter a valid website.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-2">
                                            <div class="form-group">
                                                <label class="col-lg-3 col-form-label">Select Sector <span
                                                        class="text-danger">*</span></label>
                                                <br>
                                                <div class="col-lg-9 d-inline-flex align-items-center flex-wrap-nowrap">
                                                    <div class="form-check me-4">
                                                        <input class="form-check-input" type="radio"
                                                            name="industry_type" value="manufacturing"
                                                            id="validationCustom12" required>
                                                        <label class="form-check-label" for="validationCustom12"
                                                            style="white-space: nowrap;">Manufacturing</label>
                                                    </div>
                                                    <div class="form-check me-4">
                                                        <input class="form-check-input" type="radio"
                                                            name="industry_type" value="non-manufacturing"
                                                            id="validationCustom13" required>
                                                        <label class="form-check-label" for="validationCustom13"
                                                            style="white-space: nowrap;">Non-Manufacturing</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="industry_type" value="service-based"
                                                            id="validationCustom14" required>
                                                        <label class="form-check-label" for="validationCustom14"
                                                            style="white-space: nowrap;">Service Based</label>
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
                                                <label class="col-lg-4 col-form-label" for="validationCustom02">Product
                                                    Name <span class="text-danger">*</span></label>
                                                <div class="col-lg-8">
                                                    <input type="text" class="form-control" id="product"
                                                        name="product">
                                                    <div class="invalid-feedback">Please enter the product name.</div>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="by_product">By Product</label>
                                                <div class="col-lg-8">
                                                    <input type="text" class="form-control" id="by_product"
                                                        name="by_product">
                                                    <div class="invalid-feedback">Please enter the by-product.</div>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="raw_material">Raw
                                                    Material</label>
                                                <div class="col-lg-8">
                                                    <input type="text" class="form-control" id="raw_material"
                                                        name="raw_material">
                                                    <div class="invalid-feedback">Please enter the raw material.</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Add this new card for service type input -->
                        <div class="card" id="serviceTypeCard" style="display: none;">
                            <div class="card-header">
                                <h4 class="card-title">Add Service-Based Industry Info.</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-validation">
                                    <div class="row">
                                        <div class="col-xl-9">
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="service_type">Service
                                                    Type</label>
                                                <div class="col-lg-8">
                                                    <input type="text" class="form-control" id="service_type"
                                                        name="product">
                                                    <div class="invalid-feedback">Please enter the service type.</div>
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
                                    <button type="button" class="btn btn-light" onclick="addIndustryField()">Add
                                        Contacts</button>&nbsp;
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                var forms = document.getElementsByClassName('needs-validation');
                Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();

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
            const serviceBasedCheckbox = document.getElementById('validationCustom14');
            const conditionalCard = document.getElementById('conditionalCard');
            const serviceTypeCard = document.getElementById('serviceTypeCard');

            function toggleConditionalContent() {
                if (manufacturingCheckbox.checked) {
                    conditionalCard.style.display = 'block';
                    serviceTypeCard.style.display = 'none';
                } else if (serviceBasedCheckbox.checked) {
                    conditionalCard.style.display = 'none';
                    serviceTypeCard.style.display = 'block';
                } else {
                    conditionalCard.style.display = 'none';
                    serviceTypeCard.style.display = 'none';
                }
            }

            manufacturingCheckbox.addEventListener('change', toggleConditionalContent);
            nonManufacturingCheckbox.addEventListener('change', toggleConditionalContent);
            serviceBasedCheckbox.addEventListener('change', toggleConditionalContent);

            // Initial check on page load
            toggleConditionalContent();
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
                                <label>Mobile <span class="text-danger">*</span></label>
                                <input class="form-control" id="mobile" name="mobile[]" type="text" required>
                                <div class="invalid-feedback">
                                    Please enter the mobile number.
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 mt-3">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" id="email_id" name="email_id[]">
                                <div class="invalid-feedback">
                                    Please enter a valid email.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>`;
            document.getElementById('industryFields').insertAdjacentHTML('beforeend', html);
            applyValidation();
        }

        function removeIndustryField(button) {
            button.closest('.card').remove();
        }

        //Validation for the contact details section
        function applyValidation() {
            const contactInputs = document.querySelectorAll('input[name="mobile[]"]');
            const emailInputs = document.querySelectorAll('input[name="email_id[]"]');

            contactInputs.forEach(input => {
                input.addEventListener('input', function() {
                    const contactPattern = /^\d{10}$/;
                    if (contactPattern.test(input.value)) {
                        input.classList.remove('is-invalid');
                        input.classList.add('is-valid');
                        input.nextElementSibling.style.display = 'none';
                    } else {
                        input.classList.remove('is-valid');
                        input.classList.add('is-invalid');
                        input.nextElementSibling.style.display = 'block';
                    }
                });
            });

            emailInputs.forEach(input => {
                input.addEventListener('input', function() {
                    const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
                    if (emailPattern.test(input.value)) {
                        input.classList.remove('is-invalid');
                        input.classList.add('is-valid');
                        input.nextElementSibling.style.display = 'none';
                    } else {
                        input.classList.remove('is-valid');
                        input.classList.add('is-invalid');
                        input.nextElementSibling.style.display = 'block';
                    }
                });
            });
        }

        document.addEventListener('DOMContentLoaded', function() {

            //validation for first section of the form (Industries details)
            const emailInput = document.getElementById('email');
            const webLinkInput = document.getElementById('web_link');
            const contactNumberInput = document.getElementById('contact_no');

            const emailFeedback = document.querySelector('.email-feedback');
            const webLinkFeedback = document.querySelector('.web-feedback');
            const contactFeedback = document.querySelector('.contact-feedback');

            emailInput.addEventListener('input', function() {
                const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
                if (emailRegex.test(emailInput.value)) {
                    emailFeedback.style.display = 'none';
                } else {
                    emailFeedback.style.display = 'block';
                }
            });

            webLinkInput.addEventListener('input', function() {
                const webLinkPattern =
                    /^(http:\/\/|https:\/\/)?[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,6}(\/[a-zA-Z0-9#]+\/?)*$/;
                if (webLinkPattern.test(webLinkInput.value)) {
                    webLinkFeedback.style.display = 'none';
                } else {
                    webLinkFeedback.style.display = 'block';
                }
            });

            contactNumberInput.addEventListener('input', function() {
                const contactPattern = /^\d{10}$/;
                if (contactPattern.test(contactNumberInput.value)) {
                    contactFeedback.style.display = 'none';
                } else {
                    contactFeedback.style.display = 'block';
                }
            });


            //Validation for the manufacturing info section
            const manufacturingRadio = document.getElementById('validationCustom12');
            const nonManufacturingRadio = document.getElementById('validationCustom13');
            const conditionalCard = document.getElementById('conditionalCard');
            const productInput = document.getElementById('product');
            const byProductInput = document.getElementById('by_product');
            const rawMaterialInput = document.getElementById('raw_material');

            function toggleConditionalCard() {
                if (manufacturingRadio.checked) {
                    conditionalCard.style.display = 'block';
                    addValidation(); // Add validation if manufacturing is selected
                } else {
                    conditionalCard.style.display = 'none';
                    removeValidation(); // Remove validation if non-manufacturing is selected
                }
            }

            function addValidation() {
                productInput.setAttribute('required', 'required');
                // Add validation for other fields if needed
                byProductInput.removeAttribute('required');
                rawMaterialInput.removeAttribute('required');
            }

            function removeValidation() {
                productInput.removeAttribute('required');
                byProductInput.removeAttribute('required');
                rawMaterialInput.removeAttribute('required');
            }

            manufacturingRadio.addEventListener('change', toggleConditionalCard);
            nonManufacturingRadio.addEventListener('change', toggleConditionalCard);

            // Initial check on page load
            toggleConditionalCard();
        });
    </script>

    @include('CustomSweetAlert');
@endsection
