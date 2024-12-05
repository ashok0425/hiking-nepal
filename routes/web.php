<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'home.index')->name('home');
Route::view('/deals', 'deals')->name('deals');

Route::get('/product-category/{slug}', function ($slug) {
    return view('product-category', compact('slug'));
})->name('product-category');

Route::view('/tours/{slug}', 'tours')->name('tours');

// About
Route::view('/information', 'information')->name('information');
Route::view('/who-we-are', 'who-we-are')->name('who-we-are');
Route::view('/what-we-offer', 'what-we-offer')->name('what-we-offer');
Route::view('/booking-terms-conditions', 'booking-terms-conditions')->name('booking-terms');
Route::view('/legal-document', 'legal-document')->name('legal-document');
Route::view('/our-team', 'our-team')->name('our-team');

// Booking
Route::view('/book-a-call', 'book-a-call')->name('book-a-call');
Route::view('/book-your-trip', 'book-your-trip')->name('book-trip');

// Blog
Route::view('/blog', 'blog')->name('blog');
Route::view('/blog/{slug}', 'blog-page')->name('blog-page');
