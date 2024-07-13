@extends('admin.master')
@section('title', 'Dashboard')
@section('content')

<!--************
                                                        Content body start
                                            *************-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<div class="content-body ">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="card-header d-sm-flex d-block pb-0 border-0">
                <div class="me-auto pe-3">
                    <h4 class="text-black fs-20">User Details</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-3 col-lg-6  col-md-6 col-xxl-3">
                                    <!-- Tab panes -->
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                            <img class="img-fluid rounded " loading="lazy" alt="image" src="{{ asset($users->image) }}" alt="" style="width: 200px; height: 245px;">
                                        </div>
                                    </div>
                                </div>
                                <!--Tab slider End-->
                                <div class="col-xl-9 col-lg-6  col-md-6 col-xxl-7 col-sm-12">
                                    <div class="product-detail-content">
                                        <!--User details-->
                                        <div class="new-arrival-content mt-md-0 mt-3 pr">
                                            <h4>{{ $users->name }}</h4>
                                            <p class="text-black">Email: <span class="item"> {{ $users->email }}</p>
                                            <p class="text-black">Phone number: <span class="item">{{ $users->phone }}</span> </p>
                                            <p class="text-black">Gender: <span class="item">{{ $users->gender }}</span></p>
                                            <p class="text-black">Company Name: <span class="item">{{ $users->company_name }}</span></p>
                                            <p class="text-black">Company Address: <span class="item">{{ $users->company_address }}</span></p>
                                            <p class="text-black">Device: <span class="item">{{ $users->no_of_device }}</span></p>
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
                        <h4 class="card-title">User Details</h4>
                    </div>
                    <div class="card-body">
                        <!-- Nav tabs -->
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example3" class="display min-w850">
                                            <thead>
                                                <tr>
                                                    <th>Device</th>
                                                    <th>Browser</th>
                                                    <th>IP Address</th>
                                                    <th>Status</th>
                                                    <th>Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <tr>
                                                    <td>o</td>
                                                    <td>o</td>
                                                    <td>127.0.0.1:8001</td>
                                                    <td><span class="badge light badge-warning">InActive</span></td>



                                                    <td>2011/04/25</td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <a href="#" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fa fa-pencil"></i></a>
                                                            <a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>

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


<!--************
                                                        Content body end
                                            *************-->
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