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
                                            <tr class="clickable-row" data-industry_name="{{ $industry->industry_name }}"
                                                data-email="{{ $industry->email }}" data-phone="{{ $industry->contact_no }}"
                                                data-address="{{ $industry->address }}" data-area="{{ $industry->area_id }}"
                                                data-category="{{ $industry->category_id }}"
                                                data-product="{{ $industry->product }}"
                                                data-by_product="{{ $industry->by_product }}"
                                                data-raw_material="{{ $industry->raw_material }}" data-contact_name="XYZ"
                                                data-contact_phone="" data-contact_email="{{ $industry->raw_material }}"
                                                data-image="{{ $industry->advertisment_image }}">

                                                <td>{{ $industry->industry_name }}</td>
                                                <td>{{ $industry->category_id }}</td>
                                                <td>{{ $industry->area_id }}</td>
                                                <td>
                                                    <div class="d-flex">
                                                        @if (!empty($industry->advertisment_image))
                                                            <a href="#"
                                                                class="btn btn-primary shadow btn-xs sharp me-1 view-btn">
                                                                <i class="fa fa-eye"></i>
                                                            </a>
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
                {{-- <div id="industryDetailsContainer" class="row" style="display: none;">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Industries Details</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-xxl-12" style="margin-bottom: 20px;">
                                        <div class="image-container">
                                            <img id="industryImage" class="img-fluid rounded" src="" alt="">
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-xxl-12">
                                        <div class="product-detail-content">
                                            <div class="new-arrival-content mt-md-0 mt-3 pr">
                                                <h4 id="industryName"></h4>
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
                                                <p class="text-black">Contact Name: <span class="item" id="industryContactName">XYZ</span></p>
                                                <p class="text-black">Phone: <span class="item" id="industryContactPhone"></span></p>
                                                <p class="text-black">Email: <span class="item" id="industryContactEmail"></span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div id="industryDetailsContainer" class="row" style="display: none;">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Industries Details</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <!-- Column for Image -->
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-xxl-12 mb-3">
                                        <div class="image-container text-center">
                                            <img id="industryImage" class="img-fluid rounded" src="" alt="">
                                        </div>
                                    </div>

                                    <!-- Column for Industry Name and Basic Info -->
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-xxl-4 mb-3">
                                        <div class="product-detail-content">
                                            <div class="new-arrival-content mt-md-0 mt-3 pr">
                                                <h4 id="industryName"></h4>
                                                <p class="text-black">Email: <span class="item" id="industryEmail"></span></p>
                                                <p class="text-black">Phone number: <span class="item" id="industryPhone"></span></p>
                                                <p class="text-black">Address: <span class="item" id="industryAddress"></span></p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Column for Product Details -->
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-xxl-4 mb-3">
                                        <div class="product-detail-content">
                                            <div class="new-arrival-content mt-md-0 mt-3 pr">
                                                <p class="text-black">Area: <span class="item" id="industryArea"></span></p>
                                                <p class="text-black">Product: <span class="item" id="industryProduct"></span></p>
                                                <p class="text-black">By Product: <span class="item" id="industryByProduct"></span></p>
                                                <p class="text-black">Raw Material: <span class="item" id="industryRawMaterial"></span></p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Column for Contact Details -->
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-xxl-4 mb-3">
                                        <div class="product-detail-content">
                                            <div class="new-arrival-content mt-md-0 mt-3 pr">
                                                <p class="text-black">Types of Industry: <span class="item" id="industryCategory"></span></p>
                                                <p class="text-black">Contact Name: <span class="item" id="industryContactName">XYZ</span></p>
                                                <p class="text-black">Contact Phone: <span class="item" id="industryContactPhone"></span></p>
                                                <p class="text-black">Contact Email: <span class="item" id="industryContactEmail"></span></p>
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
    <style>
        .clickable-row:hover {
            background-color: #f5f5f5;
            cursor: pointer;
        }

        .active-row {
            background-color: #e0e0e0;
        }
    </style>



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
    document.addEventListener('DOMContentLoaded', function() {
    const detailsContainer = document.getElementById('industryDetailsContainer');
    const industryNameElement = document.getElementById('industryName');
    const industryEmailElement = document.getElementById('industryEmail');
    const industryPhoneElement = document.getElementById('industryPhone');
    const industryAddressElement = document.getElementById('industryAddress');
    const industryAreaElement = document.getElementById('industryArea');
    const industryCategoryElement = document.getElementById('industryCategory');
    const industryProductElement = document.getElementById('industryProduct');
    const industryByProductElement = document.getElementById('industryByProduct');
    const industryRawMaterialElement = document.getElementById('industryRawMaterial');
    const industryContactNameElement = document.getElementById('industryContactName');
    const industryContactPhoneElement = document.getElementById('industryContactPhone');
    const industryContactEmailElement = document.getElementById('industryContactEmail');
    const industryImageElement = document.getElementById('industryImage');

    document.querySelector('tbody').addEventListener('click', function(event) {
        const row = event.target.closest('.clickable-row');
        if (row) {
            const industryName = row.dataset.industry_name;
            const email = row.dataset.email;
            const phone = row.dataset.phone;
            const address = row.dataset.address;
            const area = row.dataset.area;
            const category = row.dataset.category;
            const product = row.dataset.product;
            const byProduct = row.dataset.by_product;
            const rawMaterial = row.dataset.raw_material;
            const contactName = row.dataset.contact_name;
            const contactPhone = row.dataset.contact_phone;
            const contactEmail = row.dataset.contact_email;
            const image = row.dataset.image;

            industryNameElement.textContent = industryName;
            industryEmailElement.textContent = email;
            industryPhoneElement.textContent = phone;
            industryAddressElement.textContent = address;
            industryAreaElement.textContent = area;
            industryCategoryElement.textContent = category;
            industryProductElement.textContent = product;
            industryByProductElement.textContent = byProduct;
            industryRawMaterialElement.textContent = rawMaterial;
            industryContactNameElement.textContent = contactName;
            industryContactPhoneElement.textContent = contactPhone;
            industryContactEmailElement.textContent = contactEmail;
            industryImageElement.src = image;

            detailsContainer.style.display = 'block';
        }
    });
});

</script>


@endsection

