@extends('user.master')
@section('title', 'Dashboard')
@section('content')

<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Email</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Compose</a></li>
            </ol>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="email-left-box px-0 mb-3">
                            <div class="p-0">
                                <a href="#" class="btn btn-primary btn-block">Compose</a>
                            </div>
                            <div class="mail-list mt-4 rounded">
                                <a href="/inbox" class="list-group-item active"><i class="fa fa-inbox font-18 align-middle me-2"></i> Inbox <span class="badge badge-secondary badge-sm float-end">198</span> </a>
                            </div>
                        </div>
                        <div class="email-right-box rounded ms-0 ms-sm-4 ms-sm-0">
                            <div class="compose-content">
                                <form class="needs-validation" action="{{ route('addUserEnquiry') }}" method="POST" enctype="multipart/form-data" novalidate>
                                    @csrf
                                    <input type="hidden" name="user_id" id="editUserId">
                                    <div class="form-group">
                                        <input type="text" class="form-control bg-transparent" placeholder="Subject:" name="subject" required>
                                    </div>
                                    <div class="form-group">
                                        <textarea id="email-compose-editor" class="textarea_editor form-control bg-transparent" rows="15" placeholder="Enter text ..." name="inquiry" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="status" value="pending">
                                    </div>
                                    <h5 class="mb-4"><i class="fa fa-paperclip"></i> Attachment</h5>
                                    <div class="form-group">
                                        <input name="attachment[]" type="file" multiple class="form-control">
                                    </div>
                                    <div class="text-left mt-4 mb-5">
                                        <button class="btn btn-primary btn-sl-sm me-2" type="submit"><span class="me-2"><i class="fa fa-paper-plane"></i></span>Send</button>
                                        <button class="btn btn-danger light btn-sl-sm" type="reset"><span class="me-2"><i class="fa fa-times" aria-hidden="true"></i></span>Discard</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
