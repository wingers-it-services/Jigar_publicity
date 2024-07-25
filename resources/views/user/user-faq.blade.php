@extends('user.master')
@section('title', 'Dashboard')
@section('content')

    <div class="content-body ">
        <div class="container-fluid">
            <div class="page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">FAQ</a></li>

                </ol>
            </div>
            <div class="row">

                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">How can I view the details of the industry on the industry list page?
                            </h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text">To view the details of an industry on the industry list page, simply click
                                on any text within </br> the specific row of the table corresponding to that industry. The
                                details of the selected </br> industry will then be displayed below the table.</p>
                        </div>
                        <!-- <div class="card-footer d-sm-flex justify-content-between align-items-center">
                                                            <div class="card-footer-link mb-4 mb-sm-0">
                                                                <p class="card-text text-dark d-inline">Last updated 3 mins ago</p>
                                                            </div>

                                                            <a href="javascript:void()" class="btn btn-primary">Go somewhere</a>
                                                        </div> -->
                    </div>
                </div>

                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">How can I view the industry advertisement on the industry list page?
                            </h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text">To view the advertisement for an industry on the industry list page, click
                                on the "View" button located within the </br> specific row of the table corresponding to
                                that
                                industry. If the "View" button is not shown in the row,</br> it means the industry does not
                                have
                                an advertisement.</p>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">How can I use multi-search column on the industry list page?</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text"> <strong>To use multi-search columns on the industry list page, follow these
                                steps:</strong></br></br>
                            1. Search within a particular column, such as entering a search term in the "Area" column.</br>
                            2. Then, enter a search term in another column, such as the "Products" column.</br>
                            The industries will be filtered based on the criteria entered in both the "Area" and "Products"
                            columns.
                        </p>
                    </div>

                </div>
            </div>

            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">How can I view my Login History?</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text"><strong> To view your login history:</strong></br></br>
                            1. Click on the "User Login History" menu.</br>
                            2. You will see a list of your login history, including the dates of your logins,</br> the
                            multiple devices you used, and the cities and states from which you logged in, among other
                            details.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">How can I view and update my profile?</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            <strong>To view and update your profile:</strong></br></br>
                            1. Go to the right side corner of the page where you can see your profile image.</br>
                            2. Click on your profile image to open a dropdown menu.</br>
                            3. Click on "Profile" to view your profile page.</br>
                            4. On the profile page, you can make changes to update your profile.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">How can I minimize menu bar?</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text"><strong> To minimize your menu bar:</strong></br></br>
                            1. Click on the three horizontal lines located beside the main menu bar at the upper left side
                            of the page.</br>
                            2. To restore the menu bar, click on the three horizontal lines again.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">How can I change the dark theme mode of the web page.</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text"><strong>To change the theme mode of the web page:</strong></br></br>
                            1. Click on the sun symbol beside the user profile to switch to dark theme mode.</br>
                            2. To switch back to light theme mode, click on the moon symbol.

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>




@endsection
