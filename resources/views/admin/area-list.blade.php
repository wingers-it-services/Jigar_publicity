@extends('admin.master')
@section('title', 'Areas')
@section('content')

    <!--************
                                                Content body start
                                    *************-->
    <div class="content-body ">
        <!-- row -->
        <div class="container-fluid">
            <div class="row">
                <!-- Modal -->
                <div class="modal fade" id="addNewPlan">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add New Area</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal">
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="/admin/industries-area">
                                    @csrf
                                    <div class="form-group">
                                        <label>Area Name</label>
                                        <input type="text" id="category_name" name="area_name" class="form-control"
                                            required>
                                    </div>

                                    <button class="btn btn-primary" style=" width: -webkit-fill-available; ">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="modal fade" id="editArea">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add New Area</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal">
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="/admin/update-area">
                                    @csrf
                                    <input type="hidden" id="edit_uuid" name="uuid" class="form-control">
                                    <div class="form-group">
                                        <label>Area Name</label>
                                        <input type="text" id="edit_area_name" name="area_name" class="form-control"
                                            required>
                                    </div>
                                    <button class="btn btn-primary" style="width: -webkit-fill-available;">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-xl-12 col-xxl-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header d-sm-flex d-block pb-0 border-0">
                                    <div class="me-auto pe-3">
                                        <h4 class="text-black fs-20">Industrial Area List</h4>
                                    </div>

                                    <div class="dropdown mt-sm-0 mt-3">
                                        <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#addNewPlan"
                                            class="btn btn-outline-primary rounded">Add New Areas</a>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example3"
                                            class="table table-bordered table-striped verticle-middle table-responsive-sm">
                                            <thead>

                                                <tr>
                                                    <th scope="col">Area</th>
                                                    <th scope="col" class="text-end">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($areas as $area)
                                                    <tr>
                                                        <td>{{ $area->area_name }}</td>
                                                        </td>
                                                        <td class="text-end">
                                                            <span>
                                                                <a href="javascript:void(0);" class="me-4 edit-area-btn"
                                                                    data-bs-toggle="modal" data-bs-target="#editArea"
                                                                    data-uuid="{{ $area->uuid }}"
                                                                    data-area_name="{{ $area->area_name }}" title="Edit">
                                                                    <i class="fa fa-pencil color-muted"></i>
                                                                </a>

                                                                <a href="javascript:void(0);"
                                                                    onclick="confirmDelete('{{ $area->uuid }}')"
                                                                    data-bs-toggle="tooltip" data-placement="top"
                                                                    title="Close">
                                                                    <i class="fas fa-times color-danger"></i>
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var editButtons = document.querySelectorAll('.edit-area-btn');
            editButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    var uuid = this.getAttribute('data-uuid');
                    var areaName = this.getAttribute('data-area_name');
                    document.getElementById('edit_uuid').value = uuid;
                    document.getElementById('edit_area_name').value = areaName;
                });
            });
        });

        function confirmDelete(uuid) {
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
                    window.location.href = '/admin/delete-area/' + uuid;
                }
            });
        }
    </script>
    @include('CustomSweetAlert');
@endsection
