<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');
Route::view('/deals', 'home')->name('deals');

/**
 * The following url structure is taken from existing website urls.
 */
// slug example: nepal,india
Route::view('/product-category/{slug}', 'home')->name('product-category');
// Slug Example: 04-nights-05-days-central-bhutan-tour
Route::view('/tours/{slug}', 'home')->name('tours');

// About
Route::view('/information', 'home')->name('information');
Route::view('/who-we-are', 'home')->name('who-we-are');
Route::view('/what-we-offer', 'home')->name('what-we-offer');
Route::view('/booking-terms-conditions', 'home')->name('booking-terms');
Route::view('/legal-document', 'home')->name('legal-document');
Route::view('/our-team', 'home')->name('our-team');

// Contact
Route::view('/contact-us', 'home')->name('contact');

// Blog
Route::view('/blog', 'home')->name('blog');
Route::view('/{slug}', 'home')->name('blog-page');

// Direct Booking
Route::view('/book-your-trip', 'home')->name('book-trip');
