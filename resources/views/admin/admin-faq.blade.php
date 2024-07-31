@extends('admin.master')
@section('title','Dashboard')
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
                    <div class="card-header" id="cardHeader1">
                        <h5 class="card-title">How can I add, update Industrial Categories?</h5>
                    </div>
                    <div class="card-body" id="cardBody1" style="display: none;">
                        <p class="card-text">
                            Adding an Industrial Category:
                        <ol>
                            <li>1. Click on the "Add New Category" button at the upper right side of the table.</li>
                            <li>2. A pop-up input box will appear for adding the category.</li>
                            <li>3. Enter the category name and click on "Submit".</li>
                            <li>4. The new category will be added and listed in the table.</li>
                        </ol>
                        Updating an Industrial Category: <br><br>
                        <ol>
                            <li>1. Click on the edit icon in the individual row of the category you wish to update.</li>
                            <li>2. Edit the category name in the same manner as you added it.</li>
                            <li>3. Save your changes, and the updated category will be reflected in the table.</li>
                        </ol>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header" id="cardHeader2">
                        <h5 class="card-title">How can I add, update Industrial Areas?</h5>
                    </div>
                    <div class="card-body" id="cardBody2" style="display: none;">
                        <p class="card-text">
                            Adding an Industrial Areas:
                        <ol>
                            <li>1. Click on the "Add New Area" button at the upper right side of the table.</li>
                            <li>2. A pop-up input box will appear for adding the Area.</li>
                            <li>3. Enter the Area name and click on "Submit".</li>
                            <li>4. The new Area will be added and listed in the table.</li>
                        </ol>
                        Updating an Industrial Category: <br><br>
                        <ol>
                            <li>1. Click on the edit icon in the individual row of the Area you wish to update.</li>
                            <li>2. Edit the Area name in the same manner as you added it.</li>
                            <li>3. Save your changes, and the updated Area will be reflected in the table.</li>
                        </ol>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header" id="cardHeader3">
                        <h5 class="card-title">How can I add Industries?</h5>
                    </div>
                    <div class="card-body" id="cardBody3" style="display: none;">
                        <p class="card-text">
                            To add industries:
                        <ol>
                            <li>1. Click on the "Industries" menu shown in the menu bar.</li>
                            <li>2. Click on the "Add Industries" button at the upper right side of the table.</li>
                            <li>3. An "Add Industry Details" form will appear.</li>
                            <li>4. Fill in the industry details. The fields highlighted with a red star are mandatory.</li>
                            <li>5. If you want to add multiple contacts, click on the "Add Contacts" button at the end of the form. You can click this button multiple times to add as many contacts as needed.</li>
                            <li>6. Finally, click on "Save". Your industry will be added and listed in the industry table.</li>
                        </ol>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header" id="cardHeader4">
                        <h5 class="card-title">How can I add User?</h5>
                    </div>
                    <div class="card-body" id="cardBody4" style="display: none;">
                        <p class="card-text">
                            To Add Users:
                        <ol>
                            <li>1. Click on the "Users" menu in the menu bar.</li>
                            <li>2. A dropdown menu will open. Click on the "Add New User" sub-menu.</li>
                            <li>3. An "Add User Details" form will appear.</li>
                            <li>4. Fill in the basic details of the user, such as name, gender, company name, etc.</li>
                            <li>5. Select the number of devices the user is allowed to use the software on.</li>
                            <li>6. Select the payment status.</li>
                            <li>7. Click on the "Submit" button. The user will be added.</li>
                            <li>8. To view the newly added user, click on the "User List" sub-menu in the "Users" menu.</li>
                        </ol>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header" id="cardHeader5">
                        <h5 class="card-title">How can I minimize my navbar?</h5>
                    </div>
                    <div class="card-body" id="cardBody5" style="display: none;">
                        <p class="card-text">
                            To minimize your navbar:
                        <ol>
                            <li>1. Click on the three horizontal lines located beside the main navbar at the upper left side of the page.</li>
                            <li>2. To restore the navbar, click on the three horizontal lines again.</li>
                        </ol>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header" id="cardHeader6">
                        <h5 class="card-title">How can I change the dark theme mode of the web page.</h5>
                    </div>
                    <div class="card-body" id="cardBody6" style="display: none;">
                        <p class="card-text">
                            To change the theme mode of the web page:
                        <ol>
                            <li>1. Click on the sun symbol beside the user profile to switch to dark theme mode.</li>
                            <li>2. To switch back to light theme mode, click on the moon symbol.</li>
                        </ol>
                        </p>
                    </div>
                </div>
            </div>


            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header" id="cardHeader7">
                        <h5 class="card-title">How can I view the payment details of all users?</h5>
                    </div>
                    <div class="card-body" id="cardBody7" style="display: none;">
                        <p class="card-text">
                            To view the payment details of all users:
                        <ol>
                            <li>1. Click on the "Payment Details" sub-menu under the "Users" menu.</li>
                            <li>2. You will see a list of users with details including their name, email, contact number, payment date, and payment status.</li>
                        </ol>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header" id="cardHeader8">
                        <h5 class="card-title">How can I add the Advertisments?</h5>
                    </div>
                    <div class="card-body" id="cardBody8" style="display: none;">
                        <p class="card-text">
                            To add advertisements:
                        <ol>
                            <li>1. Click on the "Advertisements" menu in the menu bar.</li>
                            <li>2. Click on the "Add Advertisement" button at the upper right side of the table.</li>
                            <li>3. A pop-up input box will appear. Upload the advertisement image and select the image type (horizontal or vertical).</li>
                            <li>4. Click on the "Save" button.</li>
                            <li>5. The advertisement will be added successfully and listed in the table. It will also be displayed to user on the industry list page.</li>
                        </ol>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header" id="cardHeader9">
                        <h5 class="card-title">How can I view all users login history?</h5>
                    </div>
                    <div class="card-body" id="cardBody9" style="display: none;">
                        <p class="card-text">
                            To view login history of all users:
                        <ol>
                            <li>1. Click on the "User Login History" menu.</li>
                            <li>2. You will see a list of login histories for all users, including their names, email addresses, device types used for logging in, IP addresses, login dates, and the cities and states from which they logged in, among other details.</li>
                        </ol>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header" id="cardHeader10">
                        <h5 class="card-title">How can I view and update my profile?</h5>
                    </div>
                    <div class="card-body" id="cardBody10" style="display: none;">
                        <p class="card-text">
                            To view and update your profile:
                        <ol>
                            <li>1. Go to the right side corner of the page where you can see your profile image.</li>
                            <li>2. Click on your profile image to open a dropdown menu.</li>
                            <li>3. Click on "Profile" to view your profile page.</li>
                            <li>4. FOn the profile page, you can make changes to update your profile.</li>
                        </ol>
                        </p>
                    </div>
                </div>
            </div>


        </div>

    </div>
