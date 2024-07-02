@extends('admin.master')
@section('title', 'Dashboard')
@section('content')

    <!--**********************************
                                        Content body start
                            ***********************************-->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <div class="content-body ">
        <!-- row -->
        <div class="container-fluid">
            <div class="row">
                <div class="card-header d-sm-flex d-block pb-0 border-0">
                    <div class="me-auto pe-3">
                        <h4 class="text-black fs-20">User Details</h4>
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
                                            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel"
                                                aria-labelledby="home-tab" tabindex="0">
                                                <img class="img-fluid rounded "
                                                    src="https://www.jigarpublicity.com/assets/img/jigar-publicity-logo.png"
                                                    alt="">
                                            </div>

                                        </div>
                                    </div>
                                    <!--Tab slider End-->
                                    <div class="col-xl-9 col-lg-6  col-md-6 col-xxl-7 col-sm-12">
                                        <div class="product-detail-content">
                                            <!--User details-->
                                            <div class="new-arrival-content mt-md-0 mt-3 pr">
                                                <h4>{{ $users->name }}</h4>
                                                <p class="text-black">Email: <span class="item"> {{ $users->email }}</p>
                                                <p class="text-black">Phone number: <span
                                                        class="item">{{ $users->phone }}</span> </p>
                                                <p class="text-black">Address: <span
                                                        class="item">{{ $users->company_address }}</span></p>

                                            </div>
                                        </div>
                                        <hr>
                                        <div class="product-detail-content">
                                            <!--Product details-->
                                            <div class="new-arrival-content mt-md-0 mt-3 pr">
                                                <h4>{{ $users->publication_name }}</h4>

                                                <p class="text-black">Email: <span class="item">
                                                        {{ $users->publication_email }}
                                                </p>
                                                <p class="text-black">Phone number: <span
                                                        class="item">{{ $users->publication_ph_no }}</span> </p>
                                                <p class="text-black">Address: <span
                                                        class="item">{{ $users->publication_address }}</span></p>

                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">User Details</h4>
                        </div>
                        <div class="card-body">
                            <!-- Nav tabs -->
                            <div class="default-tab">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#profile"><i
                                                class="la la-home me-2"></i>Book List</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " data-bs-toggle="tab" href="#home"><i
                                                class="la la-user me-2"></i>History</a>
                                    </li>

                                    {{-- <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#contact"><i class="la la-phone me-2"></i> Purchased User List</a>
                                </li> --}}
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#assets"><i
                                                class="la la-envelope me-2"></i> Assets</a>
                                    </li>
                                </ul>

                                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
                                    aria-hidden="true">
                                    <form method="POST" action="/admin/addIndustryInBook" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">

                                                <div class="modal-header">
                                                    <h5 class="modal-title"> Add New Industry</h5>
                                                    <input type="hidden" value="{{ $users->uuid }}" name="book_id">
                                                    <button type="button" class="btn-close"
                                                        data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row emial-setup" style="display: block;text-align: center;">
                                                        <div class="col-lg-12 col-sm-12 col-12">
                                                            <div class="form-group">
                                                                <div class="mailclinet" id="mailclinet">
                                                                    <img id="selected_image"
                                                                        src="https://p7.hiclipart.com/preview/831/479/764/ibooks-computer-icons-ios-apple-app-store-sparito-lo-scaffale-sono-rimaste-le-pagine-aperte-i-colori-cambiano.jpg"
                                                                        style="width: 200px;height:200px">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="mb-3">
                                                            <label for="staff_photo" class="form-label">Book Image</label>
                                                            <input class="form-control form-control-sm" id="image"
                                                                name="image" onchange="loadFile(event)" accept="image/*"
                                                                type="file">
                                                        </div>
                                                    </div>
                                                    <label>Category</label>
                                                    <select id="category_id" name="category_id" class="form-control"
                                                        required>
                                                        <option value="" disabled selected>Select Category</option>
                                                        @foreach ($users as $user)
                                                            <option value="{{ $users->id }}">{{ $users->company_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <div id="category-exists-message" style="display: none; color: red;">
                                                        This category already exists.</div>

                                                    <div class="form-group">
                                                        <br>
                                                        <label>Industry Name</label>
                                                        <input class="form-control" name="industry_name" type="text">
                                                    </div>
                                                    <div class="form-group">
                                                        <br>
                                                        <label>Contact Number</label>
                                                        <input class="form-control" name="contact_no" type="text">
                                                    </div>
                                                    <div class="form-group">
                                                        <br>
                                                        <label>Address</label>
                                                        <textarea class="form-control" name="address"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div id="industryFields">
                                            <!-- Container for dynamically added fields -->
                                        </div>

                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger light"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-light"
                                                        onclick="addIndustryField()">Add New unit</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                </div>

                                            </div>
                                        </div>
                                    </form>
                                </div>


                                <div class="tab-content">
                                    <div class="tab-pane fade show" id="home" role="tabpanel">
                                        <div class="pt-4">
                                            <div class="col-xl-12 col-lg-12 col-xxl-12 col-sm-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="table-responsive recentOrderTable">
                                                            {{-- <table class="table verticle-middle table-responsive-md">
                                                                <thead>
                                                                    <tr>

                                                                        <th scope="col">Name</th>
                                                                        <th scope="col">Email</th>
                                                                        <!-- <th scope="col">Label</th> -->
                                                                        <th scope="col" class="text-end">Status</th>
                                                                        <th scope="col">Email</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($industriesCategorie as $category)
                                                                <tr>
                                                                    <td>{{ $category->category_name }}</td>
                                                                    <td>{{ $category->unit_count }}</td>
                                                                    <!-- <td><span class="badge badge-warning">0%</span> -->
                                                                    </td>
                                                                    <td class="text-end">
                                                                        <span>
                                                                            <a href="javascript:void()" class="me-4" data-bs-toggle="tooltip" data-placement="top" title="Edit">
                                                                                <i class="fa fa-pencil color-muted"></i>
                                                                            </a>

                                                                            <a href="/admin/delete-category/{{ $category->uuid }}" data-bs-toggle="tooltip" data-placement="top" title="Close"><i class="fas fa-times color-danger"></i>
                                                                            </a>
                                                                        </span>
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                                </tbody>
                                                            </table> --}}
                                                            <table id="example3" class="display min-w850">
                                                                <thead>
                                                                    <tr>

                                                                        <th colspan="2">Name</th>
                                                                        <th>Email</th>
                                                                        <th>Purchase Book</th>
                                                                        <th>Payment</th>
                                                                        <th>Status</th>
                                                                        <th>Published Date</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    {{-- @foreach ($books as $book) --}}
                                                                        <tr>
                                                                            <td>
                                                                                <img width="80" src=""
                                                                                    style="border-radius: 45px;width: 40px;height: 40px;"
                                                                                    loading="lazy" alt="image">
                                                                            </td>
                                                                            <td></td>
                                                                            <td><a href="javascript:void(0);"><strong>abc@gmail.com</strong></a></td>
                                                                            <td><a href="javascript:void(0);"><strong>Name</strong></a></td>
                                                                            <td><a href="javascript:void(0);"><strong>7890</strong></a></td>
                                                                            <td>&#8377; <a
                                                                                    href="javascript:void(0);"><strong></strong></a>
                                                                            </td>
                                                                            <td>2011/04/25</td>
                                                                            <td>
                                                                                <div class="d-flex">
                                                                                    <a href=""
                                                                                        class="btn btn-primary shadow btn-xs sharp me-1">
                                                                                        <i class="fa fa-eye"></i>
                                                                                    </a>
                                                                                    <a href="/admin/update-book"
                                                                                        class="btn btn-primary shadow btn-xs sharp me-1 edit-book-button"
                                                                                        data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg"
                                                                                        data-book=''>
                                                                                        <i class="fa fa-pencil"></i>
                                                                                    </a>
                                                                                    <a href="/admin/delete-book/"
                                                                                        class="btn btn-danger shadow btn-xs sharp">
                                                                                        <i class="fa fa-trash"></i>
                                                                                    </a>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    {{-- @endforeach --}}
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
                                                    <div class="col-md-12 text-end">
                                                        <button type="button" class="btn btn-primary mb-2"
                                                            data-bs-toggle="modal"
                                                            data-bs-target=".bd-example-modal-lg">Add Book</button>
                                                    </div>

                                                    <div class="card-body">
                                                        <div class="table-responsive recentOrderTable">
                                                            {{-- <table class="table verticle-middle table-responsive-md">
                                                            <thead>
                                                                <tr>

                                                                    <th scope="col">Name</th>
                                                                    <th scope="col">Email</th>
                                                                    <th scope="col">Phone</th>
                                                                    <th scope="col">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($userDetails as $user)
                                                                <tr>

                                                                    <td>{{$user->name}}</td>
                                                                    <td>{{$user->email}}</td>
                                                                    <td>{{$user->phone}}</td>
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
                                                                @endforeach
                                                            </tbody>
                                                        </table> --}}
                                                            <table id="example3" class="display min-w850">
                                                                <thead>
                                                                    <tr>

                                                                        <th colspan="2">Book Name</th>
                                                                        <th>Total Categories</th>
                                                                        <th>Total Industry</th>
                                                                        {{-- <th>Total Users</th> --}}
                                                                        <th>Amount</th>
                                                                        <th>Published Date</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    {{-- @foreach ($books as $book) --}}
                                                                    <tr>
                                                                        <td>
                                                                            <img width="80"
                                                                                src="https://miro.medium.com/v2/resize:fit:5120/1*42ebJizcUtZBNIZPmmMZ5Q.jpeg"
                                                                                style="border-radius: 45px;width: 60px;height: 60px;"
                                                                                loading="lazy" alt="image">BookName
                                                                        </td>
                                                                        <td></td>
                                                                        <td><a href="javascript:void(0);"><strong>123
                                                                                </strong></a></td>
                                                                        <td><a href="javascript:void(0);"><strong>456
                                                                                </strong></a></td>
                                                                        {{-- <td><a href="javascript:void(0);"><strong>7890</strong></a></td> --}}
                                                                        <td>&#8377;
                                                                            <a
                                                                                href="javascript:void(0);"><strong>500</strong></a>
                                                                        </td>
                                                                        <td>2011/04/25</td>
                                                                        <td>
                                                                            <div class="d-flex">
                                                                                <a href=""
                                                                                    class="btn btn-primary shadow btn-xs sharp me-1">
                                                                                    <i class="fa fa-eye"></i>
                                                                                </a>
                                                                                <a href="/admin/update-book"
                                                                                    class="btn btn-primary shadow btn-xs sharp me-1 edit-book-button"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target=".bd-example-modal-lg"
                                                                                    data-book=''>
                                                                                    <i class="fa fa-pencil"></i>
                                                                                </a>
                                                                                <a href=""
                                                                                    class="btn btn-danger shadow btn-xs sharp">
                                                                                    <i class="fa fa-trash"></i>
                                                                                </a>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    {{-- @endforeach --}}
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
        <script>
            function addIndustryField() {
                var html = '<div class="container">' + '<div class="modal-dialog modal-lg">' +
                    '<div class="modal-content">' +
                    '<div class="modal-body">' +
                    '<div class="modal-header">' +
                    '<h5 class="modal-title"> Unit Details</h5>' +
                    '<i style="float: right;" onclick="removeIndustryField(this)" class="fa fa-minus"></i>' +
                    '</div>' +

                    '<div class="row">' +
                    '<div class="col-lg-6 mt-3 mt-lg-4">' +
                    '<div class="form-group">' +
                    '<label>Unit Name</label>' +
                    '<input class="form-control" name="unit_name[]" type="text">' +
                    '</div>' +

                    '</div>' +
                    '<div class="col-lg-6 mt-3 mt-lg-4">' +
                    '<div class="form-group">' +
                    '<label>Contact No.</label>' +
                    '<input class="form-control" name="unit_contact_no[]" type="text">' +
                    '</div>' +
                    '</div>' +
                    '</div>' +

                    '<div class="row">' +
                    '<div class="col-lg-12 mt-3 mt-lg-4">' +
                    '<div class="form-group">' +
                    '<label>Unit Address</label>' +
                    '<textarea class="form-control" name="unit_address[]"></textarea>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>';
                $('#industryFields').append(html);
            }

            function removeIndustryField(btn) {
                $(btn).closest('.container').remove();
            }
        </script>

        <script>
            var loadFile = function(event) {
                // var selected_image = document.getElementById('selected_image');

                var input = event.target;
                var image = document.getElementById('selected_image');
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        image.src = e.target.result;
                    }
                    reader.readAsDataURL(input.files[0]);
                }

                function validateForm() {
                    let x = document.forms["myForm"]["staff_id"].value;
                    if (x == "") {
                        alert("Name must be filled out");
                        return false;
                    }
                }

            };

            $(document).ready(function() {
                $('#category_id').change(function() {
                    var selectedCategoryId = $(this).val();

                    if (selectedCategoryId) {
                        $.ajax({
                            url: '/admin/check-category-id', // Your route to check category ID
                            type: 'GET',
                            data: {
                                category_id: selectedCategoryId
                            },
                            success: function(response) {
                                if (response.exists) {
                                    $('#category-exists-message').show();
                                } else {
                                    $('#category-exists-message').hide();
                                }
                            }
                        });
                    }
                });
            });
        </script>

    @endsection
