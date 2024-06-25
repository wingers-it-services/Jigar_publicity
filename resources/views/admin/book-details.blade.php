@extends('admin.master')
@section('title', 'Dashboard')
@section('content')

<!--**********************************
                                    Content body start
                        ***********************************-->
<div class="content-body ">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="card-header d-sm-flex d-block pb-0 border-0">
                <div class="me-auto pe-3">
                    <h4 class="text-black fs-20">Book Details</h4>
                    <!-- <p class="fs-13 mb-0 text-black">Click on employe to see details.</p> -->
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-3 col-lg-6  col-md-6 col-xxl-5 ">
                                    <!-- Tab panes -->
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                            <img class="img-fluid rounded " src="{{asset($bookDetails->image)}}" alt="">
                                        </div>
                                        <!-- <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                                            <img class="img-fluid  rounded" src="https://fito.dexignzone.com/laravel/demo/images/product/2.jpg" alt="">
                                        </div>
                                        <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
                                            <img class="img-fluid rounded" src="https://fito.dexignzone.com/laravel/demo/images/product/3.jpg" alt="">
                                        </div>
                                        <div class="tab-pane fade" id="end-tab-pane" role="tabpanel" aria-labelledby="end-tab" tabindex="0">
                                            <img class="img-fluid rounded" src="https://fito.dexignzone.com/laravel/demo/images/product/3.jpg" alt="">
                                        </div> -->

                                    </div>
                                    <!-- <ul class="nav nav-tabs slide-item-list mt-3" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a href="#first" class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" role="tab" aria-controls="home-tab-pane" aria-selected="true"><img class="img-fluid me-2 rounded" src="https://fito.dexignzone.com/laravel/demo/images/tab/1.jpg" alt="" width="80"></a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a href="#second" class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" role="tab" aria-controls="profile-tab-pane" aria-selected="false"><img class="img-fluid me-2 rounded" src="https://fito.dexignzone.com/laravel/demo/images/tab/2.jpg" alt="" width="80"></a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a href="#third" class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" role="tab" aria-controls="contact-tab-pane" aria-selected="false"><img class="img-fluid me-2 rounded" src="https://fito.dexignzone.com/laravel/demo/images/tab/3.jpg" alt="" width="80"></a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a href="#for" class="nav-link" id="end-tab" data-bs-toggle="tab" data-bs-target="#end-tab-pane" role="tab" aria-controls="end-tab-pane" aria-selected="false"><img class="img-fluid rounded" src="https://fito.dexignzone.com/laravel/demo/images/tab/4.jpg" alt="" width="80"></a>
                                        </li>

                                    </ul> -->
                                </div>
                                <!--Tab slider End-->
                                <div class="col-xl-9 col-lg-6  col-md-6 col-xxl-7 col-sm-12">
                                    <div class="product-detail-content">
                                        <!--Product details-->
                                        <div class="new-arrival-content mt-md-0 mt-3 pr">
                                            <h4>{{$bookDetails->book_name}}</h4>
                                            <div class="comment-review star-rating">
                                                <ul>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>

                                                </ul>
                                                <span class="review-text">(34 reviews) / </span><a class="product-review" href="" data-bs-toggle="modal" data-bs-target="#reviewModal">Write a review?</a>
                                            </div>
                                            <div class="d-table mb-2">
                                                <p class="price float-start d-block">₹{{$bookDetails->book_price}}</p>
                                            </div>
                                            <p class="text-black">Email: <span class="item"> {{$bookDetails->association_email}}
                                            </p>
                                            <p class="text-black">Phone number: <span class="item">{{$bookDetails->association_ph_no}}</span> </p>
                                            <p class="text-black">Address: <span class="item">{{$bookDetails->association_address}}</span></p>
                                            <!-- <p class="text-black">Product tags:&nbsp;&nbsp;
                                                <span class="badge badge-success light">bags</span>
                                                <span class="badge badge-danger light">clothes</span>
                                                <span class="badge badge-warning light">shoes</span>
                                                <span class="badge badge-info light">dresses</span>
                                            </p> -->
                                            <p class="text-content">There are many variations of passages of Lorem Ipsum
                                                available, but the majority have suffered alteration in some form, by
                                                injected humour, or randomised words.</p>
                                            <!-- <div class="d-flex align-items-end flex-wrap mt-4">
                                                <div class="filtaring-area me-3">
                                                    <div class="size-filter">
                                                        <h4 class="m-b-15">Select size</h4>


                                                        <div class="btn-group mb-sm-0 mb-2" role="group" aria-label="Basic radio toggle button group">
                                                            <input type="radio" class="btn-check" name="btnradio" id="btnradio1" checked="">
                                                            <label class="btn btn-outline-primary mb-0" for="btnradio1">XS</label>

                                                            <input type="radio" class="btn-check" name="btnradio" id="btnradio2">
                                                            <label class="btn btn-outline-primary mb-0" for="btnradio2">SM</label>

                                                            <input type="radio" class="btn-check" name="btnradio" id="btnradio3">
                                                            <label class="btn btn-outline-primary mb-0" for="btnradio3">MD</label>

                                                            <input type="radio" class="btn-check" name="btnradio" id="btnradio4">
                                                            <label class="btn btn-outline-primary mb-0" for="btnradio4">LG</label>

                                                            <input type="radio" class="btn-check" name="btnradio" id="btnradio5">
                                                            <label class="btn btn-outline-primary mb-0" for="btnradio5">XL</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-2 px-0  me-3">
                                                    <input type="number" name="num" class="form-control input-btn input-number" value="1">
                                                </div>
                                                <div class="shopping-cart  me-3">
                                                    <a class="btn btn-primary" href="javascript:void();"><i class="fa fa-shopping-basket me-2"></i>Add
                                                        to cart</a>
                                                </div>
                                            </div> -->
                                        </div>
                                    </div>
                                    <div class="product-detail-content">
                                        <!--Product details-->
                                        <div class="new-arrival-content mt-md-0 mt-3 pr">
                                            <h4>{{$bookDetails->publication_name}}</h4>
                                            <!-- <div class="comment-review star-rating">
                                                <ul>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>

                                                </ul> -->
                                            <!-- <span class="review-text">(34 reviews) / </span><a class="product-review" href="" data-bs-toggle="modal" data-bs-target="#reviewModal">Write a review?</a> -->
                                            <!-- </div> -->
                                            <p class="text-black">Email: <span class="item"> {{$bookDetails->publication_email}}
                                            </p>
                                            <p class="text-black">Phone number: <span class="item">{{$bookDetails->publication_ph_no}}</span> </p>
                                            <p class="text-black">Address: <span class="item">{{$bookDetails->publication_address}}</span></p>
                                            <!-- <p class="text-black">Product tags:&nbsp;&nbsp;
                                                <span class="badge badge-success light">bags</span>
                                                <span class="badge badge-danger light">clothes</span>
                                                <span class="badge badge-warning light">shoes</span>
                                                <span class="badge badge-info light">dresses</span>
                                            </p> -->
                                            <p class="text-content">There are many variations of passages of Lorem Ipsum
                                                available, but the majority have suffered alteration in some form, by
                                                injected humour, or randomised words.</p>
                                            <!-- <div class="d-flex align-items-end flex-wrap mt-4">
                                                <div class="filtaring-area me-3">
                                                    <div class="size-filter">
                                                        <h4 class="m-b-15">Select size</h4>


                                                        <div class="btn-group mb-sm-0 mb-2" role="group" aria-label="Basic radio toggle button group">
                                                            <input type="radio" class="btn-check" name="btnradio" id="btnradio1" checked="">
                                                            <label class="btn btn-outline-primary mb-0" for="btnradio1">XS</label>

                                                            <input type="radio" class="btn-check" name="btnradio" id="btnradio2">
                                                            <label class="btn btn-outline-primary mb-0" for="btnradio2">SM</label>

                                                            <input type="radio" class="btn-check" name="btnradio" id="btnradio3">
                                                            <label class="btn btn-outline-primary mb-0" for="btnradio3">MD</label>

                                                            <input type="radio" class="btn-check" name="btnradio" id="btnradio4">
                                                            <label class="btn btn-outline-primary mb-0" for="btnradio4">LG</label>

                                                            <input type="radio" class="btn-check" name="btnradio" id="btnradio5">
                                                            <label class="btn btn-outline-primary mb-0" for="btnradio5">XL</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-2 px-0  me-3">
                                                    <input type="number" name="num" class="form-control input-btn input-number" value="1">
                                                </div>
                                                <div class="shopping-cart  me-3">
                                                    <a class="btn btn-primary" href="javascript:void();"><i class="fa fa-shopping-basket me-2"></i>Add
                                                        to cart</a>
                                                </div>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>
            </div>

            <div class="row" id="default-info-section" style="text-align: center;">
                <div class="col-xl-12">
                    <div class="card bg-light">
                        <div class="card-body mb-0">
                            <p class="card-text">Click on any Staff to see it's details.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Default Tab</h4>
                    </div>
                    <div class="card-body">
                        <!-- Nav tabs -->
                        <div class="default-tab">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#profile"><i class="la la-user me-2"></i> Industries Categories List</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#home"><i class="la la-home me-2"></i>Industry List</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#contact"><i class="la la-phone me-2"></i> Purchased User List</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#assets"><i class="la la-envelope me-2"></i> Assets</a>
                                </li>
                            </ul>
                            <div class="modal fade" id="addCategory">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Add New Book Categories</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal">
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="/admin/industries-categories">
                                                @csrf
                                                <div class="form-group">
                                                    <label>Category Name</label>
                                                    <input type="text" id="category_name" name="category_name" class="form-control" required>
                                                </div>

                                                <button class="btn btn-primary" style=" width: -webkit-fill-available; ">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="addIndustries">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Add New Industry</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal">
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="/admin/industries-categories">
                                                @csrf
                                                <label>Category</label>
                                                <select id="member_designation" name="member_designation" class="form-control" required>
                                                    <option value="" disabled selected>Select Category</option>
                                                    @foreach($industriesCategorie as $category)
                                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="form-group">
                                                    <div id="industryFields">
                                                        <!-- Container for dynamically added fields -->
                                                    </div>
                                                    <div class="text-center mt-3">

                                                        <i onclick="addIndustryField()" class="fa fa-plus"></i>

                                                    </div>
                                                </div>
                                                <button class="btn btn-primary" style=" width: -webkit-fill-available; ">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane fade show" id="home" role="tabpanel">
                                    <div class="pt-4">
                                        <div class="col-xl-12 col-lg-12 col-xxl-12 col-sm-12">
                                            <div class="card">
                                                <div class="col-md-12 text-end"> <!-- Column for the button -->
                                                    <div class="dropdown mt-sm-0 mt-3">
                                                        <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#addIndustries" class="btn btn-outline-primary rounded">Add Industries</a>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="table-responsive recentOrderTable">
                                                        <table class="table verticle-middle table-responsive-md">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">Asset No.</th>
                                                                    <th scope="col">Asset Name</th>
                                                                    <th scope="col">Asset Category</th>
                                                                    <th scope="col">Asset Tag</th>
                                                                    <th scope="col">Date Of Allocation</th>
                                                                    <th scope="col">Status</th>
                                                                    <th scope="col">Image</th>
                                                                    <th scope="col">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>12</td>
                                                                    <td>Mr. Bobby</td>
                                                                    <td>Dr. Jackson</td>
                                                                    <td>Dr. Jackson</td>
                                                                    <td>01 August 2020</td>
                                                                    <td><span class="badge badge-rounded badge-primary">Checkin</span>
                                                                    </td>
                                                                    <td>$120</td>
                                                                    <td>
                                                                        <div class="dropdown custom-dropdown mb-0">
                                                                            <div class="btn sharp btn-primary tp-btn" data-bs-toggle="dropdown">
                                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
                                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                        <rect x="0" y="0" width="24" height="24" />
                                                                                        <circle fill="#000000" cx="12" cy="5" r="2" />
                                                                                        <circle fill="#000000" cx="12" cy="12" r="2" />
                                                                                        <circle fill="#000000" cx="12" cy="19" r="2" />
                                                                                    </g>
                                                                                </svg>
                                                                            </div>
                                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                                <a class="dropdown-item" href="javascript:void(0);">Details</a>
                                                                                <a class="dropdown-item text-danger" href="javascript:void(0);">Cancel</a>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade show active" id="profile">
                                    <div class="pt-4">
                                        <div class="col-xl-12 col-lg-12 col-xxl-12 col-sm-12">
                                            <div class="card">
                                                <div class="col-md-12 text-end"> <!-- Column for the button -->
                                                    <div class="dropdown mt-sm-0 mt-3">
                                                        <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#addCategory" class="btn btn-outline-primary rounded">Add Book Categories</a>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="table-responsive recentOrderTable">
                                                        <table class="table verticle-middle table-responsive-md">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">Categories</th>
                                                                    <th scope="col">No of Books</th>
                                                                    <th scope="col">No of Industries</th>
                                                                    <th scope="col">Progress</th>
                                                                    <th scope="col">Label</th>
                                                                    <th scope="col" class="text-end">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($industriesCategorie as $subscription)
                                                                <tr>
                                                                    <td>{{ $subscription->category_name }}</td>
                                                                    <td>0</td>
                                                                    <td>0</td>
                                                                    <td>
                                                                        <div class="progress" style="background: rgba(255, 193, 7, .1)">
                                                                            <div class="progress-bar bg-warning" style="width: 0%;" role="progressbar"><span class="sr-only">0%
                                                                                    Complete</span>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td><span class="badge badge-warning">0%</span>
                                                                    </td>
                                                                    <td class="text-end">
                                                                        <span>
                                                                            <a href="javascript:void()" class="me-4" data-bs-toggle="tooltip" data-placement="top" title="Edit">
                                                                                <i class="fa fa-pencil color-muted"></i>
                                                                            </a>

                                                                            <a href="/admin/delete-category/{{ $subscription->uuid }}" data-bs-toggle="tooltip" data-placement="top" title="Close"><i class="fas fa-times color-danger"></i>
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
                                <div class="tab-pane fade" id="contact">
                                    <div class="pt-4">
                                        <div class="col-xl-12 col-lg-12 col-xxl-12 col-sm-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="table-responsive recentOrderTable">
                                                        <table class="table verticle-middle table-responsive-md">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">Asset No.</th>
                                                                    <th scope="col">Asset Name</th>
                                                                    <th scope="col">Asset Category</th>
                                                                    <th scope="col">Asset Tag</th>
                                                                    <th scope="col">Date Of Allocation</th>
                                                                    <th scope="col">Status</th>
                                                                    <th scope="col">Image</th>
                                                                    <th scope="col">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>12</td>
                                                                    <td>Mr. Bobby</td>
                                                                    <td>Dr. Jackson</td>
                                                                    <td>Dr. Jackson</td>
                                                                    <td>01 August 2020</td>
                                                                    <td><span class="badge badge-rounded badge-primary">Checkin</span>
                                                                    </td>
                                                                    <td>$120</td>
                                                                    <td>
                                                                        <div class="dropdown custom-dropdown mb-0">
                                                                            <div class="btn sharp btn-primary tp-btn" data-bs-toggle="dropdown">
                                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
                                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                        <rect x="0" y="0" width="24" height="24" />
                                                                                        <circle fill="#000000" cx="12" cy="5" r="2" />
                                                                                        <circle fill="#000000" cx="12" cy="12" r="2" />
                                                                                        <circle fill="#000000" cx="12" cy="19" r="2" />
                                                                                    </g>
                                                                                </svg>
                                                                            </div>
                                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                                <a class="dropdown-item" href="javascript:void(0);">Details</a>
                                                                                <a class="dropdown-item text-danger" href="javascript:void(0);">Cancel</a>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="assets">
                                    <div class="pt-4">
                                        <div class="col-xl-12 col-lg-12 col-xxl-12 col-sm-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="table-responsive recentOrderTable">
                                                        <table class="table verticle-middle table-responsive-md">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">Asset No.</th>
                                                                    <th scope="col">Asset Name</th>
                                                                    <th scope="col">Asset Category</th>
                                                                    <th scope="col">Asset Tag</th>
                                                                    <th scope="col">Date Of Allocation</th>
                                                                    <th scope="col">Status</th>
                                                                    <th scope="col">Image</th>
                                                                    <th scope="col">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>12</td>
                                                                    <td>Mr. Bobby</td>
                                                                    <td>Dr. Jackson</td>
                                                                    <td>Dr. Jackson</td>
                                                                    <td>01 August 2020</td>
                                                                    <td><span class="badge badge-rounded badge-primary">Checkin</span>
                                                                    </td>
                                                                    <td>$120</td>
                                                                    <td>
                                                                        <div class="dropdown custom-dropdown mb-0">
                                                                            <div class="btn sharp btn-primary tp-btn" data-bs-toggle="dropdown">
                                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
                                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                        <rect x="0" y="0" width="24" height="24" />
                                                                                        <circle fill="#000000" cx="12" cy="5" r="2" />
                                                                                        <circle fill="#000000" cx="12" cy="12" r="2" />
                                                                                        <circle fill="#000000" cx="12" cy="19" r="2" />
                                                                                    </g>
                                                                                </svg>
                                                                            </div>
                                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                                <a class="dropdown-item" href="javascript:void(0);">Details</a>
                                                                                <a class="dropdown-item text-danger" href="javascript:void(0);">Cancel</a>
                                                                            </div>
                                                                        </div>
                                                                    </td>
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
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <!--**********************************
                                    Content body end
                        ***********************************-->
    <script src="{{ asset('js/plugins-init/staff-attendance-overview-chart.js') }}" type="text/javascript"></script>
    <script>
        function addIndustryField() {
            var html = '<div class="row">' +
                '<div class="col-lg-6 mt-3 mt-lg-4">' +
                '<div class="form-group">' +
                '<label>Industry Name</label>' + 
                '<input class="form-control" name="industry_name[]" type="text">' +
                '</div>' +
                '</div>' + 
                '<div class="col-lg-6 mt-3 mt-lg-4">' +
                '<div class="form-group">' +
                '<label>Contact No.</label>' + 
                '<input class="form-control" name="contact_no[]" type="text">' +
                '</div>' +
                '</div>' +
                '</div>'+
                '<div class="row">' +
                '<div class="col-lg-12 mt-3 mt-lg-4">' +
                '<div class="form-group">' +
                '<label>Industry Address</label>' + 
                '<textarea class="form-control" name="address[]" type="text"></textarea>' +
                '</div>' +
                '</div>' +
                '</div>';
            $('#industryFields').append(html);
        }

        function removeIndustryField(btn) {
            $(btn).closest('.input-group').remove();
        }
    </script>

    <i class="fa fa-minus" onclick="removeIndustryField(this)"></i>

    @endsection