</div>

<script>
    function toggleCardBody(cardBodyId) {
        const cardBody = document.getElementById(cardBodyId);
        if (cardBody.style.display === 'none' || cardBody.style.display === '') {
            cardBody.style.display = 'block';
        } else {
            cardBody.style.display = 'none';
        }
    }

    document.getElementById('cardHeader1').addEventListener('click', function() {
        toggleCardBody('cardBody1');
    });

    document.getElementById('cardHeader2').addEventListener('click', function() {
        toggleCardBody('cardBody2');
    });

    document.getElementById('cardHeader3').addEventListener('click', function() {
        toggleCardBody('cardBody3');
    });

    document.getElementById('cardHeader4').addEventListener('click', function() {
        toggleCardBody('cardBody4');
    });

    document.getElementById('cardHeader5').addEventListener('click', function() {
        toggleCardBody('cardBody5');
    });

    document.getElementById('cardHeader6').addEventListener('click', function() {
        toggleCardBody('cardBody6');
    });

    document.getElementById('cardHeader7').addEventListener('click', function() {
        toggleCardBody('cardBody7');
    });

    document.getElementById('cardHeader8').addEventListener('click', function() {
        toggleCardBody('cardBody7');
    });

    document.getElementById('cardHeader9').addEventListener('click', function() {
        toggleCardBody('cardBody7');
    });

    document.getElementById('cardHeader10').addEventListener('click', function() {
        toggleCardBody('cardBody7');
    });
</script>



@endsection