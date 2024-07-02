@extends('user.master')
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
            <form id="editUserForm" action="" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">

                    <div class="row">
                        <input type="hidden" name="uuid" id="editUserId">
                        <div class="col-lg-6 mb-2">
                            <div class="form-group">
                                <label class="text-label">Username<span class="required">*</span></label>
                                <input type="text" class="form-control" id="editUsername" name="username"
                                placeholder="Enter a Username.." required>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-2">
                            <div class="form-group">
                                <label class="text-label">Name<span class="required">*</span></label>
                                <input type="text" class="form-control" id="editName" name="name"
                                placeholder="Enter a name.." required>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-2">
                            <div class="form-group">
                                <label class="text-label">Email<span class="required">*</span></label>
                                <input type="text" class="form-control" id="editEmail" name="email"
                                placeholder="Enter an email.." required>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-2">
                            <div class="form-group">
                                <label class="text-label">Password<span class="required">*</span></label>
                                <input type="text" class="form-control" id="editPassword" name="password"
                                placeholder="Enter a password.." required>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-2">
                            <div class="form-group">
                                <label class="text-label">Phone Number<span class="required">*</span></label>
                                <input type="text" class="form-control" id="editPhone" name="phone"
                                placeholder="Enter a phone.." required>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-2">
                            <div class="form-group">
                                <label class="text-label">Website<span class="required">*</span></label>
                                <input type="text" class="form-control" id="editWebsite" name="website"
                                placeholder="http://example.com" required>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-2">
                            <div class="form-group">
                                <label class="text-label">Company Name<span class="required">*</span></label>
                                <input type="text" class="form-control" id="editCompanyName" name="company_name"
                                placeholder="Enter a Company Name.." required>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-2">
                            <div class="form-group">
                                <label class="text-label">Company Address<span class="required">*</span></label>
                                <input type="text" class="form-control" id="editCompanyAddress" name="company_address"
                                placeholder="Enter a Company Address.." required>
                            </div>
                        </div>
                        <div class="col-lg-12 mb-3">
                            <div class="form-group">
                                <label class="text-label">No Of Device<span class="required">*</span></label>
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
                            </div>
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
                                        {{-- <th>Action</th> --}}
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td>Muskan</td>
                                        <td>Wits</td>
                                        <td><a href="javascript:void(0);"><strong>1234567890</strong></a></td>
                                        <td>Yogeshwar nagar</td>

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

<!--************
            Content body end
        *************-->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var editButtons = document.querySelectorAll('.edit-book-button');
                editButtons.forEach(function(button) {
                    button.addEventListener('click', function() {
                        var user = JSON.parse(this.dataset.book);
                        document.getElementById('editUserId').value = user.uuid;
                        document.getElementById('editUsername').value = user.username;
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
