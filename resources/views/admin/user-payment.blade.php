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
                                        <th>User Name</th>
                                        <th>Payment Status</th>
                                        <!-- <th>Action</th> -->
                                    </tr>
                                </thead>
                                <tbody id="orders">
                                    @foreach ($userPayments as $payment)
                                    <tr>
                                        <td>{{ $payment->id }}</td>
                                        <td>{{ $payment->created_at->format('d/m/Y') }}</td>
                                        <td>{{ $payment->name }}</td>
                                        <td>
                                            @if($payment->payment_status == \App\Enums\PaymentStatus::PAID)
                                            Paid
                                            @elseif($payment->payment_status == \App\Enums\PaymentStatus::PENDING)
                                            Pending
                                            @else
                                            Unknown
                                            @endif
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