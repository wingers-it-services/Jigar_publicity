@extends('admin.master')
@section('title', 'Dashboard')
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
                                    <input type="text" id="category_name" name="area_name" class="form-control" required>
                                </div>

                                <button class="btn btn-primary" style=" width: -webkit-fill-available; ">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

            <div class="modal fade" id="editCategory">
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
                                    <input type="text" id="area_name" value="" name="area_name" class="form-control" required>
                                </div>

                                <button class="btn btn-primary" style=" width: -webkit-fill-available; ">Submit</button>
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
                                    <h4 class="text-black fs-20">Area List</h4>
                                </div>

                                <div class="dropdown mt-sm-0 mt-3">
                                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#addNewPlan" class="btn btn-outline-primary rounded">Add New Areas</a>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped verticle-middle table-responsive-sm">
                                        <thead>
                                          
                                            <tr>
                                                <th scope="col">Area</th>
                                                <th scope="col">No of Books</th>
                                                <th scope="col" class="text-end">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($areas as $area)
                                            <tr>
                                                <td>{{ $area->area_name }}</td>
                                                <td>0</td>
                                                </td>
                                                <td class="text-end">
                                                    <span>
                                                        <a href="javascript:void()" class="me-4" data-bs-toggle="modal" data-placement="top" data-bs-target="#editCategory" title="Edit">
                                                            <i class="fa fa-pencil color-muted"></i>
                                                        </a>

                                                        <a href="/admin/delete-category/{{ $area->uuid }}" data-bs-toggle="tooltip" data-placement="top" title="Close"><i class="fas fa-times color-danger"></i>
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
<!--************
                                Content body end
                            *************-->

@endsection