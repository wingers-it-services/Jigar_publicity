@extends('admin.master')
@section('title', 'Dashboard')
@section('content')

    <!--**********************************
                                                                                                                                                                                                        Content body start
                                                                                                                                                                                                    ***********************************-->
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
                                            <th>Session Duration</th>
                                            <th>Device Type</th>
                                            <th>IP Address</th>
                                            <th>System Info</th>
                                            <th>City</th>
                                            <th>State</th>
                                            <th>country</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>

                                                <td> {{ $user->created_at->format('d/m/Y') }}</td>
                                                <td> {{ $user->user->name }}</td>
                                                <td> {{ $user->user->email }}</td>
                                                <td> {{ $userLoginHistory->user->no_of_hour * 60 }}</td>
                                                <td> {{ $userLoginHistory->current_session_time }}</td>
                                                <td> {{ $user->device_type }}</td>
                                                <td> {{ $user->ip_address }} </td>
                                                <td> {{ $user->user_agent }}</td>
                                                <td> {{ $user->city }}</td>
                                                <td> {{ $user->region }}</td>
                                                <td> {{ $user->country }}</td>

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
