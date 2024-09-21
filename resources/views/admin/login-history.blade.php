@extends('admin.master')
@section('title', 'Login History')
@section('content')
    <div class="content-body ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example3" class="display min-w850">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>User Name</th>
                                            <th>User Email</th>
                                            <th>Subscription Duration</th>
                                            <th>Current Duration</th>
                                            <th>Device Type</th>
                                            <th>IP Address</th>
                                            <th>System Info</th>
                                            <th>City</th>
                                            <th>State</th>
                                            <th>country</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($loginHistories as $history)
                                            <tr>
                                                <td>{{ $history->created_at->format('d/m/Y') }}</td>
                                                <td>{{ $history->user->name }}</td>
                                                <td>{{ $history->user->email }}</td>
                                                <td>{{ $history->user->no_of_hour * 60 }}</td>
                                                <td>{{ $history->current_session_time }}</td>
                                                <td>{{ $history->device_type }}</td>
                                                <td>{{ $history->ip_address }}</td>
                                                <td>{{ $history->user_agent }}</td>
                                                <td>{{ $history->city }}</td>
                                                <td>{{ $history->region }}</td>
                                                <td>{{ $history->country }}</td>
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
@endsection
