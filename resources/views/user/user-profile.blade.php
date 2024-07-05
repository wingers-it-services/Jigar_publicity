@extends('user.master')
@section('title', 'Dashboard')
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
                    <img src="https://fito.dexignzone.com/laravel/demo/images/profile/profile.png" class="img-fluid rounded-circle" alt="">
                </div>
                <div class="profile-details">
                    <div class="profile-name px-3 pt-2">
                        <h4 class="text-primary mb-0">Mitchell C. Shay</h4>
                        <p>UX / UI Designer</p>
                    </div>
                    <div class="profile-email px-2 pt-2">
                        <h4 class="text-muted mb-0"><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="9af2fff6f6f5dafff7fbf3f6b4f9f5f7">[email&#160;protected]</a></h4>
                        <p>Email</p>
                    </div>
                    <div class="dropdown ms-auto">
                        <a href="#" class="btn btn-primary light sharp" data-bs-toggle="dropdown" aria-expanded="true"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg></a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li class="dropdown-item"><i class="fa fa-user-circle text-primary me-2"></i> View profile</li>
                            <li class="dropdown-item"><i class="fa fa-users text-primary me-2"></i> Add to close friends</li>
                            <li class="dropdown-item"><i class="fa fa-plus text-primary me-2"></i> Add to group</li>
                            <li class="dropdown-item"><i class="fa fa-ban text-primary me-2"></i> Block</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="row">
<div class="col-xl-4">
    <div class="card h-auto">
        <div class="card-body">
            <div class="profile-statistics mb-5">
                <div class="text-center">
                    <div class="row">

                    </div>

                </div>
                <!-- Modal -->
                <div class="modal fade" id="sendMessageModal">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Send Message</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <form class="comment-form">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="text-black font-w600">Name <span class="required">*</span></label>
                                                <input type="text" class="form-control" value="Author" name="Author" placeholder="Author">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label  class="text-black font-w600">Email <span class="required">*</span></label>
                                                <input type="text" class="form-control" value="Email" placeholder="Email" name="Email">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label  class="text-black font-w600">Comment</label>
                                                <textarea rows="8" class="form-control" name="comment" placeholder="Comment"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <input type="submit" value="Post Comment" class="submit btn btn-primary" name="submit">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="profile-blog mb-5">
                <h5 class="text-primary d-inline">Today Highlights</h5>
                <img src="https://www.jigarpublicity.com/assets/img/jigar-publicity-logo.png" alt="" class="img-fluid mt-4 mb-4 w-100">
                <h4><a href="https://www.jigarpublicity.com/assets/img/jigar-publicity-logo.png" class="text-black"></a></h4>
                <p class="mb-0"> </p>
            </div>
            <div class="profile-blog mb-5">
                <h5 class="text-primary d-inline">Today Highlights</h5>
                <img src="https://www.jigarpublicity.com/assets/img/jigar-publicity-logo.png" alt="" class="img-fluid mt-4 mb-4 w-100">
                <h4><a href="https://www.jigarpublicity.com/assets/img/jigar-publicity-logo.png" class="text-black"></a></h4>
                <p class="mb-0"> </p>
            </div>
            {{-- <div class="profile-news">
                <h5 class="text-primary d-inline">Our Latest News</h5>
                <div class="media pt-3 pb-3">
                    <img src="https://fito.dexignzone.com/laravel/demo/images/profile/5.jpg" alt="image" class="me-3 rounded" width="75">
                    <div class="media-body">
                        <h5 class="m-b-5"><a href="https://fito.dexignzone.com/laravel/demo/post-details" class="text-black">Collection of textile samples</a></h5>
                        <p class="mb-0">I shared this on my fb wall a few months back, and I thought.</p>
                    </div>
                </div>
                <div class="media pt-3 pb-3">
                    <img src="https://fito.dexignzone.com/laravel/demo/images/profile/6.jpg" alt="image" class="me-3 rounded" width="75">
                    <div class="media-body">
                        <h5 class="m-b-5"><a href="https://fito.dexignzone.com/laravel/demo/post-details" class="text-black">Collection of textile samples</a></h5>
                        <p class="mb-0">I shared this on my fb wall a few months back, and I thought.</p>
                    </div>
                </div>
                <div class="media pt-3 pb-3">
                    <img src="https://fito.dexignzone.com/laravel/demo/images/profile/7.jpg" alt="image" class="me-3 rounded" width="75">
                    <div class="media-body">
                        <h5 class="m-b-5"><a href="https://fito.dexignzone.com/laravel/demo/post-details" class="text-black">Collection of textile samples</a></h5>
                        <p class="mb-0">I shared this on my fb wall a few months back, and I thought.</p>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</div>
<div class="col-xl-8">
    <div class="card h-auto">
        <div class="card-body">
            <div class="profile-tab">
                <div class="custom-tab-1">
                    <ul class="nav nav-tabs">
                        {{-- <li class="nav-item"><a href="#my-posts" data-bs-toggle="tab" class="nav-link active show">Posts</a>
                        </li>
                        <li class="nav-item"><a href="#about-me" data-bs-toggle="tab" class="nav-link">About Me</a>
                        </li> --}}
                        <li class="nav-item"><a href="#profile-settings" data-bs-toggle="tab" class="nav-link active show">Setting</a>
                        </li>
                    </ul>
                    <div class="tab-content">


                        <div id="profile-settings" class="tab-pane fade active show">
                            <div class="pt-3">
                                <div class="settings-form">
                                    <h4 class="text-primary">Account Setting</h4>
                                    <form>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label>Email</label>
                                                <input type="email" placeholder="Email" class="form-control">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Password</label>
                                                <input type="password" placeholder="Password" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input type="text" placeholder="1234 Main St" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Address 2</label>
                                            <input type="text" placeholder="Apartment, studio, or floor" class="form-control">
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label>City</label>
                                                <input type="text" class="form-control">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>State</label>
                                                <select class="form-control default-select" id="inputState">
                                                    <option selected="">Choose...</option>
                                                    <option>Option 1</option>
                                                    <option>Option 2</option>
                                                    <option>Option 3</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>Zip</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-check custom-checkbox">
                                                <input type="checkbox" class="form-check-input" id="gridCheck">
                                                <label class="form-check-label" for="gridCheck"> Check me out</label>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary" type="submit">Sign
                                            in</button>
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



@endsection