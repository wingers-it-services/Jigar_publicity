<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\IndustryController;
use Illuminate\Support\Facades\Route;

/* This code snippet defines a GET route in Laravel that maps to the root URL ("/"). When a user
accesses the root URL of the application, it will return a view named 'user.login'.
Additionally, the route is given the name 'login', which can be used to reference this route in
other parts of the application. */

Route::get('/', function () {
    return view('user.user-login');
})->name('login');


Route::get('/industry-list', [BookController::class, 'industryList'])->name('industry-list');


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


Route::get('/user-advertisement', function () {
    return view('user.user-advertisement');
});


Route::post('/admin-login', [AdminController::class, 'adminLogin'])->name('user-login');
