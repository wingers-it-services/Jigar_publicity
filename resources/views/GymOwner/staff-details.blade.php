@extends('GymOwner.master')
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
                        <h4 class="text-black fs-20">All Employee List</h4>
                        <p class="fs-13 mb-0 text-black">Click on employe to see details.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-xxl-4 col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row m-b-30">
                                    <div class="col-md-5 col-xxl-12">
                                        <div class="new-arrival-product mb-4 mb-xxl-4 mb-md-0">
                                            <div class="new-arrivals-img-contnent">
                                                <img class="img-fluid rounded"
                                                    src="https://fito.dexignzone.com/laravel/demo/images/product/2.jpg"
                                                    alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-7 col-xxl-12">
                                        <div class="new-arrival-content position-relative">
                                            <h4><a href="https://fito.dexignzone.com/laravel/demo/ecom-product-detail">Back
                                                    Dumbbells</a></h4>
                                            <div class="comment-review star-rating">
                                                <ul>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star-half-stroke"></i></li>
                                                    <li><i class="fa fa-star-half-stroke"></i></li>
                                                </ul>
                                                <span class="review-text">(34 reviews) / </span><a class="product-review"
                                                    href="" data-bs-toggle="modal"
                                                    data-bs-target="#reviewModal">Write a review?</a>
                                                <p class="price">$320.00</p>
                                            </div>
                                            <p>Availability: <span class="item"> In stock <i
                                                        class="fa fa-check-circle text-success"></i></span></p>
                                            <p>Product code: <span class="item">0405689</span> </p>
                                            <p>Brand: <span class="item">Lee</span></p>
                                            <p class="text-content">There are many variations of passages of Lorem Ipsum
                                                available, but the majority have suffered alteration in some form, by
                                                injected humour, or randomised words.</p>
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
                                        <a class="nav-link active" data-bs-toggle="tab" href="#profile"><i
                                                class="la la-user me-2"></i> Industries Categories List</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#home"><i
                                                class="la la-home me-2"></i>Industry List</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#contact"><i
                                                class="la la-phone me-2"></i> Purchased User List</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#assets"><i
                                                class="la la-envelope me-2"></i> Assets</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel">
                                        <div class="pt-4">
                                            <h4>This is home title</h4>
                                            <p>Far far away, behind the word mountains, far from the countries Vokalia and
                                                Consonantia, there live the blind texts. Separated they live in
                                                Bookmarksgrove.
                                            </p>
                                            <p>Far far away, behind the word mountains, far from the countries Vokalia and
                                                Consonantia, there live the blind texts. Separated they live in
                                                Bookmarksgrove.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="profile">
                                        <div class="pt-4">
                                            <h4>This is profile title</h4>
                                            <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt
                                                tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor.
                                            </p>
                                            <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt
                                                tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="contact">
                                        <div class="pt-4">
                                            <h4>This is contact title</h4>
                                            <p>Far far away, behind the word mountains, far from the countries Vokalia and
                                                Consonantia, there live the blind texts. Separated they live in
                                                Bookmarksgrove.
                                            </p>
                                            <p>Far far away, behind the word mountains, far from the countries Vokalia and
                                                Consonantia, there live the blind texts. Separated they live in
                                                Bookmarksgrove.
                                            </p>
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
                                                                        <td><span
                                                                                class="badge badge-rounded badge-primary">Checkin</span>
                                                                        </td>
                                                                        <td>$120</td>
                                                                        <td>
                                                                            <div class="dropdown custom-dropdown mb-0">
                                                                                <div class="btn sharp btn-primary tp-btn"
                                                                                    data-bs-toggle="dropdown">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                        width="18px" height="18px"
                                                                                        viewBox="0 0 24 24"
                                                                                        version="1.1">
                                                                                        <g stroke="none" stroke-width="1"
                                                                                            fill="none"
                                                                                            fill-rule="evenodd">
                                                                                            <rect x="0" y="0"
                                                                                                width="24"
                                                                                                height="24" />
                                                                                            <circle fill="#000000"
                                                                                                cx="12"
                                                                                                cy="5" r="2" />
                                                                                            <circle fill="#000000"
                                                                                                cx="12"
                                                                                                cy="12" r="2" />
                                                                                            <circle fill="#000000"
                                                                                                cx="12"
                                                                                                cy="19" r="2" />
                                                                                        </g>
                                                                                    </svg>
                                                                                </div>
                                                                                <div
                                                                                    class="dropdown-menu dropdown-menu-end">
                                                                                    <a class="dropdown-item"
                                                                                        href="javascript:void(0);">Details</a>
                                                                                    <a class="dropdown-item text-danger"
                                                                                        href="javascript:void(0);">Cancel</a>
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



    @endsection
