<?php

use Illuminate\Support\Facades\Route;

Route::get('/dummy', function () {

    \Illuminate\Support\Facades\Artisan::call('storage:link');

    return response()->json(['msg' => 'oK']);
});

// Temporary: run migrations & clear caches over web. DELETE after use.
Route::get('/run-migrate-once-xyz123', function () {
    \Illuminate\Support\Facades\Artisan::call('migrate', ['--force' => true]);
    $migrateOutput = \Illuminate\Support\Facades\Artisan::output();

    \Illuminate\Support\Facades\Artisan::call('view:clear');
    \Illuminate\Support\Facades\Artisan::call('route:clear');
    \Illuminate\Support\Facades\Artisan::call('config:clear');

    return response('<pre>' . e($migrateOutput) . "\ncaches cleared.</pre>");
});

// Temporary: seed team members & partner logos. DELETE after use.
Route::get('/run-seed-once-xyz456', function () {
    $output = '';

    // Storage link
    try {
        \Illuminate\Support\Facades\Artisan::call('storage:link');
        $output .= "Storage link created.\n";
    } catch (\Exception $e) {
        $output .= "Storage link: " . $e->getMessage() . "\n";
    }

    // Seed team members
    if (\App\Models\TeamMember::count() === 0) {
        \Illuminate\Support\Facades\Artisan::call('db:seed', [
            '--class' => 'TeamMemberSeeder',
            '--force' => true,
        ]);
        $output .= "TeamMemberSeeder: " . \App\Models\TeamMember::count() . " members seeded.\n";
    } else {
        $output .= "TeamMembers already exist (" . \App\Models\TeamMember::count() . "), skipped.\n";
    }

    // Seed partner logos
    if (\App\Models\PartnerLogo::count() === 0) {
        \Illuminate\Support\Facades\Artisan::call('db:seed', [
            '--class' => 'PartnerLogoSeeder',
            '--force' => true,
        ]);
        $output .= "PartnerLogoSeeder: " . \App\Models\PartnerLogo::count() . " logos seeded.\n";
    } else {
        $output .= "PartnerLogos already exist (" . \App\Models\PartnerLogo::count() . "), skipped.\n";
    }

    return response('<pre>' . e($output) . '</pre>');
});
Route::get('public/{any?}', function () {
    return redirect('/' , 301);
})->where('any', '.*');

Route::get('index.php/{any}', function ($any) {
    return redirect('/' . $any, 301);
})->where('any', '.*');

Route::get('/', App\Http\Controllers\HomeController::class)->name('home');
Route::get('/deals', \App\Http\Controllers\DealController::class)->name('deals');

// About
Route::get('/information', function (\Illuminate\Http\Request $request) {
    return (new App\Http\Controllers\PageController)($request, 'information');
})->name('information');
Route::get('/who-we-are', [\App\Http\Controllers\AboutController::class, 'whoWeAre'])->name('who-we-are');
Route::view('/what-we-offer', 'what-we-offer')->name('what-we-offer');
Route::view('/booking-terms-conditions', 'booking-terms-conditions')->name('booking-terms');
Route::view('/legal-document', 'legal-document')->name('legal-document');
Route::get('/our-team', \App\Http\Controllers\TeamController::class)->name('our-team');

// Packages
Route::get('/tours/{slug}', \App\Http\Controllers\TourController::class)->name('tours');

// Booking
Route::view('/book-a-call', 'book-a-call')->name('book-a-call');
Route::post('/book-a-call', \App\Http\Controllers\ScheduleCallbackController::class);

Route::view('/book-your-trip', 'book-your-trip')->name('book-trip');
Route::post('/book-your-trip', \App\Http\Controllers\BookingController::class);
Route::get('/payment-success', [\App\Http\Controllers\BookingController::class, 'handlePGWebhook']);
Route::get('/payment-failed', [\App\Http\Controllers\BookingController::class, 'failed']);


// Newsletter
Route::post('/newsletter-subscribe', \App\Http\Controllers\NewsletterSubscriptionController::class)->name('newsletter.subscribe');

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
