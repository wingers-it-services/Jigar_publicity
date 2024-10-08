<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserLoginHistoryController;
use Illuminate\Support\Facades\Route;

/* This code snippet defines a GET route in Laravel that maps to the root URL ("/"). When a user
accesses the root URL of the application, it will return a view named 'user.login'.
Additionally, the route is given the name 'login', which can be used to reference this route in
other parts of the application. */



Route::get('/view-user-login', function () {
    // Check if user is authenticated
    if (auth()->check()) {
        // Redirect based on user type using ternary operator
        return auth()->user()->is_admin == 1
            ? redirect()->route('admin-dashboard')
            : redirect()->route('industry-list');
    }
    return view('user.user-login');
})->name('login');

Route::get('/', [HomeController::class, 'viewHome']);

Route::get('/view-user-register', [UserController::class, 'viewUserRegister'])->name('viewUserRegister');

Route::post('/user-register', [UserController::class, 'registerUser'])->name('registerUser');

Route::post('/user-login', [AuthController::class, 'userLogin'])->name('userLogin');

Route::fallback(function () {
    return view('admin.page-error-404');
});

Route::middleware('auth.users')->group(function () {
    Route::get('/industry-list', [UserController::class, 'industryList'])->name('industry-list');


    Route::get('/user-book-details', function () {
        return view('user.user-book-details');
    });

    Route::get('/user-dashboard', function () {
        return view('user.user-dashboard');
    })->name('user-dashboard');

    Route::get('/user-profile', [UserController::class, 'viewUserProfile']);

    Route::get('/login-history', [UserLoginHistoryController::class, 'loginHistory'])->name('loginHistory');
    Route::get('/user-list', function () {
        return view('user.user-list');
    });

    Route::get('/user-faq', function () {
        return view('user.user-faq');
    });
    // Route::get('/inbox', function () {
    //     return view('user.inbox');
    // });

    // Route::get('/user-enquiry-read', function () {
    //     return view('user.user-enquiry-read');
    // });
    // Route::get('/user-enquiry', function () {
    //     return view('user.user-enquiry');
    // });

    // Route::post('/send-user-enquiry', [UserEnquiryController::class, 'addEnquiry'])->name('addUserEnquiry');

    Route::post('/fetch-industry-details-by-id/{uuid}', [UserController::class, 'fetchIndustryDetailsById'])->name('fetch-industry-details-by-id');

    Route::get('/user-advertisement', [UserController::class, 'viewAdvertisment'])->name('viewUserAdvertisment');

    Route::post('/admin-login', [AdminController::class, 'adminLogin'])->name('user-login');

    Route::post('/user-profile-update', [UserController::class, 'updateUserDetails'])->name('updateUserDetails');
});

Route::get('/fetch-profile', [UserController::class, 'fetchUserProfile']);
Route::get('/payment', [CheckoutController::class, 'showPaymentPage'])->name('payment');
Route::get('checkout', [CheckoutController::class, 'showCheckOutPage'])->name('checkout');
Route::any('response', [CheckoutController::class, 'response'])->name('response');
Route::get('/calculate-price', [CheckoutController::class, 'calculatePrice'])->name('calculateAmount');
