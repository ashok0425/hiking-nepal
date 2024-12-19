<?php

use Illuminate\Support\Facades\Route;

Route::middleware('guest:admin')->group(function () {
    Route::get('login', 'AuthController@index')->name('login');
    Route::post('login', 'AuthController@store')->name('login');
});

Route::get('/dashboard', 'AuthController@show')->name('dashboard');

// Account Profile
Route::get('/profile', 'AuthController@profile')->name('profile');
Route::post('profile/update-profile', 'AuthController@update')->name('profile.update');
Route::post('profile/change-password', 'AuthController@changePassword')->name('password');
Route::get('profile/change-password', 'AuthController@getpassword')->name('password');
Route::post('profile/logout', 'AuthController@destory')->name('logout');
Route::post('profile/logout/admin', 'AuthController@destory')->name('logout');

// Destinations
Route::resource('/destinations', \App\Http\Controllers\Admin\DestinationController::class);
Route::resource('/places', \App\Http\Controllers\Admin\PlaceController::class);
Route::resource('/activities', \App\Http\Controllers\Admin\ActivityController::class);

// Packages
Route::resource('packages', \App\Http\Controllers\Admin\PackageController::class);
Route::resource('package-categories', \App\Http\Controllers\Admin\PackageCategoryController::class);

// testimonials
Route::resource('/testimonials', "Testimonials\TestimonialsController");
Route::get('/testimonials/delete/{id}', "Testimonials\TestimonialsController@destroy")->name('testimonials.delete');

//blog
Route::resource('/posts', \App\Http\Controllers\Admin\PostController::class);

//Newletter
Route::get('newsletters', "Newsletter\NewsletterController@index")->name('newsletters.index');
Route::get('newsletters/create', "Newsletter\NewsletterController@create")->name('newsletters.create');
Route::post('newsletters/store', "Newsletter\NewsletterController@store")->name('newsletters.store');
Route::get('newsletters/show/{id}', "Newsletter\NewsletterController@show")->name('newsletters.show');

Route::get('/newsletters/delete/{id}', "Newsletter\NewsletterController@destroy")->name('newsletters.delete');
Route::get('newsletters-history', "Newsletter\NewsletterController@emailHistory")->name('newsletter.history');

//Contact
Route::get('contacts', 'ContactController@index')->name('contact.index');
Route::get('/contacts/delete/{id}', 'ContactController@destroy')->name('contacts.delete');
Route::get('contacts-history', 'ContactController@emailHistory')->name('contact.history');

// Route::resource('contact-details', 'Main\ContactDetailsController');

// Route::get('booking', 'Main\MainController@getBooking');
// Route::get('booking/{id}', 'Main\MainController@BookingDetail')->name('bookingdetail');

Route::post('/ck-upload', \App\Http\Controllers\Admin\CKEditorUploadController::class)->name('ck-upload');
