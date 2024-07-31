@extends('admin.master')
@section('title', 'Profile')
@section('content')

<div class="content-body ">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">App</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Profile</a></li>
            </ol>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="profile card card-body px-3 pt-3 pb-0">
                    <div class="profile-head">
                        <div class="photo-content">
                            <div class="cover-photo"></div>
                        </div>
                        <div class="profile-info">
                            <div class="profile-photo">
                                <img src="{{'../'.$userDetail->image}}" class="img-fluid rounded-circle" alt="">
                            </div>
                            <div class="profile-details">
                                <div class="profile-name px-3 pt-2">
                                    <h4 class="text-primary mb-0">{{$userDetail->name}}</h4>
                                    <p>{{$userDetail->email}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card h-auto">
                    <div class="card-body">
                        <div class="profile-tab">
                            <div class="custom-tab-1">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item"><a href="#profile-settings" data-bs-toggle="tab" class="nav-link active show">Setting</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div id="profile-settings" class="tab-pane fade active show">
                                        <div class="pt-3">
                                            <div class="settings-form">
                                                <h4 class="text-primary">Account Setting</h4>
                                                <form class="needs-validation" method="post" action="{{route('updateAdminDetails')}}" enctype="multipart/form-data" novalidate>
                                                    @csrf
                                                    <input type="text" name="uuid" value="{{$userDetail->uuid}}" hidden>
                                                    <div class="row">
                                                        <div class="form-group col-md-6">
                                                            <label>Email</label>
                                                            <input type="email" placeholder="Email" value="{{$userDetail->email}}" class="form-control" disabled>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Image</label>
                                                            <input type="file" name="image" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-md-6">
                                                            <label>Name</label>
                                                            <input type="text" placeholder="Enter full name" name="name" value="{{$userDetail->name}}" class="form-control" required>
                                                            <div class="invalid-feedback">
                                                                Please enter a name.
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Phone No.</label>
                                                            <input type="text" placeholder="Phone no." id="contact_no" name="phone" value="{{$userDetail->phone}}" class="form-control" required>
                                                            <div class="invalid-feedback contact-feedback">
                                                                Please enter a valid phone number.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-md-6">
                                                            <label>Gender</label>
                                                            <select name="gender" class="form-control" required>
                                                                <option value="male" {{ $userDetail->gender == 'male' ? 'selected' : '' }}>Male</option>
                                                                <option value="female" {{ $userDetail->gender == 'female' ? 'selected' : '' }}>Female</option>
                                                                <option value="other" {{ $userDetail->gender == 'other' ? 'selected' : '' }}>Other</option>
                                                            </select>
                                                            <div class="invalid-feedback">
                                                                Please select a gender.
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Website</label>
                                                            <input type="text" placeholder="Website" id="web_link" name="website" value="{{$userDetail->website}}" class="form-control" required>
                                                            <div class="invalid-feedback web-feedback">
                                                                Please enter a valid website.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-md-6">
                                                            <label>Company Name</label>
                                                            <input type="text" placeholder="Company Name" class="form-control" name="company_name" value="{{$userDetail->company_name}}" required>
                                                            <div class="invalid-feedback">
                                                                Please enter a company name.
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Company Address</label>
                                                            <input type="text" placeholder="Company address" name="company_address" value="{{$userDetail->company_address}}" class="form-control" required>
                                                            <div class="invalid-feedback">
                                                                Please enter a company address.
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <button class="btn btn-primary" type="submit">Update</button>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="replyModal">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Post Reply</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form>
                                                <textarea class="form-control" rows="4">Message</textarea>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Reply</button>
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

<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
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


    document.addEventListener('DOMContentLoaded', function() {

        const webLinkInput = document.getElementById('web_link');
        const contactNumberInput = document.getElementById('contact_no');

        const webLinkFeedback = document.querySelector('.web-feedback');
        const contactFeedback = document.querySelector('.contact-feedback');

        webLinkInput.addEventListener('input', function() {
            const webLinkPattern = /^(http:\/\/|https:\/\/)?[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,6}(\/[a-zA-Z0-9#]+\/?)*$/;
            if (webLinkPattern.test(webLinkInput.value)) {
                webLinkFeedback.style.display = 'none';
            } else {
                webLinkFeedback.style.display = 'block';
            }
        });

        contactNumberInput.addEventListener('input', function() {
            const contactPattern = /^\d{10}$/;
            if (contactPattern.test(contactNumberInput.value)) {
                contactFeedback.style.display = 'none';
            } else {
                contactFeedback.style.display = 'block';
            }
        });
    });
</script>


@endsection