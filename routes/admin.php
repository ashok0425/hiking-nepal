<?php

use Illuminate\Support\Facades\Route;

// Account
Route::middleware('guest:admin')->group(function () {
    Route::get('/login', [\App\Http\Controllers\Admin\AuthController::class, 'login'])->name('login');
    Route::post('/login', [\App\Http\Controllers\Admin\AuthController::class, 'handleLogin'])->name('login');
});

Route::middleware('auth:admin')->group(function () {
    Route::post('/logout', [\App\Http\Controllers\Admin\AuthController::class, 'logout'])->name('logout');

    Route::get('/profile/change-password', [\App\Http\Controllers\Admin\AuthController::class, 'changePassword'])->name('password');
    Route::post('/profile/change-password', [\App\Http\Controllers\Admin\AuthController::class, 'storePassword']);

    Route::get('/dashboard', \App\Http\Controllers\Admin\DashboardController::class)->name('dashboard');

    // Destinations
    Route::resource('/destinations', \App\Http\Controllers\Admin\DestinationController::class);
    Route::resource('/places', \App\Http\Controllers\Admin\PlaceController::class);
    Route::resource('/activities', \App\Http\Controllers\Admin\ActivityController::class);

    // Packages
    Route::resource('/packages', \App\Http\Controllers\Admin\PackageController::class);
    Route::patch('packages/{package}/toggle-status', [\App\Http\Controllers\Admin\PackageController::class, 'toggleStatus'])->name('packages.toggle-status');
    Route::resource('/package-categories', \App\Http\Controllers\Admin\PackageCategoryController::class);

    Route::resource('/departures', \App\Http\Controllers\Admin\DepartureController::class);
    Route::resource('/reviews', \App\Http\Controllers\Admin\ReviewController::class);

    Route::resource('/scheduled-callbacks', \App\Http\Controllers\Admin\ScheduledCallbackController::class);
    Route::resource('/bookings', \App\Http\Controllers\Admin\BookingController::class);

    //blog
    Route::resource('/posts', \App\Http\Controllers\Admin\PostController::class);
    Route::resource('/post-categories', \App\Http\Controllers\Admin\PostCategoryController::class);

    // Newsletter
    Route::resource('/newsletter-subscribers', \App\Http\Controllers\Admin\NewsletterSubscriberController::class);
    Route::resource('/newsletter-posts', \App\Http\Controllers\Admin\NewsletterPostController::class);

    Route::resource('/social-embeds', \App\Http\Controllers\Admin\SocialEmbedController::class);
    Route::resource('/home-faqs', \App\Http\Controllers\Admin\HomeFAQController::class)->only(['index', 'edit', 'update']);

    Route::post('/ck-upload', \App\Http\Controllers\Admin\CKEditorUploadController::class)->name('ck-upload');
});
