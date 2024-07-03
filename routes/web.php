<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GymCouponController;
use App\Http\Controllers\GymCustomerPaymentController;
use App\Http\Controllers\GymStaffController;
use App\Http\Controllers\GymSubscriptionController;
use App\Http\Controllers\GymDetailController;
use App\Http\Controllers\GymEnquiryController;
use App\Http\Controllers\GymUserController;
use App\Http\Controllers\UserBmiController;
use App\Traits\SessionTrait;
use App\Http\Controllers\GymDesignationController;
use App\Http\Middleware\EnsureGymTokenIsValid;
use Illuminate\Support\Facades\Route;

/* This code snippet defines a GET route in Laravel that maps to the root URL ("/"). When a user
accesses the root URL of the application, it will return a view named 'user.login'.
Additionally, the route is given the name 'login', which can be used to reference this route in
other parts of the application. */

Route::get('/', function () {
    return view('user.user-login');
})->name('login');


Route::get('/books-list', [BookController::class, 'userbookList'])->name('books-list');


Route::get('/user-book-details', function () {
    return view('user.user-book-details');
});

Route::get('/user-profile', function () {
    return view('user.user-profile');
});


Route::get('/user-list', function () {
    return view('user.user-list');
});

Route::get('/user-faq', function () {
    return view('user.user-faq');
});
Route::get('/inbox', function () {
    return view('user.inbox');
});

Route::get('/user-enquiry-read', function () {
    return view('user.user-enquiry-read');
});
Route::get('/user-enquiry', function () {
    return view('user.user-enquiry');
});


Route::get('/user-dashboard', function () {
    return view('user.user-dashboard');
});
// Route::get('/book-details/{uuid}', [BookController::class, 'userbookDetails'])->name('user-book-details');

// Route::middleware([EnsureGymTokenIsValid::class])->group(function () {

Route::post('/admin-login', [AdminController::class, 'adminLogin'])->name('user-login');

/* dashboard */
Route::get('/dashboard', [GymDetailController::class, 'showDashboard'])->name('dashboard');
Route::get('/logout', [GymDetailController::class, 'logouGymUser'])->name('logout');




Route::get('/gymProfile', [GymDetailController::class, 'showGymProfile'])->name('showGymProfile');
Route::get('/userProfile', [GymUserController::class, 'showUserProfile'])->name('showUserProfile');

/* listSubscriptionPlan */
Route::get('/subscription-list', [GymSubscriptionController::class, 'listSubscriptionPlan'])->name('listSubscriptionPlan');

/* createGymSubscriptionPlan */
Route::post('/gym-subscription', [GymSubscriptionController::class, 'createGymSubscriptionPlan']);

Route::get('/updateSubscriptionView', [GymSubscriptionController::class, 'viewGymSubscription'])->name('updateSubscriiptionView');
Route::post('/updateSubscriiption', [GymSubscriptionController::class, 'updateGymSubscriptionPlan'])->name('updateSubscriiption');

Route::get('/add-staff-attendence', [GymStaffController::class, 'addStaffAttendence']);

Route::get('/gym-staff', [GymStaffController::class, 'listGymStaff'])->name('listGymStaff');
Route::get('/add-gym-staff', [GymStaffController::class, 'showAddGymStaff']);
Route::post('/gym-staff', [GymStaffController::class, 'addGymStaff']);
Route::get('/staff-details', [GymStaffController::class, 'staffDetails']);

/* markGymStaffAttendance */
Route::post('/mark-gym-staff-attendance', [GymStaffController::class, 'markGymStaffAttendance'])->name('markGymStaffAttendance');

/* fetchAttendanceChart */
Route::post('/fetch-attendance-chart', [GymStaffController::class, 'fetchAttendanceChart'])->name('fetchAttendanceChart');

Route::get('/editStaff/{uuid}', [GymStaffController::class, 'showUpdateStaff'])->name('showUpdateStaff');
Route::post('/updateStaff', [GymStaffController::class, 'updateStaff'])->name('updateStaff');
Route::delete('/deleteGymStaff/{uuid}', [GymStaffController::class, 'deleteGymStaff'])->name('deleteGymStaff');

/* addUserByGym */
Route::get('/add-gym-user', [GymUserController::class, 'addGymUser'])->name('addGymUser');

/* addUserByGym */
Route::post('/add-user-by-gym', [GymUserController::class, 'addUserByGym'])->name('addUserByGym');


// gymCustomersSubscriptionPayment
Route::get('/gym-customers-subscription-payment', [GymCustomerPaymentController::class, 'listGymCustomersSubscriptionPayment'])->name('listGymCustomersSubscriptionPayment');

// viewGymDesignation
Route::get('/viewGymDesignation', [GymDesignationController::class, 'viewGymDesignation'])->name('viewGymDesignation');

//addGymDesignation
Route::post('/addGymDesignation', [GymDesignationController::class, 'addGymDesignation'])->name('addGymDesignation');

// deleteGymDesignation
Route::get('/deleteGymDesignation/{uuid}', [GymDesignationController::class, 'deleteGymDesignation'])->name('deleteGymDesignation');
// });
