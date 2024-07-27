@extends('admin.master')
@section('title', 'Dashboard')
@section('content')

<!--**********************************
                            Content body start
                        ***********************************-->
<!-- Bootstrap CSS -->
{{-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> --}}
<!-- jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"><i class="fas fa-ad"></i> Advertisements</h4>

                        <div class="text-end">
                            <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#addIndustryModal">Add
                                Advertistment</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Nav tabs -->
                        <div class="default-tab">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="profile" role="tabpanel">
                                    <div class="pt-4">
                                        <div class="col-xl-12 col-lg-12 col-xxl-12 col-sm-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="table-responsive recentOrderTable">
                                                        <table id="example3" class="table verticle-middle table-responsive-md">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col"> Image</th>
                                                                    <th> Image Type </th>
                                                                    <th scope="col" class="text-end">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($advertisments as $advertisment)
                                                                <tr>
                                                                    <td> <img class="img-fluid rounded " src="{{ asset($advertisment->advertisment_image) }}" style="width:200px;" alt=""></td>
                                                                    <td>{{$advertisment->image_type}}</td>
                                                                    <td class="text-end">
                                                                        <span>
                                                                            <a onclick="confirmDelete('{{ $advertisment->id }}')" data-bs-toggle="tooltip" data-placement="top" title="Close">
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
                            <!-- Modal -->
                            <div class="modal fade" id="addIndustryModal" tabindex="-1" aria-labelledby="addIndustryModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="addIndustryModalLabel">Add Advertisement</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal">
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="needs-validation" action="{{ route('addAdvertisment') }}" method="POST" enctype="multipart/form-data" novalidate>
                                                @csrf
                                                <div class="form-group">
                                                    <label for="industryImage">Image</label>
                                                    <input type="file" class="form-control" id="industryImage" accept="image/*" name="advertisment_image" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Image Type</label>
                                                    <select id="image_type" name="image_type" class="form-control" required>
                                                        <option value="" disabled selected>Select Image Type</option>
                                                        <option value="horizontal">Horizontal</option>
                                                        <option value="vertical">Vertical</option>
                                                    </select>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End of Modal -->
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

<!-- Data Table JS -->
<script src="{{ asset('path/to/datatables.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#example3').DataTable();
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
            window.location.href = '/admin/delete-advertisment/' + id;
        }
    });
}
</script>

@include('CustomSweetAlert')
@endsection
