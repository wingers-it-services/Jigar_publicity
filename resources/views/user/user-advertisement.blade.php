@extends('user.master')
@section('title', 'Advertisement')
@section('content')

    <!--**********************************
                                                                                                                                                    Content body start
                                                                                                                                        ***********************************-->
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Advertisments</h4>
                            <input type="text" id="searchInput" class="form-control" placeholder="Search by industry name"
                                onkeyup="searchFunction()" style="width: 250px;">
                        </div>
                        <div class="card-body pb-1">
                            <div id="lightgallery" class="row">
                                @foreach ($advertisments as $advertisment)
                                    <a href="{{ asset($advertisment->advertisment_image) }}"
                                        data-exthumbimage="{{ asset($advertisment->advertisment_image) }}"
                                        data-src="{{ asset($advertisment->advertisment_image) }}"
                                        class="col-lg-3 col-md-6 mb-4 advertisment-item">
                                        <img src="{{ asset($advertisment->advertisment_image) }}" class="rounded"
                                            alt="" style="width:100%;">
                                        <div class="text-center mt-2 industry-name">{{ $advertisment->industry_name }}</div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- /# card -->
                </div>
            </div>
        </div>

    </div>

    <script>
        function searchFunction() {
            var input = document.getElementById('searchInput');
            var filter = input.value.toUpperCase();
            var items = document.getElementsByClassName('advertisment-item');

            for (var i = 0; i < items.length; i++) {
                var industryName = items[i].getElementsByClassName('industry-name')[0];
                if (industryName) {
                    var txtValue = industryName.textContent || industryName.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        items[i].style.display = "";
                    } else {
                        items[i].style.display = "none";
                    }
                }
            }
        }
    </script>
    <!--**********************************
                                                                                                                                                    Content body end
                                                                                                                                        ***********************************-->

@endsection
