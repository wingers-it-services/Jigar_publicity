@extends('admin.master')
@section('title', 'Dashboard')
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
                    <div class="row">
                        <input type="hidden" name="uuid" id="editUserId">
                        {{-- <div class="col-lg-6 mb-2">
                                <div class="form-group">
                                    <label class="text-label">Username<span class="required">*</span></label>
                                    <input type="text" class="form-control" id="editUsername" name="username"
                                        placeholder="Enter a Username.." required>
                                </div>
                            </div> --}}

                        <div class="col-lg-6 mb-2">
                            <div class="form-group">
                                <label class="text-label">Email<span class="required">*</span></label>
                                <input type="text" class="form-control" id="editEmail" name="email" placeholder="Enter an email.." required>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-2">
                            <div class="form-group">
                                <label class="text-label">Password<span class="required">*</span></label>
                                <input type="text" class="form-control" id="editPassword" name="password" placeholder="Enter a password.." required>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-2">
                            <div class="form-group">
                                <label class="text-label">Name<span class="required">*</span></label>
                                <input type="text" class="form-control" id="editName" name="name" placeholder="Enter a name.." required>
                            </div>
                        </div>

                        <div class="col-lg-6 mb-2">
                            <div class="form-group">
                                <label class="text-label">Phone Number<span class="required">*</span></label>
                                <input type="text" class="form-control" id="editPhone" name="phone" placeholder="Enter a phone.." required>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-2">
                            <div class="form-group">
                                <label class="text-label">Gender<span class="required">*</span></label>
                                <div class="gender-dropdown-container"></div>
                            </div>


                        </div>
                        <div class="col-lg-6 mb-2">
                            <div class="form-group">
                                <label class="text-label">Website<span class="required">*</span></label>
                                <input type="text" class="form-control" id="editWebsite" name="website" placeholder="http://example.com" required>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-2">
                            <div class="form-group">
                                <label class="text-label">Company Name<span class="required">*</span></label>
                                <input type="text" class="form-control" id="editCompanyName" name="company_name" placeholder="Enter a Company Name.." required>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-2">
                            <div class="form-group">
                                <label class="text-label">Company Address<span class="required">*</span></label>
                                <input type="text" class="form-control" id="editCompanyAddress" name="company_address" placeholder="Enter a Company Address.." required>
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
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">User List</a></li>
            </ol>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display min-w850">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Company Name</th>
                                        <th>Contact Number</th>
                                        <th>Company Address</th>
                                        <th>No Of Device</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                    <tr>
                                        <td>
                                            <img width="80" src="{{ asset($user->image) }}" style="border-radius: 45px;width: 60px;height: 60px;" loading="lazy" alt="image">
                                        </td>
                                        <td> {{ $user->name }} </td>
                                        <td>{{ $user->company_name }}</td>
                                        <td><a href="javascript:void(0);"><strong>{{ $user->phone }}</strong></a>
                                        </td>
                                        <td>{{ $user->company_address }}</td>
                                        <td>{{ $user->no_of_device }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="/admin/user-details/{{ $user->uuid }}" class="btn btn-primary shadow btn-xs sharp me-1">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <a href="/admin/update-user" class="btn btn-primary shadow btn-xs sharp me-1 edit-book-button" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg" data-book='@json($user)'>
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <a href="/admin/delete-user/{{ $user->uuid }}" class="btn btn-danger shadow btn-xs sharp">
                                                    <i class="fa fa-trash"></i>
                                                </a>
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

                console.log(user.gender); // Ensure the gender value is being logged correctly

                document.getElementById('editUserId').value = user.uuid;
                document.getElementById('editName').value = user.name;
                document.getElementById('editPassword').value = user.password;
                document.getElementById('editEmail').value = user.email;
                document.getElementById('editPhone').value = user.phone;
                document.getElementById('editWebsite').value = user.website;
                document.getElementById('editCompanyName').value = user.company_name;
                document.getElementById('editCompanyAddress').value = user.company_address;
                document.getElementById('editNoOfDevice').value = user.no_of_device;

                // Clear existing options and set the gender dropdown to the user's gender
                var genderDropdownContainer = document.querySelector(
                    '.gender-dropdown-container');
                genderDropdownContainer.innerHTML = ''; // Clear any existing content

                var selectElement = document.createElement('select');
                selectElement.className = 'default-select wide form-control';
                selectElement.id = 'editGender';
                selectElement.name = 'gender';

                var options = [{
                        value: '',
                        text: 'Please select'
                    },
                    {
                        value: 'Male',
                        text: 'Male'
                    },
                    {
                        value: 'Female',
                        text: 'Female'
                    },
                    {
                        value: 'Other',
                        text: 'Other'
                    }
                ];

                options.forEach(function(option) {
                    var opt = document.createElement('option');
                    opt.value = option.value;
                    opt.text = option.text;
                    if (user.gender === option.value) {
                        opt.selected = true;
                    }
                    selectElement.appendChild(opt);
                });

                genderDropdownContainer.appendChild(selectElement);

                // Log the selected value for debugging
                console.log('Selected Gender:', selectElement.value);
            });
        });
    });
</script>
@include('CustomSweetAlert');
@endsection