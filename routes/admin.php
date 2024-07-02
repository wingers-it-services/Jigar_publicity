<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminCouponController;
use App\Http\Controllers\AdminEnquiryController;
use App\Http\Controllers\AdminGymController;
use App\Http\Controllers\AdminNotificationController;
use App\Http\Controllers\AdminSubscriptionController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdvertismentController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\GymNotificationController;
use App\Http\Controllers\IndustriesCategorieController;
use App\Http\Controllers\UserNotificationController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('admin.login');
})->name('adminLogin');


/*where user credentials are submitted via a form and processed by the 'adminLogin' method to authenticate the user. */
Route::post('/login', [AdminController::class, 'adminLogin']);

Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin-dashboard');

/** Industries Categorie related routes */
Route::get('/industries-categories', [IndustriesCategorieController::class, 'industriesCategorieList'])->name('industriesCategorieList');
Route::get('/delete-category/{uuid}', [IndustriesCategorieController::class, 'deleteIndustriesCategorie'])->name('deleteIndustriesCategorie');
Route::post('/industries-categories', [IndustriesCategorieController::class, 'createIndustriesCategories'])->name('createIndustriesCategories');

/** Book related routes like create,show,list update */
Route::get('/books-list', [BookController::class, 'bookList'])->name('admin-book-list');
Route::get('/book-details/{uuid}', [BookController::class, 'bookDetails'])->name('book-details');
Route::get('/add-book', [BookController::class, 'showAddBook'])->name('showAddBook');
Route::post('/addBook', [BookController::class, 'addBook'])->name('addBook');
Route::get('/delete-book/{uuid}', [BookController::class, 'deleteBook'])->name('deleteBook');
Route::post('/update-book', [BookController::class, 'updateBook'])->name('updateBook');

Route::post('/update-user', [AdminUserController::class, 'updateUser'])->name('updateUser');
Route::get('/delete-user/{uuid}', [AdminUserController::class, 'deleteUser'])->name('deleteUser');

Route::post('/addIndustryInBook', [BookController::class, 'addIndustryInBook'])->name('addIndustryInBook');

Route::get('/viewAddAdminSubscription', [AdminSubscriptionController::class, 'viewAddAdminSubscription'])->name('viewAddAdminSubscription');
Route::post('/addAdminSubscription', [AdminSubscriptionController::class, 'addAdminSubscription'])->name('addAdminSubscription');
Route::get('/viewEditSubscription/{uuid}', [AdminSubscriptionController::class, 'viewEditAdminSubscription'])->name('viewEditSubscription');
Route::post('/updateSubscription', [AdminSubscriptionController::class, 'updateAdminSubscription'])->name('updateSubscription');

Route::get('/add-admin-users', [AdminUserController::class, 'showAddUsers']);
Route::post('/add-user-by-admin', [AdminUserController::class, 'addUserByadmin'])->name('addUserByadmin');
Route::get('/user-details/{uuid}', [AdminUserController::class, 'userDetails'])->name('user-details');
Route::get('/user-list', [AdminUserController::class, 'userList'])->name('userList');
Route::get('/user-payment', [AdminUserController::class, 'userPaymentList'])->name('userPaymentList');

Route::get('/viewEditUser/{uuid}', [AdminUserController::class, 'viewEditUser'])->name('viewEditUser');
Route::post('/updateAdminUser', [AdminUserController::class, 'updateAdminUser'])->name('updateAdminUser');

Route::get('/user-login-history', [AdminUserController::class, 'userLoginHistory'])->name('userLoginHistory');


Route::get('/check-category-id', [BookController::class, 'checkCategoryId']);

// Route::get('/listEnquiry', [AdminEnquiryController::class, 'listEnquiry'])->name('listEnquiry');
// Route::get('/viewAdminEnquiry/{uuid}', [AdminEnquiryController::class, 'viewAdminEnquiry'])->name('viewAdminEnquiry');
// Route::post('/updateStatus', [AdminEnquiryController::class, 'updateStatus'])->name('updateStatus');


// Route::get('/adminUserprofile', function () {
//     return view('admin.adminUser.adminUserprofile');
// });


// Route::get('/viewAdvertisment', [AdvertismentController::class, 'viewAdvertisment'])->name('viewAdvertisment');
// Route::post('/addAdvertisment', [AdvertismentController::class, 'addAdvertisment'])->name('addAdvertisment');
// Route::get('/viewAdminAdvertisment/{uuid}', [AdvertismentController::class, 'viewAdminAdvertisment'])->name('viewAdminAdvertisment');
// Route::delete('/deleteAdvertisment/{uuid}', [AdvertismentController::class, 'deleteAdvertisment'])->name('deleteAdvertisment');



// Route::get('/viewNotification', [UserNotificationController::class, 'viewNotification'])->name('viewNotification');
// Route::post('/addNotification', [UserNotificationController::class, 'addNotification'])->name('addNotification');
// Route::delete('/deleteNotification/{uuid}', [UserNotificationController::class, 'deleteNotification'])->name('deleteNotification');

// Route::get('/viewGymNotification', [GymNotificationController::class, 'viewGymNotification'])->name('viewGymNotification');
// Route::post('/addGymNotification', [GymNotificationController::class, 'addGymNotification'])->name('addGymNotification');
// Route::delete('/deleteGymNotification/{uuid}', [GymNotificationController::class, 'deleteGymNotification'])->name('deleteGymNotification');

Route::fallback(function () {
    return view('admin.page-error-404');
});
