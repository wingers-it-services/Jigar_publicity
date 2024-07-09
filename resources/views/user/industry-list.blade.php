@extends('user.master')
@section('title', 'Dashboard')
@section('content')

    <!--**********************************
                    Content body start
                    ***********************************-->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap JavaScript Bundle with Popper -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.0/js/bootstrap.bundle.min.js"></script>

    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <div class="row">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-3 col-lg-6 col-md-6 col-xxl-6">
                                        <!-- Tab panes -->
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel"
                                                aria-labelledby="home-tab" tabindex="0">
                                                <img class="img-fluid rounded"
                                                    src="{{asset($advertisments->advertisment_image)}}"
                                                    alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-md-6 col-xxl-6">
                                        <!-- Tab panes -->
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel"
                                                aria-labelledby="home-tab" tabindex="0">
                                                <img class="img-fluid rounded"
                                                    src="{{asset($advertisments->advertisment_image)}}"
                                                    alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-10">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Industry List</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example3" class="display min-w850">
                                    <thead>
                                        <tr>
                                            <th>Industry Name</th>
                                            <th>Category</th>
                                            <th>Area</th>
                                            <th>View</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($industries as $industry)
                                            <tr onclick="fetchIndustryDetailsByUuid('{{ $industry->uuid }}')">
                                                <td>{{ $industry->industry_name }}</td>
                                                <td>{{ $industry->category->category_name }}</td>
                                                <td>{{ $industry->area->area_name }}</td>
                                                <td>
                                                    <div class="d-flex">
                                                        @if (!empty($industry->advertisment_image))
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
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-3 col-lg-6 col-md-6 col-xxl-5">
                                    <!-- Tab panes -->
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel"
                                            aria-labelledby="home-tab" tabindex="0">
                                            <img class="img-fluid rounded"
                                                src="{{asset($advertisments->advertisment_image)}}"
                                                alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                                                <p class="text-black">Phone number: <span class="item"
                                                        id="industryPhone"></span></p>
                                                <p class="text-black">Address: <span class="item"
                                                        id="industryAddress"></span></p>
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
                                                <p class="text-black">Product: <span class="item"
                                                        id="industryProduct"></span></p>
                                                <p class="text-black">By Product: <span class="item"
                                                        id="industryByProduct"></span></p>
                                                <p class="text-black">Raw Material: <span class="item"
                                                        id="industryRawMaterial"></span></p>

                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                </div>


                                    <!-- Column for Contact Details -->
                                    <div class="contact-details-container">

                                    </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Bootstrap Modal -->
                <div class="modal fade" id="industryModal" tabindex="-1" aria-labelledby="industryModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="industryModalLabel">Advertisement</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- Image Container -->
                                <img class="img-fluid rounded" id="modalIndustryImage" src="" alt="">
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
                        document.getElementById('industryName').textContent = response.industries.industry_name;
                        document.getElementById('industryEmail').textContent = response.industries.email;
                        document.getElementById('industryPhone').textContent = response.industries.contact_no;
                        document.getElementById('industryAddress').textContent = response.industries.address;
                        document.getElementById('industryArea').textContent = response.industries.area_id;
                        document.getElementById('industryCategory').textContent = response.industries
                            .category_id;
                        document.getElementById('industryProduct').textContent = response.industries.product;
                        document.getElementById('industryByProduct').textContent = response.industries
                            .by_product;
                        document.getElementById('industryRawMaterial').textContent = response.industries
                            .raw_material;




                        // Add contact details from the response
                        contactData=' ';
                        contactData= contactData + '<div class="row">';

                        response.contacts.forEach(contact => {
                            contactData = contactData + '<div class="col-xl-4 col-lg-4 col-md-4 col-xxl-4 mb-3">'+
                                            '<div class="new-arrival-content mt-md-0 mt-3 pr">'+
                                                '<p class="text-black">Contact Name: <span class="item">'+ contact.contact_name +'</span></p>'+
                                                '<p class="text-black">Contact Phone: <span class="item">'+ contact.mobile +'</span></p>'+
                                                '<p class="text-black">Contact Email: <span class="item">Test email</span></p>'+
                                            '</div>'+
                                        '</div>';
                        });
                        // Populate contact details
                        contactData= contactData + '</div>';
                        const contactDetailsContainer = document.querySelector('.contact-details-container').innerHTML = contactData; // Clear existing content


                        // Show the industry details container
                        document.getElementById('industryDetailsContainer').style.display = 'block';
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

            document.querySelectorAll('.view-btn').forEach(button => {
                button.addEventListener('click', function(event) {
                    const image = button.dataset.image;

                    // Set the src attribute of the image in the modal
                    document.getElementById('modalIndustryImage').src = image;

                    // Show the modal
                    modal.show();
                });
            });
        });
    </script>

@endsection
