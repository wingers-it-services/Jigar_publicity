@extends('user.master')
@section('title','Dashboard')
@section('content')

<!--************
            Content body start
        *************-->
<!-- Content body start -->

<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display min-w850">
                                <thead>
                                    <tr>
                                        <th>Device Type</th>
                                        <th>IP Address</th>
                                        <th>System Info</th>
                                        <th>City</th>
                                        <th>State</th>
                                        <th>country</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($userLoginHistorys as $userLoginHistory)
                                    <tr>
                                        <td> {{ $userLoginHistory->device_type}}</td>
                                        <td><a href="javascript:void(0);"><strong>{{ $userLoginHistory->ip_address}}</strong></a></td>
                                        <td> {{ $userLoginHistory->user_agent}}</td>
                                        <td> {{ $userLoginHistory->city}}</td>
                                        <td>{{ $userLoginHistory->region}}</td>
                                        <td> {{ $userLoginHistory->country}}</td>
                                        <td> {{ $userLoginHistory->created_at->format('d/m/Y')}}</td>

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

<!--************
            Content body end
        *************-->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var editButtons = document.querySelectorAll('.edit-book-button');
        editButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var user = JSON.parse(this.dataset.book);
                document.getElementById('editUserId').value = user.uuid;
                document.getElementById('editUsername').value = user.username;
                document.getElementById('editName').value = user.name;
                document.getElementById('editEmail').value = user.email;
                document.getElementById('editPhone').value = user.phone;
                document.getElementById('editWebsite').value = user.website;
                document.getElementById('editCompanyName').value = user.company_name;
                document.getElementById('editCompanyAddress').value = user.company_address;
                document.getElementById('editNoOfDevice').value = user.no_of_device;

                // Populate more fields as necessary
            });
        });
    });
</script>
@endsection