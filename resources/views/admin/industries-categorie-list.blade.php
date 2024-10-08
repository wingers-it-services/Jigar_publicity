@extends('admin.master')
@section('title', 'Categories')
@section('content')

    <!-- Content body start -->
    <div class="content-body ">
        <div class="container-fluid">
            <div class="row">
                <!-- Add New Category Modal -->
                <div class="modal fade" id="addNewPlan">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add New Industries Categories</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <form class="needs-validation" method="POST" action="/admin/industries-categories">
                                    @csrf
                                    <div class="form-group">
                                        <label>Category Name</label>
                                        <input type="text" id="category_name" name="category_name" class="form-control"
                                            required>
                                    </div>
                                    <button class="btn btn-primary" style="width: -webkit-fill-available;">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Edit Category Modal -->
                <div class="modal fade" id="editCategory">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Update Industries Categories</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="/admin/update-category">
                                    @csrf
                                    <input type="hidden" id="edit_uuid" name="uuid" class="form-control">
                                    <div class="form-group">
                                        <label>Category Name</label>
                                        <input type="text" id="edit_category_name" name="category_name"
                                            class="form-control" required>
                                    </div>
                                    <button class="btn btn-primary" style="width: -webkit-fill-available;">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Categories List -->
                <div class="col-xl-12 col-xxl-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header d-sm-flex d-block pb-0 border-0">
                                    <div class="me-auto pe-3">
                                        <h4 class="text-black fs-20">Industries Categories List</h4>
                                    </div>
                                    <div class="dropdown mt-sm-0 mt-3">
                                        <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#addNewPlan"
                                            class="btn btn-outline-primary rounded">Add New Categories</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example3"
                                            class="table table-bordered table-striped verticle-middle table-responsive-sm">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Categories</th>
                                                    <th scope="col" class="text-end">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($industriesCategorie as $subscription)
                                                    <tr>
                                                        <td>{{ $subscription->category_name }}</td>
                                                        <td class="text-end">
                                                            <span>
                                                                <a href="javascript:void(0);" class="me-4 edit-category-btn"
                                                                    data-bs-toggle="modal" data-bs-target="#editCategory"
                                                                    data-uuid="{{ $subscription->uuid }}"
                                                                    data-category_name="{{ $subscription->category_name }}"
                                                                    title="Edit">
                                                                    <i class="fa fa-pencil color-muted"></i>
                                                                </a>

                                                                <a onclick="confirmDelete('{{ $subscription->uuid }}')"
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

    <!-- Content body end -->

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var editButtons = document.querySelectorAll('.edit-category-btn');
            editButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    var uuid = this.getAttribute('data-uuid');
                    var categoryName = this.getAttribute('data-category_name');
                    document.getElementById('edit_uuid').value = uuid;
                    document.getElementById('edit_category_name').value = categoryName;
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
                    window.location.href = '/admin/delete-category/' + uuid;
                }
            });
        }

        (function() {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>
    @include('CustomSweetAlert');
@endsection
