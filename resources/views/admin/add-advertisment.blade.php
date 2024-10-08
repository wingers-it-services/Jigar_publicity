@extends('admin.master')
@section('title', 'Advertisements')
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

    <link href="https://unpkg.com/cropperjs/dist/cropper.css" rel="stylesheet">
    <script src="https://unpkg.com/cropperjs"></script>

    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"><i class="fas fa-ad"></i> Advertisements</h4>

                            <div class="text-end">
                                <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal"
                                    data-bs-target="#addIndustryModal">Add
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
                                                            <table id="example3"
                                                                class="table verticle-middle table-responsive-md">
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
                                                                            <td> <img class="img-fluid rounded "
                                                                                    src="{{ asset($advertisment->advertisment_image) }}"
                                                                                    style="width:200px;" alt="">
                                                                            </td>
                                                                            <td>{{ $advertisment->image_type }}</td>
                                                                            <td class="text-end">
                                                                                <span>
                                                                                    <a onclick="confirmDelete('{{ $advertisment->id }}')"
                                                                                        data-bs-toggle="tooltip"
                                                                                        data-placement="top" title="Close">
                                                                                        <i
                                                                                            class="fas fa-times color-danger"></i>
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
                                <div class="modal fade" id="addIndustryModal" tabindex="-1"
                                    aria-labelledby="addIndustryModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="addIndustryModalLabel">Add Advertisement</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="needs-validation" id="advertisementForm"
                                                    action="{{ route('addAdvertisment') }}" method="POST"
                                                    enctype="multipart/form-data" novalidate>
                                                    @csrf
                                                    <div class="d-flex align-items-center">
                                                        <!-- Image Preview Section -->
                                                        <div id="imagePreview" class="mt-2 text-center"
                                                            style="padding: 10px; flex: 1;">
                                                            <img id="previewImage" src="#" alt="Image Preview"
                                                                class="img-fluid"
                                                                style="max-width: 100%; max-height: 300px; width: auto; height: auto; display: none;">
                                                        </div>
                                                    </div>

                                                    <div class="form-group mt-3">
                                                        <label for="industryImage">Image</label>
                                                        <input type="file" class="form-control" id="industryImage"
                                                            accept="image/*" name="advertisment_image" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Image Type</label>
                                                        <select id="image_type" name="image_type" class="form-control"
                                                            required>
                                                            <option value="" disabled selected>Select Image Type
                                                            </option>
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


                                <!-- JavaScript to handle image preview -->
                                <script>
                                    document.getElementById('industryImage').addEventListener('change', function(event) {
                                        const input = event.target;
                                        const previewImage = document.getElementById('previewImage');
                                        const imagePreviewContainer = document.getElementById('imagePreview');

                                        if (input.files && input.files[0]) {
                                            const reader = new FileReader();
                                            reader.onload = function(e) {
                                                previewImage.src = e.target.result;
                                                imagePreviewContainer.style.display = 'block';
                                            };
                                            reader.readAsDataURL(input.files[0]);
                                        } else {
                                            imagePreviewContainer.style.display = 'none';
                                        }
                                    });
                                </script>
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let cropper;
            const industryImageInput = document.getElementById('industryImage');
            const previewImage = document.getElementById('previewImage');
            const form = document.getElementById('advertisementForm');
            const imageTypeSelect = document.getElementById('image_type');

            industryImageInput.addEventListener('change', function(event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        previewImage.src = e.target.result;
                        previewImage.style.display = 'block';

                        if (cropper) {
                            cropper.destroy(); // Destroy the previous cropper instance
                        }

                        cropper = new Cropper(previewImage, {
                            aspectRatio: getAspectRatio(),
                            viewMode: 1,
                            responsive: true,
                            autoCropArea: 1,
                            zoomable: false,
                            movable: false,
                        });

                    };
                    reader.readAsDataURL(file);
                }
            });

            imageTypeSelect.addEventListener('change', function() {
                if (cropper) {
                    cropper.setAspectRatio(getAspectRatio()); // Update aspect ratio on type change
                }
            });

            form.addEventListener('submit', async function(event) {
                event.preventDefault();

                if (cropper) {
                    cropper.getCroppedCanvas().toBlob(async function(blob) {
                        const formData = new FormData(form);
                        formData.append('advertisment_image', blob, 'cropped_image.jpg');

                        try {
                            const response = await fetch(form.action, {
                                method: 'POST',
                                body: formData,
                            });

                            const message = response.ok ? {
                                icon: 'success',
                                title: 'Success',
                                text: 'Advertisement image added successfully!'
                            } : {
                                icon: 'error',
                                title: 'Error',
                                text: 'Error while adding advertisement image!'
                            };

                            const result = await Swal.fire(message);

                            if (result.isConfirmed) {
                                location.reload();
                            }
                        } catch (error) {
                            console.error('Error uploading image:', error);
                        }
                    });
                }
            });

            function getAspectRatio() {
                const imageType = imageTypeSelect.value;
                return imageType === 'vertical' ? 2 / 3 : 3 / 2;
            }
        });
    </script>

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

        (function() {
            'use strict';
            window.addEventListener('load', function() {
                var forms = document.getElementsByClassName('needs-validation');
                Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
@endsection
