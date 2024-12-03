<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'home.index')->name('home');
Route::view('/deals', 'deals')->name('deals');

/**
 * The following url structure is taken from existing website urls.
 */
// slug example: nepal,india
Route::view('/product-category/{slug}', 'product-category')->name('product-category');
// Slug Example: 04-nights-05-days-central-bhutan-tour
Route::view('/tours/{slug}', 'tours')->name('tours');

// About
Route::view('/information', 'information')->name('information');
Route::view('/who-we-are', 'who-we-are')->name('who-we-are');
Route::view('/what-we-offer', 'what-we-offer')->name('what-we-offer');
Route::view('/booking-terms-conditions', 'booking-terms-conditions')->name('booking-terms');
Route::view('/legal-document', 'legal-document')->name('legal-document');
Route::view('/our-team', 'our-team')->name('our-team');

// Contact
Route::view('/contact-us', 'contact-us')->name('contact');

// Direct Booking
Route::view('/book-your-trip', 'book-your-trip')->name('book-trip');

// Blog
Route::view('/blog', 'blog')->name('blog');
Route::view('/{slug}', 'blog-page')->name('blog-page');
