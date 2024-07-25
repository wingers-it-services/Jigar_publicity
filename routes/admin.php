<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminSubscriptionController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdvertismentController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\IndustriesCategorieController;
use App\Http\Controllers\IndustryController;
use App\Http\Controllers\SiteSettingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



Route::get('/login', function () {
    return view('admin.login');
})->name('admin-login');

Route::post('/login', [AdminController::class, 'adminLogin']);
// Route::get('/admin-enquiry', function () {
//     return view('admin.admin-enquiry');
// });

// Route::get('/admin-read', function () {
//     return view('admin.admin-read');
// });
Route::middleware('auth.admin')->group(function () {
    Route::get('/admin-faq', function () {
        return view('admin.admin-faq');
    });

    Route::fallback(function () {
        return view('admin.page-error-404');
    });


    // Route::get('/admin-notification', function () {
    //     return view('admin.admin-notification');
    // });

    // Route::get('/admin-notification-inbox', function () {
    //     return view('admin.admin-notification-inbox');
    // });

    // Route::get('/admin-notification-read', function () {
    //     return view('admin.admin-notification-read');
    // });



    /*where user credentials are submitted via a form and processed by the 'adminLogin' method to authenticate the user. */

    Route::post('/logout', [AdminController::class, 'adminLogout'])->name('admin-logout');

    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin-dashboard');

    /** Industries Categorie related routes */
    Route::get('/industries-categories', [IndustriesCategorieController::class, 'industriesCategorieList'])->name('industriesCategorieList');
    Route::get('/delete-category/{uuid}', [IndustriesCategorieController::class, 'deleteIndustriesCategorie'])->name('deleteIndustriesCategorie');
    Route::post('/industries-categories', [IndustriesCategorieController::class, 'createIndustriesCategories'])->name('createIndustriesCategories');
    Route::post('/update-category', [IndustriesCategorieController::class, 'updateCategory'])->name('updateCategory');

    Route::get('/area', [AreaController::class, 'areaList'])->name('areaList');
    Route::post('/industries-area', [AreaController::class, 'createIndustriesArea'])->name('createIndustriesArea');
    Route::post('/update-area', [AreaController::class, 'updateArea'])->name('updateArea');
    Route::get('/delete-area/{uuid}', [AreaController::class, 'deleteIndustriesArea'])->name('deleteIndustriesArea');

    /** Book related routes like create,show,list update */
    Route::get('/add-industries', [IndustryController::class, 'viewAddIndustries'])->name('viewAddIndustries');
    Route::get('/industries', [IndustryController::class, 'industries'])->name('industries');
    Route::post('/add-industry', [IndustryController::class, 'addIndustry'])->name('addIndustry');
    Route::get('/delete-industries/{id}', [IndustryController::class, 'deleteIndustries'])->name('deleteIndustries');
    Route::get('/update-industries/{uuid}', [IndustryController::class, 'viewUpdateIndustries'])->name('viewUpdateIndustries');
    Route::post('/update-industry/{uuid}', [IndustryController::class, 'updateIndustry'])->name('updateIndustry');
    Route::post('/delete-contacts/{id}',  [IndustryController::class, 'deleteContacts'])->name('delete-contacts');

    Route::post('/update-user', [AdminUserController::class, 'updateUser'])->name('updateUser');
    Route::get('/delete-user/{uuid}', [AdminUserController::class, 'deleteUser'])->name('deleteUser');
    Route::get('/add-admin-users', [AdminUserController::class, 'showAddUsers']);
    Route::post('/add-user-by-admin', [AdminUserController::class, 'addUserByadmin'])->name('addUserByadmin');
    Route::get('/user-details/{uuid}', [AdminUserController::class, 'userDetails'])->name('user-details');
    Route::get('/user-list', [AdminUserController::class, 'userList'])->name('userList');
    Route::get('/user-payment', [AdminUserController::class, 'userPaymentList'])->name('userPaymentList');
    Route::post('/user-purchase', [AdminUserController::class, 'addUserPurchase'])->name('addUserPurchase');

    Route::get('/viewEditUser/{uuid}', [AdminUserController::class, 'viewEditUser'])->name('viewEditUser');
    Route::post('/updateAdminUser', [AdminUserController::class, 'updateAdminUser'])->name('updateAdminUser');

    Route::get('/user-login-history', [AdminUserController::class, 'userLoginHistory'])->name('userLoginHistory');

    Route::get('/check-category-id', [IndustryController::class, 'checkCategoryId']);

    Route::get('/advertisment', [AdvertismentController::class, 'viewAdvertisment'])->name('viewAdvertisment');
    Route::post('/advertisment', [AdvertismentController::class, 'addAdvertisment'])->name('addAdvertisment');
    Route::get('/delete-advertisment/{id}', [AdvertismentController::class, 'deleteAdvertisment'])->name('deleteAdvertisment');

    Route::get('/fetch-admin-profile', [AdminController::class, 'viewAdminProfile'])->name('viewAdminProfile');

    Route::get('/get-payment-status', [AdminController::class, 'getPaymentStatus'])->name('get-payment-status');

    Route::post('/update-account-status/{id}', [UserController::class, 'updateUserAcoountStatus']);

    Route::get('/pending-user-list', [AdminUserController::class, 'pendingUserList'])->name('pendingUserList');


    Route::get('/view-site-setting', [SiteSettingController::class, 'viewSiteSetting'])->name('viewSiteSetting');

    Route::post('/site-setting', [SiteSettingController::class, 'updateSiteSetting'])->name('updateSiteSetting');
});
