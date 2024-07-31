@extends('user.master')
@section('title', 'Dashboard')
@section('content')

    <!--**********************************
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    Content body start
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    ***********************************-->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" rel="stylesheet">

    <!-- Bootstrap JavaScript Bundle with Popper -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>

    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">

            <div class="row">
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-body p-4">
                            <div id="carouselExampleIndicators1" class="carousel slide" data-bs-ride="carousel">
                                <ol class="carousel-indicators">
                                    @foreach ($horImages1 as $index => $horImage)
                                        <li data-bs-target="#carouselExampleIndicators1"
                                            data-bs-slide-to="{{ $index }}"
                                            class="{{ $index === 0 ? 'active' : '' }}"></li>
                                    @endforeach
                                </ol>
                                <div class="carousel-inner">
                                    {{ $imgCount = 0 }}
                                    @foreach ($horImages1 as $horImage)
                                        {{ $imgCount++ }}
                                        @if ($imgCount == 1)
                                            <div class="carousel-item active">
                                            @else
                                                <div class="carousel-item">
                                        @endif

                                        @if ($horImage->advertisment_image == null)
                                            <img class="d-block w-100 rounded"
                                                src="https://www.jigarpublicity.com/assets/img/jigar-publicity-logo.png"
                                                alt="">
                                        @else
                                            <img class="d-block w-100 rounded"
                                                src="{{ asset($horImage->advertisment_image) }}" alt="">
                                        @endif
                                </div>
                                @endforeach

                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators1" data-bs-slide="prev"><span
                                    class="carousel-control-prev-icon"></span> <span class="sr-only">Previous</span> </a><a
                                class="carousel-control-next" href="#carouselExampleIndicators1" data-bs-slide="next"><span
                                    class="carousel-control-next-icon"></span>
                                <span class="sr-only">Next</span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body p-4">
                        <div id="carouselExampleIndicators2" class="carousel slide" data-bs-ride="carousel">
                            <ol class="carousel-indicators">
                                @foreach ($horImages2 as $index => $horImage)
                                    <li data-bs-target="#carouselExampleIndicators2" data-bs-slide-to="{{ $index }}"
                                        class="{{ $index === 0 ? 'active' : '' }}"></li>
                                @endforeach
                            </ol>
                            <div class="carousel-inner">
                                {{ $imgCount = 0 }}
                                @foreach ($horImages2 as $horImage)
                                    {{ $imgCount++ }}
                                    @if ($imgCount == 1)
                                        <div class="carousel-item active">
                                        @else
                                            <div class="carousel-item">
                                    @endif

                                    @if ($horImage->advertisment_image == null)
                                        <img class="d-block w-100 rounded"
                                            src="https://www.jigarpublicity.com/assets/img/jigar-publicity-logo.png"
                                            alt="">
                                    @else
                                        <img class="d-block w-100 rounded" src="{{ asset($horImage->advertisment_image) }}"
                                            alt="">
                                    @endif
                            </div>
                            @endforeach

                        </div>

                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators2" data-bs-slide="prev"><span
                            class="carousel-control-prev-icon"></span> <span class="sr-only">Previous</span> </a><a
                        class="carousel-control-next" href="#carouselExampleIndicators2" data-bs-slide="next"><span
                            class="carousel-control-next-icon"></span>
                        <span class="sr-only">Next</span></a>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="row">
        {{-- <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        @foreach ($horImages1 as $horImage)
                            <div class="col-xl-3 col-lg-6 col-md-6 col-xxl-6">
                                <!-- Tab panes -->
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel"
                                        aria-labelledby="home-tab" tabindex="0">
                                        @if ($horImage == null)
                                            <img class="img-fluid rounded"
                                                src="https://www.jigarpublicity.com/assets/img/jigar-publicity-logo.png"
                                                alt="">
                                        @else
                                            <img class="img-fluid rounded" src="{{ asset($horImage->advertisment_image) }}"
                                                alt="">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div> --}}
        <div class=" col-xl-10">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Industry List</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="industyList" class="display min-w850">

                            <thead>
                                <tr>
                                    <th>Industry Name</th>
                                    <th>Category</th>
                                    <th>Products</th>
                                    <th>Area</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tfoot style="display: table-row-group">
                                <th style="background-color: #333 !important;">Industry Name</th>
                                <th style="background-color: #333 !important;">Category</th>
                                <th style="background-color: #333 !important;">Products</th>
                                <th style="background-color: #333 !important;">Area</th>
                                <th style="background-color: #333 !important;">Banner</th>
                            </tfoot>
                            <tbody>

                                @foreach ($industries as $industry)
                                    <tr onclick="fetchIndustryDetailsByUuid('{{ $industry->uuid }}')">
                                        <td>{{ $industry->industry_name }}</td>
                                        <td>{{ $industry->categories ? $industry->categories->category_name : 'Not Defined' }}</td>
                                        <td>{{ $industry->product ?? '' }}</td>
                                        <td>{{ $industry->areas ? $industry->areas->area_name : 'Not Defined' }}</td>
                                        <td>
                                            <div class="d-flex">
                                                @if (!empty(trim($industry->advertisment_image)))
                                                    <a href="#"
                                                        class="btn btn-primary shadow btn-xs sharp me-1 view-btn"
                                                        data-bs-toggle="modal" data-bs-target="#industryModal"
                                                        data-image="{{ $industry->advertisment_image }}">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                @endif
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

        <div class="col-lg-2">
            <div class="card">
                @foreach ($verImages as $verImage)
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab"
                            tabindex="0">
                            @if ($verImage == null)
                                <img class="img-fluid rounded" style="margin-bottom: 15px;"
                                    src="https://www.jigarpublicity.com/assets/img/jigar-publicity-logo.png"
                                    alt="">
                            @else
                                <img class="img-fluid rounded" style="margin-bottom: 15px;"
                                    src="{{ asset($verImage->advertisment_image) }}" alt="">
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
    <div id="industryDetailsContainer" class="row" style="display: none;">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Industry Details</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Column for Industry Name and Basic Info -->
                        <div class="col-xl-6 col-lg-6 col-md-6 col-xxl-6 mb-3">
                            <div class="product-detail-content">
                                <div class="new-arrival-content mt-md-0 mt-3 pr">
                                    <h4 id="industryName"></h4>
                                    <p class="text-black">Email: <span class="item" id="industryEmail"></span>
                                    </p>
                                    <p class="text-black">Phone number: <span class="item" id="industryPhone"></span>
                                    </p>
                                    <p class="text-black">Office Address: <span class="item" id="officeAddress"></span>
                                    </p>
                                    <p class="text-black">Industry Address: <span class="item"
                                            id="industryAddress"></span></p>
                                    <p class="text-black">Website: <span class="item" id="industryWeb"></span>
                                    </p>
                                    <p class="text-black">Area: <span class="item" id="industryArea"></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- Column for Product Details -->
                        <div class="col-xl-6 col-lg-6 col-md-6 col-xxl-6 mb-3">
                            <div class="product-detail-content">
                                <div class="new-arrival-content mt-md-0 mt-3 pr">
                                    <p class="text-black">Types of Industry: <span class="item"
                                            id="industryCategory"></span></p>
                                    <p class="text-black">Product: <span class="item" id="industryProduct"></span>
                                    </p>
                                    <p class="text-black">By Product: <span class="item" id="industryByProduct"></span>
                                    </p>
                                    <p class="text-black">Raw Material: <span class="item"
                                            id="industryRawMaterial"></span></p>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <!-- Column for Contact Details -->
                    <div class="contact-details-container"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap Modal -->
    <div class="modal fade" id="industryModal" tabindex="-1" aria-labelledby="industryModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="industryModalLabel">Advertisement</h5><button type="button"
                        class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Image Container --><img class="img-fluid rounded" id="modalIndustryImage" src=""
                        alt="">
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    <style>
        .clickable-row:hover {
            background-color: #f5f5f5;
            cursor: pointer;
        }

        .active-row {
            background-color: #e0e0e0;
        }
    </style>

    <style>
        /* Make sure the image fills the container */
        #modalIndustryImage {
            width: 100%;
            height: auto;
            max-height: 80vh;
            /* Adjust as needed to fit your modal */
        }
    </style>



    <script>
        $(document).ready(function() {
            // Function to get query parameters from URL
            function getQueryParams(param) {
                var urlParams = new URLSearchParams(window.location.search);
                return urlParams.get(param);
            }

            // Initialize the DataTable
            var table = $('#industyList').DataTable({
                initComplete: function() {
                    var api = this.api();
                    var previousSearchValue = ''; // Track previous search value

                    // Add search input to each column header except the last one
                    api.columns().every(function(index) {
                        if (index === api.columns().count() - 1) {
                            return; // Skip the last column
                        }

                        var column = this;
                        var title = $(column.header()).text().trim();
                        var input = $(
                                '<input type="text" class="form-control form-control-sm" placeholder="Search ' +
                                title + '" />')
                            .appendTo($(column.header()).empty())
                            .on('keyup change', function() {
                                if (column.search() !== this.value) {
                                    column.search(this.value).draw();
                                }
                            });
                    });

                    // Function to apply search value from URL
                    function applySearchFromUrl() {
                        var searchValue = getQueryParams('search');
                        if (searchValue && searchValue !== previousSearchValue) {
                            api.search(searchValue).draw();
                            previousSearchValue = searchValue; // Update previous search value
                        }
                    }

                    // Apply initial search value
                    applySearchFromUrl();

                    // Periodically check for URL changes
                    setInterval(function() {
                        applySearchFromUrl();
                    }, 1000); // Check every second
                }
            });
        });




        function fetchIndustryDetailsByUuid(industryUuid) {
            $.ajax({
                url: 'fetch-industry-details-by-id/' + industryUuid,
                type: 'POST',
                data: {
                    _token: "{{ csrf_token() }}",
                    industry_uuid: industryUuid
                },
                success: function(response) {

                    // Check if response.industries is defined and not empty
                    if (response.status == 200) {
                        // Update industry details container with fetched data
                        document.getElementById('industryName').textContent = response.industries
                            .industry_name;
                        document.getElementById('industryEmail').textContent = response.industries
                            .email;
                        document.getElementById('industryPhone').textContent = response.industries
                            .contact_no;
                        document.getElementById('officeAddress').textContent = response.industries
                            .office_address;
                        document.getElementById('industryAddress').textContent = response.industries
                            .address;
                        document.getElementById('industryWeb').textContent = response.industries
                            .web_link;
                        document.getElementById('industryArea').textContent = response.areas
                            .area_name;
                        document.getElementById('industryCategory').textContent = response.categorys
                            .category_name;
                        document.getElementById('industryProduct').textContent = response.industries
                            .product;
                        document.getElementById('industryByProduct').textContent = response
                            .industries
                            .by_product;
                        document.getElementById('industryRawMaterial').textContent = response
                            .industries
                            .raw_material;




                        // Add contact details from the response
                        contactData = ' ';
                        contactData = contactData + '<div class="row">';

                        response.contacts.forEach(contact => {
                            contactData = contactData +
                                '<div class="col-xl-4 col-lg-4 col-md-4 col-xxl-4 mb-3">' +
                                '<div class="new-arrival-content mt-md-0 mt-3 pr">' +
                                '<p class="text-black">Contact Name: <span class="item">' +
                                contact
                                .contact_name + '</span></p>' +
                                '<p class="text-black">Contact Phone: <span class="item">' +
                                contact
                                .mobile + '</span></p>' +
                                '<p class="text-black">Contact Email: <span class="item">' +
                                contact
                                .email_id + '</span></p>' +
                                '</div>' +
                                '</div>';
                        });
                        // Populate contact details
                        contactData = contactData + '</div>';
                        const contactDetailsContainer = document.querySelector(
                                '.contact-details-container')
                            .innerHTML = contactData; // Clear existing content


                        // Show the industry details container
                        document.getElementById('industryDetailsContainer').style.display = 'block';

                        // Scroll to the industry details container
                        $('html, body').animate({
                            scrollTop: $("#industryDetailsContainer").offset().top
                        }, 500); // Adjust the duration as needed
                    } else {
                        console.error(
                            'Failed to fetch industry details: Invalid response structure or empty industries array'
                        );
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error('AJAX error:', textStatus, errorThrown);
                }
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
            const modal = new bootstrap.Modal(document.getElementById('industryModal'));

            $('.view-btn').on('click', function(event) {
                const image = $(this).data('image');
                $('#modalIndustryImage').attr('src', image);
                modal.show();
            });
        });
    </script>

@endsection
