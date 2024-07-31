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
                            <h4 class="card-title">Industry List</h4>

                            <div class="text-end">
                                <a href="/admin/add-industries"><button type="button" class="btn btn-primary mb-2"
                                        data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg">Add
                                        Industries</button></a>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Nav tabs -->
                            <div class="default-tab">
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="profile">
                                        <div class="pt-4">
                                            <div class="col-xl-12 col-lg-12 col-xxl-12 col-sm-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="table-responsive recentOrderTable">
                                                            <table id="example3"
                                                                class="table verticle-middle table-responsive-md">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col">Industry Name</th>
                                                                        <th scope="col">Category</th>
                                                                        <th scope="col">Area</th>
                                                                        <th scope="col" class="text-end">Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($industryDetails as $industry)
                                                                        <tr>
                                                                            <td>{{ $industry->industry_name }}</td>
                                                                            <td>{{ $industry->category ? $industry->category->category_name : 'Not Defined' }}
                                                                            </td>
                                                                            <td>{{ $industry->area ? $industry->area->area_name : 'Not Defined' }}
                                                                            </td>
                                                                            <td class="text-end">
                                                                                <span>
                                                                                    <a href="/admin/update-industries/{{ $industry->uuid }}"
                                                                                        class="me-4"
                                                                                        data-bs-toggle="tooltip"
                                                                                        data-placement="top" title="Edit">
                                                                                        <i
                                                                                            class="fa fa-pencil color-muted"></i>
                                                                                    </a>

                                                                                    <a onclick="confirmDelete('{{ $industry->id }}')"
                                                                                        data-bs-toggle="tooltip"
                                                                                        data-placement="top"
                                                                                        title="Close"><i
                                                                                            class="fas fa-times color-danger"></i>
                                                                                    </a>
                                                                                </span>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="d-flex justify-content-end">
                                                            <form action="{{ route('export.industries') }}" method="POST">
                                                                @csrf
                                                                <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg">Download data</button>
                                                            </form>
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

            function confirmDelete(id) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'Are you sure you want to delete this area? It will delete the related industries.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '/admin/delete-industries/' + id;
                    }
                });
            }
        </script>
        @include('CustomSweetAlert');
    @endsection
