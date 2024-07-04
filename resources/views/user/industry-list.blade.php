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
                                                <td>{{ $industry->area }}</td>
                                                <td>
                                                    <div class="d-flex">
                                                        @if (!empty($industry->image))
                                                            <a href="{{ $industry->image }}"
                                                                class="btn btn-primary shadow btn-xs sharp me-1"
                                                                data-bs-toggle="modal" data-bs-target="#addindustry">
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

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Industries Details</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">

                                    <!--Tab slider End-->
                                    <div class="col-xl-9 col-lg-6  col-md-6 col-xxl-7 col-sm-12">
                                        <div class="product-detail-content">
                                            <!--Product details-->
                                            <div class="new-arrival-content mt-md-0 mt-3 pr">
                                                <h4>{{ $industry->industry_name }}</h4>
                                                <div class="d-table mb-2">
                                                    <p class="price float-start d-block"></p>
                                                </div>
                                                <p class="text-black">Email: <span class="item">{{ $industry->email }}</p>
                                                <p class="text-black">Phone number: <span
                                                        class="item">{{ $industry->contact_no }}</span> </p>
                                                <p class="text-black">Address: <span
                                                        class="item">{{ $industry->address }}</span></p>
                                                <p class="text-black">Area: <span
                                                        class="item">{{ $industry->area }}</span></p>
                                                <p class="text-black">Types of Industry: <span
                                                        class="item">{{ $industry->category_id }}</span></p>

                                            </div>
                                        </div>
                                        <hr>
                                        <div class="product-detail-content">
                                            <!--Product details-->
                                            <div class="new-arrival-content mt-md-0 mt-3 pr">
                                                <p class="text-black">Product:<span class="item">{{ $industry->product }}
                                                </p>
                                                <p class="text-black">By Product: <span
                                                        class="item">{{ $industry->by_product }}</span> </p>
                                                <p class="text-black">Raw Material: <span
                                                        class="item">{{ $industry->raw_material }}</span></p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="product-detail-content">
                                            <!--Product details-->
                                            <div class="new-arrival-content mt-md-0 mt-3 pr">
                                                <p class="text-black">Contact Name:<span class="item">XYZ
                                                </p>
                                                <p class="text-black">Phone: <span
                                                        class="item"></span> </p>
                                                <p class="text-black">Email: <span
                                                        class="item">{{ $industry->raw_material }}</span></p>
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

@endsection
