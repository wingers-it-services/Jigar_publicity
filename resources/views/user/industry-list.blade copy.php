@extends('user.master')
@section('title', 'Dashboard')
@section('content')

    <!--**********************************
                                                Content body start
                                    ***********************************-->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="content-body ">
        <!-- row -->
        <div class="container-fluid">
            <div class="row">
                <div class="card-header d-sm-flex d-block pb-0 border-0">
                    <div class="me-auto pe-3">
                        <h4 class="text-black fs-20">Book Details</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-3 col-lg-6  col-md-6 col-xxl-5 ">
                                        <!-- Tab panes -->
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel"
                                                aria-labelledby="home-tab" tabindex="0">
                                                <img class="img-fluid rounded "
                                                    src="https://www.jigarpublicity.com/assets/img/jigar-publicity-logo.png"
                                                    alt="">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-6  col-md-6 col-xxl-5 ">
                                        <!-- Tab panes -->
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel"
                                                aria-labelledby="home-tab" tabindex="0">
                                                <img class="img-fluid rounded "
                                                    src="https://www.jigarpublicity.com/assets/img/jigar-publicity-logo.png"
                                                    alt="">
                                            </div>

                                        </div>
                                    </div>


                                </div>

                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-xl-10">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Industry List</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">


                                <table id="example3" class="display min-w850">
                                    <thead>
                                        <tr>
                                            <th>Industry Name</th>
                                            <th>Category</th>
                                            <th>Area</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($industries as $industry)
                                        <tr>
                                            <td>{{ $industry->industry_name }}</td>
                                            <td>{{ $industry->category_id }}</td>
                                            <td>{{ $industry->area_id }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    @if (!empty($industry->advertisment_image))
                                                    <button class="btn btn-primary shadow btn-xs sharp me-1" data-bs-toggle="modal" data-bs-target="#industryDetailsModal"
                                                        data-industry_name="{{ $industry->industry_name }}"
                                                        data-email="{{ $industry->email }}"
                                                        data-phone="{{ $industry->contact_no }}"
                                                        data-address="{{ $industry->address }}"
                                                        data-area="{{ $industry->area_id }}"
                                                        data-category="{{ $industry->category_id }}"
                                                        data-product="{{ $industry->product }}"
                                                        data-by_product="{{ $industry->by_product }}"
                                                        data-raw_material="{{ $industry->raw_material }}"
                                                        data-contact_name="XYZ"
                                                        data-contact_phone=""
                                                        data-contact_email="{{ $industry->raw_material }}"
                                                        data-image="{{ $industry->advertisment_image }}">
                                                        <i class="fa fa-eye"></i>
                                                    </button>
                                                    @endif
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

                <div class="col-lg-2">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-3 col-lg-6  col-md-6 col-xxl-5 ">
                                    <!-- Tab panes -->
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel"
                                            aria-labelledby="home-tab" tabindex="0">
                                            <img class="img-fluid rounded "
                                                src="https://www.jigarpublicity.com/assets/img/jigar-publicity-logo.png"
                                                alt="">
                                        </div>

                                    </div>
                                </div>


                            </div>

                        </div>

                    </div>
                </div>


                <!-- Industry Details Modal -->
<div class="modal fade" id="industryDetailsModal" tabindex="-1" aria-labelledby="industryDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="industryDetailsModalLabel">Industry Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Industries Details</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-9 col-lg-6 col-md-6 col-xxl-7 col-sm-12">
                                        <div class="product-detail-content">
                                            <div class="new-arrival-content mt-md-0 mt-3 pr">
                                                <h4 id="industryName"></h4>
                                                <div class="d-table mb-2">
                                                    <p class="price float-start d-block"></p>
                                                </div>
                                                <p class="text-black">Email: <span class="item" id="industryEmail"></span></p>
                                                <p class="text-black">Phone number: <span class="item" id="industryPhone"></span></p>
                                                <p class="text-black">Address: <span class="item" id="industryAddress"></span></p>
                                                <p class="text-black">Area: <span class="item" id="industryArea"></span></p>
                                                <p class="text-black">Types of Industry: <span class="item" id="industryCategory"></span></p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="product-detail-content">
                                            <div class="new-arrival-content mt-md-0 mt-3 pr">
                                                <p class="text-black">Product: <span class="item" id="industryProduct"></span></p>
                                                <p class="text-black">By Product: <span class="item" id="industryByProduct"></span></p>
                                                <p class="text-black">Raw Material: <span class="item" id="industryRawMaterial"></span></p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="product-detail-content">
                                            <div class="new-arrival-content mt-md-0 mt-3 pr">
                                                <p class="text-black">Contact Name: <span class="item" id="industryContactName"></span></p>
                                                <p class="text-black">Phone: <span class="item" id="industryContactPhone"></span></p>
                                                <p class="text-black">Email: <span class="item" id="industryContactEmail"></span></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-md-6 col-xxl-5">
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                                <img class="img-fluid rounded" id="industryImage" src="" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                                Content body end
                                    ***********************************-->
    <script src="{{ asset('js/plugins-init/staff-attendance-overview-chart.js') }}" type="text/javascript"></script>
    <script>
        function addIndustryField() {
            var html = '<div class="container">' + '<div class="modal-dialog modal-lg">' +
                '<div class="modal-content">' +
                '<div class="modal-body">' +
                '<div class="modal-header">' +
                '<h5 class="modal-title"> Unit Details</h5>' +
                '<i style="float: right;" onclick="removeIndustryField(this)" class="fa fa-minus"></i>' +
                '</div>' +

                '<div class="row">' +
                '<div class="col-lg-6 mt-3 mt-lg-4">' +
                '<div class="form-group">' +
                '<label>Unit Name</label>' +
                '<input class="form-control" name="unit_name[]" type="text">' +
                '</div>' +

                '</div>' +
                '<div class="col-lg-6 mt-3 mt-lg-4">' +
                '<div class="form-group">' +
                '<label>Contact No.</label>' +
                '<input class="form-control" name="unit_contact_no[]" type="text">' +
                '</div>' +
                '</div>' +
                '</div>' +

                '<div class="row">' +
                '<div class="col-lg-12 mt-3 mt-lg-4">' +
                '<div class="form-group">' +
                '<label>Unit Address</label>' +
                '<textarea class="form-control" name="unit_address[]"></textarea>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>';
            $('#industryFields').append(html);
        }

        function removeIndustryField(btn) {
            $(btn).closest('.container').remove();
        }
    </script>

    <script>
        var loadFile = function(event) {
            // var selected_image = document.getElementById('selected_image');

            var input = event.target;
            var image = document.getElementById('selected_image');
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    image.src = e.target.result;
                }
                reader.readAsDataURL(input.files[0]);
            }

            function validateForm() {
                let x = document.forms["myForm"]["staff_id"].value;
                if (x == "") {
                    alert("Name must be filled out");
                    return false;
                }
            }

        };

        $(document).ready(function() {
            $('#category_id').change(function() {
                var selectedCategoryId = $(this).val();

                if (selectedCategoryId) {
                    $.ajax({
                        url: '/admin/check-category-id', // Your route to check category ID
                        type: 'GET',
                        data: {
                            category_id: selectedCategoryId
                        },
                        success: function(response) {
                            if (response.exists) {
                                $('#category-exists-message').show();
                            } else {
                                $('#category-exists-message').hide();
                            }
                        }
                    });
                }
            });
        });
    </script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var industryDetailsModal = document.getElementById('industryDetailsModal');
        industryDetailsModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var industryName = button.getAttribute('data-industry_name');
            var email = button.getAttribute('data-email');
            var phone = button.getAttribute('data-phone');
            var address = button.getAttribute('data-address');
            var area = button.getAttribute('data-area');
            var category = button.getAttribute('data-category');
            var product = button.getAttribute('data-product');
            var byProduct = button.getAttribute('data-by_product');
            var rawMaterial = button.getAttribute('data-raw_material');
            var contactName = button.getAttribute('data-contact_name');
            var contactPhone = button.getAttribute('data-contact_phone');
            var contactEmail = button.getAttribute('data-contact_email');
            var image = button.getAttribute('data-image');

            var modalTitle = industryDetailsModal.querySelector('.modal-title');
            var industryNameElement = industryDetailsModal.querySelector('#industryName');
            var emailElement = industryDetailsModal.querySelector('#industryEmail');
            var phoneElement = industryDetailsModal.querySelector('#industryPhone');
            var addressElement = industryDetailsModal.querySelector('#industryAddress');
            var areaElement = industryDetailsModal.querySelector('#industryArea');
            var categoryElement = industryDetailsModal.querySelector('#industryCategory');
            var productElement = industryDetailsModal.querySelector('#industryProduct');
            var byProductElement = industryDetailsModal.querySelector('#industryByProduct');
            var rawMaterialElement = industryDetailsModal.querySelector('#industryRawMaterial');
            var contactNameElement = industryDetailsModal.querySelector('#industryContactName');
            var contactPhoneElement = industryDetailsModal.querySelector('#industryContactPhone');
            var contactEmailElement = industryDetailsModal.querySelector('#industryContactEmail');
            var imageElement = industryDetailsModal.querySelector('#industryImage');

            modalTitle.textContent = 'Industry Details';
            industryNameElement.textContent = industryName;
            emailElement.textContent = email;
            phoneElement.textContent = phone;
            addressElement.textContent = address;
            areaElement.textContent = area;
            categoryElement.textContent = category;
            productElement.textContent = product;
            byProductElement.textContent = byProduct;
            rawMaterialElement.textContent = rawMaterial;
            contactNameElement.textContent = contactName;
            contactPhoneElement.textContent = contactPhone;
            contactEmailElement.textContent = contactEmail;
            imageElement.src = image;
        });
    });
</script>


@endsection
