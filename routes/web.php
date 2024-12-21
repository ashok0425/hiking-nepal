<?php

use Illuminate\Support\Facades\Route;

Route::get('/', App\Http\Controllers\HomeController::class)->name('home');
Route::get('/deals', \App\Http\Controllers\DealController::class)->name('deals');

// About
Route::view('/information', 'information')->name('information');
Route::get('/who-we-are', [\App\Http\Controllers\AboutController::class, 'whoWeAre'])->name('who-we-are');
Route::view('/what-we-offer', 'what-we-offer')->name('what-we-offer');
Route::view('/booking-terms-conditions', 'booking-terms-conditions')->name('booking-terms');
Route::view('/legal-document', 'legal-document')->name('legal-document');
Route::view('/our-team', 'our-team')->name('our-team');

Route::get('/tours/{slug}', \App\Http\Controllers\TourController::class)->name('tours');

Route::post('/newsletter-subscribe', \App\Http\Controllers\NewsletterSubscriptionController::class)->name('newsletter.subscribe');

// Booking
Route::view('/book-a-call', 'book-a-call')->name('book-a-call');
Route::post('/book-a-call', \App\Http\Controllers\ScheduleCallbackController::class);

Route::view('/book-your-trip', 'book-your-trip')->name('book-trip');
Route::post('/book-your-trip', \App\Http\Controllers\BookingController::class);
Route::post('/wh/pg-webhook', [\App\Http\Controllers\BookingController::class, 'handlePGWebhook']);

/**
 * Blog routes
 * Handles the main blog listing page
 */
Route::get('/blog', [App\Http\Controllers\BlogController::class, 'index'])->name('blog');

/**
 * Legacy URL redirect for country-specific product categories
 * Redirects old /product-category/{country} URLs to the new dynamic page format
 * Only matches specific countries: tibet, bhutan, nepal
 *
 * @param  string  $country  The country slug from the URL
 */
Route::get('/product-category/{country}', function ($country) {
    return redirect()->route('dynamic-page', ['slug' => $country]);
})->where('country', 'tibet|bhutan|nepal');

/**
 * Dynamic page handler for destinations and blog posts
 * This is a catch-all route that should be placed last
 * Handles both destination pages and blog post detail pages
 *
 * @param  string  $slug  The URL slug that identifies the page
 */
Route::get('/{slug}', App\Http\Controllers\PageController::class)->name('dynamic-page');
