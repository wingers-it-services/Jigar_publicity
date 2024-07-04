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
                                        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                            <img class="img-fluid rounded " src="https://www.jigarpublicity.com/assets/img/jigar-publicity-logo.png" alt="">
                                        </div>

                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-6  col-md-6 col-xxl-5 ">
                                    <!-- Tab panes -->
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                            <img class="img-fluid rounded " src="https://www.jigarpublicity.com/assets/img/jigar-publicity-logo.png" alt="">
                                        </div>

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
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <!-- Tab panes -->
                                                    <div class="tab-content" id="myTabContent">
                                                        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                                            <img class="img-fluid rounded" src="" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Tab slider End -->
                                                <div class="col-12">
                                                    <div class="product-detail-content">
                                                        <img class="img-fluid rounded " src="/images/adevertisting.jpg"style= "width=50px;" alt="">
                                                        {{-- <div class="new-arrival-content mt-md-0 mt-3 pr">
                                                            <img class="img-fluid rounded " src="https://www.jigarpublicity.com/assets/img/jigar-publicity-logo.png" alt="">

                                                        </div> --}}
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
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Industry List</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display min-w850">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Industry Name</th>
                                        <th>Category</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td><img width="80" src="https://www.jigarpublicity.com/assets/img/jigar-publicity-logo.png" alt=""></td>
                                        <td>Book name</td>
                                        <td>Pharma</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="#" class="btn btn-primary shadow btn-xs sharp me-1" data-bs-toggle="modal" data-bs-target="#addindustry">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>

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
                                    <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                        <img class="img-fluid rounded " src="https://www.jigarpublicity.com/assets/img/jigar-publicity-logo.png" alt="">
                                    </div>

                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6  col-md-6 col-xxl-5 ">
                                <!-- Tab panes -->
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                        <img class="img-fluid rounded " src="https://www.jigarpublicity.com/assets/img/jigar-publicity-logo.png" alt="">
                                    </div>

                                </div>
                            </div>


                        </div>

                    </div>

                </div>
            </div>
            <div class="col-lg-12">
            
              
                    @csrf
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h5 class="modal-title"> Add New Industry</h5>
                                <input type="hidden" value="" name="book_id">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row emial-setup" style="display: block;text-align: center;">
                                    <div class="col-lg-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <div class="mailclinet" id="mailclinet">
                                                <img id="selected_image" src="https://p7.hiclipart.com/preview/831/479/764/ibooks-computer-icons-ios-apple-app-store-sparito-lo-scaffale-sono-rimaste-le-pagine-aperte-i-colori-cambiano.jpg" style="width: 200px;height:200px">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="mb-3">
                                        <label for="staff_photo" class="form-label">Book Image</label>
                                        <input class="form-control form-control-sm" id="image" name="image" onchange="loadFile(event)" accept="image/*" type="file">
                                    </div>
                                </div>
                                <label>Category</label>
                                <select id="category_id" name="category_id" class="form-control" required>
                                    <option value="" disabled selected>Select Category</option>

                                    <option value=""></option>

                                </select>
                                <div id="category-exists-message" style="display: none; color: red;">This category already exists.</div>

                                <div class="form-group">
                                    <br>
                                    <label>Industry Name</label>
                                    <input class="form-control" name="industry_name" type="text">
                                </div>
                                <div class="form-group">
                                    <br>
                                    <label>Contact Number</label>
                                    <input class="form-control" name="contact_no" type="text">
                                </div>
                                <div class="form-group">
                                    <br>
                                    <label>Address</label>
                                    <textarea class="form-control" name="address"></textarea>
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