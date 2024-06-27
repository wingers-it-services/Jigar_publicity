@extends('admin.master')
@section('title','Dashboard')
@section('content')

<!--************
            Content body start
        *************-->
       <!-- Content body start -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="editUserForm" action="{{ route('updateUser') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="uuid" id="editUsername">
                    <div class="mb-3 row">
                        <label class="col-lg-2 col-form-label" for="editUsername">Username
                            <span class="text-danger">*</span>
                        </label>
                        <div class="col-lg-5">
                            <input type="text" class="form-control" id="editUsername" name="username"
                                placeholder="Enter a Username.." required>
                            <div class="invalid-feedback">
                                Please enter a name.
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-lg-2 col-form-label" for="editName">Name
                            <span class="text-danger">*</span>
                        </label>
                        <div class="col-lg-5">
                            <input type="text" class="form-control" id="editName" name="name"
                                placeholder="Enter a name.." required>
                            <div class="invalid-feedback">
                                Please enter a name.
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-lg-2 col-form-label" for="editEmail">Email
                            <span class="text-danger">*</span>
                        </label>
                        <div class="col-lg-5">
                            <input type="text" class="form-control" id="editEmail" name="email"
                                placeholder="Enter an email.." required>
                            <div class="invalid-feedback">
                                Please enter an email.
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-lg-2 col-form-label" for="editPassword">Password
                            <span class="text-danger">*</span>
                        </label>
                        <div class="col-lg-5">
                            <input type="text" class="form-control" id="editPassword" name="password"
                                placeholder="Enter a password.." required>
                            <div class="invalid-feedback">
                                Please enter a password.
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-lg-2 col-form-label" for="editPhone">Phone
                            <span class="text-danger">*</span>
                        </label>
                        <div class="col-lg-5">
                            <input type="text" class="form-control" id="editPhone" name="phone"
                                placeholder="Enter a phone.." required>
                            <div class="invalid-feedback">
                                Please enter a phone number.
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-lg-2 col-form-label" for="editWebsite">Website
                            <span class="text-danger">*</span>
                        </label>
                        <div class="col-lg-5">
                            <input type="text" class="form-control" id="editWebsite" name="website"
                                placeholder="http://example.com" required>
                            <div class="invalid-feedback">
                                Please enter a website.
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-lg-4 col-form-label" for="editCompanyName">Company Name
                            <span class="text-danger">*</span>
                        </label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" id="editCompanyName" name="company_name"
                                placeholder="Enter a Company Name.." required>
                            <div class="invalid-feedback">
                                Please enter a company name.
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-lg-4 col-form-label" for="editCompanyAddress">Company Address
                            <span class="text-danger">*</span>
                        </label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" id="editCompanyAddress" name="company_address"
                                placeholder="Enter a Company Address.." required>
                            <div class="invalid-feedback">
                                Please enter a company address.
                            </div>
                        </div>
                    </div>

                    <label class="col-lg-4 col-form-label" for="editNoOfDevice">No of Device Allowed</label>
                    <div class="col-lg-6">
                        <select class="default-select wide form-control" id="editNoOfDevice" name="no_of_device">
                            <option data-display="Select">Please select</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                        <div class="invalid-feedback">
                            Please select a number.
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display min-w850">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Company Name</th>
                                        <th>Contact Number</th>
                                        <th>Company Address</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->company_name }}</td>
                                        <td><a href="javascript:void(0);"><strong>{{ $user->phone }}</strong></a></td>
                                        <td>{{ $user->company_address }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="/admin/update-user" class="btn btn-primary shadow btn-xs sharp me-1 edit-book-button" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg" data-book='@json($user)'>
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
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
        </div>
    </div>
</div>

<!--************
            Content body end
        *************-->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var editButtons = document.querySelectorAll('.edit-book-button');
                editButtons.forEach(function(button) {
                    button.addEventListener('click', function() {
                        var user = JSON.parse(this.dataset.book);
                        document.getElementById('editUsername').value = user.uuid;
                        document.getElementById('editName').value = user.name;
                        document.getElementById('editEmail').value = user.email;
                        document.getElementById('editPhone').value = user.phone;
                        document.getElementById('editWebsite').value = user.website;
                        document.getElementById('editCompanyName').value = user.company_name;
                        document.getElementById('editCompanyAddress').value = user.company_address;
                        document.getElementById('editNoOfDevice').value = user.no_of_device;

                        // Populate more fields as necessary
                    });
                });
            });
            </script>
@endsection
