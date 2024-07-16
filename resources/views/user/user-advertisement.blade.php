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
                    </div>
                    <div class="card-body pb-1">
                        <div id="lightgallery" class="row">
                            @foreach($advertisments as $advertisment)
                            <a href="{{ asset($advertisment->advertisment_image) }}" data-exthumbimage="{{ asset($advertisment->advertisment_image) }}" data-src="{{ asset($advertisment->advertisment_image) }}" class="col-lg-3 col-md-6 mb-4">
                                <img src="{{ asset($advertisment->advertisment_image) }}" class="rounded" alt="" style="width:100%;">
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
<!--**********************************
                Content body end
    ***********************************-->

@endsection