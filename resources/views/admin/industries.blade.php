@extends('admin.master')
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


            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Industry Details</h4>

                        <div class="text-end">
                            <a href="/admin/add-industries"><button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg">Add Industries</button></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Nav tabs -->
                        <div class="default-tab">

                            <!-- <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                                <form method="POST" action="/admin/addIndustryInBook" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title"> Add New Industry</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-12 d-flex justify-content-center">
                                                        <img id="selected_image" src="https://p7.hiclipart.com/preview/831/479/764/ibooks-computer-icons-ios-apple-app-store-sparito-lo-scaffale-sono-rimaste-le-pagine-aperte-i-colori-cambiano.jpg" style="width: -webkit-fill-available;height:200px">
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="mb-3">
                                                    <label for="editBookImage" class="form-label">Advertisment Image</label>
                                                    <input type="file" class="form-control" id="editBookImage" name="image" accept="image/*" onchange="loadFile(event)">
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6 mb-2">
                                                        <label>Category</label>
                                                        <select id="category_id" name="category_id" class="form-control" required>
                                                            <option value="" disabled selected>Select Category</option>
                                                            @foreach($categorys as $category)
                                                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        <div id="category-exists-message" style="display: none; color: red;">This category already exists.</div>
                                                    </div>
                                                    <br>
                                                    <div class="col-lg-6 mb-2">
                                                        <label>Area</label>
                                                        <select id="category_id" name="category_id" class="form-control" required>
                                                            <option value="" disabled selected>Select Area</option>
                                                            @foreach($areas as $area)
                                                            <option value="{{ $category->id }}">{{ $area->area_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-6 mb-2">
                                                        <div class="form-group">
                                                            <br>
                                                            <label>Industry Name</label>
                                                            <input class="form-control" name="industry_name" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mb-2">
                                                        <div class="form-group">
                                                            <br>
                                                            <label>Contact Number</label>
                                                            <input class="form-control" name="contact_no" type="text">
                                                        </div>
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

                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title"> Add Factory Information</h5>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <br>
                                                    <label>Address</label>
                                                    <textarea class="form-control" name="address"></textarea>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6 mb-2">
                                                        <div class="form-group">
                                                            <br>
                                                            <label>Contact</label>
                                                            <input class="form-control" name="contact_no" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mb-2">
                                                        <div class="form-group">
                                                            <br>
                                                            <label>Email</label>
                                                            <input class="form-control" name="email" type="email">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mb-2">
                                                        <div class="form-group">
                                                            <br>
                                                            <label>Website</label>
                                                            <input class="form-control" name="website" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="industryFields">
                                        <!-- Container for dynamically added fields 
                                    </div>

                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-light" onclick="addIndustryField()">Add Contacts</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>

                                        </div>
                                    </div>
                                </form>
                            </div> -->

                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="profile">
                                    <div class="pt-4">
                                        <div class="col-xl-12 col-lg-12 col-xxl-12 col-sm-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="table-responsive recentOrderTable">
                                                        <table id="example3" class="table verticle-middle table-responsive-md">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">Industry Name</th>
                                                                    <th scope="col">Category</th>
                                                                    <th scope="col">Area</th>
                                                                    <th scope="col" class="text-end">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($industryDetails as $industry)
                                                                <tr>
                                                                    <td>{{$industry->industry_name}}</td>
                                                                    <td>{{$industry->category}}</td>
                                                                    <td>{{$industry->category}}</td>
                                                                    <td class="text-end">
                                                                        <span>
                                                                            <a href="javascript:void()" class="me-4" data-bs-toggle="tooltip" data-placement="top" title="Edit">
                                                                                <i class="fa fa-pencil color-muted"></i>
                                                                            </a>

                                                                            <a href="/admin/delete-category/{{ $category->uuid }}" data-bs-toggle="tooltip" data-placement="top" title="Close"><i class="fas fa-times color-danger"></i>
                                                                            </a>
                                                                        </span>
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
                '<h5 class="modal-title"> Factory Contact Details</h5>' +
                '<i style="float: right;" onclick="removeIndustryField(this)" class="fa fa-minus"></i>' +
                '</div>' +

                '<div class="row">' +
                '<div class="col-lg-6 mt-3 mt-lg-4">' +
                '<div class="form-group">' +
                '<label>Phone</label>' +
                '<input class="form-control" name="unit_name[]" type="text">' +
                '</div>' +

                '</div>' +
                '<div class="col-lg-6 mt-3 mt-lg-4">' +
                '<div class="form-group">' +
                '<label>Mobile</label>' +
                '<input class="form-control" name="unit_contact_no[]" type="text">' +
                '</div>' +
                '</div>' +
                '</div>' +

                '<div class="row">' +
                '<div class="col-lg-12 mt-3 mt-lg-4">' +
                '<div class="form-group">' +
                '<label>Fax</label>' +
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