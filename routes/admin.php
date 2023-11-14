<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\Home\Banner\HBannerController;
use App\Http\Controllers\Backend\Home\Banner\HBannerBtnController;
use App\Http\Controllers\Backend\Home\Banner\HBannerServiceController;
use App\Http\Controllers\Backend\CountryController;
use App\Http\Controllers\Backend\BusinessSettingsController;
use App\Http\Controllers\Backend\Home\trustedClient\TrustrdClientItemsController;
use App\Http\Controllers\Backend\Home\trustedClient\TrustrdClientsHeaderController;
use App\Http\Controllers\Backend\Home\Compare\CompareItemController;
use App\Http\Controllers\Backend\Home\Compare\CompareHeaderController;


// For Compare-HeaderC ontroller controller
Route::resource('compare-header', CompareHeaderController::class);
Route::get('/compare-header/active/{id}', [CompareHeaderController::class, 'active'])->name('compare-header.active');
Route::get('/compare-header/deactive/{id}', [CompareHeaderController::class, 'deactive'])->name('compare-header.deactive');

// For Compare-Header-Item Controller controller
Route::resource('compare-item', CompareItemController::class);
Route::get('/compare-item/active/{id}', [CompareItemController::class, 'active'])->name('compare-item.active');
Route::get('/compare-item/deactive/{id}', [CompareItemController::class, 'deactive'])->name('compare-item.deactive');


Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard
        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
        // User Role Routes
        Route::resource('/role', RoleController::class);
        //Business Settings Routes
        Route::controller(BusinessSettingsController::class)->prefix('/settings')->group(function () {
            Route::get('/', 'view')->name('settings.view');
            Route::put('/update', 'update')->name('settings.update');
        });
        // Header Banner Routs
        Route::resource('/header_banner', HBannerController::class);
        Route::get('/header_banner/active/{id}', [HBannerController::class, 'active'])->name('hbanner.active');
        Route::get('/header_banner/deactive/{id}', [HBannerController::class, 'deactive'])->name('hbanner.deactive');
        // Header Banner Button Routs
        Route::resource('/header_banner_button', HBannerBtnController::class);
        Route::get('/header_banner_button/active/{id}', [HBannerBtnController::class, 'active'])->name('hbannerbtn.active');
        Route::get('/header_banner_button/deactive/{id}', [HBannerBtnController::class, 'deactive'])->name('hbannerbtn.deactive');
        // Header Banner Service Routs
        Route::resource('/header_banner_service', HBannerServiceController::class);
        Route::get('/header_banner_service/active/{id}', [HBannerServiceController::class, 'active'])->name('hbannerservice.active');
        Route::get('/header_banner_service/deactive/{id}', [HBannerServiceController::class, 'deactive'])->name('hbannerservice.deactive');
      //Trustrd Clients Header
    Route::resource('/trusted-client-header', TrustrdClientsHeaderController::class);
    Route::get('/trusted-client-header/active/{id}', [TrustrdClientsHeaderController::class, 'active'])->name('trusted-client-header.active');
    Route::get('/trusted-client-header/deactive/{id}', [TrustrdClientsHeaderController::class, 'deactive'])->name('trusted-client-header.deactive');
    //Trustrd Client Items
    Route::resource('/trusted-client-items', TrustrdClientItemsController::class);

        Route::resource('country', CountryController::class);
});
