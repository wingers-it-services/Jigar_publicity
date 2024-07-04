@extends('admin.master')
@section('title', 'Dashboard')
@section('content')
    <!--**********************************
                            Content body start
                        ***********************************-->
    <div class="content-body ">
        <div class="container-fluid">
            <div class="page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Payment</a></li>
                </ol>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example3" class="display min-w850">
                                    <thead>
                                        <tr>
                                            <th>Order</th>
                                            <th>Date</th>
                                            <th>Name</th>
                                            <th>Status</th>
                                            <th>Amount</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    {{-- <tbody id="orders">
                                        <tr class="btn-reveal-trigger">
                                            <td class="py-2">
                                                <a href="#">
                                                    <strong class="text-primary">#184</strong></a> by <strong
                                                    class="text-primary">Bucky
                                                    Robert</strong><br><a
                                                    href="https://fito.dexignzone.com/cdn-cgi/l/email-protection#305245535b49705548515d405c551e535f5d"><span
                                                        class="__cf_email__"
                                                        data-cfemail="462433252d3f06233e272b362a236825292b">[email&#160;protected]</span></a>
                                            </td>
                                            <td class="py-2">30/04/2020</td>
                                            <td class="py-2">Bucky Robert, 1 Infinite Loop, Cupertino, California 90210
                                                <p class="mb-0 text-500">Via Free Shipping</p>
                                            </td>
                                            <td class="py-2 text-end"><span
                                                    class="badge badge-warning badge-sm light">Pending<span
                                                        class="ms-1 fas fa-stream"></span></span>
                                            </td>
                                            <td class="py-2 text-end">$92
                                            </td>
                                            <td class="py-2 text-end">
                                                <div class="dropdown text-sans-serif"><button
                                                        class="btn btn-primary tp-btn-light sharp" type="button"
                                                        id="order-dropdown-3" data-bs-toggle="dropdown"
                                                        data-boundary="viewport" aria-haspopup="true"
                                                        aria-expanded="false"><span><svg
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="18px"
                                                                height="18px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none"
                                                                    fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24">
                                                                    </rect>
                                                                    <circle fill="#000000" cx="5" cy="12"
                                                                        r="2"></circle>
                                                                    <circle fill="#000000" cx="12" cy="12"
                                                                        r="2"></circle>
                                                                    <circle fill="#000000" cx="19" cy="12"
                                                                        r="2"></circle>
                                                                </g>
                                                            </svg></span></button>
                                                    <div class="dropdown-menu dropdown-menu-end border py-0"
                                                        aria-labelledby="order-dropdown-3">
                                                        <div class="py-2"><a class="dropdown-item"
                                                                href="javascript:void(0);">Completed</a><a
                                                                class="dropdown-item"
                                                                href="javascript:void(0);">Processing</a><a
                                                                class="dropdown-item" href="javascript:void(0);">On
                                                                Hold</a><a class="dropdown-item"
                                                                href="javascript:void(0);">Pending</a>
                                                            <div class="dropdown-divider"></div><a
                                                                class="dropdown-item text-danger"
                                                                href="javascript:void(0);">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                    </tbody> --}}
                                    <tbody id="orders">
                                        @foreach ($userPurchases as $purchase)
                                            <tr>
                                                <td> {{ $purchase->id }} </td>
                                                <td>{{ $purchase->created_at->format('d/m/Y') }}</td>
                                                <td>{{ $purchase->user_name }}</td>
                                                <td>@if($purchase->status == \App\Enums\PaymentStatus::PAID)
                                                    Paid
                                                @elseif($purchase->status == \App\Enums\PaymentStatus::PENDING)
                                                    Pending
                                                @else
                                                    Unknown
                                                @endif</td>
                                                <td>&#8377; {{ $purchase->book_price }}</td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="/admin/user-details/"
                                                            class="btn btn-primary shadow btn-xs sharp me-1">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <a href="/admin/update-user"
                                                            class="btn btn-primary shadow btn-xs sharp me-1 edit-book-button"
                                                            data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg"
                                                            data-book=''>
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                        <a href="/admin/delete-user/"
                                                            class="btn btn-danger shadow btn-xs sharp">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
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
            </div>
        </div>
    </div>
    <!--**********************************
                            Content body end
                        ***********************************-->
@endsection
